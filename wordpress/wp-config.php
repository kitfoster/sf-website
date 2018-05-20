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
/** The name of the database for WordPress */
define('DB_NAME', 'startwordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'U~{F?GB7*71D(:73_iS#-S^q|-5sZx >LbG0~@<P1yjSNZWP-]HV,E-PK`/-?ViF');
define('SECURE_AUTH_KEY',  'opnI}uC)`?-|>_eZ[B_KKi P/-*j}cFs(s;1( =!Y`08~Ue0~~/CYD*m_he2#]qN');
define('LOGGED_IN_KEY',    '@Ci<bLgUG[3,* mC2 MNo7.obkrj%cy]hbP(5v@P&r9 Lcy{!,aYU?Y(GRL/MpYp');
define('NONCE_KEY',        '&?vxkm:Iz-M9r_<J#IcYA5QrCpq]BhY4-_:RP4TU_-*|ImcqUb.9|d~ZUbl!BQ+S');
define('AUTH_SALT',        '+t-/rBE929w3&n{,GHr@?k2y/WakF_XDH(rUmET |rF;/ |gFLHF$(=X^5!/VXb~');
define('SECURE_AUTH_SALT', 'h|]$6y<tQ|o_So1?V` xk#Y8W,@t%5a0~ZUT:6F(cS0%r]XTu,huPxYz-B~O[s)2');
define('LOGGED_IN_SALT',   '7.AtqTr_u4xE<f41;gQ3!_E5&Sqr6DMSPt:oF%DM7AeVn3=,_!=^|-un;-@xJb_c');
define('NONCE_SALT',       'r 1*_M{L7-DN@48w`kkC<qT=`2=PzgpRI@t[Od)tvh;dNxM,Eljx6.#PBQn1(&xY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'SF18_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
