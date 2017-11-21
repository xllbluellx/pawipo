<?php
/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/
    $imagePath = "/home/mzulma/TADDI2/img/tmp/";

	$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);
	
	//Check write Access to Directory
	$limite = (1024 * 1024 * 3);
	//error_log("Error en $imagePath ".is_writable($imagePath), 0);
	if(!is_writable($imagePath)){
		$response = Array(
			"status" => 'error',
			"message" => 'Ocurrio un error o la imagen pesa mas de 3MB, intenta nuevamente.'
		);
		print json_encode($response);
		return;
	}
	
	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
			);			
		}
	  else
		{
			
	     $filename = $_FILES["img"]["tmp_name"];
	     setcookie('tempname', $_FILES["img"]["name"], 0, '/');
		  list($width, $height) = getimagesize( $filename );

		  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);
		  chmod($imagePath . $_FILES["img"]["name"], 0777);
		  $response = array(
			"status" => 'success',
			"url" => $imagePath.$_FILES["img"]["name"],
			"width" => $width,
			"height" => $height
		  );
		  
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
		);
	  }
	  
	  print json_encode($response);

?>
