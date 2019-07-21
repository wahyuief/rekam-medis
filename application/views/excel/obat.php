<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=obat.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
    <tr>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Keterangan</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($data as $data) { ?>
    <tr>
        <td><?php echo $data->nama ?></td>
        <td><?php echo $data->jenis ?></td>
        <td><?php echo $data->stok ?></td>
        <td><?php echo $data->satuan ?></td>
        <td><?php echo $data->keterangan ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>

</table>