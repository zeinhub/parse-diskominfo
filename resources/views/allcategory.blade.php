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
                <div class="col-lg-4 col-sm-12">
                    <a href="{{route('postbycategory', ['kategori' => $area->category])}}" class="category-box pt-4">
                        {{$area->category}}
                        <?php
                        $jmlpost = DB::table('artikel')
                            ->where('kategori', $area->category)
                            ->count();
                        ?>
                        <?= "(" . $jmlpost . ")" ?>

                    </a>

                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
@endsection