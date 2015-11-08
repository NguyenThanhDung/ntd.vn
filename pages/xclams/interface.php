<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website</title>
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/xclams.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="account">
		<?php
		if($loggedUser)
		{
			echo "<p><b>".$loggedUser->GetDisplayName()."</b> | <a href='account.php?action=logout&source=xclams'>Log out</a></p>";
		}
		else
		{
			echo "<p><a href='account.php?action=log_in_form&source=xclams'>Login</a> | <a href='account.php?action=new_user_form&source=xclams'>Create account</a></p>";
		}
		?>
	</div>
	
	<div class="wrap">
	
	<?php
		for($i = 0; $i < $xclams_count; $i++)
		{
			echo '<div class="entry">';
			
			echo '	<div class="datetime">';
			echo '		<p>'.$xclams[$i]->GetFormatedTime().'<br/>'.$xclams[$i]->GetFormatedDate().'</p>';
			echo '	</div>';
			
			echo '	<div class="content">'.$xclams[$i]->GetContent().'</div>';
			
			echo '	<div class="comments">';
			$comments_count = $comments[$i] ? count($comments[$i]) : 0;
			for($j = 0; $j < $comments_count; $j++)
			{
				echo '<p><span class="user">'.$comments[$i][$j]->GetUser()->GetDisplayName().':</span> '.$comments[$i][$j]->GetContent().'</p>';
			}
			echo '	</div';
			
			if($loggedUser)
			{
				echo '<div class="comment_form">';
				echo '	<form>';
				echo '		<input type="text" name="comment_content" value="Write a comment...">';
				echo '		<input type="submit" value="Send">';
				echo '	</form>';
				echo '</div>';
			}
			else
			{
				echo '<div class="comment_link">';
				echo '	<a href="login.php">Comment</a>';
				echo '</div>';
			}
			
			echo '</div>';
		}
	?>
		
	</div>

</body>

</html>