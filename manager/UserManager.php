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
}
?>