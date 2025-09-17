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
define( 'DB_NAME', 'testalenta' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'zdef7yb:dQ;n]+ueM?nf6UEW-K$6_2V*]aVLjm<j%Eby^s`Q; qUc$LrMVf&b|VT' );
define( 'SECURE_AUTH_KEY',  'jushw*Q&KwiA;+^S5JnU}@7:KQEenT6ujOF,Fh>Gy!amWu:5S<8Ww?~G3f~4IGEU' );
define( 'LOGGED_IN_KEY',    'RXm)zd K65 @]E}v>XnM`SC|;O7A%N{$bHVYYE^_:gu79S; C8]HE2*~FrI%K 62' );
define( 'NONCE_KEY',        '~A1v(]n%Cu^wCVP> HOG|RYq#MMm+j<rGdE$*<!Xm&hsh{[G$*N|2DWHp^bh#C)>' );
define( 'AUTH_SALT',        '9e`7OpXJA4[0V[j%Rv_+L R%Y~4/u<p>[_6imp5_1}/?N7FC~B$1gd+yI?U9IBX2' );
define( 'SECURE_AUTH_SALT', ';AG@wP%q=Z,Z<iCTJU:/pytrv~*!,{M3Uud/:&Cr$6s-Q=ULh2zT*9l%oU}[D?97' );
define( 'LOGGED_IN_SALT',   'bNd^jd5BsXk=Z|Ug#=c|Z30,{FDJk9H}AtxalZ$RVN3]K/BWCW~(rai9w![Xf.OT' );
define( 'NONCE_SALT',       'vCdmNN7gxIo`va&]R57I%_Z5x8FPK0SUWrZgqBQ#zokd1:af}|]|]([}2qGgXtNY' );

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
