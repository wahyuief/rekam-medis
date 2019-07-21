<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Obat</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="10">No</th>
                      <th>Nama</th>
                      <th>Jenis Obat</th>
                      <th>Stok</th>
                      <th>Satuan</th>
                      <th>Keterangan</th>
                      <th width="120">Tanggal Masuk</th>
                      <th width="10">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;foreach ($data as $row) {
                      echo '<tr>
                        <td>'.$i++.'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['jenis'].'</td>
                        <td>'.($row['stok']-$this->mdata->penggunaan_obat($row['id'])).'</td>
                        <td>'.$row['satuan'].'</td>
                        <td>'.$row['keterangan'].'</td>
                        <td>'.$row['tgl_masuk'].'</td>
                        <td><a href="'.base_url('edit/obat/').$row['id'].'" class="btn-circle btn-sm btn-primary"><i class="fas fa-pen"></i></a></td>
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
