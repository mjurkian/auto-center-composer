<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package adelioWP
 */

/*
 * Load environment specific parameters
 *
 * Local and productions configurations should be set in local-config.php or production-config.php
 */
if ( file_exists( dirname( __FILE__ ) . '/../production-config.php' ) ) {
	define( 'WP_LOCAL_DEV', false );
	include dirname( __FILE__ ) . '/../production-config.php';
} else {
	define( 'WP_LOCAL_DEV', true );
	include dirname( __FILE__ ) . '/../local-config.php';
}

// Custom Content Directory.
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content/' );
if ( ! defined( 'ADELIO_BASE_URL' ) ) {
	die( 'ERROR: Base URL has not been defined in config' );
}
define( 'WP_CONTENT_URL', ADELIO_BASE_URL . '/wp-content' );

// DB charset and collation, do not change this if in doubt.
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// Language - Leave blank for American English.
define( 'WPLANG', 'en_GB' );

// Disable automatic updates.
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );

// Disable file updates through admin.
define( 'DISALLOW_FILE_MODS', true );
define( 'DISALLOW_FILE_EDIT', true );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

// Load WordPress Settings.
require_once ABSPATH . 'wp-settings.php';
