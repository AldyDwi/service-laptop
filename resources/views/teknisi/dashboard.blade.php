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

        <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg mx-5 md:mx-6 lg:mx-16 mt-10">
            <div class="p-6 text-gray-900">
                <p class="text-xl font-semibold mb-4">Rekap Teknisi</p>

                <div class="mb-4 flex items-center gap-4">
                    <div>
                        <label for="filter-month" class="font-semibold">Filter Bulan:</label>
                        <select id="filter-month" class="border rounded-lg px-3 py-2 w-40">
                            <option value="">Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>
                    <button id="filter-button" class="bg-cyan-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-cyan-600">
                        Filter
                    </button>
                </div>

                <div class="mt-8">
                    <table id="example" class="stripe hover table-auto" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">Nama Teknisi</th>
                                <th data-priority="2">Total Service</th>
                                <th data-priority="3">Jumlah Service (Per Bulan)</th>
                                <th data-priority="4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekapTeknisi as $rekap)
                            <tr class="border-b">
                                <td>{{ $rekap['name'] }}</td>
                                <td class="text-center">{{ $rekap['total_service'] }}</td>
                                <td class="text-center">{{ $rekap['monthly_service'] }}</td>
                                @if ($rekap['status'] == 'On Job')
                                    <td class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-lg text-white font-semibold">{{ $rekap['status'] }}</span></td>
                                @elseif ($rekap['status'] == 'Available')
                                    <td class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-lg text-white font-semibold">{{ $rekap['status'] }}</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButton = document.getElementById('filter-button');
            const filterMonth = document.getElementById('filter-month');

            filterButton.addEventListener('click', function () {
                const selectedMonth = filterMonth.value;

                // Kirim request AJAX
                fetch(`{{ route('teknisi.dashboard') }}?month=${selectedMonth}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        // Kosongkan tabel sebelumnya
                        const tableBody = document.querySelector('#example tbody');
                        tableBody.innerHTML = '';

                        // Tambahkan data baru ke tabel
                        data.forEach((rekap) => {
                            const row = `
                                <tr class="border-b">
                                    <td>${rekap.name}</td>
                                    <td class="text-center">${rekap.total_service}</td>
                                    <td class="text-center">${rekap.monthly_service}</td>
                                    <td class="text-center text-sm">
                                        <span class="p-2 ${rekap.status === 'On Job' ? 'bg-orange-500' : 'bg-lime-500'} rounded-lg text-white font-semibold">
                                            ${rekap.status}
                                        </span>
                                    </td>
                                </tr>
                            `;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    })
                    .catch((error) => console.error('Error fetching data:', error));
            });
        });
    </script>
</x-app-layout>