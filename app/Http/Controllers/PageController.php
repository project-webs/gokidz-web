<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function layanan()
    {
        return view('pages.layanan');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function kontakStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Tim Gokidz akan segera menghubungi Anda melalui WhatsApp atau Email.');
    }

    public function pendaftaran()
    {
        return view('pages.pendaftaran');
    }

    public function adminBookings()
    {
        $bookings = Booking::latest()->get();
        return view('pages.admin-bookings', compact('bookings'));
    }
}
