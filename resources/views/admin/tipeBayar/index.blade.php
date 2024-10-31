<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipe Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <a href="{{ route('type.create') }}" class="btn btn-ghost bg-cyan-500 text-white font-semibold text-base rounded-lg p-3 hover:bg-blue-600">Tambah</a>
                    </div>
                    <div class="mt-8">
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">Id</th>
                                    <th data-priority="2">Nama</th>
                                    <th data-priority="4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                <tr class="border-b">
                                    <td class="text-center">{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        <div class="flex justify-center">
                                            <a href="{{ route('type.edit', $type->id) }}" class="btn btn-ghost bg-orange-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-orange-600 mr-2 w-20 text-center">Edit</a>
                                            <button onclick="confirmDelete({{ $type->id }})" class="btn btn-ghost bg-red-500 text-white font-semibold text-base rounded-lg p-2 hover:bg-red-600 w-20 text-center">Hapus</button>
                                            <form id="delete-form-{{ $type->id }}" action="{{ route('type.destroy', $type->id) }}" method="POST" style="display: none;">
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