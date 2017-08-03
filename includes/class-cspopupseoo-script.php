<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class cspopupseoo_Script {
	
	function __construct() {
		
		// Action to add style on frontend
		add_action( 'wp_enqueue_scripts', array($this, 'cspopupseoo_front_end_style') );

		// Action to add script on frontend
		add_action( 'wp_enqueue_scripts', array($this, 'cspopupseoo_front_end_script'), 15 );

		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'cspopupseoo_admin_style') );

		// Action to add script in backend
		add_action( 'admin_enqueue_scripts', array($this, 'cspopupseoo_admin_script') );
	}
	
	/**
	 * Enqueue front end styles
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_front_end_style(){

		// Registring Public Style
		wp_register_style( 'cspopupseoo-public-style', CSPOPUPSEOO_URL.'assets/css/cspopupseoo-public.css', null, CSPOPUPSEOO_VERSION );
		wp_enqueue_style('cspopupseoo-public-style');
	}

	/**
	 * Enqueue front script
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_front_end_script(){
		
		global $cspopupseoo_options;

		// Registring Popup script
		wp_register_script( 'cspopupseoo-popup-js', CSPOPUPSEOO_URL.'assets/js/cspopupseoo-popup.js', array('jquery'), CSPOPUPSEOO_VERSION, true );
		wp_localize_script( 'cspopupseoo-popup-js', 'cspopupseoo_Popup', array(
																	'enable'		=> $cspopupseoo_options['enable_popup'],
																	'delay'			=> $cspopupseoo_options['cspopupseoo_popup_delay'],
																	'exp_time'		=> $cspopupseoo_options['cspopupseoo_popup_exp'],
																	'close_on_esc'	=> (!empty($cspopupseoo_options['close_on_esc'])) ? true : false,
																	'hide_time'		=> $cspopupseoo_options['cspopupseoo_popup_disappear'],
																));
		wp_enqueue_script('cspopupseoo-popup-js');
	}

	/**
	 * Enqueue admin styles
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_admin_style( $hook ) {

		// Pages array
		$pages_array = array( 'toplevel_page_cspopupseoo-settings' );

		// If page is plugin setting page then enqueue script
		if( in_array($hook, $pages_array) ) {

			// Enqueu built in style for color picker
			if( wp_style_is( 'wp-color-picker', 'registered' ) ) { // Since WordPress 3.5
				wp_enqueue_style( 'wp-color-picker' );
			} else {
				wp_enqueue_style( 'farbtastic' );
			}
		}
	}

	/**
	 * Enqueue admin script
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_admin_script( $hook ) {

		global $wp_version;

		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts

		// Pages array
		$pages_array = array( 'toplevel_page_cspopupseoo-settings' );

		// If page is plugin setting page then enqueue script
		if( in_array($hook, $pages_array) ) {

			// Enqueu built-in script for color picker
			if( wp_script_is( 'wp-color-picker', 'registered' ) ) { // Since WordPress 3.5
				wp_enqueue_script( 'wp-color-picker' );
			} else {
				wp_enqueue_script( 'farbtastic' );
			}

			// Registring admin script
			wp_register_script( 'cspopupseoo-admin-js', CSPOPUPSEOO_URL.'assets/js/cspopupseoo-admin.js', array('jquery'), CSPOPUPSEOO_VERSION, true );
			wp_localize_script( 'cspopupseoo-admin-js', 'cspopupseoo_Admin', array(
																	'new_ui' =>	$new_ui
																));
			wp_enqueue_script( 'cspopupseoo-admin-js' );
		}
	}
}

$cspopupseoo_script = new cspopupseoo_Script();