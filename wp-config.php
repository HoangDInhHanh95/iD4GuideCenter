<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'id4guidecenter' );

/** Database username */
define( 'DB_USER', 'id4guidecenter' );

/** Database password */
define( 'DB_PASSWORD', 'id4guidecenter@2025' );

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
define( 'AUTH_KEY',         'vY1?y:w]P{8TIi~bt$hE@MeJFrpIt[UB~5@_hA!H*EX]6:LfwBnZN.rL&`r^ocZ6' );
define( 'SECURE_AUTH_KEY',  'W v-o?}6UI>u;I[<##3Adf[&;<1tK-WX7>sFb_n!IZ=~]0*uu^L4XLI22W%D6y/q' );
define( 'LOGGED_IN_KEY',    '=}$FNE.Q=@S;gQbI%6n-yQxwiin$`!)B1(z$d.UwEq=#iHH63:IN?X67i*^X9`[c' );
define( 'NONCE_KEY',        'n>N21 -),o:c<~ s#J^j6(B-P=_q3kTd]e!Qi.<i>K{u37/QWwr#R-DE036*aN=&' );
define( 'AUTH_SALT',        'LCbWM)A+b}jXvfYzpCb<^nJu:E5~WAG6T(EKkLN,%8,|0T1gP6SyDn}fl;tHqRAP' );
define( 'SECURE_AUTH_SALT', '2~Lv?HO:/ iFflf3EWr{Zy9}P,qXK!A^?laKz<t_xqBX^v8 hncR<G1X6$Q66baR' );
define( 'LOGGED_IN_SALT',   '<gS^y2J_hbNZT[N&HQKG*LD[{`$Y6BIxtK[;FXoeN0eGdD0a^-a9.e_l/o>jxm|.' );
define( 'NONCE_SALT',       'Kr=4WYgvO4([l-bh|RI3;B**t,PJm.E]s/U%lw* +>_N#/PR*Jp;.9MGD,J?m5<a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'iD4_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
