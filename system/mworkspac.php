<?php include ("security.php");
include ("cl_base.php");
include("workspac.php");
//session_start();
/*echo session_status();
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
echo '::: '.session_status();
echo "<pres>";
print_r($_SESSION);
echo "</pres>";*/
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
				<div class="float-left"><h1>Message Center</h1></div>
				<div class="float-right"><h3>
				<?php
				$vnnus=$_SESSION['fe3'];
				echo 'User: '.decesar($vnnus,5);
				?></h3></div>
				<br><br>
				<button align="left" class="btn btn-lg btn-primary col-xs-12 col-sm-4 col-md-5 col-lg-5" onclick="docajaxmult('formsendsms.php',valid_smsv0,0,0)" id="bttnn">Send New Message</button><br>
				<div id="lleg1"></div>
				<div id="lleg3"></div>
				<br><br><input type="hidden" name="vussndr" id="vussndr" value=<?php echo $ussid=$_SESSION['fe2'];?>>
				<h1 class="h3 mb-3 font-weight-normal">Your Messages
				<button><img src="../resource/eye.png" onclick="gofirstpage()" width="40" height></button></h1><small id="pHelp" class="form-text text-muted">Press page number for Message List</small><BR>
				<?php
					$Obj = new BaseDatos();
					$sqe="SELECT * FROM tb_messr WHERE idreceiver='$ussid' AND status='E' ORDER BY datesent ASC";
					$rwe=$Obj->sentencia($sqe);
					$nfle=$Obj->numfilas($rwe);
					$npg=5; //numero de registros por pagina
					$npgs=ceil($nfle/$npg);
					//echo $ussid.' ::: '.$nfle.' ::: '.$npgs;
				?>
				<input type="hidden" name="vvppagre" id="vvppagre" value=<?php echo $npg; ?>>
				<input type="hidden" name="lastpg" id="lastpg" value=<?php echo $npgs; ?>>
				<div id="llegp1"></div>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	<li class="page-item">
				      <button class="page-link" id="firstpg" onclick="gofirstpage()">
				        <span>&brvbar;&laquo;</span>
				      </button>
				    </li>
				    <li class="page-item">
				      <button class="page-link" id="prev" onclick="backpage()">
				        <span>&laquo;</span>
				      </button>
				    </li>
				    <?php for($i=1;$i<=$npgs;$i++){  ?>
				    	<li class="page-item" id=<?php echo $i;?> onclick="<?php echo "docajaxmult('cl_paginas.php',funpagin,2,".$i.")";?>" >
				    	<button class="page-link" onclick="<?php echo "docajaxmult('cl_paginas.php',funpagin,2,".$i.")";?>"><?php echo $i;?></button></li>
				    <?php } ?>				    
				    <li class="page-item">
				      <button class="page-link" id="nextt" onclick="nextpage()">
				        <span >&raquo;</span>
				      </button>
				      <li class="page-item">
				      <button class="page-link" id="lasttpag" onclick="golastpage()">
				        <span >&raquo;&brvbar;</span>
				      </button>
				    </li>
				    </li>
				  </ul>
				</nav>
				<a href="../index.html"><button class="btn btn-primary" onclick="<?php session_destroy();?>"><img src="../resource/homicon.png" alt="Log Out" width="40" height="40">&nbspLOG OUT</button></a>
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