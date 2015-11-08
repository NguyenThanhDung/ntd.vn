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
	
		<div class="entry">			
			<div class="datetime">
				<p><?php echo $xclams[0]->GetFormatedTime()."<br/>".$xclams[0]->GetFormatedDate(); ?></p>
			</div>			
			<div class="content">
				<?php echo $xclams[0]->GetContent(); ?>
			</div>
			<div class="comments">
				<p><span class="user"><?php echo $comments[0][0]->GetUser()->GetDisplayName(); ?>:</span> <?php echo $comments[0][0]->GetContent(); ?></p>
				<p><span class="user"><?php echo $comments[0][1]->GetUser()->GetDisplayName(); ?>:</span> <?php echo $comments[0][1]->GetContent(); ?></p>
			</div>
			<?php if($loggedUser)	{ ?>
				<div class="comment_form">
					<form>
						<input type="text" name="comment_content" value="Write a comment...">
						<input type="submit" value="Send">
					</form>
				</div>
			<?php } else {	?>
				<div class="comment_link">
					<a href="login.php">Comment</a>
				</div>
			<?php } ?>
		</div>
	
		<div class="entry">			
			<div class="datetime">
				<p><?php echo $xclams[1]->GetFormatedTime()."<br/>".$xclams[1]->GetFormatedDate(); ?></p>
			</div>			
			<div class="content">
				<?php echo $xclams[1]->GetContent(); ?>
			</div>
			<div class="comments">
			</div>
			<?php if($loggedUser)	{ ?>
				<div class="comment_form">
					<form>
						<input type="text" name="comment_content" value="Write a comment...">
						<input type="submit" value="Send">
					</form>
				</div>
			<?php } else {	?>
				<div class="comment_link">
					<a href="login.php">Comment</a>
				</div>
			<?php } ?>
		</div>
	
		<div class="entry">			
			<div class="datetime">
				<p><?php echo $xclams[2]->GetFormatedTime()."<br/>".$xclams[2]->GetFormatedDate(); ?></p>
			</div>			
			<div class="content">
				<?php echo $xclams[2]->GetContent(); ?>
			</div>		
			<div class="comments">
			</div>
			<?php if($loggedUser)	{ ?>
				<div class="comment_form">
					<form>
						<input type="text" name="comment_content" value="Write a comment...">
						<input type="submit" value="Send">
					</form>
				</div>
			<?php } else {	?>
				<div class="comment_link">
					<a href="login.php">Comment</a>
				</div>
			<?php } ?>
		</div>
		
	</div>

</body>

</html>