<?php
include "../database/DataManager.php";
include "../manager/UserManager.php";
include "../manager/XclamManager.php";
include "../manager/CommentManager.php";
?>

<html>
<head>
	<title>Install</title>
</head>
<body>

<?php
date_default_timezone_set("Asia/Saigon");

require("../config.php");

//*********************
// DROP TABLE IF EXIST
//*********************
echo "<p>Droping existing table if exist...</p>";

// Drop Category table
echo "<p>Drop table User if exist<br/>";
if(UserManager::DropTable())
	echo "Table User is droped</p>";
else
	echo "Error has occured while drop table User</p>";

// Drop Xclam table
echo "<p>Drop table Xclam if exist<br/>";
if(XclamManager::DropTable())
	echo "Table Xclam is droped</p>";
else
	echo "Error has occured while drop table Xclam</p>";

// Drop Comment table
echo "<p>Drop table Comment if exist<br/>";
if(CommentManager::DropTable())
	echo "Table Comment is droped</p>";
else
	echo "Error has occured while drop table Comment</p>";

//*********************
// CREATE TABLE
//*********************
echo "<p>Creating table...</p>";

echo "<p>";

// Create User table
if(UserManager::CreateTable())
	echo "Created <b>User</b> table<br/>";
else
	echo "Error has occured while create table User<br/>";

// Create Xclam table
if(XclamManager::CreateTable())
	echo "Created <b>Xclam</b> table<br/>";
else
	echo "Error has occured while create table Xclam<br/>";
	
// Create Comment table
if(CommentManager::CreateTable())
	echo "Created <b>Comment</b> table<br/>";
else
	echo "Error has occured while create table Comment<br/>";

echo "</p>";
	
echo "<p>Finish.</p>";
?>

</body>
</html>