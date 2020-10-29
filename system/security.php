<?php session_start();
/*echo $_SESSION['fe1'].'<br>';
echo $_SESSION['fe2'].'<br>';
echo $_SESSION['fe3'].'<br>';
echo $_SESSION['fe4'].'<br>';*/
if($_SESSION['fe4']!="afe4"){
	?><script>alert("Session Expired Please Sig in ...");</script><?php
	header("Location:../index.html");
	exit();
}
?>