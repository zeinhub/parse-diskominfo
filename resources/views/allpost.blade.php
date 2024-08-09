@extends('app')
@section('title')
Semua Berita
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a href="#">Semua Post</a>
    <?php } else { ?>
        <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a href="#">Semua Post</a>
    <?php } ?>
</div></a>
<hr>
@endsection
@section('content')
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title" style="margin-bottom: 0px;">Semua Post</h2>
        <h5 class=" filter-title" style="font-weight: lighter">{{ $artikel->total() }} berita</h5>
        <div class="row">
            <?php
            foreach ($artikel as $a) {
                $foto = DB::table('file')->where('artikel_id', $a->uuid)->where('jenis_file', "foto")->first();
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
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
                                            <a href="{{route('postbyauthor', ['username' => $a->username])}}">{{$a->nama_admin}}</a>
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
            <?php } ?>
        </div>
    </div>
    <div class="pagination">
        {{$artikel->links()}}
    </div>
</div>
@endsection