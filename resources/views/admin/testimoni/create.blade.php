<form id="form-add" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div id="error" class="alert alert-danger border" role="alert" style="display: none">
                Data gagal disimpan
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <div class="image-wrapper">
                                <img src="{{asset('files/default-img.jpg')}}" alt="image"
                                    class="d-block rounded-3 image-preview previewGambar1" height="110"
                                    width="110" id="uploadedAvatarGambar1" />
                            </div>
                            <div class="button-wrapper my-2">
                                <label class="btn btn-primary me-2" style="width: 110px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-gambar1"
                                        name="foto" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3" placeholder="Nama" name="nama" value="">
                            <input type="text" class="form-control" placeholder="Profesi" name="profesi" value="">
                        </div>
                        <div class="col-md-12">
                            <textarea name="ulasan" class="form-control" placeholder="Ulasan" cols="10" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
