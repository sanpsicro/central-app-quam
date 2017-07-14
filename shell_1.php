<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>AMERICAN ASSIST :: PLATAFORMA-AA</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" src="https://normalize-css.googlecode.com/svn/trunk/normalize.css" >
<link href="style_1.css" rel="stylesheet" type="text/css" >
<meta name="viewport" content="width=device-width, initial-scale=1">


<script type="text/javascript">

$( document ).ready(function Load2()
{
      $('#external_page_content_displayer').load('alerts.php').hide().fadeIn(0);
});

function Load_external_content()
{
      $('#external_page_content_displayer').load('alerts.php').hide().fadeIn(0);
}
setInterval('Load_external_content()', 5000);
</script>


<script type="text/javascript" src="fancy/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancy/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox({
				
				
	'width'  : 710,           // set the width
    'height' : 140,           // set the height
	'autoSize' : false,
	padding : 0,
    'type'   : 'iframe',      // tell the script to create an iframe
	'modal' : true,
	afterClose		: function() {
		doit();
	}			
				
				});

		});
	</script>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox-priv').fancybox({
				
				
	'width'  : 710,           // set the width
    'height' : 140,           // set the height
	'autoSize' : false,
	padding : 0,
    'type'   : 'iframe',      // tell the script to create an iframe
	'modal' : true,
	afterClose		: function() {
		doit();
	}			
				
				});

		});
	</script>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox-qter').fancybox({
				
				
	'width'  : 730,           // set the width
    'height' : 400,           // set the height
	'autoSize' : false,
    'type'   : 'iframe',      // tell the script to create an iframe
	'modal' : true,
	padding : 0,
	afterClose: function() {
		doit2();
	}			
				
				});

		});
	</script>
    
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox-new').fancybox({
				
				
	'width'  : 710,           // set the width
    'height' : 620,           // set the height
	'autoSize' : false,
	padding : 0,
    'type'   : 'iframe',      // tell the script to create an iframe
	 modal : false,
				
				});

		});
	</script>
<script src="alljs.js.php" type="text/javascript"></script> 
	

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
<script>
function doit() {
var qt;
function checkForQt() {
    $.get("recordando.php", function(data) {
        if(data > 0) {
            
			
			$('#ider').find('span').trigger('click');
			clearInterval(qt); 
			
			
        }
    });
}
qt = setInterval(checkForQt, 15000);
}
doit();
</script>
<script>
function doit3() {
var qt3;
function checkForQt3() {
    $.get("recordandoprivado.php", function(data) {
        if(data > 0) {
            
			
			$('#idea').find('span').trigger('click');
			clearInterval(qt3); 
			
			
        }
    });
}
qt3 = setInterval(checkForQt3, 15000);
}
doit3();
</script>
<script>
function faster() {
    $.get("qteando.php", function(data) {
        if(data > 1) {
            
			
			$('#qter').find('span').trigger('click');

   
			
        }
    });
}

</script>
<script>
function doit2() {
var qt2;
function checkForQt2() {
    $.get("qteando.php", function(data) {
        if(data > 1) {
            
			
			$('#qter').find('span').trigger('click');
			clearInterval(qt2); 
			
   
			
        }
    });
}
qt2 = setInterval(checkForQt2, 18000);
}
doit2();
</script>

</head>
<body><br><br><br><br>
<a href="muestrarecordatorio.php" class="fancybox fancybox.iframe bklink ovrr" id="ider"><span></span></a>
<a href="muestraprivado.php" class="fancybox-priv fancybox.iframe bklink ovrr" id="idea"><span></span></a>
<a href="muestraqt.php" class="fancybox-qter fancybox.iframe bklink" id="qter"><span></span></a>



<?php 
                  $explota_permisos=explode(",",$_SESSION["valid_permisos"]);
		error_reporting(0);

?>
<iframe width="0" height="0" src="ding.php" marginheight="0" marginwidth="0" frameborder="0" scrolling="no"></iframe>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
  	<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?module=main">
        <img alt="Brand" src="logohdmini.png">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
    <?php 
include('menu2.php');
	  ?>
      <li>
      <?php 
                $checa_array1=array_search("cabina",$explota_modulos);

if($checa_array1===FALSE){} else{ ?>
					<div id="alertas" class="mobilehide">
	<div id="external_page_content_displayer"></div> </div><?php   } ?>
      </li>
      	</ul>
        
        <ul class="nav navbar-nav navbar-right">
        <li>
      
      <span class="fonter lineh hideextra"> 
            <script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script>
            				  <?php 
$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
echo $dias[date('w')];
echo" ";
print date("j"); 
$m = date("m") -1; 
$ma= array("Enero","Febrero","Marzo","Abril", 
"Mayo","Junio","Julio","Agosto","Septiembre", 
"Octubre","Noviembre","Diciembre") ; 
$ml = " de $ma[$m] de "; 
echo "$ml"; 
print date("Y"); 
?></span> <span id="reloj" class="fonter lineh hideextra"></span><span class="separador hideextra"></span><span class="separador hideextra"></span><span class="separador hideextra"></span></li>
        <li>
        <a href="kerberos.php?claes=logout" class="navbar-link menunw"><span class="profileshow"><span class="glyphicon glyphicon-user whiter"></span> &nbsp;&nbsp;&nbsp;<?php  echo $valid_nombre;?></span> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-off whiter"></span></a></li>
        </ul>
    </div>
    
  </div>
</nav>

           
           
           
 <div class="top">
<style>





td { padding: 5px;

 }
 
 table { 
    border-spacing: 2px;
    border-collapse: separate;
}
.btn-warning{color:#0b80b7;background-color:#FFF;border-color:#fff}
.btn-warning.focus,.btn-warning:focus{color:#fff;background-color:#ec971f;border-color:#985f0d}
.btn-warning:hover{color:#fff;background-color:#0b80b7;border-color:#0b80b7}
.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{color:#fff;background-color:#ec971f;border-color:#d58512}
.btn-warning.active.focus,.btn-warning.active:focus,.btn-warning.active:hover,.btn-warning:active.focus,.btn-warning:active:focus,.btn-warning:active:hover,.open>.dropdown-toggle.btn-warning.focus,.open>.dropdown-toggle.btn-warning:focus,.open>.dropdown-toggle.btn-warning:hover{color:#fff;background-color:#d58512;border-color:#985f0d}
.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{background-image:none}
.btn-warning.disabled,.btn-warning.disabled.active,.btn-warning.disabled.focus,.btn-warning.disabled:active,.btn-warning.disabled:focus,.btn-warning.disabled:hover,.btn-warning[disabled],.btn-warning[disabled].active,.btn-warning[disabled].focus,.btn-warning[disabled]:active,.btn-warning[disabled]:focus,.btn-warning[disabled]:hover,fieldset[disabled] .btn-warning,fieldset[disabled] .btn-warning.active,fieldset[disabled] .btn-warning.focus,fieldset[disabled] .btn-warning:active,fieldset[disabled] .btn-warning:focus,fieldset[disabled] .btn-warning:hover
{color:#0b80b7;background-color:#FFF;border-color:#fff}
.btn-warning .badge{color:#0b80b7;background-color:#FFF;border-color:#fff}


</style>


<!-- Modal -->  


          
          
            <!-- comienza contenido -->
<?php 
if(empty($show)){$show=50;}
?>
