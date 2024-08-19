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
        <div class="container-xxl my-3 bg-white py-3 rounded">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                    <h1 class="mb-3" id="judul">{{ $siteplan->judul }}</h1>
                    <p id="deskripsi">
                        {{ $siteplan->deskripsi }}
                    </p>
                </div>
                <div class="" style="text-align: center">
                    <img src="{{ asset('adminnew/img/siteplan.jpg') }}" class="mb-5" width="70%" usemap="#image-map"
                        style="margin-inline: auto" />

                </div>

                <!-- Modal -->

            </div>
        </div>

        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <form id="form-edit" method="post">
            @csrf

            <input type="hidden" value="{{ $siteplan->id_siteplan }}" id="editSiteplanId" name="id_siteplan">

            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Judul</label>
                    <input type="text" required name="judul" class="form-control" value="{{ $siteplan->judul }}"
                        placeholder="Masukkan judul" />
                </div>
            </div>
            <div class="col mb-2">
                <label class="form-label">Deskripsi</label>
                <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control" name="deskripsi" placeholder="Bisa menggunakan suara" rows="2">{{ $siteplan->deskripsi }}</textarea>
                    <span class="input-group-text">
                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
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
                var siteplanId = $('#editSiteplanId').val();
                var alert = document.getElementById("success");
                var judul = document.getElementById("judul");
                var deskripsi = document.getElementById("deskripsi");

                $.ajax({
                    url: "{{ url('siteplanadmin/update') }}/" + siteplanId,
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
                            var updateSiteplan = data.siteplan;
                            judul.textContent = updateSiteplan.judul;
                            deskripsi.textContent = updateSiteplan.deskripsi;
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
