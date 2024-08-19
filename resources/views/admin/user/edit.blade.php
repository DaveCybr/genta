<form id="form-edit" method="post">
    @csrf
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="error-edit" class="alert alert-danger border" role="alert" style="display: none">
                Data gagal diperbarui
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editUserId" name="id">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editName" class="form-label">Username</label>
                            <input type="text" id="editName" required name="name" class="form-control"
                                placeholder="Masukkan username" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="password" id="editPassword" required name="password" class="form-control"
                                placeholder="********" />
                        </div>
                        <div class="col mb-0">
                            <label for="editUlangiPassword" class="form-label">Ulangi Password</label>
                            <input type="password" id="editUlangiPassword" required name="ulangi_password"
                                class="form-control" placeholder="********" />
                        </div>
                    </div>
                    <div id="err2-edit" class="alert alert-danger mt-2" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary">Update changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editPassword = document.getElementById("editPassword");
        var editUlangiPassword = document.getElementById("editUlangiPassword");
        var errorDiv = document.getElementById("err2-edit");

        editUlangiPassword.addEventListener("input", function() {
            var ulangiPasswordValue = editUlangiPassword.value;
            var passwordValue = editPassword.value;

            if (ulangiPasswordValue !== passwordValue) {
                errorDiv.textContent = "Password tidak sesuai";
                errorDiv.style.display = "block";
            } else {
                errorDiv.style.display = "none";
            }
        });
    });
</script>
