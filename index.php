<?php
include('config/conn_cme.php');


//get messages
$sql = 'SELECT * FROM blog_post ORDER BY date';

//make query and results
$result = mysqli_query($conn, $sql);

$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

$ip_address = $_SERVER["REMOTE_ADDR"];

$sql2 = "INSERT INTO ip_store(ipadd) VALUES('$ip_address)";
mysqli_query($conn, $sql2);

	

mysqli_free_result($result);
mysqli_close($conn);

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
		
		<main style="position: relative; min-height: 700px; margin: 25px;">
			
				
			<img src="Wesleyfoster.jpg" alt="Error: Photo not found" width="500" style="float: left; padding-right: 12px;">
			
			<p style="color: #AAABB8;"><big>  Throughout my life I have enjoyed creating things. Initially I picked up art as a hobby in elementary school, but soon found creating code and programs was also enjoyable and aligned with my intrest with technology and computers. My earliest experience with code was when I took a coding class over the summer when I was 13 that involved making a mod for Minecraft with java over a week. Unfortunately now I don't have video or access to the code, but the experience set me off to start to learn to code. My current experience with code has been a machine learning class with python, and making various projects with python. If you are interested you can click on the "My Projects" tab to see more of my programs/code. I have also built a few computers from memory and have a basis of knowledge for what each part of a computer does.  </big></p>
			<br>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to do the 300M hurdles despite never running the 300M hurdles."-Josh Abercrombie </p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to dip his toe in the toilet to check the temperature before sitting down."-Aaron Evans* </p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to do a concert without playing any music."-Trevor Pribis</p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to send a fellow fellow to the cafeteria on a nonsensical mission."-Stephen K </p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to fight a bear bare-handed B-dum tish."- Gabe B* </p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to to spend all his time in a library, and come out with a website."- Ahmed Lazreq </p>
			<p style="color: #AAABB8;">"Wesley is the type of fellow to make a joke out of absolutly nothing."- Yazan Alnsour </p>
			<h6 style="color: #AAABB8; padding-left: 510px;">*these claims are not based in reality, Wesley would likely never do these things.</h6>
			<br />
			<br />
						

			
<div class="custom-shape-divider-bottom-1629984855" style="margin: -25px;">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
    </svg>
</div>
			

			
	</div>
</main>
</body>
	
		
		
		<footer>
			<sub class="below-curve"> 
			<h1 style="color: #AAABB8; text-decoration: underline; padding-left: 30px;"><b>Recent Activities</b></h1>
				
			
				
			<?php foreach($blogs as $blog){
				$echotitle = htmlspecialchars($blog['title']);
				$echodate = $blog['date'];
				$echotext = htmlspecialchars($blog['text'])
				 ?>
				
				<h1 style="color: #AAABB8; margin: 20px;"><?php echo $echotitle;?></h1>
				<h2 style="color: #AAABB8; margin 20px;"><?php echo $echodate;?></h2>
				<h3 style="color: #AAABB8; margin 20px;"><?php echo $echotext; ?></h3>
				<br />
				<hr>
				<br />
				<br />
				<br />
				<br />
			

			
		<?php } ?>
		<?php include('Footer.php'); ?>
			</sub>
		</footer>
	</body>
</html>
