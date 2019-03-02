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
define('DB_NAME', 'influencemonk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1:8889');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`XwTb*1|Zm<:LO?zi8O%^!g]XN}ceRY}?+72uG%G)Gk].oBE,l ztdAC,#Fjz7#b');
define('SECURE_AUTH_KEY',  'Py2,R8KL7pN8]@uL7V;`[]L^%~>io_>VHChww!{g~!?F^H|3 v]S%gMlfLSE3]K{');
define('LOGGED_IN_KEY',    'C`cujr.PPE>(3hKi#d}~CB_}9Y3~LN:*g.Y[0Hix}j^v$ycn@Y+j2Rse{;+2n/j!');
define('NONCE_KEY',        'Jh!;mfC?4~+$n_qCF/nAD.;EKmag-}**E2#.!n:3qObJuj#/:D#%#wu*YJ>?$~iE');
define('AUTH_SALT',        '`T* wU *Vhuy7~[8q~j1);-Va)4!1}c%53Lcu2 nB?OEV]f~:Z@HuMmrt{~K<W<u');
define('SECURE_AUTH_SALT', 'Ck71_l7GHD[%_(TJTNwqD gYv_P#/+Bz@|n>I]81DR>)bzP?<yyGNy3L|15Jc}jF');
define('LOGGED_IN_SALT',   '~7BOQW6mYamv-FMncsXoSui&:2_SBwE]7i;fy2%sL_=aeH&P[N{s|[51r;1KQe#G');
define('NONCE_SALT',       'H 4*:;ZV%DNwF3TsysGG,XKw.:^2l2^#MuH6$Bi`f?%P p#p%50>-r.K^Wpt?P60');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
