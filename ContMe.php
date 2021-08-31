<?php
$errors = ['name'=> '', 'subject'=> '', 'msg'=>''];
include('config/conn_cme.php');	

if(isset($_POST['submit'])){
	if(empty($_POST['name'])){
		$errors['name'] = 'A name is required <br />';
	} else{
		echo htmlspecialchars($_POST['name']);
		echo ' ';
	}
	if(empty($_POST['subject'])){
		$errors['subject'] = 'A subject is required <br />';
	} else{
		echo htmlspecialchars($_POST['subject']);
		echo ' ';
	}
	if(empty($_POST['msg'])){
		$errors['msg'] = 'A message is required <br />';
	}else{
		echo htmlspecialchars($_POST['msg']);
	}
	if(array_filter($errors)){
		
	}else{
		
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$msg = mysqli_real_escape_string($conn, $_POST['msg']);
		
		//create a variable to insert data
		$sql = "INSERT INTO usr_msg(name, subj, msg) VALUES('$name', '$subject', '$msg')";
		
		// save and check
		if(mysqli_query($conn, $sql)){
			header('Location: index.php');

			mysqli_close($conn);
		} else{
			echo 'Q Error: ' . mysqli_error($conn);
		}
		
		
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	<style>
		body {
			position: relative;
			min-height: 100vh;
		}

	</style>
	</head>
<?php include('Header.php'); ?>		
		
		
<body>			
		<br>
		<section class="holder" style="padding-left: 100px; padding-right:100px; color: #AAABB8;">
			<form class="white" action="ContMe.php" method="POST" style="max-width: 560px; margin: 20px auto; padding: 20px;">
				<label >Your Name:</label>
				<input type="text" name="name">
				<br>
				<div  style="color: #9C0002"><?php echo $errors['name']; ?></div>
				<br>
				<label>Message Subject:</label>
				<input type="text" name="subject">
				<br>
				<div style="color: #9C0002;"><?php echo $errors['subject']; ?></div>
				<br>
				<label >Message:</label>
				<textarea name="msg" id="msg" rows="20" cols="80"></textarea>
				<div  style="color: #9C0002;"><?php echo $errors['msg']; ?></div>
				<br>
				
				<div class="center">
					<input type="submit" name="submit" value="submit" class="btn z-depth-0">
				</div>
				
			</form>
		</section>
		<br />
		<br />
		<br />
		<br />
			

		
		
		<footer>
		<?php include('Footer.php')?>
		</footer>
	
	</body>
</html>