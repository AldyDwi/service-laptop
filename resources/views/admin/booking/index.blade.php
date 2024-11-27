<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Service') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center mb-4">
                        <div class="mr-2">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                            <input type="date" id="start_date" name="start_date" class="mt-1 p-2 border rounded-lg">
                        </div>
                        <div class="mr-2">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                            <input type="date" id="end_date" name="end_date" class="mt-1 p-2 border rounded-lg">
                        </div>
                        <div class="mt-6">
                            <button id="filter_button" class="px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 font-semibold w-20">
                                Filter
                            </button>
                        </div>
                    </div>

                    <div class="mt-8">
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    {{-- <th data-priority="1">Id</th> --}}
                                    <th data-priority="1">No. booking</th>
                                    <th data-priority="2">Customer</th>
                                    <th data-priority="3">Kategori</th>
                                    <th data-priority="4">Merk Laptop</th>
                                    <th data-priority="5">Tipe Laptop</th>
                                    <th data-priority="6">Masalah</th>
                                    <th data-priority="7">tgl Booking</th>
                                    <th data-priority="8">Catatan</th>
                                    <th data-priority="9">Status</th>
                                    <th data-priority="10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr class="border-b">
                                    {{-- <td class="text-center">{{ $booking->id }}</td> --}}
                                    <td>{{ $booking->booking_number }}</td>
                                    <td>{{ $booking->customer->name }}</td>
                                    <td>{{ $booking->category->name }}</td>
                                    <td>{{ $booking->laptop_brand }}</td>
                                    <td>{{ $booking->laptop_type }}</td>
                                    <td>{{ $booking->problem_description }}</td>
                                    <td class="text-center">{{ $booking->booking_date->format('d-m-Y') }}</td>
                                    <td>{{ $booking->notes }}</td>
                                    @if ($booking->status == 'Menunggu')
                                        <td class="text-center text-sm"><span class="p-2 bg-slate-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @elseif ($booking->status == 'Ditolak')
                                        <td class="text-center text-sm"><span class="p-2 bg-red-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @elseif ($booking->status == 'Diterima')
                                        <td class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @elseif ($booking->status == 'Diproses')
                                        <td class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @elseif ($booking->status == 'Selesai')
                                        <td class="text-center text-sm"><span class="p-2 bg-yellow-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @elseif ($booking->status == 'Dibayar')
                                        <td class="text-center text-sm"><span class="p-2 bg-green-500 rounded-lg text-white font-semibold">{{ $booking->status }}</span></td>
                                    @endif
                                    <td>
                                        @if ($booking->status == 'Menunggu')
                                            <div class="flex justify-center">
                                                <button onclick="confirmReceipt({{ $booking->id }})" class="btn btn-ghost bg-green-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-green-600 mr-2 w-20 text-center">Terima</button>
                                                <form id="accept-form-{{ $booking->id }}" action="{{ route('booking.terima', $booking->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>

                                                <button onclick="confirmReject({{ $booking->id }})" class="btn btn-ghost bg-red-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-red-600 mr-2 w-20 text-center">Tolak</button>
                                                <form id="reject-form-{{ $booking->id }}" action="{{ route('booking.tolak', $booking->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
                                            </div>
                                        @elseif ($booking->status == 'Selesai')
                                            <div class="flex justify-center">
                                                <a href="{{ route('payment.create', $booking->id) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-orange-600 mr-2 w-20 text-center">Bayar</a>
                                                <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
                                            </div>
                                        @else
                                            <div class="flex justify-center">
                                                <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                             
                            </tbody>
                        </table>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>