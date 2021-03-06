<?php
$xclams = XclamManager::GetXclams(1);
$xclams_count = count($xclams);

$comments = array();
for($i =0; $i < $xclams_count; $i++)
{
	$comments[$i] = CommentManager::GetComments(EntryType::XCLAM, $xclams[$i]->GetId());
}
?>

<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website</title>
	<link rel="stylesheet" type="text/css" href="style/xclams.css">
</head>

<body>

	<div id="logo">
		<a href="index.php"><img alt="Logo" src="images/logo.png"></a>
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
	
	<div class="enter_xclam">
		<?php if($loggedUser && $loggedUser->GetType() == UserType::ADMIN) {	?>
		<form action="xclams.php?action=<?php echo ACTION_POST_XCLAM; ?>" method="post">
			<textarea name="content" rows="4" cols="80">How are you today?</textarea>
			<input type="submit" value="Send">;
		</form>
		<?php } ?>
	</div>
	
	<?php
		for($i = 0; $i < $xclams_count; $i++)
		{
			echo '<div class="entry">';
			
			echo '	<div class="datetime">';
			echo '		<p>'.$xclams[$i]->GetFormatedTime().'<br/>'.$xclams[$i]->GetFormatedDate().'</p>';
			echo '	</div>';
			
			if($loggedUser && $loggedUser->GetType() == UserType::ADMIN)
			{
				echo '<div class="edit_delete">';
				echo '	<p><a href="xclams.php?action='.ACTION_EDIT_XCLAM_FORM.'&id='.$xclams[$i]->GetId().'">Edit</a><br/>';
				echo '	<a href="xclams.php?action='.ACTION_DELETE_XCLAM.'&id='.$xclams[$i]->GetId().'">Delete</a></p>';
				echo '</div>';
			}
			else
			{
				echo '<div class="edit_delete"><p>&nbsp;</p></div>';
			}
			
			echo '	<div class="content">'.$xclams[$i]->GetFormatedContent().'</div>';
			
			echo '	<div class="comments">';
			$comments_count = $comments[$i] ? count($comments[$i]) : 0;
			for($j = 0; $j < $comments_count; $j++)
			{
				echo '<p>'.$comments[$i][$j]->GetFormatedTime().', '.$comments[$i][$j]->GetFormatedDate().' - ';
				echo '<span class="user">'.$comments[$i][$j]->GetUser()->GetDisplayName().'</span>: ';
				echo $comments[$i][$j]->GetContent();
				
				if($loggedUser && ($loggedUser->GetType() == UserType::ADMIN || $comments[$i][$j]->GetUser()->GetEmail() == $loggedUser->GetEmail()))
				{
					echo ' - <a href="xclams.php?action='.ACTION_DELETE_COMMENT.'&id='.$comments[$i][$j]->GetId().'">Delete</a>';
				}
				
				echo '</p>';				
			}
			echo '	</div>';
			
			if($loggedUser)
			{
				echo '<div class="comment_form">';
				echo '	<form action="xclams.php?action='.ACTION_POST_COMMENT.'" method="post">';
				echo '		<input type="text" name="content" value="Write a comment...">';
				echo '		<input type="hidden" name="entry_id" value="'.$xclams[$i]->GetId().'">';
				echo '		<input type="submit" value="Send">';
				echo '	</form>';
				echo '</div>';
			}
			else
			{
				echo '<div class="comment_link">';
				echo '	<a href="account.php?action=log_in_form&source=xclams">Comment</a>';
				echo '</div>';
			}
			
			echo '</div>';
		}
	?>
		
	</div>

</body>

</html>