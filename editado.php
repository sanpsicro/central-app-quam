<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
/*
echo''.$_POST[detencion_vehiculo_dia].'/'.$_POST[detencion_vehiculo_mes].'/'.$_POST[detencion_vehiculo_ano].'
<hr>'.$_POST[liberacion_vehiculo_dia].'/'.$_POST[liberacion_vehiculo_mes].'/'.$_POST[liberacion_vehiculo_ano].'
<hr>'.$_POST[id].'';
*/
if($_POST[caso]=="situacion"){

$situacion_conductor=utf8_decode($situacion_conductor); 
$fianzas_conductor=utf8_decode($fianzas_conductor); 
$monto_fianzas_conductor=utf8_decode($monto_fianzas_conductor); 
$folios_fianzas_conductor=utf8_decode($folios_fianzas_conductor); 
$concepto_fianzas_conductor=utf8_decode($concepto_fianzas_conductor); 
$caucion_conductor=utf8_decode($caucion_conductor); 
$monto_caucion_conductor=utf8_decode($monto_caucion_conductor); 
$concepto_caucion_conductor=utf8_decode($concepto_caucion_conductor); 
$situacion_vehiculo=utf8_decode($situacion_vehiculo); 
$fianzas_vehiculo=utf8_decode($fianzas_vehiculo); 
$monto_fianzas_vehiculo=utf8_decode($monto_fianzas_vehiculo); 
$folios_fianzas_vehiculo=utf8_decode($folios_fianzas_vehiculo); 
$concepto_fianzas_vehiculo=utf8_decode($concepto_fianzas_vehiculo); 
$caucion_vehiculo=utf8_decode($caucion_vehiculo); 
$monto_caucion_vehiculo=utf8_decode($monto_caucion_vehiculo); 
$concepto_caucion_vehiculo=utf8_decode($concepto_caucion_vehiculo); 

$situacion_conductor=strtoupper($situacion_conductor); 
$fianzas_conductor=strtoupper($fianzas_conductor); 
$monto_fianzas_conductor=strtoupper($monto_fianzas_conductor); 
$folios_fianzas_conductor=strtoupper($folios_fianzas_conductor); 
$concepto_fianzas_conductor=strtoupper($concepto_fianzas_conductor); 
$caucion_conductor=strtoupper($caucion_conductor); 
$monto_caucion_conductor=strtoupper($monto_caucion_conductor); 
$concepto_caucion_conductor=strtoupper($concepto_caucion_conductor); 
$situacion_vehiculo=strtoupper($situacion_vehiculo); 
$fianzas_vehiculo=strtoupper($fianzas_vehiculo); 
$monto_fianzas_vehiculo=strtoupper($monto_fianzas_vehiculo); 
$folios_fianzas_vehiculo=strtoupper($folios_fianzas_vehiculo); 
$concepto_fianzas_vehiculo=strtoupper($concepto_fianzas_vehiculo); 
$caucion_vehiculo=strtoupper($caucion_vehiculo); 
$monto_caucion_vehiculo=strtoupper($monto_caucion_vehiculo); 
$concepto_caucion_vehiculo=strtoupper($concepto_caucion_vehiculo); 


##startcomprobacion
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$id'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET situacion_juridica='$situacion_conductor', detencion='$detencion_conductor_ano-$detencion_conductor_mes-$detencion_conductor_dia', liberacion='$liberacion_conductor_ano-$liberacion_conductor_mes-$liberacion_conductor_dia', fianzas_conductor='$fianzas_conductor', monto_fianzas_conductor='$monto_fianzas_conductor', folios_fianzas_conductor='$folios_fianzas_conductor', concepto_fianzas_conductor='$concepto_fianzas_conductor', caucion_conductor='$caucion_conductor', monto_caucion_conductor='$monto_caucion_conductor', concepto_caucion_conductor='$concepto_caucion_conductor', situacion_vehiculo='$situacion_vehiculo', detencion_vehiculo='$detencion_vehiculo_ano-$detencion_vehiculo_mes-$detencion_vehiculo_dia', liberacion_vehiculo='$liberacion_vehiculo_ano-$liberacion_vehiculo_mes-$liberacion_vehiculo_dia', fianzas_vehiculo='$fianzas_vehiculo', monto_fianzas_vehiculo='$monto_fianzas_vehiculo', folios_fianzas_vehiculo='$folios_fianzas_vehiculo', concepto_fianzas_vehiculo='$concepto_fianzas_vehiculo', caucion_vehiculo='$caucion_vehiculo', monto_caucion_vehiculo='$monto_caucion_vehiculo', concepto_caucion_vehiculo='$concepto_caucion_vehiculo' where general='$id'";
mysqli_query($database, "$sSQL") or die (mysql_error());

}
else{
#crear registro
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `seguimiento_juridico` (`general`, `proveedor`, `situacion_juridica`, `detencion`, `liberacion`, `fianzas_conductor`, `monto_fianzas_conductor`, `folios_fianzas_conductor`, `concepto_fianzas_conductor`, `caucion_conductor`, `monto_caucion_conductor`, `concepto_caucion_conductor`, `situacion_vehiculo`, `detencion_vehiculo`, `liberacion_vehiculo`, `fianzas_vehiculo`, `monto_fianzas_vehiculo`, `folios_fianzas_vehiculo`, `concepto_fianzas_vehiculo`, `caucion_vehiculo`, `monto_caucion_vehiculo`, `concepto_caucion_vehiculo`) VALUES ('$id', '$valid_userid', '$situacion_conductor', '$detencion_conductor_ano-$detencion_conductor_mes-$detencion_conductor_dia', '$liberacion_conductor_ano-$liberacion_conductor_mes-$liberacion_conductor_dia', '$fianzas_conductor', '$monto_fianzas_conductor', '$folios_fianzas_conductor', '$concepto_fianzas_conductor', '$caucion_conductor', '$monto_caucion_conductor', '$concepto_caucion_conductor', '$situacion_vehiculo', '$detencion_vehiculo_ano-$detencion_vehiculo_mes-$detencion_vehiculo_dia', '$liberacion_vehiculo_ano-$liberacion_vehiculo_mes-$liberacion_vehiculo_dia', '$fianzas_vehiculo', '$monto_fianzas_vehiculo', '$folios_fianzas_vehiculo', '$concepto_fianzas_vehiculo', '$caucion_vehiculo', '$monto_caucion_vehiculo', '$concepto_caucion_vehiculo')"); 
}
##endcomprobacion
}

if($_GET[caso]=="situacion" or $_POST[caso]=="situacion"){

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$situacion_conductor=mysql_result($result,0,"situacion_juridica");
$detencion=mysql_result($result,0,"detencion");
$detencion=explode("-",$detencion);
$liberacion=mysql_result($result,0,"liberacion");
$liberacion=explode("-",$liberacion);
$fianzas_conductor=mysql_result($result,0,"fianzas_conductor");
$monto_fianzas_conductor=mysql_result($result,0,"monto_fianzas_conductor");
$folios_fianzas_conductor=mysql_result($result,0,"folios_fianzas_conductor");
$concepto_fianzas_conductor=mysql_result($result,0,"concepto_fianzas_conductor");
$caucion_conductor=mysql_result($result,0,"caucion_conductor");
$monto_caucion_conductor=mysql_result($result,0,"monto_caucion_conductor");
$concepto_caucion_conductor=mysql_result($result,0,"concepto_caucion_conductor");
$situacion_vehiculo=mysql_result($result,0,"situacion_vehiculo");
$detencion_vehiculo=mysql_result($result,0,"detencion_vehiculo");
$detencion_vehiculo=explode("-",$detencion_vehiculo);
$liberacion_vehiculo=mysql_result($result,0,"liberacion_vehiculo");
$liberacion_vehiculo=explode("-",$liberacion_vehiculo);
$fianzas_vehiculo=mysql_result($result,0,"fianzas_vehiculo");
$monto_fianzas_vehiculo=mysql_result($result,0,"monto_fianzas_vehiculo");
$folios_fianzas_vehiculo=mysql_result($result,0,"folios_fianzas_vehiculo");
$concepto_fianzas_vehiculo=mysql_result($result,0,"concepto_fianzas_vehiculo");
$caucion_vehiculo=mysql_result($result,0,"caucion_vehiculo");
$monto_caucion_vehiculo=mysql_result($result,0,"monto_caucion_vehiculo");
$concepto_caucion_vehiculo=mysql_result($result,0,"concepto_caucion_vehiculo");
}
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del conductor: </strong>'.$situacion_conductor.'</td>
            <td bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong> '.$detencion[2].'/'.$detencion[1].'/'.$detencion[0].'</td>
            <td bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong> '.$liberacion[2].'/'.$liberacion[1].'/'.$liberacion[0].'</td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td>'. nl2br($caucion_conductor).'</td><td>'. nl2br($monto_caucion_conductor).'</td><td>'. nl2br($concepto_caucion_conductor).'</td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td>'. nl2br($fianzas_conductor).'</td><td>'. nl2br($monto_fianzas_conductor).'</td><td>'. nl2br($folios_fianzas_conductor).'</td><td>'. nl2br($concepto_fianzas_conductor).'</td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del veh&iacute;culo: </strong> '.$situacion_vehiculo.'</td>
            <td bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong> '.$detencion_vehiculo[2].'/'.$detencion_vehiculo[1].'/'.$detencion_vehiculo[0].'</td>
            <td bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong> '.$liberacion_vehiculo[2].'/'.$liberacion_vehiculo[1].'/'.$liberacion_vehiculo[0].'</td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td>'. nl2br($caucion_vehiculo).'</td><td>'. nl2br($monto_caucion_vehiculo).'</td><td>'. nl2br($concepto_caucion_vehiculo).'</td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td>'. nl2br($fianzas_vehiculo).'</td><td>'. nl2br($monto_fianzas_vehiculo).'</td><td>'. nl2br($folios_fianzas_vehiculo).'</td><td>'. nl2br($concepto_fianzas_vehiculo).'</td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#ffffff"><strong>[ <a href="javascript:FAjax(\'editar.php?id='.$id.'&caso=situacion&flim-flam=new Date().getTime();\',\'situacion\',\'\',\'get\');">Editar</a> ]</strong> </td>
          </tr></table>';}
#######################################################################################################################################################

if($_POST[caso]=="siniestro"){
#echo " <hr> $delitos <hr>";
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
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$id'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET conductor='$conductor', telconductor='$tel1', telconductor2='$tel2', siniestro='$siniestro', averiguacion='$averiguacion', autoridad='$autoridad', fecha_accidente='$accidente_ano-$accidente_mes-$accidente_dia', numlesionados='$numlesionados', numhomicidios='$numhomicidios', delitos='$delitos', danos='$danos', lesiones='$lesiones', homicidios='$homicidios', ataques='$ataques', robo='$robo', descripcion='$descripcion', lugar_hechos='$lugar_hechos', referencias='$referencias', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', ajustador='$ajustador', telajustador='$telajustador1', telajustador2='$telajustador2', monto_danos='$monto_danos', monto_deducible='$monto_deducible' where general='$id'";
mysqli_query($database, "$sSQL");

}
else{
#crear registro
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `seguimiento_juridico` (`conductor`, `telconductor`, `telconductor2`, `siniestro`, `averiguacion`, `autoridad`, `fecha_accidente`, `numlesionados`, `numhomicidios`, `delitos`, `danos`, `lesiones`, `homicidios`, `ataques`, `robo`, `descripcion`, `lugar_hechos`, `referencias`, `colonia`, `ciudad`, `municipio`, `estado`, `ajustador`, `telajustador`, `telajustador2`, `monto_danos`, `monto_deducible`) VALUES ('$conductor', '$tel1', '$tel2', '$siniestro', '$averiguacion', '$autoridad', '$accidente_ano-$accidente_mes-$accidente_dia', '$numlesionados', '$numhomicidios', '$delitos', '$danos', '$lesiones', '$homicidios', '$ataques', '$robo', '$descripcion', '$lugar_hechos', '$referencias', '$colonia', '$ciudad', '$municipio', '$estado', '$ajustador', '$telajustador1', '$telajustador2', '$monto_danos', '$monto_deducible')"); 
}
##endcomprobacion
}

if($_GET[caso]=="siniestro" or $_POST[caso]=="siniestro"){

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$conductor=mysql_result($result,0,"conductor");
$tel1=mysql_result($result,0,"telconductor");
$tel2=mysql_result($result,0,"telconductor2");
$siniestro=mysql_result($result,0,"siniestro");
$averiguacion=mysql_result($result,0,"averiguacion");
$autoridad=mysql_result($result,0,"autoridad");
$fecha_accidente=mysql_result($result,0,"fecha_accidente");
$fecha_accidente=explode("-",$fecha_accidente);
$numlesionados=mysql_result($result,0,"numlesionados");
$numhomicidios=mysql_result($result,0,"numhomicidios");
$delitos=mysql_result($result,0,"delitos");
$danos=mysql_result($result,0,"danos");
$lesiones=mysql_result($result,0,"lesiones");
$homicidios=mysql_result($result,0,"homicidios");
$ataques=mysql_result($result,0,"ataques");
$robo=mysql_result($result,0,"robo");
$descripcion=mysql_result($result,0,"descripcion");
$lugar_hechos=mysql_result($result,0,"lugar_hechos");
$referencias=mysql_result($result,0,"referencias");
$colonia=mysql_result($result,0,"colonia");
$ciudad=mysql_result($result,0,"ciudad");
$municipio=mysql_result($result,0,"municipio");
$estado=mysql_result($result,0,"estado");
$ajustador=mysql_result($result,0,"ajustador");
$telajustador1=mysql_result($result,0,"telajustador");
$telajustador2=mysql_result($result,0,"telajustador2");
$monto_danos=mysql_result($result,0,"monto_danos");
$monto_deducible=mysql_result($result,0,"monto_deducible");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$colonia'",$db);
if (mysqli_num_rows($result)){ 
$colonia=mysql_result($result,0,"NombreColonia");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$estado'",$db);
if (mysqli_num_rows($result)){ 
$estado=mysql_result($result,0,"NombreEstado");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
if (mysqli_num_rows($result)){ 
$municipio=mysql_result($result,0,"NombreMunicipio");
}

echo' <table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td bgcolor="#FFFFFF"><strong>Conductor:</strong> '.$conductor.'</td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> '.$tel1.'</td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> '.$tel2.'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Siniestro:</strong> '.$siniestro.'</td>
            <td bgcolor="#FFFFFF"><strong>Averiguaci&oacute;n previa: </strong> '.$averiguacion.'</td>
            <td bgcolor="#FFFFFF"><strong>Autoridad:</strong> '.$autoridad.'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Fecha del accidente: </strong> '.$fecha_accidente[2].'/'.$fecha_accidente[1].'/'.$fecha_accidente[0].'</td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de lesionados: </strong> '.$numlesionados.'</td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de homicidios: </strong> '.$numhomicidios.'</td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#FFFFFF"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td><strong>Delitos:</strong> '; 
				  if($delitos=="si"){echo'S�';} else{echo'No';}
				  echo'</td>
                  <td><strong>Da&ntilde;os:</strong> '; 
				  if($danos=="si"){echo'S�';} else{echo'No';}				  
				  echo'</td>
                  <td><strong>Lesiones:</strong> '; 
				  				  if($lesiones=="si"){echo'S�';} else{echo'No';}
				  echo'</td>
                  <td><strong>Homicidios:</strong> '; 
				  				  if($homicidios=="si"){echo'S�';} else{echo'No';}
				  echo'</td>
                  <td><strong>Ataques:</strong> ';
				  if($ataques=="si"){echo'S�';} else{echo'No';}				  
				   echo'</td>
                  <td><strong>Robo:</strong> '; 
				  if($robo=="si"){echo'S�';} else{echo'No';}				  
				  echo'</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#FFFFFF"><strong>Descripci&oacute;n:</strong><br> '.nl2br($descripcion).'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Lugar de los hechos: </strong> '.$lugar_hechos.'</td>
            <td bgcolor="#FFFFFF"><strong>Referencias:</strong> '.$referencias.'</td>
            <td bgcolor="#FFFFFF"><strong>Colonia:</strong> '.$colonia.'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> '.$ciudad.'</td>
            <td bgcolor="#FFFFFF"><strong>Municipio:</strong> '.$municipio.'</td>
            <td bgcolor="#FFFFFF"><strong>Estado:</strong> '.$estado.'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Ajustador:</strong> '.$ajustador.'</td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> '.$telajustador1.'</td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> '.$telajustador2.'</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Monto da&ntilde;os: </strong> $'.number_format($monto_danos,2).'</td>
            <td bgcolor="#FFFFFF"><strong>Monto Deducible: </strong>$'.number_format($monto_deducible,2).'</td>
            <td align="right" bgcolor="#FFFFFF"><strong>[ <a href="javascript:FAjax(\'editar.php?id='.$id.'&caso=siniestro&flim-flam=new Date().getTime();\',\'siniestro\',\'\',\'get\');">Editar</a> ]</strong></td>
          </tr>
        </table>';
}
?>
