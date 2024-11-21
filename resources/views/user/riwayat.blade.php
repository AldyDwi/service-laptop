<x-user>
    <div class="min-h-screen p-5 text-gray-900">
        <h2 class="text-2xl font-semibold mb-10 mt-6">Riwayat Booking</h2>
        <div class="md:grid md:grid-cols-2 lg:grid-cols-4 mb-4">
            @forelse ($bookings as $booking)
                <div class="rounded-lg shadow-lg p-4 w-[20rem] mb-8 bg-yellow-50">
                    <div class="relative left-48 bottom-6 w-20">
                        @if ($booking->status == 'Menunggu')
                            <div class="text-center text-sm"><span class="p-2 bg-slate-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @elseif ($booking->status == 'Ditolak')
                            <div class="text-center text-sm"><span class="p-2 bg-red-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @elseif ($booking->status == 'Diterima')
                            <div class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @elseif ($booking->status == 'Diproses')
                            <div class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @elseif ($booking->status == 'Selesai')
                            <div class="text-center text-sm"><span class="p-2 bg-yellow-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @elseif ($booking->status == 'Dibayar')
                            <div class="text-center text-sm"><span class="p-2 bg-green-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></div>
                        @endif
                    </div>
                    <p class="font-semibold">{{ $booking->booking_number }}</p>
                    <p class="mb-2"> {{ $booking->booking_date->format('d-m-Y') }}</p>
                    <p>{{ $booking->laptop_brand }}</p>
                    <p>{{ $booking->category->name }}</p> 
                    <div class="flex justify-start mt-4">
                        <a href="{{ route('user.booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-24 text-center">Detail</a>
                    </div>
                </div>
            @empty
                <p>Belum ada riwayat booking.</p>
            @endforelse
        </div>
    </div>
</x-user>