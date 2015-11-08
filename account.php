<?php
include "config.php";
include "utils.php"; 
include "manager/UserManager.php";
include "objects/User.php";

session_start();
date_default_timezone_set("Asia/Saigon");

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
		
		$user = UserManager::CreateUser($email, $password, $displayName);
		if($user)
		{
			$_SESSION["loggedUser"] = $user;
 			$include_page = "pages/account/welcome_new_user.php";
		}
		else
		{
			$message = "Invalid information";
			$include_page = "pages/account/new_user_form.php";
		}
		
		break;
		
	case "log_in":
		$name_or_email = $_POST["name_or_email"];
		$password = $_POST["password"];
		
		$loggedUser = UserManager::LogIn($name_or_email, $password);
		if($loggedUser)
		{
			$_SESSION["loggedUser"] = $loggedUser;
 			$include_page = "pages/account/logging_in.php";
		}
		else
		{
			$message = "Invalid information";
			$include_page = "pages/account/log_in_form.php";
		}
		
		break;
		
	case "logout":
		$_SESSION["loggedUser"] = false;
		$include_page =  "pages/account/logging_out.php";
		break;
		
	default:
		$include_page =  "pages/account/$action.php";
		break;
}

Utils::Log("include_page=$include_page");
include $include_page;
?>