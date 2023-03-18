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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bluestone98' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ',jK}iLW8R3;%8}7:vZ5]N/6rL}k$<OI9OK`0vnquqjwGPYu`a$$Z[uH0Qm@Az|}p' );
define( 'SECURE_AUTH_KEY',  'lK+p8*nqv(K<*zioroGJ^6h0BqNA}hKE^<<Na5<<=L!DaM!VKPdffF;>PGzZzujS' );
define( 'LOGGED_IN_KEY',    'wQE6Y:(v^>!ds>t*I?uA[ fK@?cR@%n^Q#( A8#_!s*ChiHEo_8{siARA5Ae>yq}' );
define( 'NONCE_KEY',        'US:s>d{.nIB*$Kfw@;oXOL]xXx}]nuW/Tg+^kzf#x60/[%,g4xDp=%P3nF#N.W0F' );
define( 'AUTH_SALT',        'jms1my3<^F!*!5:{uVlDB*gVnR8lYy904,rj?]r^Fe?wS_}$Hrv 1`K!jC72$(I]' );
define( 'SECURE_AUTH_SALT', 'eiJSJ>Mf Yd}us[euYUdb|SwnJpql}?&;+(8c&Xqx2Oll,iCCH~x@;dV^)&6cIg3' );
define( 'LOGGED_IN_SALT',   '+=>OZjnv+V;j$]mM.1rHR|!S+9>`ffXWFz2fSsp(:C?]LR`Ukc4A6o|+n/weK*fq' );
define( 'NONCE_SALT',       '-25vbd{82KC|1 SCcdF0BOn^M|a$37!oYSjr^aK*gfC[Qu3JF=T${4uHEps:Ct9r' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bl_wp';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
