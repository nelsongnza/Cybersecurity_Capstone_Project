<?php
/*echo session_status();
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
echo '::: '.session_status();
echo "<pres>";
print_r($_SESSION);
echo "</pres>";*/
$vv=strip_tags($_POST['vv']);
?>
	<form action="" id="fm4">
	<div class="form-group">
	<label for="destus">To</label>
	<input type="text"  autocomplete="username" name="destus" id="destus" placeholder="valid user registered" class="form-control" required="" autofocus="" aria-describedby="userHelp">
	<small id="userHelp" class="form-text text-muted">Please enter a single valid user, just previously registered users ...</small>
	<div id="lleg2"></div>
    <label for="textsms">Message</label>
    <textarea class="form-control" id="textsms" name="textsms" rows="3" required=""></textarea><br><br>    
	<button class="btn btn-lg btn-primary btn-block col-xs-12 col-sm-4 col-md-5 col-lg-5" onclick="docajaxmult('cl_validuser.php',valid_smsv1,1,0)" id="bttnn" >SEND</button>
 	</div>
 	</form>