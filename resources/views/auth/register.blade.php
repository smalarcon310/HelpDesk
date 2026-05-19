<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="register-body">

    <div class="register-container">

        <div class="register-card">

            <!-- TOP -->
            <div class="register-top">

                <div class="register-icon">
                    <i class="fas fa-user-plus"></i>
                </div>

                <h1>Create Account</h1>

                <p>
                    Join HelpDesk Pro today
                </p>

            </div>

            <!-- FORM -->
            <div class="register-content">

                <h3 class="role-title">
                    Choose Your Role
                </h3>

                <form action="{{ route('register.store') }}" method="POST">

                    @csrf

                    <!-- ROLES -->
                    <div class="roles-select">

                        <!-- ADMIN -->
                        <label class="role-box">

                            <input type="radio" name="role" value="admin" required>

                            <div class="role-card-select">

                                <i class="fas fa-shield-alt"></i>

                                <h4>Administrator</h4>

                                <p>Manage system and users</p>

                            </div>

                        </label>

                        <!-- TECH -->
                        <label class="role-box">

                            <input type="radio" name="role" value="technician">

                            <div class="role-card-select active-role">

                                <i class="fas fa-wrench"></i>

                                <h4>Technician</h4>

                                <p>Resolve support tickets</p>

                            </div>

                        </label>

                        <!-- USER -->
                        <label class="role-box">

                            <input type="radio" name="role" value="user">

                            <div class="role-card-select">

                                <i class="fas fa-user"></i>

                                <h4>User</h4>

                                <p>Submit and track tickets</p>

                            </div>

                        </label>

                    </div>

                    <!-- INPUTS -->
                    <div class="register-grid">

                        <!-- NAME -->
                        <div class="input-group">

                            <label>Full Name</label>

                            <div class="input-box">

                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    name="name"
                                    placeholder="John Doe"
                                    required
                                >

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="input-group">

                            <label>Email Address</label>

                            <div class="input-box">

                                <i class="fas fa-envelope"></i>

                                <input
                                    type="email"
                                    name="email"
                                    placeholder="john@example.com"
                                    required
                                >

                            </div>

                        </div>

                        <!-- PHONE -->
                        <div class="input-group">

                            <label>Phone Number</label>

                            <div class="input-box">

                                <i class="fas fa-phone"></i>

                                <input
                                    type="text"
                                    name="phone"
                                    placeholder="+1 (555) 000-0000"
                                >

                            </div>

                        </div>

                        <!-- DEPARTMENT -->
                        <div class="input-group">

                            <label>Department</label>

                            <div class="input-box">

                                <i class="fas fa-building"></i>

                                <input
                                    type="text"
                                    name="department"
                                    placeholder="IT Support"
                                >

                            </div>

                        </div>

                        <!-- PASSWORD -->
                        <div class="input-group">

                            <label>Password</label>

                            <div class="input-box">

                                <i class="fas fa-lock"></i>

                                <input
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    required
                                >

                            </div>

                        </div>

                        <!-- CONFIRM -->
                        <div class="input-group">

                            <label>Confirm Password</label>

                            <div class="input-box">

                                <i class="fas fa-lock"></i>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="••••••••"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                    <!-- TERMS -->
                    <div class="terms-box">

                        <input type="checkbox" required>

                        <span>
                            I agree to the
                            <a href="#">Terms of Service</a>
                            and
                            <a href="#">Privacy Policy</a>
                        </span>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit" class="register-btn">

                        <i class="fas fa-user-plus"></i>

                        Create Account

                    </button>

                    <!-- FOOTER -->
                    <div class="register-footer">

                        Already have an account?

                        <a href="/login">
                            Sign in
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>