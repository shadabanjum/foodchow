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
define('DB_NAME', 'foodchow');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'P1=R,@m!n 39+abgsOHqDe:dk`~]b&>}S!!D;^#.((?vvJ[@kZe)h(f]l|<x(T)m');
define('SECURE_AUTH_KEY',  ')NZ@V~3p/9g4Z6`d/q9Zpx0PPf#F/+Wp^ Rv;Cqu}(|Q;+]W./_HN^GE0a,;Nu]V');
define('LOGGED_IN_KEY',    '[6DwH~licyj_{~M<`,BYqJgB:gEIWw5L$ ph1t5Dk:yqgc1raPVAy((V,Gae7;6D');
define('NONCE_KEY',        'F[^~[2XfawPwMSJimqXM`q?I7F,Dg6t]Jd!)4y:i.eF$4!`[pa,m+sw}w|&Afo.H');
define('AUTH_SALT',        '=OfmYxB8,_o=*g%k3vuZG[)85jZ$AO=]^&O?,`]ktZPN6eI<s_Rz+,*Kx8-(=+>K');
define('SECURE_AUTH_SALT', '&WxUQ(XK^JrF&~UNfJbDGiX4()>I}gz/%lu+gdqR_.z;7<|:GMAc0>o!CozW?4^n');
define('LOGGED_IN_SALT',   '?DAs`%OOAQw?+X_0yedd~P+;P` X8rX&]B^$QJIWUwR#F+t>$Ef@|3IT#%%mvUN<');
define('NONCE_SALT',       '@Ucp=Gym:jT5WCw,PcRxIL65Ql//:wZ?^3,r*aO3h33DE)0%TXvoW-ai`vqD}.Om');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
