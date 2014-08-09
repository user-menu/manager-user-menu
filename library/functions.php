<?php
// Ham tu dong nap file khi khoi tao doi tuong
function __autoload($url){
	// Custorm URL
	$url = strtolower($url);
	$url = str_replace("_", "/", $url);
	$url = str_replace("model", "models", $url);

	// Requrire
	require "$url.php";
}

