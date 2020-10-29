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
/**************************************************************************************************/
function valid_register(){
var cl=this.fm1.vpass.value;
var lo=this.fm1.vpass.value.length;
var cll=this.fm1.vnuss.value;
var lol=this.fm1.vnuss.value.length;
var er=0; var i=0;
var regexpr=/^[a-z0-9A-Z]{4,}/;
var regexps=/[^A-Za-z0-9]{1,}/;
var regexpcm=/(123456|123456789|qwerty|password|1111111|12345678|abc123|1234567|password1|12345|1234567890)/;
var regexpcm1=/(123123|000000|Iloveyou|1234|1q2w3e4r5t|Qwertyuiop|Monkey|Dragon|madremia|ostras)/;
//var regexpr=/^[a-z0-9A-ZñÑ]{4,}/; //con ñÑ
//var regexps=/[^A-Za-z0-9ñÑ]{1,}/; //con ñÑ
/*var lalala="Ñ";
var lalalaa="ñ";
for(i=0;i<lalala.length;i++){
	alert(lalala.charCodeAt(i));
	console.log(lalala[i]);
	console.log(lalala.charCodeAt(i));
}
alert(lalalaa.charCodeAt(0)+"::"+lalala.charCodeAt(0));*/
if(regexpcm.test(cl)){
	er=1;
	this.fm1.vpass.value="";
	this.fm1.vpass.focus();
	alert("Invalid Password [( "+cl+" )] is one Top 20 most common passwords according to NCSC ...\nPlease enter an easy to remember and secure passwords minimal 8 characters ...");
	return false;
}
if(regexpcm1.test(cl)){
	er=1;
	this.fm1.vpass.value="";
	this.fm1.vpass.focus();
	alert("Invalid Password [( "+cl+" )] is one Top 20 most common passwords according to NCSC ...\nPlease enter an easy to remember and secure passwords minimal 8 characters ...");
	return false;
}
if(isNaN(lol)||lol==0|| cll==null || cll.replace(/ /g, "") == "" || cll.replace(/ /g,"").length <4 ){
	er=1;
	this.fm1.vnuss.value="";
	this.fm1.vnuss.focus();
	alert("Invalid User, length minimal 4 characters ...");
	return false;
	}
if (!regexpr.test(cll) || regexps.test(cll)){
	er=1;
	this.fm1.vnuss.value="";
	this.fm1.vnuss.focus();
	alert("Invalid User, Please enter minimal 4 characters, just leters a-z/A-Z and 0-9 ...");
	return false;
}
if(lo<8 || isNaN(lo)||lo==0||cl.replace(/ /g,"").length<8){
	er=1;
	this.fm1.vpass.value="";
	this.fm1.vpass.focus();
	alert("Invalid Password Length, Please enter 8 character mimimal ...");
	return false;
	}
if(cl==null || cl.replace(/ /g,"") == "" || cl.replace(/ /g,"").length<8 ){
	er=1;
	this.fm1.vpass.value="";
	this.fm1.vpass.focus();
	alert("Invalid Password ...");
	return false;
	}
if(er==0){
	cl=hex_md5(cl);
	cll=cesar(cll,5);
	this.fm1.vpass.value=cl;
	this.fm1.vnuss.value=cll;
	this.fm1.submit();
	return true;
	}
}
function cesar(x,shifthe){
  var str = x.toString();
  var i,res="",cn;
  for (i=str.length;i>0;i--){
  	n = str.charCodeAt(i-1);
    cn = n + shifthe;
    if (n == 241 || n == 209){
    	cn=n;
    }else{
        if(n==32){cn = 35;}
    	if(cn>122){cn-=26;}
    	if((cn<97)&&(cn>90)){cn-=26;}
    	if((cn<65)&&(cn>57)){cn-=10;}
	}
    res += String.fromCharCode(cn);
  }
 return res;
}
/************************************************************************************/

function valid_entrada(){
var cl=this.fm2.vpss.value;
var lo=this.fm2.vpss.value.length;
var cll=this.fm2.vuss.value;
var lol=this.fm2.vuss.value.length;
var er=0; var i=0;
var regexpr=/^[a-z0-9A-Z]{4,}/;
var regexps=/[^A-Za-z0-9]{1,}/;
if(isNaN(lol)||lol==0|| cll==null || cll.replace(/ /g, "") == "" || cll.replace(/ /g,"").length <4 ){
	er=1;
	this.fm2.vuss.value="";
	this.fm2.vuss.focus();
	alert("Only Registered Users, length minimal 4 characters ...");
	return false;
	}
if (!regexpr.test(cll) || regexps.test(cll)){
	er=1;
	this.fm2.vuss.value="";
	this.fm2.vuss.focus();
	alert("Only Registered Users,, Please enter minimal 4 characters, just leters a-z/A-Z and 0-9 ...");
	return false;
}
if(lo<8 || isNaN(lo)||lo==0||cl.replace(/ /g,"").length<8){
	er=1;
	this.fm2.vpss.value="";
	this.fm2.vpss.focus();
	alert("Only Registered Users, Please enter 8 character mimimal ...");
	return false;
	}
if(cl==null || cl.replace(/ /g,"") == "" || cl.replace(/ /g,"").length<8 ){
	er=1;
	this.fm2.vpss.value="";
	this.fm2.vpss.focus();
	alert("Only Registered Users, Invalid Password ...");
	return false;
	}
if(er==0){
	cl=hex_md5(cl);
	cll=cesar(cll,5);	
	this.fm2.vpss.value=cl;;
	this.fm2.vuss.value=cll;
	this.fm2.submit();
	return true;
	}
}
/*******************************************************************************************************************/


/********************************************************************************************************************/
function docajaxmult(url,nfunc,tval,pgnd){
	var err=0;
	if (tval == 0){document.getElementById('bttnn').disabled=true;}
	if (tval==1){
		var destus=document.getElementById('destus').value;
		//var destus=this.fm4.destus.value;
		var txtsms=document.getElementById('textsms').value;
		//var txtsms=this.fm4.textsms.value;
		var vussndr=document.getElementById('vussndr').value;
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
		var ttxtsms=cesar(txtsms,5);
	}
	if (tval == 2){
		var vussndr=document.getElementById('vussndr').value;
		var ppagre=document.getElementById('vvppagre').value;
	}
	if (err==0){
		var ajaxf = nuevoAjax();
		ajaxf.onreadystatechange=function(){
			if (ajaxf.readyState == 1){

			}
			if (ajaxf.readyState == 4){
				//document.getElementById('lleg1').innerHTML=ajaxf.responseText;
				nfunc(this);
			}
		}
		ajaxf.open("POST",url,true);
		ajaxf.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//ajaxf.setRequestHeader("Content-type", "x-www-form-urlencoded");
		if (tval==3){
			var caad="thissms="+pgnd;
			//alert(caad);
			ajaxf.send(caad);
		}
		if(tval==2){
			var cadd="iduss="+vussndr+"&vnmpg="+pgnd+"&regppg="+ppagre;
			//alert(cadd);
			ajaxf.send(cadd);
		}
		if(tval==1){
			var cad="destus="+destuss+"&textsms="+ttxtsms+"&sndrus="+vussndr;
			//alert(cad);
			ajaxf.send(cad);
		}
		if(tval==0){
			ajaxf.send("vv=0");
		}
	}
}
/************************************************/
function valid_smsv1(ajaxb){
	alert(ajaxb.responseText);
	document.getElementById('lleg3').innerHTML=ajaxb.responseText;
	document.getElementById('bttnn').disabled=false;
	return false;
}
/*****************************************************************************************************************/
function valid_smsv0(ajaxd){
	document.getElementById('bttnn').disabled=true;
	document.getElementById('lleg1').innerHTML=ajaxd.responseText;
}

/*************************************************************************************************/
function funpagin(ajaxp){
	document.getElementById('llegp1').innerHTML=ajaxp.responseText;
	//alert(ajaxp.responseText);
	showactibtt();
}
/***************************************************************************************************/
function showactibtt(){
	var lii = document.getElementById('curpag').value;//current page
	var otli = document.getElementsByTagName('LI');
	var lstpg = document.getElementById('lastpg').value;//Last page
	for (var i=0; i < otli.length; i++){
		otli[i].classList.remove('active');
	}	
	document.getElementById(lii).classList.add('active');
	if (lii==lstpg){
		document.getElementById('nextt').disabled=true;
		document.getElementById('lasttpag').disabled=true;
	}else{
		document.getElementById('nextt').disabled=false;
		document.getElementById('lasttpag').disabled=false;
	}
	if (lii==1){
		document.getElementById('prev').disabled=true;
		document.getElementById('firstpg').disabled=true;
	}else{
		document.getElementById('prev').disabled=false;
		document.getElementById('firstpg').disabled=false;
	}
}
/***************************************************************************************************/
function nextpage(){
	//alert("Ha pulsado next");
	var lii= document.getElementById('curpag').value;//current page
	var lstpg = document.getElementById('lastpg').value;//Last page
	//alert(lii+" lst: "+lstpg);
	if (lii>=1 && lii<lstpg){
		var prxpgu=parseInt(lii); prxpgu+=1;
		//alert(lii+" lst: "+lstpg+" prx: "+prxpgu);
		docajaxmult('cl_paginas.php',funpagin,2,prxpgu);
	}else{
		return false;
	}
}
/***************************************************************************************************/
function backpage(){
	//alert("Ha pulsado prev");
	var lii = document.getElementById('curpag').value;//current page
	var lstpg = document.getElementById('lastpg').value;//Last page
	if (lii>1 && lii<=lstpg ){
		var prxpg=parseInt(lii);prxpg-=1;
		docajaxmult('cl_paginas.php',funpagin,2,prxpg);
	}else{
		return false;
	}
}
/***************************************************************************************************/
function gofirstpage(){
	docajaxmult('cl_paginas.php',funpagin,2,1);
}
/***************************************************************************************************/
function golastpage(){
	var lstpg = document.getElementById('lastpg').value;//Last page
	docajaxmult('cl_paginas.php',funpagin,2,lstpg);
}
/***************************************************************************************************/
function funsmsviewer(ajaxm){
	alert(ajaxm.responseText);
}

/***************************************************************************************************/