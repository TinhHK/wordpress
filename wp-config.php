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
define( 'DB_NAME', 'theme_db' );

/** MySQL database username */
define( 'DB_USER', 'mrktinh' );

/** MySQL database password */
define( 'DB_PASSWORD', 'tinh@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define('AUTH_KEY',         '?Fzc0vTS~>->B)3|Ec|RDR,fQ}8pIbnsADMpej,*Y.<O^]-C .8=]itbW*RAR$?M');
define('SECURE_AUTH_KEY',  'H&)1U>A%e}^~i!t&Qv2eHZ~?|,-t[AKa%X>=8bz#t-#g,.LuNQGdP?^~`_-E$WS-');
define('LOGGED_IN_KEY',    'g d _?rcI!j)!`T|I&s ~}9W zCGT_$xOYwIu6^!+{SaLbl-Z9tl32pWdZz++9I{');
define('NONCE_KEY',        '*AkZERaPq*3mgb)un06J?G?l6>Zz0>8R63pe[}+Z&Qiu>^Ap3v%&--:j`kT|||Y:');
define('AUTH_SALT',        ' Ua;IPsl P|n-@/*;dLwzV],fVm&xAoj!dvc[mN# v-{LJ9b=~/W [-J^M?$O[6W');
define('SECURE_AUTH_SALT', '4)fvW1<0[_NtPUKpjwD&`xbiQ[VxV+TDof^qS;sP?z0L=;*XedUF[564j*3/[TaZ');
define('LOGGED_IN_SALT',   'Ib?(s;I1Dx^6KJ.{i~QK=dTgIid[~*8_p+ZAb1#jp}85j@;9N}drkn<iF01u{}0Z');
define('NONCE_SALT',       'LR>Kr_x{jiuUU]e9tTRNX+!5,E-b$PtTWdytAC lq>T|#4 po(%x86ibSN7(g#[S');

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
define( 'WP_DEBUG', false );
require_once ('new-config.php');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
