<?php //session_start();
function decesar ($x,$shifthe){
  $str = (string) $x;
  $str = strrev($str);
  $stra = str_split($str);
  $rshf = $shifthe + 0;
  $res = "";
  for($i=0;$i<strlen($str);$i++){
    $n = ord($stra[$i]);
    $cn = $n - $rshf;
    if (($n==177)||($n==195)){
      $cn = $n;
    }else{
        if($n==35){$cn = 32;}
        if($cn<48){$cn+=10;}
        if(($cn<97)&&($cn>90)){$cn+=26;}
        if(($cn<65)&&($cn>57)){$cn+=26;}
    }
    $res .= chr($cn);
  }
  return $res;
}
?>