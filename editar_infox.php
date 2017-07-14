<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 
if($_GET['caso'] == "infox")
{


##startcomprobacion
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from general where id = '$_GET[id]'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from general where id = '$id'",$db);
if (mysqli_num_rows($result)){ 
$servicio_solicitado=mysql_result($result,0,"servicio");
$contrato=mysql_result($result,0,"contrato");
$cliente=mysql_result($result,0,"idCliente");
$fecha1=mysql_result($result,0,"fecha_suceso");
$fecha1=explode(" ",$fecha1);
$fecha1date=explode("-",$fecha1[0]);
$reporta=mysql_result($result,0,"reporta");
$tel_reporta=mysql_result($result,0,"tel_reporta");
$num_contrato=mysql_result($result,0,"num_contrato");
$expediente=mysql_result($result,0,"expediente");
$num_cliente=mysql_result($result,0,"num_cliente");
$num_siniestro=mysql_result($result,0,"num_siniestro");
$usuario=mysql_result($result,0,"usuario");
$motivo_servicio=mysql_result($result,0,"motivo_servicio");
}
}
##endcomprobacion


echo'<form method="post" onsubmit="FAjax(\'infox_editado.php?&flim-flam=new Date().getTime()\',\'infox\',\'id='.$_GET['id'].'&caso='.$_GET['caso'].'&servicio_solicitado=\'+document.getElementById(\'servicio_solicitado\').value+\'&contrato=\'+document.getElementById(\'contrato\').value+\'&cliente=\'+document.getElementById(\'cliente\').value+\'&fecha1_dia=\'+document.getElementById(\'fecha1_dia\').value+\'&fecha1_mes=\'+document.getElementById(\'fecha1_mes\').value+\'&fecha1_ano=\'+document.getElementById(\'fecha1_ano\').value+\'&fecha1_date=\'+document.getElementById(\'fecha1_date\').value+\'&reporta=\'+document.getElementById(\'reporta\').value+\'&tel_reporta=\'+document.getElementById(\'tel_reporta\').value+\'&num_contrato=\'+document.getElementById(\'num_contrato\').value+\'&expediente=\'+document.getElementById(\'expediente\').value+\'&num_cliente=\'+document.getElementById(\'num_cliente\').value+\'&num_siniestro=\'+document.getElementById(\'num_siniestro\').value+\'&usuario=\'+document.getElementById(\'usuario\').value+\'&motivo_servicio=\'+document.getElementById(\'motivo_servicio\').value,\'POST\'); return false" action="#">';

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="200" bgcolor="#ffffff"><strong>Servicio solicitado:</strong></td>
            <td width="100" bgcolor="#ffffff"><select name="servicio_solicitado" id="servicio_solicitado">'; 

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from usuarios_contrato where clave = '$contrato'",$db);
if (mysqli_num_rows($result)){ 
$producto=mysql_result($result,0,"productos");
}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from productos where id = '$producto'",$db);
if (mysqli_num_rows($result)){ 
$servicios_enlatados=mysql_result($result,0,"servicios");
}
$servicios=explode(",",$servicios_enlatados);
foreach($servicios as $servo){

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from servicios where id = '$servo'",$db);
if (mysqli_num_rows($result)){ 
$servicename=mysql_result($result,0,"servicio");
}


echo'<option value="'.$servo.'"'; 
if($servo==$servicio_solicitado){echo' selected ';}
echo'>'.$servicename.'</option>';
}
			
			echo'</select></td>
            <td width="100" bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="detencion_conductor_dia" id="detencion_conductor_dia">';
			
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

			for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$detencion[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

                        echo'</select></td>
            <td width="100" bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong></td>
            <td bgcolor="#ffffff"><select name="liberacion_conductor_dia" id="liberacion_conductor_dia">';

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

for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

echo'</select></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Fianzas y/o causi&oacute;n:</strong></td>
            <td colspan="5" bgcolor="#ffffff"><textarea name="fianzas_conductor" id="fianzas_conductor" cols="120" rows="5">'.$fianzas.'</textarea></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del veh&iacute;culo: </strong></td>
            <td bgcolor="#ffffff"><input name="situacion_vehiculo" id="situacion_vehiculo" type="text" size="30" value="'.$situacion_vehiculo.'"/></td>
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


			for($contador=2007;$contador<=2017;$contador++){
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
  
  for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$liberacion_vehiculo[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}
  
  
echo'</select></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Fianzas y/o causi&oacute;n:</strong></td>
            <td colspan="5" bgcolor="#ffffff"><textarea name="fianzas_vehiculo" id="fianzas_vehiculo" cols="120" rows="5">'.$fianzas_vehiculo.'</textarea></td>
          </tr>
          <tr>
            <td colspan="6" align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Enviar" /> 
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
          <tr>
            <td width="100" bgcolor="#FFFFFF"><strong>Conductor:</strong></td>
            <td bgcolor="#FFFFFF"><input name="conductor" type="text" id="conductor" size="30" value="'.$conductor.'"/></td>
            <td width="150" bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="tel1" type="text" id="tel1" size="30" value="'.$telconductor1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td width="150" bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="tel2" type="text" id="tel2" size="30" value="'.$telconductor2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Siniestro:</strong></td>
            <td bgcolor="#FFFFFF"><input name="siniestrox" type="text" id="siniestrox" size="30" value="'.$siniestro.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Averiguaci&oacute;n previa: </strong></td>
            <td bgcolor="#FFFFFF"><input name="averiguacion" type="text" id="averiguacion" size="30" value="'.$averiguacion.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Autoridad:</strong></td>
            <td bgcolor="#FFFFFF"><input name="autoridad" type="text" id="autoridad" size="30" value="'.$autoridad.'"/></td>
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
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidente_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			
			echo'</td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de lesionados: </strong></td>
            <td bgcolor="#FFFFFF"><input name="numlesionados" type="text" id="numlesionados" size="30" value="'.$numlesionados.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de homicidios: </strong></td>
            <td bgcolor="#FFFFFF"><input name="numhomicidios" type="text" id="numhomicidios" value="'.$numhomicidios.'" size="30" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#FFFFFF"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td align=middle><strong>Delitos: 
				  <select name="delitos" id="delitos">
				  <option value="no"'; 
				  if($delitos=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($delitos=="si"){echo' selected ';}
				  echo'>S�</option>				  
				  </select>
                   </strong></td>
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
            <textarea name="descripcion" cols="120" rows="5" id="descripcion">'.$descripcion.'</textarea>
            </strong></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Lugar de los hechos: </strong></td>
            <td bgcolor="#FFFFFF"><input name="lugar_hechos" type="text" id="lugar_hechos" size="30"  value="'.$lugar_hechos.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Referencias:</strong></td>
            <td bgcolor="#FFFFFF"><input name="referencias" type="text" id="referencias" size="30"  value="'.$referencias.'"/></td>
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
            <td bgcolor="#FFFFFF"><input name="ciudad" type="text" id="ciudad" size="30"  value="'.$ciudad.'"/></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Ajustador:</strong></td>
            <td bgcolor="#FFFFFF"><input name="ajustador" type="text" id="ajustador" size="30"  value="'.$ajustador.'"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="telajustador1" type="text" id="telajustador1" size="30"  value="'.$telajustador1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="telajustador2" type="text" id="telajustador2" size="30"  value="'.$telajustador2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Monto da&ntilde;os: </strong></td>
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_danos" type="text" id="monto_danos" size="28" value="'.$monto_danos.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Monto Deducible: </strong></td>
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_deducible" type="text" id="monto_deducible" size="28" value="'.$monto_deducible.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6" align="center" bgcolor="#FFFFFF"><input name="Enviar" type="submit" value="Enviar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'editado.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'siniestro\',\'\',\'get\');"/></td>
          </tr>
        </table>	</form>';
}
?>

