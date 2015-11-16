<?php
class XclamManager
{
	static function GetXclams($page)
	{
		if(!$page)
		{
			$page = 1;
		}
		
		$sql = "SELECT * FROM Xclam ORDER BY DateTime DESC";
		$result = DataManager::ExercuseQuery($sql);
		
		$xclams = array();
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$id = $row["Id"];
			$content = $row["Content"];
			$dateTime = $row["DateTime"];
			
			$xclams[$i++] = new Xclam($id, $content, $dateTime);
		}
		
		return $xclams;
	}
	
	static function GetXclamById($id)
	{
		$sql = "SELECT * FROM Xclam WHERE Id=$id";
		$result = DataManager::ExercuseQuery($sql);
		
		while($row = mysql_fetch_array($result))
		{
			$id = $row["Id"];
			$content = $row["Content"];
			$dateTime = $row["DateTime"];
			
			return new Xclam($id, $content, $dateTime);
		}
		
		return false;
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
		$content = str_replace("'", "\'", $content);		
		$sql = "UPDATE Xclam SET Content='$content' WHERE Id=$id";				
		return DataManager::ExercuseQuery($sql);		
	}
	
	static function DeleteXclam($id)
	{
		CommentManager::DeleteComments(EntryType::XCLAM, $id);
		
		$sql = "DELETE FROM Xclam WHERE Id=$id";
		return DataManager::ExercuseQuery($sql);
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