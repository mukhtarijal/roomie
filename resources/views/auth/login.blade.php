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

        <h3>Welcome Back!</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" class="form-control" required>
                <span class="error-message" id="emailError"></span>
            </div>

            <!-- Password -->
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

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>

            <!-- Forgot Password -->
            <div class="mt-3 text-center">
                <a href="{{ route('password.request') }}">
                    <i class="fas fa-question-circle"></i> Forgot Password?
                </a>
            </div>

            <!-- Register -->
            <div class="mt-3 text-center">
                <p class="text-muted mb-0">Don't have an account yet?</p>
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i> Create an Account!
                </a>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
