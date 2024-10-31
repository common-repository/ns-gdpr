<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once( plugin_dir_path( __FILE__ ) .'inc.php');

$link_sidebar = $ns_url_plugin_premium.'?ref-ns=2&campaign=NSGDPR-nsclub&utm_source='.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Sidebar%20premium';
$link_bannerino = $ns_url_plugin_premium.'?ref-ns=2&campaign=NSGDPR-bannerino&utm_source='.$ns_menu_label.'%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Bannerino%20premium'; 
$link_bannerone = $ns_url_plugin_premium.'?ref-ns=2&campaign=NSGDPR-bannerone&utm_source='.$ns_menu_label.'%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign='.$ns_menu_label.'%20Bannerone%20premium'; 
$link_promo_theme = $ns_url_theme_promo.'?ref-ns=2&campaign=NSGDPR-MisterCorporate&utm_source='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20'.$ns_theme_promo_slug.'%20dentro%20settings&utm_campaign='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar%20premium';
?>

	    <div class="verynsbigbox">
	    	<?php 
	    		/* *** BOX THEME PROMO *** */
				require_once( plugin_dir_path( __FILE__ ) .'ns_settings_box_theme_promo.php');

	    		/* *** BOX PREMIUM VERSION *** */
				// require_once( plugin_dir_path( __FILE__ ) .'ns_settings_box_pro_version.php');

	    		/* *** BOX NEWSLETTER *** */
				// require_once( plugin_dir_path( __FILE__ ) .'ns_settings_box_newsletter.php');
			?>			
		</div>

<div class="verynsbigboxcontainer">	

			<div class="icon32" id="icon-options-general"><br /></div>
			<h2 class="ns-gdpr-color"><?php echo $ns_full_name; ?> Settings</h2>
			<form method="post" action="options.php" >
	    		<?php /* *** BOX THEME PROMO *** */ ?>
				<?php require_once( plugin_dir_path( __FILE__ ).'ns_settings_custom.php'); ?>				
				<p><input type="submit" class="button-primary ns-gdpr-submit-button" id="submit" name="submit" value="<?php _e('Save Changes') ?>" /></p>		
			</form>
</div>
<!-- 		<div><p><?php #echo '<a href="'.$link_bannerino.'" target="_blank"><img src="'.plugin_dir_url( __FILE__ ).'img/'.$ns_slug.'-bannerino.png"></a>'; ?></p></div>
 -->





