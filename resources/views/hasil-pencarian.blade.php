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
            ?>
                <div class="col-lg-4 col-md-5 col-sm-12 mb-20-px">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <div loading="lazy" style="background-image:url('{{url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')}}');" class="post-thumbnail"></div>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            {{$h->created_at}} by
                                            <a href="{{route('postbyauthor', ['author' => $h->nama_user, 'id_author' => $h->id_user])}}">{{$h->nama_user}}</a>
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
                                <div class="title"><a href="{{route('admin-berita', ['id' => $h->id])}}">{{$h->judul}}</a></div>
                            <?php } else { ?>
                                <div class="title"><a href="{{route('berita', ['id' => $h->id])}}">{{$h->judul}}</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
@endsection