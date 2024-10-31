<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php // PUT YOUR settings_fields name and your input // ?>
<div class="genRowNssdc">
		
	<p class="description ns-gdpr-description">
	ACTIVATION THIS PLUGIN DOES NOT GUARANTEE YOU FULLY COMPLY WITH GDPR. PLEASE CONTACT A GDPR CONSULTANT OR LAW FIRM TO ASSESS NECESSARY MEASURES.
	</p>	



	<!-- checked="checked" -->
	<?php
		$comments_checkbox = get_option('ns-gdpr-enable-comments');
		$comments_text = get_option('ns-gdpr-comments-checkbox-text');
		$comments_text_error = get_option('ns-gdpr-comments-checkbox-error-text');

		$checked = '';
		if($comments_checkbox == 'on'){
			$checked = 'checked="checked"';
		}
	?>
	<div class="ns-gdpr-section-container">
		<h3><?php _e('Comments in WordPress', $ns_text_domain); ?></h3>
		<?php _e('Enable this to add GDPR checkbox in WordPress comments', $ns_text_domain); ?>
		<label class="ns-gdpr-container"><input class="ns-gdpr-checkbox" type="checkbox" name="ns-gdpr-enable-comments" id="" <?php echo $checked; ?>><span class="ns-gdpr-checkmark"></span></label><br><br>
		<label><?php _e('Checkbox text', $ns_text_domain); ?></label><textarea name="ns-gdpr-comments-checkbox-text" id="ns-gdpr-comments-checkbox-text" class="ns-gdpr-input"><?php echo $comments_text; ?></textarea><br>
		<label><?php _e('Error text', $ns_text_domain); ?></label> <input type="text" name="ns-gdpr-comments-checkbox-error-text" id="ns-gdpr-comments-checkbox-error-text" class="ns-gdpr-input" value="<?php echo $comments_text_error; ?>"><br>
	</div>


	<?php
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		$ns_gdpr_disable_option = "";
		$ns_gdpr_disable_option_text = "";
		$ns_gdpr_checkbox_cf7_style = '';
	} else {
		$ns_gdpr_disable_option = " disabled";
		$ns_gdpr_disable_option_text = '<p class="description ns-gdpr-notice-error">Plugin not istalled or disabled!</p>';
		$ns_gdpr_checkbox_cf7_style = 'style="background-color: #ccc;"';
	}
	?>
	<!-- checked="checked" -->
	<?php
		$cf7_checkbox = get_option('ns-gdpr-enable-cf7');
		$cf7_text = get_option('ns-gdpr-enable-cf7-text');
		$cf7_text_error = get_option('ns-gdpr-enable-cf7-error-text');

		$cf7_checked = '';
		if($cf7_checkbox == 'on'){
			$cf7_checked = 'checked="checked"';
		}
	?>
	<div class="ns-gdpr-section-container">
		<h3><?php _e('Contact Form 7', $ns_text_domain); ?></h3><?php echo $ns_gdpr_disable_option_text; ?>
		<?php _e('Enable this to add at all CF7 form GDPR checkbox ', $ns_text_domain); ?>
		<label class="ns-gdpr-container"><input class="ns-gdpr-checkbox" type="checkbox" name="ns-gdpr-enable-cf7" id="ns-gdpr-enable-cf7" <?php echo $ns_gdpr_disable_option.' '. $cf7_checked;?>><span class="ns-gdpr-checkmark" <?php echo $ns_gdpr_checkbox_cf7_style; ?>></span></label><br><br>
		<label><?php _e('Checkbox text', $ns_text_domain); ?></label> <textarea name="ns-gdpr-enable-cf7-text" id="ns-gdpr-enable-cf7-text" class="ns-gdpr-input"<?php echo $ns_gdpr_disable_option; ?>><?php echo $cf7_text; ?></textarea><br>
		<label><?php _e('Error text', $ns_text_domain); ?></label> <input type="text" name="ns-gdpr-enable-cf7-error-text" id="ns-gdpr-enable-cf7-error-text" class="ns-gdpr-input" value="<?php echo $cf7_text_error; ?>" <?php echo $ns_gdpr_disable_option; ?>><br>
	</div>



	<?php
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		$ns_gdpr_disable_option_woo = "";
		$ns_gdpr_disable_option_text_woo = "";
		$ns_gdpr_checkbox_wc_style = '';
	} else {
		$ns_gdpr_disable_option_woo = " disabled";
		$ns_gdpr_disable_option_text_woo = '<p class="description ns-gdpr-notice-error">Plugin not istalled or disabled!</p>';
		$ns_gdpr_checkbox_wc_style = 'style="background-color: #ccc;"';
	}
	?>
	<!-- checked="checked" -->
	<?php
		$wc_checkbox = get_option('ns-gdpr-enable-wc');
		$wc_text = get_option('ns-gdpr-enable-wc-text');
		$wc_text_error = get_option('ns-gdpr-enable-wc-error-text');

		$wc_checked = '';
		if($wc_checkbox == 'on'){
			$wc_checked = 'checked="checked"';
		}
	?>
	<div class="ns-gdpr-section-container">
		<h3><?php _e('WooCommerce', $ns_text_domain); ?></h3><?php echo $ns_gdpr_disable_option_text_woo; ?>
		<?php _e('Enable this to add GDPR checkbox in WooCommerce checkout', $ns_text_domain); ?>
		<label class="ns-gdpr-container"><input class="ns-gdpr-checkbox" type="checkbox" name="ns-gdpr-enable-wc" id="ns-gdpr-enable-wc" <?php echo $ns_gdpr_disable_option_woo.' '.$wc_checked;?>><span class="ns-gdpr-checkmark" <?php echo $ns_gdpr_checkbox_wc_style; ?>></span></label><br><br>
		<label><?php _e('Checkbox text', $ns_text_domain); ?></label> <textarea name="ns-gdpr-enable-wc-text" id="ns-gdpr-enable-wc-text" class="ns-gdpr-input"<?php echo $ns_gdpr_disable_option_woo; ?>><?php echo $wc_text; ?></textarea><br>
		<label><?php _e('Error text', $ns_text_domain); ?></label> <input type="text" name="ns-gdpr-enable-wc-error-text" id="ns-gdpr-enable-wc-error-text" class="ns-gdpr-input" value="<?php echo $wc_text_error; ?>"<?php echo $ns_gdpr_disable_option_woo; ?>><br>
	</div>



</div>

<?php settings_fields('ns_gdpr_options_group'); ?>
