<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registrasi Pasien</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nomor Pasien</label>
                          <input type="text" name="no_pasien" value="<?php echo $no_pasien ?>" class="form-control" readonly>
                          <small class="text-danger"><?php echo form_error('no_pasien'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nomor KTP</label>
                          <input type="text" name="ktp" value="<?php echo set_value('ktp') ?>" class="form-control">
                          <small class="text-danger"><?php echo form_error('ktp'); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" value="<?php echo set_value('tempat_lahir') ?>" class="form-control">
                          <small class="text-danger"><?php echo form_error('tempat_lahir'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir') ?>" class="form-control">
                          <small class="text-danger"><?php echo form_error('tanggal_lahir'); ?></small>
                        </div>
                      </div>
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
                      <label>Golongan Darah</label>
                      <select class="form-control" name="goldarah">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                      <small class="text-danger"><?php echo form_error('goldarah'); ?></small>
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
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" value="<?php echo set_value('pekerjaan') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('pekerjaan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Daftar</label>
                      <input type="date" name="tgl_daftar" value="<?php echo set_value('tgl_daftar') ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('tgl_daftar'); ?></small>
                    </div>
                    <!-- <div class="form-group">
                      <input type="file" name="picture" class="form-control">
                    </div> -->
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
