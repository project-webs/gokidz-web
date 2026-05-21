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

    public function adminBookings()
    {
        $bookings = Booking::latest()->get();
        return view('pages.admin-bookings', compact('bookings'));
    }
}
