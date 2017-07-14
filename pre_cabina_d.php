<?php 	
isset($_POST['servicio']) ? $servicio = $_POST['servicio'] : $servicio  = "";
isset($_POST['idcliente']) ? $idcliente= $_POST['idcliente'] : $idcliente= "";
isset($_POST['clave']) ? $clave= $_POST['clave'] : $clave= "";
isset($_POST['tipo_expediente']) ? $tipo_expediente= $_POST['tipo_expediente'] : $tipo_expediente= "";
isset($_POST['nix']) ? $nix= $_POST['nix'] : $nix= "";
isset($_POST['fecha_recepcion']) ? $fecha_recepcion= $_POST['fecha_recepcion'] : $fecha_recepcion= "";
isset($_POST['tipo_expediente']) ? $tipo_expediente= $_POST['tipo_expediente'] : $tipo_expediente= "";
isset($_POST['hora1']) ? $hora1= $_POST['hora1'] : $hora1= "";
isset($_POST['num_contrato']) ? $num_contrato= $_POST['num_contrato'] : $num_contrato= "";
isset($_POST['reporta']) ? $reporta= $_POST['reporta'] : $reporta= "";
isset($_POST['tel_reporta']) ? $tel_reporta= $_POST['tel_reporta'] : $tel_reporta= "";
isset($_POST['fecha1']) ? $fecha1= $_POST['fecha1'] : $fecha1= "0000-00-00";
isset($_POST['expediente']) ? $expediente= $_POST['expediente'] : $expediente= "";
isset($_POST['cliente']) ? $cliente= $_POST['cliente'] : $cliente= "";
isset($_POST['num_contrato']) ? $num_contrato= $_POST['num_contrato'] : $num_contrato= "";
isset($_POST['usuario']) ? $usuario= $_POST['usuario'] : $usuario= "";
isset($_POST['motivo']) ? $motivo= $_POST['motivo'] : $motivo= "";
isset($_POST['domicilio']) ? $domicilio= $_POST['domicilio'] : $domicilio= "";
isset($_POST['estado']) ? $estado= $_POST['estado'] : $estado= "";
isset($_POST['municipio']) ? $municipio= $_POST['municipio'] : $municipio= "";
isset($_POST['num_contrato']) ? $num_contrato= $_POST['num_contrato'] : $num_contrato= "";
isset($_POST['colonia']) ? $colonia= $_POST['colonia'] : $colonia= "";
isset($_POST['ciudad']) ? $ciudad= $_POST['ciudad'] : $ciudad= "";
isset($_POST['marca']) ? $marca= $_POST['marca'] : $marca= "";
isset($_POST['tipo']) ? $tipo= $_POST['tipo'] : $tipo= "";
isset($_POST['modelo']) ? $modelo= $_POST['modelo'] : $modelo= "";
isset($_POST['color']) ? $color= $_POST['color'] : $color= "";
isset($_POST['placas']) ? $placas= $_POST['placas'] : $placas= "";
isset($_POST['color']) ? $color= $_POST['color'] : $color= "";
isset($_POST['costo']) ? $costo= $_POST['costo'] : $costo= "";
isset($_POST['capturalegal']) ? $capturalegal= $_POST['capturalegal'] : $capturalegal= "";

//where it come from?
isset($_POST['fecha_compra']) ? $fecha_compra= $_POST['fecha_compra'] : $fecha_compra= "0000-00-00";
isset($_POST['fecha_vuelo']) ? $fecha_vuelo= $_POST['fecha_vuelo'] : $fecha_vuelo= "0000-00-00";
isset($_POST['fecha_respuesta']) ? $fecha_respuesta= $_POST['fecha_respuesta'] : $fecha_respuesta= "0000-00-00";




isset($_GET['clave']) ? $clave= $_GET['clave'] : $clave= "";
isset($_GET['idcliente']) ? $idcliente= $_GET['idcliente'] : $idcliente= "";
isset($_GET['servicio']) ? $servicio= $_GET['servicio'] : $servicio= "";
isset($_GET['expediente']) ? $expediente= $_GET['expediente'] : $expediente= "";




##################------------------
if(isset($zauruz) && $zauruz=="irix")
{

	##startcomprobacion
	$link = mysqli_connect($host,$username,$pass,$database);
	$result=mysqli_query($link,"select * from seguimiento_juridico where general = '$idcaso'");
	$cuantosson=mysqli_num_rows($result);
	mysqli_free_result($result);
	
	if ($cuantosson>0)
	{
		#actualizar registro
		$link = mysqli_connect($host,$username,$pass,$database);
		$sSQL="UPDATE seguimiento_juridico SET situacion_juridica='$situacion_conductor', detencion='$detencion_conductor_ano-$detencion_conductor_mes-$detencion_conductor_dia', liberacion='$liberacion_conductor_ano-$liberacion_conductor_mes-$liberacion_conductor_dia', fianzas='$fianzas_conductor', situacion_vehiculo='$situacion_vehiculo', detencion_vehiculo='$detencion_vehiculo_ano-$detencion_vehiculo_mes-$detencion_vehiculo_dia', liberacion_vehiculo='$liberacion_vehiculo_ano-$liberacion_vehiculo_mes-$liberacion_vehiculo_dia', fianzas_vehiculo='$fianzas_vehiculo', conductor='$conductor', telconductor='$tel1', telconductor2='$tel2', siniestro='$siniestrox', averiguacion='$averiguacion', autoridad='$autoridad', fecha_accidente='$accidente_ano-$accidente_mes-$accidente_dia', numlesionados='$numlesionados', numhomicidios='$numhomicidios', delitos='$delitos', danos='$danos', lesiones='$lesiones', homicidios='$homicidios', ataques='$ataques', robo='$robo', descripcion='$descripcion', lugar_hechos='$lugar_hechos', referencias='$referencias', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', ajustador='$ajustador', telid='$telid', telajustador='$telajustador1', telajustador2='$telajustador2', monto_danos='$monto_danos', monto_deducible='$monto_deducible'where general='$idcaso'";
		mysqli_query($link, $sSQL) or die("Error en:<br><i>$sSQL</i><br><br>Descripci&oacute;n:<br><b>".mysqli_error($link));
	}
	else
	{
		#crear registro
		$link = mysqli_connect($host,$username,$pass,$database);
		$sql="INSERT INTO `seguimiento_juridico` (`general`, `situacion_juridica`, `detencion`, `liberacion`, `fianzas`, `situacion_vehiculo`, `detencion_vehiculo`, `liberacion_vehiculo`, `fianzas_vehiculo`, `conductor`, `telconductor`, `telconductor2`, `siniestro`, `averiguacion`, `autoridad`, `fecha_accidente`, `numlesionados`, `numhomicidios`, `delitos`, `danos`, `lesiones`, `homicidios`, `ataques`, `robo`, `descripcion`, `lugar_hechos`, `referencias`, `colonia`, `ciudad`, `municipio`, `estado`, `ajustador`, `telajustador`, `telajustador2`, `monto_danos`, `monto_deducible`) VALUES ('$idcaso', '$situacion_conductor', '$detencion_conductor_ano-$detencion_conductor_mes-$detencion_conductor_dia', '$liberacion_conductor_ano-$liberacion_conductor_mes-$liberacion_conductor_dia', '$fianzas_conductor', '$situacion_vehiculo', '$detencion_vehiculo_ano-$detencion_vehiculo_mes-$detencion_vehiculo_dia', '$liberacion_vehiculo_ano-$liberacion_vehiculo_mes-$liberacion_vehiculo_dia', '$fianzas_vehiculo', '$conductor', '$tel1', '$tel2', '$siniestrox', '$averiguacion', '$autoridad', '$accidente_ano-$accidente_mes-$accidente_dia', '$numlesionados', '$numhomicidios', '$delitos', '$danos', '$lesiones', '$homicidios', '$ataques', '$robo', '$descripcion', '$lugar_hechos', '$referencias', '$colonia', '$ciudad', '$municipio', '$estado', '$ajustador', '$telajustador1', '$telajustador2', '$monto_danos', '$monto_deducible')";
		mysqli_query($link, $sql) or die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<br><b>".mysqli_error($link));	
	}
	##endcomprobacion
	

}
else
{
	$diax=date("d");
	$mex=date("m");
	$anox=date("Y");
	
	$fecha_recepcion=explode("-",$fecha_recepcion);
	$fecha_suceso=explode("-",$fecha1);
	$apertura_expediente="$anox-$mex-$diax $hora1";
	
	

	/*
	mysqli_connect($host,$username,$pass,$database);
	mysqli_query($database,"INSERT INTO `general` (`servicio`, `contrato`, `idEmpleado`, `idCliente`, `fecha_recepcion`, `fecha_suceso`, `apertura_expediente`, `reporta`, `tel_reporta`, `num_contrato`, `convenio`, `expediente`, `num_cliente`, `num_siniestro`, `inciso`, `ajustador`, `usuario`, `tecnico_solicitado`, `motivo_servicio`, `auto_marca`, `auto_tipo`, `auto_modelo`, `auto_color`, `auto_placas`, `tipo_asistencia_vial`, `tipo_asistencia_medica`, `domicilio_cliente`, `domicilio_sustituto`, `ubicacion_requiere`, `ubicacion_referencias`, `ubicacion_estado`, `ubicacion_municipio`, `ubicacion_colonia`,  `ubicacion_ciudad`, `destino_servicio`, `destino_estado`, `destino_municipio`, `destino_colonia`, `destino_ciudad`, `formato_carta`, `instructivo`, `status`) VALUES ('$servicio', '$clave', '$valid_userid', '$idcliente', '$fecha_recepcion[2]-$fecha_recepcion[1]-$fecha_recepcion[0] $hora1', '$fecha_suceso[2]-$fecha_suceso[1]-$fecha_suceso[0]', '$fecha_recepcion[2]-$fecha_recepcion[1]-$fecha_recepcion[0] $hora1', '$reporta', '$tel_reporta', '$num_contrato', '$convenio', '$expediente', '$cliente', '$siniestro', '$inciso', '$ajustador', '$usuario', '$tecnico', '$motivo', '$marca', '$tipo', '$modelo', '$color', '$placas', '$tipo_vial', '$tipo_medica', '$domicilio', '$domicilio_sustituto', '$ubicacion', '$referencias', '$estado', '$municipio', '$colonia', '$ciudad', '$destino', '$estado2', '$municipio2', '$colonia2', '$ciudad2', '$formato_carta', '$ventana', 'en proceso')");
	*/
	
	$link = mysqli_connect($host,$username,$pass,$database);
	$sSQL="UPDATE general SET
	       idEmpleado='$valid_userid',
		   tipo_expediente='$tipo_expediente',
		   fecha_recepcion='$fecha_recepcion[2]-$fecha_recepcion[1]-$fecha_recepcion[0] $hora1',
		   fecha_suceso='$fecha_suceso[2]-$fecha_suceso[1]-$fecha_suceso[0]',
		   apertura_expediente=now(),
		   reporta='$reporta',
		   tel_reporta='$tel_reporta',
		   num_contrato='$num_contrato',
		   convenio='$convenio',
		   expediente='$expediente',
		   num_cliente='$cliente',
		   num_siniestro='$siniestro',
		   inciso='$inciso',
		   usuario='$usuario',
		   reporte_cliente='$reporte_cliente',
		   tecnico_solicitado='$tecnico',
		   motivo_servicio='$motivo',
		   auto_marca='$marca',
		   auto_tipo='$tipo',
		   auto_modelo='$modelo',
		   auto_color='$color',
		   auto_placas='$placas',
		   tipo_asistencia_vial='$tipo_vial',
		   tipo_asistencia_medica='$tipo_medica',
		   domicilio_cliente='$domicilio',
		   domicilio_sustituto='$domicilio_sustituto',
		   ubicacion_requiere='$ubicacion',
		   ubicacion_estado='$estado',
		   ubicacion_municipio='$municipio',
		   ubicacion_colonia='$colonia',
		   ubicacion_ciudad='$ciudad',
		   destino_servicio='$destino',
		   destino_estado='$estado2',
		   destino_municipio='$municipio2',
		   destino_colonia='$colonia2',
		   destino_ciudad='$ciudad2',
		   formato_carta='$formato_carta',
		   instructivo='$ventana',
		   costo='$costo',
		   ejecutivo='$ejecutivo',
		   fax='$fax',
		   email='$email',
		   cobertura='$cobertura',
		   pasajero='$pasajero',
		   fecha_compra=CONCAT(SUBSTR('$fecha_compra',7), '-',SUBSTR('$fecha_compra',4, 2), '-',SUBSTR('$fecha_compra',1, 2)),
		   codigo_reserva='$codigo_reserva',
		   vuelo='$vuelo',
		   fecha_vuelo=CONCAT(SUBSTR('$fecha_vuelo',7), '-',SUBSTR('$fecha_vuelo',4, 2), '-',SUBSTR('$fecha_vuelo',1, 2)),
		   origen_ciudad='$origen_ciudad',
		   destino_ciudad_v='$destino_ciudad_v',
		   fecha_respuesta=CONCAT(SUBSTR('$fecha_respuesta',7), '-',SUBSTR('$fecha_respuesta',4, 2), '-',SUBSTR('$fecha_respuesta',1, 2)),
		   motivo_servicio_v='$motivo_servicio_v',
		   telefono_v='$telefono_v',
		   fax_v='$fax_v',
		   email_v='$email_v',
		   ultimoseguimiento=now()
		   where id='$expediente' AND contrato='$clave'";
	mysqli_query($link, $sSQL)  or die("Error en:<br><i>$sSQL</i><br><br>Descripci&oacute;n:<br><b>".mysqli_error($link) . var_dump(extract($_POST)));
	//echo "Query:<br><br>$sSQL<br>";

	/*
	if(isset($costo) && $costo!=""){
	##########
	$iva=$costo*0.15;
	$total=$iva+$costo;
	mysqli_connect($host,$username,$pass,$database);
	mysqli_query($database,"INSERT INTO `pagos` ( `proveedor`, `conceptor`, `monto`, `status`) 
	VALUES ('$proveedor', '$conceptor', '$monto', '$status')");
	header("Location: mainframe.php?module=$module&code=1");
	}
	###########
	}
	*/

	if($aseg_vigencia_inicio_ano == '')
		$aseg_vigencia_inicio_ano='0000';
	if($aseg_vigencia_inicio_mes == '')
		$aseg_vigencia_inicio_mes='00';
	if($aseg_vigencia_inicio_dia == '')
		$aseg_vigencia_inicio_dia='00';
	if($aseg_vigencia_termino_ano == '')
		$aseg_vigencia_termino_ano='0000';
	if($aseg_vigencia_termino_mes == '')
		$aseg_vigencia_termino_mes='00';
	if($aseg_vigencia_termino_dia == '')
		$aseg_vigencia_termino_dia='00';
	if($monto == '')
		$monto='0';	
	$link = mysqli_connect($host,$username,$pass,$database);
	$sSQL="UPDATE general SET
	       ajustador='$ajustador',
		   telid='$telid',
		   aseguradora='$aseguradora',
		   aseg_poliza='$aseg_poliza',
		   aseg_inciso='$aseg_inciso',
		   aseg_vigencia_inicio='$aseg_vigencia_inicio_ano-$aseg_vigencia_inicio_mes-$aseg_vigencia_inicio_dia',
		   aseg_vigencia_termino='$aseg_vigencia_termino_ano-$aseg_vigencia_termino_mes-$aseg_vigencia_termino_dia',
		   aseg_cobertura='$cobertura',
		   aseg_monto='$monto',
		   asegurado='$asegurado',
		   asegurado_y_o='$aseg_y_o',
		   aseg_tel1='$aseg_tel1',
		   aseg_tel2='$aseg_tel2',
		   aseg_domicilio='$aseg_domicilio',
		   aseg_cp='$aseg_cp',
		   aseg_estado='$aseg_estado',
		   aseg_municipio='$aseg_municipio',
		   aseg_colonia='$aseg_colonia',
		   aseg_ciudad='$aseg_ciudad',
		   aseg_conductor='$aseg_conductor',
		   aseg_conductor_tel1='$aseg_conductor_tel1',
		   aseg_conductor_tel2='$aseg_conductor_tel2'
		   where id='$expediente'
		   AND contrato='$clave'";
	mysqli_query($link, $sSQL)  or die("Error en:<br><i>$sSQL</i><br><br>Descripci&oacute;n:<br><b>".mysqli_error($link));

	#$idcaso=mysql_insert_id();  
	$idcaso=$expediente;
	$estadox=$estado2;
	$municipiox=$municipio2;
}
?>
<style type="text/css">
<!--
.style1 {	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript"> 
function confirmcancel(delUrl) { 
if (confirm('Desea cancelar el servicio?')) { 
document.location = delUrl; 
}
}
</script>
<script type="text/javascript" src="proveedores/subcombo.js"></script>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td height="44" align="left"><span class="maintitle">Cabina</span></td>
  </tr>
  <tr>
    <td  align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">
        <table width="100%%" border="0" cellpadding="3" cellspacing="3">

          <tr>
            <td bgcolor="#999999" colspan=6><span class="style1">Servicio Registrado 
              
                
            </span></td>
          </tr>
<?php 
#########################parte legal
#=======		  ##############################===================
if($capturalegal=="six"){
echo'          <tr>
            <td bgcolor="#CCCCCC" colspan=6>El servicio ha sido registrado. Debido a que se trata de un servicio legal, se requiere que llene los siguientes campos </td>
          </tr>
		  <form name="xder" action="mainframe.php?module=pre_cabina_d&clave='.$clave.'&idcliente='.$idcliente.'&servicio='.$servicio.'&zauruz=irix&idcaso='.$idcaso.'" method="post">
<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n Legal del Caso</span></td></tr>

<tr>
 <td bgcolor="#cccccc"><strong>Situaci&oacute;n del conductor:</strong></td>
            <td bgcolor="#cccccc"><select name="situacion_conductor" id="situacion_conductor">';
		
echo'<option value="detenido"'; 
if($situacion_conductor=="detenido"){ echo' selected ';}
echo'>Detenido</option>';		

echo'<option value="liberado"'; 
if($situacion_conductor=="liberado"){ echo' selected ';}
echo'>Liberado</option>';		

echo'<option value="nunca detenido"'; 
if($situacion_conductor=="nunca detenido"){ echo' selected ';}
echo'>Nunca detenido</option>';		
		
#			<input name="situacion_conductor" id="situacion_conductor" type="text" size="30" value="'.$situacion_conductor.'"/>
#			<input name="situacion_conductor" id="situacion_conductor" type="text" size="20" value="'.$situacion_conductor.'"/>
			
			echo'</select>
			

			
			
			
			</td>
            <td bgcolor="#cccccc"><strong>Detenci&oacute;n:</strong></td>
            <td bgcolor="#cccccc"><select name="detencion_conductor_dia" id="detencion_conductor_dia">';
if(empty($detencion[2])){$detencion[2]=date("j");}
if(empty($detencion[1])){$detencion[1]=date("m");}			
if(empty($detencion[0])){$detencion[0]=date("Y");}

if(empty($liberacion[2])){$liberacion[2]=date("j");}
if(empty($liberacion[1])){$liberacion[1]=date("m");}			
if(empty($liberacion[0])){$liberacion[0]=date("Y");}


if(empty($detencion_vehiculo[2])){$detencion_vehiculo[2]=date("j");}
if(empty($detencion_vehiculo[1])){$detencion_vehiculo[1]=date("m");}			
if(empty($detencion_vehiculo[0])){$detencion_vehiculo[0]=date("Y");}

if(empty($liberacion_vehiculo[2])){$liberacion_vehiculo[2]=date("j");}
if(empty($liberacion_vehiculo[1])){$liberacion_vehiculo[1]=date("m");}			
if(empty($liberacion_vehiculo[0])){$liberacion_vehiculo[0]=date("Y");}


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
            <td  bgcolor="#cccccc"><strong>Liberaci&oacute;n:</strong></td>
            <td bgcolor="#cccccc"><select name="liberacion_conductor_dia" id="liberacion_conductor_dia">';

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
            <td bgcolor="#cccccc"><strong>Fianzas y/o causi&oacute;n:</strong></td>
            <td colspan="5" bgcolor="#cccccc"><textarea name="fianzas_conductor" id="fianzas_conductor" cols="100" rows="5">'.$fianzas.'</textarea></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Situaci&oacute;n del veh&iacute;culo: </strong></td>
            <td bgcolor="#cccccc"><select name="situacion_vehiculo" id="situacion_vehiculo">';
			
#			<input name="situacion_vehiculo" id="situacion_vehiculo" type="text" size="30" value="'.$situacion_vehiculo.'"/>
#			<input name="situacion_vehiculo" id="situacion_vehiculo" type="text" size="20" value="'.$situacion_vehiculo.'"/>

echo'<option value="detenido"'; 
if($situacion_vehiculo=="detenido"){ echo' selected ';}
echo'>Detenido</option>';		

echo'<option value="liberado"'; 
if($situacion_vehiculo=="liberado"){ echo' selected ';}
echo'>Liberado</option>';		

echo'<option value="nunca detenido"'; 
if($situacion_vehiculo=="nunca detenido"){ echo' selected ';}
echo'>Nunca detenido</option>';		
			
			echo'</select>
			
			

			
			
			
			</td>
            <td bgcolor="#cccccc"><strong>Detenci&oacute;n:</strong></td>
            <td bgcolor="#cccccc"><select name="detencion_vehiculo_dia" id="detencion_vehiculo_dia">';


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
            <td bgcolor="#cccccc"><strong>Liberaci&oacute;n:</strong></td>
            <td bgcolor="#cccccc"><select name="liberacion_vehiculo_dia" id="liberacion_vehiculo_dia">';
			
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
            <td bgcolor="#cccccc"><strong>Fianzas y/o causi&oacute;n:</strong></td>
            <td colspan="5" bgcolor="#cccccc"><textarea name="fianzas_vehiculo" id="fianzas_vehiculo" cols="100" rows="5">'.$fianzas_vehiculo.'</textarea></td>
          </tr>';
		  

echo' <tr>
            <td  bgcolor="#cccccc"><strong>Conductor:</strong></td>
            <td bgcolor="#cccccc"><input name="conductor" type="text" id="conductor" size="20" value="'.$conductor.'"/></td>
            <td  bgcolor="#cccccc"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#cccccc"><input name="tel1" type="text" id="tel1" size="20" value="'.$telconductor1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td  bgcolor="#cccccc"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#cccccc"><input name="tel2" type="text" id="tel2" size="20" value="'.$telconductor2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Siniestro:</strong></td>
            <td bgcolor="#cccccc"><input name="siniestrox" type="text" id="siniestrox" size="20" value="'.$siniestro.'"/></td>
            <td bgcolor="#cccccc"><strong>Averiguaci&oacute;n previa: </strong></td>
            <td bgcolor="#cccccc"><input name="averiguacion" type="text" id="averiguacion" size="20" value="'.$averiguacion.'"/></td>
            <td bgcolor="#cccccc"><strong>Autoridad:</strong></td>
            <td bgcolor="#cccccc">
			<select name="autoridad" id="autoridad">';
			
#			<input name="autoridad" type="text" id="autoridad" size="30" value="'.$autoridad.'"/>
#			<input name="autoridad" type="text" id="autoridad" size="20" value="'.$autoridad.'"/>

echo'<option value="M.P. Local"'; 
if($autoridad=="M.P. Local"){ echo' selected ';}
echo'>M.P. Local</option>';		

echo'<option value="M.P. Federal"'; 
if($autoridad=="M.P. Federal"){ echo' selected ';}
echo'>M.P. Federal</option>';		
			
			echo'</select>
			

			
			</td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Fecha del accidente: </strong></td>
            <td bgcolor="#cccccc">';
if(empty($accidente_fecha[2])){$accidente_fecha[2]=date("j");}
if(empty($accidente_fecha[1])){$accidente_fecha[1]=date("m");}
if(empty($accidente_fecha[0])){$accidente_fecha[0]=date("Y");}
			
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
            <td bgcolor="#cccccc"><strong>N&uacute;mero de lesionados: </strong></td>
            <td bgcolor="#cccccc"><input name="numlesionados" type="text" id="numlesionados" size="20" value="'.$numlesionados.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#cccccc"><strong>N&uacute;mero de homicidios: </strong></td>
            <td bgcolor="#cccccc"><input name="numhomicidios" type="text" id="numhomicidios" value="'.$numhomicidios.'" size="20" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#cccccc"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td align=middle><strong>Delitos: 
				  <select name="delitos" id="delitos">
				  <option value="no"'; 
				  if($delitos=="no"){echo' selected ';}
				  echo'>No</option>
				  <option value="si"'; 
				  if($delitos=="si"){echo' selected ';}
				  echo'>Si</option>				  
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
				  echo'>Si</option>				  
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
				  echo'>Si</option>				  
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
				  echo'>Si</option>				  
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
				  echo'>Si</option>				  
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
				  echo'>Si</option>				  
				  </select>
				  
				 
				 </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Descripci&oacute;n:</td>
			            <td colspan="5" bgcolor="#cccccc">
            <textarea name="descripcion" cols="100" rows="5" id="descripcion">'.$descripcion.'</textarea>
            </strong></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Lugar de los hechos: </strong></td>
            <td bgcolor="#cccccc"><input name="lugar_hechos" type="text" id="lugar_hechos" size="20"  value="'.$lugar_hechos.'"/></td>
            <td bgcolor="#cccccc"><strong>Referencias:</strong></td>
            <td bgcolor="#cccccc"><input name="referencias" type="text" id="referencias" size="20"  value="'.$referencias.'"/></td>
            <td bgcolor="#cccccc"><strong>Estado:</strong></td>
            <td bgcolor="#cccccc"><select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'>
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
            <td bgcolor="#cccccc"><strong>Municipio:</strong></td>
            <td bgcolor="#cccccc">'; 
	
			
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
            <td bgcolor="#cccccc"><strong>Colonia:</strong></td>
            <td bgcolor="#cccccc">'; 
			
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
            <td bgcolor="#cccccc"><strong>Ciudad:</strong></td>
            <td bgcolor="#cccccc"><input name="ciudad" type="text" id="ciudad" size="20"  value="'.$ciudad.'"/></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Ajustador:</strong></td>
            <td bgcolor="#cccccc"><input name="ajustador" type="text" id="ajustador" size="20"  value="'.$ajustador.'"/></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#cccccc"><input name="telajustador1" type="text" id="telajustador1" size="20"  value="'.$telajustador1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#cccccc"><input name="telajustador2" type="text" id="telajustador2" size="20"  value="'.$telajustador2.'" onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Monto da&ntilde;os: </strong></td>
            <td bgcolor="#cccccc"><b>$</b> <input name="monto_danos" type="text" id="monto_danos" size="18" value="'.$monto_danos.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#cccccc"><strong>Monto Deducible: </strong></td>
            <td bgcolor="#cccccc"><b>$</b> <input name="monto_deducible" type="text" id="monto_deducible" size="18" value="'.$monto_deducible.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td align="right" bgcolor="#cccccc">&nbsp;</td>
            <td align="right" bgcolor="#cccccc">&nbsp;</td>
          </tr>
		  <tr><td align="center" bgcolor="#CCCCCC" colspan=6> <input type="submit" name="button" id="button" value="E N V I A R" /> &nbsp;
              <input type="button" name="button2" id="button2" value="C A N C E L A R   S E R V I C I O" onClick="javascript:confirmcancel(\'process.php?module=cabina_d&accela=cancelar&idcaso='.$idcaso.'\');" onMouseover="window.status=\'\'; return true;"/></td></tr>
		  </form>';
}

else{echo'<tr>
            <td align="center" bgcolor="#CCCCCC" colspan=6><input type="button" name="Button" value="A S I G N A R   P R O V E E D O R" onClick="location.href=\'?module=cabina_d&idcaso='.$idcaso.'\'"/>
              &nbsp;
              <input type="button" name="button2" id="button2" value="C A N C E L A R   S E R V I C I O" onClick="javascript:confirmcancel(\'process.php?module=cabina_d&accela=cancelar&idcaso='.$idcaso.'\');" onMouseover="window.status=\'\'; return true;"/></td>
          </tr>';}	 

?>
          
        </table>

    </td>
  </tr>
</table>
