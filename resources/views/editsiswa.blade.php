@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('siswa') }}">Siswa</a></li>
                    <li class="breadcrumb-item active">Edit Siswa</li>
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
            <form method="POST" action="{{ route('updatesiswa', $id = $data->id) }}" id="quickForm">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ $data->nama }}" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Siswa">
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="text" value="{{ $data->kelas }}" name="kelas" class="form-control" id="kelas" placeholder="Masukkan Kelas Siswa">
                </div>
                <div class="form-group">
                    <label for="tanggal_pulang">Tanggal Pulang</label>
                    <input type="text" value="{{ $data->tanggal_pulang }}" name="tanggal_pulang" class="form-control" id="tanggal_pulang" placeholder="Masukkan Tanggal Pulang Siswa">
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