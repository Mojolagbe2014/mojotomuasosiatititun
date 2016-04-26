<?php
session_start();
include("../../scripts/config.php");
include("../../scripts/functions.php");


$path = "../../brochure/";


	$valid_formats = array("xlsx", "xls");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$title = addslashes($_POST['title']);
			$pdf_name = $_FILES['pdf']['name'];
			$excel_name = $_FILES['excel']['name'];
			
			if(strlen($pdf_name) && strlen($excel_name) )
				{
					list($txtPDF, $PDFext) = explode(".", $pdf_name);
					list($txtEXCEL, $EXCELext) = explode(".", $excel_name);
					if($PDFext == 'pdf' and in_array($EXCELext,$valid_formats))
					{
					
							$actual_pdf_name = time().substr(str_replace(" ", "_", $txtPDF), 5).".".$PDFext;
							
							$actual_excel_name = time().substr(str_replace(" ", "_", $txtEXCEL), 5).".".$EXCELext;
							
							$tmpPDF = $_FILES['pdf']['tmp_name'];
							$tmpEXCEL = $_FILES['excel']['tmp_name'];
							
							if(move_uploaded_file($tmpPDF,$path.$actual_pdf_name) && move_uploaded_file($tmpEXCEL,$path.$actual_excel_name))
								{
								//if()
								
								MysqlQuery("update brochure set brochuretitle='".$title."', file_pdf='".$actual_pdf_name."', file_excel='".$actual_excel_name."'");
								echo successMsg('Brochure was uploaded successfuly');
								
								}
							else
								
								echo errorMsg("Some error occured, please retry");
								
						}
						else
						echo errorMsg("Invalid file format!");	
				}
				
			else
				echo errorMsg("Please select file..!");
				
			exit;
		}

?>
