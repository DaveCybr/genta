@extends('admin.main')

@section('title', 'Property Agent')

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
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                        <h1 class="mb-3" id="judul">{{ $data->judul }}</h1>
                        <p id="paragraf">
                            {{ $data->paragraf }}
                        </p>
                    </div>
                    <div class="row g-4">
                        @foreach ($detail as $row)
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('files/' . $row->foto) }}" alt=""
                                            id="foto_{{ $loop->index }}" />
                                        <div
                                            class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                            <a class="btn btn-square mx-1" href="http://{{ $row->facebook }}"
                                                id="facebook_{{ $loop->index }}"><i class="fab fa-facebook-f"></i></a>
                                            {{-- <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a> --}}
                                            <a class="btn btn-square mx-1" href="http://{{ $row->instagram }}"
                                                id="instagram_{{ $loop->index }}"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0" id="nama_{{ $loop->index }}">{{ $row->nama }}</h5>
                                        <small id="jabatan_{{ $loop->index }}">{{ $row->jabatan }}</small>
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
            <input type="hidden" value="{{ $data->id_property_agents }}" id="id" name="id_property">

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

                @foreach ($detail as $row)
                    <div class="col-md-6 mb-3">
                        <div class="card px-3 py-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="detail[{{ $loop->index }}][id_detail_property_agent]"
                                        value="{{ $row->id_detail_property_agent }}" id="">
                                    <input type="hidden" name="detail[{{ $loop->index }}][foto_lama]" id=""
                                        value="{{ $row->foto }}">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('files/' . $row->foto) }}"
                                            class="d-block rounded-3 image-preview previewGambar1" height="150"
                                            width="150" id="uploadedAvatarGambar1" />
                                    </div>
                                    <div class="button-wrapper mt-2">
                                        <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                            <span class="d-none d-sm-block">Pilih Foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" class="account-file-input-gambar1"
                                                name="detail[{{ $loop->index }}][foto]" hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm my-3 mx-auto"
                                        value="{{ $row->nama }}" name="detail[{{ $loop->index }}][nama]"
                                        id="" placeholder="Full Name">
                                    <input type="text" class="form-control form-control-sm my-3 mx-auto"
                                        value="{{ $row->jabatan }}" name="detail[{{ $loop->index }}][jabatan]"
                                        id="" placeholder="Jabatan">
                                    <input type="text" class="form-control form-control-sm my-3 mx-auto"
                                        value="{{ $row->facebook }}" name="detail[{{ $loop->index }}][facebook]"
                                        id="" placeholder="Facebook">
                                    <input type="text" class="form-control form-control-sm my-3 mx-auto"
                                        value="{{ $row->instagram }}" name="detail[{{ $loop->index }}][instagram]"
                                        id="" placeholder="Instagram">
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
                    url: "{{ url('agent/update') }}/" + id,
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
                            var updatedProperty = data.property;
                            var agent = data.agent;
                            judul.textContent = updatedProperty.judul;
                            paragraf.textContent = updatedProperty.paragraf;

                            agent.forEach(function(item, index) {
                                $('#nama_' + index).text(item.nama)
                                $('#jabatan_' + index).text(item.jabatan)
                                $('#facebook_' + index).attr('href', 'http://' + item
                                    .facebook)
                                $('#instagram_' + index).attr('href', 'http://' + item
                                    .instagram)
                                $('#foto_' + index).attr('src',
                                    "{{ asset('files') }}/" + item.foto)
                            })

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
