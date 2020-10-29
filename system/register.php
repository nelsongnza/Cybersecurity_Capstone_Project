<?php
include("cl_base.php");
$Obj = new BaseDatos();
$ccn=$Obj->conectar();
if(isset($ccn)){
//echo 'success'.'<br>';
$pvnuss=strip_tags($_POST['vnuss']);
$pvpass=strip_tags($_POST['vpass']);
//echo 'user: '.descesar($pvnuss,5).'<br>';
//echo 'vnuss: '.$pvnuss.' vpass: '.$pvpass."<br>";
$sqb="SELECT id FROM tb_user WHERE usser='$pvnuss'";
$rwb=$Obj->sentencia($sqb);
if($bfl=$Obj->filas($rwb)){
//echo 'el tipo ya exite en la bd <br> con el id: '.$bfl['id'].'<br>';
  echo'<div style="text-aling:center; font-size:200%;background-color:#ffff80;color: Black; border-radius: 5px;">User already exist, please register other one ...</div>';
  echo '<META HTTP-EQUIV="Refresh"CONTENT="3; URL=register.html">';//yellow
}else{
  $datim=date("Y-m-d H:i:s");
  $sqa="INSERT INTO tb_user(usser,lapassw,status,regdate)
  VALUES('$pvnuss','$pvpass','E','$datim')";
  $rwa=$Obj->sentencia($sqa);
//echo 'SQL: '.$rwa;
  if(isset($rwa)){
    //echo 'User have been added successfully ...';
    echo'<div style="text-aling:center; font-size:200%;background-color:#71c171;color: Black; border-radius: 5px;">User have been added successfully, Please ...<a href="entrada.html"><button style="text-aling:center; font-size:100%;background-color:#71c171;color: Black; border-radius: 3px;">&nbsp&nbsp&nbspSign in&nbsp&nbsp&nbsp</button></a></div>';
    echo '<META HTTP-EQUIV="Refresh"CONTENT="10; URL=../index.html">';//green
  }
}
}else{
  //echo 'Error, Data Base conexion is unavailable...';
    echo'<div style="text-aling:center; font-size:200%;background-color:#ff3333;color: Black; border-radius: 5px;">Error, Data Base conexion is unavailable, please try again later ...</div>';
    echo '<META HTTP-EQUIV="Refresh"CONTENT="3; URL=../index.html">';//red
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