<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

require_once dirname(__FILE__) . '/../etc/php/lib/CloudezSettings.php';

define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', CEZ_DBNAME);

/** MySQL database username */
define('DB_USER', CEZ_DBUSER);

/** MySQL database password */
define('DB_PASSWORD', CEZ_DBPASS);

/** MySQL hostname */
define('DB_HOST', CEZ_DBHOST);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', CEZ_DBCHARSET);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', ini_get('memory_limit'));


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B #YuAJ9e4Rre+,uZ#48!.VX%+P$:e*:pcA6G@DAQQt@t|k%trUUSg8[{|rH');
define('SECURE_AUTH_KEY',  'e[EBM9FSs#k}_udbY_!0F;%6uy5`XrU,6qz8b>{,//v|4@:1d+@U2|VCgLmL');
define('LOGGED_IN_KEY',    '.S|8Y}9G>)4#Z!Ln7>CFcWANx2FQ|Be5Cm.#[D7_wrHHsq)S@:N+sdNT7@ZB');
define('NONCE_KEY',        '1S$$/q>$7# g3V;B}X/NJa!+K..:fz+9{3G>Mtgk@`HK(]2$YPN4|uTng/tQ');
define('AUTH_SALT',        ':x:Nu,Nuy[:;{tnY7u<VdDKjU>4{f0ptG0ndD%Z+<wGC6r:`wacMEe*1GNHx');
define('SECURE_AUTH_SALT', '|p5u8H|3.$$3gz|NuYv# THnd)@v3WD%Gp/sW(fSbUv*hc:+$GQ0PL5XQgC<');
define('LOGGED_IN_SALT',   '`Zhz4ez6C Vc6Qh^6:w}Wda(*b#]zE42ZPK@1L*7|YB*6UDj93}UwsE3CBwW');
define('NONCE_SALT',       'b%kccFCH>a7,Tp|;Et#ndxfpXz4 K(Dv@*)^5XynL Y_>0vZNW+>+H0K{nh4');

define('WP_SITEURL', isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'] : 'http://gearseo.com.br');
define('WP_HOME', isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'] : 'http://gearseo.com.br');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * security
 */
define('DISALLOW_FILE_EDIT', true);
define('CONCATENATE_SCRIPTS', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
