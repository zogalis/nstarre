<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "kim.zogalis@gmail.com";
    $email_subject = "Web Contact Message";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['cf_name']) ||
        !isset($_POST['cf_email']) ||
        !isset($_POST['cf_subject']) ||
        !isset($_POST['cf_message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $cf_name = $_POST['cf_name']; // required
    $cf_email = $_POST['cf_email']; // required
    $cf_subject = $_POST['cf_subject']; // not required
    $cf_message = $_POST['cf_message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$cf_email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$cf_name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
   
 
  if(strlen($cf_subject) < 2) {
    $error_message .= 'The Subject you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $cf_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($cf_name)."\n";
    $email_message .= "Email: ".clean_string($cf_email)."\n";
    
    $email_message .= "Subject: ".clean_string($cf_subject)."\n";
    $email_message .= "Message: ".clean_string($cf_message)."\n";
 
// create email headers
$headers = 'From: '.$cf_email."\r\n".
'Reply-To: '.$cf_email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $cf_subject, $cf_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>