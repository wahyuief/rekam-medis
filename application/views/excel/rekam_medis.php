<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=rekam_medis.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
    <tr>
        <th>Nomor Pasien</th>
        <th>Nama Pasien</th>
        <th>Nama Dokter</th>
        <th>Keluhan</th>
        <th>Diagnosa</th>
        <th>Tindakan</th>
        <th>Obat</th>
        <th>Tanggal Daftar</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($data as $data) { ?>
    <tr>
        <td><?php echo $data->no_pasien ?></td>
        <td><?php echo $data->nama_pasien ?></td>
        <td><?php echo $data->nama_dokter ?></td>
        <td><?php echo $data->keluhan ?></td>
        <td><?php echo $data->diagnosa ?></td>
        <td><?php echo $data->tindakan ?></td>
        <td><?php echo $data->nama_obat ?></td>
        <td><?php echo $data->tgl_daftar ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>

</table>