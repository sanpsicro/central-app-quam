<?php  
include("conf.php");
session_start();

isset($_GET['cobro']) ? $cobro = $_GET['cobro']: $cobro = "" ;
isset($_GET['expediente']) ? $expediente = $_GET['expediente']: $expediente = "" ;
isset($_POST['comentario']) ? $comentario = $_POST['comentario']: $comentario = "" ;
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database); 

$query="INSERT INTO notas_cobranza (id,expediente,usuario,fecha,comentario) 
					VALUES ('','$expediente','".$_SESSION['valid_userid']."',NOW(),'$comentario')";
mysqli_query($link,$query) or die(mysqli_error($link));

header("Location: mainframe.php?module=control_cobro&cobro=$cobro");
?>