<?php
/**
 * Plugin Name: Responsive Popup
 * Description: Easily create a SEO Optimized responsive popup with a few clicks. Multiple design options and simple design.
 * Author: coffeestudios
 * Version: 0.1
 *
 * @package WordPress
 * @author SP Technolab and Coffee Studios
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
if( !defined( 'CSPOPUPSEOO_VERSION' ) ) {
	define( 'CSPOPUPSEOO_VERSION', '1.2' );	// Version of plugin
}
if( !defined( 'CSPOPUPSEOO_DIR' ) ) {
	define( 'CSPOPUPSEOO_DIR', dirname( __FILE__ ) );	// Plugin dir
}
if( !defined( 'CSPOPUPSEOO_URL' ) ) {
	define( 'CSPOPUPSEOO_URL', plugin_dir_url( __FILE__ ) );	// Plugin url
}
if( !defined( 'CSPOPUPSEOO_POPUP_POST_TYPE' ) ) {
	define( 'CSPOPUPSEOO_POPUP_POST_TYPE', 'wpo_popup' );	// Plugin meta prefix
}
if( !defined( 'CSPOPUPSEOO_META_PREFIX' ) ) {
	define( 'CSPOPUPSEOO_META_PREFIX', '_cspopupseoo_' );	// Plugin meta prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_load_textdomain() {
	load_plugin_textdomain( 'cs-pop-up-seo-optimized', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

// Action to load plugin text domain
add_action('plugins_loaded', 'cspopupseoo_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'cspopupseoo_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'cspopupseoo_uninstall');

/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_install(){

	// Get settings for the plugin
	$cspopupseoo_options = get_option( 'cspopupseoo_options' );
	
	if( empty( $cspopupseoo_options ) ) { // Check plugin version option
		
		// set default settings
		cspopupseoo_default_settings();

		// Update plugin version to option
		update_option( 'cspopupseoo_plugin_version', '1.0' );
	}
}

/**
 * Plugin Deactivation Function
 * Delete  plugin options
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_uninstall(){
}

// Global Variables
global $cspopupseoo_options;

// Function File
require_once( CSPOPUPSEOO_DIR . '/includes/cspopupseoo-functions.php' );
$cspopupseoo_options = cspopupseoo_get_settings();

// Script Class
require_once( CSPOPUPSEOO_DIR . '/includes/class-cspopupseoo-script.php' );

// Admin Class
require_once( CSPOPUPSEOO_DIR . '/includes/admin/class-cspopupseoo-admin.php' );

// Public Class
require_once( CSPOPUPSEOO_DIR . '/includes/class-cspopupseoo-public.php' );