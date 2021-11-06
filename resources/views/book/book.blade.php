@extends('layouts/main')

@section('content')

    <h3 class="text-center text-primary mt-3">Data Buku</h3>

    <div class="container-fluid my-3">
        <a href="{{ url('book/create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <div class="row">

            <div class="col">
                <form action="{{ url('book') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari" name="keyword" value="{{ $keyword }}">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>

            <div class="col">
                <form action="{{ url('book') }}">
                    <input type="hidden" name="keyword" value="">
                    <button class="btn btn-outline-primary" type="submit">Tampilkan Semua</button>
                </form>
            </div>

        </div>

    </div>
        
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="bg-primary text-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col" colspan="3" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @php
                    $no = 0;
                @endphp  
                
                @foreach ($books as $book=>$value)
                    @php
                        $no = $no+1;
                    @endphp
                    <tr>
                        <th scope="row">{{ $no }}</th>
                        <td>{{ $value->judul }}</td>
                        <td>{{ $value->penulis }}</td>
                        <td>{{ $value->penerbit }}</td>
                        <td class="text-center"><a href="{{ url('book/'.$value->id) }}" class="btn btn-sm btn-success">Detail</a></td>
                        <td class="text-center"><a href="{{ url('book/'.$value->id.'/edit') }}" class="btn btn-sm btn-primary">Ubah</a></td>
                        <td class="text-center">
                            <form action="{{ url('book/'.$value->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $books->links('pagination::bootstrap-4') }}
        </div>
        
    </div>
        
@endsection