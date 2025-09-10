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
define( 'DB_NAME', 'wordpressdb' );

/** Database username */
define( 'DB_USER', 'Raki@1234' );

/** Database password */
define( 'DB_PASSWORD', 'Raki@1234567890' );

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
define( 'AUTH_KEY',         ';:;e{-#IX`6Zz{s)9.zRj^jd<:8J`hF5|febS.z#B|fG%G&d^l;?k;EY,5CVHw@!' );
define( 'SECURE_AUTH_KEY',  '[1FV&Lw>JS#rL.p_=-X(ZlfI}061=tIi7D3T.6cXyLfj#h4u;#LdH7d]tb8/#-Ea' );
define( 'LOGGED_IN_KEY',    '!dCN+Dq]noG^w;z#19GYpqjx*7ui3DlBSEj9%YktJ5M/<OGq_=+o%`~Qr$]9RY;0' );
define( 'NONCE_KEY',        'bm[TeLh3[ZG1<s18Ai++zmc5<`%)H)<{JNhe[Kn8}FUHL9EYbkskj%GEXm,.2csH' );
define( 'AUTH_SALT',        'VJAiggC#{X/Zs+6wH[QbBwQypE[An1Y8k}1pd.btS*t_m,nQ~ob@5.gr^4[_kMkL' );
define( 'SECURE_AUTH_SALT', 'SHMO<=%eDx1X4|u_boQ?vC`m1Uj-FhqFWAFrsg8f|_%J([3o,ujxkwCXxQ-,LtYg' );
define( 'LOGGED_IN_SALT',   'rX|4-sAJ|v8Qq-I6p7r7yl~TH05QYd3<q&,3A@k%!P_aqz}uAE%2Dq#wUMscf.Lb' );
define( 'NONCE_SALT',       '@C$?TfSZEr5X ^Kk1q}4oPFmEF|/tR3`m71R(V1?D`0e841tE>U4z%%cv,F/2$|l' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
