<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;
use App\Models\File;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "admin") {
                return redirect(route('adminhome'));
            } else if (Auth::user()->role == "user") {
                $artikel = Artikel::all()->sortByDesc('created_at');
                return view('home', ['artikel' => $artikel]);
            } else {
                return redirect(route('login'));
            }
        }
    }
    public function statistic()
    {
        return view('statistic');
    }
    public function filter()
    {
        return view('filter');
    }
    public function about()
    {
        return view('about');
    }
    public function berita($uuid)
    {
        $artikel = Artikel::where('uuid', $uuid)->first();
        $files = File::where('artikel_id', $uuid)->get();
        return view('post', ['artikel' => $artikel, 'files' => $files]);
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
            "dinas" => $request->dinas,
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

    public function postbyauthor($parseusername)
    {
        $nama = DB::table('users')
            ->where('username', 'like', "{$parseusername}")
            ->get('name');

        $artikel = DB::table('artikel')
            ->where('username', 'like', "{$parseusername}")
            ->get();
        return view('bypost', ['artikel' => $artikel, 'nama' => $nama]);
    }

    public function postbycategory($parsekategori)
    {
        $kategori = array(
            "kategori" => $parsekategori
        );
        $artikel = DB::table('artikel')
            ->where('kategori', 'like', "{$parsekategori}")
            ->get();
        return view('bycategory', ['artikel' => $artikel, 'kategori' => $kategori]);
    }
}
