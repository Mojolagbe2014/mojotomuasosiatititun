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
if (isset($_POST['submit'])) {
if($_POST['title'] == "" || $_FILES["fileField"]["name"] == ""){
	$message = errorMsg('You have one or more empty field! Please check the form.');
}
else if($_FILES["fileField"]["type"] == "audio/mpeg"){
//specify folder for file upload
$folder = "../media/"; 

//specify redirect URL
$redirect = "media?success";

//upload the file
move_uploaded_file($_FILES["fileField"]["tmp_name"], "$folder" . $_FILES["fileField"]["name"]);
//do whatever else needs to be done (insert information into database, etc...)
MysqlQuery("insert into uploads(title,filename,filesize,date_posted) value ('".addslashes($_POST['title'])."','".$_FILES["fileField"]["name"]."','".$_FILES["fileField"]["size"]."','".date("Y-m-d")."')");
//redirect user
header('Location: '.$redirect); die;
	}
	else{
		$message = errorMsg('Invalid File Format! Please upload mp3 files only');
	}
}
//
if(isset($_GET['success'])){
	$message  = successMsg("File was uploaded successfully!");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Media | Admin</title>
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
<script type="text/javascript" src="js/jquery.min_2.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" >
		$(document).ready(function() {
								   
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		var title = $('#title');
		var file = $('#audio');

		
					   
		$('#media').bind('submit', function(e) {
			
			e.preventDefault(); // <-- important
			
			if(title.val() == ''){
				alert('Please enter media title')
			}
			else if(file.val() == ''){
				alert('Please select a file')
			}
			else{
			
			 //$("#holder").html('');
			$('.progressBar').fadeIn("slow")
			  // alert('test');
			$(this).ajaxSubmit({
				
				beforeSend: function() {
       			status.empty();
       	 		var percentVal = '0%';
        		bar.width(percentVal)
        		percent.html(percentVal);
				
   				},
		uploadProgress: function(event, position, total, percentComplete) {
			
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
		
		//console.log(percentVal, position, total);
    },
	
				success: function(responseText){
					var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
					title.val("");
					file.val("");
					$('.progressBar').fadeOut("slow")
					$("#loader").fadeIn('slow').html(responseText);
					 //$("#append").after(responseText).fadeIn('slow');
					 
				}
			});
			}
		});
		
	});
		

	function DeletItem(id){
		if(confirm('Delete this image?')){
		//$(id).text('Processing...')
		$.post('resources/deleteImage.php?getImgId='+id, {ajax: 'true' },function(data){
	$('#Item-'+id).fadeOut('slow');
		});
		}
	}
	function Navigate(){
		window.location = 'new_product?flg=success'
	}
		
</script>
<style type="text/css">
<!--
.image_div {
	float: left;
	width: 110px;
	margin-right: 5px;
}
.image_div a {
	display: block;
	float: left;
	width: 100%;
	font-size: 12px;
	font-weight: normal;
	font-variant: normal;
}
.image_div a img {
	float: left;
	margin-right: 5px;
}

.progressBar { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; margin-left:auto; margin-right:auto; display:none; }
.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:3px; left:48%; }
-->
    </style>
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
                       <li><a href="gallery-upload" ><span>Gallery Upload</span></a></li> 
                       <li><a href="brochure-upload" ><span>Brochure Upload</span></a></li>
                       <li><a href="banner-upload" class="current"><span>Banner Upload</span></a></li>
                             
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
     <h1 class="content_edit">New Media</h1>
    </div>
    <p class="info" id="warning"><span class="info_inner">Note: All fields are required! Please endevour to fill them </span></p>

    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
	<?php echo $message;?>
    <div id="portlets">
    <div class="portlet">
 <div class="progressBar">
        <div class="bar"></div >
        <div class="percent">0%</div >
        </div>
                     <div id="f1_upload_form">
		<form action="headers/uploadAudio.php" method="post" enctype="multipart/form-data" id="media">
    	<label>Title:</label>
        <input name="title" type="text" class="smallInput wide" id="title" value="" />
<label>File:</label>
        <div id="file"><input name="audio" type="file" class="smallInput wide" id="audio" size="140" /></div>
        <!--Include the iframe-->
    <br />
 
    <br />
    <div id="loader" style="display:none; text-align:center;"></div>
<!---->

        <!-- BUTTONS -->
       <button class="button"><span>Upload</span><input name="" type="hidden" value="" /></button>
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
