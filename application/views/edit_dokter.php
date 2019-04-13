<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perubahan Data Dokter</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nomor Induk Pegawai</label>
                      <input type="text" name="nip" value="<?php echo $data['nip'] ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nip'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nomor Telpon</label>
                      <input type="text" name="phone" value="<?php echo $data['phone'] ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('phone'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" rows="3" class="form-control"><?php echo $data['alamat'] ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Spesialis</label>
                      <input type="text" name="spesialis" value="<?php echo $data['spesialis'] ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('spesialis'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="gender">
                        <?php if ($data['gender'] == 'P') {
                          echo '<option value="P">Perempuan</option>
                          <option value="L">Laki-Laki</option>';
                        } else {
                          echo '<option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>';
                        } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('gender'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" value="<?php echo $data['email'] ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin diganti">
                      <small class="text-danger"><?php echo form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                      <div class="btn-group d-flex" role="group" aria-label="Basic example">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                        <a href="javascript:;" onclick="window.location.href='<?php echo base_url('data/dokter'); ?>'" class="form-control btn btn-warning">Batal</a>
                        <a href="javascript:;" onclick="return confirm('Yakin ingin menghapus?') ? window.location.href='<?php echo base_url('hapus/dokter/').$data['id']; ?>' : ''" class="form-control btn btn-danger">Hapus</a>
                      </div>
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
