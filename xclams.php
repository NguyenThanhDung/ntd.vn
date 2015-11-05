<?php
session_start();

$wasLogin = isset($_SESSION["wasLogin"]) ? $_SESSION["wasLogin"] : false;

include "xclams/interface.php";
?>