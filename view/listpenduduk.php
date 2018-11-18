<?php
    use Carbon\Carbon;
    $datapenduduk = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'penduduk', 'ARRAY_A');
    
?>
<div class="wrap">
    <h2>List Data Penduduk</h2>
    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <tr>
                <th class="manage-column">Check</th>
                <th class="manage-column">NIK</th>
                <th class="manage-column">Nama</th>
                <th class="manage-column">Email</th>
                <!-- <th class="manage-column">Telp Rumah</th> -->
                <th class="manage-column">No HP</th>
                <th class="manage-column">Tempat Lahir</th>
                <th class="manage-column">Tanggal Lahir</th>
                <th class="manage-column">Jenis Kelamin</th>
                <!-- <th class="manage-column">Golongan Darah</th> -->
                <th class="manage-column">Alamat</th>
                <th class="manage-column">Foto</th>
                <th class="manage-column">Input Data</th>
                <th class="manage-column">Action</th>
            </tr>
        </thead>
        <tbody>
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
                <!-- <th><?php //echo $dp['telp_rumah'] ?></th> -->
                <th><?php echo $dp['no_hp'] ?></th>
                <th><?php echo $dp['tempat_lahir'] ?></th>
                <th><?php echo $dp['tanggal_lahir'] ?></th>
                <th><?php echo $dp['jenis_kelamin'] ?></th>
                <!-- <th><?php //echo $dp['golongan_darah'] ?></th> -->
                <th><?php echo $dp['alamat'] ?></th>
                <th><?php echo $datafoto ?></th>
                <th><?php echo Carbon::createFromFormat('Y-m-d H:i:s', $dp['created_at'] ,'Asia/Jakarta')->format('d M Y') ?></th>
                <th>
                <a href="<?php echo home_url( '/viewpenduduk?id1='.$dp['nik'].'&id2='.$dp['foto'] )?>" type="button" class="button">Print</a>
                </th>
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
</div>