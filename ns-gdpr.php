<?php
/*
Plugin Name: NS GDPR Helper
Plugin URI: https://wordpress.org/plugins/ns-facebook-pixel-for-wp/
Description: This plugin helps you to comply with the European General Data Protection Regulation (GDPR)
Version: 1.1.6
Author: NsThemes
Author URI: http://www.nsthemes.com
Text Domain: ns-gdpr
Domain Path: /languages
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-gdpr',
    'main_file_name'            => 'ns-gdpr.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-gdpr%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '207',
    'plugin_token'              => 'NWNmZTUyMDc4YzdmZmQ1MTFiNWQ0NjkwMjdkYWNjZGRiOTI0MzY4YzkwNjk0NzM0OTVlMGRhOGI0MmYxYTBjNDI4M2ZkNjhjNzcwZDM=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj207 = new pluginEye($plugineye);
$plugineyeobj207->pluginEyeStart();      


/*========================================================*/
/*						   REQUIRE FILES				  */
/*========================================================*/
require_once( plugin_dir_path( __FILE__ ).'ns-gdpr-options.php');
require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');
require_once( plugin_dir_path(__FILE__).'woocommerce/ns-wc-gdpr-checkout.php');
require_once( plugin_dir_path(__FILE__).'comments/ns-gdpr-comments.php');
require_once( plugin_dir_path(__FILE__).'contact-form-7/ns-gdpr-contact-form.php');


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nsgdpr_add_action_links' );

function nsgdpr_add_action_links ( $links ) {	
 $mylinks = array('<a id="nsgdprlinkpremium" href="https://www.nsthemes.com/?ref-ns=2&campaign=GDPR-linkpremium" target="_blank">'.__( 'Join NS Club', 'ns-gdpr' ).'</a>');
return array_merge( $links, $mylinks );
}
?>