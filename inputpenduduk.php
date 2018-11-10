<?php
/*
Plugin Name: Input Data Penduduk Admin
Plugin URI: 
description: 
Version: 1.0
Author: Noer
Author URI: 
*/
add_action('admin_menu', 'manage_data_penduduk');

// include_once 'dbquery.php';
// include_once 'pageTemplate.php';

function dcc_cimb_install() {
	global $wpdb;
	
	$tabel_penduduk = $wpdb->prefix . "penduduk";
	
	$charset_collate = $wpdb->get_charset_collate();

	$penduduk_atribut = "CREATE TABLE $tabel_penduduk (
		id INT NOT NULL AUTO_INCREMENT,
		nik VARCHAR(30) DEFAULT '' NOT NULL,
		nama VARCHAR(50) DEFAULT '' NOT NULL,
		tempat_lahir VARCHAR(30) DEFAULT '' NOT NULL,
		jenis_kelamin int DEFAULT 0 NOT NULL,
		golongan_darah varchar(3) DEFAULT 0 NOT NULL,
        alamat varchar(150) DEFAULT '' NOT NULL,
        foto varchar(150) DEFAULT '' NOT NULL,
        UNIQUE KEY id (id)
	) $charset_collate;"; 

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	dbDelta( $penduduk_atribut );

	
}
register_activation_hook( __FILE__, 'dcc_cimb_install' );


function dcc_cimb_uninstall() {
	global $wpdb;

	$table_name = $wpdb->prefix . "penduduk";

	$wpdb->query("DROP TABLE IF EXISTS $table_name");

}
register_uninstall_hook(__FILE__, 'dcc_cimb_uninstall'); 

function manage_data_penduduk(){
	add_menu_page( 'Manage Data Penduduk', 'Manage Data Penduduk', 'manage_options', 'manage-data-penduduk', 'manage_data_penduduk_func' );
}

function manage_data_penduduk_func(){
global $wpdb;
include_once("view/listpenduduk.php");
// $settings = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'dcc_cimb_conf limit 1');
// echo "<h2>".__("CIMB Settings","dcc")."</h2>";
//if ($settings) {
	// echo "<form method='POST' action='admin-post.php'>";
	// wp_nonce_field( 'dcc_cimb_settings_edit' ); 
	// echo "<table class='option-table'><tr><td class='label'><strong>".__("Enable CIMB Payment Gateway:","dcc")." </strong></td><td><input type='checkbox' name='dcc_cimb_enabled' ";
	// if ( isset($settings->plugin_status) && $settings->plugin_status ) { echo "checked "; } 
	// echo "value='1'> Yes</td></tr>
	// <tr><td class='label'><strong>".__("Enable Sandbox mode","dcc")."</strong></td><td><input type='checkbox' name='dcc_cimb_sandbox_enabled' ";
	// if ( isset($settings->sandbox_status) && $settings->sandbox_status ) { echo "checked "; } 
	// echo "value='1'> Yes</td></tr>
	// <tr><td class='label'><strong>".__("Merchant Account Number:","dcc")." </strong></td><td><input type='type' name='merchant_acc_code' value='$settings->merchant_acc_no' class='regular-text' /></td></tr>
	// <tr><td class='label'><strong>".__("Txn Password:","dcc")." </strong></td><td><input type='type' name='txn_pass' value='$settings->txn_password' class='regular-text' /></td></tr>
	// <tr><td class='label'><strong>".__("Company Code:","dcc")." </strong></td><td><input type='type' name='company_code' value='$settings->company_code' class='regular-text' /></td></tr><br>
	
	// <input type='hidden' name='action' value='dcc_cimb_settings_edit' /></table>
	// <br><input type='submit' value='".__("Save changes","dcc")."' class='button button-primary' class='button button-primary'>
	// </form>";
//}
}