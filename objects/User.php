<?php
class User
{
	var $email;
	var $password;
	var $displayName;
	var $avatar;
	var $type;
	
	const GUEST = 0;
	const ADMIN = 1;
	
	function User($email, $password, $displayName, $avatar, $type)
	{
		$this->email = $email;
		$this->password = $password;
		$this->displayName = $displayName;
		$this->avatar = $avatar;
		$this->type = $type;
	}
	
	function GetEmail()
	{
		return $this->email;
	}
	
	function GetPassword()
	{
		return $this->password;
	}
	
	function GetDisplayName()
	{
		return $this->displayName;
	}
	
	function GetAvatar()
	{
		return $this->avatar;
	}
	
	function GetType()
	{
		return $this->type;
	}
}