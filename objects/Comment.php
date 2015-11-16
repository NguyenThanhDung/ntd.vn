<?php
class Comment
{
	var $id;
	var $user;
	var $content;
	var $dateTime;
	var $entryType;
	var $entryId;
	
	function Comment($id, $user, $content, $dateTime, $entryType, $entryId)
	{
		$this->id = $id;
		$this->user = $user;
		$this->content = $content;
		$this->dateTime = $dateTime;
		$this->entryType = $entryType;
		$this->entryId = $entryId;
	}
	
	function GetId()
	{
		return $this->id;
	}
	
	function GetUser()
	{
		return $this->user;
	}
	
	function GetContent()
	{
		return $this->content;
	}
	
	function GetDateTimeAsSecond()
	{
		return $this->dateTime;
	}
	
	function GetFormatedTime()
	{
		return date("h:i A", $this->dateTime + Config::TIMEZONE_OFFSET);
	}
	
	function GetFormatedDate()
	{
		return date("M dS", $this->dateTime + Config::TIMEZONE_OFFSET);
	}
	
	function GetEntryType()
	{
		return $this->entryType;
	}
	
	function GetEntryId()
	{
		return $this->entryId;
	}
}
?>