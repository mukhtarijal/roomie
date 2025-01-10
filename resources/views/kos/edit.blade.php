<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Kos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <form action="{{ route('kos.update', $kos->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-medium">Nama Kos</label>
                        <input type="text" name="nama" id="nama" 
                               value="{{ old('nama', $kos->nama) }}" 
                               class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                        <input type="text" name="address" id="address" 
                               value="{{ old('address', $kos->address) }}" 
                               class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="gender_kos" class="block text-gray-700 font-medium">Jenis Kelamin</label>
                        <select name="gender_kos" id="gender_kos" class="w-full px-4 py-2 border rounded-lg">
                            <option value="P" {{ $kos->gender_kos == 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ $kos->gender_kos == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="available_rooms" class="block text-gray-700 font-medium">Kamar Tersedia</label>
                        <input type="number" name="available_rooms" id="available_rooms" 
                               value="{{ old('available_rooms', $kos->available_rooms) }}" 
                               class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-medium">Harga</label>
                        <input type="text" name="price" id="price" 
                               value="{{ old('price', $kos->price) }}" 
                               class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('kos.index') }}" 
                           class="bg-gray-500 text-white px-4 py-2 rounded shadow-md hover:bg-gray-400 transition ease-in-out duration-200 mr-2">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-green-600 text-white px-4 py-2 rounded shadow-md hover:bg-green-500 transition ease-in-out duration-200">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
