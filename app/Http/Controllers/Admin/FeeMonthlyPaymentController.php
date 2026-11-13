<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeMonthlyPayment;
use App\Models\FeeRecord;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FeeMonthlyPaymentController extends Controller
{
    public function store(Request $request, FeeRecord $fee): RedirectResponse
    {
        $data = $this->validatedData($request);
        $month = Carbon::createFromFormat('Y-m', $data['billing_month'])->startOfMonth();
        $this->ensureMonthIsAvailable($fee, $month);

        $fee->monthlyPayments()->create([
            'billing_month' => $month->toDateString(),
            'amount_due' => $data['amount_due'],
            'amount_paid' => $data['amount_paid'],
            'paid_at' => $data['paid_at'] ?? null,
        ]);

        return redirect()->route('admin.fees.show', $fee)->with('success', 'Monthly fee record added.');
    }

    public function update(Request $request, FeeRecord $fee, FeeMonthlyPayment $payment): RedirectResponse
    {
        $payment = $fee->monthlyPayments()->findOrFail($payment->id);
        $data = $this->validatedData($request);
        $month = Carbon::createFromFormat('Y-m', $data['billing_month'])->startOfMonth();
        $this->ensureMonthIsAvailable($fee, $month, $payment);

        $payment->update([
            'billing_month' => $month->toDateString(),
            'amount_due' => $data['amount_due'],
            'amount_paid' => $data['amount_paid'],
            'paid_at' => $data['paid_at'] ?? null,
        ]);

        return redirect()->route('admin.fees.show', $fee)->with('success', 'Monthly fee record updated.');
    }

    public function destroy(FeeRecord $fee, FeeMonthlyPayment $payment): RedirectResponse
    {
        $fee->monthlyPayments()->findOrFail($payment->id)->delete();
        return redirect()->route('admin.fees.show', $fee)->with('success', 'Monthly fee record deleted.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'billing_month' => ['required', 'date_format:Y-m'],
            'amount_due' => ['required', 'numeric', 'min:0'],
            'amount_paid' => ['required', 'numeric', 'min:0', 'lte:amount_due'],
            'paid_at' => ['nullable', 'date'],
        ]);
    }

    private function ensureMonthIsAvailable(FeeRecord $fee, Carbon $month, ?FeeMonthlyPayment $except = null): void
    {
        $query = $fee->monthlyPayments()->whereDate('billing_month', $month->toDateString());
        if ($except) $query->where('id', '!=', $except->id);

        if ($query->exists()) {
            throw ValidationException::withMessages(['billing_month' => 'A fee record already exists for this month.']);
        }
    }
}
