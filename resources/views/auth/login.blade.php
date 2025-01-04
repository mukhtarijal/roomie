<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login PLN UID SUMBAR">
    <meta name="author" content="PLN">
    <title>Roomie - Login</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/logoroomie.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #03de2f, #6cc366);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 850px;
            width: 100%;
        }

        .custom-bg {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .custom-bg img {
            max-width: 100%;
            max-height: 300px;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .form-section {
            padding: 40px 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a94;
        }

        @media (max-width: 768px) {
            .custom-bg img {
                max-height: 200px;
            }

            .form-section {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="row g-0">
            <!-- Sisi Kiri: Gambar -->
            <div class="col-md-6 custom-bg">
                <img src="{{ asset('img/logoroomie.png') }}" alt="Gambar Login">
            </div>

            <!-- Sisi Kanan: Form Login -->
            <div class="col-md-6 bg-white form-section">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/logoroomie.png') }}" alt="Logo PLN" style="width: 80px;">
                    <h3 class="mt-3 text-primary">Welcome Back!</h3>
                    <p class="text-muted">Please log in to manage your services.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" name="email" class="form-control"
                            placeholder="Enter your email" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control"
                            placeholder="Enter your password" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <!-- Lupa Password -->
                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                        @endif
                    </div>

                    <!-- Buat Akun -->
                    <div class="text-center mt-2">
                        <a href="{{ route('register') }}" class="text-decoration-none">Create an Account!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
