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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 's2govobandoph_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Obando.It!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%FatWmZh%}1,95zd<)H#kz~O1y|{aX#3a4/#_3`LoJ,-1DH<p _Re~ilVaF-rE8B' );
define( 'SECURE_AUTH_KEY',  '0t[VhGz?LR&5jX>0R=`GFNiIo6SI_aH6/m-7Akmy?;k7_1:z)~!2r~$J+, .s3Eu' );
define( 'LOGGED_IN_KEY',    'Hq6HvLz{DxB[onK&-fw6lN*%Wx%+UD37EsBp?T3y]AD+*GU@_wMn+>#/v3Zk1fs7' );
define( 'NONCE_KEY',        ')o5V7Lo|*TaAglw^^ ,X(Tn=B-$Hl&n1C8f97sE)/=-!LvdRJ;z}ha-#L?)oZxIm' );
define( 'AUTH_SALT',        '[2DU%Qd_n~5+bD}/,TDY>>,7]~r0)ZgI>mZh+b`FN>LgR/`wN<,(6)wSfGqy<Z2{' );
define( 'SECURE_AUTH_SALT', '_dc|n)pl:;kF+`i{p^x[49+o#2^E&;X,X:Yoo<3{Il=:uj`dx$`]f?-$nJseVc0r' );
define( 'LOGGED_IN_SALT',   '>[E;Ri5za]^-/q^j*kTgucY}[CqHy2}>Qd<NPy6[/jwbQr]<Zugz(dTwG?M,Rw6t' );
define( 'NONCE_SALT',       '>kA_ZXH!7t^dip&/o0mq82B6c0ZJ.YC}HKfT`{P/a03|;_s0}:,cte3H>9=bI=b&' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false	 );
define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
