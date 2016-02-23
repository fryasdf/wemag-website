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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'db614909868');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'dbo614909868');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'someStupidPassword');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}&6Eh72;jtmFyb>yUx)oe*07nAHkk=0N^95cBxcS61+oE{H&ICj% Yn%Jm/X(HJw');
define('SECURE_AUTH_KEY',  'EP59wUTl,aJ]#G9qicd=SN!7L(@+iW0hLl9$N4J2;g,g:fOp+v&+]+lFUrbH[`6?');
define('LOGGED_IN_KEY',    '0/F l+6Y|@i}%e d4lrVB&KVHpGgc1$_NuKO)CY}BLHVuym<-~V26*]HV*kn;Xuo');
define('NONCE_KEY',        'vC~**RIK$q;x#H}8[Gw5@y-S*KUe2~~?H5ex)V:r/|GC-r`UOl,6[Ls3!``+gl3`');
define('AUTH_SALT',        'enN=qj}<pHI;DN`o+/s+|Rp_GQvHL7<>Vk26naCSMD@M(ZcjM<^:-Seph7ba20.g');
define('SECURE_AUTH_SALT', '-eRKOHcKQfY=:,~!p:{zU^g<8J5{xDvor3b}8b)@qG%Geby4VV0mHd#f[LG_q:4e');
define('LOGGED_IN_SALT',   '6K;00LZW]r$O@p(;R(1ES2m<JP7wAdR_4X-WGX>pJ!j3g)kU-2Up(A$z@H^8[.pa');
define('NONCE_SALT',       'IuZrLGwJ!p%%Isvtc1]rK>9P f4B4OTeq!)oGf~~d(=9+idQ/gE7`R1M .*7r.=j');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wemag_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'de_DE');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
