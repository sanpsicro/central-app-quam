<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 
$unixid = time(); 
include('conf.php'); 

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT COUNT(*) FROM recordatorios where visto=0 and privacidad=0 and hora<now()", $link); 
list($total1) = mysqli_fetch_row($result);

echo $total1;


?>