@extends('app')
@section('title')
About Developer
@endsection
@section('class-body')
about-body
@endsection
@section('content')
<style>
    .sidebar,
    .navbar,
    footer,
    .line-footer,
    .navbar-line,
    .col-lg-3 {
        display: none;
    }
</style>
<div class="about-page">
    <div class="container">
        <div class="about-app">
            <div class="app-title">
                <h1>Pusat Arsip Elektronik (PARSE)</h1>
                <p>Dinas Komunikasi dan Informatika Kabupaten Tangerang</p>
            </div>
            <div class="app-desc">
                <p>PARSE merupakan aplikasi berbasis website yang digunakan oleh bidang Informasi dan Komunikasi Publik (IKP) Diskominfo Kabupaten Tangerang sebagai pusat penyimpanan data berupa artikel, dokumentasi, maupun file yang berhubungan dengan kegiatan yang dilaksanakan oleh Pemerintah Kabupaten Tangerang.</p>
                <?php if (Auth::User()->role == "admin") { ?>
                    <a href="{{route('adminhome')}}" style="margin-bottom:20px;" class="btn btn-outline-primary">Kembali ke Home</a>
                <?php } else { ?>
                    <a href="{{route('home')}}" style="margin-bottom:20px;" class="btn btn-outline-primary">Kembali ke Home</a> <?php } ?>
            </div>
        </div>
        <div class="about-developer">
            <h1>About Developer</h1>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="developer-profile">
                        <div class="developer-badge">Frontend Developer</div>
                        <div class="developer-photo" style="background-image: url('{{url('frontend/assets/image/developer/awiez.png')}}');">
                        </div>
                        <div class="developer-name">Awiez Fathwa Zein</div>
                        <div class="university">UIN Syarif Hidayatullah Jakarta</div>
                        <div class="quote">"</div>
                        <div class="developer-desc">
                            Halo perkenalkan nama saya Awiez, saya merupakan front-end developer pada aplikasi PARSE ini. Saya ucapkan terimakasih kepada Diskominfo Kabupaten Tangerang terutama pada bidang IKP yang telah memberikan kesempatan PKL kepada saya dengan membuat aplikasi ini, semoga aplikasi ini dapat membantu memudahkan pekerjaan dalam menemukan file maupun dokumentasi yang dibutuhkan oleh IKP Diskominfo Kabupaten Tangerang.
                        </div>
                        <hr>
                        <i class="fab fa-edge"></i> &nbsp;<a href="https://awiez.com">www.awiez.com</a> <br>
                        <i class="fab fa-linkedin"></i> &nbsp;<a href="https://www.linkedin.com/in/awiez-fathwa-zein-025b331b0/">AWIEZ FATHWA ZEIN</a> <br>
                        <i class="fas fa-envelope"></i> &nbsp;<a href="mailto:awiezfathwa@gmail.com">awiezfathwa@gmail.com</a> <br>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="developer-profile">
                        <div class="developer-badge">Graphic Designer</div>
                        <div class="developer-photo" style="background-image: url('{{url('frontend/assets/image/developer/awiez.png')}}');">
                        </div>
                        <div class="developer-name">Awiez Fathwa Zein</div>
                        <div class="university">UIN Syarif Hidayatullah Jakarta</div>
                        <div class="quote">"</div>
                        <div class="developer-desc">
                            Halo perkenalkan nama saya Awiez, saya merupakan front-end developer pada aplikasi PARSE ini. Saya ucapkan terimakasih kepada Diskominfo Kabupaten Tangerang terutama pada bidang IKP yang telah memberikan kesempatan PKL kepada saya dengan membuat aplikasi ini, semoga aplikasi ini dapat membantu memudahkan pekerjaan dalam menemukan file maupun dokumentasi yang dibutuhkan oleh IKP Diskominfo Kabupaten Tangerang.
                        </div>
                        <hr>
                        <i class="fab fa-edge"></i> &nbsp;<a href="https://awiez.com">www.awiez.com</a> <br>
                        <i class="fab fa-linkedin"></i> &nbsp;<a href="https://www.linkedin.com/in/awiez-fathwa-zein-025b331b0/">AWIEZ FATHWA ZEIN</a> <br>
                        <i class="fas fa-envelope"></i> &nbsp;<a href="mailto:awiezfathwa@gmail.com">awiezfathwa@gmail.com</a> <br>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="developer-profile">
                        <div class="developer-badge">Backend Developer</div>
                        <div class="developer-photo" style="background-image: url('{{url('frontend/assets/image/developer/awiez.png')}}');">
                        </div>
                        <div class="developer-name">Awiez Fathwa Zein</div>
                        <div class="university">UIN Syarif Hidayatullah Jakarta</div>
                        <div class="quote">"</div>
                        <div class="developer-desc">
                            Halo perkenalkan nama saya Awiez, saya merupakan front-end developer pada aplikasi PARSE ini. Saya ucapkan terimakasih kepada Diskominfo Kabupaten Tangerang terutama pada bidang IKP yang telah memberikan kesempatan PKL kepada saya dengan membuat aplikasi ini, semoga aplikasi ini dapat membantu memudahkan pekerjaan dalam menemukan file maupun dokumentasi yang dibutuhkan oleh IKP Diskominfo Kabupaten Tangerang.
                        </div>
                        <hr>
                        <i class="fab fa-edge"></i> &nbsp;<a href="https://awiez.com">www.awiez.com</a> <br>
                        <i class="fab fa-linkedin"></i> &nbsp;<a href="https://www.linkedin.com/in/awiez-fathwa-zein-025b331b0/">AWIEZ FATHWA ZEIN</a> <br>
                        <i class="fas fa-envelope"></i> &nbsp;<a href="mailto:awiezfathwa@gmail.com">awiezfathwa@gmail.com</a> <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection