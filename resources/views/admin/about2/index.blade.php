@extends('admin.main')

@section('title', 'About 2')

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
        <div class="container-xxl py-5 bg-white rounded my-3" id="siteplan">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 text-end wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4" id="judul">{{ $about2->judul }}</h1>
                        <p class="mb-4" id="deskripsi">{{ $about2->deskripsi }}
                        </p>
                        <p id="daftar_poin1">
                            <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin1 }}
                        </p>
                        <p id="daftar_poin2">
                            <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin2 }}
                        </p>
                        <p id="daftar_poin3">
                            <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin3 }}
                        </p>
                        <a href="#" class="btn btn-primary py-3 px-5 animated fadeIn">Details</a>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid" src="{{ asset('adminnew/img/siteplan-2.png') }}"
                                style="width: 500px; height: 400px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <form id="form-edit" method="post">
            @csrf

            <input type="hidden" value="{{ $about2->id_about2 }}" id="editAbout2Id" name="id_about2">

            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Judul</label>
                    <input type="text" required name="judul" class="form-control" value="{{ $about2->judul }}"
                        placeholder="Masukkan judul" />
                </div>
            </div>
            <div class="col mb-2">
                <label class="form-label">Deskripsi</label>
                <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control" name="deskripsi" placeholder="Bisa menggunakan suara" rows="2">{{ $about2->deskripsi }}</textarea>
                    <span class="input-group-text">
                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
                </div>
            </div>
            <div class="row gap-3 mb-3">
                <div class="col">
                    <label class="form-label">Dafttar Point 1</label>
                    <input type="text" required name="daftar_poin1" class="form-control"
                        value="{{ $about2->daftar_poin1 }}" placeholder="Masukkan daftar point" />
                </div>
                <div class="col">
                    <label class="form-label">Daftar Point 2</label>
                    <input type="text" required name="daftar_poin2" class="form-control"
                        value="{{ $about2->daftar_poin2 }}" placeholder="Masukkan daftar point" />
                </div>
                <div class="col">
                    <label class="form-label">Daftar Point 3</label>
                    <input type="text" required name="daftar_poin3" class="form-control"
                        value="{{ $about2->daftar_poin3 }}" placeholder="Masukkan daftar point" />
                </div>
            </div>

            <div class="d-flex align-items-end flex-column mb-3">
                <button type="submit" id="update" class="btn btn-success">Update changes</button>
            </div>
        </form>
    </div>
@endsection
@section('script-page')
    <script>
        $(document).ready(function() {

            $('#form-edit').submit(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData(this);
                var about2Id = $('#editAbout2Id').val();
                var alert = document.getElementById("success");
                var judul = document.getElementById("judul");
                var deskripsi = document.getElementById("deskripsi");
                var daftar_poin1 = document.getElementById("daftar_poin1");
                var daftar_poin2 = document.getElementById("daftar_poin2");
                var daftar_poin3 = document.getElementById("daftar_poin3");

                $.ajax({
                    url: "{{ url('about2/update') }}/" + about2Id,
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
                            var updateAbout2 = data.about2;
                            judul.textContent = updateAbout2.judul;
                            deskripsi.textContent = updateAbout2.deskripsi;
                            daftar_poin1.textContent = updateAbout2.daftar_poin1;
                            daftar_poin2.textContent = updateAbout2.daftar_poin2;
                            daftar_poin3.textContent = updateAbout2.daftar_poin3;
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
