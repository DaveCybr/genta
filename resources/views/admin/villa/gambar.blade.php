<form id="form-edit-gambar" method="post">
    @csrf
    <div class="modal fade" id="tambahGambarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div id="error" class="alert alert-danger border" role="alert" style="display: none">
                Data gagal disimpan
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Gambar Villa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="err2" class="alert alert-danger mt-2" style="display: none;">

                    </div>
                    <input type="hidden" id="editVillaId" name="id_villa">
                    <input type="hidden" id="editRuangTamu" name="RuangTamuLama">
                    <input type="hidden" id="editKolam" name="kolamLama">
                    <input type="hidden" id="editRooftop" name="rooftopLama">
                    <input type="hidden" id="editCarport" name="carportLama">
                    <input type="hidden" id="editRuangKeluarga" name="ruangKeluargaLama">
                    <input type="hidden" id="editBathroom" name="bathroomLama">
                    <input type="hidden" id="editSpa" name="spaLama">
                    <input type="hidden" id="editKamar1" name="kamar1Lama">
                    <input type="hidden" id="editKamar2" name="kamar2Lama">
                    <input type="hidden" id="editKamar3" name="kamar3Lama">

                    <div class="d-flex gap-5 justify-content-center">
                        <div class="d-block">
                            <label class="form-label">Ruang Tamu</label>
                            <div class="image-wrapper">
                                <img src="" class="d-block rounded-3 image-preview previewRuangTamu"
                                    id="uploadedAvatarRuangTamu" />
                            </div>
                            <div
                                class="button-wrapper mt-2 d-flex flex-column align-items-center d-flex flex-column align-items-center">
                                <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-ruang-tamu" name="gbr_ruang_tamu"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="d-block">
                            <label class="form-label">Kolam</label>
                            <div class="image-wrapper">
                                <img src="" class="d-block rounded-3 image-preview previewKolam" height="150"
                                    width="150" id="uploadedAvatarKolam" />
                            </div>
                            <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                                <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-kolam" name="gbr_kolam" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="d-block">
                            <label class="form-label">Rooftop</label>
                            <div class="image-wrapper">
                                <img src="" class="d-block rounded-3 image-preview previewRooftop"
                                    height="150" width="150" id="uploadedAvatarKolamRooftop" />
                            </div>
                            <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                                <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-rooftop" name="gbr_rooftop"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="d-block">
                            <label class="form-label">Carport</label>
                            <div class="image-wrapper">
                                <img src="" class="d-block rounded-3 image-preview previewCarport"
                                    height="150" width="150" id="uploadedAvatarCarport" />
                            </div>
                            <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                                <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-carport" name="gbr_carport"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="d-block">
                            <label class="form-label">Ruang Keluarga</label>
                            <div class="image-wrapper">
                                <img src="" class="d-block rounded-3 image-preview previewRuangKeluarga"
                                    height="150" width="150" id="uploadedAvatarRuangKeluarga" />
                            </div>
                            <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                                <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="account-file-input-ruang-keluarga"
                                        name="gbr_ruang_keluarga" hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-5 justify-content-center mb-5">
                    <div class="d-block">
                        <label class="form-label">Bathroom</label>
                        <div class="image-wrapper">
                            <img src="" class="d-block rounded-3 image-preview previewBathroom"
                                height="150" width="150" id="uploadedAvatarBathroom" />
                        </div>
                        <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                            <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                <span class="d-none d-sm-block">Pilih Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input-bathroom" name="gbr_bathroom" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    <div class="d-block">
                        <label class="form-label">SPA</label>
                        <div class="image-wrapper">
                            <img src="" class="d-block rounded-3 image-preview previewSpa" height="150"
                                width="150" id="uploadedAvatarSpa" />
                        </div>
                        <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                            <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                <span class="d-none d-sm-block">Pilih Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input-spa" name="gbr_spa" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    <div class="d-block">
                        <label class="form-label">Kamar 1</label>
                        <div class="image-wrapper">
                            <img src="" class="d-block rounded-3 image-preview previewKamar1" height="150"
                                width="150" id="uploadedAvatarKamar1" />
                        </div>
                        <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                            <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                <span class="d-none d-sm-block">Pilih Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input-kamar1" name="gbr_kamar1" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    <div class="d-block">
                        <label class="form-label">Kamar 2</label>
                        <div class="image-wrapper">
                            <img src="" class="d-block rounded-3 image-preview previewKamar2" height="150"
                                width="150" id="uploadedAvatarKamar2" />
                        </div>
                        <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                            <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                <span class="d-none d-sm-block">Pilih Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input-kamar2" name="gbr_kamar2" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    <div class="d-block">
                        <label class="form-label">Kamar 3</label>
                        <div class="image-wrapper">
                            <img src="" class="d-block rounded-3 image-preview previewKamar3" height="150"
                                width="150" id="uploadedAvatarKamar3" />
                        </div>
                        <div class="button-wrapper mt-2 d-flex flex-column align-items-center">
                            <label class="btn btn-primary me-2" style="width: 150px" tabindex="0">
                                <span class="d-none d-sm-block">Pilih Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input-kamar3" name="gbr_kamar3" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('admin/assets/js/pages-account-settings-account.js') }}"></script>
