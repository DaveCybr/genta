<form id="form-add" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div id="error" class="alert alert-danger border" role="alert" style="display: none">
                Data gagal disimpan
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Username</label>
                            <input type="text" id="nameBasic" required name="name" class="form-control"
                                placeholder="Masukkan usernames" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="passwordBasic" class="form-label">Password</label>
                            <input type="password" id="passwordBasic" required name="password" class="form-control"
                                placeholder="********" />
                        </div>
                        <div class="col mb-0">
                            <label for="ulangiPasswordBasic" class="form-label">Ulangi Password</label>
                            <input type="password" id="ulangiPasswordBasic" required name="ulangi_password"
                                class="form-control" placeholder="********" />
                        </div>
                    </div>
                    <div id="err2" class="alert alert-danger mt-2" style="display: none;">

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var password = document.getElementById("passwordBasic");
        var ulangiPassword = document.getElementById("ulangiPasswordBasic");
        var errorDiv = document.querySelector(".alert.alert-danger.mt-2");

        ulangiPassword.addEventListener("input", function() {
            var ulangiPasswordValue = ulangiPassword.value;
            var passwordValue = password.value;

            if (ulangiPasswordValue !== passwordValue) {
                errorDiv.textContent = "Password tidak sesuai";
                errorDiv.style.display = "block";
            } else {
                errorDiv.style.display = "none";
            }
        });
    });
</script>
