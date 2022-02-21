@extends('app')
@section('title')
Statistik Kategori
@endsection
@section('breadcrumb')
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a>Statistik Kategori</a>
  <?php } else { ?>
    <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a>Statistik Kategori</a>
  <?php } ?>
</div>
<hr>
@endsection
@section('content')
<div class="statistic">
  <div class="statistic-title">
    <h2>Statistik Kategori</h2>
    <form class="mb-4" method="get" action="{{route('hasil-statistik-kategori')}}">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <input placeholder="Kategori" list="category" type="text" class="form-control" name="kategori" id="" required>
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
        <div class="col-2">
          <button class="btn btn-outline-primary">Pilih</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection