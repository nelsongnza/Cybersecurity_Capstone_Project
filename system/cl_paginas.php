<?php session_start();
include("cl_base.php");
include("workspac.php");
$pviduss=strip_tags($_POST['iduss']);//Id del usuario
$pvnmpg=strip_tags($_POST['vnmpg']);//Numero de pagina
$pvrepg=strip_tags($_POST['regppg']);//Registros por pagina
$f=($pvnmpg-1)*$pvrepg;
$t=$pvrepg;
//echo $pviduss.' pag: '.$pvnmpg.' regpp: '.$pvrepg.' f: '.$f.' t: '.$t;
$Obj=new BaseDatos();
$sqg="SELECT * FROM tb_messr WHERE idreceiver='$pviduss' AND status='E' ORDER BY datesent DESC LIMIT $f,$t";
//$sqg="SELECT * FROM tb_messr";
$rwg=$Obj->sentencia($sqg);
$i=$f+1;
echo '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">From</th>
      <th scope="col">Date</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>';
while($gfl=$Obj->filas($rwg)){
	$idff=$gfl['idsender'];
	$idthid=$gfl['id'];
	$sqh="SELECT usser FROM tb_user WHERE id='$idff' AND status='E'";
	$rwh=$Obj->sentencia($sqh);
	$hfl=$Obj->filas($rwh);
	$nusn=$hfl['usser'];
	$nufl=decesar($nusn,5);
	$datt=$gfl['datesent'];
	echo '<tr>
      		<th scope="row">'.$i.'</th>
	      	<td>'.$nufl.'</td>
	      	<td>'.$datt.'</td>
	      	<td>';?>
	      	<button onclick="docajaxmult('cl_smsviewer.php',funsmsviewer,3,<?php echo
	      	$idthid.')';?>">O</button></td>
	    </tr><?php
	$i++;
}
echo '</tbody></table>';
echo '<input type="hidden" name="curpag" id="curpag" value="'.$pvnmpg.'">';
$sqk="SELECT usser FROM tb_user WHERE id='$pviduss' AND status='E'";
$rwk=$Obj->sentencia($sqk);
$kfl=$Obj->filas($rwk);
$pvuss=$kfl['usser'];
$_SESSION['fe1']=session_id();
$_SESSION['fe2']=$pviduss;
$_SESSION['fe3']=$pvuss;
$_SESSION['fe4']="afe4";
?>
