@extends('app')
@section('title')
Upload Dokumentasi
@endsection
@section('breadcrumb')
<div class="breadcrumb">
  <a href="{{route('adminhome')}}">Admin</a> &nbsp;/&nbsp;<a href="#">Upload Dokumentasi</a>
</div>
<hr>
@endsection
@section('content')
<h2>
  Upload Dokumentasi
</h2>
<form action="#">
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="judul">Judul</label>
        <input placeholder="Judul" type="text" class="form-control" name="judul" id="">
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="judul">Upload File</label>
        <input type="file" class="form-control" multiple id="">
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
@endsection