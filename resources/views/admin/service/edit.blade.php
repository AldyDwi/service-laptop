<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit List Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.list.update', $listService->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="md:flex justify-start items-start">
                            <div class="md:w-2/5">
                                <div class="mb-4">
                                    <label for="category_id">Kategori</label><br>
                                    <select name="category_id" id="category_id" class="select select-bordered border-slate-400 p-2 mt-1 w-full max-w-md text-base pl-4" required>
                                        <option>Pilih Kategori</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $listService->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="name" class="block font-medium">Nama Service</label>
                                    <input type="text" name="name" id="name" placeholder="Type here" class="border-slate-400 input mt-1 input-bordered w-full max-w-md" value="{{ $listService->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="block font-medium">Deskripsi</label>
                                    <textarea name="description" id="description" class="border-slate-400 textarea textarea-bordered w-full max-w-md" rows="4" placeholder="Type here">{{ $listService->description }}</textarea>
                                </div>
                            </div>

                            <div class="md:w-3/5 md:pl-5">
                                <div class="form-group mb-4">
                                    <label for="time_estimate" class="block font-medium">Estimasi Waktu</label>
                                    <input type="text" name="time_estimate" id="time_estimate" placeholder="Type here" class="border-slate-400 input mt-1 input-bordered w-full max-w-md" value="{{ $listService->time_estimate }}" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="price" class="block font-medium">Estimasi Harga</label>
                                    <input type="text" name="price" id="price" placeholder="Type here" class="border-slate-400 input mt-1 input-bordered w-full max-w-md" value="{{ $listService->price }}" required>
                                </div>
                                <button type="submit" class="btn btn-ghost bg-orange-500 text-white font-semibold rounded-lg p-2 mt-4 h-11 w-20 hover:bg-orange-600 text-base">Edit</button>
                                <a href="{{ route('admin.list.index') }}" class="bg-red-500 text-white font-semibold rounded-lg p-3 mt-4 hover:bg-red-600 btn btn-ghost text-base">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>