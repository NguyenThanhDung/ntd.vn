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
				"W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.", 
				$date1);
		
		$date2 = mktime(10, 32, 0, 8, 26, 2015);		
		$xclam2 = new Xclam(2, 
				"Used together with the direction property to set or return whether the text should be overridden to support multiple languages in the same document.", 
				$date2);
		
		$date3 = mktime(14, 8, 0, 8, 26, 2015);		
		$xclam3 = new Xclam(3, 
				"Increases or decreases the space between words in a text.", 
				$date3);
		
		return array($xclam1, $xclam2, $xclam3);
	}
}
?>