<?php
//This does not seem very OOP to me?
//this file will be the src for an img tag
require 'ThumbnailImage.php';
$path = $_GET["path"];
$maxsize = @$_GET["size"];
if(!isset($maxsize)){
	$maxsize = 100;
}
if(isset($path)){
	$thumb = new ThumbnailImage($path, $maxsize);
	$thumb->getImage();
}

?>
