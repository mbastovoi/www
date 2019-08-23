<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
if (file_exists(dirname(__FILE__). '/local.php')){
	//Local database settings
	define( 'DB_NAME', 'wordpress' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'test' );
	define( 'DB_HOST', 'localhost' );
} else {
	// Live database settings
	define( 'DB_NAME', 'mirceab7_cutestdata' );
	define( 'DB_USER', 'mirceab7_12' );
	define( 'DB_PASSWORD', 'test' );
	define( 'DB_HOST', 'localhost' );
}




/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Dy9*yXeDR^=a@ifW .oi_Q-}z0aE$#aV+fb<^pfcZ}VNmigJ+O.me=j.}rD_=+3J' );
define( 'SECURE_AUTH_KEY',  '|.zuoYyl-^a&u9_?1D4r,p-kzo&/g@7<#Su?6C8czTjGQ}7}Lb+UzD2bP(d1WnT,' );
define( 'LOGGED_IN_KEY',    'mZ5E$sHhZEF`C+GiCLh()w]!tww2-LDz*a[G~cYA0f3rY>~cs r# +P<Oq/!;_-p' );
define( 'NONCE_KEY',        'f3^%>x1L#5MRou&F s~-1(Z/=<hEqz(LK4 @axrdb_~oSB2>jMURP5~B-mPb([c$' );
define( 'AUTH_SALT',        '$pv<w8&u`.;RdGe0RuVJPl}PjNlIUUeqkjH4IVbI}Z(/h#@XbHLhigj^XysolJ<_' );
define( 'SECURE_AUTH_SALT', '1y.L&_#RJWn8vG4!urm|KUpQO^e[BJQ8eT@}^v^CA#ML`P?_z<G#|wLiZjFCm)^I' );
define( 'LOGGED_IN_SALT',   'tLRcH!z>/^3RrYiMwB947.(FgaQv2QH9*Kpmq2+vX@Apw!L_o=bt.voR$<,V8/~^' );
define( 'NONCE_SALT',       '!qQ~;~4.HC|X&=tY2,En|nnhPsoY6[g>if,VOo[EMPfI[{%HU}w;=1x>lCc.W(yk' );



/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'all_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
