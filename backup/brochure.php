<?php
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Daily event viewer, for current and upcoming events - Tom Associates Training -<?php echo $_GET['day']."-".$_GET['month']."-".$_GET['year'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily event viewer, for current and upcoming trainings,conferences and workshops-<?php echo $_GET['day']."-".$_GET['month']."-".$_GET['year'];?>"/>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/calender.css" />
	<link href="css/colobox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- Bxslider -->
	<link rel="stylesheet" href="css/jquery.bxslider.css">
    
</head>
<body style="background: #fff;">
<div class="event_wrapper">
	<?php $day = $_GET['day']; $month = $_GET['month']; $year = $_GET['year']; list_events($day,$month,$year);?>
</div>
</body> 
</html>