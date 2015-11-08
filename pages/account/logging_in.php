<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - Logging out...</title>
	<link rel="stylesheet" type="text/css" href="style/account.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="welcome">		
		<h2>Welcome back <?php echo $loggedUser->GetDisplayName(); ?>!</h1>
		<h4>Have fun with my blog</h3>
		<p>&nbsp;</p>
		<img src="images/loading.gif"/>
	</div>
	
	<!-- Redirect to category page -->
	<script type="text/javascript">
	setTimeout(function () {
	   window.location.href="<?php echo $source; ?>.php";
	},5000);
	</script>
	
</body>

</html>