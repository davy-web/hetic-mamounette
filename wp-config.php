<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'data' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'pass' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'wp_db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'L3+@Nb[{?yFEb9:fNbn}*+o5)PvOn@r4>7`gJ7wY]StYtDcerxrA ;0~#JVq<<{z' );
define( 'SECURE_AUTH_KEY',  '`I]3(pfZPQxq6]thcFOMKoku*F-Z.i%!p%A|!CxsJd>BhH:e-`683]R*tk={+LZ5' );
define( 'LOGGED_IN_KEY',    '_dxn-Z9Boe,V9DjnU&:~L~Cw[PE`-G`pFKA}u62EWaPov@P`4sf9oUuiqK-+x4F{' );
define( 'NONCE_KEY',        ':=^iEWWH%LUSAI?k=I!YmjA]o&d8y`401V%X47^gp?=d~,oQYQg*[8@@5=y|1M{#' );
define( 'AUTH_SALT',        '3&2$5&H41G4`|bh}{cor/B F?eX}~Yu;{Xl.5vyQ[U{Dm<1PphR/6}7iXGPlZ/BM' );
define( 'SECURE_AUTH_SALT', 'Q=eedTeJggyUCwMOQ-RzefIIe-<&blByKngo@?p~ju--ZU:m4Xd3sI.Qs$h/[5(]' );
define( 'LOGGED_IN_SALT',   '856]Zb#!@l6k%Km G/imbA<|Ig`!-C/Z_xjz4>;_:1HKK|l!([j9T4}8(Ar0p6fs' );
define( 'NONCE_SALT',       'O|sxQUw_Ib@g4u<-y*!OK/(D2)+Pzj?(=?5=%0)O.~>typkza6{d%nVr_dyS; 5C' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */

// define( 'WP_DEBUG', false );

// define('WP_DEBUG', true);
// define('WP_DEBUG_DISPLAY', true);

// https://www.wpbeginner.com/wp-tutorials/how-to-turn-off-php-errors-in-wordpress/
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
