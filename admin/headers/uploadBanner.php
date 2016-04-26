<?php
session_start();
include("../../scripts/config.php");
include("../../scripts/functions.php");


$path = "../../images/";
$filename = $path."bannerName.php";

	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPEG","JPG","PNG");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['banner']['name'];
			$size = $_FILES['banner']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time()."_".str_replace(" ", "_", $txt).".".$ext;
							$tmp = $_FILES['banner']['tmp_name'];
							if(file_exists($filename)){
								$content = file_get_contents($filename);
								if(!empty($content)) unlink($path.$content); //remove the existing advert
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{

									echo '<img src="../images/'.$actual_image_name.'" />';

									$fh = fopen($filename,'w');

									fwrite($fh,$actual_image_name);//store the image name in the text file
								
								}
								else
								
								echo errorMsg("Some error occured, please retry");
								
							}

						}
						else
						echo errorMsg("Image file size max 1 MB");					
						}
						else
						echo errorMsg("Invalid file format!");	
				}
				
			else
				echo errorMsg("Please select image..!");
				
			exit;
		}


?>
