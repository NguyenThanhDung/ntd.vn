<?php
class UserManager
{
	static function CreateUser($email, $password, $displayName)
	{
		$user = new User("dung@email.com", "123", "Dung", "", User::ADMIN);
		return $user;
	}
	
	static function Login($name_or_email, $password)
	{
		$user = new User("dung@email.com", "123", "Dung", "", User::ADMIN);
		
		if($name_or_email == $user->GetEmail() && $password == $user->GetPassword())
			return $user;
		if($name_or_email == $user->GetDisplayName() && $password == $user->GetPassword())
			return $user;
		return false;
	}
}
?>