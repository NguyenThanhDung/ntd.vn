<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - Log in</title>
	<link rel="stylesheet" type="text/css" href="style/account.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="form">
		<?php
		if(isset($message) && $message != "")
		{
			echo "<p>$message</p>";
		}
		?>
		<form action="account.php?action=log_in&source=<?php echo $source; ?>" method="post">
			<table border="0">				
				<tr>
					<td><p>Name or Email</p></td>
					<td><input type="text" name="name_or_email" size="40"></td>
				</tr>
				<tr>
					<td><p>Password</p></td>
					<td><input type="password" name="password" size="30"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Log in"></td>
				</tr>
			</table>
		</form>
	</div>
	
</body>

</html>