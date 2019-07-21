<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    html {
      font-family: arial!important;
    }
    .container {
      margin: 0 3em;
    }
    .border {
      border: 1px solid;
    }
    .border-bottom {
      border-bottom: 1px solid;
    }

    .text-center {
      text-align: center;
    }
    .float-right {
      float: right;
    }

    .pd {
      padding: 5px;
    }
  </style>
</head>
<body>
    <div class="container">
      <h3 class="border text-center pd">Laporan Rekam Medis Pasien</h3>
      <br><br>
      <div class="float-right"><?= $rekam_medis['tgl_daftar'] ?></div>
      <br>
      <table>
        <tr>
          <td width="150">No Pasien</td>
          <td>:</td>
          <td><?= $rekam_medis['no_pasien']; ?></td>
        </tr>
        <tr>
          <td>Nama Pasien</td>
          <td>:</td>
          <td><?= $rekam_medis['nama_pasien']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td>:</td>
          <td><?= $rekam_medis['tanggal_lahir']; ?></td>
        </tr>
        <tr>
          <td>Golongan Darah</td>
          <td>:</td>
          <td><?= $rekam_medis['goldarah']; ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= ($rekam_medis['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $rekam_medis['alamat']; ?></td>
        </tr>
    </table>
    <br><br>
    <hr>
    <br><br>
    <table>
        <tr>
          <td width="100">Keluhan</td>
          <td>:</td>
          <td><?= $rekam_medis['keluhan']; ?></td>
        </tr>
        <tr>
          <td>Diagnosa</td>
          <td>:</td>
          <td><?= $rekam_medis['diagnosa']; ?></td>
        </tr>
        <tr>
          <td>Tindakan</td>
          <td>:</td>
          <td><?= $rekam_medis['tindakan']; ?></td>
        </tr>
      </table>
      <br><br>
      <div class="text-center float-right" style="margin-top:5em;">
        <?= $rekam_medis['nama_dokter']; ?><br>
        <?= $rekam_medis['spesialis']; ?>
      </div>
    </div>
	  <?php //print_r($rekam_medis); ?>
</body>
</html>
