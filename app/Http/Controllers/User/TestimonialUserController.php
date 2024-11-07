<?php

namespace App\Http\Controllers\user;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        return view('admin.testimoni.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $booking_id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'booking_id' => $booking_id,
            'testimoni_date' => now(),
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user.booking.show', $booking_id)->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimoni.edit', compact('bookings', 'testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $booking_id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $type = Testimonial::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('user.booking.show', $booking_id)->with('success', 'Testimoni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
