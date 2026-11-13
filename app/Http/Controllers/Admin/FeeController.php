<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FeeRecord;
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeeController extends Controller
{
    public function index(): View { return view('admin.fees.index', ['records' => FeeRecord::with(['course','instructor','monthlyPayments'])->latest()->get()]); }
    public function create(): View { return $this->form(new FeeRecord, 'Add Student Fee Record'); }
    public function store(Request $request): RedirectResponse
    {
        $data = $this->data($request);
        $record = FeeRecord::create($data);
        $record->monthlyPayments()->create([
            'billing_month' => Carbon::parse($data['date_of_admission'])->startOfMonth()->toDateString(),
            'amount_due' => $data['total_fee'],
            'amount_paid' => 0,
        ]);

        return redirect()->route('admin.fees.show', $record)->with('success', 'Student added. The first monthly fee record is ready.');
    }
    public function show(FeeRecord $fee): View { return view('admin.fees.show', ['fee' => $fee->load(['course','instructor','monthlyPayments' => fn ($query) => $query->orderBy('billing_month')])]); }
    public function edit(FeeRecord $fee): View { return $this->form($fee, 'Edit Student Fee Record'); }
    public function update(Request $request, FeeRecord $fee): RedirectResponse { $fee->update($this->data($request)); return redirect()->route('admin.fees.show', $fee)->with('success', 'Fee record updated.'); }
    public function destroy(FeeRecord $fee): RedirectResponse { $fee->delete(); return redirect()->route('admin.fees.index')->with('success', 'Fee record deleted.'); }

    private function form(FeeRecord $fee, string $title): View
    {
        return view('admin.fees.form', ['fee' => $fee, 'title' => $title, 'courses' => Course::orderBy('name')->get(), 'instructors' => Instructor::orderBy('name')->get()]);
    }

    private function data(Request $request): array
    {
        return $request->validate([
            'student_name' => ['required','string','max:255'], 'contact_number' => ['required','string','max:40'],
            'id_card_number' => ['required','string','max:40'], 'father_name' => ['required','string','max:255'],
            'father_contact_number' => ['required','string','max:40'], 'address' => ['required','string'],
            'date_of_birth' => ['required','date','before:today'], 'degree' => ['required','string','max:255'],
            'date_of_admission' => ['required','date'], 'course_id' => ['required','exists:courses,id'],
            'instructor_id' => ['required','exists:instructors,id'], 'total_fee' => ['required','numeric','min:0'],
        ]) + ['course_duration' => Course::findOrFail($request->input('course_id'))->duration];
    }
}
