<?php  
session_start();
$unixid = time(); 
include('conf.php'); 

mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ultimoseguimiento=now() where id='$id'";
mysqli_query($database, "$sSQL");



if($caso == "editar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE bitacora SET fecha=now(), comentario='$comentario' where id='$idnota'";
mysqli_query($database, "$sSQL");
header("Location: mainframe.php?module=bitacora&id=$id");
}
if($caso == "nuevo"){
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `bitacora` (`general`, `usuario`, `fecha`, `comentario`) VALUES ('$id', '$valid_userid', now(), '$comentario')"); 
header("Location: mainframe.php?module=bitacora&id=$id");
}

if($caso == "borrar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From bitacora Where id ='$idnota' and general='$id'";
mysqli_query("$database",$sSQL);
header("Location: mainframe.php?module=bitacora&id=$id");
}
?>