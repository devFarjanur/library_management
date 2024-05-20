<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            height: 600px;
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
        .contact-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }
        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .contact-form h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .contact-form label {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            margin-bottom: 20px;
        }
        .contact-info {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .contact-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .contact-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .map-embed {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .faq-section {
            padding: 50px 0;
            background-color: #fff;
        }
        .faq-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .faq-item {
            margin-bottom: 20px;
        }
        .faq-item h5 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .faq-item p {
            font-size: 16px;
            margin-bottom: 0;
        }
        @media (max-width: 768px) {
            .contact-info, .contact-form {
                margin-bottom: 20px;
            }
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


    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="contact-info">
                        <h3>Contact Information</h3>
                        <p><strong>Address:</strong> 1234 Street Name, City, State, Zip Code</p>
                        <p><strong>Phone:</strong> (123) 456-7890</p>
                        <p><strong>Email:</strong> info@example.com</p>
                        <p><strong>Working Hours:</strong> Mon - Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                    <div class="map-embed">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509738!2d144.95373531531635!3d-37.81720997975159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf0727a167f7b7b7b!2sEnvato!5e0!3m2!1sen!2sus!4v1487640422005" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="contact-form">
                        <h2>Get in Touch</h2>
                        <form action="#" method="POST" id="contactForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter your message.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section py-5">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is your refund policy?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Our refund policy allows for refunds within 30 days of purchase. Please contact our support team for more information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How can I contact support?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can contact our support team via email at support@example.com or call us at (123) 456-7890.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you offer custom services?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we offer a variety of custom services to meet your needs. Please contact us for more information.
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
