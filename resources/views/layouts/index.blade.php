<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    {{-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha - v4.11.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">@lang('home.home')</a></li>
                    <li><a class="nav-link scrollto" href="/productos">@lang('home.products')</a></li>
                    <li><a class="nav-link scrollto" href="/categorias">@lang('home.categories')</a></li>
                    <li><a class="nav-link scrollto" href="/negocios">@lang('home.bussiness')</a></li>
                    {{-- <li><a class="nav-link scrollto" href="/es"><img src="{{ asset('img/es.png') }}"
                                alt="España"></a></li>
                    <li><a class="nav-link scrollto" href="/en"><img src="{{ asset('img/uk.png') }}"
                                alt="Reino Unido"></a></li> --}}

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('auth.login')</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-primary" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    @php $locale = session()->get('locale'); @endphp
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @switch($locale)
                                @case('en')
                                    <img src="{{ asset('img/uk.png') }}" width="25px">
                                @break

                                @case('es')
                                    <img src="{{ asset('img/es.png') }}" width="25px">
                                @break

                                @default
                                    <img src="{{ asset('img/es.png') }}" width="25px">
                            @endswitch
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-primary w-25" href="/lang/en">
                                <img src="{{ asset('img/uk.png') }}" width="25px"
                                    style="margin-right: 8px;">Inglés</a>
                            <a class="dropdown-item text-primary w-25" href="/lang/es">
                                <img src="{{ asset('img/es.png') }}" width="25px"
                                    style="margin-right: 8px;">Español</a>
                        </div>
                    </li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>@lang('home.title')</h1>
                    <h2>DAbuten</h2>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>APP</h2>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-12 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="/productos">@lang('home.products')</a></h4>
                            <p>@lang('home.product_description')</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="/categorias">@lang('home.categories')</a></h4>
                            <p>@lang('home.category_description')
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-12 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="/negocios">@lang('home.bussiness')</a></h4>
                            <p>@lang('home.bussines_description')</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <section id="services" class="services section-bg">

            @yield('content') <!-- Sintaxis para entender, el nombre tendrá que ser único -->

        </section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>@lang('home.contact')</h2>
                    <p>
                        @lang('home.about_me')
                    </p>
                </div>

                <div class="row">

                    <div class="container col-lg-12 d-flex align-items-stretch">
                        <div class="row info">

                            <div class="col-lg-4 browser">
                                <i class="bi bi-browser-chrome"></i>
                                <h4>Web</h4>
                                <p><a href="https://www.vacana.me">vacana.me</a></p>
                            </div>

                            <div class="col-lg-4 email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>curro@vacana.me</p>
                            </div>

                            <div class="col-lg-4 phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telegram:</h4>
                                <p>fjcamposgutierrez</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- ======= Footer ======= -->
    <footer id="footer">



        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>FRANCISCO CAMPOS</h3>
                        <p>
                            <strong>Telegram:</strong> fjcamposgutierrez<br>
                            <strong>Email:</strong> curro@vacana.me<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Nuestros Servicios</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> @lang('home.web_design')</li>
                            <li><i class="bx bx-chevron-right"></i> @lang('home.web_develop')</li>
                            <li><i class="bx bx-chevron-right"></i> @lang('home.template_design')</li>
                            <li><i class="bx bx-chevron-right"></i> Marketing & SEO</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>@lang('home.social_media')</h4>
                        <div class="social-links mt-3">
                            <a href="https://www.linkedin.com/in/francisco-javier-campos/" class="linkedin"><i
                                    class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Vacaname</span></strong>. @lang('home.all_rights_reserved')
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                by <a href="https://www.vacana.me">Vacana.me</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {{-- <script src="assets/vendor/aos/aos.js"></script> --}}
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    {{-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="assets/vendor/glightbox/js/glightbox.min.js"></script> --}}
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    {{-- <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> --}}
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    {{-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> --}}
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="assets/vendor/waypoints/noframework.waypoints.js"></script> --}}
    <script src="{{ asset('/vendor/waypoints/noframework.waypoints.js') }}"></script>
    {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    {{-- <script src="assets/js/main.js"></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
