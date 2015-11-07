<?php
session_start();

$action = $_GET["action"];
$source = $_GET["source"]; 

switch ($action)
{
	case "new_user_form":
		include "pages/account/new_user_form.php";
		break;
	default:
		break;
}
?>