@extends('layout.main')

@section('conten')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Artikel Pertanian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">buat artikel</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <section class="content">
        <div class="container-fluid">
            <form action=" {{route('admin.store')}} " method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      {{-- <div class="card-header">
                        <h3 class="card-title">Tambahkan Artikel</h3>
                      </div> --}}
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder=" Masukkan judul">
                                @error('judul')
                                <small> {{$message}} </small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="7" placeholder="Tambahkan teks..."></textarea>
                                @error('deskripsi')
                                <small> {{$message}} </small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Unggah Gambar</label>
                              <input type="file" class="form-control" id="exampleInputEmail1" name="gambar">
                              @error('gambar')
                                  <small> {{$message}} </small>
                              @enderror
                            </div>
                            <div class="form-group-btn" style="margin-top: 40px">
                              <button type="submit" class=" btn-edit-profil btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
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