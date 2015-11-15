<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - Edit Comment</title>
	<link rel="stylesheet" type="text/css" href="style/xclams.css">
	<link rel="shortcut icon" href="images/icon.png">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="form">
		<div class="comment_form">
			<form action="xclams.php?action=<?php echo ACTION_SUBMIT_EDITED_COMMENT; ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $editingComment->GetId(); ?>">
				<input type="text" name="content" value="<?php echo $editingComment->GetContent(); ?>">
				<input type="hidden" name="entry_id" value="<?php echo EntryType::XCLAM; ?>">
				<input type="submit" value="Send">
			</form>
		</div>
	</div>
	
</body>

</html>