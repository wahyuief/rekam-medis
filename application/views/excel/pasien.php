<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=pasien.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
    <tr>
        <th>Nomor Pasien</th>
        <th>Nomor KTP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Nomor Telpon</th>
        <th>Golongan Darah</th>
        <th>Alamat</th>
        <th>Pekerjaan</th>
        <th>Tanggal Daftar</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($data as $data) { ?>
    <tr>
        <td><?php echo $data->no_pasien ?></td>
        <td><?php echo $data->ktp ?></td>
        <td><?php echo $data->nama ?></td>
        <td><?php echo($data->gender == 'P' ? 'Wanita' : 'Pria') ?></td>
        <td><?php echo $data->tempat_lahir ?></td>
        <td><?php echo $data->tanggal_lahir ?></td>
        <td><?php echo $data->phone ?></td>
        <td><?php echo $data->goldarah ?></td>
        <td><?php echo $data->alamat ?></td>
        <td><?php echo $data->pekerjaan ?></td>
        <td><?php echo $data->tgl_daftar ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>

</table>