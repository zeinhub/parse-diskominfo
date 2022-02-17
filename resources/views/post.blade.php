@extends('app')
@section('title')
{{$artikel->judul}}
@endsection
@section('breadcrumb')
<div class="breadcrumb">
  <?php if (Auth::User()->role == "admin") { ?>
    <a href="{{route('adminhome')}}">Home</a> &nbsp;/&nbsp;<a href="{{route('postbycategory', ['kategori' => $artikel->kategori])}}">{{$artikel->kategori}}</a> &nbsp;/&nbsp;{{$artikel->judul}}
  <?php } else { ?>
    <a href="{{route('home')}}">Home</a> &nbsp;/&nbsp;<a href="{{route('postbycategory', ['kategori' => $artikel->kategori])}}">{{$artikel->kategori}}</a> &nbsp;/&nbsp;{{$artikel->judul}}
  <?php } ?>
</div>
<hr>
@endsection
@section('content')
<div id="page-content" class="post">
  <div class="post-title-heading">{{$artikel->judul}}</div>
  <div class="row">
    <div class="col">
      <table>
        <div class="author">
          {{$artikel->created_at->format('d F Y, h:i:s A')}} by
          <a href="{{route('postbyauthor', ['username' => $artikel->username])}}">{{$artikel->nama_admin}}</a>
        </div>
        {{-- <tr>
              <td>
                  <div class="author">
                  <i class="fas fa-user"></i>
                  Awiez Fathwa Zein</div>
              </td>
              <td>
                  <div>
                  &nbsp; <i class="fas fa-calendar"></i>
                  </div>
              </td>
          </tr> --}}
      </table>
    </div>
    <div class="col text-end">
      <?php if (Auth::User()->role == "admin") { ?>
        <a class="text-end btn btn-outline-danger" href="{{route('edit-post', ['uuid' => $artikel->uuid])}}"> Edit Data</a>
      <?php } ?>
      <a class="text-end btn btn-outline-info" href="{{$artikel->link}}" target="blank"> Open Link </a>
    </div>
  </div>
  <iframe width="100%" height="315" src="{{$artikel->link}}" title="Berita" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <!-- <div class="featured-image">
    <img src="{{url('images/', $artikel->foto_utama)}}" alt="" class="text-center">
  </div> -->
  <!-- <div>
    <?php
    // echo $artikel->deskripsi;
    ?>
  </div> -->
</div>
<h2 class="documentation-title">
  <br>
  Dokumentasi:
</h2>
<div class="splide">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      foreach ($files as $f) {
        if ($f->jenis_file == "foto") { ?>
          <li class="splide__slide text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$f->id}}">
              <div class="img-thumbnail-box">
                <div class="img-thumbnail" style="background-image:url('{{url('files/', $f->nama_file)}}');"></div>
              </div>
            </a></li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
<hr>
<div class="splidevideo">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      foreach ($files as $f) {
        if ($f->jenis_file == "video") { ?>
          <li class="splide__slide text-center">
            <div class="video-thumbnail-box">
              <video width="320" height="240" controls>
                <source src="{{url('files/',$f->nama_file)}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</div>
<!-- <h2 style="margin-top: 20px;" class="documentation-title">
  Lampiran :
</h2>
<div class="row">
  <?php for ($i = 0; $i < 5; $i++) {
  ?>
    <div style="margin-top: 10px" class="col-lg-3 col-md-4 col-sm-5 col-12">
      <a class="file-thumbnail">
        <i class="fas fa-file fa-2x"></i>
        Laporan Keuangan.doc
      </a>
    </div>
  <?php } ?>
</div> -->
<script src="{{url('frontend/library/splide-3.6.9/dist/js/splide.min.js')}}"></script>
<script>
  var splide = new Splide('.splide', {
    perPage: 3,
    rewind: true,
    type: 'loop',
    autoWidth: true,
  });

  splide.mount();
</script>
<script>
  var splide = new Splide('.splidevideo', {
    perPage: 3,
    type: 'loop',
    // drag: 'free',
    rewind: true,
    autoWidth: true,
  });

  splide.mount();
</script>

<!-- Modal -->
@foreach ($files as $f)
@if ($f->jenis_file == "foto")
<div class="modal fade" id="staticBackdrop{{$f->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="modal-thumbnail" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$f->nama_file}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{url('files/', $f->nama_file)}}" alt="">
      </div>
      <div class="modal-footer">
        <a href="{{route('download', ['uuid' => $artikel->uuid, 'id' => $f->id])}}" class="btn btn-success">Unduh</a>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach
@endsection