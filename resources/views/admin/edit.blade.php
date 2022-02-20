@extends('app')
@section('addon-script-top')
<script src="https://cdn.tiny.cloud/1/g30aj0fetx2ms7ttb105k6vsyqvgclb7sfxpk92vzasxp45g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <a href="{{route('adminhome')}}">Admin</a> &nbsp;/&nbsp;<a>Ubah Data</a>
</div>
<hr>
@endsection
@section('content')

<style>
    .col,
    .col-6,
    .col-12 {
        margin-top: 10px !important;
    }
</style>
<div class="latest-upload-wrap pt-fs">
    <h2>
        Ubah Data
    </h2>
    <form method="post" action="{{route('store-edit', ['uuid' => $artikel->uuid])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input placeholder="Judul" type="text" value="{{$artikel->judul}}" class="form-control" name="judul" id="" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="judul">Link Berita</label>
                    <input placeholder="Link" type="text" value="{{$artikel->link}}" class="form-control" name="link" id="" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input placeholder="Kategori" type="text" list="category" value="{{$artikel->kategori}}" class="form-control" name="kategori" id="" required>
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
                    <input type="text" list="tahun" class="form-control" value="{{$artikel->tahun}}" placeholder="tahun" name="tahun" id="" required>
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
                <input placeholder="Wilayah" type="text" list="wilayah" value="{{$artikel->wilayah}}" class="form-control" name="wilayah" id="" required>
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
                    <input placeholder="Dinas" type="text" list="dinas" value="{{$artikel->dinas}}" class="form-control" name="dinas" id="" required>
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
            <br>
            <h5 class="mt-4">Tambah Dokumentasi</h5>

            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Foto</label>
                    <input class="form-control" type="file" name="foto[]" placeholder="Dokumentasi Foto" accept="image/*" multiple>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="featured-image">Dokumentasi Video</label>
                    <input class="form-control" type="file" name="video[]" placeholder="Dokumentasi Video" accept="video/*, audio/*" multiple>
                </div>
            </div>
            <h5 class="mt-4">Hapus Dokumentasi</h5>
            <!--             <a onclick="per()" class=" btn btn-outline-danger">tombol alert</a>
 -->
            <div class="col-10 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th width="400px" scope="col">File</th>
                            <!--kecilin row-->
                            <th scope="col">Preview</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($files as $f) {
                            // if ($f->jenis_file == "foto") { 
                        ?>
                            <tr id="sid{{$f->id}}">
                                <th scope="row">{{$no}}</th>
                                <td>{{$f->nama_file}}</td>
                                @if ($f->jenis_file == "foto")
                                <td><img width="50px" src="{{url('files/', $f->nama_file)}}" alt=""></td>
                                @else
                                <td>
                                    <video width="50px" autoplay="autoplay" muted loop="true">
                                        <source src="{{url('files/', $f->nama_file)}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                @endif
                                <td><a href="javascript:void(0)" onclick="deleteDokumentasi({{$f->id}})" class=" btn btn-outline-danger">Hapus</a></td>
                            </tr>
                        <?php
                            // }
                            $no++;
                        }
                        ?>
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
    <br>
    {{-- <script>
        alert('Sukses!')
    </script> --}}

    <script>
        function sukses() {
            Swal.fire(
                'Sukses!',
                'Data berhasil disimpan!',
                'success'
            )
        }

        function per() {
            alert(
                'Sukses!',
                'Data berhasil disimpan!',
                'success'
            )
        }


        // $(document).ready(function() {

        //     $("body").on("click", "#deleteCompany", function(e) {

        //         if (!confirm("Do you really want to do this?")) {
        //             return false;
        //         }

        //         e.preventDefault();
        //         var id = $(this).data("id");
        //         // var id = $(this).attr('data-id');
        //         var token = $("meta[name='csrf-token']").attr("content");
        //         var url = e.target;

        //         $.ajax({
        //             url: '/admin/delete-dokumentasi/'+ id, //or you can use url: "company/"+id,
        //             type: 'DELETE',
        //             data: {
        //                 _token: token,
        //                 id: id
        //             },
        //             success: function(response) {

        //                 $("#success").html(response.message)

        //                 Swal.fire(
        //                     'Remind!',
        //                     'Company deleted successfully!',
        //                     'success'
        //                 )
        //             }
        //         });
        //         return false;
        //     });
        // });
    </script>

    <script>
        function deleteDokumentasi(id) {
            if (confirm("Do you really want to do this?")) {
                $.ajax({
                    url: '/admin/delete-dokumentasi/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token").val()
                    },
                    success: function(response) {
                        $("#sid" + id).remove();
                    }
                });

            }
        }
    </script>
</div>
@endsection