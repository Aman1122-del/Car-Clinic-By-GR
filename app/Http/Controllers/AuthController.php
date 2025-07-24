<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // app/Http/Controllers/AuthController.php

public function showLogin()
{
    // Check if the user is already authenticated
    if (Auth::check()) {
        // If the user is the first user (admin), redirect to admin dashboard
        $user = Auth::user();
        $firstUser = \App\Models\User::orderBy('id', 'asc')->first(); // get first registered user

        if ($user->id === $firstUser->id) {
            return redirect('/admin/dashboard'); // if first user, go to admin dashboard
        } else {
            return redirect('/user'); // else, normal user dashboard
        }
    }

    return view('login'); // If not logged in, show login page
}
public function adminshowLogin()
{
    // Check if the user is already authenticated
    if (Auth::check()) {
        // If the user is the first user (admin), redirect to admin dashboard
        $user = Auth::user();
        $firstUser = \App\Models\User::orderBy('id', 'asc')->first(); // get first registered user

        if ($user->id === $firstUser->id) {
            return redirect('/admin/dashboard'); // if first user, go to admin dashboard
        } else {
            return redirect('/user'); // else, normal user dashboard
        }
    }

    return view('adminlogin'); // If not logged in, show login page
}


    public function showSignup()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits_between:10,15|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $firstUser = \App\Models\User::orderBy('id', 'asc')->first(); // get first registered user

            if ($user->id === $firstUser->id) {
                return redirect('/admin/dashboard'); // if first user, go to admin dashboard
            } else {
                return redirect('/user'); // else, normal user dashboard
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
     public function adminlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $firstUser = \App\Models\User::orderBy('id', 'asc')->first(); // get first registered user

            if ($user->id === $firstUser->id) {
                return redirect('/admin/dashboard'); // if first user, go to admin dashboard
            } else {
                return redirect('/user'); // else, normal user dashboard
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function account()
    {
        $user = Auth::user(); // Get currently logged-in user

        // Fetch service history only for this user
        $serviceHistory = DB::table('service_bookings')
            ->where('email', $user->email) // assuming service_bookings has user_id field
            ->get();

        return view('account', compact('user', 'serviceHistory'));
    }
    public function appointments()
    {
        $user = Auth::user(); // Get currently logged-in user

        // Fetch service history only for this user
        $serviceHistory = DB::table('service_bookings')
            ->where('email', $user->email) // assuming service_bookings has user_id field
            ->get();

        return view('appointments', compact('user', 'serviceHistory'));
    }

public function cancelAppointment($id)
{
    $userEmail = Auth::user()->email;

    DB::table('service_bookings')
        ->where('id', $id)
        ->where('email', $userEmail)
        ->delete();

    return redirect()->back()->with('success', 'Appointment cancelled successfully.');
}

}
