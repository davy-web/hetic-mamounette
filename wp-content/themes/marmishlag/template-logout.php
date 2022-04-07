<?php
/**
 * Template Name: Logout
 * Template Post Type: page
 */
    if (is_user_logged_in()) {
        wp_destroy_current_session();
        wp_clear_auth_cookie();
        wp_set_current_user( 0 );
    }
    wp_redirect(home_url());
    exit();
?>