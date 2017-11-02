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
define('DB_NAME', 'pedro_training_dev');

/** MySQL database username */
define('DB_USER', 'pedro_train_dev');

/** MySQL database password */
define('DB_PASSWORD', 'dshjfkhj32k34c938bc9347bc983');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'O}b 1@!9KOiP}yVrr&3}7@!vxK.9CXmu$UkDeQquNFz#8;|dgiCa^asiN-*@)Q6s');
define('SECURE_AUTH_KEY',  'Jf.2NR~rXAP$ig(cs<dcam`;Hl[t@MRQqm/[,_TAMgDu13:q /H`e$^h1X6o3ex|');
define('LOGGED_IN_KEY',    'S[Z7Ir2ck]JC{~P&z9cnmm]JAv+g0/#2j$Qc?B?|_-{9,r7q0+C/wNDMLK%4+q_(');
define('NONCE_KEY',        '/JV Ck,q89donc%%_f 5$a(I=DB=BasC)MD->+-,y_Mp9dTYLh/SNMA`j_ -9!wt');
define('AUTH_SALT',        'qnOXT#UC@aiA@d=YQE`4#ejAng#NYeF6I p!IM[]f_9c^_cqgYYMoGzEr!r|.}Cu');
define('SECURE_AUTH_SALT', 'HmU)tIimC&$a*+$:JC~FYZ%V}&UN@)=|Bw-JK4&}1VuFR!p@u.g`An<1[<i~j+;M');
define('LOGGED_IN_SALT',   's}Puu+LjLtPg5/_U$;K_P*~!~/$r6_E&n,2sKV4Gg@ehqVR-PyOI@Cu(RmoiQ6[O');
define('NONCE_SALT',       'V LvVwE*mRUT1mk~T?2,G#L+RbwnJh1f+vF5TVN*Y@NkdcGIM+D^R_9GHN^Fq8,z');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
