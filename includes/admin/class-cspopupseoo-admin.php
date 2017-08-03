<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class cspopupseoo_Admin {
	
	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'cspopupseoo_register_menu') );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this,'cspopupseoo_register_settings') );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_register_menu() {
		add_menu_page ( __('Popup Settings', 'cspopupseoo'), __('Popup Settings', 'cspopupseoo'), 'manage_options', 'cspopupseoo-settings', array($this, 'cspopupseoo_settings_page'), 'dashicons-format-gallery' );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_settings_page() {
		include_once( CSPOPUPSEOO_DIR . '/includes/admin/form/cspopupseoo-settings.php' );
	}

	/**
	 * Function register setings
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_register_settings(){
		register_setting( 'cspopupseoo_plugin_options', 'cspopupseoo_options', array($this, 'cspopupseoo_validate_options') );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0
	 */
	function cspopupseoo_validate_options( $input ) {

		$input['cspopupseoo_popup_cnt']		= isset($input['cspopupseoo_popup_cnt']) ? cspopupseoo_slashes_deep( $input['cspopupseoo_popup_cnt'], true ) : '';
		$input['cspopupseoo_mainheading'] 	= isset($input['cspopupseoo_mainheading']) 	? trim($input['cspopupseoo_mainheading']) 		: '';
		$input['cspopupseoo_subheading']   	= isset($input['cspopupseoo_subheading']) 	? trim($input['cspopupseoo_subheading']) 		: '';
		$input['cspopupseoo_popup_delay']		= (is_numeric($input['cspopupseoo_popup_delay'])) 	? trim($input['cspopupseoo_popup_delay']) 	: 0;
		$input['cspopupseoo_popup_exp']		= (is_numeric($input['cspopupseoo_popup_exp'])) 		? trim($input['cspopupseoo_popup_exp']) 		: 0;
		$input['cspopupseoo_popup_disappear']	= (is_numeric($input['cspopupseoo_popup_disappear'])) ? trim($input['cspopupseoo_popup_disappear']) : 0;
		$input['close_on_esc'] 			= isset($input['close_on_esc']) 	? 1 : 0;
		$input['hide_close_btn'] 		= isset($input['hide_close_btn']) 	? 1 : 0;
		$input['enable_popup'] 			= isset($input['enable_popup']) 	? 1 : 0;
		$input['popup_height'] 			= isset($input['popup_height']) 	? trim($input['popup_height']) 		: '';
		$input['popup_width'] 			= isset($input['popup_width']) 		? trim($input['popup_width']) 		: '';
		$input['popup_bgcolor'] 		= isset($input['popup_bgcolor'])	? trim($input['popup_bgcolor']) 	: '';
		$input['popup_fontcolor'] 		= isset($input['popup_fontcolor'])	? trim($input['popup_fontcolor']) 	: '';
		$input['popup_border_width']	= (is_numeric($input['popup_border_width'])) ? trim($input['popup_border_width']) : '';
		$input['popup_border_color']	= (isset($input['popup_border_color'])) ? trim($input['popup_border_color']) : '';
		$input['popup_border_radius']	= (is_numeric($input['popup_border_radius'])) ? trim($input['popup_border_radius']) : '';
		$input['popup_design']			= isset($input['popup_design']) ? trim($input['popup_design']) : '';
		
		return $input;
	}
}

$cspopupseoo_admin = new cspopupseoo_Admin();