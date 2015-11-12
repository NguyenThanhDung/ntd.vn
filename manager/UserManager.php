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
	
	static function DidEmailExist($newEmail)
	{
		$sql = "SELECT Email FROM User";
		$emails = DataManager::ExercuseQuery($sql);
		
		$count = count($emails);		
		for($i = 0; $i < $count; $i++)
		{
			if($newEmail == $emails[$i])
			{
				return true;
			}
		}
		
		return false;
	}
	
	static function DidDisplayNameExist($newDisplayName)
	{
		$sql = "SELECT DisplayName FROM User";
		$displayNames = DataManager::ExercuseQuery($sql);
		
		$count = count($displayNames);
		for($i = 0; $i < $count; $i++)
		{
			if($newDisplayName == $displayNames[$i])
			{
				return true;
			}
		}
		
		return false;
	}
	
	static function Login($name_or_email, $password)
	{
		$user = new User("dung@email.com", "123", "Dung", "", UserType::ADMIN);
		
		if($name_or_email == $user->GetEmail() && $password == $user->GetPassword())
			return $user;
		if($name_or_email == $user->GetDisplayName() && $password == $user->GetPassword())
			return $user;
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