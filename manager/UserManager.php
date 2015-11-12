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
		$user = new User("dung@email.com", "123", "Dung", "", UserType::ADMIN);
		return $user;
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