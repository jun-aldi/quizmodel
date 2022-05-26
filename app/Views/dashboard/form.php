<!-- Modal -->
<div class="modal fade" id="formmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="form" name="form" class="form-horizontal" enctype="multipart/form-data">
      <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                                <label for="nd" class="form-label">Nama Depan</label>
                              <input type="text" id="nd" class="form-control" placeholder="Nama Depan" name="nd"/>
                              <div class="invalid-feedback" id="errornd"></div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                            <label for="nb" class="form-label">Nama Belakang</label>
                              <input type="text" id="nb" class="form-control"  placeholder="Nama Belakang" name="nb"/>
                              <div class="invalid-feedback" id="errornb"></div>
                            </div>
                          </div>
                        </div>

                      <!-- Username input -->
                        <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Username" name="username"/>
                          <div class="invalid-feedback" id="error_username"></div>
                        </div>

                      <!-- Alamat input -->
                        <div class="form-outline mb-4">
                        <label for="alamat"  class="form-label">Alamat</label>
                          <textarea name="alamat" class="form-control" id="alamat" rows="4" placeholder="Alamat Rumah" name="alamat"></textarea>
                          <div class="invalid-feedback" id="error_alamat"></div>
                        </div>

                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                              <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" />
                              <div class="invalid-feedback" id="error_tempat_lahir"></div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <div class="input-group date" id="datepicker">
                            
                              <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir"/>
                              <div class="invalid-feedback" id="error_tanggal_lahir"></div>
                              </span>
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-outline mb-4">
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                            <option selected>Jenis Kelamin</option>
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                          </select>
                          <div class="m-3">
                          <div class="invalid-feedback" id="error_jenis_kelamin"></div>
                          </div>
                        </div>

                        <!-- Number input -->
                        <div class="form-outline mb-4">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                          <input type="number" id="no_telepon" class="form-control" placeholder="Telepon" name="no_telepon"/>
                          <div class="invalid-feedback" id="error_telepon"></div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                          <input  type="email" id="email" class="form-control" placeholder="Email" name="email"/>
                          <div class="invalid-feedback" id="error_email"></div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                          <input  type="password" id="password" class="form-control" placeholder="Password" name="password"/>
                          <div class="invalid-feedback" id="errorpass"></div>
                        </div>

                        <div class="form-outline mb-4">
                        <label for="re_password" class="form-label">Ulangi Password</label>
                          <input  type="password" id="re_password" class="form-control" placeholder="Ulangi Password" name="re_password"/>
                          <div class="invalid-feedback" id="error_re_password"></div>
                        </div>

                      <!-- Avatar input -->
                        <div class="form-outline mb-4">
                        <label for="avatar" class="form-label">Avatar</label>
                          <input type="file" class="form-control" name="avatar" id="avatar"/>
                          <div class="invalid-feedback" id="error_avatar"></div>
                        </div>                 <!-- 2 column grid layout with text inputs for the first and last names -->


                        <!-- Submit button -->
                        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('#btn-save').on('click', function(){
            $.ajax({
                data: new FormData(document.getElementById("form")),
                type: 'POST',
                url: '/dashboard/userdatatables/insertAjax',
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.error) {
                        if (response.error.nd) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.nd);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }
                        if (response.error.nb) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.nb);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#error_username').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#error_username').html('');
                        }

                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('#error_alamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#error_alamat').html('');
                        }

                        if (response.error.tempat_lahir) {
                            $('#tempat_lahir').addClass('is-invalid');
                            $('#error_tempat_lahir').html(response.error.tempat_lahir);
                        } else {
                            $('#tempat_lahir').removeClass('is-invalid');
                            $('#error_tempat_lahir').html('');
                        }

                        if (response.error.tanggal_lahir) {
                            $('#tanggal_lahir').addClass('is-invalid');
                            $('#error_tanggal_lahir').html(response.error.tanggal_lahir);
                        } else {
                            $('#tanggal_lahir').removeClass('is-invalid');
                            $('#error_tanggal_lahir').html('');
                        }

                        if (response.error.jenis_kelamin) {
                            $('#jenis_kelamin').addClass('is-invalid');
                            $('#error_jenis_kelamin').html(response.error.jenis_kelamin);
                        } else {
                            $('#jenis_kelamin').removeClass('is-invalid');
                            $('#error_jenis_kelamin').html('');
                        }

                        if (response.error.no_telepon) {
                            $('#no_telepon').addClass('is-invalid');
                            $('#error_telepon').html(response.error.no_telepon);
                        } else {
                            $('#no_telepon').removeClass('is-invalid');
                            $('#error_telepon').html('');
                        }
                        
                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('#error_email').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#error_email').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpass').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpass').html('');
                        }

                        if (response.error.re_password) {
                            $('#re_password').addClass('is-invalid');
                            $('#error_re_password').html(response.error.re_password);
                        } else {
                            $('#re_password').removeClass('is-invalid');
                            $('#error_re_password').html('');
                        }

                        if (response.error.avatar) {
                            $('#avatar').addClass('is-invalid');
                            $('#error_avatar').html(response.error.avatar);
                        } else {
                            $('#avatar').removeClass('is-invalid');
                            $('#error_avatar').html('');
                        }


                    } else {
                        alert(response.sukses);
                        $('#formmodal').modal('hide');
                        tampilkan();
                    }
                }

            });
        });
    });
</script>
