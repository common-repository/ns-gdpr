jQuery( document ).ready(function($) {
   $('.wpcf7-submit').on('click', function(event) {
      if(!$('#ns-gdpr-cf7-checkbox-id').is(":checked")){

         $('#ns-gdpr-error-message').show();
      }
      else{
         $('#ns-gdpr-error-message').hide();
      }
   });

});
