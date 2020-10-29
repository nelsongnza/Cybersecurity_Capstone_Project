<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Group 34 - Get In - Cybersecurity Capstone Project</title>
	<meta name="author" content="Grupo 34 - Cybersecurity Capstone Project">
	<link rel="shortcut icon" type="image/png" href="../resource/icon.ico">
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>Group 34 - Cybersecurity Capstone Project</h1>
			<h3>Messaging System Web-Based</h3>
		</div>
	</header>
	<div class="container">
		<div class="main row">
			<article class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
				<div>
					<p>
						You can download our data base here ...
					</p>
				
				<form action="../system/database-backup.php" method="POST" name="downform">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Download Data Base <img width="80" height="80" src="../resource/dwnbttn.png"> </button>
				</form>
				</div>
				<br><br><br>			


				<a href="../index.html"><button class="btn btn-primary" onclick="<?php session_destroy();?>"><img src="../resource/homicon.png" alt="Log Out" width="40" height="40">&nbspHOME</button></a>
			</article>
			<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<p>
				<h3>Cybersecurity Specialization</h3>
				The Cybersecurity Specialization covers the fundamental concepts underlying the construction of secure systems, from the hardware to the software to the human-computer interface, with the use of cryptography to secure interactions. These concepts are illustrated with examples drawn from modern practice, and augmented with hands-on exercises involving relevant tools and techniques. Successful participants will develop a way of thinking that is security-oriented, better understanding how to think about adversaries and how to build systems that defend against them...</p>
			</aside>
		</div>
		<div class="row">
			<h3>Coursera Specialty Program</h3>
			<p>A Coursera specialty program is a set of courses that help you master a skill. To get started, enroll in the specialized program directly or take a look at their courses and choose one you would like to start with. By subscribing to a course that is part of a specialized program, you will automatically be subscribed to the full specialized program. You can complete just one course - you can pause your learning or cancel your subscription at any time...</p>
		</div>
	</div>
	<footer>
		<div class="container">
			<h4>Grpo 34 - Cybersecurity Capstone Project</h4>
			<h5>@ October - 2020</h5>
		</div>
	</footer>
	<script type="text/javascript" src="../js/all_validate.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
</body>
</html>