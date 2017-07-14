<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 

?>
<html>
<head>
<title>AMERICAN ASSIST :: PLATAFORMA-AA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style_1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>

body { 
background-color: #b81f19;
background-image: url("images/reloj.png");
background-repeat: no-repeat; 
background-position: left top;
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
</head>
<body>
<?php  

include('conf.php'); 

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM recordatorios where visto=0 and empleado=$valid_userid and privacidad=1 and hora<now() order by hora ASC LIMIT 1", $link); 
 if (mysqli_num_rows($result))
    {
$id=mysql_result($result,0,"id");		
$recordatorio=mysql_result($result,0,"recordatorio");
$general=mysql_result($result,0,"general");
$hora=mysql_result($result,0,"hora");

echo '
<div class="centerb"><h4 class="whiter">'.$recordatorio.'</h4>
<br />

<a href="memoria.php?id='.$id.'&actuar=snooze5" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-time"></span> 5+</a> 
<a href="memoria.php?id='.$id.'&actuar=snooze10" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-time"></span> 10+</a> 
<a href="memoria.php?id='.$id.'&actuar=snooze15" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-time"></span> 15+</a> 
';
if ($general>0) {
	echo '
<a href="memoria.php?actuar=expediente&general='.$general.'&id='.$id.'" class="btn btn-warning" role="button">EXPEDIENTE '.$general.'</a>
'; }
echo '
<a href="memoria.php?id='.$id.'&actuar=olvidar" class="btn btn-warning" role="button">&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;</a>


</div>
';

}

else { 
echo '<div class="centerb"><a href="javascript:;" onclick="parent.jQuery.fancybox.close();" class="btn btn-warning" role="button">EXPIRADO, CERRAR</a></div>';

 }

?>
<audio autoplay="autoplay">
<source src="ding.ogg" type="audio/ogg" />
  <source src="ding.mp3" type="audio/mp3" />
  <!--[if lt IE 9]>
  <bgsound src="ding.mp3" loop="1">
  <![endif]-->
</audio>
</body>
</html>