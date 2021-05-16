<?php

if(isset($_POST['email'])) {

	$receiving_email_address = 'awiskaar@awiskaar.com';

	$to = $receiving_email_address;
	$email_subject = "Website Contact Form from Awiskaar.com";


	$name = $_POST['name'];
	$email_address= $_POST['email'];
	$subject = $_POST['subject'];
	$message= $_POST['message'];


    $email_message = "Form details are given below.\n\n";


  function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");
      
      return str_replace($bad,"",$string);
 
  }

    $email_message .= "Name: ".clean_string($name)."\n";
    
    $email_message .= "Email Adress: ".clean_string($email_address)."\n";
    
    $email_message .= "Subject: ".clean_string($subject)."\n";
    
    $email_message .= "Message: ".clean_string($message)."\n";
 
   
      
    // create email headers
    
    $headers = 'From: '.$email_address."\r\n".
    
    'Reply-To: '.$email_address."\r\n" .
    
    'X-Mailer: PHP/' . phpversion();
    
    mail($to,$email_subject,$email_message,$headers);
    
    header("Location: index.html?mailsent");
    
}
?>
