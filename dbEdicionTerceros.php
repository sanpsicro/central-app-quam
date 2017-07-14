<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 
if(isset($_POST[caso]) && $_POST[caso]!=""){
$tipo=utf8_decode($tipo); 
$nombre=utf8_decode($nombre); 
$marca_vehiculo=utf8_decode($marca_vehiculo);
$tipo_vehiculo=utf8_decode($tipo_vehiculo);
$modelo_vehiculo=utf8_decode($modelo_vehiculo);
$color_vehiculo=utf8_decode($color_vehiculo);
$placas_vehiculo=utf8_decode($placas_vehiculo);
$aseguradora=utf8_decode($aseguradora);
$poliza=utf8_decode($poliza);
$inciso=utf8_decode($inciso);
$siniestro=utf8_decode($siniestro);
$abogado=utf8_decode($abogado);
$empresa=utf8_decode($empresa);
$tel1_abogado=utf8_decode($tel1_abogado);
$tel2_abogado=utf8_decode($tel2_abogado);
$dano_lesion=utf8_decode($dano_lesion); 
$telx1=utf8_decode($telx1); 
$telx2=utf8_decode($telx2); 
$descripcion_dano=utf8_decode($descripcion_dano); 
$comentarios=utf8_decode($comentarios); 
$calle=utf8_decode($calle); 
$ciudad=utf8_decode($ciudad); 
$cp=utf8_decode($cp); 
$cp=utf8_decode($cp); 
$tipo=strtoupper($tipo); 
$nombre=strtoupper($nombre); 
$marca_vehiculo=strtoupper($marca_vehiculo);
$tipo_vehiculo=strtoupper($tipo_vehiculo);
$modelo_vehiculo=strtoupper($modelo_vehiculo);
$color_vehiculo=strtoupper($color_vehiculo);
$placas_vehiculo=strtoupper($placas_vehiculo);
$aseguradora=strtoupper($aseguradora);
$poliza=strtoupper($poliza);
$inciso=strtoupper($inciso);
$siniestro=strtoupper($siniestro);
$abogado=strtoupper($abogado);
$empresa=strtoupper($empresa);
$tel1_abogado=strtoupper($tel1_abogado);
$tel2_abogado=strtoupper($tel2_abogado);
$dano_lesion=strtoupper($dano_lesion); 
$telx1=strtoupper($telx1); 
$telx2=strtoupper($telx2); 
$descripcion_dano=strtoupper($descripcion_dano); 
$comentarios=strtoupper($comentarios); 
$calle=strtoupper($calle); 
$ciudad=strtoupper($ciudad); 
$cp=strtoupper($cp); 
$cp=strtoupper($cp); 
}
if($_POST['caso'] == "editar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE terceros SET tipo='$tipo', nombre='$nombre', dano_lesion='$dano_lesion', tel1='$telx1', tel2='$telx2', descripcion='$descripcion_dano', comentarios='$comentarios', marca_vehiculo='$marca_vehiculo',tipo_vehiculo='$tipo_vehiculo',modelo_vehiculo='$modelo_vehiculo',color_vehiculo='$color_vehiculo',placas_vehiculo='$placas_vehiculo',aseguradora='$aseguradora',poliza='$poliza',inciso='$inciso',siniestro='$siniestro',abogado='$abogado',empresa='$empresa',tel1_abogado='$tel1_abogado',tel2_abogado='$tel2_abogado', calle='$calle', colonia='$colonia', cp='$cp', ciudad='$ciudad', municipio='$municipio', estado='$estado' where id='$idtercero'";
mysqli_query($database, "$sSQL");
}
if($_POST['caso'] == "nuevo"){
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `terceros` (`general`, `tipo`, `nombre`, `dano_lesion`, `tel1`, `tel2`, `descripcion`, `comentarios`, `marca_vehiculo`, `tipo_vehiculo`, `modelo_vehiculo`, `color_vehiculo`, `placas_vehiculo`, `aseguradora`, `poliza`, `inciso`, `siniestro`, `abogado`, `empresa`, `tel1_abogado`, `tel2_abogado`, `calle`, `colonia`, `cp`, `ciudad`, `municipio`, `estado`) VALUES ('$id', '$tipo', '$nombre', '$dano_lesion', '$telx1', '$telx2', '$descripcion_dano', '$comentarios', '$marca_vehiculo', '$tipo_vehiculo', '$modelo_vehiculo', '$color_vehiculo', '$placas_vehiculo', '$aseguradora', '$poliza', '$inciso', '$siniestro', '$abogado', '$empresa', '$tel1_abogado', '$tel2_abogado', '$calle', '$colonia', '$cp', '$ciudad', '$municipio', '$estado')"); 
}
if($_GET['caso'] == "borrar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From terceros Where id ='$idtercero' and general='$id'";
mysqli_query("$database",$sSQL);
}
##############################################################################
header("Location: mainframe.php?module=detail_seguimiento&id=$id");
?>