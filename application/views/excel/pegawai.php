<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=pegawai.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Nomor Telpon</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($data as $data) { ?>
    <tr>
        <td><?php echo $data->nip ?></td>
        <td><?php echo $data->nama ?></td>
        <td><?php echo $data->alamat ?></td>
        <td><?php echo($data->gender == 'P' ? 'Wanita' : 'Pria') ?></td>
        <td><?php echo $data->phone ?></td>
    </tr>
    <?php $i++; } ?>
</tbody>

</table>