<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perubahan Data Rontgen Pasien</h6>
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
                          <label>Nama</label>
                          <input type="text" name="nama" value="<?php echo $data['nama_pasien']; ?>" class="form-control" readonly>
                          <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Cor</label>
                      <input type="text" name="cor" value="<?php echo $data['cor']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('cor'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Pulmo</label>
                      <input type="text" name="pulmo" value="<?php echo $data['pulmo']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('pulmo'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Costae</label>
                      <input type="text" name="costae" value="<?php echo $data['costae']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('costae'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Sinus</label>
                      <input type="text" name="sinus" value="<?php echo $data['sinus']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('sinus'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Diapragma</label>
                      <input type="text" name="diapragma" value="<?php echo $data['diapragma']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('diapragma'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Jenis Periksa</label>
                      <input type="text" name="jenis_periksa" value="<?php echo $data['jenis_periksa']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('jenis_periksa'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Kesan</label>
                      <input type="text" name="kesan" value="<?php echo $data['kesan']; ?>" class="form-control">
                      <small class="text-danger"><?php echo form_error('kesan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan" rows="3" class="form-control"><?php echo $data['keterangan']; ?></textarea>
                      <small class="text-danger"><?php echo form_error('keterangan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Dokter</label>
                      <select class="form-control" name="dokter">
                        <?php foreach ($dokter as $dok) {
                          echo '<option value="'.$dok['id'].'">'.$dok['nama'].'</option>';
                        } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="Pending">Pending</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                      <small class="text-danger"><?php echo form_error('status'); ?></small>
                    </div>
                    <div class="form-group">
                      <div class="btn-group d-flex" role="group" aria-label="Basic example">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                        <a href="javascript:;" onclick="window.history.back()" class="form-control btn btn-warning">Batal</a>
                        <a href="javascript:;" onclick="return confirm('Yakin ingin menghapus?') ? window.location.href='<?php echo base_url('hapus/rontgen/').$data['no_pasien']; ?>' : ''" class="form-control btn btn-danger">Hapus</a>
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
