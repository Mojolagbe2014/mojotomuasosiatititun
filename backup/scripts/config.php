<?php
define("DB_NAME","tomassoc_tomasso_new");
define("USER","tomassoc_data");
define("PASSWORD","tomasso123");
define("SERVER","localhost");
define("SITE_URL","http://www.tomassociatesng.com");

header('Content-type: text/html; charset=UTF-8') ;

date_default_timezone_set('Africa/Lagos');


	$sql_connection = mysqli_connect(SERVER,USER,PASSWORD) or die ("Could not connect to the server");
	$db = mysqli_select_db($sql_connection,DB_NAME) or die ("Unable to select database <br/>".mysqli_error($sql_connection));
	
?>