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
background-color: #343434;
background-repeat: no-repeat; 
background-position: left top;
 }
 .vr {
  margin-left: 0px;
  margin-right: 0px;
  height: 180px;
  border: 0;
  border-left: 1px solid #0b80b7;
  vertical-align: bottom;
}
</style>
</head>
<body>
<?php  

include('conf.php'); 

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM quicktips where activo=1 order by visto ASC LIMIT 1", $link); 
 if (mysqli_num_rows($result))
    {
$id=mysql_result($result,0,"id");		
$titulo=mysql_result($result,0,"titulo");
$mensaje=mysql_result($result,0,"mensaje");
$icono=mysql_result($result,0,"icono");

echo '




<div class="centerb"><h2 class="whiter lineh wider">'.$titulo.'</h2></div>
<div class="row">
<div class="col-xs-1"></div>
<div class="col-xs-6">
<p class="qt">'.$mensaje.'</p>
</div>
<div class="col-xs-2 vr"><img src="icon/qt/'.$icono.'"></div>
<div class="col-xs-1"></div>

</div>
<div class="col-sm-12">
<div class="text-right"><br>
<a href="memoria.php?userid='.$valid_userid.'&id='.$id.'&actuar=qtiper" class="wtlink">MENSAJE LE�DO Y ENTENDIDO <span class="glyphicon glyphicon-remove"></span></a>
</div>
</div>

</div>
';

}

else { 
echo '<div class="text-right"><a href="javascript:;" onclick="parent.jQuery.fancybox.close();" class="btn btn-warning" role="button">CERRAR</a></div>';

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