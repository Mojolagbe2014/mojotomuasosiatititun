<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

$result = MysqlSelectQuery("select * from events");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calendar</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />

<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link rel="stylesheet" type="text/css" href="css/calender.css" />
<link href="style/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
 
 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.colorbox.js"></script>
     
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
  	<?php include ("headers/header.php");?>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main"><span class="outer"><span class="inner content">Articles</span></span></a></li>
        <li class="item middle" id="three"></li>
        <li class="item middle" id="four"><a href="#" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
		<li class="item middle" id="five"><a href="media" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="events" class="main current"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="newsletters" class="main"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
		<li class="item last" id="eight"><a href="accounts" class="main"><span class="outer"><span class="inner settings">Accounts</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="events.php"><span>Events Listing</span></a></li>
                      <li><a href="newevents.php"><span>New Event</span></a></li>
                      <li><a href="#" class="current"><span>Calendar</span></a></li>
                      <li><a href="search_event.php" ><span>Search Events</span></a></li>
                       
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->
<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 >Calendar</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">You have a total of (<?php echo NUM_ROWS($result);?>) events</a>
    	<div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
    <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <!--  SECOND SORTABLE COLUMN END -->
      <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        
		<div class="portlet-content nopadding">
        <?php
		
		$first_day_of_week = 'Monday';
	$type = CAL_GREGORIAN;
	$month = trim(stripslashes(strip_tags(@$_GET['month'])));
	$year = trim(stripslashes(strip_tags(@$_GET['year'])));
	if(!@$_GET['month'] || !is_numeric(@$_GET['month'])) $month = date('n');
	if(!@$_GET['year'] || !is_numeric(@$_GET['year'])) $year = date('Y');
	$today = date('Y/n/d');
	$day_count = cal_days_in_month($type, $month, $year);

	echo "<div id='calendar'>";
	echo "<div id='calendar_wrap'>";

	$last_month = $month - 1;
	$next_month = $month + 1;
	
	$last_year = $year - 1;
	$next_year = $year + 1;

	if($month == 12): 
		$change_year = $year; 
		$change_month  = $last_month;
	elseif($month == 1): 
		$change_year = $last_year;
		$change_month  = '12'; 
	else:
		$change_year = $year; 
		$change_month  = $last_month;
	endif;
		
	if($month == 1): 
		$change_year_next = $year; 
		$change_month_next  = $next_month;
	elseif($month == 12): 
		$change_year_next = $next_year;
		$change_month_next  = '1'; 
	else: 
		$change_year_next = $year; 
		$change_month_next  = $next_month;
	endif;

	echo "<div class='title_bar'>";
	echo "<a href='".$_SERVER['PHP_SELF']."?month=". $change_month ."&year=". $change_year ."'><div class='previous'> Prev </div></a>";
	echo "<a href='".$_SERVER['PHP_SELF']."?month=". $change_month_next ."&year=". $change_year_next ."'><div class='next'> Next </div></a>";
	echo "</div><div class='clear'></div>";
	echo "<div class='sub_head'><h2 class='month'>" . date('F',  mktime(0,0,0,$month,1)) . "&nbsp;" . $year . "</h2></div><div id='calendar_event'>";
/* Previous Month */

	$first_day = date('N', mktime(0,0,0,$month,1,$year));

	if ( ($first_day_of_week=='Monday' && $first_day != 1) || ($first_day_of_week=='Sunday' && $first_day != 7) ) :

	$last_month_day_count = cal_days_in_month($type, $change_month, $change_year);
	
	if ($first_day_of_week=='Monday') :
		if ( 'Monday' == date('l', mktime(0,0,0,$change_month,$last_month_day_count,$change_year)) ) :
			$final_day = date('j', mktime(0,0,0,$change_month,$last_month_day_count,$change_year));
		else :
			$final_day = date('j', strtotime('last Monday', mktime(0,0,0,$change_month,$last_month_day_count,$change_year) ) );
		endif;
	else :
		if ( 'Sunday' == date('l', mktime(0,0,0,$change_month,$last_month_day_count,$change_year)) ) :
			$final_day = date('j', mktime(0,0,0,$change_month,$last_month_day_count,$change_year));
		else :
			$final_day = date('j', strtotime('last Sunday', mktime(0,0,0,$change_month,$last_month_day_count,$change_year) ) );
		endif;
	endif;
	
	for($i=$final_day; $i<=$last_month_day_count; $i++):
		
		$date = $change_year.'/'.$change_month.'/'.$i;
		
		$get_name = date('l', strtotime($date));
		$month_name = date('F', strtotime($date));
		$day_name = substr($get_name, 0, 3);
		
		$count = count_events($i,$change_month,$change_year);
			
		echo "<a href='day_view.php?day=$i&month=$change_month&year=$change_year' title='$i $month_name' rel='day_view'>";
		echo "<div class='event_day last_month'>";
			
			echo "<div class='event_heading'>" . $day_name . "</div>";
			
			if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
			
			if($today == $date): 
				echo "<div class='event_number today'>" . $i . "</div>";
			else: 
				echo "<div class='event_number'>" . $i . "</div>";
			endif;	
			
		echo "</div>";
		echo "</a>";
		
	endfor;

endif;

for($i=1; $i<= $day_count; $i++):

	$date = $year.'/'.$month.'/'.$i;
	
	$get_name = date('l', strtotime($date));
	$month_name = date('F', strtotime($date));
	$day_name = substr($get_name, 0, 3);
	
	$count = count_events($i,$month,$year);
		
	echo "<a href='day_view.php?day=$i&month=$month&year=$year' title='$i $month_name' rel='day_view'>";
	echo "<div class='event_day'>";
		
		echo "<div class='event_heading'>" . $day_name . "</div>";
		
		if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
		
		if($today == $date):
			echo "<div class='event_number today'>" . $i . "</div>";
		else: 
			echo "<div class='event_number'>" . $i . "</div>";
		endif;	
		
	echo "</div>";
	echo "</a>";
	
endfor;
$last_day = date('N', mktime(0,0,0,$month,$day_count,$year));

if ( ($first_day_of_week=='Monday' && $last_day != 7) || ($first_day_of_week=='Sunday' && $last_day != 1) ) :
	
	if ($first_day_of_week=='Monday') :
		if ( 'Sunday' == date('l', mktime(0,0,0,$change_month_next,1,$change_year_next)) ) :
			$first_day = date('j', mktime(0,0,0,$change_month_next,1,$change_year_next));
		else :
			$first_day = date('j', strtotime('first Sunday', mktime(0,0,0,$change_month_next,1,$change_year_next) ) );
		endif;
	else :
		if ( 'Saturday' == date('l', mktime(0,0,0,$change_month_next,1,$change_year_next)) ) :
			$first_day = date('j', mktime(0,0,0,$change_month_next,1,$change_year_next));
		else :
			$first_day = date('j', strtotime('first Saturday', mktime(0,0,0,$change_month_next,1,$change_year_next) ) );
		endif;	
	endif;
	
	
	for($i=1; $i<=$first_day; $i++): 
		
		$date = $change_year_next.'/'.$change_month_next.'/'.$i;
		
		$get_name = date('l', strtotime($date));
		$month_name = date('F', strtotime($date));
		$day_name = substr($get_name, 0, 3);
		
		$count = count_events($i,$change_month_next,$change_year_next);
			
		echo "<a href='day_view.php?day=$i&month=$change_month_next&year=$change_year_next' title='$i $month_name' rel='day_view'>";
		echo "<div class='event_day next_month'>";
			
			echo "<div class='event_heading'>" . $day_name . "</div>";
			
			if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
			
			if($today == $date): 
				echo "<div class='event_number today'>" . $i . "</div>";
			else:
				echo "<div class='event_number'>" . $i . "</div>";
			endif;
			
		echo "</a></div>";
		
	endfor;

endif;

	echo "</div>";
	echo "</div>";
		?>
        <script type="text/javascript">
jQuery(document).ready(function(){ $("a[rel='day_view']").colorbox({width:"700px", height:"500px", iframe:true}); });
</script>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">Tom Associates Training</div>
<!-- FOOTER END -->
</body>
</html>
