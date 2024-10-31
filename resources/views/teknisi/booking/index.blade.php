<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Service') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    {{-- <th data-priority="1">Id</th> --}}
                                    <th data-priority="1">No booking</th>
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
                                        @if ($booking->status == 'Diterima')
                                            <div class="flex justify-center">
                                                <a href="{{ route('report.create', $booking->id) }}" class="btn btn-ghost bg-yellow-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-yellow-600 mr-2 w-20 text-center">Proses</a>

                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
                                            </div>
                                        @elseif ($booking->status == 'Diproses')
                                            <div class="flex justify-center">
                                                <button onclick="confirmFinish({{ $booking->id }})" class="btn btn-ghost bg-lime-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-lime-600 mr-2 w-20 text-center">Selesai</button>
                                                <form id="finish-form-{{ $booking->id }}" action="{{ route('booking.selesai', $booking->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <a href="{{ route('report.edit', ['id' => $booking->serviceReport->id, 'booking_id' => $booking->id] ) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-orange-600 mr-2 w-28 text-center">Edit Proses</a>
                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
                                            </div>
                                        @else
                                            <div class="flex justify-center">
                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-cyan-600 mr-2 w-20 text-center">Detail</a>
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