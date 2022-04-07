<?php
/**
 * Plugin Name: Inscription Hetic
 * Author: Davy CHEN
 * Description: Inscription simple avec shortcode : [inscriptionhetic role="editor" render="form" submit="S'inscrire"]
 * Author URI: https://davy-chen.fr
 */

add_shortcode('inscriptionhetic', 'inscription_hetic');

function inscription_hetic($atts) {
    require_once 'InscriptionHetic.php';
    $InscriptionHetic = new InscriptionHetic($atts);
    return $InscriptionHetic->render();
}
?>