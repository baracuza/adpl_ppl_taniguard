<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaniGuard</title>
    <link href="{{ asset('assign/assets/img/brand_logo.png') }}" rel="icon">
    {{-- <link href="{{asset('assign/assets/img/brand_logo.png') }}" rel="apple-touch-icon"> --}}

    {{-- <link href="{{asset('assign/assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assign/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assign/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assign/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">



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
                        <p class=" text-center lead fw-bold mb-0 ">Mohon isi data berikut dengan benar</p>
                    </div>
                    <form action="{{ route('register-proses') }}" method="post">
                        @csrf

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nama lengkap</label>
                            <input type="text" id="form3Example3" class="form-control form-control-lg" name="nama"
                                value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Kata Sandi</label>
                            <div class="input-group">
                                <input type="text" id="form3Example4" class="form-control form-control-lg"
                                    name="password" value="{{ old('password') }}" placeholder="Masukkan kata sandi">
                                <span class="input-group-text password-toggle"><i class="bi bi-eye"
                                        id="togglePassword"></i></span>
                            </div>
                            <!-- Nama input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Nama pengguna</label>
                                <input type="text" id="form3Example3" class="form-control form-control-lg"
                                    name="username" value="{{ old('username') }}" placeholder="Masukkan nama pengguna">
                            </div>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label>
                            <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
                                value="{{ old('email') }}" placeholder="Masukkan email">
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2 ">
                            <div class="form-group-btn text-center ">
                                <button class="btn-edit-profil"
                                    style="  background-color: rgb(71, 93, 33); color:white; border-radius:10px; padding-left: 10rem; padding-right: 10rem; padding-top:5px; padding-bottom:5px; "
                                    type="submit" class="">
                                    Daftar
                                </button>
                            </div>
                            {{-- <button type="submit" class=" btn-edit-profil btn btn-primary btn-block d-block mx-auto"
                    style="padding-left: 15rem; padding-right: 15rem;">Registrasi</button> --}}
                            <div class="mt-4 pt-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $alert)
                                                @if ($loop->first || !in_array($alert, array_slice($errors->all(), 0, $loop->index)))
                                                    <li>{{ $alert }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <p class="small fw-bold mt-2 pt-1 mb-0" style="text-align: center; padding-bottom:10rem ">
                                Sudah Punya Akun? <a href=" {{ route('login') }} " class=""
                                    style="color: #406EE4; text-decoration: none;">Masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('form3Example4');

        togglePassword.addEventListener('click', function() {
            // toggle type attribute
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                this.classList.remove('bi-eye-slash');
                this.classList.add('bi-eye');
            } else {
                passwordInput.type = "password";
                this.classList.remove('bi-eye');
                this.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>

</html>
