<?php
/*
Plugin Name: Input Data Penduduk Admin
Plugin URI: 
description: 
Version: 1.0
Author: Noer
Author URI: 
*/
// add_action('admin_menu', 'Manage Data Penduduk');

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