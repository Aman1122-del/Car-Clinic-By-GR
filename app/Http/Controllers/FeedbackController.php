<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Http\Request;


    class FeedbackController extends Controller
{
    // Show feedbacks on home page
    public function index()
    {
        $feedbacks = Feedback::latest()->take(5)->get(); // Get recent 5 feedbacks
        return view('index', compact('feedbacks')); // Make sure your home page blade is welcome.blade.php
    }

    // Show feedbacks on user page (for logged-in users)


    // Store feedback
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        Feedback::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
    public function dashboard()
{
    $services = Service::all();
    $feedbacks = Feedback::latest()->take(5)->get();

    return view('index', compact('services', 'feedbacks'));
}
public function dash()
{
    $services = Service::all();


    return view('services', compact('services'));
}

}

