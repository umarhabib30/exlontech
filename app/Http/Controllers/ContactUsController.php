<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'service' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $data =[
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name') ?? '',
            'email' => $request->input('email'),
            'phone' => $request->input('phone') ?? '',
            'service' => $request->input('service'),
            'message' => $request->input('message'),
        ];

        ContactUs::create($data);

        try {
            Mail::to('mumarhabibrb102@gmail.com')->queue(new ContactUsMail($data));
        } catch (Throwable $exception) {
            Log::warning('Contact form mail could not be queued.', [
                'email' => $data['email'] ?? null,
                'error' => $exception->getMessage(),
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Thanks for contacting us, we will get in touch soon!',
            ]);
        }

        return redirect('/')->with('success', 'Thanks for contacting us, we will get in touch soon!');
    }
}
