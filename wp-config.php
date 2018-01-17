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
define('DB_NAME', 'enggsol');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '*Z>jYiZmW]NRc81@z|.A=7qDtuWC}MNF^@_j4>d)!cGWXXp/9U&*p9M0@BtG^Ul3');
define('SECURE_AUTH_KEY',  'm(}S;A(r]tdCM<5F}!k?Ym;nv/`.DOR6KL`BMc/ (PISh{axv%u7uNvFo//;FTf|');
define('LOGGED_IN_KEY',    '0R-*rOlh8+6HB9CWS70a.yU2J0(vf;T=WTz-%UxvzV`^iYHYrg} H,9CD5zW{mb+');
define('NONCE_KEY',        'v/PC?ff6FZ%bmCyo.O{KHz_gmIS`t3ri =p0,XyFfpYW(^i(I4KkMXGX(4*{1wNQ');
define('AUTH_SALT',        '*0H7w@r;}yi#&0:h?nLsyAgyL)&87.xY/tET^E.xSGKswC#|]j;_k`P!#5ZB2zXS');
define('SECURE_AUTH_SALT', 'T5Wt}LxE&3gW-87v;^2!oX9GnOXIxwRh6k0C~g1AGp|Z7&k@?X5<sf9ml;56R+x)');
define('LOGGED_IN_SALT',   'vSy-3@*YERVW5=mse$f~wJ^7y]u_3*NXS!Bb=mn.]a:QT#X@&OP/ ((5,5QR>;p$');
define('NONCE_SALT',       'bTl+F,bM*~IqJ|k82BKW7vf,)Ij~>e@Q)n{e/sv982I*^;hIi+9A0Zco~rP,6_q,');

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

define('FTP_HOST', 'localhost');
define('FTP_USER', 'daemon');
define('FTP_PASS', 'xampp');




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
