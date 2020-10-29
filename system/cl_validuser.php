<?php session_start();
include("cl_base.php");
$pvusdst=strip_tags($_POST['destus']);
$pvtxt=strip_tags($_POST['textsms']);
$pvusnd=strip_tags($_POST['sndrus']);
//echo $pvusdst.'<br>';
//echo $pvtxt.'<br>';
//echo $pvusnd.'<br>';
$Obj = new BaseDatos();
$cnn = $Obj->conectar();
if(isset($cnn)){
	$sqa = "SELECT id FROM tb_user WHERE usser='$pvusdst' AND status='E'";
	$rwa = $Obj->sentencia($sqa);
	if($afl=$Obj->filas($rwa)){
		//user exist --> valid user
		$datim=date("Y-m-d H:i:s");
		$idrecei=$afl['id'];
		$sqb="INSERT INTO tb_messr (idsender,idreceiver,mssag,datesent,status) VALUES ('$pvusnd','$idrecei','$pvtxt','$datim','E')";
		$rwb=$Obj->sentencia($sqb);
		//$bfl=$Obj->afectadas();
		if ($rwb){
			echo $rwb.' Message(s) Sent Successfully ...';
		}
		$sqc="SELECT usser FROM tb_user WHERE id='$pvusnd' AND status='E'";
		$rwc=$Obj->sentencia($sqc);
		$cfl=$Obj->filas($rwc);
		$pvuss=$cfl['usser'];
		//echo ' From User :::: '.$pvuss;
		$_SESSION['fe1']=session_id();
	    $_SESSION['fe2']=$pvusnd;
	    $_SESSION['fe3']=$pvuss;
	    $_SESSION['fe4']="afe4";
	}else{
		//Not valid user --> invalid user
		echo 'Target not valid user xxx';
		$sqd="SELECT usser FROM tb_user WHERE id='$pvusnd' AND status='E'";
		$rwd=$Obj->sentencia($sqd);
		$dfl=$Obj->filas($rwd);
		$pvuss=$dfl['usser'];
		$_SESSION['fe1']=session_id();
	    $_SESSION['fe2']=$pvusnd;
	    $_SESSION['fe3']=$pvuss;
	    $_SESSION['fe4']="afe4";
	}
}else{
	//Data base fail conection
	echo 'data base fail connection, please try again later ...';
}
?>