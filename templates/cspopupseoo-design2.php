<?php
/**
 * Popup Design 2 Html
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0 
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="splash cspopupseoo-popup-wrp design2 cspopupseoo-popup-close" id="cspopupseoo-popup-wrp">
	<div class="cspopupseoo-popup-body">
		<div class="cspopupseoo-popup-cnt-wrp">
			<div class="cspopupseoo-clearfix cspopupseoo-popup-bar-wrp">
			</div>

			<?php if( empty($cspopupseoo_options['hide_close_btn']) ) { ?>
			<a href="javascript:void(0);" class="cspopupseoo-popup-close cspopupseoo-popup-close-button" title="<?php _e('Close', 'cspopupseoo'); ?>"></a>
			<?php } ?>
		
			<div class="cspopupseoo-popup-cnt-inr-wrp cspopupseoo-clearfix">
			
				<?php if( !empty($cspopupseoo_options['cspopupseoo_mainheading']) ) { ?>
					<h2><?php echo $cspopupseoo_options['cspopupseoo_mainheading']; ?></h2>
				<?php } ?>
				
				<?php if( !empty($cspopupseoo_options['cspopupseoo_subheading']) ) { ?>
					<h4><?php echo $cspopupseoo_options['cspopupseoo_subheading']; ?></h4>
				<?php } ?>
				
				<?php echo do_shortcode ( wpautop( $cspopupseoo_options['cspopupseoo_popup_cnt'] ) ); ?>
			</div>
		</div><!-- end .cspopupseoo-popup-cnt-wrp -->
	</div><!-- end .cspopupseoo-popup-body -->
</div><!-- end .cspopupseoo-popup-wrp -->