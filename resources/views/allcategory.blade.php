@extends('app')
@section('breadcrumb')
<div class="breadcrumb">
    <?php if (Auth::User()->role == "admin") { ?>
        <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a href="#">Kategori</a>
    <?php } else { ?>
        <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a href="#">Kategori</a>
    <?php } ?>
</div></a>
<hr>
@endsection
@section('content')
<div class="filter-search">
    <div class="latest-upload-wrap pt-fs">
        <h2 class="filter-title">Kategori
        </h2>
        <div class="row justify-content-center">
            <?php
            $data = file_get_contents("category.json");
            foreach (json_decode($data)->category as $area) {

            ?>
                <div class="col">
                    <div class="category-box">
                        <div class="row">
                            <div class="col">
                                <a href="{{route('postbycategory', ['kategori' => $area->category])}}">{{$area->category}} </a>
                            </div>
                            <div class="col-3 text-end">
                                <?php
                                echo DB::table('artikel')
                                    ->where('kategori', $area->category)
                                    ->count();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
@endsection