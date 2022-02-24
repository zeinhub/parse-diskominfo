<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;
use App\Models\File;
use Carbon\Carbon;

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
    public function statistikBerita()
    {
        $label_harian = [];
        $data_harian = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);
            $data = Artikel::whereDate('created_at', $tanggal)->count();
            array_push($label_harian, date('d M', strtotime($tanggal)));
            array_push($data_harian, $data);
        }

        $label_mingguan = [];
        $data_mingguan = [];
        $j = 27;
        for ($i = 4; $i > 0; $i--) {
            $first = Carbon::today()->subDays($j);
            $data_first = Carbon::today()->subDays($j);
            $last = Carbon::today()->subDays($j -= 6);
            $data_last = date('Y-m-d', strtotime(Carbon::today()->subDays($j))) . " 23:59:59";
            $week = date('d M', strtotime($first)) . " - " . date('d M', strtotime($last));
            $data = Artikel::whereBetween('created_at', [$data_first, $data_last])->count();
            array_push($label_mingguan, $week);
            array_push($data_mingguan, $data);
            $j--;
        }

        $label_tahunan = [];
        $data_tahunan = [];
        for ($i = 11; $i >= 0; $i--) {
            array_push($label_tahunan, date('M Y', strtotime(Carbon::today()->subMonth($i))));
            array_push($data_tahunan, Artikel::whereMonth('created_at', '=', Carbon::today()->subMonth($i))->count());
        }

        return view('statistik-berita', ['label_harian' => $label_harian, 'data_harian' => $data_harian, 'label_mingguan' => $label_mingguan, 'data_mingguan' => $data_mingguan, 'label_tahunan' => $label_tahunan, 'data_tahunan' => $data_tahunan]);
    }
    public function statistikKategori()
    {
        return view('statistik-kategori');
    }
    public function hasilStatistikKategori(request $request)
    {
        $kategori = $request->kategori;

        $label_harian = [];
        $data_harian = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);
            $data = Artikel::whereDate('created_at', $tanggal)->where('kategori', 'like', "%{$request->kategori}%")->count();
            array_push($label_harian, date('d M', strtotime($tanggal)));
            array_push($data_harian, $data);
        }

        $label_mingguan = [];
        $data_mingguan = [];
        $j = 27;
        for ($i = 4; $i > 0; $i--) {
            $first = Carbon::today()->subDays($j);
            $data_first = Carbon::today()->subDays($j);
            $last = Carbon::today()->subDays($j -= 6);
            $data_last = date('Y-m-d', strtotime(Carbon::today()->subDays($j))) . " 23:59:59";
            $week = date('d M', strtotime($first)) . " - " . date('d M', strtotime($last));
            $data = Artikel::whereBetween('created_at', [$data_first, $data_last])->where('kategori', 'like', "%{$request->kategori}%")->count();
            array_push($label_mingguan, $week);
            array_push($data_mingguan, $data);
            $j--;
        }

        $label_tahunan = [];
        $data_tahunan = [];
        for ($i = 11; $i >= 0; $i--) {
            array_push($label_tahunan, date('M Y', strtotime(Carbon::today()->subMonth($i))));
            array_push($data_tahunan, Artikel::whereMonth('created_at', '=', Carbon::today()->subMonth($i))->where('kategori', 'like', "%{$request->kategori}%")->count());
        }

        return view('hasil-statistik-kategori', ['kategori' => $kategori, 'label_harian' => $label_harian, 'data_harian' => $data_harian, 'label_mingguan' => $label_mingguan, 'data_mingguan' => $data_mingguan, 'label_tahunan' => $label_tahunan, 'data_tahunan' => $data_tahunan]);
    }
    public function filter()
    {
        $tahun = DB::table('artikel')
            ->pluck('tahun');
        $wilayah = DB::table('artikel')
            ->pluck('wilayah');
        $dinas = DB::table('artikel')
            ->pluck('dinas');
        return view('filter', ['tahun' => $tahun, 'wilayah' => $wilayah, 'dinas' => $dinas]);
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
            ->orderByDesc('created_at')
            ->paginate(2)->withQueryString();

        return view('hasil-filter', ['hasil' => $hasil, 'filter' => $filter]);
    }

    public function cariArtikel(request $request)
    {
        $judulhalaman = array(
            "judul" => $request->judul
        );
        $hasil = DB::table('artikel')
            ->where('judul', 'like', "%{$request->judul}%")
            ->orderByDesc('created_at')
            ->paginate(2)->withQueryString();

        return view('hasil-pencarian', ['hasil' => $hasil, 'judulhalaman' => $judulhalaman]);
    }

    public function postbyauthor($parseusername)
    {
        $nama = DB::table('users')
            ->where('username', 'like', "{$parseusername}")
            ->get('name');

        $artikel = DB::table('artikel')
            ->where('username', 'like', "{$parseusername}")
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('bypost', ['artikel' => $artikel, 'nama' => $nama]);
    }

    public function postbycategory($parsekategori)
    {
        $kategori = array(
            "kategori" => $parsekategori
        );
        $artikel = DB::table('artikel')
            ->where('kategori', 'like', "{$parsekategori}")
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('bycategory', ['artikel' => $artikel, 'kategori' => $kategori]);
    }

    public function allpost()
    {
        $artikel = DB::table('artikel')
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('allpost', ['artikel' => $artikel]);
    }
    public function allcategory()
    {
        // $artikel = DB::table('artikel')
        //     ->paginate(9);
        //     ->pluck('kategori');
        return view('allcategory');
    }
}
