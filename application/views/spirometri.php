<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien Spirometri</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="80">No. Pasien</th>
                      <th>Nama</th>
                      <th width="10">Darah</th>
                      <th width="10">Gender</th>
                      <th width="10">Tgl Daftar</th>
                      <th width="10">Status</th>
                      <th width="10">Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $row) {
                      echo '<tr>
                        <td>'.$row['no_pasien'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td align="center">'.$row['goldarah'].'</td>
                        <td align="center">'.$row['gender'].'</td>
                        <td align="center">'.$row['tanggal'].'</td>
                        <td align="center">'.$row['status_spirometri'].'</td>
                        <td align="center"><a href="'.base_url('edit/spirometri/').$row['no_pasien'].'" class="btn btn-circle btn-primary text-white"><i class="fa fa-pen"></i></a></td>
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
