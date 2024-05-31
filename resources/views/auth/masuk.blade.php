<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaniGuard</title>
    <link href="{{ asset('assign/assets/img/brand_logo.png') }}" rel="icon">
    {{-- <link href="{{asset('assign/assets/img/brand_logo.png') }}" rel="apple-touch-icon"> --}}

    <link href="{{ asset('assign/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assign/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assign/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assign/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">



    <link href="{{ asset('assign/assets/css/style2.css') }}" rel="stylesheet">

</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class=" col-sm-5 col-md-5 col-lg-5 col-xl-5 ">
                    <img src=" {{ asset('assign/assets/img/brand_logo.png') }} " class="img-fluid" alt="Sample image">
                </div>
                <div class=" col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                    <div class="d-flex flex-row align-items-center justify-content-center my-4 ">
                        <p class=" text-center lead fw-bold mb-0 ">Selamat Datang!</p>
                    </div>
                    <form action="{{ route('login-proses') }}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nama Pengguna</label>
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                name="username" value="{{ old('username') }}" placeholder="Masukkan Nama Pengguna">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Kata Sandi</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                name="password" value="{{ old('password') }}" placeholder="Masukkan Kata Sandi">
                        </div>
                        <p class="mb-1">
                            {{-- <a href="{{route('lupa-password')}}">Lupa Kata Sandi?</a> --}}
                            <a href="{{ route('password.request') }}"
                                style="color: #406EE4; text-decoration: none;">Lupa Kata Sandi?</a>
                        </p>
                        <div class="text-center text-lg-start mt-4 pt-2" style="text-align: center">
                            <div class="form-group-btn text-center">
                                <button class="btn-edit-profil"
                                    style="  background-color: rgb(71, 93, 33); color:white; border-radius:10px; padding-left: 11rem; padding-right: 11rem; padding-top:5px; padding-bottom:5px  "
                                    type="submit" class="">Masuk</button>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary btn-block d-block mx-auto"
                    style="padding-left: 10rem; padding-right: 10rem;">Login</button> --}}


                            <div class="mt-4 pt-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $alert)
                                                <li> {{ $alert }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <p class="small fw-bold mt-2 pt-1 mb-0" style="text-align: center">Belum Punya Akun? <a
                                    href=" {{ route('register') }} " class=""
                                    style="color: #406EE4; text-decoration: none;">Daftar di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'custom-swal-button'
                    }
                });
            });
        </script>
        <style>
            .custom-swal-button {
                background-color: #475D21 !important;
                color: white !important;
            }
        </style>
    @endif

    <!-- Template Main JS File -->
    {{-- <script src="{{asset('landing/assets/js/main.js') }}"></script> --}}
</body>

</html>
