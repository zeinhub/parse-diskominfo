<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'foto.*' => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif',
            'video.*' => 'mimes:ogm,wmv,mpg,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,opus,flac,webm,weba,wav,ogg,m4a,mp3,oga,mid,amr,aiff,wma,au,aac'
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
                        'jenis_file' => "foto",
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
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
                        'jenis_file' => "video",
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
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

    public function editData($uuid)
    {
        $artikel = Artikel::where('uuid', $uuid)->first();
        $files = File::where('artikel_id', $uuid)->get();
        return view('admin.edit', ['artikel' => $artikel, 'files' => $files]);
    }

    public function storeEdit($uuid, Request $request)
    {
        $update = [
            'judul' => $request->judul,
            'link' => $request->link,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'wilayah' => $request->wilayah,
            'dinas' => $request->dinas,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('artikel')->where('uuid', 'like', "%{$uuid}%")->update($update);

        //Tambah Dokumentasi
        $request->validate([
            // 'foto' => 'required',
            'foto.*' => 'mimes:tiff,pjp,jfif,bmp,gif,svg,png,xbm,dib,jxl,jpeg,svgz,jpg,webp,ico,tif,pjpeg,avif',
            'video.*' => 'mimes:ogm,wmv,mpg,webm,ogv,mov,asx,mpeg,mp4,m4v,avi,opus,flac,webm,weba,wav,ogg,m4a,mp3,oga,mid,amr,aiff,wma,au,aac'
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
                        'artikel_id' => $uuid,
                        'nama_file' => $filename,
                        'jenis_file' => "foto",
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
            File::insert($files);
        }

        //post Video
        if ($request->hasfile('video')) {
            // return redirect(route('logout'));
            $files = [];
            foreach ($request->file('video') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('files'), $filename);
                    $files[] = [
                        'artikel_id' => $uuid,
                        'nama_file' => $filename,
                        'jenis_file' => "video",
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
            File::insert($files);
        }

        return redirect(route('admin-berita', ['uuid' => $uuid]));
    }

    public function deleteDokumentasi($id)
    {
        File::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
