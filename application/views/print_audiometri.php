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
      <div class="float-right"><?= $audiometri['DATE(audiometri.tanggal)'] ?></div>
      <br>
      <table>
        <tr>
          <td>Nama Pasien</td>
          <td>:</td>
          <td><?= $audiometri['nama_pasien']; ?></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td>:</td>
          <td><?= hitung_umur($audiometri['tanggal_lahir']); ?> Tahun</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= ($audiometri['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $audiometri['alamat']; ?></td>
        </tr>
        <tr>
          <td>No USG</td>
          <td>:</td>
          <td><?= $audiometri['no_audiometri']; ?></td>
        </tr>
    </table>
    <br><br>
    <hr>
    <br><br>
    <table>
        <tr>
          <td width="100">Hepar</td>
          <td>:</td>
          <td><?= $audiometri['hepar']; ?></td>
        </tr>
        <tr>
          <td>Empedu</td>
          <td>:</td>
          <td><?= $audiometri['empedu']; ?></td>
        </tr>
        <tr>
          <td>Pankreas</td>
          <td>:</td>
          <td><?= $audiometri['pankreas']; ?></td>
        </tr>
        <tr>
          <td>Lien</td>
          <td>:</td>
          <td><?= $audiometri['lien']; ?></td>
        </tr>
        <tr>
          <td>Ginjal</td>
          <td>:</td>
          <td><?= $audiometri['ginjal']; ?></td>
        </tr>
        <tr>
          <td>Buli-Buli</td>
          <td>:</td>
          <td><?= $audiometri['bulibuli']; ?></td>
        </tr>
        <tr>
          <td>Prostat</td>
          <td>:</td>
          <td><?= $audiometri['prostat']; ?></td>
        </tr>
        <tr>
          <td>Kesan</td>
          <td>:</td>
          <td><?= $audiometri['kesan']; ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><?= $audiometri['keterangan']; ?></td>
        </tr>
      </table>
      <br><br>
      <div class="text-center float-right" style="margin-top:5em;">
        <?= $audiometri['nama_dokter']; ?><br>
        <?= $audiometri['spesialis']; ?>
      </div>
    </div>
	  <?php //print_r($audiometri); ?>
</body>
</html>
