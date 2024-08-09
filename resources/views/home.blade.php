@extends('app')
@section('title')
Selamat Datang - Pusat Data dan Arsip Elektronik (PARSE) Diskominfo Kabupaten Tangerang
@endsection
@section('content')

<link rel="stylesheet" href="{{url('frontend/style/style.css')}}">

@if ($message = Session::get('success'))
<script>
    alert(<?php echo json_encode($message); ?>);
</script>
@endif

<div class="banner">
    <img src="{{url('frontend/assets/image/banner.png')}}" alt="">
</div>
<div class="latest-upload-wrap">
    <div class="row">
        <div class="col">
            <h3 style="display: inline-block" class="latest-upload-heading">Unggahan Terbaru</h3>
        </div>
        <div class="col text-end">
            <a href="{{route('allpost')}}" style="margin-top: 20px" class="btn btn-outline-primary ">Semua Post</a>
        </div>
    </div>
    <div class="row">
        <?php
        $n = 0;
        foreach ($artikel as $a) {
            $foto = DB::table('file')->where('artikel_id', $a->uuid)->where('jenis_file', "foto")->first();
            if ($n < 5) {
        ?>
                <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <?php if (is_object($foto)) { ?>
                                <div loading="lazy" style="background-image:url('{{url('files/', $foto->nama_file)}}');" class="post-thumbnail"></div>
                            <?php } else { ?>
                                <div loading="lazy" style="background-image:url('{{url('frontend/assets/image/kosong.png')}}');" class="post-thumbnail"></div>
                            <?php } ?>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            {{date('d-m-Y', strtotime($a->created_at))}} by
                                            <a href=" {{route('postbyauthor', ['username' => $a->username])}}">{{$a->nama_admin}}</a>
                                        </div>
                                    </div>
                                    {{-- <div class="col padding-0">
                        <div class="author">
                        <i class="fas fa-user"></i>
                        <a href="#">Awiez Fathwa Zein</a>
                        </div>
                    </div>
                    <div class="col text-end padding-0">
                    <i class="fas fa-calendar"></i>
                    25/01/2022</div> --}}
                                </div>
                            </div>
                            <a href="{{route('postbycategory', ['kategori' => $a->kategori])}}" class="category">{{$a->kategori}}</a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title" title="{{$a->judul}}"><a href="{{route('admin-berita', ['uuid' => $a->uuid])}}">{{substr($a->judul, 0, 40)."... [Selengkapnya]"}}</a></div>
                            <?php } else { ?>
                                <div class="title" title="{{$a->judul}}"><a href="{{route('berita', ['uuid' => $a->uuid])}}">{{substr($a->judul, 0, 40)."... [Selengkapnya]"}}</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php
                $n++;
            }
        }
        ?>
    </div>
</div>
@endsection