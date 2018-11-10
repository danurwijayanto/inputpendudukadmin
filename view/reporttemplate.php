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
        </tr>
        <?php
            foreach ($populationlist as $pl){ 
                $datafoto = wp_get_attachment_image($pl->foto);
        ?>
        <tr>
            <th><?php echo $pl->id ?></th>
            <th><?php echo $pl->nik ?></th>
            <th><?php echo $pl->nama ?></th>
            <th><?php echo $pl->tempat_lahir ?></th>
            <th><?php echo $pl->jenis_kelamin ?></th>
            <th><?php echo $pl->golongan_darah ?></th>
            <th><?php echo $pl->alamat ?></th>
            <th><?php echo $datafoto ?></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>