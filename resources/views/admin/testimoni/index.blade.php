@extends('admin.main')

@section('title', 'Testimonial')

@section('style-page')

    <!-- Google Web Fonts -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('adminnew/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/lightgallery.js@2.3.0/dist/css/lightgallery.min.css" rel="stylesheet" />

    <link href="{{ asset('adminnew/css/bootstrap.admin.css') }}" rel="stylesheet" />

    <link href="{{ asset('adminnew/css/style-admin.css') }}" rel="stylesheet" />

@endsection
@section('content')
    <div class="mx-4">
        <div class="card my-3">
            <div class="container-xxl py-5" id="testimonial">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                        <h1 class="mb-3" id="judul">{{ $data->judul }}</h1>
                        <p id="paragraf">
                            {{ $data->paragraf }}
                        </p>
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach ($detail as $row)
                        <div class="testimonial-item bg-light rounded p-3">
                            <div class="bg-white border rounded p-4">
                                <p id="ulasan_{{$loop->index}}">
                                    {{$row->ulasan}}
                                </p>
                                <div class="d-flex align-items-center">
                                    <img id="gambar_{{$loop->index}}" class="img-fluid flex-shrink-0 rounded"
                                        src="{{ asset('files/' . $row->gambar) }}" style="width: 45px; height: 45px" />
                                    <div class="ps-3">
                                        <h6 id="nama_{{$loop->index}}" class="fw-bold mb-1">{{$row->nama}}</h6>
                                        <small id="profesi_{{$loop->index}}">{{$row->profesi}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <form id="form-edit" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $data->id_testimoni }}" id="id" name="id_testimoni">

            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Judul</label>
                    <input type="text" required name="judul" class="form-control" value="{{ $data->judul }}"
                        placeholder="Masukkan judul" />
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">paragraf</label>
                <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control" name="paragraf" placeholder="Bisa menggunakan suara" rows="2">{{ $data->paragraf }}</textarea>
                    <span class="input-group-text">
                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex align-items-start flex-column mb-3">
                    <button class="btn" type="button" style="background-color:#2b7bfc; color:white;" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Ulasan</button>
                </div>
                @foreach ($detail as $row)
                <input type="hidden" name="detail[{{$loop->index}}][id_client_testimoni]">
                <input type="hidden" name="detail[{{ $loop->index }}][gambar_lama]" value="{{ $row->gambar }}">
            <div class="col-md-6 mb-3">
                <div class="card px-3 py-2">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <div class="image-wrapper">
                                <img src="{{ asset('files/' . $row->gambar) }}"
                                    class="d-block rounded-3 image-preview previewGambar1" height="110"
                                    width="110" id="uploadedAvatarGambar1" />
                            </div>
                            <div class="button-wrapper my-2">
                                <label class="btn btn-primary me-2" style="width: 110px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-gambar1"
                                        name="detail[{{$loop->index}}][foto]" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3" placeholder="Nama" name="detail[{{$loop->index}}][nama]" value="{{$row->nama}}">
                            <input type="text" class="form-control" placeholder="Profesi" name="detail[{{$loop->index}}][profesi]" value="{{$row->profesi}}">
                        </div>
                        <div class="col-md-12">
                            <textarea name="detail[{{$loop->index}}][ulasan]" class="form-control" placeholder="Ulasan" cols="10" rows="4">{{$row->ulasan}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            <div class="d-flex align-items-end flex-column mb-3">
                <button type="submit" id="update" class="btn btn-success">Update changes</button>
            </div>
        </form>
    </div>
    @include('admin.testimoni.create')
@endsection
@section('script-page')
    <script>
        $(document).ready(function() {
            $('#update').click(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData($('#form-edit')[0]);
                var id = $('#id').val();
                var alert = document.getElementById("success");
                var judul = document.getElementById("judul");
                var paragraf = document.getElementById("paragraf");

                $.ajax({
                    url: "{{ url('testimoni/update') }}/" + id,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            alert.textContent = "Data berhasil diupdate";
                            $('.alert-success').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
                            $('#update').html('Update');
                            var updatedTestimoni = data.testimoni;
                            // var agent = data.agent;
                            judul.textContent = updatedTestimoni.judul;
                            paragraf.textContent = updatedTestimoni.paragraf;

                            // agent.forEach(function (item,index){
                            //     $('#nama_'+index).text(item.nama)
                            //     $('#jabatan_'+index).text(item.jabatan)
                            //     $('#facebook_'+index).attr('href' , 'http://'+item.facebook)
                            //     $('#instagram_'+index).attr('href' , 'http://'+item.instagram)
                            //     $('#foto_'+index).attr('src' , "{{ asset('files') }}/"+item.foto)
                            // })

                        } else {
                            $('#error-edit').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert gagal
                            $('#update').html('Update');
                        }
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        $('#error-edit').text(error.error).fadeIn().delay(2000).fadeOut();
                        $('#update').html('Update');
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminnew/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('adminnew/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.3.0/dist/js/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.3.0/modules/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.3.0/modules/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.3.0/modules/lg-video.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('adminnew/js/admin.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages-account-settings-account.js') }}"></script>
@endsection
