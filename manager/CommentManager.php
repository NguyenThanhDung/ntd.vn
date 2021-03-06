<?php
class EntryType
{
	const PROGRAMMING = 0;
	const GUITAR = 1;
	const PHOTO = 2;
	const XCLAM = 3;
}

class CommentManager
{
	static function GetComments($entryType, $entryId)
	{
		$sql = "SELECT * FROM Comment WHERE EntryType=$entryType AND EntryId=$entryId";
		$result = DataManager::ExercuseQuery($sql);
		
		$comments = array();
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$id = $row["Id"];
			$user = UserManager::GetUserByEmail($row["Email"]);
			$content = $row["Content"];
			$dateTime = $row["DateTime"];
			$entryType = $row["EntryType"];
			$entryId = $row["EntryId"];
			
			$comments[$i++] = new Comment($id, $user, $content, $dateTime, $entryType, $entryId);
		}
		
		return $comments;
	}
	
	static function GetCommentById($id)
	{
		$date1 = mktime(8, 35, 0, 8, 26, 2015);
		$user1 = new User("lai@email.com", "123", "Lai", "", UserType::GUEST);
		$comment1 = new Comment(1, $user1, "This is Lai's comment", $date1, $entryType, $entryId);
		return $comment1;
	}
	
	static function PostComment($user, $content, $entryType, $entryId)
	{
		$email = $user->GetEmail();
		$content = str_replace("'", "\'", $content);
		$dateTime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
		
		$sql = "INSERT INTO Comment (Email,Content,DateTime,EntryType,EntryId)
				VALUES ('$email', '$content', $dateTime, $entryType, $entryId)";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function UpdateComment($id, $user, $content, $entryType, $entryId)
	{
		
	}
	
	static function DeleteComment($id)
	{
		$sql = "DELETE FROM Comment WHERE Id=$id";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function DeleteComments($entryType, $entryId)
	{
		$sql = "DELETE FROM Comment WHERE EntryType=$entryType AND EntryId=$entryId";		
		return DataManager::ExercuseQuery($sql);
	}
	
	static function CreateTable()
	{
		$sql = "CREATE TABLE Comment(
					Id int NOT NULL AUTO_INCREMENT,
					Email varchar(255) NOT NULL,
					Content varchar(1024) NOT NULL,
					DateTime int NOT NULL DEFAULT 0,
					EntryType int NOT NULL DEFAULT 1,
					EntryId int NOT NULL DEFAULT 1,
					PRIMARY KEY (Id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		return DataManager::ExercuseQuery($sql);
	}
	
	static function DropTable()
	{
		$sql = "DROP TABLE IF EXISTS Comment";
		return DataManager::ExercuseQuery($sql);
	}
}
?>