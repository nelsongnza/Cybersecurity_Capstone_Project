<?php session_start();
echo '<meta charset="UTF-8">';
include("cl_base.php");
include("workspac.php");
$Obj = new BaseDatos();
$ccn=$Obj->conectar();
if(isset($ccn)){
//echo 'success'.'<br>';
$pvuss=strip_tags($_POST['vuss']);
$pvpss=strip_tags($_POST['vpss']);
//echo 'vnuss: '.$pvuss.'<br> vpass: '.$pvpss."<br>";
$usser=decesar($pvuss,5);
//echo 'user: '.$usser.'<br>';
$sqb="SELECT * FROM tb_user WHERE usser='$pvuss'";
$rwb=$Obj->sentencia($sqb);
if($bfl=$Obj->filas($rwb)){
  if($bfl['lapassw']==$pvpss){
    $datim=date("Y-m-d H:i:s");
    $iduser=$bfl['id'];
  $sqa="INSERT INTO tb_reclog (iduser,datelog,action,status) VALUES ('$iduser','$datim','I','E')";
  $rwa=$Obj->sentencia($sqa);
    $_SESSION['fe1']=session_id();
    $_SESSION['fe2']=$iduser;
    $_SESSION['fe3']=$pvuss;
    $_SESSION['fe4']="afe4";
    /*echo $_SESSION['fe1'].'<br>';
    echo $_SESSION['fe2'].'<br>';
    echo $_SESSION['fe3'].'<br>';
    echo $_SESSION['fe4'].'<br>';*/
    echo'<div style="text-aling:center; font-size:200%;background-color:#71c171;color: Black; border-radius: 5px;">Welcome '.$usser.' ...</div>';
    ?><script>//alert("Valid User ...")</script><?php
    echo '<META HTTP-EQUIV="Refresh"CONTENT="1; URL=mworkspac.php">';//green
  }else{    
    echo'<div style="text-aling:center; font-size:200%;background-color:#ffff80;color: Black; border-radius: 5px;">Error user/password is wrong, Please Sign in ...</div>';    
    session_destroy();
    ?><script>//alert("Error user/password is wrong, Please Sign in ...")</script><?php
    echo '<META HTTP-EQUIV="Refresh"CONTENT="1; URL=entrada.html">';//yellow
  }
}else{    
    echo'<div style="text-aling:center; font-size:200%;background-color:#ff3333;color: Black; border-radius: 5px;">Error This user is wrong, Please Sign in ...</div>';    
    session_destroy();    
    ?><script>//alert("Error This user is wrong, Please Sign in ...")</script><?php
    echo '<META HTTP-EQUIV="Refresh"CONTENT="1; URL=entrada.html">';//red
  }
}else{
    //echo 'Error, Data Base conexion is unavailable...';    
    session_destroy();  
    echo'<div style="text-aling:center; font-size:200%;background-color:#ff3333;color: Black; border-radius: 5px;">Error, Data Base conexion is unavailable, please try again later ...</div>';
    ?><script>alert("Error, Data Base conexion is unavailable, please try again later ...")</script><?php
    echo '<META HTTP-EQUIV="Refresh"CONTENT="1; URL=../index.html">';//red
}
/*function cesar(x,shifthe) {
  var str = x.toString();
  var i,res="",cn;
  for (i=str.length;i>0;i--){
    n = str.charCodeAt(i-1);
    cn = n + shifthe;
    if(cn>122){cn-=26;}
    if((cn<97)&&(cn>90)){cn-=26;}
    if((cn<65)&&(cn>57)){cn-=10;}
    res += String.fromCharCode(cn);
  }
 return res;
}*/
?>