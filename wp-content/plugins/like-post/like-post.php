<?php

/**
 * Plugin Name: Like Post
 * Author: Ricky
 * Description: Mettre en favorite des posts
 */

define('LIKE_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

function like_post_activation() {
	require LIKE_PLUGIN_DIR_PATH . 'init.php';	
}
register_activation_hook( __FILE__, 'like_post_activation' );


function get_favorite_from_db(){ 
	global $wpdb;

	$table_name = $wpdb->prefix . 'favorite';
	$user_id = wp_get_current_user()->ID;
	if ($user_id < 0 ) {
		return 'error';
	} else {
		$favorite_data = $wpdb->get_results(
			$wpdb->prepare(" SELECT post_id FROM $table_name WHERE user_id = %d", $user_id, ARRAY_A)
		);
		return $favorite_data;
	}
}

// function save_in_session() {
// 	$res = get_favorite_from_db();
// 	if($res != "error"){
// 		var_dump($res);
// 	}
// }


function get_favorite_post() {
	$res = get_favorite_from_db();
	wp_send_json($res);
}

function add_remove_favorite_post() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'favorite';
	

	$user_id = wp_get_current_user()->ID;
	if(isset($_POST['do'], $_POST['postId']) && $user_id > 0) {
		$post_id = $_POST['postId'];
		$action = $_POST['do'];
		$check = $wpdb->get_results(
			$wpdb->prepare(" SELECT * FROM $table_name WHERE user_id = %d AND post_id = %s", $user_id, $post_id)
		);
		if($action == "remove" && count($check) > 0) {
			$res = $wpdb->query( 
				$wpdb->prepare( 
					"DELETE FROM $table_name WHERE user_id = %d AND post_id = %s",
					$user_id, $post_id
				)
			);
			echo $res;
		} 
		else if($action == "add" && count($check) == 0) {
			$res = $wpdb->query( 
				$wpdb->prepare( 
					"INSERT INTO $table_name (user_id, post_id) VALUES ($user_id, $post_id)"
				)
			);
			echo $res;
		}
		else {
			echo "error";
		}
	
		
	} else {
		echo "error";
	}

}

add_action('get_favorite_test', 'get_favorite_from_db');
add_action('admin_post_get_favorite', 'get_favorite_post');
add_action('admin_post_add_remove_favorite', 'add_remove_favorite_post');
