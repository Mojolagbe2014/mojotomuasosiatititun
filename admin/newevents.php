<?php 
session_start();
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}
$message = "";

reset ($add_event);
	while (list ($key, $val) = each ($add_event)) {
		if (!isset($_SESSION[$key])) $_SESSION[$key] = "";
		if ($_SESSION[$key] == "NULL") $_SESSION[$key] = "";
	}
	
if(isset($_POST['sbmt']) &&$_POST['sbmt'] == 1 ){
	//if(checkFields()){
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
		if ($val == "") $val="NULL";
		$add_event[$key] = (get_magic_quotes_gpc()) ? $val : addslashes($val);
		if ($val == "NULL")
			$_SESSION[$key] = NULL;
		else
			$_SESSION[$key] = $val;
	}
        $courseImage = basename($_FILES["image"]["name"]) ? rand(100000, 1000000)."_".  strtolower(str_replace(" ", "_", "course image")).".".pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION): ""; 
        $imgType = pathinfo($courseImage,PATHINFO_EXTENSION);
        
	if($_SESSION['title'] == "" ){$message = errorMsg('Please enter course title');}
	elseif($_SESSION['description'] == "" ){$message = errorMsg('Please enter course description');}
	elseif($_SESSION['department'] == "" ){$message = errorMsg('Please select department');}
        elseif($courseImage!="" && $imgType!="jpg" && $imgType!="png" && $imgType!="gif" && $imgType!="bmp" && $imgType!="jpe"){$message = errorMsg('Please select valid image');}
	elseif($_SESSION['start_date'] == "" && $_SESSION['end_date'] == "" ){$message = errorMsg('Please select start date or end date');}
	else{
		$date = date("F j, Y");
		$StartDate = $_SESSION['start_date'];
		$startDate = date("F j, Y",strtotime($_SESSION['start_date']));
		$endDate = date("F j, Y",strtotime($_SESSION['end_date']));
		$NewStartDate = date("Y-m-d", strtotime($StartDate));
                
                
	if(MysqlQuery("insert into events (event_title,event_description,start_date,end_date,event_cost,posted_date,sort_date,event_time,department,state,venue, image)
										  values('".$_SESSION['title']."','".$_SESSION['description']."','".$startDate."','".$endDate."','".
											$_SESSION['fee']."','$date','$NewStartDate','".$_SESSION['time']."','".$_SESSION['department']."','".$_SESSION['state']."','".$_SESSION['venue']."','".$courseImage."')")){
		reset ($add_event);
            while (list ($key, $val) = each ($add_event)) {
		if (isset($_SESSION[$key])) $_SESSION[$key] = "";
            }
            if($courseImage!=""){
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/courses/".$courseImage);
            }
            header("location: newevents.php?status=success");
        }
		
}
/*else{
	$message = errorMsg('You have one or more empty field! Please check the form.');
	}*/
}
if(isset($_GET['status'])){
	$message  = successMsg("Event was submitted successfully!");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Event | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
   <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/JavaScript" src="../js/calender.js"></script>
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
     <script type="text/javascript">
    function Send(){
			document.getElementById('sbmt').value = 1;
			document.getElementById('articlesForm').submit();
		}
		</script>
    
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
        <li class="item middle" id="four"><a href="subscribers" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
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
                      <li><a href="events.php" ><span>Events Listing</span></a></li>
                      <li><a href="newevents.php" class="current"><span>New Event</span></a></li>
                      <li><a href="calender.php"><span>Calendar</span></a></li>
                     <li><a href="search_event.php"><span>Search Events</span></a></li>
                       
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
    <h1 >New Event</h1>
    </div>
    <p class="info" id="warning"><span class="info_inner">Note: All fields are required! Please endevour to fill them </span></p>
    <!--RIGHT TEXT/CALENDAR-->
    <!--RIGHT TEXT/CALENDAR END-->
    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
	<?php echo $message;?>
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
    <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <!--  SECOND SORTABLE COLUMN END -->
      <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        <form id="articlesForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    	<label>Event Title</label>
        <input name="title" type="text" class="smallInput wide" id="title" value="<?php echo $_SESSION['title'];?>" />
        <label>Department</label>
        <select name="department" class="smallInput wide">
          <option selected="selected" value="<?php echo $_SESSION['department'];?>"><?php echo $_SESSION['department'];?></option>
          <?php
		  $result = MysqlSelectQuery("select * from course_categories order by cat_name");
		  while($rows = SqlArrays($result)){
		  ?>
          <option value="<?php echo $rows['cat_id'];?>"><?php echo $rows['cat_name'];?></option>
          <?php
		 	 }
		  ?>
        </select>
       
        <label>Attendance Fee</label>
        <input name="fee" type="text" class="smallInput wide" id="fee" value="<?php echo $_SESSION['fee'];?>" />
        <label>Time:</label>
        <input name="time" type="text" class="smallInput wide" id="time" value="<?php echo $_SESSION['time'];?>" />
        <label>State:</label>
        <select name="state" class="smallInput wide">
          <option value=""> -- Select a state -- </option>
          <?php
		  $results = MysqlSelectQuery("SELECT * FROM states ORDER BY id");
		  while($rows = SqlArrays($results)){
		  ?>
          <option <?php if($rows['id']== $_SESSION['state']){ echo 'selected="selected"';} ?> value="<?php echo $rows['id'];?>"><?php if($rows['id']== 24){ echo 'Ilorin - Kwara'; } else { echo $rows['name'];} ?></option>
          <?php
		 	 }
		  ?>
        </select>
        <label>Venue/Location:</label>
        <input name="venue" type="text" class="smallInput wide" id="venue" value="<?php echo $_SESSION['venue'];?>" />
        <label>Start Date</label>
        <input name="start_date" type="text" class="smallInput " id="start_date" value="<?php echo $_SESSION['start_date'];?>" readonly="readonly" onClick="scwShow(this,event);" />
        <label>End Date</label>
        <input name="end_date" type="text" class="smallInput" id="end_date" value="<?php echo $_SESSION['end_date'];?>" readonly="readonly" onClick="scwShow(this,event);" />
        <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
        <label> Description</label>
        <textarea name="description" cols="30" rows="7" class="smallInput wide" id="description"><?php echo $_SESSION['description'];?></textarea>
        <script type="text/javascript">
		CKEDITOR.replace( 'description' );
        </script>
        <label>Course Image:</label>
        <input name="image" type="file" class="smallInput wide" id="image" />
        <!-- BUTTONS -->
         <input name="sbmt" type="hidden" value="" id="sbmt" />
       <a class="button" href="javascript:void(0);" onclick="Send()"><span>Submit</span></a>
      </form>
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
