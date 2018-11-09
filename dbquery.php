<?php

function add_population_func() {
	global $wpdb;
	
	// if ( !current_user_can( 'manage_options' ) ) {
    //   wp_die( __('You are not allowed to be on this page.','nation') );
	// }
	// Check that nonce field
	// check_admin_referer( 'dcc_cimb_settings_edit' );
	
	// $dccCimbEnabled = (isset($_POST['dcc_cimb_enabled']))?$_POST['dcc_cimb_enabled']:0;
	// $dccCimbSandboxEnabled = (isset($_POST['dcc_cimb_sandbox_enabled']))?$_POST['dcc_cimb_sandbox_enabled']:0;
	
	$table_name = $wpdb->prefix . "penduduk";

	$wpdb->insert( $table_name, array( 
		'nik' => $POST['nik'],
		'nama' => $POST['nama'],
		'tempat_lahir' => $_POST['merchant_acc_code'], 
		'jenis_kelamin' => $_POST['txn_pass'], 
		'golongan_darah' => $_POST['company_code'],
        'alamat' => $_POST['company_code'],
        'foto' => 'test'
	) );
	
	wp_redirect(  home_url( '/' ) );
	exit;
}
add_action( 'admin_post_add_population', 'add_population_func' );



?>