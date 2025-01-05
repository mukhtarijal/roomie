<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Menampilkan konten berbeda berdasarkan role --}}
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'admin')
                        <div class="bg-blue-500 text-white p-4 rounded-lg">
                            <h3 class="text-xl font-bold">Welcome Admin!</h3>
                            <p>You have full access to manage users, settings, and more.</p>
                        </div>
                    @elseif (Auth::user()->role == 'Owner_kos' || Auth::user()->role == 'owner_kos')
                        <div class="bg-green-500 text-white p-4 rounded-lg">
                            <h3 class="text-xl font-bold">Welcome Owner Kos!</h3>
                            <p>You can manage your kos rooms, see tenants, and update your property.</p>
                        </div>
                    @elseif (Auth::user()->role == 'User' || Auth::user()->role == 'user')
                        <div class="bg-yellow-500 text-white p-4 rounded-lg">
                            <h3 class="text-xl font-bold">Welcome User!</h3>
                            <p>You can view available rooms and check the status of your rental.</p>
                        </div>
                    @else
                        <div class="bg-gray-500 text-white p-4 rounded-lg">
                            <h3 class="text-xl font-bold">Welcome Guest!</h3>
                            <p>You don't have any specific access yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
