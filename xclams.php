<?php
include "objects/User.php";
include "objects/Xclam.php";
include "objects/Comment.php";
include "manager/UserManager.php";
include "manager/XclamManager.php";
include "manager/CommentManager.php";

session_start();
date_default_timezone_set("Asia/Saigon");

$loggedUser = isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : false;

$xclams = XclamManager::GetXclams(1);
$xclams_count = count($xclams);

$comments = array();
for($i =0; $i < $xclams_count; $i++)
{
	$comments[$i] = CommentManager::GetComments(EntryType::XCLAM, $xclams[$i]->GetId());
}

include "pages/xclams/interface.php";
?>