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

    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 120px;
        }

        h3 {
            color: #264653;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #2a9d8f;
            border: none;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #264653;
        }

        .form-control {
            border-radius: 8px;
            border-color: #ced4da;
            margin-bottom: 15px;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border-color: #ced4da;
        }

        .text-center a {
            color: #264653;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            color: #2a9d8f;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-label {
            font-weight: 600;
            color: #264653;
        }

        .form-check-label {
            font-weight: 500;
        }

        .text-muted a {
            font-size: 14px;
            color: #6c757d;
            text-decoration: none;
        }

        .text-muted a:hover {
            color: #2a9d8f;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -10px;
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="{{ asset('img/logoroomie.png') }}" alt="Roomie Logo" class="logo">

        <h3>Create Your Account</h3>

        <form id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Step 1: Email and Password -->
            <div class="form-section active">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" class="form-control" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <input id="password" type="password" name="password" class="form-control" required>
                        <span id="password-toggle" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <button type="button" class="btn btn-primary next-btn">Next</button>

                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-question-circle"></i> Forgot Password?
                    </a>
                </div>
            </div>

            <!-- Step 2: Name, Birthdate, Gender, Address, Phone -->
            <div class="form-section">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" name="name" class="form-control" required>
                    <span class="error-message" id="nameError"></span>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Date of Birth</label>
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" required>
                    <span class="error-message" id="dobError"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" required>
                        <label class="form-check-label" for="laki-laki">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">Female</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Address</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
                    <span class="error-message" id="addressError"></span>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input id="phone" type="text" name="phone" class="form-control" placeholder="Your phone number" required>
                    </div>
                    <span class="error-message" id="phoneError"></span>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="position-relative">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                        <span id="password-confirmation-toggle" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <span class="error-message" id="passwordConfirmationError"></span>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>

                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Handle Password visibility toggle
        document.getElementById('password-toggle').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

        document.getElementById('password-confirmation-toggle').addEventListener('click', function () {
            const passwordConfirmationField = document.getElementById('password_confirmation');
            const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
            passwordConfirmationField.type = type;
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

        // Step navigation
        const nextBtn = document.querySelector('.next-btn');
        const formSections = document.querySelectorAll('.form-section');
        let currentSection = 0;

        nextBtn.addEventListener('click', () => {
            if (currentSection < formSections.length - 1) {
                formSections[currentSection].classList.remove('active');
                currentSection++;
                formSections[currentSection].classList.add('active');
            }
        });
    </script>
</body>

</html>
