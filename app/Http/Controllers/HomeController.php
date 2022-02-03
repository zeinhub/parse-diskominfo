<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;


class HomeController extends Controller
{
    public function index()
    {
    // return view('admin.home');
    $artikel = Artikel::all()->sortByDesc('created_at');
    return view('home', ['artikel' => $artikel]);
    }
    public function arsip()
    {
        return view('post');
    }
    public function statistic()
    {
        return view('statistic');
    }
    public function filter()
    {
        return view('filter');
    }
    // public function hasilFilter()
    // {
    //     return view('hasil-filter');
    // }
    public function cariFilter(request $request)
    {
        $filter = array(
            "judul" => $request->judul,
            "kategori" => $request->kategori,
            "tahun" => $request->tahun,
            "wilayah" => $request->wilayah,
            "dinas" => $request->dinas
        );
        $hasil = DB::table('artikel')
            ->where('judul', 'like', "%{$request->judul}%")
            ->where('kategori', 'like', "%{$request->kategori}%")
            ->where('tahun', 'like', "%{$request->tahun}%")
            ->where('wilayah', 'like', "%{$request->wilayah}%")
            ->where('dinas', 'like', "%{$request->dinas}%")
            ->get();

        return view('hasil-filter', ['hasil' => $hasil, 'filter' => $filter]);
    }

    public function cariArtikel(request $request)
    {
        $judulhalaman = array(
            "judul" => $request->judul
        );
        $hasil = DB::table('artikel')
            ->where('judul', 'like', "%{$request->judul}%")
            ->get();

        return view('hasil-pencarian', ['hasil' => $hasil, 'judulhalaman' => $judulhalaman]);
    }

    public function postbyauthor($author, $id_user)
    {
        $judulhalaman = array(
            "author" => $author
        );
        $artikel = DB::table('artikel')
        ->where('id_user', 'like', "{$id_user}")
        ->get();
        return view('postby', ['artikel' => $artikel, 'judulhalaman' => $judulhalaman]);
    }

    public function postbycategory($kategori)
    {
        $judulhalaman = array(
            "kategori" => $kategori
        );
        $artikel = DB::table('artikel')
        ->where('kategori', 'like', "{$kategori}")
        ->get();
        return view('bycategory', ['artikel' => $artikel, 'judulhalaman'=>$judulhalaman]);
    }
}
