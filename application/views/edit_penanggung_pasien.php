<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 text-primary">Untuk Pasien a/n <span class="font-weight-bold"><?php echo $pasien['nama'] ?></span></h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nomor KTP</label>
                      <input type="text" name="ktp" value="<?php echo $data['ktp']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('ktp'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nomor Telpon</label>
                      <input type="text" name="phone" value="<?php echo $data['phone']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('phone'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" rows="3" class="form-control"><?php echo $data['alamat']; ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
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
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('pekerjaan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Perusahaan</label>
                      <input type="text" name="perusahaan" value="<?php echo $data['perusahaan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('perusahaan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Hubungan</label>
                      <input type="text" name="hubungan" value="<?php echo $data['hubungan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('hubungan'); ?></small>
                    </div>
                    <div class="form-group">
                      <div class="btn-group d-flex" role="group" aria-label="Basic example">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                        <a href="javascript:;" onclick="window.location.href='<?php echo base_url('penanggung/pasien/').$pasien['no_pasien']; ?>'" class="form-control btn btn-warning">Batal</a>
                        <a href="javascript:;" onclick="return confirm('Yakin ingin menghapus?') ? window.location.href='<?php echo base_url('hapus/penanggung/').$pasien['no_pasien'].'/'.$data['id']; ?>' : ''" class="form-control btn btn-danger">Hapus</a>
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
