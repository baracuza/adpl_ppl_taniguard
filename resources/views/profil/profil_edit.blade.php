@extends('layout.main')

@section('conten')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Profil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah artikel</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <section class="content">
                <div class="container-fluid">
                    {{-- <form action=" " method="POST"> --}}
                    <form action="{{ route('profil.update', ['id' => $akun->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="card-body">
                                @if ($akun->image)
                                    <img src="{{ asset('storage/gambar-profil/' . Auth::user()->image) }}" width="100px"
                                        height="100px" alt="">
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Profil</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="gambar"
                                        placeholder="Pilih File">
                                    <small>Harap unggah gambar dengan ukuran kurang dari 100 KB</small>
                                    {{-- @error('gambar')
                      <br>
                          <small> {{$message}} </small>
                      @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    @if (auth()->user()->hasRole('admin'))
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                            value="{{ $akun->name }}" readonly>
                                    @endif
                                    @if (auth()->user()->hasRole('pengguna'))
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                            value="{{ $akun->name }}">
                                    @endif
                                    @error('nama')
                                        <small> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pengguna</label>
                                    @if (auth()->user()->hasRole('admin'))
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                            value="{{ $akun->username }}" readonly>
                                    @endif
                                    @if (auth()->user()->hasRole('pengguna'))
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                            value="{{ $akun->username }}">
                                    @endif
                                    @error('username')
                                        <small> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    @if (auth()->user()->hasRole('admin'))
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            value="{{ $akun->email }}" readonly>
                                    @endif
                                    @if (auth()->user()->hasRole('pengguna'))
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            value="{{ $akun->email }}">
                                    @endif
                                    @error('email')
                                        <small> {{ $message }} </small>
                                    @enderror
                                </div>
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
                                <div class="form-group-btn">
                                    <button class="btn-edit-profil" type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <!-- general form elements -->
                            {{-- <div class="card card-primary"> --}}
                            {{-- <div class="card-header">
                      <h3 class="card-title">Edit Profil</h3>
                    </div> --}}

                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form>
                    </form> --}}
                            {{-- </div> --}}
                            <!-- /.card -->
                        </div>
                        <div class="row">
                            <!-- left column -->

                            <!--/.col (left) -->
                        </div>
                    </form>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>


        </div>

        <!-- /.content-header -->


    </div>
@endsection

@section('scripts')
    <script>
        // Saat dokumen selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan SweetAlert jika session 'success' ada
            @if (Session::has('success'))
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ Session::get('success') }}",

                });
            @endif
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ Session::get('success') }}",

                });
            @endif
        });
    </script> --}}
@endsection
