<?php

include('config/conn_cme.php');


session_start();
if($_SESSION['auth']){
	
}else{
	header('Location: index.php');
}

if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');

} elseif(isset($_POST['delete'])){
	$did = $_POST['delete'];
	$delete_id= mysqli_real_escape_string($conn, $did);
	$sql = "DELETE FROM usr_msg WHERE id=$delete_id";
	if(mysqli_query($conn,$sql));
}else{
	echo 'Current Query Errors: ' . mysqli_error($conn);
}





//get messages
$sql = 	'SELECT * FROM usr_msg ORDER BY time';

//make query and results
$result = mysqli_query($conn, $sql);

$msgs = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<title>Messages Page</title>
</head>
<body>
	<form action="msgs.php" method="post">
		<input type="submit" name='logout' value='logout'>	
	<h5 style="text-decoration: underline;"><a href="loginforward.php">Back</a></h5>
	<h3>Messages</h3>

	
	<div class="container">
		<div class='row'>
		<?php foreach($msgs as $msg){ ?>
			
			<div class="col s12 m6">
				<div class="card">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($msg['name']);?></h6>
						<div><?php echo htmlspecialchars($msg['subj']); ?></div>
						<div><?php echo $msg['time'];?></div>
						<div><?php echo htmlspecialchars($msg['msg']); ?></div>
						
						<!--button-->
						<form action='msgs.php' method="post">
							<input type="hidden" name="delete_id" value="<?php echo $msg['id'] ?>">
							<input type="submit" name="delete" value="<?php echo $msg['id'] ?>">
							
							
						<hr>
					</div>
				
				</div>
			
			</div>
			
		<?php } ?>
		</div>
	
	</div>
	
</body>
</html>