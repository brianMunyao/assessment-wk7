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
define( 'DB_NAME', 'assessment-wk7' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'hITT1n>8X9)R 7s]G2Rm$5WxPsJI~/#VSIg;nn3Aq4[y2MB=i/B_C<hF9fJfX>gu' );
define( 'SECURE_AUTH_KEY',  'f{gr]C4FLro^n+j6]oxZEuSndt1k-1E?S7_]Z~@ZPkoC]hg+6a?Z;:DW9V6j7Wd]' );
define( 'LOGGED_IN_KEY',    '>sDyJpbLhua7]Faot]Rc,Vf@nlGp5/u}Yiui>@= p!d}#-*$Mg{ohu]H?{V6cw0{' );
define( 'NONCE_KEY',        'Db Od8ev.wwBhQ>~V,AR-+UC^qK+cjFq{Fw!t2pL=;f(]mzfIe5$l76CxoC+S3=Y' );
define( 'AUTH_SALT',        '389?[(^p.z@ tofH6zqD5nM)G)4^r[(PE{E6gN/w.GY8>n@uUY%l[ndsnIdoW#v>' );
define( 'SECURE_AUTH_SALT', 'i8D@_m7WCo4ML /K+FQ+abVpjpGjw?XQmo iGdWd*:+:iBd,W%a^GiK3?v7[M&/1' );
define( 'LOGGED_IN_SALT',   'iQ#l)T-f;=+6<2,4,`V<ij!FMnl`%yt| %ptvdLNbQ0OpC7&Huel1/ o2u6)=f&S' );
define( 'NONCE_SALT',       'EF5I1w{%s49xUbt3YvvK^IOvY(^>:LxaSuKsPC~NGgA0j-I3LnFwS;d,a{Zbw>WE' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
