<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TaniGuard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('landing/assets/img/brand_logo.png') }}" rel="icon">
  <link href="{{asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('landing/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <nav id="navbar" class="navbar">
        <i class="mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" >Selamat <span>datang di</span>  
            TaniGuard!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Lindungi Lahanmu dengan Sistem IoT Kami dan Jelajahi Artikel Pertanian Terbaru untuk Pertanian yang Lebih Baik</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href=" {{route('login')}} " class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Masuk</span>
                {{-- <i class="bi bi-arrow-right"></i> --}}
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('landing/assets/img/petani.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <a href="{{route('login')}}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('landing/assets/js/main.js') }}"></script>

</body>

</html>