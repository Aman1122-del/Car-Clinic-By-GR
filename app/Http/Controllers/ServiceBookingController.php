<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Models\ServiceBooking;

class ServiceBookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'service_date' => 'required|date',
            'service_time' => 'required',
            'vehicle' => 'required',
            'vehicle_number' => 'required',
        ]);

        $serviceDate = $request->service_date;
        $serviceTime = $request->service_time;

        $requestedDateTime = Carbon::createFromFormat('Y-m-d H:i', $serviceDate . ' ' . $serviceTime);

        // Check if time is within allowed range (9 AM – 4 PM)
        $hour = (int)$requestedDateTime->format('H');
        if ($hour < 9 || $hour > 16) {
            return back()->withErrors(['service_time' => 'Please select a time between 9 AM and 4 PM.'])->withInput();
        }

        // Check for 1-hour conflict before or after
        $conflict = ServiceBooking::where('service_date', $serviceDate)
            ->whereTime('service_time', '>=', $requestedDateTime->copy()->subHour()->format('H:i:s'))
            ->whereTime('service_time', '<=', $requestedDateTime->copy()->addHour()->format('H:i:s'))
            ->first();

        if ($conflict) {
            return back()->withErrors(['service_time' => 'This time slot is already booked or too close to another booking. Please choose another time.'])->withInput();
        }

        // Save booking
        ServiceBooking::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'service_date' => $serviceDate,
            'service_time' => $serviceTime,
            'vehicle' => $request->vehicle,
            'vehicle_number' => $request->vehicle_number,
            'special_request' => $request->special_request,
        ]);

        return back()->with('success', 'Service booked successfully!');
    }

    public function getAvailableTimes(Request $request)
    {
        $request->validate([
            'service_date' => 'required|date',
        ]);

        $serviceDate = $request->service_date;

        // Get all booked times for this date
        $bookedTimes = ServiceBooking::where('service_date', $serviceDate)->pluck('service_time')->toArray();

        return response()->json([
            'booked_times' => $bookedTimes,
        ]);
    }


public function showBookings()
{
    $bookings = DB::table('service_bookings')->get(); // Fetch all bookings
    return view('admin.dashboard', compact('bookings')); // Pass to user.blade.php
}
public function showRecords()
{
    $bookings = DB::table('service_bookings')->get(); // Same fetching
    return view('admin.records', compact('bookings')); // Send to record.blade.php
}

public function appointments(Request $request)
{
    $search = $request->input('search');

    $bookings = DB::table('service_bookings');

    if ($search) {
        $search = strtolower($search);
        $bookings = $bookings->where(function($query) use ($search) {
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(email) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(service) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(vehicle) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(vehicle_number) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(service_date) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(special_request) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(created_at) LIKE ?', ["%{$search}%"]);
        });
    }

    $bookings = $bookings->orderBy('created_at', 'desc')->get();

    return view('admin.dashboard', compact('bookings'));
}
public function appointment(Request $request)
{
    $search = $request->input('search');

    $bookings = DB::table('service_bookings');

    if ($search) {
        $search = strtolower($search);
        $bookings = $bookings->where(function($query) use ($search) {
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(email) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(service) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(vehicle) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(vehicle_number) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(service_date) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(special_request) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(created_at) LIKE ?', ["%{$search}%"]);
        });
    }

    $bookings = $bookings->orderBy('created_at', 'desc')->get();

    return view('admin.records', compact('bookings'));
}


}
