<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Opcyon</title>
<link href="style_1.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="calendar1.js"></script>
<script src="confirm_del.js" type="text/javascript"></script> 
<script src="confirm_update.js" type="text/javascript"></script> 
<script type="text/javascript" language="JavaScript">
	<!-- 
function jump(fe){
var opt_key = fe.selectedIndex;
var uri_val = fe.options[opt_key].value;
window.open(uri_val,'_top');
return true;
	}
	//-->
	
 </script>
 
 
 
 
 
 
 <script type="text/javascript">


var enablepersist="on" //Enable saving state of content structure using session cookies? (on/off)
var collapseprevious="no" //Collapse previously open content when opening present? (yes/no)

if (document.getElementById){
document.write('<style type="text/css">')
document.write('.switchcontent{display:none;}')
document.write('</style>')
}

function getElementbyClass(classname){
ccollect=new Array()
var inc=0
var alltags=document.all? document.all : document.getElementsByTagName("*")
for (i=0; i<alltags.length; i++){
if (alltags[i].className==classname)
ccollect[inc++]=alltags[i]
}
}

function contractcontent(omit){
var inc=0
while (ccollect[inc]){
if (ccollect[inc].id!=omit)
ccollect[inc].style.display="none"
inc++
}
}

function expandcontent(cid){
if (typeof ccollect!="undefined"){
if (collapseprevious=="yes")
contractcontent(cid)
document.getElementById(cid).style.display=(document.getElementById(cid).style.display!="block")? "block" : "none"
}
}

function revivecontent(){
contractcontent("omitnothing")
selectedItem=getselectedItem()
selectedComponents=selectedItem.split("|")
for (i=0; i<selectedComponents.length-1; i++)
document.getElementById(selectedComponents[i]).style.display="block"
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function getselectedItem(){
if (get_cookie(window.location.pathname) != ""){
selectedItem=get_cookie(window.location.pathname)
return selectedItem
}
else
return ""
}

function saveswitchstate(){
var inc=0, selectedItem=""
while (ccollect[inc]){
if (ccollect[inc].style.display=="block")
selectedItem+=ccollect[inc].id+"|"
inc++
}

document.cookie=window.location.pathname+"="+selectedItem
}

function do_onload(){
uniqueidn=window.location.pathname+"firsttimeload"
getElementbyClass("switchcontent")
if (enablepersist=="on" && typeof ccollect!="undefined"){
document.cookie=(get_cookie(uniqueidn)=="")? uniqueidn+"=1" : uniqueidn+"=0" 
firsttimeload=(get_cookie(uniqueidn)==1)? 1 : 0 //check if this is 1st page load
if (!firsttimeload)
revivecontent()
}
}


if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload

if (enablepersist=="on" && document.getElementById)
window.onunload=saveswitchstate

</script>
 
 
 
 
 
</head>

<body>

<!-- ----------- -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="img/newlog.gif" width="222" height="68"></td>
          <td height="74" align="right"><img src="img/back2.jpg" width="435" height="68" border="0" usemap="#Map"></td>
        </tr>
        <tr>
          <td height="2" colspan="2" bgcolor="#083578"><img src="img/dot.gif" width="1" height="1"></td>
        </tr>
		<!-- 
        <tr> <td width=284><p><img src="img/log.png" width="320" height="74" /></p></td>
          <td height="74" background="img/mainbar2.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>&nbsp; </td>
                <td align="right" width=1 bgcolor=#FFFFFF><img src="img/spacer2.gif" width="1" height="1"></td>
                <td width="260"><span class="bienvenidayfecha">Bienvenido <?php  echo"$valid_user"; ?> 
                  [<a href="kerberos.php?claes=logout"><font color=white>Log Out</font></a>]</span> <br> <span class="bienvenidayfecha"><?php
		error_reporting(0);

				  /*
$dias = array("Domingo","Lunes","Martes","Mi�rcoles","Jueves","Viernes","S�bado");
echo "<b>".$dias[date('w')];
echo" ";
print date("j"); 
$m = date("m") -1; 
$ma= array("Enero","Febrero","Marzo","Abril", 
"Mayo","Junio","Julio","Agosto","Septiembre", 
"Octubre","Noviembre","Diciembre") ; 
$ml = " de $ma[$m] de "; 
echo "$ml"; 
print date("Y"); 
echo "</b>"; 
*/
echo date('l, F j, Y');
?></span></td>
              </tr>
            </table></td></tr> --></table>
<!-- --------- -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="1" valign="top" bgcolor="#ffffff"> 
	<?php  
include('menu.php');
	  ?>
    </td>
    <td width="2" bgcolor="#083578" valign=top>&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td bgcolor="#EBE9EE" height=100%>
		  <?php  
		  #if($module=="compose" OR $module=="webmail" OR $module=="readmail" OR $module=="schedule" OR $module=="admin_schedule" OR $module=="admin_files"){
$db = mysql_connect($usr_host,$usr_username,$usr_pass);
mysql_select_db($usr_database,$db);
$result = mysql_query("SELECT * from administradores where usuario = '$valid_user'",$db);
$remitente_name=mysql_result($result,0,"nombre");
$remitente_user=mysql_result($result,0,"usuario");
$remitente_password=mysql_result($result,0,"password");
$remitente_mail=mysql_result($result,0,"mail");
$user_id=mysql_result($result,0,"id");
#}
?>

            <!-- comienza contenido -->
<map name="Map"><area shape="rect" coords="313,13,423,56" href="kerberos.php?claes=logout">
</map>