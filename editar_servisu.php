<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from general where id = '$id'",$db);
if (mysqli_num_rows($result)){ 
/*
$ubicacion=mysql_result($result,0,"ubicacion_requiere");
$estado=mysql_result($result,0,"ubicacion_estado");
$municipio=mysql_result($result,0,"ubicacion_municipio");
$colonia=mysql_result($result,0,"ubicacion_colonia");
$ciudad=mysql_result($result,0,"ubicacion_ciudad");
$observaciones=mysql_result($result,0,"observaciones");
*/
$motivo_servicio=mysql_result($result,0,"motivo_servicio");
$tecnico_solicitado=mysql_result($result,0,"tecnico_solicitado");
$tipo_asistencia_medica=mysql_result($result,0,"tipo_asistencia_medica");
$tipo_asistencia_vial=mysql_result($result,0,"tipo_asistencia_vial");
$ubicacion_requiere=mysql_result($result,0,"ubicacion_requiere");
$domicilio_cliente=mysql_result($result,0,"domicilio_cliente");
$domicilio_sustituto=mysql_result($result,0,"domicilio_sustituto");
$ubicacion_estado=mysql_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysql_result($result,0,"ubicacion_municipio");
$ubicacion_colonia=mysql_result($result,0,"ubicacion_colonia");
$ubicacion_ciudad=mysql_result($result,0,"ubicacion_ciudad");
$destino_servicio=mysql_result($result,0,"destino_servicio");
$destino_estado=mysql_result($result,0,"destino_estado");
$destino_municipio=mysql_result($result,0,"destino_municipio");
$destino_colonia=mysql_result($result,0,"destino_colonia");
$destino_ciudad=mysql_result($result,0,"destino_ciudad");
$observaciones=mysql_result($result,0,"observaciones");
}


echo'<form method="post" onsubmit="FAjax(\'servisu.php?&flim-flam=new Date().getTime()\',\'servisuservisu\',\'id='.$_GET['id'].'&caso='.$_GET['caso'].'&motivo_servicio=\'+document.getElementById(\'motivo_servicio\').value+\'&tecnico_solicitado=\'+document.getElementById(\'tecnico_solicitado\').value+\'&tipo_asistencia_vial=\'+document.getElementById(\'tipo_asistencia_vial\').value+\'&tipo_asistencia_medica=\'+document.getElementById(\'tipo_asistencia_medica\').value+\'&ubicacion_requiere=\'+document.getElementById(\'ubicacion_requiere\').value+\'&domicilio_cliente=\'+document.getElementById(\'domicilio_cliente\').value+\'&domicilio_sustituto=\'+document.getElementById(\'domicilio_sustituto\').value+\'&ubicacion_estado=\'+document.getElementById(\'estado\').value+\'&ubicacion_municipio=\'+document.getElementById(\'municipio\').value+\'&ubicacion_colonia=\'+document.getElementById(\'colonia\').value+\'&ubicacion_ciudad=\'+document.getElementById(\'ciudad\').value+\'&destino_servicio=\'+document.getElementById(\'destino_servicio\').value+\'&destino_estado=\'+document.getElementById(\'estado2\').value+\'&destino_municipio=\'+document.getElementById(\'municipio2\').value+\'&destino_colonia=\'+document.getElementById(\'colonia2\').value+\'&destino_ciudad=\'+document.getElementById(\'ciudad2\').value+\'&observaciones=\'+document.getElementById(\'observaciones\').value,\'POST\'); return false" action="#">';
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          
<tr>
      <td  colspan=6 bgcolor="#ffffff"><strong>Motivo del servicio:</strong><br><textarea name="motivo_servicio" id="motivo_servicio" cols="130" rows="4">'.$motivo_servicio.'</textarea></td>
	  </tr><tr>
	  <td bgcolor="#ffffff"><strong>T&eacute;cnico solicitado:</strong></td> 
	  <td bgcolor="#ffffff"><select name="tecnico_solicitado" id="tecnico_solicitado">
<option value="Plomero" '; 
if($tecnico_solicitado=="Plomero"){echo' selected ';}
echo'>Plomero</option>
<option value="Cerrajero"'; 
if($tecnico_solicitado=="Cerrajero"){echo' selected ';}
echo'>Cerrajero</option>
<option value="Vidriero"'; 
if($tecnico_solicitado=="Vidriero"){echo' selected ';}
echo'>Vidriero</option>
<option value="Electricista"'; 
if($tecnico_solicitado=="Electricista"){echo' selected ';}
echo'>Electricista</option>

	  </select></td>
	  
	  
	  <td bgcolor="#ffffff"><strong>Tipo asistencia vial:</strong></td> 
	  <td bgcolor="#ffffff">
	  
	  <select name="tipo_asistencia_vial" id="tipo_asistencia_vial">
             <option>Seleccione...</option>
             <option value="Traslado para evitar alcohol&iacute;metro"'; 
if($tipo_asistencia_vial=="Traslado para evitar alcohol&iacute;metro"){echo' selected ';}			 
			 echo'>Traslado para evitar alcohol&iacute;metro</option>
             <option value="Siniestro"'; 
if($tipo_asistencia_vial=="Siniestro"){echo' selected ';}			 			 
			 echo'>Siniestro</option>
             <option value="Asistencia"'; 
if($tipo_asistencia_vial=="Asistencia"){echo' selected ';}			 			 			 
			 echo'>Asistencia</option>
             <option value="Cambio de llanta"'; 
if($tipo_asistencia_vial=="Cambio de llanta"){echo' selected ';}			 			 			 
			 echo'>Cambio de llanta</option>
             <option value="Llaves en el interior del veh&iacute;culo"'; 
if($tipo_asistencia_vial=="Llaves en el interior del veh&iacute;culo"){echo' selected ';}			 			 			 			 
			 echo'>Llaves en el interior del veh&iacute;culo</option>
             <option value="Env&iacute;o de gasolina"'; 
if($tipo_asistencia_vial=="Env&iacute;o de gasolina"){echo' selected ';}			 			 			 			 			 
			 echo'>Env&iacute;o de gasolina</option>
             <option value="Problemas administrativos"'; 
if($tipo_asistencia_vial=="Problemas administrativos"){echo' selected ';}			 			 			 			 			 			 
			 echo'>Problemas administrativos</option>
                    </select> 
	  
	  </td>
	  
	  
	    <td bgcolor="#ffffff"><strong>Tipo asistencia medica:</strong></td> 
	  <td bgcolor="#ffffff">
	  
	  <select name="tipo_asistencia_medica" id="tipo_asistencia_medica">
           <option>Seleccione...</option>
             <option value="Consulta telef&oacute;nica"'; 
if($tipo_asistencia_medica=="Consulta telef&oacute;nica"){echo' selected ';}			 			 
			 echo'>Consulta telef&oacute;nica</option>
             <option value="Consulta a domicilio"'; 
if($tipo_asistencia_medica=="Consulta a domicilio"){echo' selected ';}			 			 
			 echo'>Consulta a domicilio</option>
             <option value="Ambulancia"'; 
if($tipo_asistencia_medica=="Ambulancia"){echo' selected ';}			 			 
			 echo'>Ambulancia</option>
                    </select> 
	  
	  </td>
	  
    </tr>
<tr>
   <td bgcolor="#ffffff"><strong>Domicilio cliente: </strong></td>
            <td bgcolor="#ffffff"><input name="domicilio_cliente" id="domicilio_cliente" type="text" size="25" value="'.$domicilio_cliente.'"/></td>

   <td bgcolor="#ffffff"><strong>Domicilio auto sustituto: </strong></td>
            <td bgcolor="#ffffff"><input name="domicilio_sustituto" id="domicilio_sustituto" type="text" size="25" value="'.$domicilio_sustituto.'"/></td>
<td bgcolor="#ffffff">&nbsp;</td><td bgcolor="#ffffff">&nbsp;</td>
</tr>
          <tr>
            <td bgcolor="#ffffff" colspan=6><strong>Ubicacion y referencias: </strong><br>
			<textarea name="ubicacion_requiere" id="ubicacion_requiere" cols="130" rows="4">'.$ubicacion_requiere.'</textarea>
			
            </td>
			</tr>
			
            <td bgcolor="#ffffff"><strong>Ubicacion Estado: </strong></td>
            <td bgcolor="#ffffff"><select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'>
            <option value=\'0\'>Seleccione un Estado</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Estado order by NombreEstado", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($ubicacion_estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

echo'        </select></td>
						

            <td bgcolor="#ffffff"><strong>Ubicacion Municipio: </strong></td>
            <td bgcolor="#ffffff">'; 
			
			if(isset($ubicacion_estado) && $ubicacion_estado!=""){
echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Municipio where idEstado='$ubicacion_estado'order by NombreMunicipio", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  
      		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);								

  
  echo'<option value="'.$row["idMunicipio"].'"';
     if($ubicacion_municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }

else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option></select>';}		
			
			echo'</td>						
						
            <td bgcolor="#ffffff"><strong>Ubicacion  Colonia: </strong></td>
            <td bgcolor="#ffffff">'; 
			
			 if(isset($ubicacion_municipio) && $ubicacion_municipio!=""){
echo'  <select name="colonia" id="colonia">';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$ubicacion_municipio'order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
      		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);								

  
  echo'<option value="'.$row["idColonia"].'"';
     if($ubicacion_colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
 else{echo'<select disabled="disabled" name="colonia" id="colonia">
						<option value="0">Seleccione un Municipio</option>
					</select>';}
			
			
			echo'</td>
			</tr>
						
						
						          <tr>
            <td bgcolor="#ffffff"><strong>Ubicacion Ciudad: </strong></td>
            <td bgcolor="#ffffff"><input name="ciudad" id="ciudad" type="text" size="25" value="'.$ubicacion_ciudad.'"/></td>
			
			            <td bgcolor="#ffffff"><strong>Destino del servicio:: </strong></td>
            <td bgcolor="#ffffff"><input name="destino_servicio" id="destino_servicio" type="text" size="25" value="'.$destino_servicio.'"/></td>

			
			
			
			<td bgcolor="#ffffff"><strong>DestinoEstado: </strong></td>
            <td bgcolor="#ffffff"><select name="estado2" id="estado2" onChange=\'cargaContenido(this.id)\'>
            <option value=\'0\'>Seleccione un Estado</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Estado order by NombreEstado", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($destino_estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

echo'        </select></td></tr><tr>
			
			
			
			
			
			
			
			 <td bgcolor="#ffffff"><strong>Destino Municipio: </strong></td>
            <td bgcolor="#ffffff">'; 
			
			if(isset($destino_estado) && $destino_estado!=""){
echo'  <select name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Municipio where idEstado='$destino_estado'order by NombreMunicipio", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  
      		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);								

  
  echo'<option value="'.$row["idMunicipio"].'"';
     if($destino_municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }

else{echo'<select disabled="disabled" name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option></select>';}		
			
			echo'</td>						
						
			
			
			
			  <td bgcolor="#ffffff"><strong>Destino  Colonia: </strong></td>
            <td bgcolor="#ffffff">'; 
			
			 if(isset($destino_municipio) && $destino_municipio!=""){
echo'  <select name="colonia2" id="colonia2">';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$destino_municipio'order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
      		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);								

  
  echo'<option value="'.$row["idColonia"].'"';
     if($destino_colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
 else{echo'<select disabled="disabled" name="colonia2" id="colonia2">
						<option value="0">Seleccione un Municipio</option>
					</select>';}
			
			
			echo'</td>
			
			<td bgcolor="#ffffff"><strong>Destino Ciudad: </strong></td>
            <td bgcolor="#ffffff"><input name="ciudad2" id="ciudad2" type="text" size="25" value="'.$destino_ciudad.'"/></td>
			</tr>
			<tr>
			
			
			
			
            <td bgcolor="#ffffff" colspan=6><b>Observaciones:</b><br><textarea name="observaciones" cols="130" rows="4">'.$observaciones.'</textarea></td>						

						
						
						
			</tr>
			<tr>
            <td colspan="6" align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'servisu.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'servisuservisu\',\'\',\'get\');"/></td>
          </tr>
        </table>
</form>';
?>

