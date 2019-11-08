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
define( 'DB_NAME', 'em-rokt' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '.(b+pycm:Vx7Vm3sZ]-E]Y!tXW4&=M.|P3B3?5oqKN4ock*Gf.U5u`i6(& fE]eh' );
define( 'SECURE_AUTH_KEY',  '{n]<.7v>?qUV%~u 5m6Z(7Imw0n?kF[ylCCh5X4%0EVQfJa4@|LU/4$r5anq xva' );
define( 'LOGGED_IN_KEY',    's:%?5zK~YH Yuu:|j?0c-qGsfOJ]_[).tOO|NhW0g`~pE+M9pur#UFzO*:?~bn:e' );
define( 'NONCE_KEY',        '#%U7_T`FdQ%.#ol~5!|9u)G~qs28a>Nqg+c,GK&.9U[L2SvbuMDG3^ZtC+S4?pNq' );
define( 'AUTH_SALT',        'x:c7]%R!^OKdWwBvOK:PFt*+rjsGp6SY<-]Q<W%*~W@)k17vXtCekiUKv #(2eY9' );
define( 'SECURE_AUTH_SALT', '75@B[B|k#J<<i.}?2bDdHj&@2EBEsZKr!3=S))Z=Yg-.xmlzz!H!N^c,P =>^;~Z' );
define( 'LOGGED_IN_SALT',   'K@R9Z*oP;s0<N][RAW5|3HYRZv6Wvc-HG8+mFR A 7sGV3q6Hub?@~?fX?@&f9:t' );
define( 'NONCE_SALT',       'Q(MH,x!Gnt)0gfjE&e0*[Bny:%1.:<>,x!WyjzBx$R<)#O@E:u10Jt>>(Ryys2Bl' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );


define('ALLOW_UNFILTERED_UPLOADS', true);
