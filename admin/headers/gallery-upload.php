<?php
session_start();
include("../../scripts/config.php");
include("../../scripts/functions.php");
include("resize-class.php");

$ImageBig = "../../images/gallery/";
$thumb = "../../images/gallery/thumb/";

	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPEG","JPG","PNG");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$title = addslashes($_POST['title']);
			$name = $_FILES['galleryField']['name'];
			$size = $_FILES['galleryField']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['galleryField']['tmp_name'];
							if(move_uploaded_file($tmp, $ImageBig.$actual_image_name))
								{
									// *** 1) Initialise / load image
								$resizeObj = new resize($ImageBig.$actual_image_name);

								// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
								$resizeObj -> resizeImage(377, 450, 'crop');

								// *** 3) Save image
								$resizeObj -> saveImage($thumb.$actual_image_name, 100);
								//thumbnail($ImageBig.$actual_image_name,150,$thumb.$actual_image_name);
								
								MysqlQuery("insert into gallery (title,file,posted_date,type) values('$title','".$actual_image_name."','".date('Y-m-d h:m:s')."','".$_POST['type']."')");
								
								//$Last_id = mysqli_insert_id($connection);
								
									echo '<img src="../images/gallery/thumb/'.$actual_image_name.'" height="150" width="150" />';
									
								/*	echo '<div class="image_div" id="Item-'.$Last_id.'">
											<img src="'.SITE_HTTP.'images/productImg/'.$actual_image_name.'" class="logoImagePrdMain" />
                                            <a href="#" title="Delete Image" class="deleteItem" id="'.$Last_id.'" onClick="DeletItem('.$Last_id.')"><img src="images/icons/delete.png" width="13" height="13">Delete Image</a>';*/
											
								}
							else
								
								echo errorMsg("Some error occured, please retry");
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
