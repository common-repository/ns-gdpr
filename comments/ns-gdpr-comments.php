<?php
//Add Custom Checkbox with Gpr agreement


add_action( 'comment_form', 'ns_comments_gpr_field' );
function ns_comments_gpr_field(){
    $comment_option = get_option('ns-gdpr-enable-comments');
    if($comment_option == 'on'){
        $comment_text_option = get_option('ns-gdpr-comments-checkbox-text');
        $comment_txt = 'Accept this form you agree with GDPR compliance of this site.';
        if($comment_text_option != ''){
            $comment_txt = $comment_text_option;
        }
        
        echo '<p class="ns-comments-gpr-field"><div><input type="checkbox" name="ns-comments-grp-accept-checkbox" required/> '.$comment_txt.' <span class="required">*</span></div></p>';
    }

}






add_filter( 'preprocess_comment', 'ns_comments_gpr_verify_meta_data' );
function ns_comments_gpr_verify_meta_data( $commentdata )
{
    $comment_option = get_option('ns-gdpr-enable-comments');
    if($comment_option == 'on'){
        if ( !isset($_POST['ns-comments-grp-accept-checkbox']) ){
            $comment_error_option = get_option('ns-gdpr-comments-checkbox-error-text');
            $err_txt = 'You need to accept the privacy policy.';
            if($comment_error_option != ''){
                $err_txt = $comment_error_option;
            }
            wp_die( __( '<strong>ERROR</strong>: '.$err_txt ) );
        }      
        return $commentdata;
    }

}

?>