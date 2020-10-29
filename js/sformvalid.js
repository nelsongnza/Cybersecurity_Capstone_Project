function valid_ttsend(){
	var destus=this.fm4.destus.value;
	var txtsms=this.fm4.textsms.value;
	var vussndr=document.getElementById('vussndr').value;
	var err=0;
	var regexpr=/^[a-z0-9A-Z]{4,}/;
	var regexps=/[^A-Za-z0-9]{1,}/;
	var regexpt=/.{4,}/m;
	if (!regexpr.test(destus) || regexps.test(destus)){
		err=1;
		this.fm4.destus.value="";
		this.fm4.destus.focus();
		alert("Invalid User, Please enter minimal 4 characters, just leters a-z/A-Z and 0-9 ...");
		return false;
	}
	if(!regexpt.test(txtsms)){
		err=1;
		this.fm4.textsms.value="";
		this.fm4.textsms.focus();
		alert("Invalid Text, Please enter minimal 4 characters ...");
		return false;
	}
	var destuss=cesar(destus,5);
	//alert("destus="+destuss+" er= "+err+" Text: "+txtsms);
	if(err==0){
		
		//alert("destus="+destuss+" er= "+err+" Text: "+txtsms);
		var ajaxi=nuevoAjax();
		ajaxi.onreadystatechange=function(){
			if (ajaxi.readyState == 1){

			}
			if (ajaxi.readyState == 4 && ajaxi.status == 200 ){
			//document.getElementById('lleg3').innerHTML=ajaxi.responseText;
			alert(ajaxi.responseText);
			//valid_ftextssend(this);
			}
		}
		var cad="destus="+destuss+"&textsms="+txtsms+"&sndrus="+vussndr;
		ajaxi.open("POST","cl_validuser.php",true);
		ajaxi.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//ajaxi.setRequestHeader("Content-type", "x-www-form-urlencoded");
		ajaxi.send(cad);
		//alert(cad);
	}
}
/*****************************************************************************************************************/
function valid_ftextssend(ajaxv){
//	alert(ajaxv.responseText);
	document.getElementById('bttnn').disabled=false;
	document.getElementById('bttnn').focus();
	location.reload();
	return false;
}
/*****************************************************************************************************************/
function cesar(x,shifthe){
  var str = x.toString();
  var i,res="",cn;
  for (i=str.length;i>0;i--){
  	n = str.charCodeAt(i-1);
    cn = n + shifthe;
    if (n == 241 || n == 209){
    	cn=n;
    }else{
    	if(cn>122){cn-=26;}
    	if((cn<97)&&(cn>90)){cn-=26;}
    	if((cn<65)&&(cn>57)){cn-=10;}
	}
    res += String.fromCharCode(cn);
  }
 return res;
}
/****************************************************************************************************************/
function nuevoAjax()
{
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}
/****************************************************************************************************************/
