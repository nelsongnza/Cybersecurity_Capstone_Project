<?php session_start();
include("cl_base.php");
include("workspac.php");
$Obj=new BaseDatos();
$pvthis=strip_tags($_POST['thissms']);//Id del sms
//echo "llega: ".$pvthis.'<br> ';
$sqj="SELECT * FROM tb_messr WHERE id='$pvthis' AND status='E'";
$rwj=$Obj->sentencia($sqj);
$jfl=$Obj->filas($rwj);
$innsms=$jfl['mssag'];
$showsms=decesar($innsms,5);
echo 'Message: '.$showsms;
//$pviduss=$jfl['idsender'];
$pviduss=23;
$sqk="SELECT usser FROM tb_user WHERE id='$pviduss' AND status='E'";
$rwk=$Obj->sentencia($sqk);
$kfl=$Obj->filas($rwk);
$pvuss=$kfl['usser'];
$_SESSION['fe1']=session_id();
$_SESSION['fe2']=$pviduss;
$_SESSION['fe3']=$pvuss;
$_SESSION['fe4']="afe4";
?>