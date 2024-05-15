<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        .navbar-brand {
            width: 35%;
        }
        .navbar-brand img {
            max-height: 40px;
        }
        .navbar-nav {
            width: 100%;
        }
        .navbar-nav .nav-link {
            padding: 12px 15px;
            color: #333;
            font-size: 22px;
            font-weight: 400;
        }
        .nav-item a{
            margin-left: 12px;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .dropdown-menu {
            background-color: #f8f9fa;
            border: none;
        }
        .dropdown-menu a {
            color: #333;
        }
        .dropdown-menu a:hover {
            color: #007bff;
        }
        .navbar-nav .divider {
            height: 30px;
            border-left: 1px solid #ccc;
            margin-right: 15px;
            margin-left: 15px;
        }
        .navbar-nav .dropdown-divider {
            margin: 5px 0;
            border-top: 1px solid #ccc;
        }
        .navbar-nav .login-register {
            padding-left: 15px;
            padding-right: 15px;
            margin-left: 10px;
        }
        .navbar-nav .login-register button {
            margin-right: 10px; /* Add margin between buttons */
        }
        section .hero {
            background-image: url(https://bu.edu.bd/buPrev/wp-content/uploads//photo-gallery/Library/522.jpg);
            background-repeat: no-repeat; /* Changed none to no-repeat */
            background-size: cover; /* Added to ensure the image covers the entire section */
            position: relative;
            height: 700px;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.4;
        }
        .hero-content {
            position: relative;
            padding: 100px 0; /* Adjust spacing as needed */
            color: #fff;
            text-align: center;
        }
        .hero-content h1 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
            margin-top: 80px;
        }
        .hero-content p {
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 400;
        }
        .hero-content button {
            font-size: 1.25rem;
            padding: 10px 40px;
        }
    </style>
</head>
<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/50" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav social-icons">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-instagram"></i></a>
                    </li>
                </ul>
                <div class="divider d-lg-none"></div>
                <ul class="navbar-nav login-register">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <button class="btn btn-outline-primary me-2" onclick="window.location.href='{{ route('login') }}'">Log in</button>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <button class="btn btn-primary" onclick="window.location.href='{{ route('register') }}'">Register</button>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="hero">
            <div class="hero-overlay bg-dark"></div>
            <div class="hero-content text-center text-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h1 class="display-3">Library Management System</h1>
                            <p class="lead">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                            <button class="btn btn-primary btn-lg">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer py-5 bg-black text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
                        <path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
                    </svg>
                    <p class="mb-0">ACME Industries Ltd.<br>Providing reliable tech since 1992</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h4 class="footer-title">Services</h4>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Branding</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Design</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Marketing</a>
                    <a class="link link-hover d-block text-white text-decoration-none">Advertisement</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h4 class="footer-title">Company</h4>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">About us</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Contact</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Jobs</a>
                    <a class="link link-hover d-block text-white text-decoration-none">Press kit</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h4 class="footer-title">Legal</h4>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Terms of use</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Privacy policy</a>
                    <a class="link link-hover d-block text-white text-decoration-none">Cookie policy</a>
                </div>
            </div>
        </div>
    </footer>




    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
