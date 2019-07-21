<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=usg.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
    <tr>
        <th>Nomor Pasien</th>
        <th>Nama</th>
        <th>Golongan Darah</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Daftar</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($data as $data) { ?>
    <tr>
        <td><?php echo $data->no_pasien ?></td>
        <td><?php echo $data->nama ?></td>
        <td><?php echo $data->goldarah ?></td>
        <td><?php echo($data->gender == 'P' ? 'Wanita' : 'Pria') ?></td>
        <td><?php echo $data->tanggal ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>

</table>