<?php
session_start();

include "config.php";
include "utils.php"; 
include "manager/UserManager.php";

$action = $_GET["action"];
$source = $_GET["source"];
Utils::Log("action=$action");
Utils::Log("source=$source");

$include_page = "";
$message = "";

switch($action)
{
	case "create_account":
		$email = $_POST["email"];
		$password = $_POST["password"];
		$displayName = $_POST["display_name"];
		
		$result = UserManager::CreateUser($email, $password, $displayName);
		if($result)
		{
			$include_page = "pages/account/welcome_new_user.php";
			$_SESSION["loggedUser"] = $displayName;
		}
		else
		{
			$message = "Invalid information";
			$include_page = "pages/account/new_user_form.php";
		}
		
		break;
		
	default:
		$include_page =  "pages/account/$action.php";
		break;
}

Utils::Log("include_page=$include_page");
include $include_page;
?>