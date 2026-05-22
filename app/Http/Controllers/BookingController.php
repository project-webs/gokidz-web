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
            'child_class' => 'required|string|max:255',
            'child_gender' => 'required|string|in:Laki-laki,Perempuan',
            'pickup_address' => 'required|string',
            'shuttle_type' => 'required|string|in:round_trip,morning_only,afternoon_only',
            'extracurricular' => 'nullable|string|max:1000',
        ]);

        // Auto-fill school name for SDI Abu Dzar
        $validated['school_name'] = 'SDI Abu Dzar';

        $booking = Booking::create($validated);

        return redirect()->route('booking.sukses')->with([
            'parent_name' => $booking->parent_name,
            'child_name' => $booking->child_name,
            'child_class' => $booking->child_class,
            'child_gender' => $booking->child_gender,
            'school_name' => $booking->school_name,
            'shuttle_type' => $booking->shuttle_type,
            'extracurricular' => $booking->extracurricular,
        ]);
    }

    public function sukses()
    {
        if (!session()->has('parent_name')) {
            return redirect()->route('pendaftaran');
        }
        return view('pages.sukses');
    }
}
