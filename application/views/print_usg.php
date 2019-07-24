<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    @font-face {
      font-family: 'Elegance';
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("http://eclecticgeek.com/dompdf/fonts/Elegance.ttf") format("truetype");
    }
    html {
      font-family: Elegance, sans-serif!important;
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
      <h3 class="border text-center pd">Hasil Pemeriksaan Ultrasonografi</h3>
      <br><br>
      <div class="float-right"><?= $usg['DATE(usg.tanggal)'] ?></div>
      <br>
      <table>
        <tr>
          <td>Nama Pasien</td>
          <td>:</td>
          <td><?= $usg['nama_pasien']; ?></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td>:</td>
          <td><?= hitung_umur($usg['tanggal_lahir']); ?> Tahun</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= ($usg['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $usg['alamat']; ?></td>
        </tr>
        <tr>
          <td>No USG</td>
          <td>:</td>
          <td><?= $usg['no_usg']; ?></td>
        </tr>
    </table>
    <br><br>
    <hr>
    <br><br>
    <table>
        <tr>
          <td width="100">Hepar</td>
          <td>:</td>
          <td><?= $usg['hepar']; ?></td>
        </tr>
        <tr>
          <td>Empedu</td>
          <td>:</td>
          <td><?= $usg['empedu']; ?></td>
        </tr>
        <tr>
          <td>Pankreas</td>
          <td>:</td>
          <td><?= $usg['pankreas']; ?></td>
        </tr>
        <tr>
          <td>Lien</td>
          <td>:</td>
          <td><?= $usg['lien']; ?></td>
        </tr>
        <tr>
          <td>Ginjal</td>
          <td>:</td>
          <td><?= $usg['ginjal']; ?></td>
        </tr>
        <tr>
          <td>Buli-Buli</td>
          <td>:</td>
          <td><?= $usg['bulibuli']; ?></td>
        </tr>
        <tr>
          <td>Prostat</td>
          <td>:</td>
          <td><?= $usg['prostat']; ?></td>
        </tr>
        <tr>
          <td>Kesan</td>
          <td>:</td>
          <td><?= $usg['kesan']; ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><?= $usg['keterangan']; ?></td>
        </tr>
      </table>
      <br><br>
      <div class="text-center float-right" style="margin-top:5em;">
        <?= $usg['nama_dokter']; ?><br>
        <?= $usg['spesialis']; ?>
      </div>
    </div>
	  <?php //print_r($usg); ?>
</body>
</html>
