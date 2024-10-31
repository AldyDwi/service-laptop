<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tipe Bayar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('type.update', $type->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block font-medium">Nama Kategori</label>
                            <input type="text" name="name" id="name" value="{{ $type->name }}" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4" required>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white font-semibold rounded-lg p-2 mt-4 h-11 hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('type.index') }}" class="bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>