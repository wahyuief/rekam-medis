<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengaturan Password</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <label>Password Lama</label>
                  <input type="password" name="passold" class="form-control">
                  <small class="text-danger"><?php echo form_error('passold'); ?></small>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="passnew" class="form-control">
                  <small class="text-danger"><?php echo form_error('passnew'); ?></small>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password Baru</label>
                  <input type="password" name="passconf" class="form-control">
                  <small class="text-danger"><?php echo form_error('passconf'); ?></small>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                </div>
              </form>
            </div>
          </div>

</div>
</div>
</div>
</div>
