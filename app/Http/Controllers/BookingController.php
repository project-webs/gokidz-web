<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:255',
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|integer|min:2|max:18',
            'school_name' => 'required|string|max:255',
            'pickup_address' => 'required|string',
            'shuttle_type' => 'required|string|in:round_trip,morning_only,afternoon_only',
        ]);

        $booking = Booking::create($validated);

        return redirect()->route('booking.sukses')->with([
            'parent_name' => $booking->parent_name,
            'child_name' => $booking->child_name,
            'school_name' => $booking->school_name,
            'shuttle_type' => $booking->shuttle_type,
        ]);
    }

    public function sukses()
    {
        if (!session()->has('parent_name')) {
            return redirect()->route('kontak');
        }
        return view('pages.sukses');
    }
}
