<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data =[
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'service' => $request->input('service'),
            'message' => $request->input('message'),
        ];

        ContactUs::create($data);

        // Send the email
        Mail::to('mumarhabibrb102@gmail.com')->send(new ContactUsMail($data));

        return redirect('/')->with('success', 'Thanks for contacting us, we will get in touch soon!');
    }
}
