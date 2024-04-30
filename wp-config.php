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
define( 'DB_NAME', 'bmz' );

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
define( 'AUTH_KEY',         'EO&OdotrRP9@*SJl.Zwa7T0~Qz49Ruom~2dJ,]INu>qLX]%I*d$FP.z2`1g$W6t<' );
define( 'SECURE_AUTH_KEY',  'cb_kB$`)hr*o6O5g@k2!@X)2*GcrCza5%Z<xE!8j)jgXpya|K!~/sg77=7%r|M+y' );
define( 'LOGGED_IN_KEY',    'Yj,s^3DNP+uV~](OTR6cI,UIg.nw-^A;k*Af+m~%blf3#4k0,Cr_NWxBs2~HEr=*' );
define( 'NONCE_KEY',        'wbQ22 Hxl#b-,-sS+RHNQ*n]Pns}WxJmW=_!i7;Yf/sk{omf`W(Co!CL/.iFw6p|' );
define( 'AUTH_SALT',        ' .bzw;4+hj>+{_QY^zQA2w@Ex39p&qA>qUJeeR.MU>P-0!Gdk_x/zL+5dRFljl.t' );
define( 'SECURE_AUTH_SALT', 'p8A1qvSIo?&-Wy>c|ysK_#Q3wEv@k:5yB.V*Ax~he=y)wYU<ND@WUsGd?V_*`zbA' );
define( 'LOGGED_IN_SALT',   'B0R?0UyecS4&@#8)sU!T[1(Fro=TQ-$&Fo:)|e|W|)k$t-xw~U+^6`{>5VG0]Kj;' );
define( 'NONCE_SALT',       '8N&e<&[^INS746uNEg &TZX<exe/r=Y+wy7:vv1JxV3@mCN;R=z:jS|{&ega(!8>' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
