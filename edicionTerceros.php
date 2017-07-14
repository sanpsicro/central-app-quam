<script type="text/javascript" src="subcombo.js"></script>
<?php  
if($_GET['caso'] == "editar")
{
##
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from terceros where general='$_GET[id]' AND  id= '$_GET[idtercero]'",$db);
if (mysqli_num_rows($result)){ 
$tipo=mysql_result($result,0,"tipo");
$nombre=mysql_result($result,0,"nombre");
$dano_lesion=mysql_result($result,0,"dano_lesion");
$tel1=mysql_result($result,0,"tel1");
$tel2=mysql_result($result,0,"tel2");
$descripcion=mysql_result($result,0,"descripcion");
$comentarios=mysql_result($result,0,"comentarios");
$marca_vehiculo=mysql_result($result,0,"marca_vehiculo");
$tipo_vehiculo=mysql_result($result,0,"tipo_vehiculo");
$modelo_vehiculo=mysql_result($result,0,"modelo_vehiculo");
$color_vehiculo=mysql_result($result,0,"color_vehiculo");
$placas_vehiculo=mysql_result($result,0,"placas_vehiculo");
$aseguradora=mysql_result($result,0,"aseguradora");
$poliza=mysql_result($result,0,"poliza");
$inciso=mysql_result($result,0,"inciso");
$siniestro=mysql_result($result,0,"siniestro");
$abogado=mysql_result($result,0,"abogado");
$empresa=mysql_result($result,0,"empresa");
$tel1_abogado=mysql_result($result,0,"tel1_abogado");
$tel2_abogado=mysql_result($result,0,"tel2_abogado");
$calle=mysql_result($result,0,"calle");
$colonia=mysql_result($result,0,"colonia");
$cp=mysql_result($result,0,"cp");
$ciudad=mysql_result($result,0,"ciudad");
$municipio=mysql_result($result,0,"municipio");
$estado=mysql_result($result,0,"estado");
}
##
}
echo'<form method="post" action="dbEdicionTerceros.php">';
echo"<input type='hidden' name='id' value='$_GET[id]'>";
echo"<input type='hidden' name='idtercero' value='$_GET[idtercero]'>";
echo"<input type='hidden' name='caso' value='$_GET[caso]'>";
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Tipo:</strong> <select name="tipo" id="tipo">
<option value="Persona"'; 
if($tipo=="Persona"){echo' selected ';}
echo'>Persona</option>			
<option value="Bien"'; 
if($tipo=="Bien"){echo' selected ';}
echo'>Bien</option>			
			</select></td>
		    <td colspan="2" bgcolor="#FFFFFF"><strong>Nombre:</strong> <input name="nombre" type="text" id="nombre" size="25" value="'.$nombre.'"/></td>
		    </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>';
			
if($tipo=="Persona"){echo'Grado de lesi&oacute;n:';}
if($tipo=="Bien"){echo'Da&ntilde;o estimado:';}
else{echo'Lesi&oacute;n/Da&ntilde;o estimado:';}			
			
			echo'</strong> <input name="dano_lesion" type="text" id="dano_lesion" size="25" value="'.$dano_lesion.'"/></td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> <input name="telx1" type="text" id="telx1" size="25" value="'.$tel1.'" onKeyPress="return numbersonly(this, event)"/></td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> <input name="telx2" type="text" id="telx2" size="25" value="'.$tel2.'" onKeyPress="return numbersonly(this, event)"/></td>
		  </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Descripci&oacute;n del da&ntilde;o: </strong><br> <textarea name="descripcion_dano" cols="70" rows="3" id="descripcion_dano">'.$descripcion.'</textarea></td>
		    </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Comentarios:</strong><br> <textarea name="comentarios" cols="70" rows="3" id="comentarios">'.$comentarios.'</textarea></td>
		    </tr>
			<tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Datos del veh&iacute;culo</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Marca:</b> <input name="marca_vehiculo" type="text" id="marca_vehiculo" size="25" value="'.$marca_vehiculo.'"/></td>
			<td><b>Tipo:</b> <input name="tipo_vehiculo" type="text" id="tipo_vehiculo" size="25" value="'.$tipo_vehiculo.'"/></td>
			<td><b>Modelo:</b> <input name="modelo_vehiculo" type="text" id="modelo_vehiculo" size="25" value="'.$modelo_vehiculo.'"/></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Color:</b> <input name="color_vehiculo" type="text" id="color_vehiculo" size="25" value="'.$color_vehiculo.'"/></td>
			<td><b>Placas:</b> <input name="placas_vehiculo" type="text" id="placas_vehiculo" size="25" value="'.$placas_vehiculo.'"/></td>
			<td>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Informaci&oacute;n del Seguro</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Aseguradora:</b> <input name="aseguradora" type="text" id="aseguradora" size="25" value="'.$aseguradora.'"/></td>
			<td><b>P&oacute;liza:</b> <input name="poliza" type="text" id="poliza" size="25" value="'.$poliza.'"/></td>
			<td><b>Inciso:</b> <input name="inciso" type="text" id="inciso" size="25" value="'.$inciso.'"/></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Siniestro:</b> <input name="siniestro" type="text" id="siniestroForm" size="25" value="'.$siniestro.'"/></td>
			<td><b>Abogado:</b> <input name="abogado" type="text" id="abogado" size="25" value="'.$abogado.'"/></td>
			<td><b>Empresa:</b> <input name="empresa" type="text" id="empresa" size="25" value="'.$empresa.'"/></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Tel&eacute;fono 1:</b> <input name="tel1_abogado" type="text" id="tel1_abogado" size="25" value="'.$tel1_abogado.'"/></td>
			<td><b>Tel&eacute;fono 1:</b> <input name="tel2_abogado" type="text" id="tel2_abogado" size="25" value="'.$tel2_abogado.'"/></td>
			<td></td>
		   </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Calle:</strong> <input name="calle" type="text" id="calle" size="25" value="'.$calle.'"/></td>
		    <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> <input name="ciudad" type="text" id="ciudad" size="25" value="'.$ciudad.'"/></td>
		    <td bgcolor="#FFFFFF"><strong>C.P.:</strong> <input name="cp" type="text" id="cp" size="5" value="'.$cp.'" onKeyPress="return numbersonly(this, event)"/></td>
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Estado:</strong> <select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'>
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
		    <td bgcolor="#FFFFFF"><strong>Municipio:</strong> '; 
			
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
		    <td bgcolor="#FFFFFF"><strong>Colonia:</strong> '; 
			
			
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
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF" colspan=3 align=middle>
			<input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript: window.location=\'mainframe.php?module=detail_seguimiento&id='.$_GET[id].'\';"/>
			</td>
		    </tr>
	    </table>';
?>