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
define('DB_NAME', 'suspilni_cmplus');

/** MySQL database username */
define('DB_USER', 'suspilni_cmplus');

/** MySQL database password */
define('DB_PASSWORD', 'xkysmbcn');

/** MySQL hostname */
define('DB_HOST', 'suspilni.mysql.tools');

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
define('AUTH_KEY',         'dIC+qPZG:aUj)C6Q<odwJTi&}JSC_%m).]f+D:otS]PE5}pKu.aB$hGiwd74PI-D');
define('SECURE_AUTH_KEY',  'L%+4z jidliVGVK3Nt7Ez/Y^o%@s#3b.i(G=pTu)QI:L[kB9<$HDjc#_fX4 Hp`a');
define('LOGGED_IN_KEY',    '#y#_H7_syTz}XOfnL`d8HC}q>Dc084ynl,^dEvz%:f`&v/y1GP%[):_@Vf32{IFl');
define('NONCE_KEY',        '<gq:sk>fLsnNk&ANxV;486%x3hGD};eb#vN0Y-V#zPajmyS$6J6t6[c)Wt40X&7U');
define('AUTH_SALT',        'Nn+)=,wG}egP?Ixi~@m@&w}QfU8O;5VNkg]kTnJi^LY]`qm.2sl^,?g&+vcgatwg');
define('SECURE_AUTH_SALT', 'J[M6}@J}IZ7K)yG/CqX>l=wj8]A9T{S3V]3PShnEHJ!T}nhxE#|B2=-M(NU^v:KA');
define('LOGGED_IN_SALT',   'i}^bO2?9YZIA/:h_^$AL_.tg?tC(OzHh7z;kwOTH*RoU;@Qv&#VfW~EX?muXm<Ug');
define('NONCE_SALT',       'qfEap0wxe9}95p*(8h.}5V]j:hi5AbJ85f@`Xv]w|`D+-yBow5nLvEEQI>=ARO{S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpcmp_';

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
// define ('WPLANG', '');
define( 'WP_MEMORY_LIMIT', '128MB' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
