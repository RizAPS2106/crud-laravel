@extends('layouts/main')

@section('content')

<h3 class="text-center text-primary mt-3">Tambah Data Buku</h3>

<div class="container">
    <form action="{{ url('book') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="judul"><strong>Judul</strong></label>
        <input type="text" class="form-control mb-2" name="judul">
        @foreach ($errors->get('judul') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="penulis"><strong>Penulis</strong></label>
        <input type="text" class="form-control mb-2" name="penulis">
        @foreach ($errors->get('penulis') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="penerbit"><strong>Penerbit</strong></label>
        <input type="text" class="form-control mb-2" name="penerbit">
        @foreach ($errors->get('penerbit') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="sinopsis"><strong>Sinopsis</strong></label>
        <textarea name="sinopsis" id="sinopsis" cols="30" rows="3" class="form-control mb-2"></textarea>
        @foreach ($errors->get('sinopsis') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="gambar"><strong>Gambar</strong></label>
        <input type="file" id="upload_gambar" name="gambar" class="form-control" accept="image/*" onchange="tampilkanPreview(this,'preview')">
        <div class="img-thumbnail">
            <center>
                <img id="preview" alt="*preview gambar" width="200">
            </center>
        </div>

        <br><br>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ url('book') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection