<?php

$valid_formats = array("jpg", "png", "gif", "bmp");
$Img = $_FILES['photoimg'];
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
$path = __DIR__."/../tmp/";
$actual_image_name = "";

if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							 if (!is_dir($path))
							 {

							 	mkdir($path);
							 }
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								
									echo $actual_image_name;
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";



?>