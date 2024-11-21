<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block font-medium">Nama Kategori</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4" required>
                        </div>
                        <div class="mt-4">
                            <label for="description" class="block font-medium">Deskripsi</label>
                            <textarea name="description" id="description" class="border border-slate-400 rounded-lg p-2 mt-1 w-2/4 h-32">{{ $category->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-ghost text-base bg-orange-500 text-white font-semibold rounded-lg p-2 w-20 mt-4 h-11 hover:bg-orange-600">Edit</button>
                        <a href="{{ route('category') }}" class="btn btn-ghost text-base bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>