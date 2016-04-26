<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/calender.css" />
</head>
<body style="background: #fff;">
<div class="event_wrapper">
	<?php $day = $_GET['day']; $month = $_GET['month']; $year = $_GET['year']; list_events($day,$month,$year);?>
</div>
</body> 
</html>