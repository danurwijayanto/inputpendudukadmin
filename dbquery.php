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
	// $headers = array('Content-Type: text/html; charset=UTF-8');
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From:inputdata@pasopati.org' . "\r\n"; // Sender's Email
	$sent = wp_mail( "mobinity.fx@gmail.com", "Laporan Daftar List Penduduk", $content, $headers);
	if($sent) {
		echo "Success";	
	}//message sent!
	else  {
		echo "Fail";
	}//message wasn't sent
	
	wp_redirect(  admin_url( "admin.php?page=manage-data-penduduk" ) );
	exit;
}
add_action( 'admin_post_send_email_report', 'send_email_report_func' );



?>