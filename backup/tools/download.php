<?php
session_start();
include ('../scripts/config.php');
include('../scripts/DBClass.php');
include('../scripts/user_functions.php');

$database = new Database();

$row = $database->select(false,"brochure");
$path = "../brochure/";
if (isset($_GET['pdf'])) {

if (file_exists($path.$row['file_pdf']) && is_readable($path.$row['file_pdf']) && preg_match('/\.pdf$/',$row['file_pdf'])) {
header('Content-Type: application/pdf');
header("Content-Disposition: attachment; filename=".$row['file_pdf']);
readfile($path.$row['file_pdf']);
}
} 
if (isset($_GET['excel'])) {
	
list($txt, $ext) = explode(".", $row['file_excel']);

if (file_exists($path.$row['file_excel']) && is_readable($path.$row['file_excel'])) {
header('Content-Type: application/'.$ext);
header("Content-Disposition: attachment; filename=".$row['file_excel']);
readfile($path.$row['file_excel']);
}
}

?>