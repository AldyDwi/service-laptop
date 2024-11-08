<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 pb-24">
        <div class="flex justify-between items-start">
            <div class="sm:px-6 lg:px-8 w-1/2">
                <div class="flex justify-between">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Booking</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalBooking }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Menunggu</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalMenunggu }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Diterima</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalDiterima }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Proses</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalProses }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Selesai</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalSelesai }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-72 h-28">
                        <div class="p-6 text-gray-900">
                            <p>Total Dibayar</p>
                            <p class="text-3xl font-bold mt-2">{{ $totalDibayar }}</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between w-1/2">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg w-[37.3rem] h-[23.5rem]">
                    <div class="p-6 text-gray-900">
                        <p>Jumlah Booking per Bulan</p>
                        <canvas id="bookingsChart" class="w-96 mt-2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

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