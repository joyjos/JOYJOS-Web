<?php

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
    $recaptcha_secret = '6LeMaOkfAAAAAIuneT42qEU5uo5oNY5NXehyg1Ef'; 
    $recaptcha_response = $_POST['recaptcha_response']; 
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
    $recaptcha = json_decode($recaptcha); 
    
    if($recaptcha->score >= 0.7){
    
      // Receiving email address
      $receiving_email_address = 'info@joyjos.eu';

      if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
        include( $php_email_form );
      } else {
        die( 'No se puede cargar la librería "PHP Email Form"!');
      }

      $contact = new PHP_Email_Form;
      $contact->ajax = true;
      
      $contact->to = $receiving_email_address;
      $contact->from_name = $_POST['name'];
      $contact->from_email = $_POST['email'];
      $contact->subject = $_POST['subject'];

      $contact->add_message( $_POST['name'], 'From');
      $contact->add_message( $_POST['email'], 'Email');
      $contact->add_message( $_POST['message'], 'Message', 10);
      echo $contact->send();
    
    } else {
    
      echo "Eres un Robot";
    
    }

?>