<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registrasi Dokter</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nomor Induk Pegawai</label>
                      <input type="text" name="nip" value="<?php echo set_value('nip') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nip'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nomor Telpon</label>
                      <input type="text" name="phone" value="<?php echo set_value('phone') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('phone'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" rows="3" class="form-control"><?php echo set_value('alamat') ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Spesialis</label>
                      <input type="text" name="spesialis" value="<?php echo set_value('spesialis') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('spesialis'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="gender">
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-Laki</option>
                      </select>
                      <small class="text-danger"><?php echo form_error('gender'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" value="<?php echo set_value('email') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      <small class="text-danger"><?php echo form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

</div>
</div>
</div>
</div>
