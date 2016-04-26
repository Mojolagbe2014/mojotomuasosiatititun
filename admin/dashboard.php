<?php
session_start();
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

if(isset($_POST['sbmt_quote']) &&$_POST['sbmt_quote']  == 1){
MysqlQuery("insert into quotes(content,posted_date)
										  values('".$_POST['content']."','".date('Y-m-d')."')");
header("location:./dashboard");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
<script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>
<script id="source" language="javascript" type="text/javascript">
function Send(val){
	document.getElementById(val).value = 1;
			document.getElementById('quotes').submit();
}
</script>
<style type="text/css">
<!--
.quotes {
	display: block;
	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
	padding-bottom: 6px;
	padding-left: 6px;
}
-->
</style>
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      
  	<?php include ("headers/header.php");?>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main current"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main"><span class="outer"><span class="inner content">Articles</span></span></a></li>
        <li class="item middle" id="three"></li>
        <li class="item middle" id="four"><a href="subscribers" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
		<li class="item middle" id="five"><a href="media" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="events" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
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
                      <li><a href="#" class="current"><span>Dashboard elements</span></a></li>
                      <li><a href="newarticle.php"><span>New Articles</span></a></li>
                      <li><a href="quotes"><span>All Quotes</span></a></li>
                      <li><a href="newevents"><span>New Event</span></a></li>
                      <li><a href="media"><span>Upload Media</span></a></li>
                       
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
    <h1 class="dashboard">Dashboard - Welcome</h1>
    </div>
   
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            <div class="portlet-header"><!--<img src="images/icons/chart_bar.gif" width="16" height="16" alt="Reports" /> Visitors - Last 30 days--></div>
            <div class="portlet-content">
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
            <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" >
            <thead>
              <tr id="chkrow">
                <th scope="col">Statistics</th>
                <th width="125" colspan="-2" align="center" scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
          
              <tr>
                <td><a href="events.php">Total Courses</a></td>
                <td colspan="-2" align="left"><?php echo statistics("events");?></td>
              </tr>
              <tr>
                <td><a href="quotes.php">Quotes</a></td>
                <td colspan="-2" align="left"><?php echo statistics("quotes");?></td>
              </tr>
              <tr>
                <td><a href="articles.php">Posted Articles</a></td>
                <td colspan="-2" align="left"><?php echo statistics("articles");?></td>
              </tr>
              <tr>
                <td><a href="subscribers.php">Subscribers</a></td>
                <td colspan="-2" align="left"><?php echo statistics("subscribers");?></td>
              </tr>
              <tr>
                <td><a href="all-media.php">Media Uploads</a></td>
                <td colspan="-2" align="left"><?php echo statistics("uploads");?></td>
              </tr>
              <tr>
                <td><a href="all_registrations">Course Registrations</a></td>
                <td colspan="-2" align="left"><?php echo statistics("registration");?></td>
              </tr>
              <tr>
                <td><a href="newsletters.php">Sent Newsletters</a></td>
                <td width="125" colspan="-2" align="left"><?php echo statistics("newsletter");?></td>
              </tr> 
          
              
              </tbody>
          </table>
            </div>
        </div>      
      <!--THIS IS A PORTLET-->
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      <div class="portlet">
		<div class="portlet-header"><img src="images/icons/comments.gif" width="16" height="16" alt="Comments" /> Quotes</div>

		<div class="portlet-content">
        <?php
		$result = MysqlSelectQuery("select * from quotes order by posted_date limit 0, 7");
		while($rows = SqlArrays($result)){
		?>
         <p class="quotes"><?php echo $rows['content'];?><br />
         <span style="color:#960; font-style:italic">Posted: <?php echo time_ago($rows['posted_date']);?></span>
         </p>
        
         <?php
		 }
		 ?>
		</div>
       </div>    
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
		<div class="portlet-header">Add New Quote					</div>
		<div class="portlet-content">
        <form id="quotes" name="form1" method="post" action="">
          <label>Quote Content</label>
		    <textarea name="content" cols="45" rows="3" class="smallInput" id="content_quote"></textarea>
            <input name="sbmt_quote" type="hidden" value="" id="sbmt_quote" />
            <a class="button" href="javascript: void(0);" onclick="Send('sbmt_quote')"><span>Submit</span></a>
        </form>
                </div>
       </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
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
