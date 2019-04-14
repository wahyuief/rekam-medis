<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="<?php echo base_url('tambah/penanggung/').$pasien['no_pasien'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Penanggung</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 text-primary">Untuk Pasien a/n <span class="font-weight-bold"><?php echo $pasien['nama'] ?></span></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="80">No. KTP</th>
                      <th>Nama</th>
                      <th>Pekerjaan</th>
                      <th>Gender</th>
                      <th>No. Telp</th>
                      <th>Hubungan</th>
                      <th width="10">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $row) {
                      echo '<tr>
                        <td>'.$row['ktp'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['pekerjaan'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['hubungan'].'</td>
                        <td><a href="'.base_url('edit/penanggung/').$row['no_pasien'].'/'.$row['id'].'" class="btn-circle btn-sm btn-primary"><i class="fas fa-pen"></i></a></td>
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
