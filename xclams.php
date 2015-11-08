<?php
include "objects/User.php";

session_start();

$loggedUser = isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : false;

include "pages/xclams/interface.php";
?>