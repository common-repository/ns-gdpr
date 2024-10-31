<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* *** *********************************************************************** *** */
/* *** REMEMBER TO CHANGE $ns_plugin_prefix IN  admin_enqueue_scripts FUNCTION *** */
/* *** *********************************************************************** *** */


/* *** add menu page and add sub menu page *** */
add_action( 'admin_menu', function()  {
    add_menu_page( 'NS GDPR', 'NS GDPR', 'manage_options', plugin_dir_path( __FILE__ ) .'/ns_admin_option_dashboard.php', '', plugin_dir_url( __FILE__ ).'img/backend-sidebar-icon.png', 60);
	add_submenu_page(plugin_dir_path( __FILE__ ) .'/ns_admin_option_dashboard.php', 'Join the NS CLUB', 'Join the NS CLUB', 'manage_options', 'join-the-club', function(){  wp_redirect('https://www.nsthemes.com/join-the-club/'); exit; });
});


/* *** *********************************************************************** *** */
/* ***     REMEMBER TO CHANGE FUNCTION NAME WITH THE PREFIX OF THIS PLUGIN     *** */
/* *** *********************************************************************** *** */
/* *** add menu page and add sub menu page *** */
function nsgdpr_preprocess_pages($value){
    global $pagenow;
    $page = (isset($_REQUEST['page']) ? $_REQUEST['page'] : false);
    if($pagenow=='admin.php' && $page=='join-the-club'){
        wp_redirect('https://www.nsthemes.com/join-the-club/');
        exit;
    }
}
add_action('admin_init', 'nsgdpr_preprocess_pages');




/* *** add style *** */
add_action( 'admin_enqueue_scripts', function() {
	$ns_plugin_prefix = 'nsgdpr';
	wp_enqueue_style('ns-'.$ns_plugin_prefix.'-option-css-page', plugin_dir_url( __FILE__ ) . 'css/ns-option-css-page.css');
	wp_enqueue_style('ns-'.$ns_plugin_prefix.'-option-css-a-page', plugin_dir_url( __FILE__ ) . 'css/ns-option-css-custom-page.css');
});


/* *** add frontend *** */
add_action( 'wp_enqueue_scripts', function() {
	$ns_plugin_prefix = 'nsgdpr';
	wp_enqueue_script( 'ns-'.$ns_plugin_prefix.'-option-js-page-frontend', plugins_url( '/js/ns-option-js-frontend.js' , __FILE__ ), array( 'jquery' ) );
});
?>