@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Artikel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Artikel</a></li>
                    <li class="breadcrumb-item active">Add Artikel</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Isi data - data dibawah ini dengan benar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('saveartikel') }}" id="quickForm" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="user_id" value="{{auth()->user()->id}}" class="form-control" id="penulis" placeholder="Masukkan Penulis Artikel">
                </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                      <select id="form-selection" name="kategori_id">
                        @foreach ($data as $item)
                            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                        @endforeach
                      </select>
                  </div>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" name="judul_artikel" class="form-control" id="judul" placeholder="Masukkan Judul Artikel">
                    </div>
                <div class="form-group">
                  <label for="isi">Isi Artikel</label>
                  <textarea name="isi_artikel" class="form-control" id="isi" cols="30" rows="10" placeholder="Masukkan Isi Artikel"></textarea>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" name="gambar_artikel" class="form-control" id="gambar" placeholder="Masukkan Gambar Artikel">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection