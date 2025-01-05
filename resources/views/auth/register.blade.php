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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
            background: #ffffff;
            padding: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 80px;
        }

        h3 {
            font-weight: 700;
            color: #264653;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            color: #264653;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #2a9d8f;
            border-color: #2a9d8f;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #264653;
            border-color: #264653;
        }

        .btn-secondary {
            background-color: #e76f51;
            border-color: #e76f51;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 10px;
        }

        .btn-secondary:hover {
            background-color: #d64b31;
            border-color: #d64b31;
        }

        .mt-3 a {
            text-decoration: none;
            color: #2a9d8f;
            font-weight: 600;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .input-group-text {
            background-color: #ffffff;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="{{ asset('img/logoroomie.png') }}" alt="Project Logo" class="logo">
        <h3>Create Your Account</h3>

        <form id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Step 1 -->
            <div class="form-section active">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <input id="password" type="password" name="password" class="form-control" required>
                        <span id="password-toggle" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <button type="button" class="btn btn-primary w-100 next-btn">Next</button>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">I already have an account</a>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="form-section">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Date of Birth</label>
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki"
                            value="Laki-Laki" required>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                            value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Address</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="Owner_kos">Owner Kos</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input id="phone" type="text" name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="position-relative">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" required>
                        <span id="password-confirmation-toggle" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const formSections = document.querySelectorAll('.form-section');
        let currentStep = 0;

        function showStep(step) {
            formSections.forEach((section, index) => {
                section.classList.toggle('active', index === step);
            });
        }

        document.querySelector('.next-btn').addEventListener('click', () => {
            currentStep++;
            showStep(currentStep);
        });

        document.querySelector('.prev-btn')?.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });

        document.getElementById('password-toggle').addEventListener('click', () => {
            const passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        });

        document.getElementById('password-confirmation-toggle').addEventListener('click', () => {
            const confirmPasswordField = document.getElementById('password_confirmation');
            confirmPasswordField.type = confirmPasswordField.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>

</html>
