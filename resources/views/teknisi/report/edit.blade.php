<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report Service') }}
        </h2>
    </x-slot>

    <div class="py-12" style="color-scheme: light;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="font-semibold">No Booking: {{ $bookings->booking_number }}</p>
                    <form  action="{{ route('report.update', ['id' => $report->id, 'booking_id' => $bookings->id]) }}" method="POST" class="mt-4 bg-white">
                        @csrf
                        @method('PUT')
                        <div class="md:flex justify-start items-start">
                            <div class="md:w-2/5">                             
                                <div class="form-group mb-4">
                                    <label for="diagnosis">Diagnosis</label><br>
                                    <textarea name="diagnosis" id="diagnosis" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md bg-white" rows="4" required>{{ $report->diagnosis }}</textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="action_taken">Tindakan yang Diambil</label><br>
                                    <textarea name="action_taken" id="action_taken" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md bg-white" rows="4" required>{{ $report->action_taken }}</textarea>
                                </div>        
                            </div>
    
                            <div class="md:w-3/5 md:pl-5">     
                                <div class="form-group mb-4">
                                    <label for="time_estimate">Estimasi Waktu</label><br>
                                    <input type="text" name="time_estimate" id="time_estimate" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white" value="{{ $report->time_estimate }}" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="service_cost">Biaya Service</label><br>
                                    <input type="text" name="service_cost" id="service_cost" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white" value="{{ $report->service_cost }}" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="parts_cost">Biaya Spare Part</label><br>
                                    <input type="text" name="parts_cost" id="parts_cost" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white" value="{{ $report->parts_cost }}" required>
                                </div>                                                     
                            
                                <button type="submit" class="btn btn-ghost text-base bg-orange-500 text-white font-semibold rounded-lg p-3 w-20 mt-5 h-11 hover:bg-orange-600">Edit</button>
                                <a href="{{ route('teknisi.booking.index') }}" class="btn btn-ghost text-base bg-red-500 text-white font-semibold rounded-lg p-3 mt-5 hover:bg-red-600">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>