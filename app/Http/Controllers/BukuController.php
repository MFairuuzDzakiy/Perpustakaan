<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Category;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        
        $category = Category::all();
        $penerbit = Penerbit::all();
        return view('buku.create',  compact('category','penerbit'));
        // return view('anggota.edit', compact('anggota','category','penerbit'));
    }

    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());
        Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'stok' => $request->stok,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $image->hashName(),
        ]);

        return redirect ('buku')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function show(buku $buku)
    {
        
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $category = Category::all();
        $penerbit = Penerbit::all();

        return view('buku.edit', compact('buku','category','penerbit'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());

        $buku = Buku::find($id);
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->category_id = $request->category_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->isbn = $request->isbn;
        $buku->pengarang = $request->pengarang;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopsis = $request->sinopsis;
        $buku->gambar = $image->hashName();
        $buku->Update();

        return redirect('buku')->with('sukses', 'Data berhasil di Update');

    }

    public function destroy(buku $buku)
    {
        $buku->delete();

        return redirect('buku')->with('suskes', 'Data Berhasil Dihapus');
    }
}