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
Ubah Data
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <a href="{{route('admin')}}">Admin</a> &nbsp; / &nbsp;<a href="#">Ubah Data</a>
</div>
<hr>
@endsection
@section('content')
<div class="latest-upload-wrap pt-fs">
    <h2>
        Ubah Data
    </h2>
    <form method="post" action="{{route('store-file')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input placeholder="Judul" type="text" value="{{$artikel->judul}}" class="form-control" name="judul" id="">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Link Berita</label>
                    <input placeholder="Link" type="text" value="{{$artikel->link}}" class="form-control" name="link" id="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input placeholder="Kategori" type="text" value="{{$artikel->kategori}}" class="form-control" name="kategori" id="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" class="form-control" value="{{$artikel->tahun}}" placeholder="tahun" name="tahun" id="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="wilayah">Wilayah</label>
                </div>
                <input placeholder="Wilayah" type="text" value="{{$artikel->wilayah}}" class="form-control" name="wilayah" id="">
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="dinas">Dinas</label>
                    <input placeholder="Dinas" type="text" value="{{$artikel->dinas}}" class="form-control" name="dinas" id="">
                </div>
            </div>
            <!-- <div class="col">
                <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <input class="form-control" type="text" placeholder="Hasil">
                </div>
            </div> -->
            <!-- <div class="col">
                <div class="form-group">
                    <label for="featured-image">Featured Image</label>
                    <input class="form-control" type="file" name="foto_utama" placeholder="Hasil">
                </div>
            </div> -->
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Lampiran</label>
                    <input class="form-control" type="file" placeholder="Hasil" multiple>
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">File</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>test.jpg</td>
                        <td><img width="50px" src="{{url('images/timothy-eberly-VgvMDrPoCN4-unsplash.jpg')}}" alt=""></td>
                        <td><a href="#" class="btn btn-outline-danger">Hapus</a></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <!-- <div class="col-12">
                <div class="form-group">
                    <label for="isi">Artikel</label>

                    <textarea id="isi" class="form-control" type="text" name="artikel" placeholder="Isi"></textarea>
                </div>
            </div> -->
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