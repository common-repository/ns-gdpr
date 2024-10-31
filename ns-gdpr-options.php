<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ns_gdpr_options()
{
	//COMMENTS
	add_option('ns-gdpr-enable-comments', '');
	add_option('ns-gdpr-comments-checkbox-text', '');
	add_option('ns-gdpr-comments-checkbox-error-text', '');

	//CONTACT FORM 7
	add_option('ns-gdpr-enable-cf7', '');
	add_option('ns-gdpr-enable-cf7-text', '');
	add_option('ns-gdpr-enable-cf7-error-text', '');

	//WOOCOMMERCE
	add_option('ns-gdpr-enable-wc', '');
	add_option('ns-gdpr-enable-wc-text', '');
	add_option('ns-gdpr-enable-wc-error-text', '');
}

register_activation_hook( __FILE__, 'ns_gdpr_options');

function ns_gdpr_register_options_group(){
	/*Field options*/

	//COMMENTS
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-comments'); 
	register_setting('ns_gdpr_options_group', 'ns-gdpr-comments-checkbox-text'); 
	register_setting('ns_gdpr_options_group', 'ns-gdpr-comments-checkbox-error-text'); 

	//CONTACT FORM 7
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-cf7');
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-cf7-text');
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-cf7-error-text');

	//WOOCOMMERCE
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-wc');
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-wc-text');
	register_setting('ns_gdpr_options_group', 'ns-gdpr-enable-wc-error-text');
	
}

add_action ('admin_init', 'ns_gdpr_register_options_group');

?>