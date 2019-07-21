<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perubahan Data Rekam Medis</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nomor Pasien</label>
                          <input type="text" name="no_pasien" value="<?php echo $data['no_pasien']; ?>" class="form-control" readonly>
                          <small class="text-danger"><?php echo form_error('no_pasien'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Pasien</label>
                          <input type="text" name="nama_pasien" value="<?php echo $data['nama_pasien']; ?>" class="form-control" readonly>
                          <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keluhan</label>
                      <input type="text" name="keluhan" value="<?php echo $data['keluhan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('keluhan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Diagnosa</label>
                      <input type="text" name="diagnosa" value="<?php echo $data['diagnosa']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('diagnosa'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tindakan</label>
                      <input type="text" name="tindakan" value="<?php echo $data['tindakan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('tindakan'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Obat</label>
                      <select class="form-control" name="obat">
                        <?php foreach ($obat as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dokter</label>
                      <select class="form-control" name="dokter">
                        <?php foreach ($dokter as $row) {
                          if ($data['nama_dokter'] == $row['nama']) {
                            echo '<option value="'.$row['id'].'">'.$data['nama_dokter'].'</option>';
                          } else {
                            echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                          }
                        } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                      <div class="btn-group d-flex" role="group" aria-label="Basic example">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                        <a href="javascript:;" onclick="window.history.back()" class="form-control btn btn-warning">Batal</a>
                        <a href="javascript:;" onclick="return confirm('Yakin ingin menghapus?') ? window.location.href='<?php echo base_url('rekam/hapus/').$data['no_pasien']; ?>' : ''" class="form-control btn btn-danger">Hapus</a>
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
