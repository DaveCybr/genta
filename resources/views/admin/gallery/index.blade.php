@extends('admin.main')

@section('title', 'Gallery')

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
            <div class="container-xxl py-5" id="gallery">
                <div class="container">
                    <div class="text-center mx-auto mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                        <h1 class="mb-3" id="judul">{{ $data->judul }}</h1>
                        <p id="paragraf">
                            {{ $data->paragraf }}
                        </p>
                    </div>
                    <!-- Gallery -->
                    <div class="slider-wrapper">
                        <ul class="image-list" style="padding: 0">
                            <img class="image-item" src="{{ asset('files/' . $data->gambar1) }}" alt="img-3"
                                id="gambar1" />
                            <img class="image-item" src="{{ asset('files/' . $data->gambar2) }}" alt="img-4"
                                id="gambar2" />
                            <img class="image-item" src="{{ asset('files/' . $data->gambar3) }}" alt="img-5"
                                id="gambar3" />
                            <img class="image-item" src="{{ asset('files/' . $data->gambar4) }}" alt="img-6"
                                id="gambar4" />
                            <img class="image-item" src="{{ asset('files/' . $data->gambar5) }}" alt="img-7"
                                id="gambar5" />

                        </ul>
                    </div>
                    <div class="slider-scrollbar">
                        <div class="scrollbar-track">
                            <div class="scrollbar-thumb"></div>
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
            <input type="hidden" value="{{ $data->id_gallery }}" id="id" name="id_gallery">
            <input type="hidden" value="{{ $data->gambar1 }}" name="gambar1lama">
            <input type="hidden" value="{{ $data->gambar2 }}" name="gambar2lama">
            <input type="hidden" value="{{ $data->gambar3 }}" name="gambar3lama">
            <input type="hidden" value="{{ $data->gambar4 }}" name="gambar4lama">
            <input type="hidden" value="{{ $data->gambar5 }}" name="gambar5lama">

            <div class="d-flex gap-5 justify-content-center mb-5">

                <div class="d-block">
                    <label class="form-label">Gambar 1</label>
                    <div class="image-wrapper">
                        <img src="{{ asset('files/' . $data->gambar1) }}"
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
                        <img src="{{ asset('files/' . $data->gambar2) }}"
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
                        <img src="{{ asset('files/' . $data->gambar3) }}"
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
                        <img src="{{ asset('files/' . $data->gambar4) }}"
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
                        <img src="{{ asset('files/' . $data->gambar5) }}"
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
                var id = $('#id').val();
                var alert = document.getElementById("success");
                var judul = document.getElementById("judul");
                var paragraf = document.getElementById("paragraf");

                $.ajax({
                    url: "{{ url('gallery/update') }}/" + id,
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
                            var updatedGallery = data.gallery;
                            judul.textContent = updatedGallery.judul;
                            paragraf.textContent = updatedGallery.paragraf;

                            $('#gambar1').attr('src', "{{ asset('files') }}/" + updatedGallery
                                .gambar1);
                            $('#gambar2').attr('src', "{{ asset('files') }}/" + updatedGallery
                                .gambar2);
                            $('#gambar3').attr('src', "{{ asset('files') }}/" + updatedGallery
                                .gambar3);
                            $('#gambar4').attr('src', "{{ asset('files') }}/" + updatedGallery
                                .gambar4);
                            $('#gambar5').attr('src', "{{ asset('files') }}/" + updatedGallery
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
