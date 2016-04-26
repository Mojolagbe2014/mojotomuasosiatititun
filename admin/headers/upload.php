<?php
session_start();
if(!isset($_SESSION['SESSION'])) require( "../../scripts/sessions.php");
require_once("../../scripts/config.php");
require_once("../../scripts/functions.php");

$message = "";
//process the forms and upload the files
if($_POST['title'] == "" || $_FILES["fileField"]["name"] == ""){
	$result = 1;
}
else if($_FILES["fileField"]["type"] == "audio/mpeg"){
//specify folder for file upload
$folder = "../../media/"; 

//specify redirect URL
$redirect = "media?success";

//upload the file
move_uploaded_file($_FILES["fileField"]["tmp_name"], "$folder" . $_FILES["fileField"]["name"]);
//do whatever else needs to be done (insert information into database, etc...)
MysqlQuery("insert into uploads(title,filename,filesize,date_posted) value ('".addslashes($_POST['title'])."','".$_FILES["fileField"]["name"]."','".$_FILES["fileField"]["size"]."','".date("Y-m-d")."')");
$result = 2;
	}
	else{
		$result = 3;
	}
   
   sleep(2);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>   
