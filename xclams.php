<?php
// XCLAMS
// Arthor: Nguyen Thanh Dung
// Version: 1.0.1

// TODO:
// - Confirm with user before delete xclam or comment
// - Hide the suggestion text in the text input when user click on it
// - Display Xclams by page number
// - Adjust user inteface for mobile device
// - Validate the user email address

include "config.php";
include "utils.php";
include "objects/User.php";
include "objects/Xclam.php";
include "objects/Comment.php";
include "database/DataManager.php";
include "manager/UserManager.php";
include "manager/XclamManager.php";
include "manager/CommentManager.php";

const ACTION_NONE					= 0;
const ACTION_POST_XCLAM 			= 1;
const ACTION_EDIT_XCLAM_FORM 		= 2;
const ACTION_SUBMIT_EDITED_XCLAM 	= 3;
const ACTION_DELETE_XCLAM			= 4;
const ACTION_POST_COMMENT			= 5;
const ACTION_EDIT_COMMENT_FORM		= 6;
const ACTION_SUBMIT_EDITED_COMMENT	= 7;
const ACTION_DELETE_COMMENT			= 8;

date_default_timezone_set(Config::TIMEZONE);
session_start();

$loggedUser = isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : false;

$action = isset($_GET["action"]) ? $_GET["action"] : ACTION_NONE;
$includedPage = "list";
$message = false;
$editingXclam = false;

if($loggedUser)
{
	switch($action)
	{
		case ACTION_POST_XCLAM:
			if($loggedUser->GetType() == UserType::ADMIN && isset($_POST["content"]))
			{
				XclamManager::PostXclam($_POST["content"]);
			}
			break;

		case ACTION_EDIT_XCLAM_FORM:
			if($loggedUser->GetType() == UserType::ADMIN)
			{
				$id = isset($_GET["id"]) ? $_GET["id"] : false;
				$editingXclam = XclamManager::GetXclamById($id);
				if($id && $editingXclam)
				{
					$includedPage = "edit_xclam";
				}
			}
			break;

		case ACTION_SUBMIT_EDITED_XCLAM:
			if($loggedUser->GetType() == UserType::ADMIN)
			{
				$id = isset($_POST["id"]) ? $_POST["id"] : false;
				$content = isset($_POST["content"]) ? $_POST["content"] : false;
				if($id && $content)
				{
					XclamManager::UpdateXclam($id, $content);
				}
			}
			break;

		case ACTION_DELETE_XCLAM:
			if($loggedUser->GetType() == UserType::ADMIN)
			{
				if(isset($_GET["id"]))
				{
					XclamManager::DeleteXclam($_GET["id"]);
				}
			}
			break;

		case ACTION_POST_COMMENT:
			$content = isset($_POST["content"]) ? $_POST["content"] : false;
			$entryId = isset($_POST["entry_id"]) ? $_POST["entry_id"] : false;
			if($content && $entryId)
			{
				CommentManager::PostComment($loggedUser, $content, EntryType::XCLAM, $entryId);
			}
			break;

		case ACTION_EDIT_COMMENT_FORM:
			$id = $_GET["id"];
			$editingComment = CommentManager::GetCommentById($id);
			$includedPage = "edit_comment";
			break;

		case ACTION_SUBMIT_EDITED_COMMENT:
			$id = $_POST["id"];
			$content = $_POST["content"];
			$entryId = $_POST["entry_id"];
			CommentManager::UpdateComment($id, $loggedUser, $content, EntryType::XCLAM, $entryId);
			break;

		case ACTION_DELETE_COMMENT:
			if(isset($_GET["id"]))
			{
				CommentManager::DeleteComment($_GET["id"]);
			}
			break;

		default:
			break;
	}
}
else
{
	$message = "Please log in before take this action.";
}

include "pages/xclams/$includedPage.php";
?>