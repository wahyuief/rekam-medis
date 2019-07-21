<div class="container-fluid">

          <div class="d-sm-flex bd-highlight align-items-center mb-4">
            <span class="flex-grow-1 bd-highlight">Dashboard > <?php echo $title ?></span>
            <a href="<?php echo base_url('excel/rekam_medis') ?>" class="bd-highlight mr-2 btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            <a href="<?php echo base_url('rekam/baru') ?>" class="bd-highlight btn btn-sm btn-success shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>&nbsp;&nbsp;Input Keluhan</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Keluhan Pasien</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="80">No. Pasien</th>
                      <th>Nama</th>
                      <th>Dokter</th>
                      <th>Keluhan</th>
                      <th>Diagnosa</th>
                      <th>Obat</th>
                      <th>Tindakan</th>
                      <th>Tanggal Daftar</th>
                      <th width="10"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $row) {
                      echo '<tr>
                        <td>'.$row['no_pasien'].'</td>
                        <td>'.$row['nama_pasien'].'</td>
                        <td>'.$row['nama_dokter'].'</td>
                        <td>'.$row['keluhan'].'</td>
                        <td>'.$row['diagnosa'].'</td>
                        <td>'.$row['nama_obat'].'</td>
                        <td>'.$row['tindakan'].'</td>
                        <td>'.$row['tgl_daftar'].'</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Options
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="'.base_url('rekam/pasien/').$row['no_pasien'].'">Edit</a>
                              <a class="dropdown-item" href="'.base_url('rekam/print/').$row['no_pasien'].'">Print</a>
                            </div>
                          </div>
                      </tr>';
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

</div>
</div>
</div>
</div>
