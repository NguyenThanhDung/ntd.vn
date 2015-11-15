<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - Edit Xclam</title>
	<link rel="stylesheet" type="text/css" href="style/xclams.css">
	<link rel="shortcut icon" href="images/icon.png">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div class="wrap">
		<div id="form">
			<div class="enter_xclam">
				<form action="xclams.php?action=<?php echo ACTION_SUBMIT_EDITED_XCLAM; ?>" method="post">
					<input type="hidden" name="id" value="<?php echo $editingXclam->GetId(); ?>"/>
					<textarea name="content" rows="4" cols="80"><?php echo $editingXclam->GetContent(); ?></textarea>
					<input type="submit" value="Send">;
				</form>
			</div>
		</div>
	</div>
	
</body>

</html>