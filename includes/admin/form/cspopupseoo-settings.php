<?php
/**
 * Settings Page
 *
 * @package Pop Up Seo Optimised
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $wp_version;

$editor_config = array(
	'textarea_name' => 'cspopupseoo_options[cspopupseoo_popup_cnt]',
	'editor_class'	=> 'cspopupseoo-popup-cnt',
	'textarea_rows'	=> 8
	);
$popup_designs = cspopupseoo_popup_designs();
?>

<div class="wrap cspopupseoo-settings">

	<h2><?php _e( 'PopUp Settings', 'cspopupseoo' ); ?></h2><br />

	<?php
	if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
		echo '<div id="message" class="updated notice notice-success is-dismissible">
		<p>'.__("Your changes saved successfully.", "cspopupseoo").'</p>
		</div>';
	}
	?>

	<form action="options.php" method="POST" id="cspopupseoo-settings-form" class="cspopupseoo-settings-form">

		<?php
		settings_fields( 'cspopupseoo_plugin_options' );
		global $cspopupseoo_options;
		?>
		<div class="cspopupseoo-wrapper" style="width:65%;float: left;">
			<div id="cspopupseoo-general-settings" class="post-box-container cspopupseoo-general-settings">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div id="general" class="postbox">

							<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

							<!-- Settings box title -->
							<h3 class="hndle">
								<span><?php _e( 'Basic settings', 'cs-pop-up-seo-optimized' ); ?></span>
							</h3>

							<div class="inside">

								<table class="form-table cspopupseoo-general-settings-tbl">
									<tbody>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-enable-popup"><?php _e('Enable Popup', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="checkbox" name="cspopupseoo_options[enable_popup]" value="1" class="cspopupseoo-enable-popup" id="cspopupseoo-enable-popup" <?php checked( $cspopupseoo_options['enable_popup'], 1 ); ?> />
												<span class="description"><?php _e('Activate Pop Up.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-mainheading"><?php _e('Headline', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="text" name="cspopupseoo_options[cspopupseoo_mainheading]" value="<?php echo cspopupseoo_get_option('cspopupseoo_mainheading'); ?>" class="cspopupseoo-cspopupseoo_mainheading large-text" id="cspopupseoo-cspopupseoo_mainheading" /><br/>
												<span class="description"><?php _e('Headline example: Sign Up for Our Newsletter', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr style="display:none;">
											<th scope="row">
												<label for="cspopupseoo-subheading"><?php _e('Tagline', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="text" name="cspopupseoo_options[cspopupseoo_subheading]" value="<?php echo cspopupseoo_get_option('cspopupseoo_subheading'); ?>" class="cspopupseoo-cspopupseoo_subheading large-text" id="cspopupseoo-cspopupseoo_subheading" /><br/>
												<span class="description"><?php _e('Tagline example: Get a discount if you sign up today', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-post-within"><?php _e('Main Content', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<?php wp_editor( $cspopupseoo_options['cspopupseoo_popup_cnt'], 'cspopupseoo-popup-cnt', $editor_config ); ?>
												<span class="description"><?php _e('Everything you want inside of the Pop Ups.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-design"><?php _e('Popup Design style', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<select name="cspopupseoo_options[popup_design]" value="<?php echo $cspopupseoo_options['popup_design']; ?>" class="cspopupseoo-popup-design" id="cspopupseoo-popup-design">
													<?php
													if( !empty($popup_designs) ) {
														foreach ($popup_designs as $design_key => $design_val) { ?>
														<option value="<?php echo $design_key; ?>" <?php selected( $cspopupseoo_options['popup_design'], $design_key ); ?>><?php echo $design_val; ?></option>
														<?php }
													}
													?>
												</select><br/>
												<span class="description"><?php _e('Select a design for the popup.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-delay"><?php _e('Popup Delay', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="number" min="0" name="cspopupseoo_options[cspopupseoo_popup_delay]" value="<?php echo $cspopupseoo_options['cspopupseoo_popup_delay']; ?>" class="cspopupseoo-popup-delay" id="cspopupseoo-popup-delay" /> <span><?php _e('Seconds', 'cspopupseoo'); ?></span><br/>
												<span class="description"><?php _e('After how many seconds should the pop up appear?', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-disappear"><?php _e('Popup auto Disappear', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="number" min="0" name="cspopupseoo_options[cspopupseoo_popup_disappear]" value="<?php echo $cspopupseoo_options['cspopupseoo_popup_disappear']; ?>" class="cspopupseoo-popup-disappear" id="cspopupseoo-popup-disappear" /> <span><?php _e('Seconds', 'cspopupseoo'); ?></span><br/>
												<span class="description"><?php _e('After how many seconds should the pop up disappear automaticly? <br>Dont write anything to deactivate this feature', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-expiry"><?php _e('Hide PopUp for X days', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="number" min="0" name="cspopupseoo_options[cspopupseoo_popup_exp]" value="<?php echo $cspopupseoo_options['cspopupseoo_popup_exp']; ?>" class="cspopupseoo-popup-expiry" id="cspopupseoo-popup-expiry" /> <span><?php _e('Days', 'cspopupseoo'); ?></span><br/>
												<span class="description"><?php _e('When the visitor close the pop up, how many days should it remain hidden for?', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr style="display:none;">
											<th scope="row">
												<label for="cspopupseoo-hide-close-btn"><?php _e('Remove Close Button', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="checkbox" name="cspopupseoo_options[hide_close_btn]" value="1" class="cspopupseoo-hide-close-btn" id="cspopupseoo-hide-close-btn" <?php checked( $cspopupseoo_options['hide_close_btn'], 1 ); ?> /><br/>
												<span class="description"><?php _e('Check this box if you want to remove the close button.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-esc-close"><?php _e('Close on clicking escape (ESC)', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="checkbox" name="cspopupseoo_options[close_on_esc]" value="1" class="cspopupseoo-esc-close" id="cspopupseoo-esc-close" <?php checked( $cspopupseoo_options['close_on_esc'], 1 ); ?> />
												<span class="description"><?php _e('Check this box if you want to close the popup on escape (ESC) key.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<td colspan="2" valign="top" scope="row">
												<input type="submit" id="cspopupseoo-settings-submit" name="cspopupseoo-settings-submit" class="button button-primary right" value="<?php _e('Save Changes','cs-pop-up-seo-optimized');?>" />
											</td>
										</tr>
									</tbody>
								</table>

							</div><!-- .inside -->
						</div><!-- #general -->
					</div><!-- .meta-box-sortables ui-sortable -->
				</div><!-- .metabox-holder -->
			</div><!-- #cspopupseoo-general-settings -->

			<!-- Appearance Setting Box Starts -->
			<div id="cspopupseoo-appearance-settings" style="display:none;" class="post-box-container cspopupseoo-appearance-settings">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div id="appearance" class="postbox">

							<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

							<!-- Settings box title -->
							<h3 class="hndle">
								<span><?php _e( 'PopUp Design', 'cs-pop-up-seo-optimized' ); ?></span>
							</h3>

							<div class="inside">

								<table class="form-table cspopupseoo-appearance-settings-tbl">
									<tbody>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-height"><?php _e('Popup Height and Width', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="text" name="cspopupseoo_options[popup_height]" value="<?php echo $cspopupseoo_options['popup_height']; ?>" placeholder="600px" class="cspopupseoo-popup-height" id="cspopupseoo-popup-height" size="6" /> <label for="cspopupseoo-popup-height"><?php _e('Height (px)', 'cs-pop-up-seo-optimized'); ?></label> &nbsp;&nbsp;
												<input type="text" placeholder="500px" name="cspopupseoo_options[popup_width]" value="<?php echo $cspopupseoo_options['popup_width']; ?>" class="cspopupseoo-popup-width" id="cspopupseoo-popup-width" size="6" /> <label for="cspopupseoo-popup-width"><?php _e('Width (px)', 'cs-pop-up-seo-optimized'); ?></label> <br/>
												<span class="description"><?php _e('Enter custom height and width for popup. Leave empty to use default. (i.e 600px OR 60%)', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-bgcolor"><?php _e('Popup Background Color', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<?php if( $wp_version >= 3.5 ) { ?>
												<input type="text" value="<?php echo $cspopupseoo_options['popup_bgcolor']; ?>" id="cspopupseoo-popup-bgcolor" name="cspopupseoo_options[popup_bgcolor]" class="cspopupseoo-color-box" /><br/>
												<?php } else { ?>
												<div style='position:relative;'>
													<input type='text' value="<?php echo $cspopupseoo_options['popup_bgcolor']; ?>" id="cspopupseoo-color-box-farbtastic-inp" name="cspopupseoo_options[popup_bgcolor]" class="cspopupseoo-color-box-farbtastic-inp" data-default-color="" />
													<input type="button" class="cspopupseoo-color-box-farbtastic button button-secondary" value="<?php _e('Select Color', 'cs-pop-up-seo-optimized'); ?>" />
													<div class="colorpicker" style="background-color: #666; z-index:100; position:absolute; display:none;"></div>
												</div>
												<?php } ?>
												<span class="description"><?php _e('Select Popup background color.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-fontcolor"><?php _e('Popup Fonts Color', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<?php if( $wp_version >= 3.5 ) { ?>
												<input type="text" value="<?php echo cspopupseoo_get_option('popup_fontcolor'); ?>" id="cspopupseoo-popup-fontcolor" name="cspopupseoo_options[popup_fontcolor]" class="cspopupseoo-color-box" /><br/>
												<?php } else { ?>
												<div style='position:relative;'>
													<input type='text' value="<?php echo cspopupseoo_get_option($cspopupseoo_options['popup_fontcolor']); ?>" id="cspopupseoo-color-box-farbtastic-inp" name="cspopupseoo_options[popup_fontcolor]" class="cspopupseoo-color-box-farbtastic-inp" data-default-color="" />
													<input type="button" class="cspopupseoo-color-box-farbtastic button button-secondary" value="<?php _e('Select Color', 'cs-pop-up-seo-optimized'); ?>" />
													<div class="colorpicker" style="background-color: #666; z-index:100; position:absolute; display:none;"></div>
												</div>
												<?php } ?>
												<span class="description"><?php _e('Select Popup font color.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-border-width"><?php _e('Popup Border Width', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="number" name="cspopupseoo_options[popup_border_width]" value="<?php echo $cspopupseoo_options['popup_border_width']; ?>" class="cspopupseoo-popup-border-width" id="cspopupseoo-popup-border-width" min="0" /> <label for="cspopupseoo-popup-border-width"><?php _e('Px', 'cspopupseoo'); ?></label> <br/>
												<span class="description"><?php _e('Enter width of popup border.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-border-width"><?php _e('Popup Border Radius', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<input type="number" name="cspopupseoo_options[popup_border_radius]" value="<?php echo $cspopupseoo_options['popup_border_radius']; ?>" class="cspopupseoo-popup-border-radius" id="cspopupseoo-popup-border-radius" min="0" /> <label for="cspopupseoo-popup-border-radius"><?php _e('Px', 'cspopupseoo'); ?></label> <br/>
												<span class="description"><?php _e('Enter border radius of popup.', 'cspopupseoo'); ?></span>
											</td>
										</tr>

										<tr>
											<th scope="row">
												<label for="cspopupseoo-popup-delay"><?php _e('Popup Border Color', 'cs-pop-up-seo-optimized'); ?>:</label>
											</th>
											<td>
												<?php if( $wp_version >= 3.5 ) { ?>
												<input type="text" value="<?php echo $cspopupseoo_options['popup_border_color']; ?>" id="cspopupseoo-popup-bgcolor" name="cspopupseoo_options[popup_border_color]" class="cspopupseoo-color-box" /><br/>
												<?php } else { ?>
												<div style='position:relative;'>
													<input type='text' value="<?php echo $cspopupseoo_options['popup_border_color']; ?>" id="cspopupseoo-color-box-farbtastic-inp" name="cspopupseoo_options[popup_border_color]" class="cspopupseoo-color-box-farbtastic-inp" data-default-color="" />
													<input type="button" class="cspopupseoo-color-box-farbtastic button button-secondary" value="<?php _e('Select Color', 'cs-pop-up-seo-optimized'); ?>" />
													<div class="colorpicker" style="background-color: #666; z-index:100; position:absolute; display:none;"></div>
												</div>
												<?php } ?>
												<span class="description"><?php _e('Select Popup border color.', 'cs-pop-up-seo-optimized'); ?></span>
											</td>
										</tr>

										<tr>
											<td colspan="2" valign="top" scope="row">
												<input type="submit" id="cspopupseoo-settings-submit" name="cspopupseoo-settings-submit" class="button button-primary right" value="<?php _e('Save Changes','cs-pop-up-seo-optimized');?>" />
											</td>
										</tr>
									</tbody>
								</table>
								<style>.form-table th, .form-table td { width: 100%; display: inline-block; margin: 0; padding: 0; } tr { padding: 20px 0; display: inline-block; width: 100%; border-bottom: 1px solid #e6e6e6; } input#cspopupseoo-settings-submit { float: left; } th label { font-size: 14px; margin-bottom: 10px; display: inline-block; color: #2d2d2d; }</style>
							</div>
						</div><!-- .inside -->
					</div><!-- #appearance -->
				</div><!-- .meta-box-sortables ui-sortable -->
			</div><!-- .metabox-holder -->
		</div><!-- #cspopupseoo-appearance-settings -->
		<!-- Appearance Setting Box Ends -->
		<div class="cspopupseoo-sidebar" style="float: left; width: 25%; margin-left: 2%; margin-top: 11px;">
		<a href="http://bit.ly/2mzWRKN" target="_blank">
			<img class="infoimage" alt="info image" src="http://bit.ly/2mwmlZ0" alt="">
			</a>
		</div>

	</form><!-- end .cspopupseoo-settings-form -->

</div><!-- end .cspopupseoo-settings -->