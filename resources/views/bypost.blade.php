@extends('app')
@section('title')
<?php foreach ($nama as $n) {
    $nama_author = $n->name;
} ?>
Author: {{$nama_author}}
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a href="#">Penulis</a> &nbsp;/&nbsp; <a>{{ strtoUpper($nama_author)}}
        <?php } else { ?>
            <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a href="#">Penulis</a> &nbsp;/&nbsp; <a>{{ strtoUpper($nama_author)}}
            <?php } ?>
</div>
<hr>
@endsection
@section('content')
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Author: {{$nama_author}}</h2>
        <div class="row">
            <?php
            foreach ($artikel as $a) {
                $foto = DB::table('file')->where('artikel_id', $a->id)->where('jenis_file', "foto")->first();
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
                                            {{$a->created_at}} by
                                            <a href="#">{{$a->nama_admin}}</a>
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
                                <div class="title"><a href="{{route('admin-berita', ['id' => $a->id])}}">{{$a->judul}}</a></div>
                            <?php } else { ?>
                                <div class="title"><a href="{{route('berita', ['id' => $a->id])}}">{{$a->judul}}</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
@endsection