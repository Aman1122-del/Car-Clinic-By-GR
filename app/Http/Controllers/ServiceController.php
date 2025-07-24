<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Feedback;

class ServiceController extends Controller
{


    public function create()
    {
        return view('services.create');
    }

   public function store(Request $request)
{
    // Validate input
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:9048',
    ]);

    try {
        // Check if image exists
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $extension  = $image->getClientOriginalExtension();
            $filename   = 'service_' . time() . '.' . $extension;
            $path       = $image->storeAs('services', $filename, 'public');
            $data['image'] = $path;
        }

        // Create the service
        Service::create($data);

        return redirect()->route('services.create')->with('success', 'Service added!');
    } catch (\Exception $e) {
        \Log::error('Service Store Error: ' . $e->getMessage());
        return back()->with('error', 'Something went wrong while uploading. Please try again.');
    }
}

    public function dashboard()
{
    $services = Service::all(); // or filter by user if needed
    $feedbacks = Feedback::latest()->take(5)->get(); // or filter by user if needed

    return view('user', compact('services', 'feedbacks'));
}
public function index()
{
   $services = Service::all(); // or filter by user if needed
    $feedbacks = Feedback::latest()->take(5)->get(); // or filter by user if needed

    return view('user', compact('services', 'feedbacks'));
}
// Show Manage Page
public function manage()
{
    $services = Service::all();
    return view('services.manage', compact('services'));
}

// Edit Form
public function edit($id)
{
    $service = Service::findOrFail($id);
    return view('services.edit', compact('service'));
}

// Update Logic
public function update(Request $request, $id)
{
    $service = Service::findOrFail($id);

    $data = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'icon' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $filename = $request->file('image')->store('services', 'public');
        $data['image'] = $filename;
    }

    $service->update($data);

    return redirect()->route('services.manage')->with('success', 'Service updated!');
}

// Delete
public function destroy($id)
{
    $service = Service::findOrFail($id);
    $service->delete();
    return redirect()->route('services.manage')->with('success', 'Service deleted!');
}

}
