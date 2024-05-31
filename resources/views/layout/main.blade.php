
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaniGuard</title>
    
    <!-- Favicons -->
  <link href="{{asset('landing/assets/img/brand_logo.png') }}" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- CSS STYLE -->
    <link rel="stylesheet" href="{{ asset('rumtana/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('images/brand_logo.png') }}" alt="TaniGuard" height="50"
                width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar Profil -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('storage/gambar-profil/' . Auth::user()->image) }}"
                            class="img-circle elevation-2" alt="{{ $akun->username }} Image">
                    </div>
                    <div class="info">
                        <a class="d-block capitalize-first" style="font-weight: bold">{{ $akun->username }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('admin.dasboard') }} " class="nav-link">

                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Beranda</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('profil') }} " class="nav-link">
                                    <i class="nav-icon fas fa-user-circle"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('admin'))
                            <li class="nav-item">
                                <a href=" {{ route('akun') }} " class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Data Petani</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('admin.artikel') }} " class="nav-link">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>Artikel Pertanian</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('monitoring-RT') }} " class="nav-link">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <p>Pencatatan Real Time</p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('riwayat') }} " class="nav-link">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <p>Riwayat Pencatatan
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengguna'))
                            <li class="nav-item">
                                <a href=" {{ route('logout') }} " class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Keluar</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('conten')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Ajax Realtime -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#respon").load("{{ url('bacarespon') }}")
            }, 500) //1000ms = 1s
        });
    </script>

    <script>
        function changeText(page) {
            document.getElementById('dropdown-text').innerText = page;
        }
    </script>


    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
    @if ($message = Session::get('update'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif
    
</body>

</html>
