<?php  
extract($_GET);
extract($_POST);
include("conf.php");

$conductor=utf8_decode($conductor); 
$tel1=utf8_decode($tel1); 
$tel2=utf8_decode($tel2); 
$siniestro=utf8_decode($siniestro); 
$averiguacion=utf8_decode($averiguacion); 
$autoridad=utf8_decode($autoridad); 
$numlesionados=utf8_decode($numlesionados); 
$numhomicidios=utf8_decode($numhomicidios); 
$descripcion=utf8_decode($descripcion); 
$lugar_hechos=utf8_decode($lugar_hechos); 
$referencias=utf8_decode($referencias); 
$estado=utf8_decode($estado); 
$municipio=utf8_decode($municipio); 
$colonia=utf8_decode($colonia); 
$ciudad=utf8_decode($ciudad); 
$ajustador=utf8_decode($ajustador); 
$telajustador1=utf8_decode($telajustador1); 
$telajustador2=utf8_decode($telajustador2); 
$monto_danos=utf8_decode($monto_danos); 
$monto_deducible=utf8_decode($monto_deducible); 
##startcomprobacion
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","SELECT * from seguimiento_juridico where general = '$id'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET conductor='$conductor', telconductor='$tel1', telconductor2='$tel2', siniestro='$siniestro', averiguacion='$averiguacion', autoridad='$autoridad', fecha_accidente='$accidente_ano-$accidente_mes-$accidente_dia', numlesionados='$numlesionados', numhomicidios='$numhomicidios', delitos='$delitos', danos='$danos', lesiones='$lesiones', homicidios='$homicidios', ataques='$ataques', robo='$robo', descripcion='$descripcion', lugar_hechos='$lugar_hechos', referencias='$referencias', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', ajustador='$ajustador', telajustador='$telajustador1', telajustador2='$telajustador2', monto_danos='$monto_danos', monto_deducible='$monto_deducible' where general='$id'";
mysqli_query($database, "$sSQL")or die(mysql_error());

}
else{
#crear registro
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `seguimiento_juridico` (`general`, `conductor`, `telconductor`, `telconductor2`, `siniestro`, `averiguacion`, `autoridad`, `fecha_accidente`, `numlesionados`, `numhomicidios`, `delitos`, `danos`, `lesiones`, `homicidios`, `ataques`, `robo`, `descripcion`, `lugar_hechos`, `referencias`, `colonia`, `ciudad`, `municipio`, `estado`, `ajustador`, `telajustador`, `telajustador2`, `monto_danos`, `monto_deducible`) VALUES ('$id', '$conductor', '$tel1', '$tel2', '$siniestro', '$averiguacion', '$autoridad', '$accidente_ano-$accidente_mes-$accidente_dia', '$numlesionados', '$numhomicidios', '$delitos', '$danos', '$lesiones', '$homicidios', '$ataques', '$robo', '$descripcion', '$lugar_hechos', '$referencias', '$colonia', '$ciudad', '$municipio', '$estado', '$ajustador', '$telajustador1', '$telajustador2', '$monto_danos', '$monto_deducible')")or die(mysql_error()); 
}
##endcomprobacion
header("Location: mainframe.php?module=detail_seguimiento&id=$id");
?>