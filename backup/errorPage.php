<?php
require_once("scripts/config.php");
require_once("scripts/functions.php");
if(connection());
$recordperpage =  6;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
$result = MysqlSelectQuery("select * from uploads order by id desc limit $offset, $recordperpage");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Error 404 - Tom Associates Training</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
	 $(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
				});
</script>
<script src="./audiojs/audio.min.js"></script>
  <!--  <link rel="stylesheet" href="./audiojs/includes/index.css" media="screen">-->
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
</head>

<body id="page1">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="main">
		<!-- header -->
		<div id="header">
			<div class="row-1">
         	<div class="indent"><a href="index.html" style="float:left"><img alt="" src="images/logo.png" /></a><div class="banner"><a href="http://twitter.com/tomassociatesng" target="_blank"><img src="images/twitter.png" alt="" width="32" height="32" /></a><a href="http://www.facebook.com/pages/Tom-Associates-Training/300089356711055" target="_blank"><img src="images/facebook.png" alt="" width="32" height="32" /></a><img src="images/google.png" alt="" width="32" height="32" /><img src="images/youtube.png" alt="" width="32" height="32" /></div></div>
         </div>
        
			<div class="row-2">
         	<ul id="site-nav">
            	<li><a href="./">Home</a></li>
               <li><a href="about-us">About Us</a></li>
               <li><a href="services">Our Services</a></li>
               <li><a href="corporate-training">Corporate Training</a></li>
               <li><a href="resources">Resources</a></li>
               <li><a href="calendar">Training Calender</a></li>
               <li class="active"><a href="downloads">Downloads</a></li>
               <li><a href="contact-us">contacts</a></li>
            </ul>
         </div>
         </div>
         <div id="inner-border">
         
		<!-- content -->
		<div id="content">
		  <div class="row-2">
         
         
       	   <div class="line-ver">
               <div class="line-ver-top">
                  <div class="line-ver-bottom">
                     <div class="container">
                     
                        <div class="col-1">
                          <h2 class="header-corporate-error">Sorry page not found!</h2><br />
                          <p style="font-size:14px">Sorry the page you requested could not be found on our server, Please feel free to navigate around the website</p>
                       </div>
                        <?php include("scripts/side-courses.php");?>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
		</div>
        </div>
        </div>
		<!-- footer -->
		<?php include("scripts/footer.php");?>
	
</body>
</html>