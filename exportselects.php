<?php 
session_start();
$tablax = $_POST['tablax'];
$explota_modular=explode(",",$_SESSION["valid_modulos"]);

?> 

<form name="form1" method="post" action="mainframe.php?module=exportacion">
<table border="0" cellspacing="3" cellpadding="3" width=100%>
  <tr>
    <td>
<?php  
if(empty($tablax))
{
	?>


        <select name="tablax" id="tablax" onChange="FAjax('export_combo.php?&flim-flam=new Date().getTime()','dry','tablax='+document.getElementById('tablax').value,'POST')" >

<option value="">Seleccione un m&oacute;dulo</option>              


 
<?php   $checa_arrayo1=array_search("expusuarios",$explota_modular);
if($checa_arrayo1===FALSE){} else{echo'
<option value="Empleado" ';
if($tablax=="Empleado"){echo"selected";}
echo '>Usuarios</option>';} ?>

 
 <?php   $checa_arrayo2=array_search("expclientes",$explota_modular);
if($checa_arrayo2===FALSE){} else{echo'
<option value="Cliente" ';
if($tablax=="Cliente"){echo"selected";}
echo '>Clientes</option>';} ?>


<?php   $checa_arrayo3=array_search("expcontratos",$explota_modular);
if($checa_arrayo3===FALSE){} else{echo'
<option value="Poliza" ';
if($tablax=="Poliza"){echo"selected";}
echo '>Contratos</option>';} ?>


<?php   $checa_arrayo4=array_search("expvalidaciones",$explota_modular);
if($checa_arrayo4===FALSE){} else{echo'
<option value="validaciones" ';
if($tablax=="validaciones"){echo"selected";}
echo '>Validaciones</option>';} ?>

<?php   $checa_arrayo5=array_search("expproveedores",$explota_modular);
if($checa_arrayo5===FALSE){} else{echo'
<option value="proveedores" ';
if($tablax=="proveedores"){echo"selected";}
echo '>Proveedores</option>';} ?>

<?php   $checa_arrayo6=array_search("expventas",$explota_modular);
if($checa_arrayo6===FALSE){} else{echo'
<option value="ventas" ';
if($tablax=="ventas"){echo"selected";}
echo '>Ventas</option>';} ?>

<?php   $checa_arrayo7=array_search("expseguimiento",$explota_modular);    
if($checa_arrayo7===FALSE){} else{echo'
<option value="general" ';
if($tablax=="general"){echo"selected";}
echo '>Seguimiento</option>';} ?>

<?php   $checa_arrayo8=array_search("expcpagos",$explota_modular);      
if($checa_arrayo8===FALSE){} else{echo'      
<option value="pagos" ';
if($tablax=="pagos"){echo"selected";}
echo '>Control de Pagos</option>';} ?>

<?php   $checa_arrayo9=array_search("expcobranza",$explota_modular);
if($checa_arrayo9===FALSE){} else{echo'  
<option value="cobranza" ';
if($tablax=="cobranza"){echo"selected";}
echo '>Control de Cobranza</option>';} ?>

<?php   $checa_arrayo10=array_search("expcpc",$explota_modular);
if($checa_arrayo10===FALSE){} else{echo'
<option value="combinado" ';
if($tablax=="combinado"){echo"selected";}
echo '>Control de Pago/Cobranza</option>';} ?>

<?php   $checa_arrayo11=array_search("expevaluaciones",$explota_modular);     
if($checa_arrayo11===FALSE){} else{echo'     
<option value="evaluaciones" ';
if($tablax=="evaluaciones"){echo"selected";}
echo '>Evaluaciones</option>';} ?>         
 
<?php   $checa_arrayo12=array_search("expcomvend",$explota_modular);          
if($checa_arrayo12===FALSE){} else{echo'
<option value="comisiones" ';
if($tablax=="comisiones"){echo"selected";}
echo '>Comisiones de vendedores</option>';} ?>
                    
					
<?php   $checa_arrayo13=array_search("expfacturas",$explota_modular);
if($checa_arrayo13===FALSE){} else{echo'
<option value="facturas" ';
if($tablax=="facturas"){echo"selected";}
echo '>Facturas</option>';} ?>
      
	  
<?php   $checa_arrayo14=array_search("expnotrem",$explota_modular);      
if($checa_arrayo14===FALSE){} else{echo'    
<option value="notas_remision" ';
if($tablax=="notas_remision"){echo"selected";}
echo '>Notas de remisi�n</option>';} ?>
      
</select>

<?php  
}
?>

<?php  
if(!empty($tablax))
{
	?>
 <div><strong>Reporte: 
  <?php  
if($tablax=="Empleado"){echo"Usuarios";} 
if($tablax=="Cliente"){echo"Cliente";} 
if($tablax=="Poliza"){echo"Contratos";}
if($tablax=="validaciones"){echo"Validaciones";}
if($tablax=="proveedores"){echo"Proveedores";}
if($tablax=="ventas"){echo"Ventas";}
if($tablax=="general"){echo"Seguimiento";}
if($tablax=="pagos"){echo"Control de Pagos";}
if($tablax=="cobranza"){echo"Control de Cobranza";}
if($tablax=="combinado"){echo"Control de Pago/Cobranza";}
if($tablax=="evaluaciones"){echo"Evaluaciones";}
if($tablax=="comisiones"){echo"Comisiones de Vendedores";}
if($tablax=="facturas"){echo"Facturas";}
if($tablax=="notas_remision"){echo"Notas de Remision";} 
 ?>
 
 </strong><br />
  
<a href="mainframe.php?module=exportacion">< regresar</a>    
</div>
<input type="hidden" name="tablax" value="<?php  echo $tablax; ?>" />
<?php  
}
?>
             
<?php  

if(!function_exists("existe"))
{
	function existe($cadena,$arreglo)
	{
		return (in_array($cadena,$arreglo)===FALSE?FALSE:TRUE);
	}
}

function checkradioarr($cadena,$arreglo)
{
	if(existe($cadena,$arreglo))
		return "checked";
	return "";
}
function checkradiocomp($cadena,$coincidencia)
{
	if($cadena==$coincidencia)
		return "checked";
	return "";
}
/*
$link = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$link);
$result = mysqli_query($link,"SELECT * FROM $tabla",$link);
$row = mysqli_fetch_assoc($result);
echo "<table border=1><tr>";
if($row) {
	foreach($row as $key => $value) {
		echo "<td>$key</td>";
	}
}
echo "</tr>";
*/
if(!empty($tablax))
{
	echo '<br><input type="button" onClick="SetAllCheckBoxes(\'form1\',\'campos[]\',true)" value="Seleccionar Todos">
		<br><input type="button" onClick="SetAllCheckBoxes(\'form1\',\'campos[]\',false)" value="Seleccionar Ninguno">';
}
echo "</td>";

if($tablax=="Empleado"){
if(isset($_POST['activo']) or isset($_POST['departamento']) or isset($_POST['sort']) or isset($_POST['ascdesc']) ){
$activo = $_POST['activo'];
$departamento = $_POST['departamento'];
$sort = $_POST['sort'];
$ascdesc = $_POST['ascdesc'];
}else{
$activo =null;
$departamento = null;
$sort = null;
$ascdesc = null;

}
if(empty($campos)){$campos=array();}
echo'<td>
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td colspan=5><b>Seleccione las columnas a desplegar:</b></td></tr>
<tr><td width=20% valign=top>
<input name="campos[]" type="checkbox" value="nombre"'; 
$checa_array1=array_search("nombre",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nombre<br>
<input name="campos[]" type="checkbox" value="usuario"'; 
$checa_array1=array_search("usuario",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Usuario<br>
<input name="campos[]" type="checkbox" value="cargo"'; 
$checa_array1=array_search("cargo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Cargo<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="departamento"'; 
$checa_array1=array_search("departamento",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Departamento<br>
<input name="campos[]" type="checkbox" value="activo"'; 
$checa_array1=array_search("activo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Activo<br>
<input name="campos[]" type="checkbox" value="direccion"'; 
$checa_array1=array_search("direccion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Direcci&oacute;n<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="colonia"'; 
$checa_array1=array_search("colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia<br>
<input name="campos[]" type="checkbox" value="municipio"'; 
$checa_array1=array_search("municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio<br>
<input name="campos[]" type="checkbox" value="estado"'; 
$checa_array1=array_search("estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="tel"'; 
$checa_array1=array_search("tel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel&eacute;fono<br>
<input name="campos[]" type="checkbox" value="cel"'; 
$checa_array1=array_search("cel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Celular<br>
<input name="campos[]" type="checkbox" value="nextel"'; 
$checa_array1=array_search("nextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nextel<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="idnextel"'; 
$checa_array1=array_search("idnextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> ID Nextel<br>
<input name="campos[]" type="checkbox" value="mail"'; 
$checa_array1=array_search("mail",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Email<br>
</td>
</tr></table>
</td>
</tr>
<tr>
<td><b>Activo:</b><br><select name="activo" id="activo">
<option value="all"'; 
if($activo=="all"){echo' selected ';}
echo'>Indistinto</option>
<option value="si"'; 
if($activo=="si"){echo' selected ';}
echo'>S�</option>
<option value="no"'; 
if($activo=="no"){echo' selected ';}
echo'>No</option>
</select><p>
<b>Departamento:</b><br><select name="departamento" id="departamento"><option value="all"'; 
if($departamento=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM Departamento order by nombre"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idDepartamento"].'"';
     if($departamento==$row["idDepartamento"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>

<b>B�squeda(opcional):</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>
</td>';

echo'<td>
<b>Ordenar por:</b><br>
<select name="sort" id="sort">';

  echo'<option value="Empleado.nombre"';
     if($sort=="Empleado.nombre"){echo"selected";}
	 echo'>Nombre</option>';
	 
  echo'<option value="Empleado.usuario"';
     if($sort=="Empleado.usuario"){echo"selected";}
	 echo'>Usuario</option>';
	 	 	 
	   echo'<option value="Empleado.cargo"';
     if($sort=="Empleado.cargo"){echo"selected";}
	 echo'>Cargo</option>';

  echo'<option value="Departamento.nombre"';
     if($sort=="Departamento.nombre"){echo"selected";}
	 echo'>Departamento</option>';
	 
	   echo'<option value="Empleado.activo"';
     if($sort=="Empleado.activo"){echo"selected";}
	 echo'>Activo</option>';
	 
	   echo'<option value="Empleado.direccion"';
     if($sort=="Empleado.direccion"){echo"selected";}
	 echo'>Direcci�n</option>';
	 
	   echo'<option value="Colonia.NombreColonia"';
     if($sort=="Colonia.NombreColonia"){echo"selected";}
	 echo'>Colonia</option>';
	 
	   echo'<option value="Municipio.NombreMunicipio"';
     if($sort=="Municipio.NombreMunicipio"){echo"selected";}
	 echo'>Municipio</option>';
	 
	   echo'<option value="Estado.NombreEstado"';
     if($sort=="Estado.NombreEstado"){echo"selected";}
	 echo'>Estado</option>';
	 
	   echo'<option value="Empleado.telefonoCasa"';
     if($sort=="Empleado.telefonoCasa"){echo"selected";}
	 echo'>Telefono</option>';
	 
	   echo'<option value="Empleado.telefonoCelular"';
     if($sort=="Empleado.telefonoCelular"){echo"selected";}
	 echo'>Celular</option>';
	 
	   echo'<option value="Empleado.nextel"';
     if($sort=="Empleado.nextel"){echo"selected";}
	 echo'>Nextel</option>';
	 
	   echo'<option value="Empleado.idnextel"';
     if($sort=="Empleado.idnextel"){echo"selected";}
	 echo'>ID Nextel</option>';
	 
	   echo'<option value="Empleado.email"';
     if($sort=="Empleado.email"){echo"selected";}
	 echo'>Email</option>';

echo'</select>
<select name="ascdesc" id="ascdesc">
<option value="asc"'; 
if($ascdesc=="asc"){echo' selected ';}
echo'>Ascendente</option>
<option value="desc"'; 
if($ascdesc=="desc"){echo' selected ';}
echo'>Descendente</option>
</select>
<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';

}
############################################################################################
## NOKROSIS

if($tablax=="validaciones"){
if(isset($_POST['activo']) or isset($_POST['quest']) ){
$activo = $_POST['activo'];
$quest = $_POST['quest'];

}else{
$activo =null;
$quest=null;

}
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="contrato"'.checkradioarr("contrato",$campos).'/> Contrato<br>
					<input name="campos[]" type="checkbox" value="inciso"'.checkradioarr("inciso",$campos).'/> Inciso<br>
					<input name="campos[]" type="checkbox" value="clave"'.checkradioarr("clave",$campos).'/> Clave Usuario<br>
				</td>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="nombre"'.checkradioarr("nombre",$campos).'/> Nombre<br>
					<input name="campos[]" type="checkbox" value="fecha_inicio"'.checkradioarr("fecha_inicio",$campos).'/> Fecha de Inicio<br>
					<input name="campos[]" type="checkbox" value="fecha_vencimiento"'.checkradioarr("fecha_vencimiento",$campos).'/> Fecha de Vencimiento<br>
				</td>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="status"'.checkradioarr("status",$campos).'/> Status<br>
					<input name="campos[]" type="checkbox" value="tipo_pago"'.checkradioarr("tipo_pago",$campos).'/> Tipo de Pago<br>
					<input name="campos[]" type="checkbox" value="fecha_pago"'.checkradioarr("fecha_pago",$campos).'/> Fecha de pago<br>
				</td>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="cuenta_ingreso"'.checkradioarr("cuenta_ingreso",$campos).'/> Cuenta Ingreso Pago<br>
					<input name="campos[]" type="checkbox" value="observaciones"'.checkradioarr("observaciones",$campos).'/> Observaciones<br>
					<input name="campos[]" type="checkbox" value="comision_vendedor"'.checkradioarr("comision_vendedor",$campos).'/> Comision Vendedor<br>
					<input name="campos[]" type="checkbox" value="fecha_pago_comision"'.checkradioarr("fecha_pago_comision",$campos).'/> Fecha de pago de comision<br>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<b>Validado:</b><br>
			<select name="activo" id="activo">
				<option value="all"'.($activo=="all"?' selected ':'').'>Indistinto</option>
				<option value="si"'.($activo=="si"?' selected ':'').'>Validado</option>
				<option value="no"'.($activo=="no"?' selected ':'').'>No Validado</option>
			</select><br>

	<b>B�squeda(opcional):</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>
	</td>';

	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	echo'<option value="uc.contrato"'.($sort=="uc.contrato"?" selected":"").'>Contrato</option>';
	echo'<option value="uc.inciso"'.($sort=="uc.inciso"?"selected":"").'>Inciso</option>';
	echo'<option value="uc.clave"'.($sort=="uc.clave"?"selected":"").'>Clave</option>';
	echo'<option value="uc.nombre"'.($sort=="uc.nombre"?"selected":"").'>Nombre</option>';
	echo'<option value="uc.fecha_inicio"'.($sort=="uc.fecha_inicio"?"selected":"").'>Fecha Inicio</option>';
	echo'<option value="uc.fecha_vencimiento"'.($sort=="uc.fecha_vencimiento"?"selected":"").'>Fecha Vencimiento</option>';
	echo'<option value="uc.status"'.($sort=="uc.status"?"selected":"").'>Status</option>';
	echo'<option value="v.tipo_pago"'.($sort=="v.tipo_pago"?"selected":"").'>Tipo pago</option>';
	echo'<option value="v.fecha_pago"'.($sort=="v.fecha_pago"?"selected":"").'>Fecha Pago</option>';
	echo'<option value="v.cuenta_ingreso"'.($sort=="v.cuenta_ingreso"?"selected":"").'>Cuenta Ingreso</option>';
	echo'<option value="v.observaciones"'.($sort=="v.observaciones"?"selected":"").'>Observaciones</option>';
	echo'<option value="v.comision_vendedor"'.($sort=="v.comision_vendedor"?"selected":"").'>Comision Vendedor</option>';
	echo'<option value="v.fecha_pago_comision"'.($sort=="fecha_pago_comision"?"selected":"").'>Fecha Pago Comision</option>';
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="ventas"){
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="cliente"'.checkradioarr("cliente",$campos).'/> Cliente<br>
					<input name="campos[]" type="checkbox" value="numPoliza"'.checkradioarr("numPoliza",$campos).'/> Num. Contrato<br>
					<input name="campos[]" type="checkbox" value="vendedor"'.checkradioarr("vendedor",$campos).'/> Vendedor<br>
					<input name="campos[]" type="checkbox" value="monto"'.checkradioarr("monto",$campos).'/> Monto<br>
					<input name="campos[]" type="checkbox" value="ingreso"'.checkradioarr("ingreso",$campos).'/> Ingreso<br>
					<input name="campos[]" type="checkbox" value="estado"'.checkradioarr("estado",$campos).'/> Estado<br>
					<input name="campos[]" type="checkbox" value="municipio"'.checkradioarr("municipio",$campos).'/> Municipio<br>										
					<input name="campos[]" type="checkbox" value="serie"'.checkradioarr("serie",$campos).'/> Serie<br>			
					<input name="campos[]" type="checkbox" value="vigencia"'.checkradioarr("vigencia",$campos).'/> Vigencia<br>										
				</td>
			</tr>
			</table>
		</td>
	</tr>';
	


echo'
	<tr><td>
<b>Filtrar por:</b><br />
<table border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha1" type="checkbox" id="filtrofecha1" value="enabled" ';
	if($filtrofecha1=="enabled"){echo'checked';}
	echo'/></td>
    <td width="150" bgcolor="#eeeeee"><strong>Rango de Vigencia</strong></td>
    <td width="280" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($recepcion_d)){$recepcion_d=date("j");}	  
if(empty($recepcion_m)){$recepcion_m=date("m");}	  
if(empty($recepcion_a)){$recepcion_a=date("Y");}	
  
if(empty($recepcion_db)){$recepcion_db=date("j");}	  
if(empty($recepcion_mb)){$recepcion_mb=date("m");}	  
if(empty($recepcion_ab)){$recepcion_ab=date("Y");}	  

echo'<select name="recepcion_d" id="recepcion_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_m" id="recepcion_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_a" id="recepcion_a">';			
for($contador=2007;$contador<=2020;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="280" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="recepcion_db" id="recepcion_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_mb" id="recepcion_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_ab" id="recepcion_ab">';			
for($contador=2007;$contador<=2020;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select></td></tr></table>';	
	
	
	
	echo'</td>
  </tr>
';
	
	
	
	echo'<tr><td>
	<b>Numero de contrato:</b><br><input name="numcon" type="text" size="20" id="quest" value="'.$numcon.'" /><br />
	<b>Vendedor:</b><br><input name="vendedor" type="text" size="20" id="quest" value="'.$vendedor.'" />	<br />
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	echo'<option value="nombre"'.($sort=="cliente"?" selected":"").'>Cliente</option>';
	echo'<option value="numPoliza"'.($sort=="numPoliza"?"selected":"").'>Num. Contrato</option>';
	echo'<option value="vendedor"'.($sort=="vendedor"?"selected":"").'>Vendedor</option>';
	echo'<option value="monto"'.($sort=="monto"?"selected":"").'>Monto</option>';
	echo'<option value="ingreso"'.($sort=="ingreso"?"selected":"").'>Ingreso</option>';
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="pagos"){
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="nombre"'.checkradioarr("nombre",$campos).'/> Proveedor<br>
					<input name="campos[]" type="checkbox" value="conceptor"'.checkradioarr("conceptor",$campos).'/> Concepto<br>
					<input name="campos[]" type="checkbox" value="monto"'.checkradioarr("monto",$campos).'/> Monto<br>
					<input name="campos[]" type="checkbox" value="status"'.checkradioarr("status",$campos).'/> Status<br>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	echo'<option value="nombre"'.($sort=="nombre"?" selected":"").'>Proveedor</option>';
	echo'<option value="conceptor"'.($sort=="conceptor"?"selected":"").'>Concepto</option>';
	echo'<option value="monto"'.($sort=="monto"?"selected":"").'>Monto</option>';
	echo'<option value="status"'.($sort=="status"?"selected":"").'>Status</option>';
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="cobranza"){

	$arrayCampos=array(
		"ide"	=>	"Expediente",
		"nombre"	=>	"Cliente",
		"conceptor"	=>	"Concepto",
		"monto"	=>	"Monto",
		"status"		=>	"Status",
		"statusc"	=>	"Status Caso",
		"fecha_recepcion"		=>	"Fecha del Servicio",
		"fecha"		=>	"Fecha de Pago"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>';
	
echo'<b>Filtrar por:</b><br />
<table border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha1" type="checkbox" id="filtrofecha1" value="enabled" ';
	if($filtrofecha1=="enabled"){echo'checked';}
	echo'/></td>
    <td width="150" bgcolor="#eeeeee"><strong>Fecha del Servicio</strong></td>
    <td width="180" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($recepcion_d)){$recepcion_d=date("j");}	  
if(empty($recepcion_m)){$recepcion_m=date("m");}	  
if(empty($recepcion_a)){$recepcion_a=date("Y");}	
  
if(empty($recepcion_db)){$recepcion_db=date("j");}	  
if(empty($recepcion_mb)){$recepcion_mb=date("m");}	  
if(empty($recepcion_ab)){$recepcion_ab=date("Y");}	  

echo'<select name="recepcion_d" id="recepcion_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_m" id="recepcion_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_a" id="recepcion_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="180" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="recepcion_db" id="recepcion_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_mb" id="recepcion_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_ab" id="recepcion_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>

';


echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha2" type="checkbox" id="filtrofecha2" value="enabled" ';
	if($filtrofecha2=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha de Pago</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($suceso_d)){$suceso_d=date("j");}	  
if(empty($suceso_m)){$suceso_m=date("m");}	  
if(empty($suceso_a)){$suceso_a=date("Y");}	
  
if(empty($suceso_db)){$suceso_db=date("j");}	  
if(empty($suceso_mb)){$suceso_mb=date("m");}	  
if(empty($suceso_ab)){$suceso_ab=date("Y");}	  

echo'<select name="suceso_d" id="suceso_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_m" id="suceso_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_a" id="suceso_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="suceso_db" id="suceso_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_mb" id="suceso_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_ab" id="suceso_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr></table>';

echo'
<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	
	
	echo "</select>";
	echo'
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select><br />
	<b>Status:</b><br />
		<select name="status" id="status">
		<option value="todos"'.($status=="todos"?' selected ':'').'>Todos</option>
		<option value="pagado"'.($status=="pagado"?' selected ':'').'>Pagado</option>
		<option value="no pagado"'.($status=="no pagado"?' selected ':'').'>No Pagado</option>
	</select>
	
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}

#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="combinado"){

	$arrayCampos=array(
		"ide"	=>	"Expediente",
		"fecha_recepcion"		=>	"Fecha del Servicio",
		"nombre"	=>	"Cliente",
		"statusc"	=>	"Status del Servicio",
		"status"		=>	"Status Cobro",
		"fecha"		=>	"Fecha de Cobro",
		"monto"	=>	"Monto de Cobro",
		"fechap"		=>	"Fecha de Pago a Proveedor",
		"montop"		=>	"Monto de Pago a Proveedor",		
		"statusp"		=>	"Status de Pago al Proveedor"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>';
	
echo'<b>Filtrar por:</b><br />
<table border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha1" type="checkbox" id="filtrofecha1" value="enabled" ';
	if($filtrofecha1=="enabled"){echo'checked';}
	echo'/></td>
    <td width="150" bgcolor="#eeeeee"><strong>Fecha del Servicio</strong></td>
    <td width="180" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($recepcion_d)){$recepcion_d=date("j");}	  
if(empty($recepcion_m)){$recepcion_m=date("m");}	  
if(empty($recepcion_a)){$recepcion_a=date("Y");}	
  
if(empty($recepcion_db)){$recepcion_db=date("j");}	  
if(empty($recepcion_mb)){$recepcion_mb=date("m");}	  
if(empty($recepcion_ab)){$recepcion_ab=date("Y");}	  

echo'<select name="recepcion_d" id="recepcion_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_m" id="recepcion_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_a" id="recepcion_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="180" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="recepcion_db" id="recepcion_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_mb" id="recepcion_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_ab" id="recepcion_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>

';

echo'
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha3" type="checkbox" id="filtrofecha3" value="enabled" ';
	if($filtrofecha3=="enabled"){echo'checked';}
	echo'/></td>
    <td width="150" bgcolor="#eeeeee"><strong>Fecha del Cobro</strong></td>
    <td width="180" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($cobranza_d)){$cobranza_d=date("j");}	  
if(empty($cobranza_m)){$cobranza_m=date("m");}	  
if(empty($cobranza_a)){$cobranza_a=date("Y");}	
  
if(empty($cobranza_db)){$cobranza_db=date("j");}	  
if(empty($cobranza_mb)){$cobranza_mb=date("m");}	  
if(empty($cobranza_ab)){$cobranza_ab=date("Y");}	  

echo'<select name="cobranza_d" id="cobranza_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="cobranza_m" id="cobranza_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="cobranza_a" id="cobranza_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="180" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="cobranza_db" id="cobranza_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="cobranza_mb" id="cobranza_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="cobranza_ab" id="cobranza_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$cobranza_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>

';


echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha2" type="checkbox" id="filtrofecha2" value="enabled" ';
	if($filtrofecha2=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha de Pago a Proveedor</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($suceso_d)){$suceso_d=date("j");}	  
if(empty($suceso_m)){$suceso_m=date("m");}	  
if(empty($suceso_a)){$suceso_a=date("Y");}	
  
if(empty($suceso_db)){$suceso_db=date("j");}	  
if(empty($suceso_mb)){$suceso_mb=date("m");}	  
if(empty($suceso_ab)){$suceso_ab=date("Y");}	  

echo'<select name="suceso_d" id="suceso_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_m" id="suceso_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_a" id="suceso_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="suceso_db" id="suceso_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_mb" id="suceso_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_ab" id="suceso_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr></table>';

echo'
<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	
	
	echo "</select>";
	echo'
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select><br />
	<b>Status:</b><br />
		<select name="status" id="status">
		<option value="todos"'.($status=="todos"?' selected ':'').'>Todos</option>
		<option value="pagado"'.($status=="pagado"?' selected ':'').'>Pagado</option>
		<option value="no pagado"'.($status=="no pagado"?' selected ':'').'>No Pagado</option>
	</select>
	
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}

#-------------------------------------------------------------------------------------------------------------------------------------------

if($tablax=="proveedores"){
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="nombre"'.checkradioarr("nombre",$campos).'/> Proveedor<br>
					<input name="campos[]" type="checkbox" value="usuario"'.checkradioarr("usuario",$campos).'/> Usuario<br>
					<input name="campos[]" type="checkbox" value="contrasena"'.checkradioarr("contrasena",$campos).'/> Contrase&ntilde;a<br>
					<input name="campos[]" type="checkbox" value="calle"'.checkradioarr("calle",$campos).'/> Calle<br>
					<input name="campos[]" type="checkbox" value="colonia"'.checkradioarr("colonia",$campos).'/> Colonia<br>
					<input name="campos[]" type="checkbox" value="cp"'.checkradioarr("cp",$campos).'/> CP<br>
					<input name="campos[]" type="checkbox" value="estado"'.checkradioarr("estado",$campos).'/> Estado<br>
					<input name="campos[]" type="checkbox" value="municipio"'.checkradioarr("municipio",$campos).'/> Municipio<br>
					<input name="campos[]" type="checkbox" value="especialidad"'.checkradioarr("especialidad",$campos).'/> Especialidad<br>
					<input name="campos[]" type="checkbox" value="horario"'.checkradioarr("horario",$campos).'/> Horario<br>
				</td>
				<td valign=top>
					<input name="campos[]" type="checkbox" value="contacto"'.checkradioarr("contacto",$campos).'/> Contacto 1<br>
					<input name="campos[]" type="checkbox" value="tel"'.checkradioarr("tel",$campos).'/> Tel. Oficina 1<br>
					<input name="campos[]" type="checkbox" value="tel2"'.checkradioarr("tel2",$campos).'/> Tel. Oficina 2<br>
					<input name="campos[]" type="checkbox" value="fax2"'.checkradioarr("fax2",$campos).'/> Tel. Oficina 3<br>
					<input name="campos[]" type="checkbox" value="fax"'.checkradioarr("fax",$campos).'/> Tel. / Fax<br>
					<input name="campos[]" type="checkbox" value="cel"'.checkradioarr("cel",$campos).'/> Celular<br>
					<input name="campos[]" type="checkbox" value="nextel"'.checkradioarr("nextel",$campos).'/> Tel. Nextel<br>
					<input name="campos[]" type="checkbox" value="nextelid"'.checkradioarr("nextelid",$campos).'/> ID Nextel<br>
					<input name="campos[]" type="checkbox" value="telcasa"'.checkradioarr("telcasa",$campos).'/> Tel. Casa<br>
					<input name="campos[]" type="checkbox" value="mail"'.checkradioarr("mail",$campos).'/> E-mail<br>
				</td>
								<td valign=top>
					<input name="campos[]" type="checkbox" value="contacto2"'.checkradioarr("contacto2",$campos).'/> Contacto 2<br>
					<input name="campos[]" type="checkbox" value="cel2"'.checkradioarr("cel2",$campos).'/> Celular<br>
					<input name="campos[]" type="checkbox" value="nextel2"'.checkradioarr("nextel2",$campos).'/> Tel. Nextel<br>
					<input name="campos[]" type="checkbox" value="nextelid2"'.checkradioarr("nextelid2",$campos).'/> ID Nextel<br>
					<input name="campos[]" type="checkbox" value="telcasa2"'.checkradioarr("telcasa2",$campos).'/> Tel. Casa<br>
					<input name="campos[]" type="checkbox" value="mail2"'.checkradioarr("mail2",$campos).'/> E-mail<br>
					<hr>
					<input name="campos[]" type="checkbox" value="banco"'.checkradioarr("banco",$campos).'/> Banco<br>
					<input name="campos[]" type="checkbox" value="numcuenta"'.checkradioarr("numcuenta",$campos).'/> Num. Cuenta<br>
					<input name="campos[]" type="checkbox" value="clabe"'.checkradioarr("clabe",$campos).'/> CLABE<br>
					<input name="campos[]" type="checkbox" value="observaciones"'.checkradioarr("observaciones",$campos).'/> Observaciones<br>
					<input name="campos[]" type="checkbox" value="status"'.checkradioarr("status",$campos).'/> Status<br>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	echo'<option value="nombre"'.($sort=="nombre"?" selected":"").'>Proveedor</option>';
	echo'<option value="usuario"'.($sort=="usuario"?"selected":"").'>Usuario</option>';
	echo'<option value="contrasena"'.($sort=="contrasena"?"selected":"").'>Contrase&ntilde;a</option>';
	echo'<option value="calle"'.($sort=="calle"?"selected":"").'>Calle</option>';
	echo'<option value="colonia"'.($sort=="colonia"?"selected":"").'>Colonia</option>';
	echo'<option value="cp"'.($sort=="cp"?"selected":"").'>CP</option>';
	echo'<option value="estado"'.($sort=="estado"?"selected":"").'>Estado</option>';
	echo'<option value="municipio"'.($sort=="municipio"?"selected":"").'>Municipio</option>';
	echo'<option value="especialidad"'.($sort=="especialidad"?"selected":"").'>Especialidad</option>';
	echo'<option value="horario"'.($sort=="horario"?"selected":"").'>Horario</option>';
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
<br /><br />
<b>Status:</b>
	<select name="status" id="status">
		<option value="activo"'.($status=="activo"?' selected ':'').'>Activo</option>
		<option value="inactivo"'.($status=="inactivo"?' selected ':'').'>Inactivo</option>
		<option value="todos"'.($status=="todos"?' selected ':'').'>Todos</option>
	</select>
<br />
<br />
	
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="evaluaciones"){

	$arrayCampos=array(
		"fecha"	=>	"Fecha",
		"general"	=>	"Expediente",		
		"nombre"	=>	"Nombre",
		"relacion"	=>	"Relacion con el usuario",
		"cortesia"		=>	"Cortesia",
		"puntualidad"		=>	"Puntualidad",
		"presentacion"		=>	"Presentacion",
		"atencion"		=>	"Atencion",
		"solucion"		=>	"Solucion",
		"promedio"		=>	"Promedio",
		"renovaria"		=>	"Renovacion",		
		"observaciones"		=>	"Observaciones",
		"encuestador"		=>	"Encuestador",
		"contrato"		=>	"Contrato", 
		"fecha_recepcion"		=>	"Fecha del Servicio"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>	
	<tr><td>';
echo '<b>Contrato o Expediente:</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>';	
echo '</td></tr><tr><td>';	
echo'
<b>Filtrar por:</b><br />
<table border="0" cellspacing="3" cellpadding="3" width="660">
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha1" type="checkbox" id="filtrofecha1" value="enabled" ';
	if($filtrofecha1=="enabled"){echo'checked';}
	echo'/></td>
    <td width="120" bgcolor="#eeeeee"><strong>Fecha de recepci�n</strong></td>
    <td width="180" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($recepcion_d)){$recepcion_d=date("j");}	  
if(empty($recepcion_m)){$recepcion_m=date("m");}	  
if(empty($recepcion_a)){$recepcion_a=date("Y");}	
  
if(empty($recepcion_db)){$recepcion_db=date("j");}	  
if(empty($recepcion_mb)){$recepcion_mb=date("m");}	  
if(empty($recepcion_ab)){$recepcion_ab=date("Y");}	  

echo'<select name="recepcion_d" id="recepcion_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_m" id="recepcion_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_a" id="recepcion_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="180" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="recepcion_db" id="recepcion_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_mb" id="recepcion_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_ab" id="recepcion_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
echo'</td></tr></table>';
echo '</td></tr><tr><td>';
	echo'
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}

#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="comisiones"){

	$arrayCampos=array(
		"vendedor"	=>	"Vendedor",
		"contrato"	=>	"Contrato",
		"comision"	=>	"Comision",
		"status"		=>	"Status"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}

#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="facturas"){

	$arrayCampos=array(
		"factura"	=>	"Factura",
		"nombre"	=>	"Cliente",
		"fecha"	=>	"Fecha",
		"total"	=>	"Total",
		"statusfactura"		=>	"Status"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
#-------------------------------------------------------------------------------------------------------------------------------------------
if($tablax=="notas_remision"){

	$arrayCampos=array(
		"factura"	=>	"Nota",
		"nombre"	=>	"Cliente",
		"fecha"	=>	"Fecha",
		"total"	=>	"Total",
		"statusfactura"		=>	"Status"
	);
	if(empty($campos)){$campos=array();}
	echo'<td>
			<table width=100% cellpadding=3 cellspacing=3 border=0>
			<tr>
				<td colspan=5><b>Seleccione las columnas a desplegar:</b></td>
			</tr>
			<tr>
				<td valign=top>';
				foreach($arrayCampos as $nombreCampo => $nombreLegible)
				{
					echo "<input name='campos[]' type='checkbox' value='$nombreCampo'".checkradioarr($nombreCampo,$campos)."/> $nombreLegible<br>";
				}
	echo	'</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>';
	echo'<td>
	<b>Ordenar por:</b><br>
	<select name="sort" id="sort">';
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		echo "<option value='$nombreCampo'".($sort==$nombreCampo?' selected':'').">$nombreLegible</option>";
	}
	echo'</select>
	<select name="ascdesc" id="ascdesc">
		<option value="asc"'.($ascdesc=="asc"?' selected ':'').'>Ascendente</option>
		<option value="desc"'.($ascdesc=="desc"?' selected ':'').'>Descendente</option>
	</select>
	<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';
}
############################################################################################################
?>    
<?php  
/*
$link = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$link);
$result = mysqli_query($link,"SELECT * FROM $tabla",$link);
$row = mysqli_fetch_assoc($result);
echo "<table border=1><tr>";
if($row) {
	foreach($row as $key => $value) {
		echo "<td>$key</td>";
	}
}
echo "</tr>";
*/

if($tablax=="Cliente"){
if(empty($campos)){$campos=array();}
echo'<td>
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td colspan=5><b>Seleccione las columnas a desplegar:</b></td></tr>
<tr><td width=20% valign=top>
<input name="campos[]" type="checkbox" value="nombre"'; 
$checa_array1=array_search("nombre",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nombre<br>
<input name="campos[]" type="checkbox" value="vendedor"'; 
$checa_array1=array_search("vendedor",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Vendedor<br>
<input name="campos[]" type="checkbox" value="rfc"'; 
$checa_array1=array_search("rfc",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> RFC<br>
<input name="campos[]" type="checkbox" value="contacto"'; 
$checa_array1=array_search("contacto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Contacto<br>
<input name="campos[]" type="checkbox" value="direccion"'; 
$checa_array1=array_search("direccion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Direcci&oacute;n<br>
<input name="campos[]" type="checkbox" value="colonia"'; 
$checa_array1=array_search("colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia<br>
<input name="campos[]" type="checkbox" value="ciudad"'; 
$checa_array1=array_search("ciudad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad<br>
<input name="campos[]" type="checkbox" value="municipio"'; 
$checa_array1=array_search("municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="estado"'; 
$checa_array1=array_search("estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado<br>
<input name="campos[]" type="checkbox" value="tel"'; 
$checa_array1=array_search("tel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel&eacute;fono<br>
<input name="campos[]" type="checkbox" value="cel"'; 
$checa_array1=array_search("cel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Celular<br>
<input name="campos[]" type="checkbox" value="oficina"'; 
$checa_array1=array_search("oficina",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel&eacute;fono oficina<br>
<input name="campos[]" type="checkbox" value="fax"'; 
$checa_array1=array_search("fax",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fax<br>
<input name="campos[]" type="checkbox" value="nextel"'; 
$checa_array1=array_search("nextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nextel<br>
<input name="campos[]" type="checkbox" value="idnextel"'; 
$checa_array1=array_search("idnextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> ID Nextel<br>
<input name="campos[]" type="checkbox" value="mail"'; 
$checa_array1=array_search("mail",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Email<br>
<input name="campos[]" type="checkbox" value="domfiscal"'; 
$checa_array1=array_search("domfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Domicilio fiscal<br>
<input name="campos[]" type="checkbox" value="colfiscal"'; 
$checa_array1=array_search("colfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia fiscal<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="ciudadfiscal"'; 
$checa_array1=array_search("ciudadfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad fiscal<br>
<input name="campos[]" type="checkbox" value="municipiofiscal"'; 
$checa_array1=array_search("municipiofiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio fiscal<br>
<input name="campos[]" type="checkbox" value="estadofiscal"'; 
$checa_array1=array_search("estadofiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado fiscal<br>
<input name="campos[]" type="checkbox" value="tipocliente"'; 
$checa_array1=array_search("tipocliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tipo de cliente<br>
</td>
<td width=20% valign=top>

</td>
</tr></table>
</td>
</tr>
<tr>
<td>
<b>Vendedor:</b><br><select name="vendedor" id="vendedor"><option value="all"'; 
if($vendedor=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM Empleado where tipo='vendedor' order by nombre"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEmpleado"].'"';
     if($vendedor==$row["idEmpleado"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>
<b>Tipo de cliente:</b><br><select name="tipo_cliente" id="tipo_cliente"><option value="all"'; 
if($tipo_cliente=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM TipoCliente order by idTipoCliente"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idTipoCliente"].'"';
     if($tipo_cliente==$row["idTipoCliente"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>

<b>B�squeda(opcional):</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>
</td>';

echo'<td>
<b>Ordenar por:</b><br>
<select name="sort" id="sort">';

  echo'<option value="Cliente.nombre"';
     if($sort=="Cliente.nombre"){echo"selected";}
	 echo'>Nombre</option>';
	 
  echo'<option value="Cliente.usuario"';
     if($sort=="Cliente.usuario"){echo"selected";}
	 echo'>Usuario</option>';
	 
	   echo'<option value="Empleado.nombre"';
     if($sort=="Empleado.nombre"){echo"selected";}
	 echo'>Vendedor</option>';
	 
	 	 	 
	   echo'<option value="Cliente.rfc"';
     if($sort=="Cliente.rfc"){echo"selected";}
	 echo'>RFC</option>';

	 
	   echo'<option value="Colonia.NombreColonia"';
     if($sort=="Colonia.NombreColonia"){echo"selected";}
	 echo'>Colonia</option>';
	 
	 	   echo'<option value="Cliente.ciudad"';
     if($sort=="Cliente.ciudad"){echo"selected";}
	 echo'>Ciudad</option>';
	 
	   echo'<option value="Municipio.NombreMunicipio"';
     if($sort=="Municipio.NombreMunicipio"){echo"selected";}
	 echo'>Municipio</option>';
	 
	   echo'<option value="Estado.NombreEstado"';
     if($sort=="Estado.NombreEstado"){echo"selected";}
	 echo'>Estado</option>';
	 
	 
	 	 	   echo'<option value="colfiscal.NombreColonia"';
     if($sort=="colfiscal.NombreColonia"){echo"selected";}
	 echo'>Colonia fiscal</option>';
	 
	 	 	   echo'<option value="Cliente.fisCiudad"';
     if($sort=="Cliente.fisCiudad"){echo"selected";}
	 echo'>Ciudad fiscal</option>';

	 	 	   echo'<option value="munifiscal.NombreMunicipio"';
     if($sort=="munifiscal.NombreMunicipio"){echo"selected";}
	 echo'>Municipio fiscal</option>';
	 
	 	 	 	   echo'<option value="estadfiscal.NombreEstado"';
     if($sort=="estadfiscal.NombreEstado"){echo"selected";}
	 echo'>Estado fiscal</option>';
	 
	 	 	 	 	   echo'<option value="TipoCliente.nombre"';
     if($sort=="TipoCliente.nombre"){echo"selected";}
	 echo'>Tipo de cliente</option>';

echo'</select>
<select name="ascdesc" id="ascdesc">
<option value="asc"'; 
if($ascdesc=="asc"){echo' selected ';}
echo'>Ascendente</option>
<option value="desc"'; 
if($ascdesc=="desc"){echo' selected ';}
echo'>Descendente</option>
</select>
<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';

}

############################################################################################################
?>              
<?php  
if($tablax=="Poliza"){
if(empty($campos)){$campos=array();}
echo'<td>
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td colspan=5><b>Seleccione las columnas a desplegar:</b></td></tr>
<tr><td width=20% valign=top>
<input name="campos[]" type="checkbox" value="nombre"'; 
$checa_array1=array_search("nombre",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nombre<br>
<input name="campos[]" type="checkbox" value="usuario"'; 
$checa_array1=array_search("usuario",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Usuario<br>
<input name="campos[]" type="checkbox" value="vendedor"'; 
$checa_array1=array_search("vendedor",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Vendedor<br>
<input name="campos[]" type="checkbox" value="status"'; 
$checa_array1=array_search("status",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Status<br>
<input name="campos[]" type="checkbox" value="rfc"'; 
$checa_array1=array_search("rfc",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> RFC<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="contacto"'; 
$checa_array1=array_search("contacto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Contacto<br>
<input name="campos[]" type="checkbox" value="direccion"'; 
$checa_array1=array_search("direccion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Direcci&oacute;n<br>
<input name="campos[]" type="checkbox" value="colonia"'; 
$checa_array1=array_search("colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia<br>
<input name="campos[]" type="checkbox" value="ciudad"'; 
$checa_array1=array_search("ciudad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad<br>
<input name="campos[]" type="checkbox" value="municipio"'; 
$checa_array1=array_search("municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="estado"'; 
$checa_array1=array_search("estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado<br>
<input name="campos[]" type="checkbox" value="tel"'; 
$checa_array1=array_search("tel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel&eacute;fono<br>
<input name="campos[]" type="checkbox" value="cel"'; 
$checa_array1=array_search("cel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Celular<br>
<input name="campos[]" type="checkbox" value="oficina"'; 
$checa_array1=array_search("oficina",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel&eacute;fono oficina<br>
<input name="campos[]" type="checkbox" value="fax"'; 
$checa_array1=array_search("fax",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fax<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="nextel"'; 
$checa_array1=array_search("nextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nextel<br>
<input name="campos[]" type="checkbox" value="idnextel"'; 
$checa_array1=array_search("idnextel",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> ID Nextel<br>
<input name="campos[]" type="checkbox" value="mail"'; 
$checa_array1=array_search("mail",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Email<br>
<input name="campos[]" type="checkbox" value="domfiscal"'; 
$checa_array1=array_search("domfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Domicilio fiscal<br>
<input name="campos[]" type="checkbox" value="colfiscal"'; 
$checa_array1=array_search("colfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia fiscal<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="ciudadfiscal"'; 
$checa_array1=array_search("ciudadfiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad fiscal<br>
<input name="campos[]" type="checkbox" value="municipiofiscal"'; 
$checa_array1=array_search("municipiofiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio fiscal<br>
<input name="campos[]" type="checkbox" value="estadofiscal"'; 
$checa_array1=array_search("estadofiscal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado fiscal<br>
<input name="campos[]" type="checkbox" value="tipocliente"'; 
$checa_array1=array_search("tipocliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tipo de cliente<br>
</td>
</tr></table>
</td>
</tr>
<tr>
<td><b>Status:</b><br><select name="status" id="status">
<option value="all"'; 
if($status=="all"){echo' selected ';}
echo'>Indistinto</option>
<option value="validado"'; 
if($status=="validado"){echo' selected ';}
echo'>Validado</option>
<option value="no validado"'; 
if($status=="no validado"){echo' selected ';}
echo'>No validado</option>
</select><p>
<b>Vendedor:</b><br><select name="vendedor" id="vendedor"><option value="all"'; 
if($vendedor=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM Empleado where tipo='vendedor' order by nombre"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEmpleado"].'"';
     if($vendedor==$row["idEmpleado"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>
<b>Tipo de cliente:</b><br><select name="tipo_cliente" id="tipo_cliente"><option value="all"'; 
if($tipo_cliente=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM TipoCliente order by idTipoCliente"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idTipoCliente"].'"';
     if($tipo_cliente==$row["idTipoCliente"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>

<b>B�squeda(opcional):</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>
</td>';

echo'<td>
<b>Ordenar por:</b><br>
<select name="sort" id="sort">';

  echo'<option value="Cliente.nombre"';
     if($sort=="Cliente.nombre"){echo"selected";}
	 echo'>Nombre</option>';
	 
  echo'<option value="Cliente.usuario"';
     if($sort=="Cliente.usuario"){echo"selected";}
	 echo'>Usuario</option>';
	 
	   echo'<option value="Empleado.nombre"';
     if($sort=="Empleado.nombre"){echo"selected";}
	 echo'>Vendedor</option>';
	 
	   echo'<option value="Cliente.status"';
     if($sort=="Cliente.status"){echo"selected";}
	 echo'>Status</option>';
	 	 	 
	   echo'<option value="Cliente.rfc"';
     if($sort=="Cliente.rfc"){echo"selected";}
	 echo'>RFC</option>';

  echo'<option value="Cliente.contacto"';
     if($sort=="Cliente.contacto"){echo"selected";}
	 echo'>Contacto</option>';
	 
	   echo'<option value="Cliente.calle"';
     if($sort=="Cliente.calle"){echo"selected";}
	 echo'>Direcci�n</option>';
	 
	   echo'<option value="Colonia.NombreColonia"';
     if($sort=="Colonia.NombreColonia"){echo"selected";}
	 echo'>Colonia</option>';
	 
	 	   echo'<option value="Cliente.ciudad"';
     if($sort=="Cliente.ciudad"){echo"selected";}
	 echo'>Ciudad</option>';
	 
	   echo'<option value="Municipio.NombreMunicipio"';
     if($sort=="Municipio.NombreMunicipio"){echo"selected";}
	 echo'>Municipio</option>';
	 
	   echo'<option value="Estado.NombreEstado"';
     if($sort=="Estado.NombreEstado"){echo"selected";}
	 echo'>Estado</option>';
	 
	   echo'<option value="Cliente.telefonoCasa"';
     if($sort=="Cliente.telefonoCasa"){echo"selected";}
	 echo'>Telefono</option>';
	 
	   echo'<option value="Cliente.telefonoCelular"';
     if($sort=="Cliente.telefonoCelular"){echo"selected";}
	 echo'>Celular</option>';
	 
	 	   echo'<option value="Cliente.telefonoOficina"';
     if($sort=="Cliente.telefonoOficina"){echo"selected";}
	 echo'>Tel�fono oficina</option>';
	 
	 	 	   echo'<option value="Cliente.fax"';
     if($sort=="Cliente.fax"){echo"selected";}
	 echo'>Fax</option>';
	 
	 	 	 	   echo'<option value="Cliente.fax"';
     if($sort=="Cliente.fax"){echo"selected";}
	 echo'>Fax</option>';
	 
	   echo'<option value="Cliente.nextel"';
     if($sort=="Cliente.nextel"){echo"selected";}
	 echo'>Nextel</option>';
	 
	 	   echo'<option value="Cliente.TelNextel"';
     if($sort=="Cliente.TelNextel"){echo"selected";}
	 echo'>ID Nextel</option>';
	 
	 	   echo'<option value="Cliente.email"';
     if($sort=="Cliente.email"){echo"selected";}
	 echo'>Email</option>';
	 
	 	   echo'<option value="Cliente.fisCalle"';
     if($sort=="Cliente.fisCalle"){echo"selected";}
	 echo'>Domicilio fiscal</option>';
	 
	 	 	   echo'<option value="colfiscal.NombreColonia"';
     if($sort=="colfiscal.NombreColonia"){echo"selected";}
	 echo'>Colonia fiscal</option>';
	 
	 	 	   echo'<option value="Cliente.fisCiudad"';
     if($sort=="Cliente.fisCiudad"){echo"selected";}
	 echo'>Ciudad fiscal</option>';

	 	 	   echo'<option value="munifiscal.NombreMunicipio"';
     if($sort=="munifiscal.NombreMunicipio"){echo"selected";}
	 echo'>Municipio fiscal</option>';
	 
	 	 	 	   echo'<option value="estadfiscal.NombreEstado"';
     if($sort=="estadfiscal.NombreEstado"){echo"selected";}
	 echo'>Estado fiscal</option>';
	 
	 	 	 	 	   echo'<option value="TipoCliente.nombre"';
     if($sort=="TipoCliente.nombre"){echo"selected";}
	 echo'>Tipo de cliente</option>';

echo'</select>
<select name="ascdesc" id="ascdesc">
<option value="asc"'; 
if($ascdesc=="asc"){echo' selected ';}
echo'>Ascendente</option>
<option value="desc"'; 
if($ascdesc=="desc"){echo' selected ';}
echo'>Descendente</option>
</select>
<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';

}

############################################################################################################

?>

<?php  
if($tablax=="general"){
if(empty($campos)){$campos=array();}
echo'<td>
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td colspan=5><b>Seleccione las columnas a desplegar:</b></td></tr>
<tr><td width=20% valign=top>
<input name="campos[]" type="checkbox" value="servicio"'; 
$checa_array1=array_search("servicio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Servicio<br>
<input name="campos[]" type="checkbox" value="contrato"'; 
$checa_array1=array_search("contrato",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Contrato<br>
<input name="campos[]" type="checkbox" value="empleado"'; 
$checa_array1=array_search("empleado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Empleado<br>
<input name="campos[]" type="checkbox" value="cliente"'; 
$checa_array1=array_search("cliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Cliente<br>
<input name="campos[]" type="checkbox" value="fecha_recepcion"'; 
$checa_array1=array_search("fecha_recepcion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fecha de recepcion<br>
<input name="campos[]" type="checkbox" value="fecha_suceso"'; 
$checa_array1=array_search("fecha_suceso",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fecha del suceso<br>
<input name="campos[]" type="checkbox" value="fecha_apertura"'; 
$checa_array1=array_search("fecha_apertura",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Apertura expediente<br>
<input name="campos[]" type="checkbox" value="fecha_asignacion"'; 
$checa_array1=array_search("fecha_asignacion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Asignacion proveedor<br>
<input name="campos[]" type="checkbox" value="fecha_contacto"'; 
$checa_array1=array_search("fecha_contacto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fecha de contacto<br>

<input name="campos[]" type="checkbox" value="tiempoContacto"'; 
$checa_array1=array_search("tiempoContacto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tiempo de contacto<br>

<input name="campos[]" type="checkbox" value="fecha_arribo"'; 
$checa_array1=array_search("fecha_arribo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fecha de arribo<br>
<input name="campos[]" type="checkbox" value="reporta"'; 
$checa_array1=array_search("reporta",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nombre reporta<br>
<input name="campos[]" type="checkbox" value="tel_reporta"'; 
$checa_array1=array_search("tel_reporta",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Telefono reporta<br>
<input name="campos[]" type="checkbox" value="num_contrato"'; 
$checa_array1=array_search("num_contrato",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Num. de contrato<br>
<input name="campos[]" type="checkbox" value="convenio"'; 
$checa_array1=array_search("convenio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Convenio<br>
<input name="campos[]" type="checkbox" value="expediente"'; 
$checa_array1=array_search("expediente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Expediente<br>
<input name="campos[]" type="checkbox" value="num_cliente"'; 
$checa_array1=array_search("num_cliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Nombre del cliente<br>
<input name="campos[]" type="checkbox" value="num_siniestro"'; 
$checa_array1=array_search("num_siniestro",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Num. de siniestro<br>
<input name="campos[]" type="checkbox" value="usuario"'; 
$checa_array1=array_search("usuario",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Usuario<br>
<input name="campos[]" type="checkbox" value="reporte_cliente"'; 
$checa_array1=array_search("reporte_cliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Reporte cliente<br>
<input name="campos[]" type="checkbox" value="tecnico_solicitado"'; 
$checa_array1=array_search("tecnico_solicitado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tecnico solicitado<br>
<input name="campos[]" type="checkbox" value="motivo_servicio"'; 
$checa_array1=array_search("motivo_servicio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Motivo del servicio<br>
<input name="campos[]" type="checkbox" value="tipo_vial"'; 
$checa_array1=array_search("tipo_vial",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tipo asist. vial<br>
<input name="campos[]" type="checkbox" value="tipo_medica"'; 
$checa_array1=array_search("tipo_medica",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tipo asist. medica<br>
<input name="campos[]" type="checkbox" value="domicilio_cliente"'; 
$checa_array1=array_search("domicilio_cliente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Domicilio del cliente<br>
<input name="campos[]" type="checkbox" value="domicilio_sustituto"'; 
$checa_array1=array_search("domicilio_sustituto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Domicilio sustituto<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="ubicacion_requiere"'; 
$checa_array1=array_search("ubicacion_requiere",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ubicacion requiere<br>
<input name="campos[]" type="checkbox" value="ubicacion_estado"'; 
$checa_array1=array_search("ubicacion_estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ubicacion estado<br>
<input name="campos[]" type="checkbox" value="ubicacion_municipio"'; 
$checa_array1=array_search("ubicacion_municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ubicacion municipio<br>
<input name="campos[]" type="checkbox" value="ubicacion_colonia"'; 
$checa_array1=array_search("ubicacion_colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ubicacion colonia<br>
<input name="campos[]" type="checkbox" value="ubicacion_ciudad"'; 
$checa_array1=array_search("ubicacion_ciudad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ubicacion ciudad<br>
<input name="campos[]" type="checkbox" value="destino_servicio"'; 
$checa_array1=array_search("destino_servicio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Destino del servicio<br>
<input name="campos[]" type="checkbox" value="destino_estado"'; 
$checa_array1=array_search("destino_estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Destino estado<br>
<input name="campos[]" type="checkbox" value="destino_municipio"'; 
$checa_array1=array_search("destino_municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Destino municipio<br>
<input name="campos[]" type="checkbox" value="destino_colonia"'; 
$checa_array1=array_search("destino_colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Destino colonia<br>
<input name="campos[]" type="checkbox" value="destino_ciudad"'; 
$checa_array1=array_search("destino_ciudad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Destino ciudad<br>
<input name="campos[]" type="checkbox" value="formato_carta"'; 
$checa_array1=array_search("formato_carta",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Formato_carta<br>
<input name="campos[]" type="checkbox" value="instructivo"'; 
$checa_array1=array_search("instructivo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Instructivo<br>
<input name="campos[]" type="checkbox" value="proveedor"'; 
$checa_array1=array_search("proveedor",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Proveedor<br>
<input name="campos[]" type="checkbox" value="costo"'; 
$checa_array1=array_search("costo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Costo<br>
<input name="campos[]" type="checkbox" value="observaciones"'; 
$checa_array1=array_search("observaciones",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Observaciones<br>
<input name="campos[]" type="checkbox" value="status"'; 
$checa_array1=array_search("status",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Status<br>
<input name="campos[]" type="checkbox" value="auto_marca"'; 
$checa_array1=array_search("auto_marca",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Auto marca<br>
<input name="campos[]" type="checkbox" value="auto_tipo"'; 
$checa_array1=array_search("auto_tipo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Auto tipo<br>
<input name="campos[]" type="checkbox" value="auto_modelo"'; 
$checa_array1=array_search("auto_modelo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Auto modelo<br>
<input name="campos[]" type="checkbox" value="auto_color"'; 
$checa_array1=array_search("auto_color",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Auto color<br>
<input name="campos[]" type="checkbox" value="auto_placas"'; 
$checa_array1=array_search("auto_placas",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Auto placas<br>
<input name="campos[]" type="checkbox" value="aseguradora"'; 
$checa_array1=array_search("aseguradora",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Aseguradora<br>
<input name="campos[]" type="checkbox" value="ajustador"'; 
$checa_array1=array_search("ajustador",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ajustador<br>
<input name="campos[]" type="checkbox" value="aseg_poliza"'; 
$checa_array1=array_search("aseg_poliza",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Poliza<br>
<input name="campos[]" type="checkbox" value="aseg_inciso"'; 
$checa_array1=array_search("aseg_inciso",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Inciso<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="aseg_vigencia_inicio"'; 
$checa_array1=array_search("aseg_vigencia_inicio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Vigencia inicio<br>
<input name="campos[]" type="checkbox" value="aseg_vigencia_termino"'; 
$checa_array1=array_search("aseg_vigencia_termino",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Vigencia termino<br>
<input name="campos[]" type="checkbox" value="aseg_cobertura"'; 
$checa_array1=array_search("aseg_cobertura",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Cobertura Asegurado<br>
<input name="campos[]" type="checkbox" value="aseg_monto"'; 
$checa_array1=array_search("aseg_monto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Monto<br>
<input name="campos[]" type="checkbox" value="asegurado"'; 
$checa_array1=array_search("asegurado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Asegurado<br>
<input name="campos[]" type="checkbox" value="asegurado_y_o"'; 
$checa_array1=array_search("asegurado_y_o",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> y/o<br>
<input name="campos[]" type="checkbox" value="aseg_tel1"'; 
$checa_array1=array_search("aseg_tel1",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Telefono 1<br>
<input name="campos[]" type="checkbox" value="aseg_tel2"'; 
$checa_array1=array_search("aseg_tel2",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Telefono 2<br>
<input name="campos[]" type="checkbox" value="aseg_domicilio"'; 
$checa_array1=array_search("aseg_domicilio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Domicilio<br>
<input name="campos[]" type="checkbox" value="aseg_cp"'; 
$checa_array1=array_search("aseg_cp",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> C.P.<br>
<input name="campos[]" type="checkbox" value="aseg_estado"'; 
$checa_array1=array_search("aseg_estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado<br>
<input name="campos[]" type="checkbox" value="aseg_municipio"'; 
$checa_array1=array_search("aseg_municipio",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio<br>
<input name="campos[]" type="checkbox" value="aseg_colonia"'; 
$checa_array1=array_search("aseg_colonia",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia<br>
<input name="campos[]" type="checkbox" value="aseg_ciudad"'; 
$checa_array1=array_search("aseg_ciudad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad<br>
<input name="campos[]" type="checkbox" value="aseg_conductor"'; 
$checa_array1=array_search("aseg_conductor",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Conductor<br>
<input name="campos[]" type="checkbox" value="aseg_conductor_tel1"'; 
$checa_array1=array_search("aseg_conductor_tel1",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel conductor 1<br>
<input name="campos[]" type="checkbox" value="aseg_conductor_tel2"'; 
$checa_array1=array_search("aseg_conductor_tel2",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Tel conductor 2<br>
<input name="campos[]" type="checkbox" value="situacion_juridica"'; 
$checa_array1=array_search("situacion_juridica",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Situacion juridica<br>
<input name="campos[]" type="checkbox" value="detencion"'; 
$checa_array1=array_search("detencion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Detencion<br>
<input name="campos[]" type="checkbox" value="liberacion"'; 
$checa_array1=array_search("liberacion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Liberacion<br>
<input name="campos[]" type="checkbox" value="fianzas"'; 
$checa_array1=array_search("fianzas",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fianzas<br>
<input name="campos[]" type="checkbox" value="situacion_vehiculo"'; 
$checa_array1=array_search("situacion_vehiculo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Situacion vehiculo<br>
<input name="campos[]" type="checkbox" value="detencion_vehiculo"'; 
$checa_array1=array_search("detencion_vehiculo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Detencion vehiculo<br>
<input name="campos[]" type="checkbox" value="liberacion_vehiculo"'; 
$checa_array1=array_search("liberacion_vehiculo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Liberacion vehiculo<br>
<input name="campos[]" type="checkbox" value="fianzas_vehiculo"'; 
$checa_array1=array_search("fianzas_vehiculo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fianzas vehiculo<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="conductor_jurid"'; 
$checa_array1=array_search("conductor_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Conductor vehiculo<br>
<input name="campos[]" type="checkbox" value="telconductor"'; 
$checa_array1=array_search("telconductor",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Telefono 1<br>
<input name="campos[]" type="checkbox" value="telconductor2"'; 
$checa_array1=array_search("telconductor2",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Telefono 2<br>
<input name="campos[]" type="checkbox" value="siniestro"'; 
$checa_array1=array_search("siniestro",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Siniestro<br>
<input name="campos[]" type="checkbox" value="averiguacion"'; 
$checa_array1=array_search("averiguacion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Averiguacion<br>
<input name="campos[]" type="checkbox" value="autoridad"'; 
$checa_array1=array_search("autoridad",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Autoridad<br>
<input name="campos[]" type="checkbox" value="fecha_accidente"'; 
$checa_array1=array_search("fecha_accidente",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Fecha accidente<br>
<input name="campos[]" type="checkbox" value="numlesionados"'; 
$checa_array1=array_search("numlesionados",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Num. lesionados<br>
<input name="campos[]" type="checkbox" value="numhomicidios"'; 
$checa_array1=array_search("numhomicidios",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Num. homicidios<br>
<input name="campos[]" type="checkbox" value="delitos"'; 
$checa_array1=array_search("delitos",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Delitos<br>
<input name="campos[]" type="checkbox" value="danos"'; 
$checa_array1=array_search("danos",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Da�os<br>
<input name="campos[]" type="checkbox" value="lesiones"'; 
$checa_array1=array_search("lesiones",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Lesiones<br>
<input name="campos[]" type="checkbox" value="homicidios"'; 
$checa_array1=array_search("homicidios",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Homicidios<br>
<input name="campos[]" type="checkbox" value="ataques"'; 
$checa_array1=array_search("ataques",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ataques<br>
<input name="campos[]" type="checkbox" value="robo"'; 
$checa_array1=array_search("robo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Robo<br>
<input name="campos[]" type="checkbox" value="descripcion"'; 
$checa_array1=array_search("descripcion",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Descripcion<br>
<input name="campos[]" type="checkbox" value="lugar_hechos"'; 
$checa_array1=array_search("lugar_hechos",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Lugar hechos<br>
<input name="campos[]" type="checkbox" value="referencias"'; 
$checa_array1=array_search("referencias",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Referencias<br>
<input name="campos[]" type="checkbox" value="estado_jurid"'; 
$checa_array1=array_search("estado_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado<br>
<input name="campos[]" type="checkbox" value="municipio_jurid"'; 
$checa_array1=array_search("municipio_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Municipio<br>
<input name="campos[]" type="checkbox" value="colonia_jurid"'; 
$checa_array1=array_search("colonia_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Colonia<br>
<input name="campos[]" type="checkbox" value="ciudad_jurid"'; 
$checa_array1=array_search("ciudad_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ciudad<br>
<input name="campos[]" type="checkbox" value="ajustador_jurid"'; 
$checa_array1=array_search("ajustador_jurid",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ajustador<br>
<input name="campos[]" type="checkbox" value="telajustador"'; 
$checa_array1=array_search("telajustador",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ajustador tel 1<br>
<input name="campos[]" type="checkbox" value="telajustador2"'; 
$checa_array1=array_search("telajustador2",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ajustador tel 2<br>
</td>
<td width=20% valign=top>
<input name="campos[]" type="checkbox" value="monto_danos"'; 
$checa_array1=array_search("monto_danos",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Monto da�os<br>
<input name="campos[]" type="checkbox" value="monto_deducible"'; 
$checa_array1=array_search("monto_deducible",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Monto deducible<br>
<input name="campos[]" type="checkbox" value="resp_ajustador"'; 
$checa_array1=array_search("resp_ajustador",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Resp. ajustador<br>
<input name="campos[]" type="checkbox" value="resp_abogado"'; 
$checa_array1=array_search("resp_abogado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Resp. abogado<br>
<input name="campos[]" type="checkbox" value="resp_perito"'; 
$checa_array1=array_search("resp_perito",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Respo. perito<br>
<input name="campos[]" type="checkbox" value="resp_consignado"'; 
$checa_array1=array_search("resp_consignado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Resp. consignado<br>
<input name="campos[]" type="checkbox" value="juzgado"'; 
$checa_array1=array_search("juzgado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Juzgado<br>
<input name="campos[]" type="checkbox" value="causa_penal"'; 
$checa_array1=array_search("causa_penal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Causa penal<br>
<input name="campos[]" type="checkbox" value="procesado"'; 
$checa_array1=array_search("procesado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Procesado<br>
<input name="campos[]" type="checkbox" value="final_forma_pago"'; 
$checa_array1=array_search("final_forma_pago",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Forma de pago final<br>
<input name="campos[]" type="checkbox" value="final_comentario"'; 
$checa_array1=array_search("final_comentario",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Comentario final<br>
<input name="campos[]" type="checkbox" value="final_monto"'; 
$checa_array1=array_search("final_monto",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Monto final<br>
<input name="campos[]" type="checkbox" value="final_estado"'; 
$checa_array1=array_search("final_estado",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Estado final<br>
<input name="campos[]" type="checkbox" value="banderazo"'; 
$checa_array1=array_search("banderazo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Banderazo<br>
<input name="campos[]" type="checkbox" value="blindaje"'; 
$checa_array1=array_search("blindaje",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Blindaje<br>
<input name="campos[]" type="checkbox" value="maniobras"'; 
$checa_array1=array_search("maniobras",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Maniobras<br>
<input name="campos[]" type="checkbox" value="espera"'; 
$checa_array1=array_search("espera",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Espera<br>
<input name="campos[]" type="checkbox" value="otro"'; 
$checa_array1=array_search("otro",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Otro<br>
<input name="campos[]" type="checkbox" value="total"'; 
$checa_array1=array_search("total",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Total<br>
<input name="campos[]" type="checkbox" value="contactoext"'; 
$checa_array1=array_search("contactoext",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Contacto Ext<br>
<input name="campos[]" type="checkbox" value="terminoext"'; 
$checa_array1=array_search("terminoext",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Termino Ext<br>
<input name="campos[]" type="checkbox" value="cobertura"'; 
$checa_array1=array_search("cobertura",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Cobertura<br>
<input name="campos[]" type="checkbox" value="ejecutivo"'; 
$checa_array1=array_search("ejecutivo",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Ejecutivo<br>
<input name="campos[]" type="checkbox" value="adjuntar_bitacora"'; 
$checa_array1=array_search("adjuntar_bitacora",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Adjuntar bitacora<br>
<input name="campos[]" type="checkbox" value="adjuntar_bitacora_legal"'; 
$checa_array1=array_search("adjuntar_bitacora_legal",$campos);
if($checa_array1===FALSE){} else{echo' checked ';} 
echo'/> Adjuntar bitacora legal<br>
</td>
</tr></table>
</td>
</tr></table>
<table width=100% cellpadding=3 cellspacing=3 border=0>
<tr>
<td><b>Status:</b><br><select name="status" id="status">
<option value="all"'; 
if($status=="all"){echo' selected ';}
echo'>Indistinto</option>
<option value="abierto"'; 
if($status=="abierto"){echo' selected ';}
echo'>Abierto</option>
<option value="en tramite"'; 
if($status=="en tramite"){echo' selected ';}
echo'>En tramite</option>
<option value="concluido"'; 
if($status=="concluido"){echo' selected ';}
echo'>Concluido</option>
<option value="cancelado posterior"'; 
if($status=="cancelado posterior"){echo' selected ';}
echo'>Cancelado posterior</option>
<option value="cancelado al momento"'; 
if($status=="cancelado al momento"){echo' selected ';}
echo'>Cancelado al momento</option>
</select><p>
<b>Servicio:</b><br><select name="serviciof" id="serviciof"><option value="all"'; 
if($serviciof=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM servicios order by servicio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["id"].'"';
     if($serviciof==$row["id"]){echo"selected";}
	 echo'>'.$row["servicio"].'</option>';
  }}
echo'    </select><p>
<b>Empleado:</b><br><select name="empleadof" id="empleadof"><option value="all"'; 
if($empleadof=="all"){echo' selected ';}
echo'>Todos</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM Empleado order by nombre"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEmpleado"].'"';
     if($empleadof==$row["idEmpleado"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }}
echo'    </select><p>

<b>B�squeda(opcional):</b><br><input name="quest" type="text" size="20" id="quest" value="'.$quest.'"/>
</td>';

echo'<td>';



echo'<table border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="10" bgcolor="#eeeeee"><input name="filtrofecha1" type="checkbox" id="filtrofecha1" value="enabled" ';
	if($filtrofecha1=="enabled"){echo'checked';}
	echo'/></td>
    <td width="150" bgcolor="#eeeeee"><strong>Fecha de recepci�n</strong></td>
    <td width="180" bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($recepcion_d)){$recepcion_d=date("j");}	  
if(empty($recepcion_m)){$recepcion_m=date("m");}	  
if(empty($recepcion_a)){$recepcion_a=date("Y");}	
  
if(empty($recepcion_db)){$recepcion_db=date("j");}	  
if(empty($recepcion_mb)){$recepcion_mb=date("m");}	  
if(empty($recepcion_ab)){$recepcion_ab=date("Y");}	  

echo'<select name="recepcion_d" id="recepcion_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_m" id="recepcion_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_a" id="recepcion_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td width="180" bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="recepcion_db" id="recepcion_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="recepcion_mb" id="recepcion_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="recepcion_ab" id="recepcion_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$recepcion_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>

';

####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha2" type="checkbox" id="filtrofecha2" value="enabled" ';
	if($filtrofecha2=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha del suceso</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($suceso_d)){$suceso_d=date("j");}	  
if(empty($suceso_m)){$suceso_m=date("m");}	  
if(empty($suceso_a)){$suceso_a=date("Y");}	
  
if(empty($suceso_db)){$suceso_db=date("j");}	  
if(empty($suceso_mb)){$suceso_mb=date("m");}	  
if(empty($suceso_ab)){$suceso_ab=date("Y");}	  

echo'<select name="suceso_d" id="suceso_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_m" id="suceso_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_a" id="suceso_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="suceso_db" id="suceso_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="suceso_mb" id="suceso_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="suceso_ab" id="suceso_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$suceso_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';

####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha3" type="checkbox" id="filtrofecha3" value="enabled" ';
	if($filtrofecha3=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha apertura expediente</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($exped_d)){$exped_d=date("j");}	  
if(empty($exped_m)){$exped_m=date("m");}	  
if(empty($exped_a)){$exped_a=date("Y");}	
  
if(empty($exped_db)){$exped_db=date("j");}	  
if(empty($exped_mb)){$exped_mb=date("m");}	  
if(empty($exped_ab)){$exped_ab=date("Y");}	  

echo'<select name="exped_d" id="exped_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="exped_m" id="exped_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="exped_a" id="exped_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="exped_db" id="exped_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="exped_mb" id="exped_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="exped_ab" id="exped_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$exped_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';



##########




####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha4" type="checkbox" id="filtrofecha4" value="enabled" ';
	if($filtrofecha4=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha Asignacion Proveedor</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($asignax_d)){$asignax_d=date("j");}	  
if(empty($asignax_m)){$asignax_m=date("m");}	  
if(empty($asignax_a)){$asignax_a=date("Y");}	
  
if(empty($asignax_db)){$asignax_db=date("j");}	  
if(empty($asignax_mb)){$asignax_mb=date("m");}	  
if(empty($asignax_ab)){$asignax_ab=date("Y");}	  

echo'<select name="asignax_d" id="asignax_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="asignax_m" id="asignax_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="asignax_a" id="asignax_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="asignax_db" id="asignax_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="asignax_mb" id="asignax_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="asignax_ab" id="asignax_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$asignax_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';



##########


####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha5" type="checkbox" id="filtrofecha5" value="enabled" ';
	if($filtrofecha5=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha de Contacto</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($contactxx_d)){$contactxx_d=date("j");}	  
if(empty($contactxx_m)){$contactxx_m=date("m");}	  
if(empty($contactxx_a)){$contactxx_a=date("Y");}	
  
if(empty($contactxx_db)){$contactxx_db=date("j");}	  
if(empty($contactxx_mb)){$contactxx_mb=date("m");}	  
if(empty($contactxx_ab)){$contactxx_ab=date("Y");}	  

echo'<select name="contactxx_d" id="contactxx_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="contactxx_m" id="contactxx_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="contactxx_a" id="contactxx_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="contactxx_db" id="contactxx_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="contactxx_mb" id="contactxx_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="contactxx_ab" id="contactxx_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$contactxx_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';



##########



####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha6" type="checkbox" id="filtrofecha6" value="enabled" ';
	if($filtrofecha6=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha de Arribo</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($arribox_d)){$arribox_d=date("j");}	  
if(empty($arribox_m)){$arribox_m=date("m");}	  
if(empty($arribox_a)){$arribox_a=date("Y");}	
  
if(empty($arribox_db)){$arribox_db=date("j");}	  
if(empty($arribox_mb)){$arribox_mb=date("m");}	  
if(empty($arribox_ab)){$arribox_ab=date("Y");}	  

echo'<select name="arribox_d" id="arribox_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="arribox_m" id="arribox_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="arribox_a" id="arribox_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="arribox_db" id="arribox_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="arribox_mb" id="arribox_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="arribox_ab" id="arribox_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$arribox_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';

####################
echo' <tr>
    <td  bgcolor="#eeeeee"><input name="filtrofecha7" type="checkbox" id="filtrofecha7" value="enabled" ';
	if($filtrofecha7=="enabled"){echo'checked';}
	echo'/></td>
    <td  bgcolor="#eeeeee"><strong>Fecha del Accidente</strong></td>
    <td  bgcolor="#eeeeee"><strong>Inicial:</strong> '; 
	
if(empty($accidenx_d)){$accidenx_d=date("j");}	  
if(empty($accidenx_m)){$accidenx_m=date("m");}	  
if(empty($accidenx_a)){$accidenx_a=date("Y");}	
  
if(empty($accidenx_db)){$accidenx_db=date("j");}	  
if(empty($accidenx_mb)){$accidenx_mb=date("m");}	  
if(empty($accidenx_ab)){$accidenx_ab=date("Y");}	  

echo'<select name="accidenx_d" id="accidenx_d">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_d){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="accidenx_m" id="accidenx_m">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_m){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="accidenx_a" id="accidenx_a">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_a){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

	
	echo'</td>
    <td  bgcolor="#eeeeee"><strong>Final:</strong> ';
	

echo'<select name="accidenx_db" id="accidenx_db">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_db){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="accidenx_mb" id="accidenx_mb">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_mb){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="accidenx_ab" id="accidenx_ab">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$accidenx_ab){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';	
	
	
	
	echo'</td>
  </tr>';



##########


##########
echo'</table>';


echo'<p><b>Ordenar por:</b><br>
<select name="sort" id="sort">';

  echo'<option value="servicios.servicio"';
     if($sort=="servicios.servicio"){echo"selected";}
	 echo'>Servicio</option>';
	 
  echo'<option value="general.contrato"';
     if($sort=="general.contrato"){echo"selected";}
	 echo'>Contrato</option>';
	 
	   echo'<option value="Empleado.nombre"';
     if($sort=="Empleado.nombre"){echo"selected";}
	 echo'>Empleado</option>';
	 
	 	   echo'<option value="Cliente.nombre"';
     if($sort=="Cliente.nombre"){echo"selected";}
	 echo'>Cliente</option>';
	 
	 
	   echo'<option value="general.fecha_recepcion"';
     if($sort=="general.fecha_recepcion"){echo"selected";}
	 echo'>Fecha recepcion</option>';
	 

echo'</select>
<select name="ascdesc" id="ascdesc">
<option value="asc"'; 
if($ascdesc=="asc"){echo' selected ';}
echo'>Ascendente</option>
<option value="desc"'; 
if($ascdesc=="desc"){echo' selected ';}
echo'>Descendente</option>
</select>
<input type="submit" name="Submit2" value="- M o s t r a r -"/></td>';

}

############################################################################################################

?>

  </tr>
</table>
</form>