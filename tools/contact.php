<?php
session_start();
include ('../scripts/config.php');
include('../scripts/DBClass.php');
include('../scripts/user_functions.php');

$name = $_POST['name'];
$email = $_POST['email'];
$title = $_POST['subject'];
$phone = $_POST['telephone'];
$message = $_POST['message'];

$to = 'info@tomassociatesng.com';
$subject = $title;
$Email_message = "$name ($email) \n";
$Email_message .= "\n";
$Email_message .= "Phone: ($phone)";
$Email_message .= "\n";
$Email_message .= "Email: ($email)";
$Email_message .= "\n";
$Email_message .= "$message";
$Email_message .= "\n";
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $name <$email>";
if(mail($to, $subject, $Email_message, $headers)) echo 'sent';
//$random = random(8);





?>