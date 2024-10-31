<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Teknisi') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <a href="{{ route('user.teknisi.create') }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-3 hover:bg-blue-600">Tambah</a>
                    </div>
                    <div class="mt-8">
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">Id</th>
                                    <th data-priority="2">Nama</th>
                                    <th data-priority="3">Email</th>
                                    <th data-priority="4">No Hp</th>
                                    <th data-priority="5">Alamat</th>
                                    <th data-priority="6">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teknisis as $teknisi)
                                <tr class="border-b">
                                    <td class="text-center">{{ $teknisi->id }}</td>
                                    <td>{{ $teknisi->name }}</td>
                                    <td>{{ $teknisi->email }}</td>
                                    <td>{{ $teknisi->hp }}</td>
                                    <td>{{ $teknisi->alamat }}</td>
                                    <td>
                                        <div class="flex justify-center">
                                            <a href="{{ route('user.teknisi.edit', $teknisi->id) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-orange-600 mr-2 w-20 text-center">Edit</a>
                                            <button onclick="confirmDelete({{ $teknisi->id }})" class="btn btn-ghost bg-red-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-red-600 w-20 text-center">Hapus</button>
                                            <form id="delete-form-{{ $teknisi->id }}" action="{{ route('user.teknisi.destroy', $teknisi->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>