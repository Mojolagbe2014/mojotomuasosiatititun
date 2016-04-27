<?php
session_start();
include ('scripts/config.php');
include('scripts/DBClass.php');
include('scripts/user_functions.php');
$database = new Database();

$pageAuthor = "Tom Associates Training";
$pageTitle = "Calendar for Current Upcoming Courses - $pageAuthor";
$pageDescription = $pageTitle;
$pageKeywords = "course, upcoming, calendar";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/meta-tags.php'); ?>

        <!-- CSS Global -->
        <link href="<?php echo SITE_URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo SITE_URL; ?>assets/plugins/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/owlcarousel2/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">

        <link href="<?php echo SITE_URL; ?>assets/css/theme.css" rel="stylesheet">
        <link href="<?php echo SITE_URL; ?>assets/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/calender.css" />
        <link href="<?php echo SITE_URL; ?>assets/css/additional-style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SITE_URL; ?>assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SITE_URL; ?>assets/plugins/sweet-alert/google.css" rel="stylesheet" type="text/css"/>
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="home" class="wide body-light multipage">

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Wrap all content -->
        <div class="wrapper">

            <?php include('includes/header.php'); ?>

            <!-- Content area -->
            <div class="content-area">

                <section class="page-section image breadcrumbs overlay">
                    <div class="container">
                        <h1>Courses Calendar</h1>
                        <ul class="breadcrumb">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li class="active">Calendar</li>
                        </ul>
                    </div>
                </section>


                <!-- PAGE -->
                <section class="page-section">
                    <div class="container">
                        <div class="row">
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
	
	//previous and next
	if($month == 12): //month is december
		$change_year = $year; //assign current year because the year has not ended
		$change_month  = $last_month; //previous month i.e november
		$change_year_next = $next_year; //move to the new year
		$change_month_next  = '1'; //first month in the new year i.e january
	elseif($month == 1): // month is january
		$change_year = $last_year; //go to the previous year
		$change_month  = '12'; //go to the previous month i.e january
		$change_year_next = $year; //assign current year because the year has not ended
		$change_month_next  = $next_month; // go to the next month
	else:
		$change_year = $year; 
		$change_month  = $last_month;
		$change_year_next = $year; 
		$change_month_next  = $next_month;
	endif;
	
	//previous and next navigations
	echo "<div class='title_bar'>";
	echo "<a href='calendar?month=". $change_month ."&year=". $change_year ."'><div class='previous'> Prev </div></a>";
	echo "<a href='calendar?month=". $change_month_next ."&year=". $change_year_next ."'><div class='next'> Next </div></a>";
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
			
		echo "<a href='single-day-courses?day=$i&month=$change_month&year=$change_year&iframe=true&width=100%&height=100%' title='$i $month_name' rel='prettyPhoto[iframes]'>";
		echo "<div class='event_day last_month'>";
			
			echo "<div class='event_heading'>" . $day_name . "</div>";
			
			if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
			
			if($today == $date): 
				echo "<div class='event_number today'>" . $i . "</div>";
			else: 
				echo "<div class='event_number'>" . $i . "<p style=\"font-size:12px; text-align:center;\">$month_name</p></div>";
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
		
	echo "<a href='single-day-courses?day=$i&month=$month&year=$year&iframe=true&width=100%&height=100%' title='$i $month_name' rel='prettyPhoto[iframes]'>";
	echo "<div class='event_day'>";
		
		echo "<div class='event_heading'>" . $day_name . "</div>";
		
		if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
		
		if($today == $date):
			echo "<div class='event_number today'>" . $i . "</div>";
		else: 
			echo "<div class='event_number'>" . $i . "<p style=\"font-size:12px; text-align:center;\">$month_name</p></div>";
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
			
		echo "<a href='single-day-courses?day=$i&month=$change_month_next&year=$change_year_next&iframe=true&width=100%&height=100%' title='$i $month_name' rel='prettyPhoto[iframes]'>";
		echo "<div class='event_day next_month'>";
			
			echo "<div class='event_heading'>" . $day_name . "</div>";
			
			if($count >= 1) echo "<div class='event_count'><span class='event'>" . $count . "</span></div>";
			
			if($today == $date): 
				echo "<div class='event_number today'>" . $i . "</div>";
			else:
				echo "<div class='event_number'>" . $i . "<p style=\"font-size:12px; text-align:center;\">$month_name</p></div>";
			endif;
			
		echo "</a></div>";
		
	endfor;

endif;

	echo "<div class='clear'></div></div>";
	echo "</div><div class='clear'></div></div>";
		?>
    		</div><!--/ service box row end -->
                        
                    </div>
                </section>
                <!-- /PAGE -->              

            </div>
            <!-- /Content area -->

            <?php include('includes/footer.php'); ?>

            <div class="to-top"><i class="fa fa-angle-up"></i></div>          
        </div>

        <!-- /Wrap all content -->

        <?php include('includes/subscription-form.php'); ?>

        <!-- JS Global -->

        <!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
        <script src="assets/plugins/jquery/jquery-2.1.1.min.js"></script>
        <script src="assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script src="assets/plugins/modernizr.custom.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/plugins/superfish/js/superfish.js"></script>
        <script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script src="assets/plugins/placeholdem.min.js"></script>
        <script src="assets/plugins/jquery.smoothscroll.min.js"></script>
        <script src="assets/plugins/jquery.easing.min.js"></script>
        <script src="assets/plugins/smooth-scrollbar.min.js"></script>

        <!-- JS Page Level -->
        <script src="assets/plugins/owlcarousel2/owl.carousel.min.js"></script>
        <script src="assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="assets/plugins/countdown/jquery.plugin.min.js"></script>
        <script src="assets/plugins/countdown/jquery.countdown.min.js"></script>
        <script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
        <script src="../../../maps.googleapis.com/maps/api/js19f6?v=3.exp&amp;sensor=false"></script>
        <script src="assets/js/theme.js"></script>
        <script type="text/javascript">
            "use strict";
            jQuery(document).ready(function () {
                theme.init();
                theme.initMainSlider();
                theme.initCountDown();
                theme.initPartnerSlider2();
                theme.initImageCarousel();
                theme.initTestimonials();
                theme.initGoogleMap();
            });
            jQuery(window).load(function () {
                theme.initAnimation();
            });

            jQuery(window).load(function () {
                jQuery('body').scrollspy({offset: 100, target: '.navigation'});
            });
            jQuery(window).load(function () {
                jQuery('body').scrollspy('refresh');
            });
            jQuery(window).resize(function () {
                jQuery('body').scrollspy('refresh');
            });

            jQuery(document).ready(function () {
                theme.onResize();
            });
            jQuery(window).load(function () {
                theme.onResize();
            });
            jQuery(window).resize(function () {
                theme.onResize();
            });

            jQuery(window).load(function () {
                if (location.hash != '') {
                    var hash = '#' + window.location.hash.substr(1);
                    if (hash.length) {
                        jQuery('html,body').delay(0).animate({
                            scrollTop: jQuery(hash).offset().top - 44 + 'px'
                        }, {
                            duration: 1200,
                            easing: "easeInOutExpo"
                        });
                    }
                }
            });

        </script>

    </body>
</html>
