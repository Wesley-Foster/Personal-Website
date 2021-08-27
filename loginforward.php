<?php
session_start();
if(isset($_SESSION['auth'])){
	if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
	}else{
		
	}
}else{
	header('Location:index.php');
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logged In Page</title>
</head>
	
<body>
	<form action="loginforward.php" method="post">
		<input type="submit" name='logout' value='logout'>
	<h3 style="text-decoration: underline">Admin Navigator</h3>
	<h5><a href="msgs.php">Messages Page</a></h5>
	<h5><a href="indexblogger.php">Home Page Blog Post</a></h5>
	<h5><a href="index.php">Home</a></h5>
	<h5><a href="ContMe.php">Contact Me</a></h5>
	<h5><a href="MyProj.php">My Projects</a></h5>
	<h5><a href="MediaPge.php">Media</a></h5>
	<h5><a href="config/conn_cme.php">SQL Connection</a></h5>
</body>
	
</html>