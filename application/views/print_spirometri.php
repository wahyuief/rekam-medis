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
    .inidia table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

    .inidia thead th{
      border-top: 1px solid #e3e3e3;
      text-align: left;
      padding: 10px;
    }

    .inidia tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }

    .inidia tbody tr:nth-child(even){
      background: #F6F5FA;
    }

    .inidia tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
  <div class="container">
    <h3 class="border text-center pd">Hasil Pemeriksaan Spirometri</h3>
    <br><br>
    <div class="float-right"><?= $spirometri['DATE(spirometri.tanggal)'] ?></div>
    <br>
    <table>
      <tr>
        <td>No Spirometri</td>
        <td>:</td>
        <td><?= $spirometri['no_spirometri']; ?></td>
      </tr>
      <tr>
        <td>Nama Pasien</td>
        <td>:</td>
        <td><?= $spirometri['nama_pasien']; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?= hitung_umur($spirometri['tanggal_lahir']); ?> Tahun</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= ($spirometri['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $spirometri['alamat']; ?></td>
      </tr>
  </table>
  <br><br>
  <hr>
  <br><br>
  <table class="inidia">
      <tr>
        <th width="300">Pemeriksaan</th>
        <th width="100">Nilai</th>
      </tr>
      <tr>
        <td>Nilai Prediksi</td>
        <td><?= $spirometri['nilai_prediksi'] ?></td>
      </tr>
      <tr>
        <td>Kapasitas Vital Paksa (KVP)</td>
        <td><?= $spirometri['kvp'] ?></td>
      </tr>
      <tr>
        <td>Volume Ekspirasi Paksa Detik Pertama (VEP-1)</td>
        <td><?= $spirometri['vep'] ?></td>
      </tr>
      <tr>
        <td>Arus Puncak Ekspirasi (APE)</td>
        <td><?= $spirometri['ape'] ?></td>
      </tr>
    </table>
    <br>
    Kesan : <?= $spirometri['kesan'] ?>
    <br><br>
    <div class="text-center float-right" style="margin-top:5em;">
      <?= $spirometri['nama_dokter']; ?><br>
      <?= $spirometri['spesialis']; ?>
    </div>
  </div>
  <?php //print_r($spirometri); ?>
</body>
</html>
