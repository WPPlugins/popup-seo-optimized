<?php
/**
 * Functions File
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Update default settings
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_default_settings(){
	
	global $cspopupseoo_options;
	
	$cspopupseoo_options = array(
								'enable_popup'			=> '0',
								'cspopupseoo_popup_cnt' 		=>	'',
								'cspopupseoo_popup_delay'		=> '1',
								'cspopupseoo_popup_exp'		=> '',
								'close_on_esc'			=> '1',
								'hide_close_btn'		=> '0',
								'cspopupseoo_popup_disappear'	=> '0',
								'popup_height'			=> '',
								'popup_width'			=> '',
								'popup_bgcolor'			=> '',
								'popup_border_width'	=> '',
								'popup_border_color'	=> '',
								'popup_border_radius'	=> '',
								'popup_design'			=> 'cspopupseoo-design1',
								'cspopupseoo_mainheading'		=> '',
								'cspopupseoo_subheading' 		=> '',
								'popup_fontcolor'       => '',
							);
	
	$default_options = apply_filters('cspopupseoo_options_default_values', $cspopupseoo_options );
	
	// Update default options
	update_option( 'cspopupseoo_options', $default_options );
	
	// Overwrite global variable when option is update
	$cspopupseoo_options = cspopupseoo_get_settings();
}

/**
 * Get Settings From Option Page
 * 
 * Handles to return all settings value
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_get_settings() {
	
	$options = get_option('cspopupseoo_options');

	$settings = is_array($options) 	? $options : array();
	
	return $settings;
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 * 
 * @package Pop Up Seo Optimised
 * @since 1.2
 */
function cspopupseoo_get_option( $key = '', $default = false ) {
	global $cspopupseoo_options;
	
	$value = ! empty( $cspopupseoo_options[ $key ] ) ? $cspopupseoo_options[ $key ] : $default;
	$value = apply_filters( 'cspopupseoo_get_option', $value, $key, $default );
	return apply_filters( 'cspopupseoo_get_option_' . $key, $value, $key, $default );
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package  Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_escape_attr($data) {
	return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_slashes_deep($data = array(), $flag = false) {
	
	if($flag != true) {
		$data = cspopupseoo_nohtml_kses($data);
	}
	$data = stripslashes_deep($data);
	return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_nohtml_kses($data = array()) {
	
	if ( is_array($data) ) {
		
		$data = array_map('cspopupseoo_nohtml_kses', $data);
		
	} elseif ( is_string( $data ) ) {
		
		$data = wp_filter_nohtml_kses($data);
	}
	
	return $data;
}

/**
 * Plugin Popup designs
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */
function cspopupseoo_popup_designs(){

	$design_arr = array(
						'cspopupseoo-design1' => 'Standard',
						'cspopupseoo-design2' => 'Minimalistic',
					);

	return $design_arr;
}