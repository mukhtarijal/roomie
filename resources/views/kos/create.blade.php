<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 mb-4 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama Kos:</label>
                        <input type="text" id="nama" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700">Alamat:</label>
                        <textarea id="address" name="address" class="w-full border rounded px-3 py-2" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="available_rooms" class="block text-gray-700">Jumlah Kamar Tersedia:</label>
                        <input type="number" id="available_rooms" name="available_rooms" class="w-full border rounded px-3 py-2" value="{{ old('available_rooms') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="gender_kos" class="block text-gray-700">Jenis Kelamin Kos:</label>
                        <select id="gender_kos" name="gender_kos" class="w-full border rounded px-3 py-2" required>
                            <option value="L" {{ old('gender_kos') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender_kos') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Campur" {{ old('gender_kos') == 'Campur' ? 'selected' : '' }}>Campur</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700">Harga:</label>
                        <input type="number" id="price" name="price" class="w-full border rounded px-3 py-2" value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700">Nomor HP:</label>
                        <input type="text" id="phone_number" name="phone_number" class="w-full border rounded px-3 py-2" value="{{ old('phone_number') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status:</label>
                        <select id="status" name="status" class="w-full border rounded px-3 py-2" required>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Belum Tersedia</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Tersedia</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Penuh</option>
                            <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Renovasi</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="foto_kost" class="block text-gray-700">Foto Kost:</label>
                        <input type="file" id="foto_kost" name="foto_kost" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="foto_kamar" class="block text-gray-700">Foto Kamar:</label>
                        <input type="file" id="foto_kamar" name="foto_kamar" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="foto_kamar_mandi" class="block text-gray-700">Foto Kamar Mandi:</label>
                        <input type="file" id="foto_kamar_mandi" name="foto_kamar_mandi" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="foto_fasilitas_bersama" class="block text-gray-700">Foto Fasilitas Bersama:</label>
                        <input type="file" id="foto_fasilitas_bersama" name="foto_fasilitas_bersama" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
