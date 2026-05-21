<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/sukses', [BookingController::class, 'sukses'])->name('booking.sukses');

Route::get('/admin/bookings', [PageController::class, 'adminBookings'])->name('admin.bookings');
