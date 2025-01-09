<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kos Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <button onclick="toggleModal('addKosModal')" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah
                    Kos</button>
            </div>

            <h3 class="text-lg font-bold mb-4">Daftar Kos Saya</h3>

            <table class="min-w-full table-auto border-collapse mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Nama Kost</th>
                        <th class="px-4 py-2 border">Alamat</th>
                        <th class="px-4 py-2 border">Jenis Kelamin</th>
                        <th class="px-4 py-2 border">Kamar Tersedia</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Nomor HP</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kos as $k)
                        <tr>
                            <td class="px-4 py-2 border">{{ $k->name }}</td>
                            <td class="px-4 py-2 border">{{ $k->address }}</td>
                            <td class="px-4 py-2 border">{{ $k->gender }}</td>
                            <td class="px-4 py-2 border">{{ $k->available_rooms }}</td>
                            <td class="px-4 py-2 border">{{ number_format($k->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border">{{ $k->phone }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('kos.edit', $k) }}" class="text-blue-500">Edit</a> |
                                <form action="{{ route('kos.destroy', $k) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Kos -->
    <div id="addKosModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-11/12 md:w-3/4 lg:w-2/3 max-h-full overflow-y-auto rounded-lg shadow-lg">
            <div class="p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-700">Daftar Kos Baru</h3>
                <form id="kosForm" method="POST" action="{{ route('kos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Input Fields -->
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700">Nama Kost</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700">Alamat Kost</label>
                            <input type="text" id="address" name="address"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="gender_kos" class="block text-gray-700">Jenis Kelamin Penyewa</label>
                            <select id="gender_kos" name="gender_kos"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                                <option value="Campur">Campur</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="available_rooms" class="block text-gray-700">Jumlah Kamar Tersedia</label>
                            <input type="number" id="available_rooms" name="available_rooms"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Harga</label>
                            <input type="number" id="price" name="price"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700">Nomor HP</label>
                            <input type="tel" id="phone_number" name="phone_number"
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <!-- Upload Fields -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-bold">Upload Foto Kost</label>
                            <input type="file" name="foto_kost[]"
                                class="block w-full border mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                accept="image/*" multiple required>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-bold">Upload Foto Kamar</label>
                            <input type="file" name="foto_kamar[]"
                                class="block w-full border mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                accept="image/*" multiple required>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-bold">Upload Foto Kamar Mandi</label>
                            <input type="file" name="foto_kamar_mandi[]"
                                class="block w-full border mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                accept="image/*" multiple required>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-bold">Upload Foto Fasilitas Bersama</label>
                            <input type="file" name="foto_fasilitas_bersama[]"
                                class="block w-full border mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                accept="image/*" multiple required>
                        </div>
                        <input type="hidden" name="status" value="0">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between items-center mt-6">
                        <button type="button" onclick="toggleModal('addKosModal')"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <div class="space-x-2">
                            <button type="button" onclick="submitForm(2)"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Daftar Biasa - Rp 10.000</button>
                            <button type="button" onclick="submitForm(3)"
                                class="bg-green-500 text-white px-4 py-2 rounded">Daftar Prioritas - Rp 30.000</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Pembayaran -->
    <div id="paymentModal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-11/12 md:w-3/4 lg:w-2/3 rounded-lg shadow-lg">
            <div class="p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-700">Pembayaran</h3>
                <div id="paymentInfo" class="mb-4 text-gray-600">
                    <!-- Info tentang jenis pendaftaran akan diisi melalui JavaScript -->
                </div>
                <form id="paymentForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border rounded-lg p-4">
                            <label class="block text-center">
                                <input type="radio" name="payment_method" value="Transfer Bank" class="mr-2">
                                <h4 class="font-bold text-gray-700 mb-2">Transfer Bank</h4>
                                <p class="text-sm text-gray-600">Silakan transfer ke rekening: <br> **1234567890**
                                    (Bank A)</p>
                            </label>
                        </div>
                        <div class="border rounded-lg p-4">
                            <label class="block text-center">
                                <input type="radio" name="payment_method" value="E-Wallet" class="mr-2">
                                <h4 class="font-bold text-gray-700 mb-2">E-Wallet</h4>
                                <p class="text-sm text-gray-600">Gunakan OVO, GoPay, atau Dana ke nomor: <br>
                                    **081234567890**</p>
                            </label>
                        </div>
                        <div class="border rounded-lg p-4">
                            <label class="block text-center">
                                <input type="radio" name="payment_method" value="Virtual Account" class="mr-2">
                                <h4 class="font-bold text-gray-700 mb-2">Virtual Account</h4>
                                <p class="text-sm text-gray-600">Kode VA: <br> **9876543210**</p>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <button type="button" onclick="toggleModal('paymentModal')"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <button type="button" onclick="confirmPayment()"
                            class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    < <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
        }

        function submitForm(status) {
            const form = document.getElementById('kosForm');
            const statusInput = form.querySelector('input[name="status"]');
            statusInput.value = status;
            form.submit();
        }

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function setStatusAndSubmit(status) {
            const form = document.getElementById('kosForm');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'status';
            input.value = status;
            form.appendChild(input);
            form.submit();
        }

        function openPaymentModal(status, info) {
            // Simpan status ke form
            const form = document.getElementById('kosForm');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'status';
            input.value = status;
            form.appendChild(input);

            // Tampilkan modal pembayaran
            document.getElementById('paymentInfo').textContent =
                `Anda memilih ${info}. Silakan selesaikan pembayaran Anda.`;
            toggleModal('paymentModal');
        }

        function confirmPayment() {
            const selectedPayment = document.querySelector('input[name="payment_method"]:checked');
            if (!selectedPayment) {
                alert('Silakan pilih metode pembayaran.');
                return;
            }

            const paymentMethod = selectedPayment.value;
            alert(`Metode pembayaran yang dipilih: ${paymentMethod}`);
            // Lakukan proses berikutnya seperti mengirim data ke server
            toggleModal('paymentModal');
        }
    </script>
</x-app-layout>
