@extends('admin.main')

@section('title', 'User')

@section('style-vendor')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">USER</h4>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data
        </button>
        <div id="success" class="alert alert-success border" role="alert" style="display: none;">
        </div>
        <!-- Responsive Table -->
        <div class="card">
            <h5 class="card-header">Data User</h5>

            <div class="table-responsive text-nowrap">
                <table class="table" id="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr id="user-{{ $user->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->pw_input }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="first-group"><button
                                            class="btn btn-warning btn-edit" data-id="{{ $user->id }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="tf-icons bx bx-edit-alt"></i></button> <button
                                            class="btn btn-danger btn-delete" data-id="{{ $user->id }}"><i
                                                class="tf-icons bx bx-trash"></i></button>
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
    @include('admin.user.create')
    @include('admin.user.edit')

@endsection

@section('script-page')
    <script>
        $(document).ready(function() {
            // Tambah Data
            $('#form-add').submit(function(e) {
                e.preventDefault();
                $('#simpan').html('Sending..');
                var formData = new FormData(this);
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('user/simpan') }}",
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
                            var newUser = data.user;
                            var newRow = `
                            <tr id="user-${newUser.id}">
                                <td></td>
                                <td>${newUser.name}</td>
                                <td>${newUser.pw_input}</td>
                                <td>${newUser.level}</td>
                                <td> <div class="btn-group" role="group" aria-label="first-group"><button class="btn btn-warning btn-edit" data-id="${newUser.id}" data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="tf-icons bx bx-edit-alt"></i></button> <button
                                        class="btn btn-danger btn-delete" data-id="${newUser.id}"><i
                                                class="tf-icons bx bx-trash"></i></button></div></td>
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
                var userId = $(this).data('id');
                $.ajax({
                    url: "{{ url('user/edit') }}/" + userId,
                    type: 'GET',
                    success: function(data) {
                        $('#editUserId').val(data.id);
                        $('#editName').val(data.name);
                        $('#editPassword').val(data.pw_input);
                        $('#editUlangiPassword').val(data.pw_input);
                    }
                });
            });

            $('#form-edit').submit(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData(this);
                var userId = $('#editUserId').val();
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('user/update') }}/" + userId,
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
                            var updatedUser = data.user;
                            var row = $('#user-' + updatedUser.id);
                            row.find('td:nth-child(2)').text(updatedUser.name);
                            row.find('td:nth-child(3)').text(updatedUser.pw_input);
                            row.find('td:nth-child(4)').text(updatedUser.level);
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

            $(document).on('click', '.btn-delete', function() {
                var userId = $(this).data('id');
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
                            url: "{{ url('user/destroy') }}/" + userId,
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
                                    $('#user-' + userId).remove();

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
