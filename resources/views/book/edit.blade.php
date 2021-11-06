@extends('layouts/main')

@section('content')
    
<h3 class="text-center text-primary mt-3">Ubah Data Buku</h3>

<div class="container">
    <form action="{{ url('book/'.$model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <label for="judul"><strong>Judul</strong></label>
        <input type="text" class="form-control mb-2" name="judul" value="{{ $model->judul }}">
        @foreach ($errors->get('judul') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="penulis"><strong>Penulis</strong></label>
        <input type="text" class="form-control mb-2" name="penulis" value="{{ $model->penulis }}">
        @foreach ($errors->get('penulis') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="penerbit"><strong>Penerbit</strong></label>
        <input type="text" class="form-control mb-2" name="penerbit" value="{{ $model->penerbit }}">
        @foreach ($errors->get('penerbit') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        <label for="sinopsis"><strong>Sinopsis</strong></label>
        <textarea name="sinopsis" id="sinopsis" cols="30" rows="3" class="form-control mb-2">{{ $model->sinopsis }}</textarea>
        @foreach ($errors->get('sinopsis') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach

        
		<label><strong>Ubah Gambar</strong></label>
        <div class="form-group row">
			<div class="col-sm-6 mt-2">
				<label class="text-muted"><strong>Gambar Lama</strong></label>
				<div class="img-thumbnail">
					<center>
                        <img src="{{ asset('img/'.$model->gambar) }}" height="300" alt="Tidak Memiliki Gambar">
					</center>
				</div>
                	
			</div>
			
			<div class="col-sm-6 mt-2">
				<label class="text-muted"><strong>Gambar Baru</strong></label><br>
				<div class="img-thumbnail">
					<center>
						<img id="preview" alt="*preview gambar" width="300" height="261">
					</center>
				</div>
				<input id="upload_gambar" type="file" name="gambar" class="form-control" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
			</div>
		</div>

        <br><br>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a href="{{ url('book') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

@endsection