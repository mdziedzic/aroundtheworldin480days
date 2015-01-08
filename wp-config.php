<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aroundtheworld');

/** MySQL database username */
define('DB_USER', 'scarbelly');

/** MySQL database password */
define('DB_PASSWORD', 'mansea42');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');





// eggfoo

	/** added this on 10/4/2011 to stop memory exhaustion error that prevented homepage from loading */
	define('WP_MEMORY_LIMIT', '64M');

	// needed to add this to repiar db on 2013-09-07
	define('WP_ALLOW_REPAIR', true);

// eggfoo






/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'adC5lQ_(*|.bYXJ}hN^I1D.CXk`?Sl|D=iu/%M]f6TjNF;SIrA*Ay/-*xw1?fQ}<');
define('SECURE_AUTH_KEY',  '?4h2b[e$AT)-)f{o#q.vY3{Vs6&uz9wdW*?O[2f6G<Tean-7M_e9Fr|2aeN~.-d<');
define('LOGGED_IN_KEY',    'Q23VyVCsOuhf*R+g!Yc5?:jqD`J<k6plg60r|<[NaXCLKcWi1gezW+3X3% 5nV/8');
define('NONCE_KEY',        'G|-WSXc4^eveJ|xy-RgIvjzU8Z)#~%K;$e:.BG9,-?(r1HV/Lyi2#B:k-tLa+bda');
define('AUTH_SALT',        'F:|2{;R/3[c]~1Ni*kY,_vE{NUMn0g%- 2(^9[{CXx]S@-,T0-tj`k|lSEr?7OK9');
define('SECURE_AUTH_SALT', '3salhr2M7Y{&E-eK1Q>N-r*zu34|m!tZbpwv;Fevn54?@3l1f^okyrhuj>>l$[3w');
define('LOGGED_IN_SALT',   'FD82(;<V65IhjC~)VPQ-xeX:GfoLT)x1<M$5S@UgI`{A1E4aYlN#0o.rvwnI+u5|');
define('NONCE_SALT',       '+W8+Ft!rB|ay5}#G*8kBO4/mC[:{8p[>1f=yaVk1jW?9;5r`R`0vr2qf7pQ]k5d*');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'atw480_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
