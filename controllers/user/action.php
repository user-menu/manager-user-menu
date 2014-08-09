<?php

// Neu $_GET ton tai va dung dinh dang cho phep
if(isset($_GET['action']) && preg_match("/^[a-z]+$/", $_GET['action']))
{
	// Bat su kien switch case cho $_GET
	switch ($_GET['action']) {
		case 'list':
			require "controllers/user/list.php";
			break;

		case 'add':
			require "controllers/user/add.php";
			break;

		case 'edit':
			require "controllers/user/edit.php";
			break;

		case 'del':
			require "controllers/user/del.php";
			break;

		default:
			require "controllers/home/list.php";
			break;
	} // END SWITCH $_GET['action']
}// END If
else
{
	// Neu khong ton tai $_GET
	require "controllers/user/list.php";
}// END Else