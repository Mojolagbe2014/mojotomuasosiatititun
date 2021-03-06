<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}
$article = array("title"=>"","description"=>"");
$message = "";
reset ($article);
	while (list ($key, $val) = each ($article)) {
		if (!isset($_SESSION[$key])) $_SESSION[$key] = "";
		if ($_SESSION[$key] == "NULL") $_SESSION[$key] = "";
	}
	if(isset($_POST['sbmt']) &&$_POST['sbmt'] == 1 ){
	if(checkFields()){
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
		if ($val == "") $val="NULL";
		$article[$key] = (get_magic_quotes_gpc()) ? $val : addslashes($val);
		if ($val == "NULL")
			$_SESSION[$key] = NULL;
		else
			$_SESSION[$key] = $val;
	}
	
		$date = date("F j, Y");
		$NewDate = date("Y-n-d", strtotime($date));
	if(MysqlQuery("insert into newsletter (newsletter_title,newsletter_content,posted_date)
										  values('".$_SESSION['title']."','".$_SESSION['description']."','$date')")){
		$result = MysqlSelectQuery('select * from subscribers');
		//sending out mails
		while($rows = SqlArrays($result)){
			$to = $rows['emails'];
		$subject = $_SESSION['title'];
		$innerMsg = "Dear ".$rows['name']."<br />".$_SESSION['description'];
		SendHtmlEmails($to,$subject,$innerMsg);
		
		
		
		reset ($article);
	while (list ($key, $val) = each ($article)) {
		if (isset($_SESSION[$key])) $_SESSION[$key] = "";
	}
	header("location: newsletter_new.php?status=success");
			}
		}
		
}
else{
	$message = errorMsg('You have one or more empty field! Please check the form.');
	}
}
if(isset($_GET['status'])){
	$message  = successMsg("Newsletter was sent out successfully!");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Newsletter | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!--[if IE6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
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
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="dashboard.php" class="main"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="articles.php" class="main"><span class="outer"><span class="inner content">Articles</span></span></a></li>
       
        <li class="item middle" id="four"><a href="subscribers" class="main"><span class="outer"><span class="inner users">Subscribers</span></span></a></li>
		<li class="item middle" id="five"><a href="media" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="events" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="newsletters" class="main current"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
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
                       <li><a href="newsletters.php"><span>News Letters</span></a></li>
                      <li><a href="newsletter_new.php" class="current"><span>New Newsletter</span></a></li>      
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
     <h1 class="content_edit">Newsletter</h1>
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
		<form action="" method="post" name="articlesForm" id="articlesForm">
    	<label>Subject</label>
        <input name="title" type="text" class="smallInput wide" id="title" value="<?php echo $_SESSION['title'];?>" />
        
        <label>Content</label>
        <textarea name="description" cols="30" rows="7" class="smallInput wide" id="description"><?php echo $_SESSION['description'];?>
        </textarea>
        <script type="text/javascript">
		CKEDITOR.replace( 'description' );
			</script>

        <!-- BUTTONS -->
        <a class="button" href="javascript:void(0);" onclick="Send()"><span>Send Letter</span></a>
        <input name="sbmt" type="hidden" value="" id="sbmt" />
      <!-- <button class="button" name="submit"><span>Submit Article</span><input name="" type="hidden" value="" /></button>-->
      </form>
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
