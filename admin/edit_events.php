<?php 
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

$message = "";
if(isset($_POST['edit_update'])){
	//if(checkFields()){
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
		if ($val == "") $val="NULL";
		$add_event[$key] = addslashes($val);
		/*if ($val == "NULL")
			$add_event[$key] = NULL;
		else
			$add_event[$key] = $val;*/
	}
        $courseImage = basename($_FILES["image"]["name"]) ? rand(100000, 1000000)."_".  strtolower(str_replace(" ", "_", "course image")).".".pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION): ""; 
        $imgType = pathinfo($courseImage,PATHINFO_EXTENSION);
        $oldImage = @$_POST['oldImage'];
        
	if($add_event['title'] == "" ){$message = errorMsg('Please enter course title');}
	elseif($add_event['description'] == "" ){$message = errorMsg('Please enter course description');}
	elseif($add_event['department'] == "" ){$message = errorMsg('Please select department');}
        elseif($courseImage!="" && $imgType!="jpg" && $imgType!="png" && $imgType!="gif" && $imgType!="bmp" && $imgType!="jpe"){$message = errorMsg('Please select valid image');}
	elseif($add_event['start_date'] == "" && $add_event['end_date'] == "" ){$message = errorMsg('Please select start date or end date');}
	else{
		$date = date("F j, Y");
		$StartDate = $add_event['start_date'];
		$startDate = date("F j, Y",strtotime($add_event['start_date']));
		$endDate = date("F j, Y",strtotime($add_event['end_date']));
		$NewStartDate = date("Y-m-d", strtotime($StartDate));
                if($courseImage!=""){
                    move_uploaded_file($_FILES["image"]["tmp_name"], "images/courses/".$courseImage);
                    if($oldImage!="" && file_exists("images/courses/".$oldImage)) unlink ("images/courses/".$oldImage);
                }else{$courseImage = $oldImage;}
        if(MysqlQuery("update events set event_title='".$add_event['title']."',event_description='".$add_event['description']."',start_date='".$startDate."',end_date='".$endDate."',event_cost='".$add_event['fee']."',sort_date='$NewStartDate', department='".$add_event['department']."', event_time='".$add_event['time']."', state='".$add_event['state']."', venue='".$add_event['venue']."', image='{$courseImage}' where event_id='".$_GET['id']."'")){
            
            header("location: edit_events.php?status=success&edit=true&id=".$_GET['id']);
        }
		
}
/*else{
	$message = errorMsg('You have one or more empty field! Please check the form.');
	}*/
}
if(isset($_GET['status'])){
	$message  = successMsg("Event was editted successfully!");
}
if(isset($_GET['id']) && $_GET['edit'] == 'true'){
	$result = MysqlSelectQuery("select * from events where event_id='".$_GET['id']."'");
	$rows = SqlArrays($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Event | Admin</title>
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
                      <li><a href="#" class="current"><span>Edit Event</span></a></li>
                      <li><a href="calender.php"><span>Calendar</span></a></li>
                      <li><a href="search_events.php"><span>Search Events</span></a></li>
                      <li><a href="#"><span>Import Events</span></a></li>
                      <li><a href="#"><span>Export Events</span></a></li>
                       
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
    <h1 class="content_edit">Edit Event</h1>
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
        <form id="edit" action="" method="post" enctype="multipart/form-data">
    	<label>Event Title</label>
        <input name="title" type="text" class="smallInput wide" id="title" value="<?php echo $rows['event_title'];?>" />
        <label>Department</label>
        <select name="department" class="smallInput wide">
        <?php
		 $result3 = MysqlSelectQuery("select * from course_categories where cat_id ='".$rows['department']."'");
		 $cat_rows = SqlArrays($result3);
		?>
          <option selected="selected" value="<?php echo $cat_rows['cat_id'];?>"><?php echo $cat_rows['cat_name'];?></option>
          <?php
		  $result = MysqlSelectQuery("select * from course_categories order by  cat_name");
		  while($rows_cat = SqlArrays($result)){
		  ?>
          <option value="<?php echo $rows_cat['cat_id'];?>"><?php echo $rows_cat['cat_name'];?></option>
          <?php
		  }
		  ?>
        </select>
        
        <label>Attendance Fee</label>
        <input name="fee" type="text" class="smallInput wide" id="fee" value="<?php echo  $rows['event_cost'];?>" />
        <label>Time:</label>
        <input name="time" type="text" class="smallInput wide" id="time" value="<?php echo $rows['event_time'];?>" />
        <label>State:</label>
        <select name="state" class="smallInput wide">
            <option value=""> -- Select a state -- </option>
            <?php
                $resultst = MysqlSelectQuery("SELECT * FROM states ORDER BY id");
                while($rowst = SqlArrays($resultst)){
            ?>
          <option <?php if($rows['state']== $rowst['id']){ echo 'selected="selected"';} ?> value="<?php echo $rowst['id'];?>"><?php if($rowst['id']== 24){ echo 'Ilorin - Kwara'; } else { echo $rowst['name'];}?></option>
          <?php } ?>
        </select>
        <label>Venue/Location:</label>
        <input name="venue" type="text" class="smallInput wide" id="venue" value="<?php echo $rows['venue'];?>" />
        <label>Start Date</label>
        <input name="start_date" type="text" class="smallInput " id="start_date" value="<?php echo date("F j Y", strtotime($rows['start_date']));?>" readonly="readonly" onClick="scwShow(this,event);" />
        <label>End Date</label>
        <input name="end_date" type="text" class="smallInput" id="end_date" value="<?php echo date("F j Y", strtotime($rows['end_date']));?>" readonly="readonly" onClick="scwShow(this,event);" />
        <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
        <label> Description</label>
        <textarea name="description" cols="30" rows="7" class="smallInput wide" id="description"><?php echo $rows['event_description'];?></textarea>
        <script type="text/javascript">
		CKEDITOR.replace( 'description' );
        </script>
        <label>Course Image:</label>
        <?php 
        if($rows['image']!=""){ echo "<img src='images/courses/".$rows['image']."' width='40' height='40' style='margin:10px'/>"; }
        ?>
        <input type="hidden" name="oldImage" id="oldImage" value="<?php echo $rows['image'];?>"/>
        <input name="image" type="file" class="smallInput wide" id="image" />
        <!-- BUTTONS -->
       <button class="button" name="edit_update"><span>Update</span><input name="" type="hidden" value="" /></button>
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
