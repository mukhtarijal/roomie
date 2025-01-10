<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kos Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Toastify({
                        text: "{{ session('success') }}",
                        duration: 3000, 
                        close: true,
                        gravity: "top", 
                        position: "right", 
                        backgroundColor: "#4CAF50", // Warna hijau untuk sukses
                    }).showToast();
                });
            </script>
        @endif

        <h1 class="text-3xl font-semibold mb-4 text-gray-800 text-center">Daftar Kos Saya</h1><br><br>

        <div class="mb-4">
            <!-- Flex container for right alignment -->
            <div class="flex justify-end">
                <a href="{{ route('kos.create') }}" 
                class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600 transition ease-in-out duration-300 transform hover:scale-105">
                    Tambah Kos
                </a>
            </div>
        </div>


            <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-800 text-white text-center">
                        <tr>
                            <th class="px-6 py-4 border-r font-medium">Nama Kost</th>
                            <th class="px-6 py-4 border-r font-medium">Alamat</th>
                            <th class="px-6 py-4 border-r font-medium">Jenis Kelamin</th>
                            <th class="px-6 py-4 border-r font-medium">Kamar Tersedia</th>
                            <th class="px-6 py-4 border-r font-medium">Harga</th>
                            <th class="px-6 py-4 font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-center">
                        @foreach ($kos as $k)
                            <tr class="hover:bg-gray-50 transition ease-in-out duration-200">
                                <td class="px-6 py-4 border-b border-r">{{ $k->nama }}</td>
                                <td class="px-6 py-4 border-b border-r">{{ $k->address }}</td>
                                <td class="px-6 py-4 border-b border-r">{{ $k->gender_kos == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                <td class="px-6 py-4 border-b border-r">{{ $k->available_rooms }}</td>
                                <td class="px-6 py-4 border-b border-r">{{ number_format($k->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 border-b flex justify-center space-x-2">
                                <a href="{{ route('kos.edit', $k->id) }}" 
                                    class="bg-green-600 text-white px-4 py-2 rounded shadow-md hover:bg-green-500 transition ease-in-out duration-200">
                                        Edit
                                    </a>
                                    <form action="{{ route('kos.destroy', $k->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 text-white px-4 py-2 rounded shadow-md hover:bg-red-500 transition ease-in-out duration-200"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
