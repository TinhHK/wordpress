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
define( 'AUTH_KEY',         'IqwR1MgzhIr2?bXq]PFoF)A6Uy3@/2}spNmM]rX5T99nQH<iV~w?}<?$A?5ZU=-8' );
define( 'SECURE_AUTH_KEY',  '9Lhs}H)[ANqXK!)T7f^jJ<Y/NIYFED4I:kRxFw;^=3 )sU ~f/3&B;UQ<hdH5pW`' );
define( 'LOGGED_IN_KEY',    'ql-MY`K#jt-KJ0u+vGUK| rf|i2UM5a8F;P0@UHuVC-MEpC7Z9fMR/%I=GNyBnf*' );
define( 'NONCE_KEY',        '2r>0_A8t/uh}drclZ8fBO5ksaVi^EcU#0wrSSf(/DRe4LG{aSs3w;W`hf7r>.Hl&' );
define( 'AUTH_SALT',        '86Wes}R=e6>,ct5)|P{n^[u?9,RpX5jW=-+6U-f,v|VL2M} -o5Eo-;1S5duQr/R' );
define( 'SECURE_AUTH_SALT', 'm6]u+<F{a3%)_!k+~8`4byp|icEtF}_BCA,l%2Fk`e?BO)c%2|2, ;-+e?D,l1J/' );
define( 'LOGGED_IN_SALT',   'Fa SOX_KTW.9L5/0d|J*I}$6XZ1_7}{NIt;wy}7HY}wx?X<]LiD81cx$)2A{/|b*' );
define( 'NONCE_SALT',       '{fA5<#wR?GxgU=u#NLwjX<erh<4CFBc:rW4-aVQD5Ap,xK)j(BeAC}Y%z3F9L:M9' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
