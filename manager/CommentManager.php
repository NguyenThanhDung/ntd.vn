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
		if($entryType == EntryType::XCLAM && $entryId == 1)
		{
			$date1 = mktime(8, 35, 0, 8, 26, 2015);
			$user1 = new User("lai@email.com", "123", "Lai", "", UserType::GUEST);
			$comment1 = new Comment(1, $user1, "This is Lai's comment", $date1, $entryType, $entryId);
			
			$date2 = mktime(8, 39, 0, 8, 26, 2015);
			$user2 = new User("dung@email.com", "123", "Dung", "", UserType::ADMIN);
			$comment2 = new Comment(2, $user2, "This is Dung's comment", $date2, $entryType, $entryId);
			
			return array($comment1, $comment2);
		}
		else
		{
			return false;
		}
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