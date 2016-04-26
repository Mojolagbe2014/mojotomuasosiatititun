<?php
session_start();
if(isset($_GET['stat']) && $_GET['stat'] == true){
			   session_destroy();
			   header("location: ./");
			   }
?>