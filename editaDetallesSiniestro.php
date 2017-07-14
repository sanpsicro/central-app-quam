<script type="text/javascript" src="subcombo.js"></script>
<?php  
mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$_POST[id]'");
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
echo'<form method="post" action="editadoDetallesSiniestro.php">';
echo'<input type="hidden" name="id" value="'.$id.'">';
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
            <td bgcolor="#FFFFFF"><input name="siniestro" type="text" id="siniestro" size="25" value="'.$siniestro.'"/></td>
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
            <td bgcolor="#FFFFFF"><select name="estado" id="estado" onChange="cargaContenido(this.id)">
            <option value="0">Seleccione un Estado</option>';
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
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_danos" type="text" id="monto_danos" size="22" value="'.$monto_danos.'" /></td>
            <td bgcolor="#FFFFFF"><strong>Monto Deducible: </strong></td>
            <td bgcolor="#FFFFFF"><b>$</b> <input name="monto_deducible" type="text" id="monto_deducible" size="22" value="'.$monto_deducible.'" /></td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6" align="center" bgcolor="#FFFFFF"><input name="Enviar" type="submit" value="Guardar" /> </td>
            &nbsp;&nbsp;
          </tr>
        </table>	</form>';
?>