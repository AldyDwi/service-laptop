<x-user>
    <div class="mt-10 px-2 md:px-5 lg:px-20 mb-28 min-h-screen text-gray-900">
        <h1 class="font-bold text-cyan-600 text-center text-4xl">List Service</h1>
        <div class="flex justify-center mt-10">
            <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-5">
                @forelse ($services as $service)
                <div class="rounded-2xl h-60 w-80 lg:h-52 lg:w-96 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5 md:mb-0">
                    <div class="flex justify-between bg-slate-900 pt-4 px-4 w-[17rem] lg:w-[21rem] rounded-tl-2xl rounded-br-2xl">
                        <p class="font-semibold text-base mb-2 text-yellow-100">{{ $service->name }}</p>
                    </div>
                    <p class="text-sm text-container h-32 lg:h-[7rem] px-4 pt-4">
                        {{ $service->description }}
                    </p>
                    <div class="px-4 flex justify-between">
                        <p class="font-semibold text-base">
                            Rp {{ number_format($service->price) }}
                        </p>
                        <p class="font-semibold text-base">
                            Estimasi {{ $service->time_estimate }}
                        </p>
                    </div>
                </div>
                @empty
                    <p>Tidak ada list service.</p>
                @endforelse
            </div>
        </div>       
    </div>
</x-user>