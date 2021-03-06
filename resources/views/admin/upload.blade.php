@extends('app')
@section('addon-script-top')
<script src="https://cdn.tiny.cloud/1/g30aj0fetx2ms7ttb105k6vsyqvgclb7sfxpk92vzasxp45g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#isi'
    });
  </script>
@endsection
@section('title')
    Unggah Dokumentasi
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <a href="{{route('admin')}}">Admin</a> &nbsp; / &nbsp;<a href="#">Upload Data</a>
  </div>
  <hr>
@endsection
@section('content')
<div class="latest-upload-wrap pt-fs">
    <h2>
        Input Data
    </h2>
    <form action="#">
    <div class="row">
    <div class="col-12">
        <div class="form-group">
        <label for="judul">Judul</label>
        <input placeholder="Judul" type="text" class="form-control" name="judul" id="">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
        <label for="kategori">Kategori</label>
        <input placeholder="Kategori" type="text" class="form-control" name="kategori" id="">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="text" class="form-control" placeholder="tahun" name="tahun" id="">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
        <label for="wilayah">Wilayah</label>
        </div>
        <input placeholder="Wilayah" type="text" class="form-control" name="wilayah" id="">
    </div>
    <div class="col-6">
        <div class="form-group">
        <label for="dinas">Dinas</label>
        <input placeholder="Dinas" type="text" class="form-control" name="" id="">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
        <label for="hasil">Hasil</label>
        <input class="form-control" type="text" placeholder="Hasil">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
        <label for="featured-image">Featured Image</label>
        <input class="form-control" type="file" placeholder="Hasil">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
        <label for="featured-image">Lampiran</label>
        <input class="form-control" type="file" placeholder="Hasil" multiple>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
        <label for="isi">Artikel</label>
        
        <textarea id="isi" class="form-control" type="text" placeholder="Isi"></textarea>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
        <br>
        <div class="d-grid gap-2">
            <button onclick="sukses()" class="btn btn-primary">Simpan Data</button>
        </div>
        </div>
    </div>
    </div>
    </form>
    <script>
    function sukses() {
    Swal.fire(
    'Sukses!',
    'Data berhasil disimpan!',
    'success'
    )
    }
    </script>
</div>
@endsection