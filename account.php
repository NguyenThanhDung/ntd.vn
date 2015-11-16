<?php
include "config.php";
include "utils.php";
include "database/DataManager.php";
include "manager/UserManager.php";
include "objects/User.php";

session_start();

$action = $_GET["action"];
$source = $_GET["source"];
Utils::Log("action=$action");
Utils::Log("source=$source");

$include_page = "";
$message = "";

switch($action)
{
	case "create_account":
		$displayName = isset($_POST["display_name"]) ? $_POST["display_name"] : false;
		$email = isset($_POST["email"]) ? $_POST["email"] : false;
		$password = isset($_POST["password"]) ? $_POST["password"] : false;
		$retypePassword = isset($_POST["retype_password"]) ? $_POST["retype_password"] : false;
		
		$error = 0;
		if(!$displayName || !$email || !$password || !$retypePassword)
		{
			$error = 1;
		}
		if(!$error && $password != $retypePassword)
		{
			$error = 2;
		}
		
		if(!$error)
		{
			$user = UserManager::CreateUser($email, $password, $displayName);
			if($user)
			{
				$_SESSION["loggedUser"] = $user;
	 			$include_page = "pages/account/welcome_new_user.php";
			}
			else
			{
				$error = 3;
			}
		}
		
		if($error > 0)
		{
			switch($error)
			{
				case 1:
					$message = "Please fill in all information";
					break;
				case 2:
					$message = "Password does not match";
					break;
				case 3:
					$message = "This email or display name has already exist";
					break;
			}
			$include_page = "pages/account/new_user_form.php";
		}
		
		break;
		
	case "log_in":
		$name_or_email = isset($_POST["name_or_email"]) ? $_POST["name_or_email"] : false;
		$password = isset($_POST["password"]) ? $_POST["password"] : false;
		
		if($name_or_email && $password)
		{
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