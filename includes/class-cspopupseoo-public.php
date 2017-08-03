<?php
/**
 * Public Class
 *
 * Handles the public side functionality of plugin
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class cspopupseoo_Public {
	
	function __construct() {
		
		// Action to add popup
		add_action( 'wp_footer', array($this, 'cspopupseoo_add_popup') );
	}

	/**
	 * Function to add popup to site
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0 
	 **/
	function cspopupseoo_add_popup() {
		
		global $cspopupseoo_options;

		$design = !empty($cspopupseoo_options['popup_design']) ? $cspopupseoo_options['popup_design'] : 'cspopupseoo-design1';
		$design = file_exists( CSPOPUPSEOO_DIR . '/templates/' . $design.'.php' ) ? $design : 'cspopupseoo-design1';

		echo $this->cspopupseoo_popup_css(); // Popup custom css

		include_once( CSPOPUPSEOO_DIR . "/templates/{$design}.php" );
	}

	/**
	 * Function for popup css to site
	 * 
	 * @package Pop Up Seo Optimised
	 * @since 1.0.0 
	 **/
	function cspopupseoo_popup_css() {
		
		global $cspopupseoo_options;

		$html = '<style type="text/css">';

		$html .= '.cspopupseoo-popup-wrp .cspopupseoo-popup-body{';
		if( !empty($cspopupseoo_options['popup_bgcolor']) ) {
			$html .= "background-color: {$cspopupseoo_options['popup_bgcolor']};";
		}

		if( ($cspopupseoo_options['popup_border_width']) != '' ) {
			$html .= "border-width: {$cspopupseoo_options['popup_border_width']}px; border-style: solid;";
		}

		if( !empty($cspopupseoo_options['popup_border_color']) ) {
			$html .= "border-color: {$cspopupseoo_options['popup_border_color']};";
		}

		if( !empty($cspopupseoo_options['popup_width']) ) {
			$html .= "max-width: {$cspopupseoo_options['popup_width']};";
		}

		if( !empty($cspopupseoo_options['popup_border_radius']) ) {
			$html .= "border-radius: {$cspopupseoo_options['popup_border_radius']}px;";
		}
		$html .= '}';
		
		$html .= ".cspopupseoo-popup-cnt-inr-wrp{";
		if( !empty($cspopupseoo_options['popup_height']) ) {
			$html .= "height:{$cspopupseoo_options['popup_height']};";
		}
		if( !empty($cspopupseoo_options['popup_fontcolor']) ) {
			$html .= "color:{$cspopupseoo_options['popup_fontcolor']};";
		}		
		$html .= '}';
		
		$html .= ".cspopupseoo-popup-cnt-inr-wrp h2, .cspopupseoo-popup-cnt-inr-wrp h4{";		
		if( !empty($cspopupseoo_options['popup_fontcolor']) ) {
			$html .= "color:{$cspopupseoo_options['popup_fontcolor']};";
		}		
		$html .= '}';

		$html .='</style>';

		return $html;
	}
}

$cspopupseoo_public = new cspopupseoo_Public();