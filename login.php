<?php
include('config/conn_cme.php');
$sql = 'SELECT user, passw FROM login';
$result = mysqli_query($conn, $sql);
$logins = mysqli_fetch_all($result, MYSQLI_ASSOC);

session_start();
foreach($logins as $login){
	if(isset($_POST['submit'])){
		if($_POST['uname'] = $login['user'] && $_POST['psw'] = $login['passw']){
			$_SESSION['auth'] = true;
			header('Location: loginforward.php');
			mysqli_free_result($result);
			mysqli_close($conn);
		} else{
			echo 'incorrect username or password';
		}
	}

}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	<form class="white" action="login.php" method="POST" style="max-width: 560px; margin: 20px auto; padding: 20px;">
    	<label for="uname"><b>Username</b></label>
    	<input type="text" placeholder="Enter Username" name="uname" required>

    	<label for="psw"><b>Password</b></label>
    	<input type="password" placeholder="Enter Password" name="psw" required>
	
		<input type="submit" name="submit" value="submit" class="btn z-depth-0">
	</form>
 </div>
	
</body>
</html>
