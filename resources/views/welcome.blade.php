<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomie - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes popUp {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        .slide-in {
            animation: slideIn 1.5s ease-in-out;
        }

        .pop-up {
            animation: popUp 1.5s ease-in-out;
        }

        .hero-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .description-image {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed top-0 w-full z-10">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <!-- Perbesar logo dan teks -->
                <img src="{{ asset('storage/logo roomie.jpg') }}" alt="Roomie Logo" class="h-16 md:h-20">
                <!-- Perbesar ukuran logo -->
            </div>
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="#tentang-kami" class="nav-link hover:text-green-600">About Us</a></li>
                <li><a href="#" class="hover:text-green-600">Masuk Sebagai Pemilik Kos</a></li>
                <li><a href="#" class="hover:text-green-600">Login</a></li>
                <li><a href="#" class="hover:text-green-600">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div
        class="hero bg-gradient-to-r from-white-400 to-white-600 text-black py-16 text-center relative overflow-hidden mt-16">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="w-full md:w-1/2 pop-up pr-4">
                <h1 class="text-4xl font-bold mb-4 slide-in">Temukan Kos Impianmu Dengan Mudah Dan Cepat Bersama <span
                        class="text-green-600">Roomie</span></h1>
                <p class="text-lg mb-6 fade-in">Roomie menyediakan berbagai pilihan kos yang dapat disesuaikan dengan
                    kebutuhan Anda, mulai dari harga, lokasi, hingga fasilitas lengkap. Temukan kos yang nyaman dan
                    cocok hanya dalam beberapa klik.</p>
                <a href="#"
                    class="inline-block bg-green-500 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-green-500 transition">Mulai
                    Cari Kos</a>
            </div>
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/kamar.jpg') }}" alt="Room Image"
                    class="hero-image pop-up rounded-tl-none rounded-tr-[100px] rounded-bl-[100px] rounded-br-none object-cover">
            </div>
        </div>
    </div>

    <!-- Tentang Kami Section -->
    <div id="tentang-kami"
        class="tentang-kami bg-gradient-to-r from-white-600 to-green-800 text-white text-center py-16">
        <div class="container mx-auto px-4 pop-up">
            <div class="bg-green-600 text-white p-8 rounded-lg shadow-lg mx-auto max-w-4xl">
                <h2 class="text-3xl font-bold mb-6 slide-in">Tentang Kami</h2>
                <p class="text-lg leading-relaxed fade-in mb-6">Roomie hadir khusus untuk memenuhi kebutuhan pencarian
                    kos di wilayah Kota Padang. Kami fokus menyediakan berbagai fitur dan kos sesuai kebutuhan dalam
                    satu platform. Menawarkan pengalaman mudah dengan informasi yang lengkap, Roomie siap membantu
                    menemukan kos idaman Anda. Dengan desain yang elegan, proses pencarian kos bagi siapa saja yang
                    berada di Kota Padang kini lebih cepat dan mudah!</p>
            </div>
        </div>
    </div>

    <!-- Solusi Section -->
    <div class="solusi py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 slide-in">Solusi Terbaik Untuk Pencarian Kos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center relative">
                <!-- Left Side: Images -->
                <div class="relative md:col-span-1 mb-8 md:mb-0">
                    <img src="{{ asset('storage/a.jpg') }}" alt="Image 1"
                        class="absolute top-0 left-0 w-64 h-64 rounded-lg z-10">
                    <img src="{{ asset('storage/b.jpg') }}" alt="Image 2"
                        class="absolute top-16 left-12 w-72 h-72 rounded-lg z-0">
                </div>
                <!-- Right Side: Text -->
                <div class="md:col-span-2 flex flex-col justify-center space-y-8">
                    <div class="flex items-center space-x-4">
                        <span class="text-2xl font-semibold text-green-600">01.</span>
                        <p class="text-xl font-semibold text-gray-800">Cepat & Efisien</p>
                    </div>
                    <p class="text-gray-600 mb-8 text-left">Roomie memberikan kemudahan pencarian kos dalam waktu
                        singkat.</p>

                    <div class="flex items-center space-x-4">
                        <span class="text-2xl font-semibold text-green-600">02.</span>
                        <p class="text-xl font-semibold text-gray-800">Pilihan Beragam</p>
                    </div>
                    <p class="text-gray-600 mb-8 text-left">Beragam pilihan kos sesuai kebutuhan dan budget Anda.</p>

                    <div class="flex items-center space-x-4">
                        <span class="text-2xl font-semibold text-green-600">03.</span>
                        <p class="text-xl font-semibold text-gray-800">Terpercaya</p>
                    </div>
                    <p class="text-gray-600 text-left">Dapatkan informasi terpercaya langsung dari pemilik kos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="py-16 text-gray-800 py-10">
        <div class="container mx-auto px-6 text-center">
            <div class="bg-gray-200 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
                <p class="text-xl font-semibold mb-4">Hubungi Kami</p>
                <p class="text-lg mb-4">
                    <a href="tel:+628123456789" class="text-green-500 hover:underline">
                        <i class="fas fa-phone-alt mr-2"></i>+62 8123 0987
                    </a>
                    |
                    <a href="#" class="text-green-500 hover:underline ml-2">
                        <i class="fab fa-facebook-f mr-2"></i>Facebook
                    </a>
                    |
                    <a href="#" class="text-green-500 hover:underline ml-2">
                        <i class="fab fa-instagram mr-2"></i>Instagram
                    </a>
                    |
                    <a href="#" class="text-green-500 hover:underline ml-2">
                        <i class="fab fa-twitter mr-2"></i>Twitter
                    </a>
                    |
                </p>
                <a href="#"
                    class="inline-block bg-green-500 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-green-400 transition duration-300">Mulai
                    Cari Kos</a>
            </div>
            <p class="mt-6 text-gray-500">&copy; 2025 Roomie. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>
