<?php
define("DB_NAME","tomassociates");
define("USER","root");
define("PASSWORD","");
define("SERVER","localhost");
define("SITE_URL","http://localhost/tomassociates/");

function connection (){
	$sql_connection = mysql_connect(SERVER,USER,PASSWORD) or die ("Could not connect to the server");
	$db = mysql_select_db(DB_NAME) or die ("Unable to select database <br/>".mysql_error());
	if($sql_connection && $db){
		$response = true;
	}
		else {
			$response = false;
	}
	return $response;
}
?>