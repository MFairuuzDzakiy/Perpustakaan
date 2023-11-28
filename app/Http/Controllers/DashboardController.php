<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        $category = Category::all();
        return view('dashboard.index', compact('anggota', 'buku', 'penerbit', 'category'));
    }
}
