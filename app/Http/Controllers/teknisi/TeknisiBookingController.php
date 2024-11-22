<?php

namespace App\Http\Controllers\teknisi;

use Carbon\Carbon;
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

        $serviceReport = $booking->serviceReport;
        if ($serviceReport) {
            $serviceReport->update([
                'completion_date' => Carbon::now('Asia/Jakarta')
            ]);
        }

        // Mengirim pesan WhatsApp
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $booking->customer->hp, 
                'message' => 'Halo '. $booking->customer->name . "\n" . "\n" .'Kami ingin memberitahukan bahwa service laptop anda sudah selesai.' . "\n" . 
                'Silakan datang ke lokasi kami untuk mengambil laptop dan melakukan pembayaran sebesar Rp' . number_format($booking->serviceReport->total_cost, 2) . '.'. "\n" . "\n" . 'Untuk lebih lengkapnya bisa dicek melalui website' . "\n" . "\n" . 'Terima kasih telah memilih layanan kami! 😊', 
                'countryCode' => '62', 
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: EBZZNboEULjpUPrwUMja'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Periksa respons dari API
        if ($response) {
            // Anda dapat memproses respons jika diperlukan
        }

        return redirect()->route('teknisi.booking.index')->with('success', 'Service sudah selesai dan pesan WhatsApp telah dikirim.');
    }

    public function show($id)
    {
        $booking = Booking::with(['images', 'serviceReport', 'category', 'customer', 'payment'])
            ->findOrFail($id);

        return view('teknisi.booking.detail', compact('booking'));
    }
}
