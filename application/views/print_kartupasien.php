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
  <div class="container" style="border: 5px solid;padding: 5px">
    <div style="text-align:center">
      <b>Kartu Berobat</b><br>
      <h3>MITRA HEALTH SERVICE</h3>
      <small>Jl. Veteran No.2, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17141</small>
    </div>
    <br><br>
    <table>
      <tr>
        <td width="110">Nomor Pasien</td>
        <td>:</td>
        <td><?php echo $data['no_pasien'] ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $data['nama'] ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo hitung_umur($data['tanggal_lahir']) ?> Tahun</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $data['alamat'] ?></td>
      </tr>
      <tr>
        <td>Telp</td>
        <td>:</td>
        <td><?php echo $data['phone'] ?></td>
      </tr>
    </table>
    <br>
    <div style="border:1px solid;text-align:center">
      <p>BAWALAH KARTU INI SETIAP KALI ANDA BEROBAT</p>
    </div>
  </div>
  <?php //print_r($data); ?>
</body>
</html>
