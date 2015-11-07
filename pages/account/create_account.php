<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - New Account</title>
	<link rel="stylesheet" type="text/css" href="style/account.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="form">
		<form action="account/create_account.php" method="post">
			<table border="0">
				<tr>
					<td><p>Email</p></td>
					<td><input type="email" name="email" size="40"></td>
				</tr>
				<tr>
					<td><p>Password</p></td>
					<td><input type="password" name="password" size="30"></td>
				</tr>
				<tr>
					<td><p>Retype password</p></td>
					<td><input type="password" name="retype_password" size="30"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Create"></td>
				</tr>
			</table>
		</form>
	</div>
	
</body>

</html>