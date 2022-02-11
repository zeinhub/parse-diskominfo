<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AdminController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all()->sortByDesc('created_at');
        return view('home', ['artikel' => $artikel]);
    }
    public function uploadData()
    {
        return view('admin.upload');
    }
    public function editData($uuid)
    {
        $artikel = Artikel::where('uuid', $uuid)->first();
        return view('admin.edit', ['artikel' => $artikel]);
    }
    public function uploadDokumentasi()
    {
        return view('admin.upload-file');
    }
    public function berita($uuid)
    {
        $artikel = Artikel::where('uuid', $uuid)->first();
        $files = File::where('artikel_id', $uuid)->get();
        return view('post', ['artikel' => $artikel, 'files' => $files]);
    }
    public function store(Request $request)
    {
        //pembuatan Uuid
        $id = Uuid::uuid1()->getHex();

        $request->validate([
            // 'foto' => 'required',
            'foto.*' => 'mimes:txt,odt,html,latex,mdb,doc,docx,xls,xlsx,ppt,pptx,PDF,pdf,jpg,jpeg,png,GIF,TIFF,psd,RAW,exif,SVG,AI,AVI,mp3,MP3,mp4,MP4,MPG,WEBM,MKV,GIFV,WMV,cdr',
            'video.*' => 'mimes:txt,odt,html,latex,mdb,doc,docx,xls,xlsx,ppt,pptx,PDF,pdf,jpg,jpeg,png,GIF,TIFF,psd,RAW,exif,SVG,AI,AVI,mp3,MP3,mp4,MP4,MPG,WEBM,MKV,GIFV,WMV,cdr'
        ]);

        //post Foto
        if ($request->hasfile('foto')) {
            // return redirect(route('statistic'));
            $files = [];
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('files'), $filename);
                    $files[] = [
                        'artikel_id' => $id,
                        'nama_file' => $filename,
                        'jenis_file' => "foto"
                    ];
                }
            }
            File::insert($files);
        }

        // $request->validate([
        //     // 'video' => 'required',
        //     'video.*' => 'mimes:txt,odt,html,latex,mdb,doc,docx,xls,xlsx,ppt,pptx,PDF,pdf,jpg,jpeg,png,GIF,TIFF,psd,RAW,exif,SVG,AI,AVI,mp3,MP3,mp4,MP4,MPG,WEBM,MKV,GIFV,WMV,cdr'
        // ]);

        //post Video
        if ($request->hasfile('video')) {
            // return redirect(route('logout'));
            $files = [];
            foreach ($request->file('video') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('files'), $filename);
                    $files[] = [
                        'artikel_id' => $id,
                        'nama_file' => $filename,
                        'jenis_file' => "video"
                    ];
                }
            }
            File::insert($files);
        }

        //post artikel
        Artikel::create([
            'uuid' => $id,
            'username' => Auth::user()->username,
            'nama_admin' => Auth::user()->name,
            'judul' => $request->judul,
            'link' => $request->link,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'wilayah' => $request->wilayah,
            'dinas' => $request->dinas,
        ]);

        return redirect(route('adminhome'));
    }

    public function storeEdit(Request $request)
    {
    }
}
