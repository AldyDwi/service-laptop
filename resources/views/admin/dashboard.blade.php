<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-5 sm:mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Booking</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalBooking }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Menunggu</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalMenunggu }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Diterima</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalDiterima }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Proses</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalProses }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Selesai</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalSelesai }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Dibayar</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalDibayar }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Jumlah Customer</p>
                    <p class="text-3xl font-bold mt-2">{{ $roleUserCount }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Jumlah Teknisi</p>
                    <p class="text-3xl font-bold mt-2">{{ $roleTeknisiCount }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-5 sm:mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg h-28">
                <div class="p-6 text-gray-900">
                    <p>Total Pendapatan</p>
                    <p class="text-3xl font-bold mt-2">Rp {{ number_format($totalPendapatan) }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-5 sm:mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-5 mt-5">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <p>Jumlah Booking per Bulan</p>
                    <canvas id="bookingsChart" class="w-full mt-2"></canvas>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <p>Total Pendapatan per Bulan</p>
                    <canvas id="revenueChart" class="w-full mt-2"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingsData = @json($bookingsData);
        const revenueData = @json($revenueData);
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

        // Chart untuk Total Pendapatan per Bulan (Line Chart)
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Pendapatan (Rp)',
                    data: revenueData,
                    fill: false,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.1
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