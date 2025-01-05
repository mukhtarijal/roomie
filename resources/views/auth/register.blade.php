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

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #2a9d8f, #264653);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            background: #ffffff;
        }

        .logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 120px;
        }

        h3 {
            font-weight: 700;
            color: #264653;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .btn-primary {
            border-radius: 12px;
            padding: 12px 20px;
            background-color: #2a9d8f;
            border-color: #2a9d8f;
        }

        .btn-primary:hover {
            background-color: #264653;
            border-color: #264653;
        }

        .phone-input {
            position: relative;
        }

        .phone-input .form-control {
            padding-left: 60px;
            padding-right: 10px;
        }

        .phone-input .input-group-text {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            background-color: #ffffff;
            border: 1px solid #ced4da;
            padding: 5px 10px;
        }

        .password-toggle {
            cursor: pointer;
        }

        .form-check-label {
            font-weight: 500;
        }

        .form-label {
            font-weight: 600;
            color: #264653;
        }

        .input-group-text {
            background-color: #eeeeee;
            border: 1px solid #ced4da;
        }

        .next-btn,
        .prev-btn {
            border-radius: 12px;
            padding: 12px 20px;
            background-color: #f4a261;
            border-color: #f4a261;
        }

        .next-btn:hover,
        .prev-btn:hover {
            background-color: #264653;
            border-color: #264653;
        }
    </style>
</head>

<body>
    <div class="card p-4">
        <!-- Logo -->
        <img src="{{ asset('img/logoroomie.png') }}" alt="Project Logo" class="logo">

        <h3 class="text-center text-primary mb-4">Create Your Account</h3>
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
                        <span id="password-toggle" class="password-toggle position-absolute"
                            style="right: 10px; top: 10px;">👁️</span>
                    </div>
                </div>
                <button type="button" class="btn btn-primary w-100 next-btn">Next</button>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}" class="btn btn-link p-0">Aku sudah punya akun</a>
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

                <!-- Role Selection -->
                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="Owner_kos">Owner Kos</option>
                        <option value="User">User</option>
                    </select>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3 phone-input">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input id="phone" type="text" name="phone" class="form-control"
                            placeholder="Your phone number" required>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="position-relative">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" required>
                        <span id="password-confirmation-toggle" class="password-toggle position-absolute"
                            style="right: 10px; top: 10px;">👁️</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>

        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Script -->
    <script>
        const formSections = document.querySelectorAll('.form-section');
        const nextBtn = document.querySelector('.next-btn');
        const prevBtn = document.querySelector('.prev-btn');
        let currentStep = 0;

        function showStep(step) {
            formSections.forEach((section, index) => {
                section.classList.toggle('active', index === step);
            });
        }

        nextBtn.addEventListener('click', () => {
            if (currentStep < formSections.length - 1) {
                if (document.getElementById('email').value && document.getElementById('password').value) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        prevBtn?.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);

        // Password toggle
        document.getElementById('password-toggle').addEventListener('click', () => {
            const passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        });

        document.getElementById('password-confirmation-toggle')?.addEventListener('click', () => {
            const passwordConfirmationField = document.getElementById('password_confirmation');
            passwordConfirmationField.type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>

</html>
