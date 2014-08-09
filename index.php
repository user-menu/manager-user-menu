<?php
// goi file cau hinh
require "config.php";

// Neu $_GET ton tai va dung dinh dang cho phep
if(isset($_GET['controller']) && preg_match("/^[a-z]+$/", $_GET['controller']))
{
	// Bat su kien switch case cho $_GET
	switch ($_GET['controller']) {
		case 'user':
			require "controllers/user/action.php";
			break;

		case 'menu':
			require "controllers/menu/action.php";
			break;

		default:
			require "controllers/home/index.php";
			break;
	} // END SWITCH $_GET['controller']
}// END If
else
{
	// Neu khong ton tai $_GET
	require "controllers/home/index.php";
}// END Else