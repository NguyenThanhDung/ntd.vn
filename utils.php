<?php
class Utils
{
	static function Log($content) {
		if(Config::IS_DEBUG)
		{
			echo "<p>[DEBUG] $content</p>";
		}
	}
}
?>