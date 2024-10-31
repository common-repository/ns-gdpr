<?php
//Creating shortcode for ContactForm7 to show the checkbox
add_action( 'wpcf7_init', 'ns_gdpr_cf7_shortcodes' );
function ns_gdpr_cf7_shortcodes(){
    $cf7_option = get_option('ns-gdpr-enable-cf7');
    
    if($cf7_option == 'on'){

        //Getting all cf7 created forms
        $args = array( 
            'numberposts' => -1,
            'post_type' => 'wpcf7_contact_form'
        );

        $posts = get_posts($args);

        //Loop over the forms and update _form post metas adding my shortcode
        foreach($posts as $form){
            $form_meta = get_post_meta( $form->ID, '_form', true );
            
            //If the shortcode isnt already been insert inside the cf7 form, then add it
            if (strpos($form_meta, '[ns_gdpr_cf7]') == false) {
                $new_form_meta = str_replace('[submit "Send"]', '[ns_gdpr_cf7] <br> [submit "Send"]', $form_meta);
                update_post_meta( $form->ID, '_form', $new_form_meta );
                
            }

        }wpcf7_add_form_tag( 'ns_gdpr_cf7', 'ns_gdpr_cf7_render_checkboxes' );
    }
    else{
        //DELETE SHORTCODE CASE
        //Getting all cf7 created forms
        $args = array( 
            'numberposts' => -1,
            'post_type' => 'wpcf7_contact_form'
        );

        $posts = get_posts($args);

        //Loop over the forms and update _form post metas adding my shortcode
        foreach($posts as $form){
            $form_meta = get_post_meta( $form->ID, '_form', true );
            
            //If the shortcode is already been insert inside the cf7 form, then delete it
            if (strpos($form_meta, '[ns_gdpr_cf7]') != false) {
                $new_form_meta = str_replace('[ns_gdpr_cf7] <br> [submit "Send"]', '[submit "Send"]', $form_meta);
                update_post_meta( $form->ID, '_form', $new_form_meta );
            }

        }
    }

}

function ns_gdpr_cf7_render_checkboxes(){
    $cf7_text_option = get_option('ns-gdpr-enable-cf7-text');
    $cf7_txt = 'Accept this form you agree with GDPR compliance of this site.';

    if($cf7_text_option != ''){
        $cf7_txt = $cf7_text_option;
    }

    
    $cf7_err_option = get_option('ns-gdpr-enable-cf7-error-text');
    $cf7_err = 'You need to accept the privacy policy.';

    if($cf7_err_option != ''){
        $cf7_err = $cf7_err_option;
    }


    $html = '<span class="wpcf7-form-control-wrap ns-gdpr-wpgdprc"><input type="checkbox" id="ns-gdpr-cf7-checkbox-id" name="ns-gdpr-cf7-checkbox" value="accept" aria-required="true" aria-invalid="false" required/>'.$cf7_txt.'</span><br><span role="alert" id="ns-gdpr-error-message" class="ns-gdpr-error-message" style="display:none; color: #f00; font-size: 1em; font-weight: normal;">'.$cf7_err.'</span>';
    return $html;
}

//Check before sending mail

add_filter("wpcf7_validate_ns_gdpr_cf7", 'ns_gdpr_cf7_validate', 10, 2);

function ns_gdpr_cf7_validate($result, $tag) {
    
    $cf7_option = get_option('ns-gdpr-enable-cf7');
    if($cf7_option == 'on'){
        switch ($tag->type) {
            case 'ns_gdpr_cf7' :
                $tag->name = 'ns_gdpr_cf7';
                $name = $tag->name;

                if(!isset($_POST['ns-gdpr-cf7-checkbox'])){
                    $value = 'false';
                }
                else{
                    $value = 'true';
                }
                update_option('test_validate_cf7',   $value);
                if ($value === 'false') {
                    

                    $cf7_err_option = get_option('ns-gdpr-enable-cf7-error-text');
                    $cf7_err = 'You need to accept the privacy policy.';
                
                    if($cf7_err_option != ''){
                        $cf7_err = $cf7_err_option;
                    }


                    $result->invalidate($tag, $cf7_err);
                    
                    update_option('test_validate_cf7_2',  $result);
                }
                break;
        }
        return $result;
    }



}
?>