<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Testimoni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::user()->role_id == '1')
                    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" class="mt-4">
                    @else
                    <form action="{{ route('testimonial.update', ['id' => $testimonial->id, 'booking_id' => $bookings->id]) }}" method="POST" class="mt-4">
                    @endif
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select name="rating" id="rating" class="form-control mt-1 border-slate-400 rounded-lg" value="{{ $testimonial->rating }}" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ (old('rating') == $i || (isset($testimonial) && $testimonial->rating == $i)) ? 'selected' : '' }}>
                                        {{ $i }} ★
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4 form-group">
                            <label for="description" class="block font-medium">Deskripsi</label>
                            <textarea name="description" id="description" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4 h-32">{{ $testimonial->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-ghost text-base bg-orange-500 text-white font-semibold rounded-lg p-3 w-20 mt-4 h-11 hover:bg-orange-600">Edit</button>
                        @if (Auth::user()->role_id == '1')
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-ghost text-base bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                        @else
                            <a href="{{ route('user.booking.show', $bookings->id) }}" class="btn btn-ghost text-base bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>