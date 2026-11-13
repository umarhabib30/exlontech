<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InstructorController extends Controller
{
    public function index(): View { return view('admin.catalog.index', ['kind' => 'instructor', 'items' => Instructor::withCount('feeRecords')->latest()->get()]); }
    public function create(): View { return view('admin.catalog.form', ['kind' => 'instructor', 'item' => new Instructor]); }
    public function store(Request $request): RedirectResponse { Instructor::create($this->data($request)); return redirect()->route('admin.instructors.index')->with('success', 'Instructor added.'); }
    public function edit(Instructor $instructor): View { return view('admin.catalog.form', ['kind' => 'instructor', 'item' => $instructor]); }
    public function update(Request $request, Instructor $instructor): RedirectResponse { $instructor->update($this->data($request)); return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated.'); }
    public function destroy(Instructor $instructor): RedirectResponse
    {
        if ($instructor->feeRecords()->exists()) return back()->with('error', 'This instructor is assigned to fee records and cannot be deleted.');
        $instructor->delete(); return back()->with('success', 'Instructor deleted.');
    }
    private function data(Request $request): array { return $request->validate(['name' => ['required','string','max:255'], 'contact_number' => ['nullable','string','max:40'], 'email' => ['nullable','email','max:255'], 'specialization' => ['nullable','string','max:255'], 'address' => ['nullable','string']]); }
}
