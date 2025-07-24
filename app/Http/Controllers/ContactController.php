<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message_body' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('anayattalha@gmail.com', 'Site Owner')
                    ->subject('New Contact Form: ' . $data['subject'])
                    ->replyTo($data['email'], $data['name']);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
