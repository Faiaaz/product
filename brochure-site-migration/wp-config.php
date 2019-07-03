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
define( 'DB_NAME', 'brochure-site-migration' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'yA4c]n,-k~9+ {~ ZIKN4QI*-I0R$]B^.rUzMj*&M2fX})3=}u<XKu$%.O+YlwLU');
define('SECURE_AUTH_KEY',  'b?4iKQIMu68e~&+F5Nf1o`Wno9M_0(Vb4sz#V=!o%8e#3fUvtfM]L]||N$D=[|o>');
define('LOGGED_IN_KEY',    'm$mShVF~IJP-|Mt<BqHJ`XwvB/zgcS[L,6%m{2UaR3XNWDx=6!A+=<%|L*xbl`^{');
define('NONCE_KEY',        ']Oq>~udq~5@-qpZK`KKEU98gc.+b(Dg&>|u>6(x@w,DvSb6nDs-).1[2g-u7#fpL');
define('AUTH_SALT',        '+T*j-DjByhKi-hNFms1)g~B3Z5z&?YqT!W94(*O2)(cw|$U^[V~:~0jQJW_e,zTh');
define('SECURE_AUTH_SALT', '%0i{+jL2APc6~UN]qb *gC*(9Em!_+nf ykTl1KdxRdL@S01sA#-K92R,_db|@_W');
define('LOGGED_IN_SALT',   '5)FgHjT-hn^{:yH8B1*yu.NTDDt(Tzs=`HR9g<ZB$t/W~$hlp((&g2CnZOz`fp?9');
define('NONCE_SALT',       'qQOLVXkwdJs/}b{Q}$P:jU4:DP9spYghF?=DG+A`qTg])5=Y5;+_q cf.x<])^;K');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
