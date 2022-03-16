@extends('app')
@section('addon-script-top')

@endsection
@section('title')
Unggah Dokumentasi
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a>Upload Data</a>
</div>
<hr>
@endsection
@section('content')
<div class="latest-upload-wrap pt-fs">
    <h2>
        Input Data
    </h2>
    <form method="POST" action="{{route('store-file')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input placeholder="Judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" id="" required>
                </div>
            </div>
            <div class=" col-12">
                <div class="form-group">
                    <label for="judul">Link Berita</label>
                    <input placeholder="Link" type="text" class="form-control" name="link" value="{{ old('link') }}" id="" required>
                    @if ($errors->has('link'))
                    <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                        <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <p style="margin-bottom: 0px; font-size:small">{{ $errors->first('link') }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input placeholder="Kategori" list="category" type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" id="" required>
                    <datalist id="category">
                        <?php
                        $data = file_get_contents("category.json");
                        foreach (json_decode($data)->category as $area) {
                        ?>
                            <option value="<?= $area->category; ?>">
                            <?php
                        }
                            ?>
                    </datalist>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" list="tahun" class="form-control" placeholder="tahun" name="tahun" value="{{ old('tahun') }}" id="" required>
                    <datalist id="tahun">
                        <?php
                        $array = [];
                        foreach ($tahun as $t) {
                            if (!in_array($t, $array)) {
                                array_push($array, $t);
                        ?>
                                <option value="<?= $t; ?>">
                            <?php }
                        } ?>
                    </datalist>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="wilayah">Wilayah</label>
                </div>
                <input placeholder="Wilayah" type="text" list="wilayah" class="form-control" name="wilayah" value="{{ old('wilayah') }}" id="" required>
                <datalist id="wilayah">
                    <?php
                    $array = [];
                    foreach ($wilayah as $w) {
                        if (!in_array($w, $array)) {
                            array_push($array, $w);
                    ?>
                            <option value="<?= $w; ?>">
                        <?php }
                    } ?>
                </datalist>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="dinas">Dinas</label>
                    <input placeholder="Dinas" type="text" list="dinas" class="form-control" name="dinas" value="{{ old('dinas') }}" id="" required>
                    <datalist id="dinas">
                        <?php
                        $array = [];
                        foreach ($dinas as $d) {
                            if (!in_array($d, $array)) {
                                array_push($array, $d);
                        ?>
                                <option value="<?= $d; ?>">
                            <?php }
                        } ?>
                    </datalist>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Foto</label>
                    <input class="form-control" type="file" name="foto[]" placeholder="Dokumentasi Foto" accept="image/*" multiple>
                </div>
                @if ($errors->has('foto.*'))
                <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                    <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p style="margin-bottom: 0px; font-size:small">{{ $errors->first('foto.*') }}</p>
                </div>
                @endif
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Video</label>
                    <input class="form-control" type="file" name="video[]" placeholder="Dokumentasi Video" accept="video/*, audio/*" multiple>
                </div>
                @if ($errors->has('video.*'))
                <div class="alert alert-danger alert-block" style="margin-top: 16px;">
                    <button style="float: right" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p style="margin-bottom: 0px; font-size:small">{{ $errors->first('video.*') }}</p>
                </div>
                @endif
            </div>
            <div class="col-12">
                <div class="form-group">
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" value="submit">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection