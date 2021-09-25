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
define('DB_NAME', 'wandroid');

/** MySQL database username */
define('DB_USER', 'wandroid');

/** MySQL database password */
define('DB_PASSWORD', 'wandroid');

/** MySQL hostname */
define('DB_HOST', 'graphwebappcom.ipagemysql.com');

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
define('AUTH_KEY',         '3e1/8;IPwLKWX_wv&@,:fR(o8&Wh=17JOPWr2_2i2I<e8AGKb[PMS8sk$+nX1$s4');
define('SECURE_AUTH_KEY',  'GephL)*cz6$E&E o9]j;AM3Kz?w_dudE`2IL)zIWtSkrFi[RFnA4G/DK]8!>*/%F');
define('LOGGED_IN_KEY',    'q5j=1Jq4R=Yp3@!f4J;1T0t2-J61/b8ccE-~uN4Qgks2Z&.m!fsV]z@Co@7WpesO');
define('NONCE_KEY',        'z.9Mc;0PeaMNBW+w-Ohdeo@`LhD$cq#@D6KX%35y;u][I1Z/JjH$fw^{VVNqe*X:');
define('AUTH_SALT',        'Ykac1)Kj(n)/zBe`[(iR2X?:ZMms+aKeAu,?]Ym=?%L?zyX[x+wv!*6nD;J$.n/}');
define('SECURE_AUTH_SALT', 'OOSH^?(t~dOjEcmk5Pg1~{)Ts@L!}zzg!!~WcDPq4FSW36}CLCh:!5QRRG7:QgPu');
define('LOGGED_IN_SALT',   'np|Av3py)dy }$ <(%cr2^ i?u8o/DZEh)Afl>q:t~Cvn^?WmYR5eH!08;eN|<Ey');
define('NONCE_SALT',       ':OW^w]Qf*Z/]_: )i33y,Dcd4;`=$/k!@3eom{a+!`$,pD[l+R81[t=Y3qwtAzXM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wa_';

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
