<?php
class XclamManager
{
	static function GetXclams($page)
	{
		if(!$page)
		{
			$page = 1;
		}
		
		$date1 = mktime(8, 27, 0, 8, 26, 2015);		
		$xclam1 = new Xclam(1, 
				"<p>[NEW] W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.</p>
				<p>Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved.</p>", 
				$date1);
		
		$date2 = mktime(10, 32, 0, 8, 26, 2015);		
		$xclam2 = new Xclam(2, 
				"<p>[NEW] Used together with the direction property to set or return whether the text should be overridden to support multiple languages in the same document</p>", 
				$date2);
		
		$date3 = mktime(14, 8, 0, 8, 26, 2015);		
		$xclam3 = new Xclam(3, 
				"<p>[NEW] Increases or decreases the space between words in a text</p>", 
				$date3);
		
		return array($xclam1, $xclam2, $xclam3);
	}
	
	static function GetXclamById($id)
	{
		$date1 = mktime(8, 27, 0, 8, 26, 2015);
		$xclam1 = new Xclam(1,
				"<p>[NEW] W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.</p>
				<p>Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved.</p>",
				$date1);
		return $xclam1;
	}
	
	static function PostXclam($content)
	{
		$content = str_replace("'", "\'", $content);
		$dateTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
		
		$sql = "INSERT INTO Xclam (Content, DateTime) VALUES ('$content', $dateTime)";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function UpdateXclam($id, $content)
	{
		
	}
	
	static function DeleteXclam($id)
	{
		
	}
	
	static function CreateTable()
	{
		$sql = "CREATE TABLE Xclam(
					Id int NOT NULL AUTO_INCREMENT,
					Content varchar(1024) NOT NULL,					
					DateTime int NOT NULL DEFAULT 0,
					PRIMARY KEY (Id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function DropTable()
	{
		$sql = "DROP TABLE IF EXISTS Xclam";
		return DataManager::ExercuseQuery($sql);
	}
}
?>