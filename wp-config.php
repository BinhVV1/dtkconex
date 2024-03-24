<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dtkconex' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4J1mWCwG?4c8}ZYYRzDWB[4`[css>+u(=:2,^x8Fg<3T!Z%S|}1x3+ux*]&Aw1#P' );
define( 'SECURE_AUTH_KEY',  'f<9tSv+1UEp.#Z^?U9oU9 <Yh1P`aOHtR1vHn?:|m)HDTUPxP#[w5$k$6*5|<E %' );
define( 'LOGGED_IN_KEY',    'ewpx#Gn98NqC3JG-&Xu4GjllS_acVm%u)ck1.)0K$|PfVz!7w!7:Oom[WB#OS3HH' );
define( 'NONCE_KEY',        ')rb=XC52Xg<U=ck$bYhgC=G1.2i|I+iW3IFO)[gDMYc7B08$(wG:m=9/T[;I${?-' );
define( 'AUTH_SALT',        '1J,aXAA }r44]LH.>( yrv**d6 k$CN~lrT*Vibn$j,SI@H(M|jBKp_/E4hy.Bh,' );
define( 'SECURE_AUTH_SALT', 'zDnPN?LzxA;U@90Sem@cT2v5ObjWN/`r}B<U9Kx&9A$F#F7f#lzXZn`ywcevdJ[!' );
define( 'LOGGED_IN_SALT',   'w%<3L,iILbBK$.^IU)~<q@,r_5Xr}s6bSn--J0otEry?]!sBOIC@GmlyCS[X/4Dy' );
define( 'NONCE_SALT',       ' -N4R(k4yR%0Tsinm)t=zoM}HUiOYhm]y9n[eA%HEC#Po4D8~CG+Dg#Ft[3F2`Xy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define("FTP_HOST", "localhost");

define("FTP_USER", "ftp-user");

define("FTP_PASS", "ftp-password");

define('FS_METHOD', 'direct');




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
