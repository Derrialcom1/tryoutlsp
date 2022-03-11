@extends('dashboard')

@section('content')

<div class="container">
    <div class="container border shadow p-3 mb-5 bg-white rounded">
        <h4>Judul : {{ $data->judul_artikel }}</h4> 
        <p>Penulis : {{ $data->user->name }}</p> 
        <p>{{ $data->isi_artikel }}</p>
    </div>
</div>

@endsection