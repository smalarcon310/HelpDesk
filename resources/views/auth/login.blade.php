<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="login-body">

    <div class="login-container">

        <div class="login-card">

            <!-- CLOSE -->
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>

            <!-- TOP -->
            <div class="login-top">

                <div class="login-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <h1>
                    Welcome Back
                </h1>

                <p>
                    Sign in to your account
                </p>

            </div>

            <!-- FORM -->
            <div class="login-content">

                @if ($errors->any())

                    <div class="login-error">

                        @foreach ($errors->all() as $error)

                            <p>{{ $error }}</p>

                        @endforeach

                    </div>

                @endif

                <form action="{{ route('login.attempt') }}" method="POST">

                    @csrf

                    <!-- EMAIL -->
                    <div class="login-input-group">

                        <label>Email Address</label>

                        <div class="login-input-box">

                            <i class="fas fa-envelope"></i>

                            <input
                                type="email"
                                name="email"
                                placeholder="your.email@example.com"
                                required
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="login-input-group">

                        <label>Password</label>

                        <div class="login-input-box">

                            <i class="fas fa-lock"></i>

                            <input
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required
                            >

                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div class="login-options">

                        <div class="remember-box">

                            <input type="checkbox">

                            <span>
                                Remember me
                            </span>

                        </div>

                        <a href="#" class="forgot-link">
                            Forgot password?
                        </a>

                    </div>

                    <!-- LOGIN AS -->
                    <div class="login-role-section">

                        <h3>
                            Login as
                        </h3>

                        <div class="login-roles">

                            <!-- ADMIN -->
                            <label class="login-role-box">

                                <input
                                    type="radio"
                                    name="role"
                                    value="admin"
                                    required
                                >

                                <div class="login-role-card">

                                    <i class="fas fa-shield-alt"></i>

                                    <span>
                                        Administrator
                                    </span>

                                </div>

                            </label>

                            <!-- TECH -->
                            <label class="login-role-box">

                                <input
                                    type="radio"
                                    name="role"
                                    value="technician"
                                >

                                <div class="login-role-card">

                                    <i class="fas fa-wrench"></i>

                                    <span>
                                        Technician
                                    </span>

                                </div>

                            </label>

                            <!-- USER -->
                            <label class="login-role-box">

                                <input
                                    type="radio"
                                    name="role"
                                    value="user"
                                >

                                <div class="login-role-card">

                                    <i class="fas fa-user"></i>

                                    <span>
                                        User
                                    </span>

                                </div>

                            </label>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit" class="login-btn">

                        <i class="fas fa-arrow-right"></i>

                        Sign In

                    </button>

                    <!-- FOOTER -->
                    <div class="login-footer">

                        Don't have an account?

                        <a href="/register">
                            Sign up
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>