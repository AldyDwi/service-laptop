<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="md:flex justify-start items-start mt-2">
                        <div class="md:w-3/5">
                            @if ($report)
                                <h1 class="font-semibold text-xl">Laporan</h1>
                                <p class="mb-2 mt-4">Diagnosis</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                    <p>{{ $report->diagnosis }}</p>
                                </div>
                                <p class="mb-2 mt-3">Tindakan yang diambil</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                    <p>{{ $report->action_taken }}</p>
                                </div>
                                <p class="mb-4 mt-3">Total biaya</p>
                                <div class="p-3 rounded-md bg-gray-200 w-[35rem]">
                                    <p>Rp {{ number_format($report->total_cost, 2) }}</p>
                                </div>
                            @else
                                <p>No report available for this booking.</p>
                            @endif
                        </div>
                        <div class="md:w-2/5">
                            <h1 class="font-semibold text-xl">Form Edit Bayar</h1>
                            <form action="{{ route('payment.update', ['id' => $payment->id, 'booking_id' => $payment->booking_id]) }}" method="POST" class="mt-4">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="payment_type_id">Tipe Pembayaran</label><br>
                                    <select name="payment_type_id" id="payment_type_id" class="select select-bordered w-full max-w-md mt-2" required>
                                        <option value="">Pilih Tipe</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ $type->id == $payment->payment_type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="amount" class="block font-medium">Jumlah Pembayaran</label>
                                    <input type="text" name="amount" id="amount" class="border border-slate-400 rounded-lg p-2 mt-2 w-[28rem]" value="{{ $payment->amount }}" required>
                                </div>
                                <button type="submit" class="btn btn-ghost text-base bg-orange-500 text-white font-semibold rounded-lg p-2 mt-4 h-11 hover:bg-orange-600 w-20">Edit</button>
                                <a href="{{ route('payment.index') }}" class="btn btn-ghost text-base bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>