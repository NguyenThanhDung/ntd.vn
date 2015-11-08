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
}
?>