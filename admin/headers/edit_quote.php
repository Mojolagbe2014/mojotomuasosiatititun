<?php
session_start();
require_once("../../scripts/config.php");
require_once("../../scripts/functions.php");
/*if(@$_SESSION['LOGGEDIN'] != true){
	header("location: ./");exit;
}*/

$id = mysql_escape_String($_POST['id']);
$quote = mysql_escape_String($_POST['quote']);

 MysqlQuery("update quotes set content='".$quote."' where quote_id='".$id."'");

