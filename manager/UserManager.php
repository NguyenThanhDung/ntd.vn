<?php
class UserManager
{
	static function CreateUser($email, $password, $displayName)
	{
		return true;
	}
	
	static function Login($name_or_email, $password)
	{
		if($name_or_email == "Dung" && $password == "123")
			return "Dung";
		if($name_or_email == "dung@email.com" && $password == "123")
			return "Dung";
		return false;
	}
}
?>