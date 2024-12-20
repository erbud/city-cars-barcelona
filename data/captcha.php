<?php
	session_start();
 
	// generate random number and store in session
	$captcha 			 = imagecreatetruecolor(105, 38);
	$captchaText 		 = rand(1000, 9999);
	$_SESSION['captcha'] = sha1($captchaText);	
 
	// colors
	$colorWhite 	  	 = imagecolorallocate($captcha, 255, 255, 255);
	$colorGrey  		 = imagecolorallocate($captcha, 128, 128, 128);
	$colorBlack 		 = imagecolorallocate($captcha, 0, 0, 0);

	// font
	$font 		= '../fonts/KARNIVOB.ttf';
 
 	// box
	imagefilledrectangle($captcha, 0, 0, 105, 38, $colorGrey);
	imagecolortransparent($captcha, $colorGrey);
 
	// draw text
	imagettftext($captcha, 30, 0, 9, 33, $colorWhite, $font, $captchaText);
	imagettftext($captcha, 30, 0, 1, 35, $colorBlack, $font, $captchaText);
 
	// prevent client side caching
	header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
 
	//send image to browser
	header ("Content-type: image/gif");
	imagegif($captcha);
	imagedestroy($captcha);
?>