<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website - Welcome</title>
	<link rel="stylesheet" type="text/css" href="style/account.css">
</head>

<body>

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="welcome">		
		<h4>Logging out...</h3>
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