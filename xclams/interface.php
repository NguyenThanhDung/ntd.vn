<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website</title>
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/blog.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="search">
		<form>
			<input type="text" name="search_keyword" value="Find message...">
		</form>
	</div>
	
	<div class="wrap">
	
		<div class="entry">			
			<div class="datetime">
				<p>8:27 AM, Wed<br/>Aug 26th, 2015</p>
			</div>			
			<div class="content">
				<p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.</p>
				<p>Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2015 by Refsnes Data. All Rights Reserved.</p>
			</div>
			<div class="comments">
				<p><span class="user">User 1:</span> This is a comment</p>
				<p><span class="user">User 2:</span> This is a comment</p>
			</div>
			<?php if($wasLogin)	{ ?>
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
				<p>10:32 AM, Wed<br/>Aug 26th, 2015</p>
			</div>			
			<div class="content">
				<p>Used together with the direction property to set or return whether the text should be overridden to support multiple languages in the same document</p>
			</div>
			<div class="comments">
			</div>
			<?php if($wasLogin)	{ ?>
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
				<p>2:08 PM, Wed<br/>Aug 26th, 2015</p>
			</div>			
			<div class="content">
				<p>Increases or decreases the space between words in a text</p>
			</div>		
			<div class="comments">
			</div>
			<?php if($wasLogin)	{ ?>
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