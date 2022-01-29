@extends('app')
@section('title')
    Arsip
@endsection
@section('breadcrumb')
    <div class="breadcrumb">
      <a href="#">Home</a> &nbsp; / &nbsp;<a href="#">Raker</a> &nbsp;/ &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit
    </div>
    <hr>
@endsection
@section('content')
<div id="page-content" class="post">
    <div class="post-title-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
    <div class="row">
      <div class="col">
        <table>
          <div class="author">
            <?php echo date('d/m/Y H:i'); ?> by 
            <a href="#">Awiez Fathwa Zein</a>
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
        <a class="word-export text-end btn btn-outline-danger" href="javascript:void(0)"> Edit Data</a>
        <a class="word-export text-end btn btn-outline-info" href="javascript:void(0)"> Ekspor .doc </a>
      </div>
    </div> 
    <div class="featured-image">
      <img src="{{url('frontend/assets/image/banner2.png')}}" alt="" class="text-center">
    </div>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus ea, blanditiis, sint nam temporibus corrupti explicabo neque animi doloribus dicta incidunt deleniti nesciunt iusto odio quidem id dolorem, dolores tempora!
      Ut nostrum incidunt impedit numquam sed voluptas deleniti iure, dolore iste! Error distinctio at eligendi, illum sed rem omnis voluptate quia fugit fugiat aut animi. Ex necessitatibus quo hic laborum. <br><br>
      Nesciunt repellendus impedit, sed ipsam provident rerum numquam expedita atque aspernatur cumque molestias! Incidunt sapiente molestias, harum perferendis exercitationem assumenda autem vitae modi aliquid enim, et placeat? Distinctio, ullam quasi.
      Alias sint quod modi, asperiores rerum voluptatum harum explicabo doloribus dignissimos iusto, qui expedita sequi perferendis soluta, beatae sit ipsam fuga assumenda dolorum ex laboriosam nisi id? Animi, velit totam?
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam mollitia maiores dicta hic earum ipsum deleniti dolorum sed blanditiis fugit consequuntur quod eligendi, in voluptatibus magni aspernatur? Id, quam nobis?
      Dignissimos sit, beatae obcaecati qui dolorum ipsam incidunt minus quisquam suscipit consequuntur illo molestias odio impedit neque? Vitae, possimus excepturi, corporis, quisquam commodi eaque porro beatae deleniti corrupti ducimus illum!
      Perferendis, excepturi facilis. <br> <br>Reiciendis, provident. Amet dolorum, in tenetur sunt esse voluptas ad dolorem ut cum corrupti illum ea vel numquam quibusdam nostrum quos accusantium quaerat aperiam expedita aspernatur placeat.
      Temporibus eaque voluptas consectetur, iure excepturi molestias similique est soluta, debitis tempore qui aspernatur mollitia error enim delectus reiciendis nisi cum quae, nostrum ducimus esse? Totam velit iusto quibusdam error. <br><br>
      Tempora iusto, dolor reiciendis adipisci ipsum repudiandae consectetur voluptas corporis veniam libero officiis quis dicta sed alias architecto consequuntur autem totam eaque natus amet aliquid. Dolor alias nostrum pariatur recusandae!
    </p>
</div>
<h2 class="documentation-title">
  Dokumentasi :
</h2>
<div class="splide">
  <div class="splide__track">
    <ul class="splide__list">
      <?php
      for ($i=0; $i < 5; $i++) { ?>
        <li class="splide__slide text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><div class="img-thumbnail-box"><div class="img-thumbnail" style="background-image: url('{{url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')}}');"></div></div> </a></li>
      <?php
      }  
      ?>
    </ul>
  </div>
</div>
<h2 style="margin-top: 20px;" class="documentation-title">
  Lampiran :
</h2>
<div class="row">
  <?php for ($i=0; $i < 5; $i++) { 
  ?>
  <div style="margin-top: 10px" class="col-lg-3 col-md-4 col-sm-5 col-12">
    <a class="file-thumbnail">
      <i class="fas fa-file fa-2x"></i> 
      Laporan Keuangan.doc
    </a>
  </div>
  <?php } ?>
</div>
<script src="{{url('frontend/library/splide-3.6.9/dist/js/splide.min.js')}}"></script>
<script>
  var splide = new Splide( '.splide', {
  perPage: 3,
  rewind : true,
  } );

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