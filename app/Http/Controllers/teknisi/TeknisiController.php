<?php

namespace App\Http\Controllers\teknisi;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\RekapTeknisi;
use Illuminate\Http\Request;
use App\Models\ServiceReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeknisiController extends Controller
{
    public function index() {
        // Total booking
        $totalBooking = Booking::count();

        // Total menunggu booking
        $totalMenunggu = Booking::where('status', 'Menunggu')->count();

        // Total diterima booking
        $totalDiterima = Booking::where('status', 'Diterima')->count();

        // Total proses booking
        $totalProses = Booking::where('status', 'Diproses')->count();

        // Total booking selesai
        $totalSelesai = Booking::where('status', 'Selesai')->count();

        // Total booking dibayar
        $totalDibayar = Booking::where('status', 'Dibayar')->count();

        $currentYear = Carbon::now()->year;

        // Jumlah booking per bulan di tahun ini
        $bookingsPerMonth = Booking::select(
                DB::raw('MONTH(booking_date) as month'),
                DB::raw('COUNT(id) as total_bookings')
            )
            ->whereYear('booking_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_bookings', 'month')
            ->toArray();

        // Konversi data menjadi format array 12 bulan (mengisi bulan tanpa data dengan 0)
        $bookingsData = [];

        for ($month = 1; $month <= 12; $month++) {
            $bookingsData[] = $bookingsPerMonth[$month] ?? 0;
        }

        // Ambil data teknisi dengan rekap teknisi
        $rekapTeknisi = RekapTeknisi::with('technician')
            ->get()
            ->map(function ($rekap) {
                $totalService = ServiceReport::where('technician_id', $rekap->technician_id)->count();

                $monthlyService = ServiceReport::where('technician_id', $rekap->technician_id)
                    ->whereMonth('process_date', Carbon::now()->month)
                    ->count();

                return [
                    'name' => $rekap->technician->name,
                    'total_service' => $totalService,
                    'monthly_service' => $monthlyService,
                    'status' => $rekap->status,
                ];
            });

        return view('teknisi.dashboard', compact('totalBooking', 'totalMenunggu', 'totalDiterima', 'totalProses', 'totalSelesai', 'totalDibayar',  'bookingsData', 'currentYear', 'rekapTeknisi'
        ));
    }
}
