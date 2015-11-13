<?php
class Xclam
{
	var $id;
	var $content;
	var $dateTime;
	
	function Xclam($id, $content, $dateTime)
	{
		$this->id = $id;
		$this->content = $content;
		$this->dateTime = $dateTime;
	}
	
	function GetId()
	{
		return $this->id;		
	}
	
	function GetContent()
	{
		return $this->content;
	}
	
	function GetFormatedContent()
	{
		$this->content = "<p>".str_replace("\n", "<br/>", $this->content)."</p>";		
		return $this->content;
	}
	
	function GetDateTimeAsSecond()
	{
		return $this->dateTime;
	}
	
	function GetFormatedTime()
	{
		return date("h:i A, D", $this->dateTime);
	}
	
	function GetFormatedDate()
	{
		return date("M dS, Y", $this->dateTime);
	}
}
?>