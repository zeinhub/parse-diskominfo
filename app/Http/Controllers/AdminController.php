<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin.home');
        $artikel = Artikel::all()->sortByDesc('created_at');
        return view('admin.home', ['artikel' => $artikel]);
    }
    public function uploadData()
    {
        return view('admin.upload');
    }
    public function editData($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.edit', ['artikel' => $artikel]);
    }
    public function uploadDokumentasi()
    {
        return view('admin.upload-file');
    }
    public function berita($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.post', ['artikel' => $artikel]);
    }
    public function store(Request $request)
    {
        Artikel::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'id_user' => "12",
            'nama_user' => "Admin",
            'foto_utama' => "timothy-eberly-VgvMDrPoCN4-unsplash.jpg",
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'wilayah' => $request->wilayah,
            'dinas' => $request->dinas,
            // 'deskripsi' => $request->artikel
        ]);

        return redirect(route('admin'));
    }
}
