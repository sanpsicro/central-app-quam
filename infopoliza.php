<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
if(isset($_POST[id]) && $_POST[id]!=""){
$aseguradora=utf8_decode($aseguradora); 
$ajustador=utf8_decode($ajustador); 
$telid=utf8_decode($telid); 
$aseg_poliza=utf8_decode($aseg_poliza); 
$aseg_inciso=utf8_decode($aseg_inciso); 
$aseg_vigencia_inicio=utf8_decode($aseg_vigencia_inicio); 
$aseg_vigencia_termino=utf8_decode($aseg_vigencia_termino); 
$aseg_monto=utf8_decode($aseg_monto); 
$asegurado=utf8_decode($asegurado); 
$aseg_y_o=utf8_decode($aseg_y_o); 
$aseg_tel1=utf8_decode($aseg_tel1); 
$aseg_tel2=utf8_decode($aseg_tel2); 
$aseg_domicilio=utf8_decode($aseg_domicilio); 
$aseg_cp=utf8_decode($aseg_cp); 
$aseg_estado=utf8_decode($aseg_estado); 
$aseg_municipio=utf8_decode($aseg_municipio); 
$aseg_colonia=utf8_decode($aseg_colonia); 
$aseg_ciudad=utf8_decode($aseg_ciudad); 
$aseg_conductor=utf8_decode($aseg_conductor); 
$aseg_conductor_tel1=utf8_decode($aseg_conductor_tel1); 
$aseg_conductor_tel2=utf8_decode($aseg_conductor_tel2); 

$aseguradora=strtoupper($aseguradora); 
$ajustador=strtoupper($ajustador); 
$telid=strtoupper($telid); 
$aseg_poliza=strtoupper($aseg_poliza); 
$aseg_inciso=strtoupper($aseg_inciso); 
$aseg_vigencia_inicio=strtoupper($aseg_vigencia_inicio); 
$aseg_vigencia_termino=strtoupper($aseg_vigencia_termino); 
$aseg_monto=strtoupper($aseg_monto); 
$asegurado=strtoupper($asegurado); 
$aseg_y_o=strtoupper($aseg_y_o); 
$aseg_tel1=strtoupper($aseg_tel1); 
$aseg_tel2=strtoupper($aseg_tel2); 
$aseg_domicilio=strtoupper($aseg_domicilio); 
$aseg_cp=strtoupper($aseg_cp); 
$aseg_estado=strtoupper($aseg_estado); 
$aseg_municipio=strtoupper($aseg_municipio); 
$aseg_colonia=strtoupper($aseg_colonia); 
$aseg_ciudad=strtoupper($aseg_ciudad); 
$aseg_conductor=strtoupper($aseg_conductor); 
$aseg_conductor_tel1=strtoupper($aseg_conductor_tel1); 
$aseg_conductor_tel2=strtoupper($aseg_conductor_tel2);



#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ajustador='$ajustador', telid='$telid', aseguradora='$aseguradora', aseg_poliza='$aseg_poliza', aseg_inciso='$aseg_inciso', aseg_vigencia_inicio='$aseg_vigencia_inicio', aseg_vigencia_termino='$aseg_vigencia_termino', aseg_cobertura='$aseg_cobertura', aseg_monto='$aseg_monto', asegurado='$asegurado', asegurado_y_o='$aseg_y_o', aseg_tel1='$aseg_tel1', aseg_tel2='$aseg_tel2', aseg_domicilio='$aseg_domicilio', aseg_cp='$aseg_cp', aseg_estado='$aseg_estado', aseg_municipio='$aseg_municipio', aseg_colonia='$aseg_colonia', aseg_ciudad='$aseg_ciudad', aseg_conductor='$aseg_conductor', aseg_conductor_tel1='$aseg_conductor_tel1', aseg_conductor_tel2='$aseg_conductor_tel2' where id='$id'";
mysqli_query($database, "$sSQL");

/*

*/
}

include('info_poliza.php'); 
?>
