<?php
/**
 * Popup 
 * 
 * @package Pop Up Seo Optimised
 * @since 1.0.0 
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="splash cspopupseoo-popup-wrp design1 cspopupseoo-popup-close" id="cspopupseoo-popup-wrp">
	<div class="cspopupseoo-popup-body">
		
		<?php if( empty($cspopupseoo_options['hide_close_btn']) ) { ?>
		<a href="javascript:void(0);" class="cspopupseoo-popup-close cspopupseoo-popup-close-button" title="<?php _e('Close', 'cspopupseoo'); ?>"></a>
		<?php } ?>
		
		<div class="cspopupseoo-popup-cnt-wrp">
			<div class="cspopupseoo-popup-cnt-inr-wrp cspopupseoo-clearfix">
				<div class="cspopupseoo-popup-cnt-wrp-header">
					<?php if( !empty($cspopupseoo_options['cspopupseoo_mainheading']) ) { ?>
					<h2><?php echo $cspopupseoo_options['cspopupseoo_mainheading']; ?></h2>
					<?php } ?>

					<?php if( !empty($cspopupseoo_options['cspopupseoo_subheading']) ) { ?>
					<h4><?php echo $cspopupseoo_options['cspopupseoo_subheading']; ?></h4>
					<?php } ?>
				</div>
				<div class="cspopupseoo-popup-cnt-wrp-content">
					<?php echo do_shortcode ( wpautop( $cspopupseoo_options['cspopupseoo_popup_cnt'] ) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>