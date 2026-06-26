<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactSubmissionController extends Controller
{
    public function index(): View
    {
        return view('admin.contacts.index', [
            'title' => 'Contact Submissions | Exlon Tech',
            'contacts' => ContactUs::latest()->get(),
        ]);
    }

    public function show(ContactUs $contact): View
    {
        return view('admin.contacts.show', [
            'title' => 'Contact Submission | Exlon Tech',
            'contact' => $contact,
        ]);
    }

    public function destroy(ContactUs $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact submission deleted successfully.');
    }
}
