<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="font-semibold">No Booking: {{ $bookings->booking_number }}</p>
                    <form  action="{{ route('report.store', $bookings->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="md:flex justify-start items-start">
                            <div class="md:w-2/5">                             
                                <div class="form-group mb-4">
                                    <label for="diagnosis">Diagnosis</label><br>
                                    <textarea name="diagnosis" id="diagnosis" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md bg-white mt-1" rows="4" required></textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="action_taken">Tindakan yang Diambil</label><br>
                                    <textarea name="action_taken" id="action_taken" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md bg-white mt-1" rows="4" required></textarea>
                                </div>        
                            </div>
    
                            <div class="md:w-3/5 md:pl-5">     
                                <div class="form-group mb-4">
                                    <label for="time_estimate">Estimasi Waktu</label><br>
                                    <input type="text" name="time_estimate" id="time_estimate" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white mt-1" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="service_cost">Biaya Service</label><br>
                                    <input type="text" name="service_cost" id="service_cost" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white mt-1" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="parts_cost">Biaya Spare Part</label><br>
                                    <input type="text" name="parts_cost" id="parts_cost" placeholder="Type here" class="input input-bordered w-full max-w-md bg-white mt-1" required>
                                </div>                                                     
                            
                                <button type="submit" class="btn btn-ghost bg-yellow-500 text-white rounded-md text-base hover:bg-yellow-600 mt-5">Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>