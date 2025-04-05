<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'NguyenDuyHiep' );

/** Database username */
define( 'DB_USER', 'NguyenDuyHiep' );

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
define( 'AUTH_KEY',         'r|ZRT*P_XvRG-{1SeyBOO96;8,~@2Q{HaD]:T#<?m)^2v$u!M$_H+U@AxA#gTB4$' );
define( 'SECURE_AUTH_KEY',  'QP~ ENZ#1#$J0WLw*#jk%.^HX!mftj1q*edT~j9QCRK0^5/H]j3a}&zJ]KRG !M/' );
define( 'LOGGED_IN_KEY',    '}XwC%9G f}2S>Qw+/pD[hO+(x,U`FC`Q I p:`mYw=3n7~m:{`D6Qb-~{O:3Ee:y' );
define( 'NONCE_KEY',        'fEezd.SWQr,j,_HjL%_}$M3 8*%@(@9`ZOTjc%~45J+RQ`+B,]_@1GEv=t8Dy? ?' );
define( 'AUTH_SALT',        'C[Hzd1#L`&H|[Z*xI:.m2,;EZJy.[b?a+!LT=y8]MtF:hId[PLo:io *8L%/ngnj' );
define( 'SECURE_AUTH_SALT', 'p#eJY>Qt$M@P=aJ_u=!@=1oHqpxmDv M9Hg1V]S$bII&H-lD9F?,Q`}?l_^LG1`:' );
define( 'LOGGED_IN_SALT',   '7g2-UN*)+z[V?&]8-yuLF{ulb?{[*nH71ReJ~aCgqJCPB^<Tb0?BtS.zKMYM)b^#' );
define( 'NONCE_SALT',       'I6^0q weng&R)2wT_Q;{ Lkids*}=Cmp/Q2unp@sKT/muDHD4l(Z;V~M6j7T>C&)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_NguyenDuyHiep';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
