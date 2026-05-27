<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [PageController::class, 'kontakStore'])->name('kontak.store');
Route::get('/pendaftaran', [PageController::class, 'pendaftaran'])->name('pendaftaran');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/sukses', [BookingController::class, 'sukses'])->name('booking.sukses');

Route::get('/admin/bookings', [PageController::class, 'adminBookings'])->name('admin.bookings')->middleware('auth');
Route::patch('/admin/bookings/{booking}/done', [BookingController::class, 'markAsDone'])->name('admin.bookings.done')->middleware('auth');
