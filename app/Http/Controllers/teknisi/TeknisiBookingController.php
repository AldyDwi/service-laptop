<?php

namespace App\Http\Controllers\teknisi;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeknisiBookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('customer', 'category')
        ->whereIn('status', ['Diterima', 'Diproses', 'Selesai', 'Dibayar'])
        ->get();
        return view('teknisi.booking.index', compact('bookings'));
    }

    public function selesai(string $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Selesai'
        ]);

        return redirect()->route('teknisi.booking.index')->with('success', 'Service sudah selesai');
    }
    public function show($id)
    {
        $booking = Booking::with(['images', 'serviceReport', 'category', 'customer', 'payment'])
            ->findOrFail($id);

        return view('teknisi.booking.detail', compact('booking'));
    }
}
