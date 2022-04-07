<?php
/**
 * Template Name: Signup
 * Template Post Type: page
 */

$userLogin = $_POST['user_login'];
$userEmail = $_POST['user_email'];
$userPass = $_POST['user_pass'];

if(!empty($userLogin) ){
    wp_redirect(home_url() . "/login?error=missing username");
}

if(!empty($userEmail) ){
    wp_redirect(home_url() . "/login?error=missing email");
}

if(!empty($userPass) ){
    wp_redirect(home_url() . "/login?error=missing password");
}

$user_login = wp_slash( $userLogin );
$user_email = wp_slash( $userEmail );
$user_pass  = $userPass;

$userdata = compact( 'user_login', 'user_email', 'user_pass' );
$result = wp_insert_user( $userdata );

if(is_int($result)) {
    $user = wp_authenticate($user_login, $user_pass);

    if ( !is_wp_error($user) ) {
        wp_clear_auth_cookie();
        wp_set_current_user ( $user->ID ); // Set the current user detail
        wp_set_auth_cookie  ( $user->ID ); // Set auth details in cookie
        wp_redirect(home_url());
    } else {
        wp_redirect(home_url() . "/login?error=unknown error");
    }

} else {
    wp_redirect(home_url() . "/login?error=account already exist");
}
?>