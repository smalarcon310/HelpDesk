<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk Pro</title>

    <link rel="stylesheet" href="{{ asset('css/Welcome.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            <span class="icon">🛡️</span>
            HelpDesk Pro
        </div>

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>

            <li>
                <a href="/login" class="btn-login-nav">
                    Login
                </a>
            </li>
            <li>
                <a href="/register" class="btn-register-nav">
                    Register
                </a>
            </li>
        </ul>

    </nav>


    <!-- HERO -->
    <main class="hero">

        <div class="hero-content">

            <div class="badge">
                ✨ Next-Gen Support Platform
            </div>

            <h1>
                Smart Ticket Management System
            </h1>

            <p>
                Empower your team with our advanced platform that allows users,
                technicians, and administrators to manage support tickets
                efficiently with real-time analytics and AI-powered insights.
            </p>

            <div class="hero-btns">

                <a href="/login" class="btn-primary">
                    Login
                </a>

                <a href="#" class="btn-secondary">
                    Create Ticket
                </a>

            </div>

        </div>


        <!-- HERO VISUAL -->
        <div class="hero-visual">

            <div class="glass-card">

                <div class="card-header">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>

                <div class="card-body">
                    <div class="list-item"></div>
                    <div class="list-item"></div>
                    <div class="list-item"></div>
                    <div class="list-item"></div>
                </div>

            </div>

            <div class="floating-cube cube-1"></div>
            <div class="floating-cube cube-2"></div>

        </div>

    </main>


    <!-- ROLES -->
    <section class="roles-section">

        <div class="roles-header">
            <h2>Choose Your Role</h2>

            <p>
                Access powerful tools tailored to your responsibilities
            </p>
        </div>


        <div class="roles-grid">

            <!-- ADMIN -->
            <div class="role-card">

                <div class="icon-wrapper icon-admin">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <h3>Administrator</h3>

                <p>
                    Full system control with advanced analytics,
                    user management, and comprehensive reporting capabilities.
                </p>

            </div>


            <!-- TECHNICIAN -->
            <div class="role-card">

                <div class="icon-wrapper icon-tech">
                    <i class="fas fa-wrench"></i>
                </div>

                <h3>Technician</h3>

                <p>
                    Efficiently manage and resolve tickets with priority queues,
                    automation tools, and real-time updates.
                </p>

            </div>


            <!-- USER -->
            <div class="role-card">

                <div class="icon-wrapper icon-user">
                    <i class="fas fa-user"></i>
                </div>

                <h3>User</h3>

                <p>
                    Submit and track support requests with intuitive interface,
                    real-time notifications, and ticket history.
                </p>

            </div>

        </div>

    </section>


    <!-- ANALYTICS -->
    <section class="analytics-section">

        <div class="section-header">

            <h2>Real-Time Analytics</h2>

            <p>
                Monitor your support operations with live metrics
            </p>

        </div>


        <div class="stats-grid">

            <!-- OPEN TICKETS -->
            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-orange">
                        <i class="fas fa-ticket-alt"></i>
                    </div>

                    <span class="trend positive">
                        +12%
                    </span>

                </div>

                <div class="stat-value">
                    1,247
                </div>

                <div class="stat-label">
                    Open Tickets
                </div>

            </div>


            <!-- RESOLVED -->
            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-green">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <span class="trend positive">
                        +28%
                    </span>

                </div>

                <div class="stat-value text-green">
                    8,956
                </div>

                <div class="stat-label">
                    Resolved Tickets
                </div>

            </div>


            <!-- TECHNICIANS -->
            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-blue">
                        <i class="fas fa-users"></i>
                    </div>

                    <span class="trend positive">
                        +5%
                    </span>

                </div>

                <div class="stat-value text-blue">
                    124
                </div>

                <div class="stat-label">
                    Active Technicians
                </div>

            </div>


            <!-- SATISFACTION -->
            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-purple">
                        <i class="fas fa-chart-line"></i>
                    </div>

                    <span class="trend positive">
                        +3%
                    </span>

                </div>

                <div class="stat-value text-purple">
                    98.5%
                </div>

                <div class="stat-label">
                    Satisfaction Rate
                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="main-footer">

        <div class="footer-container">

            <!-- BRAND -->
            <div class="footer-brand">

                <div class="logo">
                    <span class="icon">🛡️</span>
                    HelpDesk Pro
                </div>

                <p>
                    The most advanced ticket management system for modern support teams.
                    Streamline your workflow and deliver exceptional customer service.
                </p>

                <div class="social-links">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
                </div>

            </div>


            <!-- LINKS -->
            <div class="footer-links">

                <h3>Quick Links</h3>

                <div class="links-grid">

                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>

                    <ul>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>

                </div>

            </div>


            <!-- NEWSLETTER -->
            <div class="footer-newsletter">

                <h3>Stay Updated</h3>

                <p>
                    Subscribe to our newsletter for the latest updates and features.
                </p>

                <form class="subscribe-form">

                    <input type="email" placeholder="Your email">

                    <button type="submit">
                        Subscribe
                    </button>

                </form>

            </div>

        </div>

    </footer>

</body>

</html>