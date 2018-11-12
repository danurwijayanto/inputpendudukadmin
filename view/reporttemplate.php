List Data Penduduk
<table class="form-table striped">
    <tbody>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Telp Rumah</th>
            <th>No HP</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
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
            <th><?php echo $pl->nik ?></th>
            <th><?php echo $pl->nama ?></th>
            <th><?php echo $pl->tlp_rumah ?></th>
            <th><?php echo $pl->no_hp ?></th>
            <th><?php echo $pl->tempat_lahir ?></th>
            <th><?php echo $pl->tanggal_lahir ?></th>
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