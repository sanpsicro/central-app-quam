<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
if(isset($_POST['id']) && $_POST['id']!=""){
isset($_POST['status']) ? $status = $_POST['status'] : $status = "" ;
$status=utf8_decode($status); 
isset($_POST['id']) ? $id = $_POST['id'] : $id = "" ;


#actualizar registro
$link =  mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET status='".$status."', ultimostatus=now() where id='".$id."'";
mysqli_query($link, $sSQL);
}
include('status_caso.php'); 

?>
