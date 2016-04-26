<?php
require_once("scripts/config.php");
require_once("scripts/functions.php");
if(connection());
if(isset($_GET['file'])){
$result = MysqlSelectQuery("select * from uploads where id='".$_GET['file']."'");
if(NUM_ROWS($result) > 0){
$rows = SqlArrays($result);
MysqlQuery("update uploads set no_down=no_down + 1 where id='".$_GET['file']."'");

header("Content-Type: audion/mpeg");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");
		header("Content-Disposition: attachment; filename=\"".$rows['filename']."\"");
		$file = file_get_contents("media/".$rows['filename']);
		echo $file;
	}
}
?>
