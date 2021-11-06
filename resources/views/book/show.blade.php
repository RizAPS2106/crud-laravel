@extends('layouts/main')

@section('content')

<div class="container">

    <center>
        <div class="card my-3" style="max-width: 650px;">
            <div class="row g-0">
              
                  
                @if (strlen($model->gambar) > 0)
                <div class="col">
                    <img src="{{ asset('img/'.$model->gambar) }}" class="img-fluid rounded-start h-100" alt="Gambar Buku">
                </div>
                @endif
              
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title"><strong>{{ $model->judul }}</strong></h5>
                  <h6 class="card-subtitle mb-2 text-muted">Penulis : {{ $model->penulis }}</h6>
                  <h6 class="card-subtitle mb-2 text-muted">Penerbit : {{ $model->penerbit }}</h6>
                  <p class="card-text">{{ $model->sinopsis }}</p>
                  <a href="{{ url('book') }}" class="btn btn-secondary">Kembali</a>
                </div>
              </div>
            </div>
        </div>
    </center>   

</div>

@endsection