@extends('layout.main')

@section('conten')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 " >
            <h1 class="m-0 ">Edit Artikel Pertanian</h1>
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
            <form action="{{ route('admin.update', ["id" => $ardata->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="card-body">
                      @if($ardata->gambar)
                          <img id="preview" src="{{ asset('storage/gambar-artikel/'.$ardata->gambar) }}" width="100px" height="100px" alt="">
                      @endif
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <div class="input-group">
                          <input type="file" class="form-control" id="gambar" name="gambar"
                              style="display: none;" onchange="previewImage(event); updateFileName()">
                          <label for="gambar" class="btn-input-profil">Pilih Gambar</label>
                          <span id="file-name" class="file-name">Tidak ada gambar dipilih</span>
                      </div>
                        <small>Upload Foto Jika Ingin Menggantinya</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="judul" value="{{$ardata->judul}}" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <textarea  class="form-control" name="deskripsi" rows="7" id="exampleInputEmail1" >{{$ardata->deskripsi}}</textarea>
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
                      <div class="form-group-btn">
                        <button class="btn-edit-profil" type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div>

      </section>


    </div>
    
    <!-- /.content-header -->


  </div>
@endsection