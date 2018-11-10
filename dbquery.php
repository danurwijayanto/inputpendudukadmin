<?php

function send_email_report_func() {
	global $wpdb;
	
	if ( !current_user_can( 'manage_options' ) ) {
      wp_die( __('You are not allowed to be on this page.','nation') );
	}
	// Check that nonce field
	check_admin_referer( 'send_email_report' );
	
	$populationlist = json_decode(preg_replace('/\\\\/', '', $_POST['populationlist']));
	ob_start();
	include_once("view/reporttemplate.php");
	$content = ob_get_contents();
	ob_end_clean();
	$headers = array('Content-Type: text/html; charset=UTF-8');
	wp_mail( "danurwijayanto@gmail.com", "Laporan Daftar List Penduduk", $content, $headers);
	// $dccCimbEnabled = (isset($_POST['dcc_cimb_enabled']))?$_POST['dcc_cimb_enabled']:0;
	// $dccCimbSandboxEnabled = (isset($_POST['dcc_cimb_sandbox_enabled']))?$_POST['dcc_cimb_sandbox_enabled']:0;
	
	// $wpdb->insert( $table_name, array( 
	// 	'nik' => $POST['nik'],
	// 	'nama' => $POST['nama'],
	// 	'tempat_lahir' => $_POST['merchant_acc_code'], 
	// 	'jenis_kelamin' => $_POST['txn_pass'], 
	// 	'golongan_darah' => $_POST['company_code'],
    //     'alamat' => $_POST['company_code'],
    //     'foto' => 'test'
	// ) );
	
	// wp_redirect(  admin_url( "admin.php?page=manage-data-penduduk" ) );
	// exit;
}
add_action( 'admin_post_send_email_report', 'send_email_report_func' );



?>