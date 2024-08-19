@extends('admin.main')

@section('title', 'Data Villa')

@section('style-vendor')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet-draw/dist/leaflet.draw.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet-routing-machine/dist/leaflet-routing-machine.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.min.css" />

    <style>
        .image-wrapper {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border: 1px solid #007bff;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .custom-vertex-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            /* Warna sesuai dengan shapeOptions Anda */
            border: 2px solid grey;
        }

        .leaflet-top,
        .leaflet-left {
            transform: translate3d (0, 0, 0);
            will-change: transform;
        }

        .gm-style-cc {
            display: none;
        }

        .leaflet-control-attribution {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">VILLA</h4>
        {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data
        </button> --}}
        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <!-- Responsive Table -->
        <div class="card">
            <h5 class="card-header">Data Villa</h5>

            <div class="table-responsive text-nowrap">
                <table class="table" id="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Nama Villa</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Luas</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villa as $key => $v)
                            @php
                                $statusClass = '';
                                switch ($v->status) {
                                    case 'Tersedia':
                                    case 'Terjual':
                                        $statusClass = 'bg-success';
                                        break;
                                    case 'Dipesan':
                                    case 'Dibooking':
                                    case 'Disewakan':
                                        $statusClass = 'bg-warning';
                                        break;
                                    case 'Kosong':
                                    case 'Maintenance':
                                        $statusClass = 'bg-danger';
                                        break;
                                    default:
                                        $statusClass = 'bg-secondary'; // Default class if status is unknown
                                }
                            @endphp
                            <tr id="v-{{ $v->id_villa }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $v->nama_villa }}</td>
                                <td><span class="badge {{ $statusClass }}">{{ $v->status }}</span></td>
                                <td><span class="badge rounded-pill bg-success">Rp.
                                        {{ number_format($v->harga, 0, ',', ',') }}</span>
                                </td>
                                <td>{{ $v->luas }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="first-group"><button
                                            class="btn btn-warning btn-edit" data-id="{{ $v->id_villa }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="tf-icons bx bx-edit-alt"></i></button>
                                        <button class="btn btn-danger btn-delete" data-id="{{ $v->id_villa }}"><i
                                                class="tf-icons bx bx-trash"></i></button>
                                        <button class="btn btn-info btn-gambar" data-id="{{ $v->id_villa }}"
                                            data-bs-toggle="modal" data-bs-target="#tambahGambarModal"><i
                                                class="tf-icons bx bx-image-add"></i></button><a class="btn btn-success"
                                            href="mapvilla/map/{{ $v->id_villa }}"><i
                                                class="tf-icons bx bx-map-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Responsive Table -->
    </div>
    @include('admin.villa.create')
    @include('admin.villa.edit')
    @include('admin.villa.gambar')

@endsection

@section('script-page')
    <script src="{{ asset('admin/assets/vendor/js/format-rupiah.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.uang').mask('000.000.000', {
                reverse: true
            });
        });
    </script>
    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // Number formatting logic
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        $(document).ready(function() {
            // Tambah Data
            $('#form-add').submit(function(e) {
                e.preventDefault();
                $('#simpan').html('Sending..');
                var formData = new FormData(this);
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('datavilla/simpan') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#createModal').modal('hide');
                            alert.textContent = "Data berhasil disimpan";
                            $('.alert-success').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
                            // Reset form
                            $('#form-add')[0].reset();
                            $('#simpan').html('Simpan');

                            // Menambahkan baris baru ke tabel
                            var newUser = data.villa;

                            var statusClass = '';
                            switch (newUser.status) {
                                case 'Tersedia':
                                case 'Terjual':
                                    statusClass = 'bg-success';
                                    break;
                                case 'Dipesan':
                                case 'Dibooking':
                                case 'Disewakan':
                                    statusClass = 'bg-warning';
                                    break;
                                case 'Kosong':
                                case 'Maintenance':
                                    statusClass = 'bg-danger';
                                    break;
                                default:
                                    statusClass =
                                        'bg-secondary'; // Default class if status is unknown
                            }

                            var newRow = `
                            <tr id="v-${newUser.id_villa}">
                                <td></td>
                                <td>${newUser.nama_villa}</td>
                                <td><span class='badge ${statusClass}'>${newUser.status}</span></td>
                                <td><span class="badge rounded-pill bg-success">Rp. ${number_format(newUser.harga, 0, ',', ',')}</span></td>
                                <td>${newUser.luas}</td>
                                <td><div class="btn-group" role="group" aria-label="first-group"> <button class="btn btn-warning btn-edit" data-id="${newUser.id_villa}" data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="tf-icons bx bx-edit-alt"></i></button> <button
                                        class="btn btn-danger btn-delete" data-id="${newUser.id_villa}"><i
                                                class="tf-icons bx bx-trash"></i></button><button class="btn btn-info btn-gambar" data-id="${newUser.id_villa}" data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="tf-icons bx bx-image-add"></i></button><a class="btn btn-success"
                                            href="mapvilla/map/${newUser.id_villa}"><i
                                                class="tf-icons bx bx-map-alt"></i></a></div></td>
                            </tr>
                        `;
                            $('#table tbody').append(newRow);

                            // Update nomor urut
                            $('#table tbody tr').each(function(index) {
                                $(this).find('td').first().html(index + 1);
                            });
                        } else {
                            $('#error').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
                            $('#simpan').html('Simpan');
                        }
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        $('#error').text(error.error).fadeIn().delay(2000).fadeOut();
                        $('#simpan').html('Simpan');
                    }
                });
            });

            // Edit Data
            $(document).on('click', '.btn-edit', function() {
                var villaId = $(this).data('id');
                $.ajax({
                    url: "{{ url('datavilla/edit') }}/" + villaId,
                    type: 'GET',
                    success: function(data) {
                        $('#editVillaId').val(data.id_villa);
                        $('#editNamaVilla').val(data.nama_villa);
                        $('#editStatus').val(data.status);
                        $('#editJmlKmrTidurId').val(data.jml_kmr_tidur);
                        $('#editJmlKmrMandiId').val(data.jml_kmr_mandi);
                        $('.polygon').val(data.polygon);
                        var harga = number_format(data.harga, 0, '.', '.');
                        $('#editHarga').val(harga);

                        // Extract number and unit from luas field
                        var luasNumber = data.luas.match(/\d+/)[0]; // Match digits
                        var satuan = ''; // Variable to store the unit

                        // Determine the unit based on the last word in luas field
                        var words = data.luas.trim().split(' ');
                        if (words.length > 1) {
                            satuan = words[words.length - 1];
                        }

                        // Set the value of editLuas and editSatuan
                        $('#editLuas').val(luasNumber);

                        // Adjust the select option based on the determined unit
                        switch (satuan) {
                            case 'm²':
                                $('#editSatuan').val('m²');
                                break;
                            case 'a':
                                $('#editSatuan').val('a');
                                break;
                            case 'ha':
                                $('#editSatuan').val('ha');
                                break;
                            case 'km²':
                                $('#editSatuan').val('km²');
                                break;
                            default:
                                $('#editSatuan').val('');
                        }

                        $('#editUraian').val(data.uraian);
                    }
                });
            });

            $(document).on('click', '.btn-gambar', function() {
                var villaId = $(this).data('id');
                $.ajax({
                    url: "{{ url('gambarvilla/data') }}/" + villaId,
                    type: 'GET',
                    success: function(data) {
                        $('#editVillaId').val(data.id_villa);

                        $('#editRuangTamu').val(data.gbr_ruang_tamu);
                        $('#editKolam').val(data.gbr_kolam);
                        $('#editRooftop').val(data.gbr_rooftop);
                        $('#editCarport').val(data.gbr_carport);
                        $('#editRuangKeluarga').val(data.gbr_ruang_keluarga);
                        $('#editBathroom').val(data.gbr_bathroom);
                        $('#editSpa').val(data.gbr_spa);
                        $('#editKamar1').val(data.gbr_kamar1);
                        $('#editKamar2').val(data.gbr_kamar2);
                        $('#editKamar3').val(data.gbr_kamar3);

                        // Set image preview src
                        $('.previewRuangTamu').attr('src', data.gbr_ruang_tamu ?
                            `{{ asset('files/${data.gbr_ruang_tamu}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewKolam').attr('src', data.gbr_kolam ?
                            `{{ asset('files/${data.gbr_kolam}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewRooftop').attr('src', data.gbr_rooftop ?
                            `{{ asset('files/${data.gbr_rooftop}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewCarport').attr('src', data.gbr_carport ?
                            `{{ asset('files/${data.gbr_carport}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewRuangKeluarga').attr('src', data.gbr_ruang_keluarga ?
                            `{{ asset('files/${data.gbr_ruang_keluarga}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewBathroom').attr('src', data.gbr_bathroom ?
                            `{{ asset('files/${data.gbr_bathroom}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewSpa').attr('src', data.gbr_spa ?
                            `{{ asset('files/${data.gbr_spa}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewKamar1').attr('src', data.gbr_kamar1 ?
                            `{{ asset('files/${data.gbr_kamar1}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewKamar2').attr('src', data.gbr_kamar2 ?
                            `{{ asset('files/${data.gbr_kamar2}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                        $('.previewKamar3').attr('src', data.gbr_kamar3 ?
                            `{{ asset('files/${data.gbr_kamar3}') }}` :
                            `{{ asset('admin/assets/img/mentahan-logo.jpg') }}`);
                    }
                });
            });


            $('#form-edit').submit(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData(this);
                var villaId = $('#editVillaId').val();
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('datavilla/update') }}/" + villaId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#editModal').modal('hide');
                            alert.textContent = "Data berhasil diupdate";
                            $('.alert-success').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
                            $('#form-edit')[0].reset();
                            $('#update').html('Update');

                            // Update baris tabel yang ada
                            var updatedVilla = data.villa;
                            var row = $('#v-' + updatedVilla.id_villa);
                            row.find('td:nth-child(2)').text(updatedVilla.nama_villa);

                            var statusClass = '';
                            switch (updatedVilla.status) {
                                case 'Tersedia':
                                case 'Terjual':
                                    statusClass = 'bg-success';
                                    break;
                                case 'Dipesan':
                                case 'Dibooking':
                                case 'Disewakan':
                                    statusClass = 'bg-warning';
                                    break;
                                case 'Kosong':
                                case 'Maintenance':
                                    statusClass = 'bg-danger';
                                    break;
                                default:
                                    statusClass =
                                        'bg-secondary'; // Default class if status is unknown
                            }

                            row.find('td:nth-child(3)').html("<span class='badge " +
                                statusClass + "'>" + updatedVilla.status + "</span>");
                            var harga = number_format(updatedVilla.harga, 0, ',', ',');
                            row.find('td:nth-child(4)').html(
                                "<span class='badge rounded-pill bg-success'>Rp. " + harga +
                                "</span>");
                            row.find('td:nth-child(5)').text(updatedVilla.luas);
                        } else {
                            $('#error-edit').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
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

            //update gambar
            $('#form-edit-gambar').submit(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData(this);
                var villaId = $('#editVillaId').val();
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('gambarvilla/update') }}/" + villaId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#tambahGambarModal').modal('hide');
                            alert.textContent = "Data berhasil diupdate";
                            $('.alert-success').fadeIn().delay(1000)
                                .fadeOut(); // Menampilkan alert berhasil
                            $('#form-edit-gambar')[0].reset();
                            $('#update').html('Update');

                            // Update baris tabel yang ada
                            var updatedVilla = data.villa;
                            var row = $('#v-' + updatedVilla.id_villa);
                            row.find('td:nth-child(2)').text(updatedVilla.nama_villa);

                            var statusClass = '';
                            switch (updatedVilla.status) {
                                case 'Tersedia':
                                case 'Terjual':
                                    statusClass = 'bg-success';
                                    break;
                                case 'Dipesan':
                                case 'Dibooking':
                                case 'Disewakan':
                                    statusClass = 'bg-warning';
                                    break;
                                case 'Kosong':
                                case 'Maintenance':
                                    statusClass = 'bg-danger';
                                    break;
                                default:
                                    statusClass =
                                        'bg-secondary'; // Default class if status is unknown
                            }

                            row.find('td:nth-child(3)').html("<span class='badge " +
                                statusClass + "'>" + updatedVilla.status + "</span>");
                            var harga = number_format(updatedVilla.harga, 0, ',', ',');
                            row.find('td:nth-child(4)').html(
                                "<span class='badge rounded-pill bg-success'>Rp. " + harga +
                                "</span>");
                            row.find('td:nth-child(5)').text(updatedVilla.luas);

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


            $(document).on('click', '.btn-delete', function() {
                var villaId = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    backdrop: 'rgba(0, 0, 0, 0.1)'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Menghapus...',
                            allowOutsideClick: false,
                            backdrop: 'rgba(0, 0, 0, 0.1)',
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: "{{ url('datavilla/destroy') }}/" + villaId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        title: 'Terhapus!',
                                        text: 'Data berhasil dihapus.',
                                        icon: 'success',
                                        backdrop: 'rgba(0, 0, 0, 0.1)' // Menambahkan backdrop pada SweetAlert
                                    });
                                    // Hapus baris dari tabel
                                    $('#v-' + villaId).remove();

                                    // Update nomor urut
                                    $('#table tbody tr').each(function(index) {
                                        $(this).find('td').first().html(index +
                                            1);
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: 'Data gagal dihapus.',
                                        icon: 'error',
                                        backdrop: 'rgba(0, 0, 0, 0.1)' // Menambahkan backdrop pada SweetAlert
                                    });
                                }
                            },
                            error: function(xhr) {
                                var error = JSON.parse(xhr.responseText);
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: error.error,
                                    icon: 'error',
                                    backdrop: 'rgba(0, 0, 0, 0.1)' // Menambahkan backdrop pada SweetAlert
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
