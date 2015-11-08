<?php
include "objects/User.php";
include "objects/Xclam.php";
include "manager/XclamManager.php";

session_start();
date_default_timezone_set("Asia/Saigon");

$loggedUser = isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : false;

$xclams = XclamManager::GetXclams(1);

include "pages/xclams/interface.php";
?>