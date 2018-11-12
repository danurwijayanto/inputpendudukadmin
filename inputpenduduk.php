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

include_once 'dbquery.php';
// include_once 'pageTemplate.php';

function inputpenduduk_install() {
	register_uninstall_hook(__FILE__, 'inputpenduduk_uninstall'); 
	global $wpdb;
	
	$tabel_penduduk = $wpdb->prefix . "penduduk";
	
	$charset_collate = $wpdb->get_charset_collate();

	$penduduk_atribut = "CREATE TABLE $tabel_penduduk (
		nik VARCHAR(30) NOT NULL,
		nama VARCHAR(50) DEFAULT '' NOT NULL,
		email VARCHAR(50) DEFAULT '' NOT NULL,
		telp_rumah VARCHAR(20) DEFAULT '' NOT NULL,
		no_hp VARCHAR(20) DEFAULT '' NOT NULL,
		tempat_lahir VARCHAR(30) DEFAULT '' NOT NULL,
		tanggal_lahir DATE NOT NULL,
		jenis_kelamin varchar(12) DEFAULT '' NOT NULL,
		golongan_darah varchar(3) DEFAULT '' NOT NULL,
        alamat varchar(150) DEFAULT '' NOT NULL,
        foto varchar(150) DEFAULT '' NOT NULL,
        UNIQUE KEY nik (nik)
	) $charset_collate;"; 

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	dbDelta( $penduduk_atribut );

	
}
register_activation_hook( __FILE__, 'inputpenduduk_install' );


function inputpenduduk_uninstall() {
	global $wpdb;

	$table_name = $wpdb->prefix . "penduduk";

	$wpdb->query("DROP TABLE IF EXISTS $table_name");

}

function manage_data_penduduk(){
	add_menu_page( 'Manage Data Penduduk', 'Manage Data Penduduk', 'manage_options', 'manage-data-penduduk', 'manage_data_penduduk_func' );
}

function manage_data_penduduk_func(){
	global $wpdb;
	include_once("view/listpenduduk.php");
}