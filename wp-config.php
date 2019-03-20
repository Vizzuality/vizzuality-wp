<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/dh_wspvri/vizzuality.com/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'vizzuality_com_2');

/** MySQL database username */
define('DB_USER', 'vizzualitycom2');

/** MySQL database password */
define('DB_PASSWORD', 'aRS62b9Z');

/** MySQL hostname */
define('DB_HOST', 'mysql.vizzuality.com'); 
/*define('DB_HOST', 'mysql.vizzuality.dreamhosters.com');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Cga78;)Af|qsgt_@Nh5`fxsI~%Yx@6dBc3&vT7n/t;oJw9_#@`WoGRd*|NeO?2$R');
define('SECURE_AUTH_KEY',  '#cs3@qb5411`o62kJg*56gil;!t2_4dQC"VCqRTx0e;#G~_aHWB:u!x5ml8/JSxt');
define('LOGGED_IN_KEY',    '("62wQ&/v%)p(YhGjF+q4eUl@*xex35g!R0^FMo|4#Zg"vtRfB0wEJ_avk^eyW92');
define('NONCE_KEY',        'qrXvui;Lnz0;%d3$R4aXPzR6qC$mX1QNGm&?Ml_eL("m)@PfO5_j@Mu&^vnMyW?t');
define('AUTH_SALT',        'BNaTC:;D8Shk|:pMf_)3%q~dLJLhoGc|El%|P~dW(qkfTUvQ_D:!dLZ)t$C@P4`V');
define('SECURE_AUTH_SALT', 'M74:FKxh(VfoUjL"k!SqPOCYp7nh?Ka3nr1R*Nz9DI3?uBN@2e"Jl6E7c+$CgmA`');
define('LOGGED_IN_SALT',   'FuORdM#_gBz2/2XS9eWhf!@xF;zFa?o*JC~?(g(mcd+!7UB&cJQ9MtQEHpe6:9^m');
define('NONCE_SALT',       'R7eFlqFVTURt9RQ^IKzbt0A3d5M!OenUurDYDZEXTdpRwM/?U!Qt0MffCi4O&|MI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

