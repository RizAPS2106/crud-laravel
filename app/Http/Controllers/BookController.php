<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use App\Http\Requests\BookRequest;  

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $books = Book::where('judul','LIKE', '%'.$keyword.'%')
            ->orWhere('penulis','LIKE', '%'.$keyword.'%')
            ->orWhere('penerbit','LIKE', '%'.$keyword.'%')
            ->paginate(5);
        $books->appends($request->all());            
        return view('book/book',compact('books','keyword')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Book;
        
        return view('book/create', compact('model')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $model = new Book;
        $model->judul = $request->judul;
        $model->penulis = $request->penulis;   
        $model->penerbit = $request->penerbit;       
        $model->sinopsis = $request->sinopsis;

        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ","",$file->getClientOriginalName());
            $file->move('img',$nama_file);

            $model->gambar = $nama_file;
        }

        $model->save();
        
        return redirect('book')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Book::find($id);
        
        return view('book/show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Book::find($id);
        
        return view('book/edit', compact('model'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $model = Book::find($id);
        $model->judul = $request->judul;
        $model->penulis = $request->penulis;   
        $model->penerbit = $request->penerbit;       
        $model->sinopsis = $request->sinopsis;

        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ","",$file->getClientOriginalName());
            $file->move('img',$nama_file);
            
            File::delete('img',$model->gambar);

            $model->gambar = $nama_file;
        }

        $model->save();
        
        return redirect('book')->with('primary','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Book::find($id);
        $model->delete();

        return redirect('book')->with('danger','Data berhasil dihapus');
    }
}
