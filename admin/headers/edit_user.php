<?php
session_start();
require_once("../../scripts/config.php");
require_once("../../scripts/functions.php");
/*if(@$_SESSION['LOGGEDIN'] != true){
	header("location: ./");exit;
}*/

$id = mysql_escape_String($_POST['id']);
$fname = mysql_escape_String($_POST['firstname']);
$lname = mysql_escape_String($_POST['lastname']);
$uname = mysql_escape_String($_POST['username']);

 MysqlQuery("update login set firstname='".$fname."', lastname='".$lname."', username='".$uname."' where user_id='".$id."'");

