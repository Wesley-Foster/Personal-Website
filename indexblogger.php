<?php
include('config/conn_cme.php');

session_start();
if(isset($_SESSION['auth'])){
	
}else{
	header('Location: index.php');
}
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
}

if(isset($_POST['submit'])){	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$txt = mysqli_real_escape_string($conn, $_POST['txt']);

	$sql = "INSERT INTO blog_post(title, text) VALUES('$title', '$txt')";
	$result=mysqli_query($conn,$sql);
	
	if($result){
	echo "Blog Posted";
	mysqli_close($conn);
	}else{
	Echo 'Q Error' . mysqli_error($conn);
	}
}


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blog Poster</title>
</head>
	
<body>
	<form action="indexblogger.php" method="post">
		<label >Title:</label>
		<input type="text" name="title">
		<br>
		<br>
		<label >Text:</label>
		<textarea name="txt" id="txt" rows="20" cols="80"></textarea>>
		<br>
		<div>
			<input type="submit" name="submit">
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		
		
<form action="indexblogger.php" method="post">
	<input type="submit" name='logout' value='logout'>
<p><a href="loginforward.php">Back</a></p>
	
</body>
	

</html>