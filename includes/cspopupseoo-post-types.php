<?php
/**
 * Post Type Functions
 *
 * Handles all custom post types of plugin
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0 
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Setup Popup Post Type
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0 
 **/
function cspopupseoo_register_post_types() {
	
	// Popup post type
	$popup_post_type_labels = array(
								    'name'				=> __('PopUps','cspopupseoo'),
								    'singular_name' 	=> __('PopUp','cspopupseoo'),
								    'add_new' 			=> __('Add New Popup','cspopupseoo'),
								    'add_new_item' 		=> __('Add New Popup','cspopupseoo'),
								    'edit_item' 		=> __('Edit Popup','cspopupseoo'),
								    'new_item' 			=> __('New Popup','cspopupseoo'),
								    'all_items' 		=> __('All Popups','cspopupseoo'),
								    'view_item' 		=> __('View Popup','cspopupseoo'),
								    'search_items' 		=> __('Search Popup','cspopupseoo'),
								    'not_found' 		=> __('No Popup found','cspopupseoo'),
								    'not_found_in_trash'=> __('No Popup found in Trash','cspopupseoo'),
								    'parent_item_colon' => '',
								    'menu_name' 		=> __('PopUps','cspopupseoo'),
								);
	$popup_post_type_args = array(
						    'labels' 				=> $popup_post_type_labels,
						    'public' 				=> false,
						    'query_var' 			=> false,
						    'rewrite' 				=> false,
						    'show_ui'				=> true,
						    'capability_type' 		=> 'post',
						    'menu_icon'				=> 'dashicons-megaphone',
						    'map_meta_cap'    		=> true,
						    'supports' 				=> array( 'title', 'editor', 'thumbnail' )
					 	);
	
	// Filter to modify popup post type arguments
	$popup_post_type_args = apply_filters( 'cspopupseoo_register_popup__post_type', $popup_post_type_args );
	
	// Register popup post type
	register_post_type( CSPOPUPSEOO_POPUP_POST_TYPE, $popup_post_type_args );
}

// Action to register post type
add_action( 'init', 'cspopupseoo_register_post_types' );