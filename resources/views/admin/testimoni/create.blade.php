<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Testimoni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('testimonial.store', $bookings->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="form-group">
                            {{-- <label for="name" class="block font-medium">Rating</label>
                            <input type="text" name="name" id="name" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4" required> --}}
                            <label for="rating">Rating:</label>
                            <select name="rating" id="rating" class="form-control mt-1 border-slate-400 rounded-lg" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ (old('rating') == $i || (isset($testimonial) && $testimonial->rating == $i)) ? 'selected' : '' }}>
                                        {{ $i }} ★
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4 form-group">
                            <label for="description" class="block font-medium">Deskripsi</label>
                            <textarea name="description" id="description" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4 h-32"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white font-semibold rounded-lg p-2 mt-4 h-11 hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('user.booking.show', $bookings->id) }}" class="bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>