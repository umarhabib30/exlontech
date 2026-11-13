<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View { return view('admin.catalog.index', ['kind' => 'course', 'items' => Course::withCount('feeRecords')->latest()->get()]); }
    public function create(): View { return view('admin.catalog.form', ['kind' => 'course', 'item' => new Course(['fee_amount' => 0])]); }
    public function store(Request $request): RedirectResponse { Course::create($this->data($request)); return redirect()->route('admin.courses.index')->with('success', 'Course added.'); }
    public function edit(Course $course): View { return view('admin.catalog.form', ['kind' => 'course', 'item' => $course]); }
    public function update(Request $request, Course $course): RedirectResponse { $course->update($this->data($request)); return redirect()->route('admin.courses.index')->with('success', 'Course updated.'); }
    public function destroy(Course $course): RedirectResponse
    {
        if ($course->feeRecords()->exists()) return back()->with('error', 'This course is assigned to fee records and cannot be deleted.');
        $course->delete(); return back()->with('success', 'Course deleted.');
    }
    private function data(Request $request): array { return $request->validate(['name' => ['required','string','max:255'], 'duration' => ['required','string','max:100'], 'fee_amount' => ['required','numeric','min:0'], 'description' => ['nullable','string']]); }
}
