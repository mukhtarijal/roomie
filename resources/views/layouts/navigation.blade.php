<nav class="bg-white border-b border-gray-200 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/logo roomie.jpg') }}" alt="Logo" class="block h-9 w-auto">
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden md:flex space-x-8 ml-10 items-center">
                    <!-- Menu for All Users -->
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('dashboard') ? 'text-indigo-600' : '' }}">
                        {{ __('Dashboard') }}
                    </a>

                    <!-- Menu for Admin -->
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'admin')
                        <a href="{{ route('transactions.history') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('transactions.history') ? 'text-indigo-600' : '' }}">
                            {{ __('Riwayat Transaksi') }}
                        </a>
                        <a href="{{ route('admin.settings') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('admin.settings') ? 'text-indigo-600' : '' }}">
                            {{ __('Pengaturan Admin') }}
                        </a>
                    @endif

                    <!-- Menu for Owner_kos -->
                    @if (Auth::user()->role == 'Owner_kos' || Auth::user()->role == 'owner_kos')
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('transactions.history') ? 'text-indigo-600' : '' }}">
                            {{ __('Daftar Penyewa') }}
                        </a>
                        <a href="{{ route('kos_saya') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('transactions.history') ? 'text-indigo-600' : '' }}">
                            {{ __('Kos Saya') }}
                        </a>
                    @endif

                    <!-- Menu for User -->
                    @if (Auth::user()->role == 'User' || Auth::user()->role == 'user')
                        <a href="{{ route('user.orders') }}" class="text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out {{ request()->routeIs('user.orders') ? 'text-indigo-600' : '' }}">
                            {{ __('Pesanan Saya') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Mobile Hamburger Menu -->
            <div x-data="{ open: false }" class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Mobile Menu Dropdown -->
                <div x-show="open" x-cloak class="absolute top-16 left-0 w-full bg-white shadow-md z-10">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                            {{ __('Dashboard') }}
                        </a>
                        <!-- Additional links for mobile here -->
                    </div>
                </div>
            </div>

            <!-- User Settings Dropdown -->
            <div x-data="{ open: false }" class="hidden md:flex md:items-center md:ml-6 relative">
                <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium text-gray-600 hover:text-indigo-600 focus:outline-none transition duration-300 ease-in-out">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Log Out') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
