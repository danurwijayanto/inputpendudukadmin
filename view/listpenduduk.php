<?php
    $datapenduduk = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'penduduk');

?>
List Data Penduduk
<table class="form-table striped">
    <tbody>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Golongan Darah</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($datapenduduk as $dp){ 
                $datafoto = wp_get_attachment_image($dp->foto)
        ?>
        <tr>
            <th><?php echo $dp->id ?></th>
            <th><?php echo $dp->nik ?></th>
            <th><?php echo $dp->nama ?></th>
            <th><?php echo $dp->tempat_lahir ?></th>
            <th><?php echo $dp->jenis_kelamin ?></th>
            <th><?php echo $dp->golongan_darah ?></th>
            <th><?php echo $dp->alamat ?></th>
            <th><?php echo $datafoto ?></th>
            <th></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>