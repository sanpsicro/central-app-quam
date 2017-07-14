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
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM terceros where general='$id' order by tipo desc, nombre", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  
  
  $colonia=$row["colonia"];
$municipio=$row["municipio"];
$estado=$row["estado"];

$dbw = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbw);
$resultw = mysqli_query("SELECT * from Colonia where idColonia = '$colonia'",$dbw);
if (mysqli_num_rows($resultw)){ 
$colonia=mysql_result($resultw,0,"NombreColonia");
}

$dbw = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbw);
$resultw = mysqli_query("SELECT * from Estado where idEstado = '$estado'",$dbw);
if (mysqli_num_rows($resultw)){ 
$estado=mysql_result($resultw,0,"NombreEstado");
}

$dbw = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbw);
$resultw = mysqli_query("SELECT * from Municipio where idMunicipio = '$municipio'",$dbw);
if (mysqli_num_rows($resultw)){ 
$municipio=mysql_result($resultw,0,"NombreMunicipio");
}
  

echo' <table width="100%" border="0" cellspacing="3" cellpadding="3">
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Tipo:</strong> '.$row["tipo"].'</td>
		    <td colspan="2" bgcolor="#FFFFFF"><strong>Nombre:</strong> '.$row["nombre"].'</td>
		    </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>';
			
if($row["tipo"]=="Persona"){echo'Grado de lesi&oacute;n:';}
else{echo'Da&ntilde;o estimado:';}			
			
			echo'</strong> '.$row["dano_lesion"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> '.$row["tel1"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> '.$row["tel2"].'</td>
		  </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Descripci&oacute;n del da&ntilde;o: </strong><br>'.nl2br($row["descripcion"]).'</td>
		    </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Comentarios:</strong><br> '.nl2br($row["comentarios"]).'</td>
		    </tr>
			<tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Datos del veh&iacute;culo</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Marca:</b> '.$row["marca_vehiculo"].'</td>
			<td><b>Tipo:</b> '.$row["tipo_vehiculo"].'</td>
			<td><b>Modelo:</b> '.$row["modelo_vehiculo"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Color:</b> '.$row["color_vehiculo"].'</td>
			<td><b>Placas:</b> '.$row["placas_vehiculo"].'</td>
			<td>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Informaci&oacute;n del Seguro</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Aseguradora:</b> '.$row["aseguradora"].'</td>
			<td><b>P&oacute;liza:</b> '.$row["poliza"].'</td>
			<td><b>Inciso:</b> '.$row["inciso"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Siniestro:</b> '.$row["siniestro"].'</td>
			<td><b>Abogado:</b> '.$row["abogado"].'</td>
			<td><b>Empresa:</b> '.$row["empresa"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel1_abogado"].'</td>
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel2_abogado"].'</td>
			<td></td>
		   </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Calle:</strong> '.$row["calle"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> '.$row["ciudad"].'</td>
		    <td bgcolor="#FFFFFF"><strong>C.P.:</strong> '.$row["cp"].'</td>
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Estado:</strong> '.$estado.'</td>
		    <td bgcolor="#FFFFFF"><strong>Municipio:</strong> '.$municipio.'</td>
		    <td bgcolor="#FFFFFF"><strong>Colonia:</strong> '.$colonia.'</td>
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF">&nbsp;</td>
		    <td bgcolor="#FFFFFF">&nbsp;</td>
		    <td align="right" bgcolor="#FFFFFF"><strong>[ <a href="javascript:FAjax(\'terceros.php?id='.$id.'&idtercero='.$row["id"].'&caso=editar&flim-flam=new Date().getTime();\',\'terceros\',\'\',\'get\');">Editar</a> | <a href="javascript:confirmborra('.$id.','.$row["id"].');">Eliminar</a> ]</strong></td>
		    </tr>
	    </table>  ';


}

}


  ?>