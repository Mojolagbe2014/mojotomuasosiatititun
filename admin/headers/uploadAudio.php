<?php
session_start();
include("../../scripts/config.php");
include("../../scripts/functions.php");


//specify folder for file upload
$folder = "../../media/"; 

	//$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPEG","JPG","PNG");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$title = addslashes($_POST['title']);
			$name = $_FILES['audio']['name'];
			$size = $_FILES['audio']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if($ext == 'mp3')
					{
					/*if($size<(1024*1024))
						{*/
							$actual_audio_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['audio']['tmp_name'];
							if(move_uploaded_file($tmp, $folder.$actual_audio_name))
								{
									
							MysqlQuery("insert into uploads(title,filename,filesize,date_posted) value ('".$title."','".$actual_audio_name."','".$size."','".date("Y-m-d")."')");
								
								echo successMsg("File was uploaded successfuly!");
										
								}
							else
								echo errorMsg("Some error occured, please retry");
						/*}
						else
						echo errorMsg("Image file size max 1 MB");	*/				
						}
						else
						echo errorMsg("Invalid file format! upload mp3 files only");	
				}
				
			else
				echo errorMsg("Please select a file..!");
				
			exit;
		}

?>
