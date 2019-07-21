<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Lihat Laporan Checkup Pasien</title>
<link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
<script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-6">
      <div class="card shadow-sm mt-5">
        <div class="card-body">
          <form method="post" class="user">
            <div class="input-group">
              <input type="text" name="ktp" class="form-control" placeholder="Nomor KTP">
              <div class="input-group-append">
                <input type="submit" name="submit" class="btn btn-primary float-right" value="Submit">
              </div>
            </div>
          </form>
          <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped text-center">
              <tr>
                <th>Nama</th>
                <th width="100">Rontgen</th>
                <th width="100">Spirometri</th>
                <th width="100">USG</th>
                <th width="100">Ekg</th>
              </tr>
              <?php if ($pasien && isset($rontgen) || isset($spirometri) || isset($audiometri) || isset($ekg)) {
                echo '<tr>
                  <td>'.$pasien['nama'].'</td>
                  <td><a href="rontgen/list/'.$pasien['ktp'].'">Lihat</a></td>
                  <td><a href="spirometri/list/'.$pasien['ktp'].'">Lihat</a></td>
                  <td><a href="audiometri/list/'.$pasien['ktp'].'">Lihat</a></td>
                  <td><a href="ekg/list/'.$pasien['ktp'].'">Lihat</a></td>
                </tr>';
              } else {
                echo '<tr><td colspan="5">Data Pasien Tidak Ditemukan</td></tr>';
              } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
