<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 max-w-7xl sm:px-6 lg:px-8 mx-5 sm:mx-auto">
            <!-- Kartu Total Booking dan Status -->
            <div class="grid grid-cols-1 gap-5">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Booking</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalBooking }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Menunggu</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalMenunggu }}</p>
                        </div>
                    </div>
                </div>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Diterima</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalDiterima }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Proses</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalProses }}</p>
                        </div>
                    </div>
                </div>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Selesai</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalSelesai }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Dibayar</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalDibayar }}</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Chart Jumlah Booking per Bulan -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg md:col-span-2 lg:col-span-1 lg:row-span-1">
                <div class="p-6 text-gray-900">
                    <p>Jumlah Booking per Bulan</p>
                    <canvas id="bookingsChart" class="mt-2"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- h-[23.5rem] --}}

    <script>
        const bookingsData = @json($bookingsData);
        const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        // Chart untuk Jumlah Booking per Bulan (Bar Chart)
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Booking',
                    data: bookingsData,
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>