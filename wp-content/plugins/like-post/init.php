<?php

global $jal_db_version;
$jal_db_version = '1.0';

	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'favorite';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE  $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_id int NOT NULL,
		post_id int NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
