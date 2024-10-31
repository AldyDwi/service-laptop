<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBookingController extends Controller
{
    public function admin() {
        $bookings = Booking::with('customer', 'category')->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function tolak(string $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Ditolak'
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking  ditolak.');
    }

    public function terima(string $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Diterima'
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil diterima.');
    }

    public function show($id)
    {
        $booking = Booking::with(['images', 'serviceReport', 'category', 'customer', 'payment'])
            ->findOrFail($id);

        return view('admin.booking.detail', compact('booking'));
    }
}
