<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
$errorArr = array();
$msg = ''; $msgStatus = '';

if(isset($_POST['subscriberSubmit'])){
    $email = filter_input(INPUT_POST, 'subscriberEmail', FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'subscriberEmail', FILTER_VALIDATE_EMAIL)) :  ''; 
    if($email == "") {array_push ($errorArr, "valid email ");}
    $name = filter_input(INPUT_POST, 'subscriberName') ? mysqli_real_escape_string($database->link, filter_input(INPUT_POST, 'subscriberName')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
   
    $data = array("emails"=>$email, "name"=>$name);
            
    if(count($errorArr) < 1)   {
        $emailExists = $database -> select(false,"subscribers"," emails = '".$email."' ","emails LIMIT 1 ");
        if(count($emailExists)>0){
            $msgStatus = 'error';
            $msg ='<h3>Subscription failed!</h3><p>REASON: You have already subscribed to our site.</p>';
        }
        else{
            $msgStatus = ($database ->insert('subscribers', $data) > 0) ? 'success' : 'error';
            $msg = ($msgStatus == 'success') ? '<h3>SUCCESS</h3><p>You have successfully subscribed to our site.</p>' : '<h3>ERROR</h3><p>Website subscription failed.</p>';
        }
    }else{ 
        $msgStatus = 'error'; $msg = $errorArr; 
    }
    $_SESSION['msgStatus'] = $msgStatus;
    $_SESSION['msg'] = $msg;
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
