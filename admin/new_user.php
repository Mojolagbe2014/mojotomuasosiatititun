<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}


$users = array('firstname'=>'','lastname'=>'','username'=>'');

reset ($users);
	while (list ($key, $val) = each ($users)) {
		if (!isset($_SESSION[$key])) $_SESSION[$key] = "";
		if ($_SESSION[$key] == "NULL") $_SESSION[$key] = "";
	}
	
	if(isset($_POST['sbmt']) &&$_POST['sbmt'] == 1 ){
	if(checkFields()){
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
		if ($val == "") $val="NULL";
		$users[$key] = (get_magic_quotes_gpc()) ? $val : addslashes($val);
		if ($val == "NULL")
			$_SESSION[$key] = NULL;
		else
			$_SESSION[$key] = $val;
	}
	if($_POST['password'] != $_POST['confirm_password']){ $message = errorMsg('Passwords dows not match!');}
	else{
	if(MysqlQuery("insert into login (username,password,firstname,lastname)
										  values('".$_SESSION['username']."','".sha1($_POST['password'])."','".$_SESSION['firstname']."','".$_SESSION['lastname']."')")){
		
		reset ($users);
	while (list ($key, $val) = each ($users)) {
		if (isset($_SESSION[$key])) $_SESSION[$key] = "";
	}
	header("location: new_user.php?status=success");
		}
	}
		
}
else{
	$message = errorMsg('You have one or more empty field! Please check the form.');
	}
}
if(isset($_GET['status'])){
	$message  = successMsg("user was added successfully!");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create new user | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
 <script type="text/javascript">
    function Send(){
			document.getElementById('sbmt').value = 1;
			document.getElementById('usersForm').submit();
		}
		</script>
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<?php include ("headers/header.php");?>
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
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
                       <li><a href="accounts" ><span>Users</span></a></li>
                      <li><a href="new_user" class="current"><span>New User<em></em></span></a></li>
                             
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
    
     <h1 class="content_edit">User Accounts</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox">
   	  <div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
	<?php echo @$message;?>
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
    <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <!--  SECOND SORTABLE COLUMN END -->
      <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        
		<div class="portlet-content nopadding">
        <form id="usersForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    	<label>Firstname</label>
        <input name="firstname" type="text" class="smallInput wide" id="firstname" value="<?php echo $_SESSION['firstname'];?>" />
        <label>Lastname</label>
        <input name="lastname" type="text" class="smallInput wide" id="lastname" value="<?php echo $_SESSION['lastname'];?>" />
        <label>Username</label>
        <input name="username" type="text" class="smallInput wide" id="username" value="<?php echo $_SESSION['username'];?>" />
        <label>Password</label>
        <input name="password" type="password" class="smallInput wide" id="password" value="" />
        <label>Confirm Password</label>
        <input name="confirm_password" type="password" class="smallInput wide" id="confirm_password" value="" />
        <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
        <!-- BUTTONS -->
         <input name="sbmt" type="hidden" value="" id="sbmt" />
       <a class="button" href="javascript:void(0);" onclick="Send()"><span>Submit</span></a>
      </form>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for inline calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			
			</div>
		</div>
        <!--Second hidden element called from the tip message right of the title-->
        <div class='hidden'>
			<div id='inline_example2' title="This is a modal" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from the second hidden element on this page.</strong></p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">Tom Associates Training</div>
<!-- FOOTER END -->
</body>
</html>
