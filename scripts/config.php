<?php
define("DB_NAME","tomassociates");
define("USER","root");
define("PASSWORD","");
define("SERVER","localhost");
define("SITE_URL","http://localhost/tomassrebuilt/");
define("SITE_URL1","http://localhost/tomassrebuilt");

header('Content-type: text/html; charset=UTF-8') ;

date_default_timezone_set('Africa/Lagos');
	$sql_connection = mysqli_connect(SERVER,USER,PASSWORD) or die ("Could not connect to the server");
	$db = mysqli_select_db($sql_connection,DB_NAME) or die ("Unable to select database <br/>".mysqli_error($sql_connection));
	 mysqli_set_charset( $sql_connection, "utf8");
	
?>