<?php

namespace App\Http\Controllers\teknisi;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\ServiceReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ServiceReport::all();
        return view('teknisi.report.index', ['reports' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        return view('teknisi.report.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $booking_id)
    {
        $request->validate([
            'diagnosis' => 'required',
            'action_taken' => 'required',
            'time_estimate' => 'required',
            'service_cost' => 'required|numeric',
            'parts_cost' => 'required|numeric',
        ]);

        // Hitung total biaya
        $total = $request->service_cost + $request->parts_cost;

        // Simpan laporan servis
        $report = ServiceReport::create([
            'booking_id' => $booking_id,
            'technician_id' => Auth::id(),
            'diagnosis' => $request->diagnosis,
            'action_taken' => $request->action_taken,
            'time_estimate' => $request->time_estimate,
            'process_date' => Carbon::now('Asia/Jakarta'),
            'completion_date' => null,
            'service_cost' => $request->service_cost,
            'parts_cost' => $request->parts_cost,
            'total_cost' => $total,
        ]);

        // Update status booking menjadi 'Diproses'
        $booking = Booking::findOrFail($booking_id);
        $booking->update(['status' => 'Diproses']);

        return redirect()->route('teknisi.booking.index')->with('success', 'Booking diproses dan Report service berhasil ditambah');
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
    public function edit(string $id, string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);

        $report = ServiceReport::findOrFail($id);

        return view('teknisi.report.edit', compact('bookings', 'report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'diagnosis' => 'required',
            'action_taken' => 'required',
            'time_estimate' => 'required',
            'service_cost' => 'required|numeric',
            'parts_cost' => 'required|numeric',
        ]);

        // Hitung total biaya
        $total = $request->service_cost + $request->parts_cost;

        $report = ServiceReport::findOrFail($id);

        $report->update([
            'diagnosis' => $request->diagnosis,
            'action_taken' => $request->action_taken,
            'time_estimate' => $request->time_estimate,
            'service_cost' => $request->service_cost,
            'parts_cost' => $request->parts_cost,
            'total_cost' => $total,
        ]);

        return redirect()->route('teknisi.booking.index')->with('success', 'Report service berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
