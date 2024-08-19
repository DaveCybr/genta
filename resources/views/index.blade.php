<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Genta Villa Bali</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('adminnew/img/gentania-logo1.png') }}" rel="icon" />

    <!-- Google Web Fonts -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('adminnew/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('adminnew/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib2/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib2//ionicons/css/ionicons.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('adminnew/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/css/siteplan.css') }}" rel="stylesheet" />

    @yield('style-page')
</head>

<body>
    <div class="container-xxl bg-white px-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
            <div class="container d-flex justify-content-between align-items-center">
                <img src="{{ asset('adminnew/img/gentania-logo1.png') }}" alt="Icon"
                    style="width: 50px; height: 70px; margin-right: 3px" />
                <h1 class="mt-2 text-primary">GENTA</h1>
                <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                    data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === null ? 'active' : null }} "
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'product' ? 'active' : null }}"
                                href="{{ url('product') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block"
                    data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    Login
                </button>
            </div>
        </nav>

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt- wow fadeIn " data-wow-delay="0.1s">
            <div class="container py-5 px-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2">
                            <i class="fa fa-map-marker-alt me-3"></i> Jl. Krisna 1, Canggu - Bali
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-phone-alt me-3"></i>+62 851-4248-6430
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.youtube.com/@GentaVillaBali"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/Genta.Villa/"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>

                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-link text-white-50" href="#about">About Us</a>
                                <a class="btn btn-link text-white-50" href="#contact">Contact Us</a>
                                <a class="btn btn-link text-white-50" href="#gallery">Gallery</a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-link text-white-50" href="{{ url('siteplan') }}">Siteplan </a>
                                <a class="btn btn-link text-white-50" href="{{ url('siteplan') }}">Details
                                    Information</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Enter your email so you don't miss the latest information from us</p>
                        <div class="position-relative mx-auto" style="max-width: 400px">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email" />
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">www.gentavilla.com</a>,
                            All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By
                            <a class="border-bottom" href="javascript:void(0)">Satellite Team</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/4387850b29.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('adminnew/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib2/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('adminnew/js/main.js') }}"></script>
    <script src="{{ asset('adminnew/lib2/js/main.js') }}"></script>
    @yield('script-page')
</body>

</html>
