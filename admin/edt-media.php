<?php
session_start();
//if(!isset($_SESSION['SESSION'])) require( "../scripts/sessions.php");
require_once("../scripts/config.php");
require_once("../scripts/functions.php");
if(@$_SESSION['LOGGEDIN'] != 1){
	header("location: ./");exit;
}

//get unique id
$up_id = uniqid();
$message = "";
//process the forms and upload the files
if (isset($_POST['Update'])) {
	//specify redirect URL
$redirect = "edt-media?success&id=".$_GET['id'];
if($_POST['title'] == ""){
	$message = errorMsg('You have one or more empty field! Please check the form.');
}
else{
	if($_FILES["fileField"]["name"] == "" ){
	MysqlQuery("update uploads set title = '".$_POST['title']."' where id='".$_GET['id']."'");
	header('Location: '.$redirect); die;
}
else if($_FILES["fileField"]["name"] != "" && $_FILES["fileField"]["type"] == "audio/mpeg"){
//specify folder for file upload
$folder = "../media/"; 
if(file_exists($folder.$_POST['file_name'])){

unlink($folder.$_POST['file_name']);
//upload the file
move_uploaded_file($_FILES["fileField"]["tmp_name"], "$folder" . $_FILES["fileField"]["name"]);
//do whatever else needs to be done (insert information into database, etc...)
MysqlQuery("update uploads set title = '".$_POST['title']."',filename='".$_FILES["fileField"]["name"]."',filesize='".$_FILES["fileField"]["size"]."' where id='".$_GET['id']."'");
//redirect user
header('Location: '.$redirect); die;
			}
	else{
		$message = errorMsg('sorry file does not exist on this server');
	}
}
	
		else{
	$message = errorMsg('Invalid File Format! Please upload mp3 files only');
		}
	}
}
if(isset($_GET['id'])){
	$result = MysqlSelectQuery("select * from uploads where id='".$_GET['id']."'");
	$rows = SqlArrays($result);
}
//
if(isset($_GET['success'])){
	$message  = successMsg("Update was successfull!");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Media | Admin</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />

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
    <!--Progress Bar and iframe Styling-->
<link href="style/style_progress.css" rel="stylesheet" type="text/css" />

<!--Get jQuery-->
<script src="js/jquery.js" type="text/javascript"></script>

<!--display bar only if file is chosen-->
<script>

$(document).ready(function() { 
//

//show the progress bar only if a file field was clicked
	var show_bar = 0;
    $('input[type="file"]').click(function(){
		show_bar = 1;
    });

//show iframe on form submit
    $("#uploadForm").submit(function(){

		if (show_bar === 1) { 
			$('#upload_frame').show();
			function set () {
				$('#upload_frame').attr('src','upload_frame.php?up_id=<?php echo $up_id; ?>');
			}
			setTimeout(set);
		}
    });
//

});

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
		<li class="item middle" id="five"><a href="media" class="main current"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
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
                       <li><a href="all-media"><span>All media uploads</span></a></li>
                      <li><a href="media" class="current"><span>New media upload</span></a></li>
                             
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
     <h1 class="content_edit">Edit Media</h1>
    </div>
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
	<?php echo $message;?>
    <div id="portlets">
    <div class="portlet">
		<form action="" method="post" enctype="multipart/form-data" id="uploadForm">
    	<label>Title:</label>
        <input name="title" type="text" class="smallInput wide" id="title" value="<?php echo $rows['title'];?>" />
        <!--APC hidden field--><input name="file_name" type="hidden" value="<?php echo $rows['filename'];?>" />
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
<!---->
<label>File:</label>
        <input name="fileField" type="file" class="smallInput wide" id="fileField" size="140" />
        <!--Include the iframe-->
    <br />
    <iframe id="upload_frame" name="upload_frame" frameborder="0" border="0" src="" scrolling="no" scrollbar="no" > </iframe>
    <br />
<!---->

        <!-- BUTTONS -->
       <button class="button" name="Update"><span>Update</span><input name="" type="hidden" value="" /></button>
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
