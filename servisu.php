<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
if(isset($_POST[id]) && $_POST[id]!=""){
$ubicacion=utf8_decode($ubicacion); 
$ciudad=utf8_decode($ciudad); 
$observaciones=utf8_decode($observaciones); 
#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ubicacion_requiere='$ubicacion', ubicacion_estado='$estado', ubicacion_municipio='$municipio', ubicacion_colonia='$colonia', ubicacion_ciudad='$ciudad', observaciones='$observaciones' where id='$id'";
mysqli_query($database, "$sSQL");
}

include('servisuservisu.php'); 

?>
