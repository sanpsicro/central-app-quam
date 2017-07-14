<?php  
include("conf.php");

mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database);

$id=$_POST['id'];
$tabla=$_POST['obj'];
$status=$_POST['status'];

$query="UPDATE $tabla SET status='$status', fecha='$anop-$mesp-$diap 00:00:00', monto='$monto' WHERE id='$id' LIMIT 1";
mysqli_query($query)or die(mysql_error());

header("Location: mainframe.php?module=control_$tabla&code=2");
?>