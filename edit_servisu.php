<script type="text/javascript" src="subcombo.js"></script>
<?php 
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);


function mysqli_result($res,$row=0,$col=0){
	$numrows = mysqli_num_rows($res);
	if ($numrows && $row <= ($numrows-1) && $row >=0){
		mysqli_data_seek($res,$row);
		$resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
		if (isset($resrow[$col])){
			return $resrow[$col];
		}
	}
	return false;
} 


$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$servicio=mysqli_result($result,0,"servicio");
$motivo_servicio=mysqli_result($result,0,"motivo_servicio");
$tecnico_solicitado=mysqli_result($result,0,"tecnico_solicitado");
$tipo_asistencia_medica=mysqli_result($result,0,"tipo_asistencia_medica");
$tipo_asistencia_vial=mysqli_result($result,0,"tipo_asistencia_vial");
$ubicacion_requiere=mysqli_result($result,0,"ubicacion_requiere");
$domicilio_cliente=mysqli_result($result,0,"domicilio_cliente");
$domicilio_sustituto=mysqli_result($result,0,"domicilio_sustituto");
$ubicacion_estado=mysqli_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysqli_result($result,0,"ubicacion_municipio");
$ubicacion_colonia=mysqli_result($result,0,"ubicacion_colonia");
$ubicacion_ciudad=mysqli_result($result,0,"ubicacion_ciudad");
$destino_servicio=mysqli_result($result,0,"destino_servicio");
$destino_estado=mysqli_result($result,0,"destino_estado");
$destino_municipio=mysqli_result($result,0,"destino_municipio");
$destino_colonia=mysqli_result($result,0,"destino_colonia");
$destino_ciudad=mysqli_result($result,0,"destino_ciudad");
$observaciones=mysqli_result($result,0,"observaciones");
}

$result = mysqli_query("SELECT * from servicios where id = '$servicio'",$db);
if (mysqli_num_rows($result)){ 
$servicio=mysqli_result($result,0,"servicio");
$campos=mysqli_result($result,0,"campos");
$camposex=explode(",",$campos);
}
/*
echo'<form method="post" onsubmit="FAjax(\'servisu.php?&flim-flam=new Date().getTime()\',\'servisuservisu\',\'id='.$_GET['id'].'&caso='.$_GET['caso'].'&motivo_servicio=\'+document.getElementById(\'motivo_servicio\').value+\'&tecnico_solicitado=\'+document.getElementById(\'tecnico_solicitado\').value+\'&tipo_asistencia_vial=\'+document.getElementById(\'tipo_asistencia_vial\').value+\'&tipo_asistencia_medica=\'+document.getElementById(\'tipo_asistencia_medica\').value+\'&ubicacion_requiere=\'+document.getElementById(\'ubicacion_requiere\').value+\'&domicilio_cliente=\'+document.getElementById(\'domicilio_cliente\').value+\'&domicilio_sustituto=\'+document.getElementById(\'domicilio_sustituto\').value+\'&ubicacion_estado=\'+document.getElementById(\'estado\').value+\'&ubicacion_municipio=\'+document.getElementById(\'municipio\').value+\'&ubicacion_colonia=\'+document.getElementById(\'colonia\').value+\'&ubicacion_ciudad=\'+document.getElementById(\'ciudad\').value+\'&destino_servicio=\'+document.getElementById(\'destino_servicio\').value+\'&destino_estado=\'+document.getElementById(\'estado2\').value+\'&destino_municipio=\'+document.getElementById(\'municipio2\').value+\'&destino_colonia=\'+document.getElementById(\'colonia2\').value+\'&destino_ciudad=\'+document.getElementById(\'ciudad2\').value+\'&observaciones=\'+document.getElementById(\'observaciones\').value,\'POST\'); return false" action="#">';
*/
echo'<form method="post" action="process.php?module=detail_seguimiento&accela=edit&id='.$id.'" name="afrt">';
$ivx=0;
?>

<table width="100%" border="0" cellspacing="3" cellpadding="3">
          
<tr>

<?php 
$checa_array=array_search("motivo_servicio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Motivo del servicio:</strong><br></td>
	  <td bgcolor="#ffffff"><textarea name="motivo_servicio" id="motivo_servicio" cols="40" rows="4"><?php echo $motivo_servicio;?></textarea></td>
      
            <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>

<?php 
$checa_array=array_search("tipo_asistencia_vial",$camposex);
if($checa_array===FALSE){} else{
?>
      
	 <td bgcolor="#ffffff"><strong>Tipo asistencia vial:</strong></td> 
    <td bgcolor="#ffffff">
	  
	  <select name="tipo_asistencia_vial" id="tipo_asistencia_vial">
             <option>Seleccione...</option>
             <option value="Traslado para evitar alcohol&iacute;metro"  <?php 
if($tipo_asistencia_vial=="Traslado para evitar alcohol�metro"){echo' selected ';}?>			 
			 >Traslado para evitar alcohol�metro</option>
             <option value="Siniestro" <?php if($tipo_asistencia_vial=="Siniestro"){echo' selected ';}	?>		 			 
			 >Siniestro</option>
             <option value="Asistencia" <?php 
if($tipo_asistencia_vial=="Asistencia"){echo' selected ';}		?>	 			 			 
			 >Asistencia</option>
			 <option value="Paso de Corriente" <?php 
if($tipo_asistencia_vial=="Paso de Corriente"){echo' selected ';}		?>	 			 			 
			 >Paso de Corriente</option>
             <option value="Cambio de llanta" <?php 
if($tipo_asistencia_vial=="Cambio de llanta"){echo' selected ';} ?>			 			 			 
			 >Cambio de llanta</option>
             <option value="Llaves en el interior del veh�culo" <?php 
if($tipo_asistencia_vial=="Llaves en el interior del veh�culo"){echo' selected ';}?>			 			 			 			 
			 >Llaves en el interior del veh&iacute;culo</option>
             <option value="Env�o de gasolina" <?php 
if($tipo_asistencia_vial=="Env�o de gasolina"){echo' selected ';} ?>			 			 			 			 			 
			 >Env&iacute;o de gasolina</option>
             <option value="Problemas administrativos" <?php 
if($tipo_asistencia_vial=="Problemas administrativos"){echo' selected ';} ?>			 			 			 			 			 			 
			 >Problemas administrativos</option>
                  </select>    </td>
	  
      
                  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>

      <?php 
$checa_array=array_search("tipo_asistencia_medica",$camposex);
if($checa_array===FALSE){} else{
?>
	  
    <td bgcolor="#ffffff"><strong>Tipo asistencia medica:</strong></td> 
    <td bgcolor="#ffffff">
	  
	  <select name="tipo_asistencia_medica" id="tipo_asistencia_medica">
           <option>Seleccione...</option>
             <option value="Consulta telef�nica" <?php 
if($tipo_asistencia_medica=="Consulta telef�nica"){echo' selected ';}	?>		 			 
			 >Consulta telef&oacute;nica</option>
             <option value="Consulta a domicilio" <?php 
if($tipo_asistencia_medica=="Consulta a domicilio"){echo' selected ';}	?>		 			 
			 >Consulta a domicilio</option>
             <option value="Ambulancia" <?php 
if($tipo_asistencia_medica=="Ambulancia"){echo' selected ';}	?>		 			 
			 >Ambulancia</option>
                  </select>    </td>
                  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      


<?php 
$checa_array=array_search("tecnico_solicitado",$camposex);
if($checa_array===FALSE){} else{
?>

    <td bgcolor="#ffffff"><strong>T&eacute;cnico solicitado:</strong></td> 
    <td bgcolor="#ffffff"><select name="tecnico_solicitado" id="tecnico_solicitado">
<option value="Plomero" <?php if($tecnico_solicitado=="Plomero"){echo' selected ';} ?> >Plomero</option>
<option value="Cerrajero" <?php if($tecnico_solicitado=="Cerrajero"){echo' selected ';}?> >Cerrajero</option>
<option value="Vidriero" <?php if($tecnico_solicitado=="Vidriero"){echo' selected ';} ?> >Vidriero</option>
<option value="Electricista" <?php if($tecnico_solicitado=="Electricista"){echo' selected ';} ?> >Electricista</option>
<option value="Carpintero" <?php if($tecnico_solicitado=="Carpintero"){echo' selected ';} ?> >Carpintero</option>
<option value="Ebanista" <?php if($tecnico_solicitado=="Ebanista"){echo' selected ';} ?> >Ebanista</option>
<option value="Jardinero" <?php if($tecnico_solicitado=="Jardinero"){echo' selected ';} ?> >Jardinero</option>
<option value="Herrero" <?php if($tecnico_solicitado=="Herrero"){echo' selected ';} ?> >Herrero</option>
<option value="Alba�iler�a" <?php if($tecnico_solicitado=="Alba�iler�a"){echo' selected ';} ?> >Alba�iler�a</option>
<option value="Impermeabilizador" <?php if($tecnico_solicitado=="Impermeabilizador"){echo' selected ';} ?> >Impermeabilizador</option>
<option value="Puertas el�ctricas" <?php if($tecnico_solicitado=="Puertas el�ctricas"){echo' selected ';} ?> >Puertas el�ctricas</option>
<option value="CCTV" <?php if($tecnico_solicitado=="CCTV"){echo' selected ';} ?> >CCTV</option>
<option value="T�cnico en electrodimesticos" <?php if($tecnico_solicitado=="T�cnico en electrodimesticos"){echo' selected ';} ?> >T�cnico en electrodimesticos</option>
<option value="Lavado de Alfombras y Mobiliario" <?php if($tecnico_solicitado=="Lavado de Alfombras y Mobiliario"){echo' selected ';} ?> >Lavado de Alfombras y Mobiliario</option>
<option value="Pintores" <?php if($tecnico_solicitado=="Pintores"){echo' selected ';} ?> >Pintores</option>
<option value="Mantenimiento y limpieza de Albercas" <?php if($tecnico_solicitado=="Mantenimiento y limpieza de Albercas"){echo' selected ';} ?> >Mantenimiento y limpieza de Albercas</option>
<option value="T�cnico en computaci�n" <?php if($tecnico_solicitado=="T�cnico en computaci�n"){echo' selected ';} ?> >T�cnico en computaci�n</option>
<option value="Transporte de Mudanzas" <?php if($tecnico_solicitado=="Transporte de Mudanzas"){echo' selected ';} ?> >Transporte de Mudanzas</option>
<option value="Calefacci�n y A/A" <?php if($tecnico_solicitado=="Calefacci�n y A/A"){echo' selected ';} ?> >Calefacci�n y A/A</option>
<option value="Handyman" <?php if($tecnico_solicitado=="Handyman"){echo' selected ';} ?> >Handyman</option>
<option value="Servicio Dom�stico" <?php if($tecnico_solicitado=="Servicio Dom�stico"){echo' selected ';} ?> >Servicio Dom�stico</option>
<option value="Otros t�cnicos" <?php if($tecnico_solicitado=="Otros t�cnicos"){echo' selected ';} ?> >Otros t�cnicos</option>
    </select></td>
	  
                  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
                  <?php 
$checa_array=array_search("domicilio_cliente",$camposex);
if($checa_array===FALSE){} else{
?>
	  
   <td bgcolor="#ffffff"><strong>Domicilio cliente: </strong></td>
            <td bgcolor="#ffffff"><input name="domicilio_cliente" id="domicilio_cliente" type="text" size="25" value="<?php echo $domicilio_cliente; ?>"/></td>

                  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      

                  <?php 
$checa_array=array_search("domicilio_sustituto",$camposex);
if($checa_array===FALSE){} else{
?>
	  
   <td bgcolor="#ffffff"><strong>Domicilio auto sustituto: </strong></td>
            <td bgcolor="#ffffff"><input name="domicilio_sustituto" id="domicilio_sustituto" type="text" size="25" value="<?php echo $domicilio_sustituto; ?>"/></td> 
	  
                  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      

                  <?php 
$checa_array=array_search("ubicacion_requiere",$camposex);
if($checa_array===FALSE){} else{
?>

            <td bgcolor="#ffffff"><strong>Ubicacion y referencias: </strong><br></td>
			<td bgcolor="#ffffff"><textarea name="ubicacion_requiere" id="ubicacion_requiere" cols="40" rows="4"><?php echo $ubicacion_requiere;?></textarea></td>
            
                              <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      

                              <?php 
$checa_array=array_search("ubicacion_estado",$camposex);
if($checa_array===FALSE){} else{
?>
 <td bgcolor="#ffffff"><strong>Ubicacion Estado: </strong></td>
            <td bgcolor="#ffffff"><?php 
			echo'<select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'>
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

echo'        </select>'; ?></td>
						                              <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      

 <?php 
$checa_array=array_search("ubicacion_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
            <td bgcolor="#ffffff"><strong>Ubicacion Municipio: </strong></td>
            <td bgcolor="#ffffff"><?php 
			
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
						<option value="0">Seleccione un Estado</option></select>';}		?>
			
			</td>		         	                              <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      

 <?php 
$checa_array=array_search("ubicacion_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
           				
						
            <td bgcolor="#ffffff"><strong>Ubicacion  Colonia: </strong></td>
            <td bgcolor="#ffffff">
			<?php 
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
					?>
			
			
</td>
        	                              <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
			
             <?php 
$checa_array=array_search("ubicacion_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>

            <td bgcolor="#ffffff"><strong>Ubicacion Ciudad: </strong></td>
            <td bgcolor="#ffffff"><input name="ciudad" id="ciudad" type="text" size="25" value="<?php echo $ubicacion_ciudad; ?>"/></td>
			
             <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
			
                         <?php 
$checa_array=array_search("destino_servicio",$camposex);
if($checa_array===FALSE){} else{
?>

            
			            <td bgcolor="#ffffff"><strong>Destino del servicio: </strong></td>
                        <td bgcolor="#ffffff"><input name="destino_servicio" id="destino_servicio" type="text" size="25" value="<?php echo $destino_servicio; ?>"/></td>

			             <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
			
 <?php 
$checa_array=array_search("destino_estado",$camposex);
if($checa_array===FALSE){} else{
?>
			
			<td bgcolor="#ffffff"><strong>Destino Estado: </strong></td>
            <td bgcolor="#ffffff"><?php echo'<select name="estado2" id="estado2" onChange=\'cargaContenido(this.id)\'>
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

echo'        </select>'; ?></td>
			
			     <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>   
			 <?php 
$checa_array=array_search("destino_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
		
			 <td bgcolor="#ffffff"><strong>Destino Municipio: </strong></td>
            <td bgcolor="#ffffff"><?php 
			
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
						<option value="0">Seleccione un Estado</option></select>';}	?>	
			
			</td>						
						
						     <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>   
				 <?php 
$checa_array=array_search("destino_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
			
			  <td bgcolor="#ffffff"><strong>Destino  Colonia: </strong></td>
            <td bgcolor="#ffffff"><?php 
			
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
					</select>';}?>
			
			
</td>
			
						     <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>   
             <?php 
$checa_array=array_search("destino_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>
            
			<td bgcolor="#ffffff"><strong>Destino Ciudad: </strong></td>
            <td bgcolor="#ffffff"><input name="ciudad2" id="ciudad2" type="text" size="25" value="<?php echo $destino_ciudad; ?>"/></td>
				
			
			  <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>   
			 <?php 
$checa_array=array_search("observaciones",$camposex);
if($checa_array===FALSE){} else{
?>
            <td bgcolor="#FFFFFF"><b>Observaciones:</b></td>
            <td bgcolor="#FFFFFF"><textarea name="observaciones" cols="40" rows="4"><?php echo $observaciones;?></textarea></td>
            
             <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>  					
			</tr>
			<tr>
            <td colspan="6" align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            <!-- &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'servisu.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'servisuservisu\',\'\',\'get\');"/>--></td>
          </tr>
        </table>
</form>

