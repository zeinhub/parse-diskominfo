@extends('app')
@section('title')
Pencarian Judul: {{$judulhalaman['judul']}}
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a>{{$judulhalaman['judul']}}</a>
    <?php } else { ?>
        <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a>{{$judulhalaman['judul']}}</a>
    <?php } ?>
</div>
<hr>
@endsection
@section('content')
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Judul: {{$judulhalaman['judul']}}
        </h2>
        <div class="row">
            <?php
            foreach ($hasil as $h) {
                $foto = DB::table('file')->where('artikel_id', $h->uuid)->where('jenis_file', "foto")->first();
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <?php if (is_object($foto)) { ?>
                                <div loading="lazy" style="background-image:url('{{url('files/', $foto->nama_file)}}');" class="post-thumbnail"></div>
                            <?php } else { ?>
                                <div loading="lazy" style="background-image:url('{{url('files/kosong.png')}}');" class="post-thumbnail"></div>
                            <?php } ?>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            {{date('d-m-Y', strtotime($h->created_at))}} by
                                            <a href=" {{route('postbyauthor', ['username' => $h->username])}}">{{$h->nama_admin}}</a>
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
                            <a href="{{route('postbycategory', ['kategori' => $h->kategori])}}" class="category">{{$h->kategori}}</a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title"><a href="{{route('admin-berita', ['uuid' => $h->uuid])}}">{{$h->judul}}</a></div>
                            <?php } else { ?>
                                <div class="title"><a href="{{route('berita', ['uuid' => $h->uuid])}}">{{$h->judul}}</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <div class="pagination">
        {{$hasil->links()}}
    </div>
</div>
@endsection