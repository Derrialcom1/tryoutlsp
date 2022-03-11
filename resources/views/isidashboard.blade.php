@extends('dashboard')

@section('content')
<div class="row">
<div class="container border shadow p-3 mb-5 bg-white rounded">
    <h3>Terbaru</h3>
    <div class="container-fluid">
        <div class="position-relative">
    @foreach ($terbaru as $item)
    <a href="{{ route('isiartikel', $id = $item->id) }}">
        <h4 class="position-absolute mt-5" >Judul : {{ $item->judul_artikel }}</h4><br>
        <p class="position-absolute">Kategori : {{ $item->kategori->nama_kategori }}</p>
        <img src=".././images/{{ $item->gambar_artikel }}" width="350" height="200" alt="" srcset="">
    </a>
    <br>
    <br>
    @endforeach
</div>
    </div>
</div>
<div class="container border shadow p-3 mb-5 bg-white rounded">
    <h3>Favorit</h3>
    <div class="container-fluid">
        <div class="position-relative">
    @foreach ($favorit as $item)
    <a href="{{ route('isiartikel', $id = $item->id) }}">
        <h4 class="position-absolute mt-5" >Judul : {{ $item->judul_artikel }}</h4><br>
        <p class="position-absolute">Kategori : {{ $item->kategori->nama_kategori }}</p>
        <img src=".././images/{{ $item->gambar_artikel }}" width="350" height="200" alt="" srcset="">
    </a>
    <br>
    <br>
    @endforeach
</div>
    </div>
</div></div>
<hr><hr>
<hr><hr>
<div class="container border shadow p-3 mb-5 bg-white rounded">
    <div class="container-fluid">
    <h3>Artikel lain</h3>
    @foreach ($data as $item)
    <a href="{{ route('isiartikel', $id = $item->id) }}">
        <h4>Judul : {{ $item->judul_artikel }}</h4>  
        <p>Kategori : {{ $item->kategori->nama_kategori }}</p>
        <img src=".././images/{{ $item->gambar_artikel }}" width="500" height="400" alt="" srcset="">
    </a>
    @endforeach
    </div>
    <div class="col-12 mt-3">
        {{ $data->links() }}
    </div>
</div>


@endsection