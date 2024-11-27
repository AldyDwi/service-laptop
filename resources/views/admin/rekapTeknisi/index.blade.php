<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekap Teknisi') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <table id="example" class="stripe hover table-auto" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">Nama Teknisi</th>
                                    <th data-priority="2">Total Service</th>
                                    <th data-priority="3">Jumlah Service (Per Bulan)</th>
                                    <th data-priority="4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapTeknisi as $rekap)
                                <tr class="border-b">
                                    <td>{{ $rekap['name'] }}</td>
                                    <td class="text-center">{{ $rekap['total_service'] }}</td>
                                    <td class="text-center">{{ $rekap['monthly_service'] }}</td>
                                    @if ($rekap['status'] == 'On Job')
                                        <td class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-lg text-white font-semibold">{{ $rekap['status'] }}</span></td>
                                    @elseif ($rekap['status'] == 'Available')
                                        <td class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-lg text-white font-semibold">{{ $rekap['status'] }}</span></td>
                                    @endif
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