@extends('app')
@section('title')
{{$artikel->judul}}
@endsection
@section('breadcrumb')
<div class="breadcrumb">
  <a href="{{route('admin')}}">Home</a> &nbsp; / &nbsp;<a href="#">{{$artikel->kategori}}</a> &nbsp;/ &nbsp;{{$artikel->judul}}
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
          {{$artikel->created_at}} by
          <a href="#">{{$artikel->nama_user}}</a>
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
      <a class="text-end btn btn-outline-danger" href="{{route('edit-post', ['id' => $artikel->id])}}"> Edit Data</a>
      <a class="text-end btn btn-outline-info" href="{{$artikel->link}}"> Open Link </a>
    </div>
  </div>
  <iframe width="100%" height="315" src="https://tangerangkab.go.id/detail-konten/show-berita/5325" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <!-- <div class="featured-image">
    <img src="{{url('images/', $artikel->foto_utama)}}" alt="" class="text-center">
  </div> -->
  <!-- <div>
    <?php
    echo $artikel->deskripsi;
    ?>
  </div> -->
</div>
<h2 class="documentation-title">
  Dokumentasi :
</h2>
<div class="splide">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      for ($i = 0; $i < 5; $i++) { ?>
        <li class="splide__slide text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <div class="img-thumbnail-box">
              <div class="img-thumbnail" style="background-image: url('{{url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')}}');"></div>
            </div>
          </a></li>
      <?php
      }
      ?>
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
  });

  splide.mount();
</script>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div id="modal-thumbnail" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Lorem Ipsum Dolor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')}}" alt="">
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger">Hapus</a>
        <a href="#" class="btn btn-success">Unduh</a>
      </div>
    </div>
  </div>
</div>
@endsection