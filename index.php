<?php
date_default_timezone_set(Config::TIMEZONE);
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nguyễn Thành Dũng's Website</title>
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="shortcut icon" href="images/icon.png">
</head>

<body id="index_page">

	<div id="logo">
		<img alt="Logo" src="images/logo.png">
	</div>
	
	<div id="quotation">
		<p>We can not change the past, but we can change the future<br/>(Unknown)</p>
	</div>

	<div id="content">
	
			<div id="profile">
				<p id="name">Nguyễn Thành Dũng</p>
				<p id="info">Game Programmer<br/>27 years old<br/>Sai Gon, Viet Nam</p>
			</div>
		
			<div id="avatar">
				<img alt="Avatar" src="images/avatar.png">
			</div>
		
			<div id="line">
				<img alt="Line" src="images/line.png">
			</div>
		
			<div id="navigation_zone">
				<div class="navigator">
					<a class="link" href="constructing_page.php">
						<div id="programming"></div>
					</a>
					<div class="name">
						<p>Programming</p>
					</div>
					<div class="highlight">
						<img alt="Highlight" src="images/highlight.png">
					</div>
				</div>
				<div class="navigator">
					<a class="link" href="constructing_page.php">
						<div id="guitar"></div>
					</a>
					<div class="name">
						<p>Guitar</p>
					</div>
					<div class="highlight">
						<img alt="Highlight" src="images/highlight.png">
					</div>
				</div>
				<div class="navigator">
					<a class="link" href="constructing_page.php">
						<div id="photography"></div>
					</a>
					<div class="name">
						<p>Photography</p>
					</div>
					<div class="highlight">
						<img alt="Highlight" src="images/highlight.png">
					</div>
				</div>
				<div class="navigator">
					<a class="link" href="xclams.php">
						<div id="xclams"></div>
					</a>
					<div class="name">
						<p>Xclams</p>
					</div>
					<div class="highlight">
						<img alt="Highlight" src="images/highlight.png">
					</div>
				</div>
		</div>
	
	</div>
	
	<div id="copyright">
		<p>© 2015 Nguyễn Thành Dũng</p> 
	</div>

</body>

</html>