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
                    {{-- Menampilkan view berdasarkan role --}}
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'admin')
                        @include('roles.admin')
                    @elseif (Auth::user()->role == 'Owner_kos' || Auth::user()->role == 'owner_kos')
                        @include('roles.owner_kos')
                    @elseif (Auth::user()->role == 'User' || Auth::user()->role == 'user')
                        @include('roles.user')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
