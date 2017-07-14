<?php  
session_start();
$unixid = time(); 
include('conf.php'); 

mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ultimoseguimiento=now() where id='$id'";
mysqli_query($database, "$sSQL");

if($caso == "nuevo"){
mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
mysqli_query($database,"INSERT INTO `clientacora` (`general`, `usuario`, `fecha`, `comentario`, `tipo`, `visto`, `num_poliza`) VALUES ('$id', '$valid_userid', now(), '$comentario', '1', '0', '$num_poliza')"); 
header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=2");
}

?>