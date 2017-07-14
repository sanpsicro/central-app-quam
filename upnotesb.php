<?php
session_start();
$unixid = time(); 
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
isset($_GET['caso']) ? $caso = $_GET['caso'] : $caso = null;
isset($_GET['idnota']) ? $idnota = $_GET['idnota'] : $idnota = null;
isset($_GET['popup']) ? $popup = $_GET['popup'] : $popup = null;
isset($_POST['comentario']) ? $comentario = $_POST['comentario'] : $comentario = null;

$valid_userid = $_SESSION['valid_userid'];

include('conf.php'); 

$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ultimoseguimiento=now() where id='$id'";
mysqli_query($link, $sSQL);

if($caso == "editar"){
$link = mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
$sSQL="UPDATE bitacora SET fecha='$fecha_a-$fecha_m-$fecha_d', comentario='$comentario' where id='$idnota'";
mysqli_query($link,$sSQL);
if($popup=="0"){
	header("Location: mainframe.php?module=bitacora&id=$id"); exit();}
else{
	header("Location: bitacorab.php?id=$id"); exit();
}
}
if($caso == "nuevo"){
$link= mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
mysqli_query($link,"INSERT INTO `bitacora` (`general`, `usuario`, `fecha`, `comentario`) VALUES ('$id', '$valid_userid', now(), '$comentario')"); 
if($popup=="0"){
	if(!empty($from_seguimiento)){
		header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=1"); exit();}
	else{
		header("Location: mainframe.php?module=bitacora&id=$id"); exit();}
}
else{
	header("Location: bitacorab.php?id=$id"); exit();
}
}

if($caso == "borrar"){
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From bitacora Where id ='$idnota' and general='$id'";
mysqli_query($link,$sSQL);
if($popup=="0"){
	header("Location: mainframe.php?module=bitacora&id=$id"); exit();}
else{
	header("Location: bitacorab.php?id=$id"); exit();
}
}
?>