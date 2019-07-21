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
      <h3 class="border text-center pd">Hasil Pemeriksaan Radiologi</h3>
      <br><br>
      <div class="float-right"><?= $rontgen['DATE(rontgen.tanggal)'] ?></div>
      <br>
      <table>
        <tr>
          <td width="150">Nama Dokter</td>
          <td>:</td>
          <td><?= $rontgen['nama_dokter']; ?></td>
        </tr>
        <tr>
          <td>Nama Pasien</td>
          <td>:</td>
          <td><?= $rontgen['nama_pasien']; ?></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td>:</td>
          <td><?= hitung_umur($rontgen['tanggal_lahir']); ?> Tahun</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= ($rontgen['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $rontgen['alamat']; ?></td>
        </tr>
        <tr>
          <td>Jenis Pemeriksaan</td>
          <td>:</td>
          <td><?= $rontgen['jenis_periksa']; ?></td>
        </tr>
        <tr>
          <td>No Rontgen</td>
          <td>:</td>
          <td><?= $rontgen['no_rontgen']; ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><?= $rontgen['keterangan']; ?></td>
        </tr>
    </table>
    <br><br>
    <hr>
    <br><br>
    <table>
        <tr>
          <td width="100">Cor</td>
          <td>:</td>
          <td><?= $rontgen['cor']; ?></td>
        </tr>
        <tr>
          <td>Pulmo</td>
          <td>:</td>
          <td><?= $rontgen['pulmo']; ?></td>
        </tr>
        <tr>
          <td>Oss Costae</td>
          <td>:</td>
          <td><?= $rontgen['costae']; ?></td>
        </tr>
        <tr>
          <td>Sinus</td>
          <td>:</td>
          <td><?= $rontgen['sinus']; ?></td>
        </tr>
        <tr>
          <td>Diapragma</td>
          <td>:</td>
          <td><?= $rontgen['diapragma']; ?></td>
        </tr>
        <tr>
          <td>Kesan</td>
          <td>:</td>
          <td><?= $rontgen['kesan']; ?></td>
        </tr>
      </table>
      <br><br>
      <div class="text-center float-right" style="margin-top:5em;">
        <?= $rontgen['nama_dokter']; ?><br>
        <?= $rontgen['spesialis']; ?>
      </div>
    </div>
	  <?php //print_r($rontgen); ?>
</body>
</html>
