<?php
    $datapenduduk = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'penduduk', 'ARRAY_A');
    
    ?>
List Data Penduduk
<table class="form-table striped">
    <tbody>
        <tr>
            <th>Check</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Golongan Darah</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($datapenduduk as $dp){ 
                $datafoto = wp_get_attachment_image($dp['foto']);
        ?>
        <tr>
            <th>
            <div class="checkboxpenduduk">
                <label><input class="checkboxhiddendata" type="checkbox" value="1" data-penduduk='<?php echo json_encode($dp) ?>' ></label>
            </div>
            </th>
            <th><?php echo $dp['nik'] ?></th>
            <th><?php echo $dp['nama'] ?></th>
            <th><?php echo $dp['email'] ?></th>
            <th><?php echo $dp['telephone'] ?></th>
            <th><?php echo $dp['tempat_lahir'] ?></th>
            <th><?php echo $dp['tanggal_lahir'] ?></th>
            <th><?php echo $dp['jenis_kelamin'] ?></th>
            <th><?php echo $dp['golongan_darah'] ?></th>
            <th><?php echo $dp['alamat'] ?></th>
            <th><?php echo $datafoto ?></th>
            <th></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<form action='admin-post.php' method="POST">
    <?php wp_nonce_field( 'send_email_report' ); ?>
    <input type="hidden" id="populationlist"  name="populationlist">
    <input type='hidden' name='action' value='send_email_report' />
    <button type="submit" class="btn btn-primary">Kirim Email</button>
</form>

<script>
    jQuery(document).ready(function(){
        jQuery('.checkboxhiddendata').click(function() {
            var data = [];
            jQuery('.checkboxpenduduk input[type="checkbox"]:checked').each(function() {
                var datapenduduk = JSON.stringify(jQuery(this).data("penduduk"));
                data.push(datapenduduk);
            })
            console.log(data);
            jQuery('#populationlist').attr('value', '['+data+']');
        })
    })
</script>