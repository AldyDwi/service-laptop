<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Testimonial::all();
        return view('admin.testimoni.index', ['testimonials' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $booking_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $booking_id)
    {
        //
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
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $type = Testimonial::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
