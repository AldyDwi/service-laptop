<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\ServiceReport;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

        // Jumlah role user
        $roleUserCount = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->count();

        // Jumlah role teknisi
        $roleTeknisiCount = User::whereHas('role', function ($query) {
            $query->where('name', 'teknisi');
        })->count();

        // Total pendapatan (dari service_reports)
        $totalPendapatan = ServiceReport::sum('total_cost');

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

        // Total pendapatan per bulan di tahun ini
        $revenuePerMonth = ServiceReport::select(
                DB::raw('MONTH(process_date) as month'),
                DB::raw('SUM(total_cost) as total_revenue')
            )
            ->whereYear('process_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_revenue', 'month')
            ->toArray();

        // Konversi data menjadi format array 12 bulan (mengisi bulan tanpa data dengan 0)
        $bookingsData = [];
        $revenueData = [];

        for ($month = 1; $month <= 12; $month++) {
            $bookingsData[] = $bookingsPerMonth[$month] ?? 0;
            $revenueData[] = $revenuePerMonth[$month] ?? 0;
        }

        return view('admin.dashboard', compact('totalBooking', 'totalMenunggu', 'totalDiterima', 'totalProses', 'totalSelesai', 'totalDibayar', 'roleUserCount', 'roleTeknisiCount', 'totalPendapatan', 'bookingsData', 'revenueData', 'currentYear'
        ));
    }
}
