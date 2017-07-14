<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 
$unixid = time(); 
include('conf.php'); 

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT COUNT(*) FROM clientacora where visto=0 and tipo=2", $link); 
list($total1) = mysqli_fetch_row($result);

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result2 = mysqli_query("SELECT COUNT(*) FROM chatstat where atendido=0 and status=2", $link); 
list($total2) = mysqli_fetch_row($result2);

$grantotal=$total1+$total2;

echo $grantotal;

?>