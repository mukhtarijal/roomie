<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penyewa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Daftar Penyewa</h3>

                <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100 text-gray-600 text-center">
                            <tr>
                                <th class="px-6 py-4 border-r font-medium">Nama Penyewa</th>
                                <th class="px-6 py-4 border-r font-medium">Nama Kos</th>
                                <th class="px-6 py-4 border-r font-medium">Nomor Kamar</th>
                                <th class="px-6 py-4 border-r font-medium">Jenis Kelamin</th>
                                <th class="px-6 py-4 border-r font-medium">Nomor Telepon</th>
                                <th class="px-6 py-4 border-r font-medium">Mulai Kos</th>
                                <th class="px-6 py-4 font-medium">Tanggal Terakhir Kos</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-center">
                            @foreach ($penyewa as $p)
                                <tr class="hover:bg-gray-50 transition ease-in-out duration-200">
                                    <td class="px-6 py-4 border-b border-r">{{ $p->nama_penyewa }}</td>
                                    <td class="px-6 py-4 border-b border-r">{{ $p->nama_kos }}</td>
                                    <td class="px-6 py-4 border-b border-r">{{ $p->nomor_kamar }}</td>
                                    <td class="px-6 py-4 border-b border-r">{{ $p->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                    <td class="px-6 py-4 border-b border-r">{{ $p->nomor_telepon }}</td>
                                    <td class="px-6 py-4 border-b border-r">{{ $p->mulai_kos }}</td>
                                    <td class="px-6 py-4 border-b">{{ $p->tanggal_terakhir_kos }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
