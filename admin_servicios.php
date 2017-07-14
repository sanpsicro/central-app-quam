<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
<!--
function SetAllCheckBoxesa(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < 13; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function SetAllCheckBoxes(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 13; i < 31; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function SetAllCheckBoxesb(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 31; i < 36; i++)
			objCheckBoxes[i].checked = CheckValue;
}
// -->

</script>
<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Servicios</span></td><td width=150 class="blacklinks">
      
      
 <?php  
 
 
 isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null;
 isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
 
 $checa_array1=array_search("2_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_servicios&accela=new">Nuevo Servicio</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php 

			

			if($accela=="new"){echo'Dar de alta Servicio';
			
			$camposex = ["",""];
			isset($_POST['servicio']) ? $servicio = $_GET['servicio'] : $servicio = "";
			$tipo="";
			}

			else{echo'Editar Servicio';
          


			}

			?>



</td>







            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=servicios"><td align="right" class="questtitle">B&uacutesqueda: 



              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td bgcolor="#eeeeee">



<table border=0 width=100% cellpadding=0 cellspacing=0>

  <tr> 

    <td valign="top" bgcolor="#eeeeee"><table width="100%" border="0" cellspacing="5" cellpadding="5">

        <tr> 

          <td><table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">

              <tr> 

                <td valign="top"> <div align="center">



<?php 
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


if($accela=="edit" && isset($id)){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from servicios where id = '$id'");

$servicio=mysqli_result($result,0,"servicio");
$tipo=mysqli_result($result,0,"tipo");
$campos=mysqli_result($result,0,"campos");
$camposex=explode(",",$campos);
}



echo'<form name="frm" method="post" action="process.php?module=servicios&accela='.$accela.'&id='.$id.'">';    

?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Servicio:</strong></td>

        <td bgcolor="#cccccc"><input name="servicio" type="text" id="servicio" size="30"value="<?php echo"$servicio";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#cccccc"><strong>Tipo:</strong></td>
        <td bgcolor="#cccccc"><select name="tipo" id="tipo">
          <option value="no legal" <?php if($tipo=="no legal"){echo' selected ';} ?>>No legal</option>
          <option value="legal" <?php if($tipo=="legal"){echo' selected ';} ?>>Legal</option>
        </select>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top" bgcolor="#cccccc"><strong>Bloques:</strong></td>
        <td bgcolor="#cccccc">
		<!-- 
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_caso" <?php $checa_array=array_search("informacion_caso",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>  <strong>Informaci&oacute;n del caso</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="detalles_servicio" <?php $checa_array=array_search("detalles_servicio",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>  <strong>Detalles del servicio</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_vehiculo" <?php $checa_array=array_search("informacion_vehiculo",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>  
              <strong>Informaci&oacute;n del veh&iacute;culo</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_poliza" <?php $checa_array=array_search("informacion_poliza",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>  
              <strong>Informaci&oacute;n de la p&oacute;liza</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_legal" <?php $checa_array=array_search("informacion_legal",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>  <strong>Informaci&oacute;n legal del caso</strong></td>
            <td bgcolor="#eeeeee">&nbsp;</td>
            <td bgcolor="#eeeeee">&nbsp;</td>
            <td bgcolor="#eeeeee">&nbsp;</td>
          </tr>
        </table>-->
		<br />
		<table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>
            <td colspan="4" bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><span class="style1">Informaci&oacute;n del caso</span></td>
                <td align="right"><b><a href="javascript:SetAllCheckBoxesa('frm', 'servicios[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesa('frm', 'servicios[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
              </tr>
            </table>              </td>
            </tr>
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="fecha_recepcion" <?php $checa_array=array_search("fecha_recepcion",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha de recepci&oacute;n </strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="hora_apertura" <?php $checa_array=array_search("hora_apertura",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Hora de apertura de expediente</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="num_contrato" <?php $checa_array=array_search("num_contrato",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de contrato</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="reporta" <?php $checa_array=array_search("reporta",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre de quien Reporta</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="tel_reporta" <?php $checa_array=array_search("tel_reporta",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tel. de Contacto</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="fecha_suceso" <?php $checa_array=array_search("fecha_suceso",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha del suceso </strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="convenio" <?php $checa_array=array_search("convenio",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong> N&uacute;mero de convenio</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="expediente" <?php $checa_array=array_search("expediente",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de Expediente</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="num_cliente" <?php $checa_array=array_search("num_cliente",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre del cliente</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="num_siniestro" <?php $checa_array=array_search("num_siniestro",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de siniestro</strong> </td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="inciso" <?php $checa_array=array_search("inciso",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Inciso</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="usuario" <?php $checa_array=array_search("usuario",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre del Usuario</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><strong>
              <input name="servicios[]" type="checkbox" id="servicios[]" value="reporte_cliente" <?php $checa_array=array_search("reporte_cliente",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
No. de Control</strong></td>
            <td bgcolor="#eeeeee"><strong>
              <input name="servicios[]" type="checkbox" id="servicios[]" value="ejecutivo" <?php $checa_array=array_search("ejecutivo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
Ejecutivo</strong></td>
            <td bgcolor="#eeeeee">
				<strong>
              <input name="servicios[]" type="checkbox" id="servicios[]" value="fax" <?php $checa_array=array_search("fax",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
Fax</strong>
			</td>
            <td bgcolor="#eeeeee">
				<strong>
              <input name="servicios[]" type="checkbox" id="servicios[]" value="email" <?php $checa_array=array_search("email",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
E-Mail</strong>
			</td>
          </tr>
		  <tr>
		  	<td bgcolor="#eeeeee">
				<strong>
              <input name="servicios[]" type="checkbox" id="servicios[]" value="cobertura" <?php $checa_array=array_search("cobertura",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
Cobertura</strong>
			</td>
			<td bgcolor="#eeeeee">&nbsp;</td>
			<td bgcolor="#eeeeee">&nbsp;</td>
			<td bgcolor="#eeeeee">&nbsp;</td>
		  </tr>
        </table>
		<br /><div id=minakator>
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td colspan="4" bgcolor="#666666"><span class="style1">
             
              </span>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><span class="style1">Detalles del servicio </span></td>
                  <td align="right"><b><a href="javascript:SetAllCheckBoxes('frm', 'servicios[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxes('frm', 'servicios[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table>
              </td>
          </tr>
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="tecnico_solicitado" <?php $checa_array=array_search("tecnico_solicitado",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>T&eacute;cnico Solicitado</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="motivo_servicio" <?php $checa_array=array_search("motivo_servicio",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Motivo del servicio</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="ubicacion_requiere" <?php $checa_array=array_search("ubicacion_requiere",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n y referencias donde se requiere el servicio </strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="tipo_asistencia_vial" <?php $checa_array=array_search("tipo_asistencia_vial",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de asistencia vial</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="tipo_asistencia_medica" <?php $checa_array=array_search("tipo_asistencia_medica",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de asistencia m&eacute;dica</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="domicilio_cliente" <?php $checa_array=array_search("domicilio_cliente",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Domicilio del cliente</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="domicilio_sustituto" <?php $checa_array=array_search("domicilio_sustituto",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Domicilio donde recoger&aacute; auto sustituto</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="ubicacion_estado" <?php $checa_array=array_search("ubicacion_estado",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n estado</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="ubicacion_municipio" <?php $checa_array=array_search("ubicacion_municipio",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n municipio</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="ubicacion_colonia" <?php $checa_array=array_search("ubicacion_colonia",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n colonia</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="ubicacion_ciudad" <?php $checa_array=array_search("ubicacion_ciudad",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n ciudad</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_servicio" <?php $checa_array=array_search("destino_servicio",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino servicio</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_estado" <?php $checa_array=array_search("destino_estado",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino estado</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_municipio" <?php $checa_array=array_search("destino_municipio",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino municipio</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_colonia" <?php $checa_array=array_search("destino_colonia",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino Colonia</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_ciudad" <?php $checa_array=array_search("destino_ciudad",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino Ciudad</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="formato_carta" <?php $checa_array=array_search("formato_carta",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Formato de carta de auto sustituto </strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="instructivo" <?php $checa_array=array_search("instructivo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ventana con Instructivo para usuario auto sustituto </strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="observaciones" <?php $checa_array=array_search("observaciones",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Observaciones</strong></td>
            <td bgcolor="#eeeeee">&nbsp;</td>
          </tr>
        </table></div>
		<br />
		<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td colspan="4" bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><span class="style1">Informaci&oacute;n del veh&iacute;culo</span> </td>
                  <td align="right"><b><a href="javascript:SetAllCheckBoxesb('frm', 'servicios[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesb('frm', 'servicios[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table></td>
            </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="auto_marca" <?php $checa_array=array_search("auto_marca",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Marca del auto</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="auto_tipo" <?php $checa_array=array_search("auto_tipo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de auto</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="auto_modelo" <?php $checa_array=array_search("auto_modelo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Modelo del auto</strong></td>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="auto_color" <?php $checa_array=array_search("auto_color",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/> <strong>Color del auto</strong> </td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="auto_placas" <?php $checa_array=array_search("auto_placas",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Placas del auto</strong></td>
            <td bgcolor="#eeeeee">&nbsp;</td>
            <td bgcolor="#eeeeee">&nbsp;</td>
            <td bgcolor="#eeeeee">&nbsp;</td>
          </tr>
        </table>		
		<br />
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
            	<td bgcolor="#666666" colspan="4"><span class="style1">Informaci&oacute;n del vuelo</span></td>
            </tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="pasajero" <?php $checa_array=array_search("pasajero",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Pasajero</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="fecha_compra" <?php $checa_array=array_search("fecha_compra",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha de Compra</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="codigo_reserva" <?php $checa_array=array_search("codigo_reserva",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>C&oacute;digo de Reserva</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="vuelo" <?php $checa_array=array_search("vuelo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Vuelo</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="fecha_vuelo" <?php $checa_array=array_search("fecha_vuelo",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Fecha de Vuelo</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="origen_ciudad" <?php $checa_array=array_search("origen_ciudad",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Or&iacute;gen Ciudad</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="destino_ciudad_v" <?php $checa_array=array_search("destino_ciudad_v",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Ciudad de Destino</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="fecha_respuesta" <?php $checa_array=array_search("fecha_respuesta",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Fecha de Respuesta</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="motivo_servicio_v" <?php $checa_array=array_search("motivo_servicio_v",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Motivo del Servicio</strong></td>
			  <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="telefono_v" <?php $checa_array=array_search("telefono_v",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Tel. de Contacto</strong></td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="servicios[]" type="checkbox" id="servicios[]" value="fax_v" <?php $checa_array=array_search("fax_v",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
Fax</strong> </td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="servicios[]" type="checkbox" id="servicios[]" value="email_v" <?php $checa_array=array_search("email_v",$camposex);
if($checa_array===FALSE){} else{echo ' checked';}
 ?>/>
E-Mail</strong> </td>
			</tr>
		</table>
		<br>
		<!--<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
            	<td bgcolor="#666666" colspan="4"><span class="style1">Bitacora de Observaciones</span></td>
            </tr>
		</table>
		<br>-->
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
            	<td bgcolor="#666666" colspan="4"><span class="style1">Documentaci&oacute;n de la Reclamaci&oacute;n</span></td>
            </tr>			
            <tr>
            	<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_recla" <?php $checa_array=array_search("informacion_recla",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>
	              <strong>Documentaci&oacute;n de la reclamaci&oacute;n</strong></td>
            </tr>
		</table>
		<br>
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
            	<td bgcolor="#666666" colspan="4"><span class="style1">Archivos Adjuntos</span></td>
            </tr>			
            <tr>
            	<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="tieneatt" <?php $checa_array=array_search("tieneatt",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>
	              <strong>Incluir archivos adjuntos</strong></td>
            </tr>
		</table>
		<br>        
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
			<tr>
            	<td bgcolor="#666666" colspan="4"><span class="style1">Administrador de Pago</span></td>
            </tr>
			<tr>
            	<td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="info_pagos" <?php $checa_array=array_search("info_pagos",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>
	              <strong>Informaci&oacute;n de los pagos</strong></td>
            </tr>
		</table>
		<br>
		<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Informaci&oacute;n de la p&oacute;liza</span></td>
          </tr>

          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_poliza" <?php $checa_array=array_search("informacion_poliza",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>
              <strong>Informaci&oacute;n de la p&oacute;liza</strong></td>
            </tr>
        </table>
		<br />
		<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Informaci&oacute;n legal del caso</span></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="servicios[]" type="checkbox" id="servicios[]" value="informacion_legal" <?php $checa_array=array_search("informacion_legal",$camposex);if($checa_array===FALSE){} else{echo ' checked';} ?>/>
              <strong>Informaci&oacute;n legal del caso</strong></td>
          </tr>
        </table></td>
      </tr>

      

    </table>      </td>
    </tr>

  <tr>

    <td align="center" valign="top"><input type="submit" name="Submit" value="Guardar" />
     &nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" /></td>
    </tr>


</table>

                  </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>