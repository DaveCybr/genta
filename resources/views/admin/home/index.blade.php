@extends('admin.main')

@section('title', 'Home')

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
        <div class="header bg-white p-0 mt-3 rounded mb-3" style="width: 1040px; height: 530px;" id="home">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4 text-dark" id="judul" style="color: black">
                        {{ $home->judul }}
                    </h1>
                    <p class="animated fadeIn mb-4 pb-2" id="deskripsi">
                        {{ $home->deskripsi }}
                    </p>
                    <a href="#about" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Read More</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" id="gambar1" src="{{ asset('files/' . $home->gambar1) }}"
                                alt="" />
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" id="gambar2" src="{{ asset('files/' . $home->gambar2) }}"
                                alt="" />
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" id="gambar3" src="{{ asset('files/' . $home->gambar3) }}"
                                alt="" />
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" id="gambar4" src="{{ asset('files/' . $home->gambar4) }}"
                                alt="" />
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" id="gambar5" src="{{ asset('files/' . $home->gambar5) }}"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <form id="form-edit" method="post">
            @csrf
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Judul</label>
                    <input type="text" required name="judul" class="form-control" value="{{ $home->judul }}"
                        placeholder="Masukkan judul" />
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">Deskripsi</label>
                <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control" name="deskripsi" placeholder="Bisa menggunakan suara" rows="2">{{ $home->deskripsi }}</textarea>
                    <span class="input-group-text">
                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
                </div>
            </div>
            <input type="hidden" value="{{ $home->id_home }}" id="editHomeId" name="id_home">
            <input type="hidden" value="{{ $home->gambar1 }}" name="gambar1lama">
            <input type="hidden" value="{{ $home->gambar2 }}" name="gambar2lama">
            <input type="hidden" value="{{ $home->gambar3 }}" name="gambar3lama">
            <input type="hidden" value="{{ $home->gambar4 }}" name="gambar4lama">
            <input type="hidden" value="{{ $home->gambar5 }}" name="gambar5lama">

            <div class="d-flex gap-5 justify-content-center mb-5">

                <div class="d-block">
                    <label class="form-label">Gambar 1</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $home->gambar1) }}"
                            class="d-block rounded-3 image-preview previewGambar1" height="150" width="150"
                            id="uploadedAvatarGambar1" />
                    </div>
                    <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input-gambar1" name="gambar1" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>
                </div>

                <div class="d-block">
                    <label class="form-label">Gambar 2</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $home->gambar2) }}"
                            class="d-block rounded-3 image-preview previewGambar2" height="150" width="150"
                            id="uploadedAvatarGambar2" />
                    </div>
                    <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input-gambar2" name="gambar2" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>
                </div>
                <div class="d-block">
                    <label class="form-label">Gambar 3</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $home->gambar3) }}"
                            class="d-block rounded-3 image-preview previewGambar3" height="150" width="150"
                            id="uploadedAvatarGambar3" />
                    </div>
                    <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input-gambar3" name="gambar3" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>
                </div>
                <div class="d-block">
                    <label class="form-label">Gambar 4</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $home->gambar4) }}"
                            class="d-block rounded-3 image-preview previewGambar4" height="150" width="150"
                            id="uploadedAvatarGambar4" />
                    </div>
                    <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input-gambar4" name="gambar4" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>

                </div>
                <div class="d-block">
                    <label class="form-label">Gambar 5</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $home->gambar5) }}"
                            class="d-block rounded-3 image-preview previewGambar5" height="150" width="150"
                            id="uploadedAvatarGambar5" />
                    </div>
                    <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input-gambar5" name="gambar5" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>
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
                var homeId = $('#editHomeId').val();
                var alert = document.getElementById("success");
                var judul = document.getElementById("judul");
                var deskripsi = document.getElementById("deskripsi");

                $.ajax({
                    url: "{{ url('homemenu/update') }}/" + homeId,
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
                            var updatedHome = data.home;
                            judul.textContent = updatedHome.judul;
                            deskripsi.textContent = updatedHome.deskripsi;

                            $('#gambar1').attr('src', "{{ asset('files') }}/" + updatedHome
                                .gambar1);
                            $('#gambar2').attr('src', "{{ asset('files') }}/" + updatedHome
                                .gambar2);
                            $('#gambar3').attr('src', "{{ asset('files') }}/" + updatedHome
                                .gambar3);
                            $('#gambar4').attr('src', "{{ asset('files') }}/" + updatedHome
                                .gambar4);
                            $('#gambar5').attr('src', "{{ asset('files') }}/" + updatedHome
                                .gambar5);

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
