@extends('app')
@section('breadcrumb')
<div class="breadcrumb">
    <a href="{{route('home')}}">Home</a> &nbsp; / &nbsp;<a href="#">Filter</a>
</div>
<hr>
@endsection
@section('content')
<style>
    .nav-search {
        display: none !important;
    }
</style>
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <div class="row">
            <div class="col">
                <h2 class="filter-title">Hasil Filter</h2>
            </div>
            <!-- <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div> -->
        </div>
        <div class="filter-box">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input class="form-control" type="text" name="judul" value="{{$filter['judul']}}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input class="form-control" type="text" name="judul" value="{{$filter['kategori']}}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input class="form-control" type="text" name="judul" value="{{$filter['tahun']}}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input class="form-control" type="text" name="judul" value="{{$filter['wilayah']}}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="dinas">Dinas</label>
                        <input class="form-control" type="text" name="judul" value="{{$filter['dinas']}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Hasil</h2>
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
                                            <a href="#">{{$h->nama_user}}</a>
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
                            <span class="category">{{$h->kategori}}</span>
                            <div class="title"><a href="{{route('berita', ['id' => $h->id])}}">{{$h->judul}}</a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
@endsection