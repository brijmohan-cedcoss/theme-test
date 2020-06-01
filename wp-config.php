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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oP6/N66q1+zWJHyfFfh9cTiN9TjVK56Z1ukKUXoGG2/Nrw+m1Wa/iVTcc36hWLv2EW3WMjp8NC6FANtFVpFMvQ==');
define('SECURE_AUTH_KEY',  'IaPj6kNWP0JbgTGyqEFfYRpLhzrpBI54wqogozwPKmjN6ZjGQvb6096LwHH2o4Gas+YysWEIw/95y0PT+e+nOw==');
define('LOGGED_IN_KEY',    '0bz8rYRRIOSgu3sZfrDQugDRPYqVjS+Z+SSy4q1h2/sECZrq97NONg9EV/SLnRK9Ng9MsFAIRsrre5BFLcCuVw==');
define('NONCE_KEY',        'f+rYCSRtymCAphxIEcLbgqz98c1DGjGBIeUI7bk0qpL5zu1EC/SHyVMG9XM+AYiPCghf4U2Mk1hV9TM/481+fA==');
define('AUTH_SALT',        '8HAyfSFu6t4+y1Lp3ajsZtNTPb2Z6ZvBseiAUoPTqW6OQaS3/G52LUQEF1XEB0sZypDKRNJxn4nHKpYTa9Eolg==');
define('SECURE_AUTH_SALT', 'cGJqJQROm7FfGmsW+snc3JTrs0IDgDuhc8rXyezMqNZfppCklIrzuzmO3XM4NlSMxTwX1+HFMZRvXXJfUnxejw==');
define('LOGGED_IN_SALT',   '/xo+mKlclLL8Lj2CzkXTOvOXeSthvE7Fj18isDa4aYL6UvIReFuM1nX9svNRv46xexkvFHdOh86TsTwZZNAYTw==');
define('NONCE_SALT',       'k7QsYlkRzBnOULv/+sGp5uNFaLKGm8uuzHPrVLDNTNF2nhTzJxDOB5mNZBo2ndhlozC2fmaJau8tAOPyxzDpYA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
