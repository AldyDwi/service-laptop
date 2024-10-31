<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.customer.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="md:flex justify-start items-start mt-4">
                            <div class="md:w-2/5">
                                <div class="mb-4">
                                    <label for="name" class="block font-medium">Nama</label>
                                    <input type="text" name="name" id="name" placeholder="Type here" class="input input-bordered w-96 max-w-md mt-2" value="{{ old('name') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block font-medium">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Type here" class="input input-bordered w-96 max-w-md mt-2" value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="block font-medium">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Type here" class="input input-bordered w-96 max-w-md mt-2" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Type here" class="input input-bordered w-96 max-w-md mt-2" required>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <div class="form-group mb-4">
                                    <label for="hp" class="block font-medium">No Hp</label>
                                    <input type="text" name="hp" id="hp" placeholder="Type here" class="input input-bordered w-96 max-w-md mt-2" value="{{ old('hp') }}" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="alamat" class="block font-medium">Alamat</label>
                                    <textarea name="alamat" id="alamat" placeholder="Type here" class="textarea textarea-bordered w-96 mt-2 h-36" required>{{ old('alamat') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-ghost bg-green-500 text-white font-semibold rounded-lg p-2 mr-2 h-11 text-base hover:bg-green-600">Simpan</button>
                                <a href="{{ route('user.customer.index') }}" class="btn btn-ghost bg-red-500 text-white font-semibold rounded-lg p-3 text-base hover:bg-red-600">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
