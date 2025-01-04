<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Register PLN UID SUMBAR">
    <meta name="author" content="PLN">
    <title>Roomie - Register</title>

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

        .form-label {
            font-weight: 600;
        }

        .form-input {
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            height: 45px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a94;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 768px) {
            .custom-bg img {
                max-height: 200px;
            }

            .form-section {
                padding: 20px;
            }

            .form-input {
                height: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="row g-0">
            <!-- Sisi Kiri: Gambar -->
            <div class="col-md-6 custom-bg">
                <img src="{{ asset('img/logoroomie.png') }}" alt="Gambar Register">
            </div>

            <!-- Sisi Kanan: Form Register -->
            <div class="col-md-6 bg-white form-section">
                <div class="text-center mb-4">
                    {{-- <img src="{{ asset('img/logoroomie.png') }}" alt="Logo PLN" style="width: 80px;"> --}}
                    <h3 class="mt-3 text-primary">Create Your Account</h3>
                    <p class="text-muted">Please fill in the details to register.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <x-text-input id="name" class="form-input w-100" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-danger" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <x-text-input id="email" class="form-input w-100" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <x-text-input id="password" class="form-input w-100" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <x-text-input id="password_confirmation" class="form-input w-100" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger" />
                    </div>

                    <!-- Tombol Register -->
                    <button type="submit" class="btn btn-primary w-100">Register</button>

                    <!-- Sudah Punya Akun -->
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">Already have an account? Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
