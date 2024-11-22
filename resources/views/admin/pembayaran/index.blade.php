<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembayaran') }}
        </h2>
    </x-slot>

    {{-- 'booking_id',
        'payment_type_id',
        'amount',
        'change_amount',
        'payment_date', --}}

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-8">
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">No. Booking</th>
                                    <th data-priority="2">Nama</th>
                                    <th data-priority="4">Service</th>
                                    <th data-priority="5">Tindakan</th>
                                    <th data-priority="2">Tipe Bayar</th>
                                    <th data-priority="3">Total Biaya</th>
                                    <th data-priority="6">Tgl Bayar</th>
                                    <th data-priority="7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr class="border-b">
                                    <td class="text-center">{{ $payment->booking->booking_number }}</td>
                                    <td class="text-center">{{ $payment->booking->customer->name }}</td>
                                    <td>{{ $payment->booking->problem_description }}</td>
                                    <td>{{ $payment->booking->serviceReport->action_taken }}</td>
                                    <td class="text-center">{{ $payment->paymentType->name }}</td>
                                    <td>Rp {{ number_format($payment->booking->serviceReport->total_cost) }}</td>
                                    <td class="text-center">{{ $payment->payment_date->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="flex justify-center">
                                            <a href="{{ route('payment.edit', ['id' => $payment->id, 'booking_id' => $payment->booking_id]) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-orange-600 mr-2 w-20 text-center">Edit</a>
                                        </div>
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