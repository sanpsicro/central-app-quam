<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 
if($_GET['caso'] == "situacion")
{


##startcomprobacion
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$_GET[id]'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
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
}
##endcomprobacion


echo'<form method="post" onsubmit="FAjax(\'editado.php?&flim-flam=new Date().getTime();\',\'situacion\',\'id='.$_GET['id'].'&amp;caso='.$_GET['caso'].'&amp;situacion_conductor=\'+document.getElementById(\'situacion_conductor\').value+\'&amp;detencion_conductor_dia=\'+document.getElementById(\'detencion_conductor_dia\').value+\'&amp;detencion_conductor_mes=\'+document.getElementById(\'detencion_conductor_mes\').value+\'&amp;detencion_conductor_ano=\'+document.getElementById(\'detencion_conductor_ano\').value+\'&amp;liberacion_conductor_dia=\'+document.getElementById(\'liberacion_conductor_dia\').value+\'&amp;liberacion_conductor_mes=\'+document.getElementById(\'liberacion_conductor_mes\').value+\'&amp;liberacion_conductor_ano=\'+document.getElementById(\'liberacion_conductor_ano\').value+\'&amp;fianzas_conductor=\'+document.getElementById(\'fianzas_conductor\').value+\'&amp;monto_fianzas_conductor=\'+document.getElementById(\'monto_fianzas_conductor\').value+\'&amp;folios_fianzas_conductor=\'+document.getElementById(\'folios_fianzas_conductor\').value+\'&amp;concepto_fianzas_conductor=\'+document.getElementById(\'concepto_fianzas_conductor\').value+\'&amp;caucion_conductor=\'+document.getElementById(\'caucion_conductor\').value+\'&amp;monto_caucion_conductor=\'+document.getElementById(\'monto_caucion_conductor\').value+\'&amp;concepto_caucion_conductor=\'+document.getElementById(\'concepto_caucion_conductor\').value+\'&amp;situacion_vehiculo=\'+document.getElementById(\'situacion_vehiculo\').value+\'&amp;detencion_vehiculo_dia=\'+document.getElementById(\'detencion_vehiculo_dia\').value+\'&amp;detencion_vehiculo_mes=\'+document.getElementById(\'detencion_vehiculo_mes\').value+\'&amp;detencion_vehiculo_ano=\'+document.getElementById(\'detencion_vehiculo_ano\').value+\'&amp;liberacion_vehiculo_dia=\'+document.getElementById(\'liberacion_vehiculo_dia\').value+\'&amp;liberacion_vehiculo_mes=\'+document.getElementById(\'liberacion_vehiculo_mes\').value+\'&amp;liberacion_vehiculo_ano=\'+document.getElementById(\'liberacion_vehiculo_ano\').value+\'&amp;fianzas_vehiculo=\'+document.getElementById(\'fianzas_vehiculo\').value+\'&amp;monto_fianzas_vehiculo=\'+document.getElementById(\'monto_fianzas_vehiculo\').value+\'&amp;folios_fianzas_vehiculo=\'+document.getElementById(\'folios_fianzas_vehiculo\').value+\'&amp;concepto_fianzas_vehiculo=\'+document.getElementById(\'concepto_fianzas_vehiculo\').value+\'&amp;caucion_vehiculo=\'+document.getElementById(\'caucion_vehiculo\').value+\'&amp;monto_caucion_vehiculo=\'+document.getElementById(\'monto_caucion_vehiculo\').value+\'&amp;concepto_caucion_vehiculo=\'+document.getElementById(\'concepto_caucion_vehiculo\').value,\'POST\'); return false" action="#">';

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="200" bgcolor="#ffffff"><strong>Situaci&oacute;n del conductor:</strong></td>
            <td width="100" bgcolor="#ffffff"><select name="situacion_conductor" id="situacion_conductor">';
		
echo'<option value="DETENIDO"'; 
if($situacion_conductor=="DETENIDO"){ echo' selected ';}
echo'>Detenido</option>';		

echo'<option value="LIBERADO"'; 
if($situacion_conductor=="LIBERADO"){ echo' selected ';}
echo'>Liberado</option>';		

echo'<option value="NUNCA DETENIDO"'; 
if($situacion_conductor=="NUNCA DETENIDO"){ echo' selected ';}
echo'>Nunca detenido</option>';		
		
#			<input name="situacion_conductor" id="situacion_conductor" type="text" size="30" value="'.$situacion_conductor.'"/>
			
			echo'</select></td>
            <td width="100" bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="detencion_conductor_dia" id="detencion_conductor_dia">';
			echo '<option value="00">00</option>';
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			
              
           echo' </select>
            /
            <select name="detencion_conductor_mes" id="detencion_conductor_mes">';
echo '<option value="00">00</option>';			
			for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

			
			
echo'                        </select>
            /
            <select name="detencion_conductor_ano" id="detencion_conductor_ano">';
echo '<option value="0000">0000</option>';
			for($contador=2005;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

                        echo'</select></td>
            <td width="100" bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="liberacion_conductor_dia" id="liberacion_conductor_dia">';
echo '<option value="00">00</option>';
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}

echo'</select>
/
<select name="liberacion_conductor_mes" id="liberacion_conductor_mes">';
echo '<option value="00">00</option>';
	for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			


echo'</select>
/
<select name="liberacion_conductor_ano" id="liberacion_conductor_ano">';
echo '<option value="0000">0000</option>';
for($contador=2005;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

echo'</select></td>
          </tr>
		  <tr>
            <td colspan="6" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><textarea name="caucion_conductor" id="caucion_conductor" cols="70" rows="3">'.$caucion_conductor.'</textarea></td>
					<td><textarea name="monto_caucion_conductor" id="monto_caucion_conductor" cols="70" rows="3">'.$monto_caucion_conductor.'</textarea></td>
					<td><textarea name="concepto_caucion_conductor" id="concepto_caucion_conductor" cols="70" rows="3">'.$concepto_caucion_conductor.'</textarea></td>
					<td>&nbsp;</td>
				</tr>
				</table>
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><textarea name="fianzas_conductor" id="fianzas_conductor" cols="40" rows="3">'.$fianzas_conductor.'</textarea></td>
					<td><textarea name="monto_fianzas_conductor" id="monto_fianzas_conductor" cols="40" rows="3">'.$monto_fianzas_conductor.'</textarea></td>
					<td><textarea name="folios_fianzas_conductor" id="folios_fianzas_conductor" cols="40" rows="3">'.$folios_fianzas_conductor.'</textarea></td>
					<td><textarea name="concepto_fianzas_conductor" id="concepto_fianzas_conductor" cols="40" rows="3">'.$concepto_fianzas_conductor.'</textarea></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del veh&iacute;culo: </strong></td>
            <td bgcolor="#ffffff"><select name="situacion_vehiculo" id="situacion_vehiculo">';
			
#			<input name="situacion_vehiculo" id="situacion_vehiculo" type="text" size="30" value="'.$situacion_vehiculo.'"/>

echo'<option value="DETENIDO"'; 
if($situacion_vehiculo=="DETENIDO"){ echo' selected ';}
echo'>Detenido</option>';		

echo'<option value="LIBERADO"'; 
if($situacion_vehiculo=="LIBERADO"){ echo' selected ';}
echo'>Liberado</option>';		

echo'<option value="NUNCA DETENIDO"'; 
if($situacion_vehiculo=="NUNCA DETENIDO"){ echo' selected ';}
echo'>Nunca detenido</option>';		
			
			echo'</select></td>
            <td bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="detencion_vehiculo_dia" id="detencion_vehiculo_dia">';


for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion_vehiculo[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			


echo'</select>
              /
  <select name="detencion_vehiculo_mes" id="detencion_vehiculo_mes">';
  
  			for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion_vehiculo[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			
  
echo'  </select>
              /
  <select name="detencion_vehiculo_ano" id="detencion_vehiculo_ano">';


			for($contador=2005;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion_vehiculo[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}

echo'</select></td>
            <td bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="liberacion_vehiculo_dia" id="liberacion_vehiculo_dia">';
			
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion_vehiculo[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			
			
echo'              </select>
              /
  <select name="liberacion_vehiculo_mes" id="liberacion_vehiculo_mes">';
  
  for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion_vehiculo[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}		
  
echo'  </select>
              /
  <select name="liberacion_vehiculo_ano" id="liberacion_vehiculo_ano">';
  
  for($contador=2005;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion_vehiculo[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}
  
  
echo'</select></td>
          </tr>
		  <tr>
            <td colspan="6" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><textarea name="caucion_vehiculo" id="caucion_vehiculo" cols="70" rows="3">'.$caucion_vehiculo.'</textarea></td>
					<td><textarea name="monto_caucion_vehiculo" id="monto_caucion_vehiculo" cols="70" rows="3">'.$monto_caucion_vehiculo.'</textarea></td>
					<td><textarea name="concepto_caucion_vehiculo" id="concepto_caucion_vehiculo" cols="70" rows="3">'.$concepto_caucion_vehiculo.'</textarea></td>
					<td>&nbsp;</td>
				</tr>
				</table>
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><textarea name="fianzas_vehiculo" id="fianzas_vehiculo" cols="40" rows="3">'.$fianzas_vehiculo.'</textarea></td>
					<td><textarea name="monto_fianzas_vehiculo" id="monto_fianzas_vehiculo" cols="40" rows="3">'.$monto_fianzas_vehiculo.'</textarea></td>
					<td><textarea name="folios_fianzas_vehiculo" id="folios_fianzas_vehiculo" cols="40" rows="3">'.$folios_fianzas_vehiculo.'</textarea></td>
					<td><textarea name="concepto_fianzas_vehiculo" id="concepto_fianzas_vehiculo" cols="40" rows="3">'.$concepto_fianzas_vehiculo.'</textarea></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td colspan="6" align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'editado.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'situacion\',\'\',\'get\');"/></td>
          </tr>
        </table>

		
	</form>';
}

##########################################################################################################################
if($_GET[caso]=="siniestro"){

##startcomprobacion
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$_GET[id]'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$conductor=mysql_result($result,0,"conductor");
$telconductor1=mysql_result($result,0,"telconductor");
$telconductor2=mysql_result($result,0,"telconductor2");
$siniestro=mysql_result($result,0,"siniestro");
$averiguacion=mysql_result($result,0,"averiguacion");
$autoridad=mysql_result($result,0,"autoridad");
$fecha_accidente=mysql_result($result,0,"fecha_accidente");
$accidente_fecha=explode("-",$fecha_accidente);
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
}
##endcomprobacion




echo'<form name="frm"  method="post" onsubmit="FAjax(\'editado.php?&flim-flam=new Date().getTime();\',\'siniestro\',\'id='.$_GET['id'].'&amp;caso='.$_GET['caso'].'&amp;conductor=\'+document.getElementById(\'conductor\').value+\'&amp;tel1=\'+document.getElementById(\'tel1\').value+\'&amp;tel2=\'+document.getElementById(\'tel2\').value+\'&amp;siniestro=\'+document.getElementById(\'siniestrox\').value+\'&amp;averiguacion=\'+document.getElementById(\'averiguacion\').value+\'&amp;autoridad=\'+document.getElementById(\'autoridad\').value+\'&amp;accidente_dia=\'+document.getElementById(\'accidente_dia\').value+\'&amp;accidente_mes=\'+document.getElementById(\'accidente_mes\').value+\'&amp;accidente_ano=\'+document.getElementById(\'accidente_ano\').value+\'&amp;numlesionados=\'+document.getElementById(\'numlesionados\').value+\'&amp;numhomicidios=\'+document.getElementById(\'numhomicidios\').value+\'&amp;delitos=\'+document.getElementById(\'delitos\').value+\'&amp;danos=\'+document.getElementById(\'danos\').value+\'&amp;lesiones=\'+document.getElementById(\'lesiones\').value+\'&amp;homicidios=\'+document.getElementById(\'homicidios\').value+\'&amp;ataques=\'+document.getElementById(\'ataques\').value+\'&amp;robo=\'+document.getElementById(\'robo\').value+\'&amp;descripcion=\'+document.getElementById(\'descripcion\').value+\'&amp;lugar_hechos=\'+document.getElementById(\'lugar_hechos\').value+\'&amp;referencias=\'+document.getElementById(\'referencias\').value+\'&amp;estado=\'+document.getElementById(\'estado\').value+\'&amp;municipio=\'+document.getElementById(\'municipio\').value+\'&amp;colonia=\'+document.getElementById(\'colonia\').value+\'&amp;ciudad=\'+document.getElementById(\'ciudad\').value+\'&amp;ajustador=\'+document.getElementById(\'ajustador\').value+\'&amp;telajustador1=\'+document.getElementById(\'telajustador1\').value+\'&amp;telajustador2=\'+document.getElementById(\'telajustador2\').value+\'&amp;monto_danos=\'+document.getElementById(\'monto_danos\').value+\'&amp;monto_deducible=\'+document.getElementById(\'monto_deducible\').value,\'POST\'); return false" action="#">';


echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <!-- tr>
            <td width="100" bgcolor="#FFFFFF"><strong>Conductor:</strong></td>
            <td bgcolor="#FFFFFF"><input name="conductor" type="text" id="conductor" size="25" value="'.$conductor.'"/></td>
            <td width="150" bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="tel1" type="text" id="tel1" size="25" value="'.$telconductor1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td width="150" bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="tel2" type="text" id="tel2" size="25" value="'.$telconductor2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr -->
          <tr>
            <td bgcolor="#FFFFFF"><strong>Siniestro:</strong></td>
            <td bgcolor="#FFFFFF"><input name="siniestrox" type="text" id="siniestrox" size="25" value="'.$siniestro.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Averiguaci&oacute;n previa: </strong></td>
            <td bgcolor="#FFFFFF"><input name="averiguacion" type="text" id="averiguacion" size="25" value="'.$averiguacion.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Autoridad:</strong></td>
            <td bgcolor="#FFFFFF"><select name="autoridad" id="autoridad">';
			
#			<input name="autoridad" type="text" id="autoridad" size="30" value="'.$autoridad.'"/>

echo'<option value="M.P. Local"'; 
if($autoridad=="M.P. Local"){ echo' selected ';}
echo'>M.P. Local</option>';		

echo'<option value="M.P. Federal"'; 
if($autoridad=="M.P. Federal"){ echo' selected ';}
echo'>M.P. Federal</option>';		
			
			echo'</select></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Fecha del accidente: </strong></td>
            <td bgcolor="#FFFFFF">';
			
echo'<select name="accidente_dia" id="accidente_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidente_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="accidente_mes" id="accidente_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidente_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="accidente_ano" id="accidente_ano">';			
for($contador=2005;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidente_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			
			echo'</td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de lesionados: </strong></td>
            <td bgcolor="#FFFFFF"><input name="numlesionados" type="text" id="numlesionados" size="25" value="'.$numlesionados.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de homicidios: </strong></td>
            <td bgcolor="#FFFFFF"><input name="numhomicidios" type="text" id="numhomicidios" value="'.$numhomicidios.'" size="25" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#FFFFFF"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td align=middle><strong>Delitos:</strong></td>
                  <td align=middle><strong>Da&ntilde;os:
                  </strong>
				  <select name="danos" id="danos">
				  <option value="no"'; 
				  if($danos=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($danos=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
				  
				  </td>
                  <td align=middle><strong>Lesiones: 
                  </strong>
				  
				   <select name="lesiones" id="lesiones">
				  <option value="no"'; 
				  if($lesiones=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($lesiones=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
				  
				  
				  </td>
                  <td align=middle><strong>Homicidios: 
                    
                  </strong>
				  
				   <select name="homicidios" id="homicidios">
				  <option value="no"'; 
				  if($homicidios=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($homicidios=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
				  
				  </td>
                  <td align=middle><strong>Ataques: 
                                      </strong>
									  
									  
 <select name="ataques" id="ataques">
				  <option value="no"'; 
				  if($ataques=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($ataques=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
				  									  
									  
									  </td>
                  <td align=middle><strong>Robo: 
                 </strong>
				 
				  <select name="robo" id="robo">
				  <option value="no"'; 
				  if($robo=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($robo=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
				  
				 
				 </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#FFFFFF"><strong>Descripci&oacute;n:<br />
            <textarea name="descripcion" cols="70" rows="3" id="descripcion">'.$descripcion.'</textarea>
            </strong></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Lugar de los hechos y referencias: </strong></td>
            <td colspan="3" bgcolor="#FFFFFF"><textarea name="lugar_hechos"  id="lugar_hechos" cols="40" rows="5"  >'."$lugar_hechos $referencias".'</textarea></td>
            <td bgcolor="#FFFFFF"><strong>Estado:</strong></td>
            <td bgcolor="#FFFFFF"><select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'>
            <option value=\'0\'>Seleccione un Estado</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Estado order by NombreEstado", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

echo'        </select></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Municipio:</strong></td>
            <td bgcolor="#FFFFFF">'; 
			
			
if(isset($estado) && $estado!=""){
echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);				
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }

else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option></select>';}			
			
			echo'</td>
            <td bgcolor="#FFFFFF"><strong>Colonia:</strong></td>
            <td bgcolor="#FFFFFF">'; 
			
			 if(isset($municipio) && $municipio!=""){
echo'  <select name="colonia" id="colonia">';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);							

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
 else{echo'<select disabled="disabled" name="colonia" id="colonia">
						<option value="0">Seleccione un Municipio</option>
					</select>';}
			
			echo'</td>
            <td bgcolor="#FFFFFF"><strong>Ciudad:</strong></td>
            <td bgcolor="#FFFFFF"><input name="ciudad" type="text" id="ciudad" size="25"  value="'.$ciudad.'"/></td>
          </tr>
          <!-- tr>
            <td bgcolor="#FFFFFF"><strong>Ajustador:</strong></td>
            <td bgcolor="#FFFFFF"><input name="ajustador" type="text" id="ajustador" size="25"  value="'.$ajustador.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="telajustador1" type="text" id="telajustador1" size="25"  value="'.$telajustador1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="telajustador2" type="text" id="telajustador2" size="25"  value="'.$telajustador2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr -->
          <tr>
            <td bgcolor="#FFFFFF"><strong>Monto da&ntilde;os: </strong></td>
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_danos" type="text" id="monto_danos" size="22" value="'.$monto_danos.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Monto Deducible: </strong></td>
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_deducible" type="text" id="monto_deducible" size="22" value="'.$monto_deducible.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6" align="center" bgcolor="#FFFFFF"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'editado.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'siniestro\',\'\',\'get\');"/></td>
          </tr>
        </table>	</form>';
}
?>

