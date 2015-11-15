<?php
class UserType
{
	const GUEST = 0;
	const ADMIN = 1;	
}

class UserManager
{	
	static function CreateUser($email, $password, $displayName)
	{
		$didEmailExist = self::DidEmailExist($email);
		if($didEmailExist)
			return false;
		
		$didDisplayNameExist = self::DidDisplayNameExist($displayName);
		if($didDisplayNameExist)
			return false;
		
		$sql = "INSERT INTO User (Email,Password,DisplayName)
				VALUES ('".$email."',
						'".$password."',
						'".$displayName."')";
		$result = DataManager::ExercuseQuery($sql);
		
		if($result)
		{
			$user = new User($email, $password, $displayName, "", UserType::GUEST);
			return $user;
		}
		else
		{
			return false;
		}
	}
	
	static function Login($name_or_email, $password)
	{
		$sql = "SELECT Email,DisplayName,Password FROM User";
		$users = DataManager::ExercuseQuery($sql);
		
		while($row = mysql_fetch_array($users))
		{
			if($name_or_email == $row["Email"] && $password == $row["Password"])
			{				
				return self::GetUserByEmail($row["Email"]);
			}
			if($name_or_email == $row["DisplayName"] && $password == $row["Password"])
			{
				return self::GetUserByEmail($row["Email"]);
			}
		}
		
		return false;
	}
	
	static function GetUserByEmail($email)
	{
		$sql = "SELECT * FROM User WHERE Email='$email'";
		$result = DataManager::ExercuseQuery($sql);
		$row = mysql_fetch_array($result);
		return new User($row["Email"], $row["Password"], $row["DisplayName"], $row["Avatar"], $row["Type"]);
	}
	
	static function DidEmailExist($newEmail)
	{
		$sql = "SELECT Email FROM User";
		$result = DataManager::ExercuseQuery($sql);
		
		while($row = mysql_fetch_array($result))
		{
			if($newEmail == $row["Email"])
			{
				return true;
			}
		}
		
		return false;
	}
	
	static function DidDisplayNameExist($newDisplayName)
	{
		$sql = "SELECT DisplayName FROM User";
		$result = DataManager::ExercuseQuery($sql);
		
		while($row = mysql_fetch_array($result))
		{
			if($newDisplayName == $row["DisplayName"])
			{
				return true;
			}
		}
		
		return false;
	}
	
	static function CreateTable()
	{
		$sql = "CREATE TABLE User(
					Email varchar(255) NOT NULL,
					Password varchar(255) NOT NULL,
					DisplayName varchar(255) NOT NULL,
					Avatar varchar(255),
					Type int NOT NULL DEFAULT 0,
					PRIMARY KEY (Email)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function DropTable()
	{
		$sql = "DROP TABLE IF EXISTS User";
		return DataManager::ExercuseQuery($sql);
	}
}
?>