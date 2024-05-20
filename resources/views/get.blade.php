<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Membership - Library Management System</title>
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
            font-size: 20px;
            font-weight: 400;
        }
        .nav-item a {
            margin-left: 20px;
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
            margin-right: 10px;
        }
        section .hero {
            background-image: url(https://bu.edu.bd/buPrev/wp-content/uploads//photo-gallery/Library/522.jpg);
            background-repeat: no-repeat;
            background-size: cover;
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
            padding: 100px 0;
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
        .membership-info {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .membership-info h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .membership-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .membership-info .fee {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }
        .payment-methods {
            margin-bottom: 20px;
        }
        .payment-methods p {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .accordion-button {
            font-size: 1rem;
        }
        .testimonial-card {
            background-color: #f8f9fa;
            border: none;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .testimonial-card p {
            font-size: 18px;
        }
        .footer-title {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .link-hover {
            color: #007bff;
        }
        .link-hover:hover {
            text-decoration: underline;
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
                        <a href="{{ route('getmembership') }}" class="nav-link">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
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

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="membership-info text-center">
                        <h2 class="mb-4">Unlock the World of Knowledge</h2>
                        <p class="lead mb-4">Become a member of our library to access an extensive collection of books, digital resources, and exclusive services.</p>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Membership Benefits</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Unlimited access to our library resources</li>
                                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Priority booking for events and workshops</li>
                                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Personalized recommendations</li>
                                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Discounts on partner services</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Membership Fee</h5>
                                        <p class="fee">1000 Taka <span class="text-muted">(One-time payment)</span></p>
                                        <p class="text-muted">Membership fee is non-refundable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-methods">
                            <h5 class="mb-3">Payment Methods</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <h6 class="card-title">Bkash</h6>
                                            <p class="card-text">Pay to: <strong>017XXXXXXXX</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <h6 class="card-title">Nagad</h6>
                                            <p class="card-text">Pay to: <strong>018XXXXXXXX</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <h6 class="card-title">Upay</h6>
                                            <p class="card-text">Pay to: <strong>019XXXXXXXX</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4" onclick="window.location.href='{{ route('register') }}'">Register Now</button>
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
                    <p class="mb-0">Library Management System</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h4 class="footer-title">All Pages</h4>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Home</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Member ship</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Contact</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h4 class="footer-title">Company</h4>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Payment Methods</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Bkash</a>
                    <a class="link link-hover d-block mb-2 text-white text-decoration-none">Nagad</a>
                    <a class="link link-hover d-block text-white text-decoration-none">Rocket</a>
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
