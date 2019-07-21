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
    <h3 class="border text-center pd">Hasil Pemeriksaan EKG</h3>
    <br><br>
    <div class="float-right"><?= $ekg['DATE(ekg.tanggal)'] ?></div>
    <br>
    <table>
      <tr>
        <td>No EKG</td>
        <td>:</td>
        <td><?= $ekg['no_ekg']; ?></td>
      </tr>
      <tr>
        <td>Nama Pasien</td>
        <td>:</td>
        <td><?= $ekg['nama_pasien']; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?= hitung_umur($ekg['tanggal_lahir']); ?> Tahun</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= ($ekg['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $ekg['alamat']; ?></td>
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
        <td>Irama</td>
        <td><?= $ekg['irama'] ?></td>
      </tr>
      <tr>
        <td>Rate</td>
        <td><?= $ekg['rate'] ?></td>
      </tr>
      <tr>
        <td>Axis</td>
        <td><?= $ekg['axis'] ?></td>
      </tr>
      <tr>
        <td>Kelainan</td>
        <td><?= $ekg['kelainan'] ?></td>
      </tr>
    </table>
    <br>
    Kesimpulan : <?= $ekg['kesimpulan'] ?>
    <br>
    Keterangan : <?= $ekg['keterangan'] ?>
    <br>
    Saran : <?= $ekg['saran'] ?>
    <br><br>
    <div class="text-center float-right" style="margin-top:5em;">
      <?= $ekg['nama_dokter']; ?><br>
      <?= $ekg['spesialis']; ?>
    </div>
  </div>
  <?php //print_r($ekg); ?>
</body>
</html>
