<html>
<head>
  <meta charset="utf-8">
  </head>
  <body>
<?php
if(isset($_POST['email'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "tazsoulis@hotmail.com";
    $email_subject = "Your email subject line";
    function died($error) {
        // your error code can go here
        echo "Λυπούμαστε αλλά υπάρχουν σφάλματα στην φόρμα που συμπληρώσατε.";
        echo "Τα σφάλματα φαίνονται παρακάτω. <br /><br />";
        echo $error."<br /><br />";
        echo "Παρακαλώ πηγαίνετε πίσω και διορθώστε τα. <br /><br />";
        die(); 
    }
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['surname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['description'])) {
        died('Λυπούμαστε αλλά υπάρχουν σφάλματα στην φόρμα που συμπληρώσατε.');       
    }
    $name = $_POST['name']; // required 
    $surname = $_POST['surname']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $description = $_POST['description']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Το email που πληκτρολογήσατε δεν είναι έγκυρο.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message); 
  }
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Last Name: ".clean_string($surname)."\n";
    $email_message .= "email: ".clean_string($email_from)."\n";
    $email_message .= "phone: ".clean_string($phone)."\n";
    $email_message .= "description: ".clean_string($description)."\n";
// create email headers
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
?> 
<!-- include your own success html here -->
Σας ευχαριστούμε που επικοινωνίσατε μαζί μας. Πολύ σύντομα θα επικοινωνήσουμε μαζί σας!
<?php 
}
?>
</body>