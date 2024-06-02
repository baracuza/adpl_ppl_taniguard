@extends('layout.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right"></ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('profil.update', ['id' => $akun->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="form-group">
                                @if ($akun->image)
                                    <img id="preview" src="{{ asset('storage/gambar-profil/' . Auth::user()->image) }}"
                                        width="100px" height="100px" alt="">
                                @else
                                    <img id="preview" src="#" width="100px" height="100px" alt="Preview Gambar"
                                        style="display: none;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto Profil</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="gambar" name="gambar"
                                        style="display: none;" onchange="previewImage(event); updateFileName()">
                                    <label for="gambar" class="btn-input-profil">Pilih Gambar</label>
                                    <span id="file-name" class="file-name">Tidak ada gambar dipilih</span>
                                </div>
                                <small>Harap unggah gambar dengan ukuran kurang dari 100 KB</small>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $akun->name }}" @if (auth()->user()->hasRole('admin')) readonly @endif>
                            </div>
                            <div class="form-group">
                                <label for="username">Nama Pengguna</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $akun->username }}" @if (auth()->user()->hasRole('admin')) readonly @endif>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $akun->email }}" @if (auth()->user()->hasRole('admin')) readonly @endif>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $alert)
                                            <li> {{ $alert }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group-btn text-center">
                                <button class="btn-edit-profil" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }

        function updateFileName() {
            const input = document.getElementById('gambar');
            const fileName = document.getElementById('file-name');
            if (input.files.length > 0) {
                fileName.textContent = input.files[0].name;
            } else {
                fileName.textContent = 'Tidak ada gambar dipilih';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ Session::get('success') }}",
                });
            @endif
        });
    </script>
@endsection
