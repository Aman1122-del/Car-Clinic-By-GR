<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function showEmailForm() {
        return view('password.email');
    }

    public function sendResetLink(Request $request) {
        $request->validate(['email' => 'required|email']);
        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with that email.']);
        }

        // Send email with reset link (email as query param)
        $resetLink = url('/password/new') . '?email=' . urlencode($request->email);

        Mail::raw("Click here to reset your password: $resetLink", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset Link - Car Clinic By GR');
        });

        return back()->with('success', 'Reset link sent to your email.');
    }

    public function showNewPasswordForm(Request $request) {
        $email = $request->query('email');
        return view('password.new_password', compact('email'));
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Password reset successfully.');
    }
}
