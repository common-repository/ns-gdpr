<?php	
//Add Custom Checkbox with Gpr agreement
add_action('woocommerce_review_order_before_submit', 'ns_wc_gdpr_add_checkbox_field');
function ns_wc_gdpr_add_checkbox_field($checkout){
    $wc_option = get_option('ns-gdpr-enable-wc');
    if($wc_option == 'on'){
        $wc_text_option = get_option('ns-gdpr-enable-wc-text');
        $wc_txt = 'Accept this form you agree with GDPR compliance of this site.';

        if($wc_text_option != ''){
            $wc_txt = $wc_text_option;
        }

        echo '<div class="ns_wc_gdpr_container_class">';
        woocommerce_form_field( 'ns_wc_gdpr_checkbox', array(
            'type'          => 'checkbox',
            'label'         => $wc_txt,
            'required'  => true,
        ));

        echo '</div>';
    } 
}

//Add error section if the checkbox isnt set. 
add_action('woocommerce_checkout_process', 'ns_wc_gdpr_process_checkbox');
function ns_wc_gdpr_process_checkbox() {
    $wc_option = get_option('ns-gdpr-enable-wc');
    if($wc_option == 'on'){
        $wc_err_option = get_option('ns-gdpr-enable-wc-error-text');
        $wc_err = 'You need to accept the privacy policy.';

        if($wc_err_option != ''){
            $wc_err = $wc_err_option;
        }

        global $woocommerce;

        if (!$_POST['ns_wc_gdpr_checkbox'])
            wc_add_notice( $wc_err, 'error' );
    }
}

?>