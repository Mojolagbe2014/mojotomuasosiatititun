<?php
session_start();
include ('../scripts/config.php');
include('../scripts/DBClass.php');
include('../scripts/user_functions.php');

$database = new Database();
$data = array('event_id'=>$_POST['eventID'],"name"=>$_POST['name'],"company"=>$_POST['company'],"email"=>$_POST['email'],"message"=>$_POST['message'],"approver"=>$_POST['approvalPerson'],"approver_no"=>$_POST['approvalNumber']);

$database-> insert("registration",$data);
$id = $database->InsertID();
		
$to = 'info@tomassociatesng.com';
$subject = "New Course Registration for ".$_POST['eventTitle'];
$Email_message = "Name: ".$_POST['name']." \n";
$Email_message .= "\n";
$Email_message .= "Company: ".$_POST['company']." \n";
$Email_message .= "\n";
$Email_message .= "Email: ".$_POST['email']." \n\n";
$Email_message .= "Phone: ".$_POST['telephone']." \n\n";
$Email_message .= "Approval Person: ".$_POST['approvalPerson']." \n\n";
$Email_message .= "Approva's Contact Number: ".$_POST['approvalNumber']." \n\n";
$Email_message .= "Event Title: ".$_POST['eventTitle']." \n";
$Email_message .= "Comments: ".$_POST['message']." \n\n";
$Email_message .= "\n";
$headers = "From: Course Registration <info@tomassociatesng.com>";

if(mail($to, $subject, $Email_message, $headers));


		
$_SESSION['regNumber'] = $resitrationNumber = 1000 + $id;
	
$database -> update("registration","reg_number='".$resitrationNumber."'","reg_id=".$id);

echo 'Registration successful, Redirecting.....';
//$random = random(8);





?>