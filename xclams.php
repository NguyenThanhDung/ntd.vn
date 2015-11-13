<?php
include "config.php";
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

session_start();
date_default_timezone_set("Asia/Saigon");

$loggedUser = isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : false;

$action = isset($_GET["action"]) ? $_GET["action"] : ACTION_NONE;
$includedPage = "list";
$message = false;

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
				$xclamId = $_GET["id"];
				$editingXclam = XclamManager::GetXclamById($xclamId);
				$includedPage = "edit_xclam";
			}
			break;
			
		case ACTION_SUBMIT_EDITED_XCLAM:
			if($loggedUser->GetType() == UserType::ADMIN)
			{
				$id = $_POST["id"];
				$content = $_POST["content"];
				XclamManager::UpdateXclam($xclamId, $content);
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
			$content = $_POST["content"];
			$entryId = $_POST["entry_id"];
			CommentManager::PostComment($loggedUser, $content, EntryType::XCLAM, $entryId);			
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
			$id = $_GET["id"];
			CommentManager::DeleteComment($id);
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