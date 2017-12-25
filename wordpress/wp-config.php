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
define('DB_NAME', 'wp_ascend');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost:3308');

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
define('AUTH_KEY',         'xE=: DdDsp0J?d>evu hRGH(pEGZU(%G(O~pblnc6Q%{%j~{6 BqT0&vl8]<e,mK');
define('SECURE_AUTH_KEY',  'fs`Yn!vIBfLW*`%:~KL$UE]0A<BWqysm}]@|$9Z(k9Vw1f&N&i^de9myR8T1&|lF');
define('LOGGED_IN_KEY',    'fc#!pn+Us>h32p$]FKI$P2S9S^#:+;y+zrMf|OA^BT_+XU1ML#Q=5-F6lm>mlga6');
define('NONCE_KEY',        '}SdUC${0hb]AT(mu]Jc>qqiO cCsTu/a(V.lsq.DcPpK]9>$BS,B6qN%cSP/5Rq#');
define('AUTH_SALT',        '8+ +?kw`xU9I4]Xx4,xz7;AU3yS31*|Q*Qgx4MW7?6Qlz(858IWf(rfl?2?}oqYO');
define('SECURE_AUTH_SALT', 'h1YS77l%[/Iezf^P(XnyhEN*)^wpQ}w7Wnmk&4hr-6`46B*jhM:!i`dGF65>su&~');
define('LOGGED_IN_SALT',   ' ohMDg`IJ-V.D+[~oZ Q6,7[|yf4 HFj#{y{gOf+xW)18CS(Gz#p>9 5Am?x@P&I');
define('NONCE_SALT',       'ut.{z&&>+} ZY<-dd#RqRE0f7X*3FF4+,,sW,U#!?PCw.0(*lyhQWFI2A~u%tt$6');

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
/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'ascendinternational.com.au');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */
define('COOKIE_DOMAIN', 'ascendinternational.com.au' );
#define('COOKIE_DOMAIN', '.ascend.com');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
