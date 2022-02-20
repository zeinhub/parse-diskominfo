@extends('app')
@section('title')
Selamat Datang - Press Release Diskominfo Kabupaten Tangerang
@endsection
@section('content')
<div class="banner">
    <img src="{{url('files/Banner.png')}}" alt="">
</div>
<div class="latest-upload-wrap">
    <div class="row">
        <div class="col">
            <h3 style="display: inline-block" class="latest-upload-heading">Unggahan Terbaru</h3>
        </div>
        <div class="col text-end">
            <a href="{{route('allpost')}}" style="margin-top: 20px" class="btn btn-outline-primary ">Semua Post</a>
        </div>
    </div>
    <div class="row">
        <?php
        $n = 0;
        foreach ($artikel as $a) {
            $foto = DB::table('file')->where('artikel_id', $a->uuid)->where('jenis_file', "foto")->first();
            if ($n < 5) {
        ?>
                <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
                    <div class="latest-upload-wrap">
                        <div class="latest-upload">
                            <?php if (is_object($foto)) { ?>
                                <div loading="lazy" style="background-image:url('{{url('files/', $foto->nama_file)}}');" class="post-thumbnail"></div>
                            <?php } else { ?>
                                <div loading="lazy" style="background-image:url('{{url('files/kosong.png')}}');" class="post-thumbnail"></div>
                            <?php } ?>
                            <div class="info">
                                <div class="row">
                                    <div class="col padding-0">
                                        <div class="author">
                                            {{date('d-m-Y', strtotime($a->created_at))}} by
                                            <a href=" {{route('postbyauthor', ['username' => $a->username])}}">{{$a->nama_admin}}</a>
                                        </div>
                                    </div>
                                    {{-- <div class="col padding-0">
                        <div class="author">
                        <i class="fas fa-user"></i>
                        <a href="#">Awiez Fathwa Zein</a>
                        </div>
                    </div>
                    <div class="col text-end padding-0">
                    <i class="fas fa-calendar"></i>
                    25/01/2022</div> --}}
                                </div>
                            </div>
                            <a href="{{route('postbycategory', ['kategori' => $a->kategori])}}" class="category">{{$a->kategori}}</a>
                            <?php if (Auth::User()->role == "admin") { ?>
                                <div class="title" title="{{$a->judul}}"><a href="{{route('admin-berita', ['uuid' => $a->uuid])}}">{{substr($a->judul, 0, 40)."... [Selengkapnya]"}}</a></div>
                            <?php } else { ?>
                                <div class="title" title="{{$a->judul}}"><a href="{{route('berita', ['uuid' => $a->uuid])}}">{{substr($a->judul, 0, 40)."... [Selengkapnya]"}}</a></div>
                            <?php } ?>
                            <!-- <div class="content">
                                <?php
                                $num_char = 100;
                                $text = "$a->deskripsi";
                                echo substr($text, 0, $num_char) . '...';
                                ?>
                                <a href="">[Selengkapnya...]</a>
                            </div> -->
                        </div>
                    </div>
                </div>
        <?php
                $n++;
            }
        }
        ?>


    </div>
    <!-- <div class="row">
        <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
            <div data-aos="fade-up" style="margin-top: 10px" class="col-lg-4 col-xs-12">
                <div class="latest-upload-wrap">
                    <div class="latest-upload">
                        <div loading="lazy" style="background-image:url('{{url('frontend/assets/image/md-duran-E0ylfF52C6M-unsplash.jpg')}}');" class="post-thumbnail"></div>
                        <div class="info">
                            <div class="row">
                                <div class="col padding-0">
                                    <div class="author">
                                        25/01/2022 by
                                        <a href="#">Awiez Fathwa Zein</a>
                                    </div>
                                </div>
                                {{-- <div class="col padding-0">
                        <div class="author">
                        <i class="fas fa-user"></i>
                        <a href="#">Awiez Fathwa Zein</a>
                        </div>
                    </div>
                    <div class="col text-end padding-0">
                    <i class="fas fa-calendar"></i>
                    25/01/2022</div> --}}
                            </div>
                        </div>
                        <span class="category">Raker</span>
                        <div class="title"><a href="">Lorem ipsum dolor</a></div>
                        <div class="content">
                            @php
                            $num_char = 100;
                            $text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, repellendus natus, cum quas illum dolore enim laborum suscipit modi quidem molestiae quisquam! Enim ipsa expedita fugiat iste totam quos eaque?
                            Qui magnam, impedit reiciendis aperiam voluptate corporis pariatur ut, ea nihil sunt ullam quam consequatur officia molestias libero harum inventore. Perferendis, aperiam aliquam in voluptate sed veniam recusandae consectetur quam.
                            Cum, eum nisi dolor tempora ex labore at? Dolorum ipsam aliquid odit dolore ipsum vero reprehenderit expedita incidunt quidem soluta, animi blanditiis optio? Doloremque voluptates corporis deleniti dignissimos, dicta eius?
                            Ullam perspiciatis saepe, neque expedita excepturi pariatur dolore ut vero aliquam! Placeat mollitia eaque delectus, rem cumque tempore quae qui nisi temporibus, dolores harum! Aut distinctio architecto consequuntur reiciendis id?
                            Deleniti a soluta dolore aliquam fuga ut neque excepturi, tenetur aut atque rerum laudantium maiores alias iste nesciunt sed nam expedita. Praesentium quaerat assumenda repellendus illo! Perspiciatis aliquid atque nam!";
                            echo substr($text, 0, $num_char) . '...';
                            @endphp
                            <a href="">[Selengkapnya...]</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div> -->
</div>
@endsection