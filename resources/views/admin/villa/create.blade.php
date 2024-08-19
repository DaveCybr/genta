<form id="form-add" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="error" class="alert alert-danger border" role="alert" style="display: none">
                Data gagal disimpan
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Villa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="err2" class="alert alert-danger mt-2" style="display: none;">

                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama Villa</label>
                            <input type="text" id="nameBasic" required name="nama_villa" class="form-control"
                                placeholder="Masukkan Nama Villa" />
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-5 mb-0">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option disabled selected>Pilih Status..</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipesan">Dipesan</option>
                                <option value="Dibooking">Dibooking</option>
                                <option value="Terjual">Terjual</option>
                                <option value="Disewakan">Disewakan</option>
                                <option value="Kosong">Kosong</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="col-7 mb-0">
                            <label class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="harga" id="hargaBasic" required name="ulangi_password"
                                    class="form-control uang" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Luas Villa</label>
                            <div class="input-group">
                                <input type="number" min="0" name="luas" class="form-control"
                                    aria-label="Text input with dropdown button" placeholder="Masukkan Luas Villa"
                                    style="width: 65%;" />
                                <select class="form-select" name="satuan" id="datalistOptions" style="width: 35%;">
                                    <option disasbled selected>Satuan</option>
                                    <option value="m²">Meter Persegi</option>
                                    <option value="a">Are</option>
                                    <option value="ha">Hektare</option>
                                    <option value="km²">Kilometer Persegi</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Uraian</label>
                            <div class="input-group input-group-merge speech-to-text">
                                <textarea class="form-control" name="uraian" placeholder="Say it" rows="2"></textarea>
                                <span class="input-group-text">
                                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                </span>
                            </div>
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
