<?php
/**
 * Plugin Name: Gestion Recettes Hetic
 * Author: Davy CHEN
 * Description: Gestion simple avec shortcode : [gestionrecetteshetic post_type="recette" text_submit="Ajouter" render="form"]
 * Author URI: https://davy-chen.fr
 */

function create_post_type_recette() {
    $labels = [
        'name' => 'Recettes',
        'singular_name' => 'Recettes',
        'menu_name' => 'Recettes',
        'all_items' => 'All Recettes',
        'view_item' => 'See all Recette',
        'add_new_item' => 'Add a Recette',
        'add_new' => 'Add',
        'edit_item' => 'Edit the Recette',
        'update_item' => 'Modify the Recette',
        'search_items' => 'Search a Recette',
        'not_found' => 'Non trouvée',
        'not_found_in_trash' => 'Non trouvée dans la corbeille'
    ];
    $args = [
        'label' => 'Recettes',
        'labels' => $labels,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes'),
        'taxonomies' => array('category', 'type_recette'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => esc_html__('recette'))
    ];
    register_post_type('recette', $args);
	add_theme_support( 'post-thumbnails' );
}

function create_taxonomy_recette() {
	$labels_origin = array(
		'name' => 'Origine',
		'new_item_name' => 'Nouvelle Origine',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Origines'),
	);
	$args_origin = array( 
		'labels' => $labels_origin,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);
	register_taxonomy('origin', 'recette', $args_origin);

	$labels_level = array(
		'name' => 'Niveau de difficulté',
		'new_item_name' => 'Nouveau niveau de difficulté',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Niveaux de difficulté'),
	);
	$args_level = array( 
		'labels' => $labels_level,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);
	register_taxonomy('level', 'recette', $args_level);

	$labels_cost = array(
		'name' => 'Coût',
		'new_item_name' => 'Nouveau coût',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Coûts'),
	);
	$args_cost = array( 
		'labels' => $labels_cost,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);
	register_taxonomy('cost', 'recette', $args_cost);

	$labels_setup_time = array(
		'name' => 'Temps de préparation',
		'new_item_name' => 'Nouveau temps de préparation',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Temps de préparation'),
	);
	$args_setup_time = array( 
		'labels' => $labels_setup_time,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);
	register_taxonomy('setup_time', 'recette', $args_setup_time);
}

function function_admin_post_add_recettes() {
	status_header(200);
	$notif = "";

	$user_id = get_current_user_id();
	
	if ($user_id > 0 && isset($_POST['ajouter'])) {
			
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tax_origin']) && !empty($_POST['tax_level']) && !empty($_POST['tax_cost']) && !empty($_POST['tax_setup_time'])) {
            wp_insert_post([
                'post_title' => $_POST['title'],
                'post_content' => $_POST['content'],
                'post_type' => 'recette',
                'post_status' => 'pending',
                'post_author' => $user_id,
                'comment_status' => 'closed',
                'tax_input' => array(
                    'origin' => array($_POST['tax_origin']),
                    'level' => array($_POST['tax_level']),
                    'cost' => array($_POST['tax_cost']),
                    'setup_time' => array($_POST['tax_setup_time']),
                )
            ]);
			
			$recent_posts = wp_get_recent_posts(array('post_type'=>'recette'));

			if (!empty($recent_posts[0]['ID']) && wp_verify_nonce($_POST['image_upload_nonce'], 'image_upload')) {
				$attachment_id = media_handle_upload('image_upload', $recent_posts[0]['ID']);
		
				if (is_wp_error($attachment_id)) {
					$notif_upload = "error";
				}
				else {
					set_post_thumbnail($recent_posts[0]['ID'], $attachment_id);
					$notif_upload = $attachment_id;
				}
			}
			else {
				$notif_upload = "no_nonce";
			}
            $notif = "1";
        }
        else {
            $notif = "0";
        }
    }
	if (isset($_GET['url'])) {
		header("Location:" . get_site_url() . "/" . $_GET['url'] . "?notif=" . $notif);
	}
	else {
		header("Location:" . get_site_url() . "?notif=" . $notif);
	}
}

function shortcode_gestion_recettes_hetic($atts) {
    require_once 'GestionRecettesHetic.php';
    $GestionRecettesHetic = new GestionRecettesHetic($atts);
    return $GestionRecettesHetic->render();
}

add_action('init', 'create_post_type_recette');
add_action('init', 'create_taxonomy_recette');
add_action('admin_post_add_recettes', 'function_admin_post_add_recettes');
add_shortcode('gestionrecetteshetic', 'shortcode_gestion_recettes_hetic');

?>