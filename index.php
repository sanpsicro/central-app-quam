<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>:: ACCESO A USUARIOS ::</title>


<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="login_style.css" rel="stylesheet" type="text/css">

<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>

<body>



<div id="wrapper">

	<!--SLIDE-IN ICONS-->

    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="kerberos.php?do=login" method="post">

	<!--HEADER-->
    <div class="header">
<div align="center">
    <!--TITLE--><h1>ACCESO</h1><!--END TITLE-->

    </div>
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
    USUARIO<br>
	<!--USERNAME--><input name="user" type="text" class="input username" onFocus="this.value=''" />
    <br><br>
	<!--END USERNAME-->
    CONTRASE&Ntilde;A
    <!--PASSWORD--><input name="password" type="password" class="input password"  onFocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer"><div align="center">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="ENTRAR" class="button" />
    <!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--END REGISTER BUTTON-->
    </div></div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM--><br>
<div align="center">
      <img src="logohdwhite.png" /><br>
          
<?php 

if(isset($errorcode) && $errorcode=="1"){echo'<p><b><font size=2>Usuario incorrecto</font></b>';} 

if(isset($errorcode) && $errorcode=="2"){echo'<p><b><font size=2>Contrase& ntilde;a incorrecta</font></b>';} 

if(isset($errorcode) && $errorcode=="3"){echo'<p><b><font size=2>Acceso Denegado</font></b>';} 

if(isset($errorcode) && $errorcode=="4"){echo'<p><b><font size=2>Usuario no activo</font></b>';} 

if(isset($logout) && $logout=="yes"){echo'<p><b><font size=2>Sesi& oacute;on Finalizada</font></b>';} 


?>		  

</div>
</div>
<!--END WRAPPER-->


</body>

</html>
