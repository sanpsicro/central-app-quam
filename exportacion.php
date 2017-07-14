<?php  
$tablax = $_POST['tablax'];
$campos = $_POST['campos'];

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<script type="text/javascript" src="saber.js"></script>
<script type="text/javascript">
<!--
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
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}
// -->
</script>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Exportaci&oacute;n</span></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
          <tr>
            <td> <div id="dry"><?php  
			ini_set("display_errors","1");
			error_reporting(E_ALL ^ E_NOTICE);
            include("exportselects.php"); 
			?></div></td>
         </tr>
        </table>
    </td>
  </tr>
<tr><td>
<?php  
function existe($cadena,$arreglo)
{
	return (in_array($cadena,$arreglo)===FALSE?FALSE:TRUE);
}
if(isset($tablax) && $tablax!=""){
###########################################################################
if($tablax=="Empleado"){

$condicion="where Empleado.idEmpleado!='0'";

if($activo=="all"){$subcondicion1="";}
if($activo=="si"){$subcondicion1="and Empleado.activo='1'";}
if($activo=="no"){$subcondicion1="and Empleado.activo='0'";}

if($departamento=="all"){$subcondicion2="";}
else{$subcondicion2="and Empleado.idDepartamento='$departamento'";}

if(isset($quest) && $quest!="" && $quest!=" "){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$subcondicion3=" and (Empleado.usuario LIKE '%$quest%' or Empleado.nombre LIKE '%$quest%' or Empleado.cargo LIKE '%$quest%' or Empleado.direccion LIKE '%$quest%' or Empleado.telefonoCasa LIKE '%$quest%' or Empleado.telefonoCelular LIKE '%$quest%' or Empleado.nextel LIKE '%$quest%' or Empleado.idnextel LIKE '%$quest%' or Empleado.email LIKE '%$quest%' or Empleado.activo LIKE '%$quest%' or Departamento.nombre LIKE '%$quest%' or Colonia.NombreColonia LIKE '%$quest%' or Municipio.NombreMunicipio like '%$quest%' or Estado.NombreEstado like '%$quest%')";
}
else{$subcondicion3="";}


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT Empleado.idEmpleado, Empleado.usuario, Empleado.nombre, Empleado.cargo, Empleado.direccion, Empleado.telefonoCasa, Empleado.telefonoCelular, Empleado.nextel, Empleado.idnextel, Empleado.email, Empleado.activo, Departamento.nombre as depa, Colonia.NombreColonia, Municipio.NombreMunicipio, Estado.NombreEstado from Empleado left join Departamento on (Empleado.idDepartamento = Departamento.idDepartamento) left join Colonia on (Empleado.colonia = Colonia.idColonia) left join Municipio on (Empleado.municipio = Municipio.idMunicipio) left join Estado on (Empleado.estado = Estado.idEstado)  $condicion $subcondicion1 $subcondicion2 $subcondicion3 order by $sort $ascdesc"); 
if (mysqli_num_rows($result)){ 
$comprime_columnas=implode(",",$campos);
echo'<form action="exporta.php" method="post" name="frm" target="_blank">
<input name="modulo" type="hidden" value="'.$tablax.'" />
<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
<input name="ordena" type="hidden" value="'.$sort.'" />
<input name="updown" type="hidden" value="'.$ascdesc.'" />
<table width="100%" border="0" cellspacing="3" cellpadding="3">
                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

				 
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nombre</strong></td>';} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Usuario</strong></td>';} 				$checa_array1=array_search("cargo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Cargo</strong></td>';}
$checa_array1=array_search("departamento",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Departamento</strong></td>';}
$checa_array1=array_search("activo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Activo</strong></td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Direcci�n</strong></td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia</strong></td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio</strong></td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel�fono</strong></td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Celular</strong></td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nextel</strong></td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>ID Nextel</strong></td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Email</strong></td>';}


echo'
    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
  </tr>';

$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 

if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}


echo"<tr style='background-color: $bgcolor'>";
if(existe("nombre",$campos)){echo'<td class="dataclass" align=middle>'.$row["nombre"].'</td>';} 
if(existe("usuario",$campos)){echo'<td class="dataclass" align=middle>'.$row["usuario"].'</td>';} 				
if(existe("cargo",$campos)){echo'<td class="dataclass" align=middle>'.$row["cargo"].'</td>';}
if(existe("departamento",$campos)){echo'<td class="dataclass" align=middle>'.$row["depa"].'</td>';}
if(existe("activo",$campos)){echo'<td class="dataclass" align=middle>'.$row["activo"].'</td>';}
if(existe("direccion",$campos)){echo'<td class="dataclass" align=middle>'.$row["direccion"].'</td>';}
if(existe("colonia",$campos)){echo'<td class="dataclass" align=middle>'.$row["NombreColonia"].'</td>';}
if(existe("municipio",$campos)){echo'<td class="dataclass" align=middle>'.$row["NombreMunicipio"].'</td>';}
if(existe("estado",$campos)){echo'<td class="dataclass" align=middle>'.$row["NombreEstado"].'</td>';}
if(existe("tel",$campos)){echo'<td class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>';}
if(existe("cel",$campos)){echo'<td class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>';}
if(existe("nextel",$campos)){echo'<td class="dataclass" align=middle>'.$row["nextel"].'</td>';}
if(existe("idnextel",$campos)){echo'<td class="dataclass" align=middle>'.$row["idnextel"].'</td>';}
if(existe("mail",$campos)){echo'<td class="dataclass" align=middle>'.$row["email"].'</td>';}
  

echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["idEmpleado"].'"/></td>  
    </tr>';
  }  

echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
<br><br>
<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
<br><br>
<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
<option value="excel">Exportar a excel</option> 
<option value="print">Imprimir</option>
</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
}
#==================================

######################################################################
## Nokrosis

if($tablax=="validaciones"){

	$condicion="WHERE uc.id!=''";

	if($activo=="all"){$subcondicion1="";}
	if($activo=="si"){$subcondicion1="AND uc.status='validado'";}
	if($activo=="no"){$subcondicion1="AND uc.status='no validado'";}


	if(isset($quest) && $quest!="" && $quest!=" "){
	echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
	$subcondicion3=" AND (uc.contrato LIKE '%$quest%' OR uc.inciso LIKE '%$quest%' OR uc.clave LIKE '%$quest%' OR uc.nombre like '%$quest%' OR v.tipo_pago like '%$quest%' OR v.observaciones like '%$quest%')";
	}
	else{$subcondicion3="";}


	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT uc.id,uc.contrato,uc.inciso,uc.clave,uc.nombre,DATE_FORMAT(uc.fecha_inicio,'%e/%m/%Y') as fecha_inicio, DATE_FORMAT(uc.fecha_vencimiento,'%e/%m/%Y') as fecha_vencimiento,uc.status,v.tipo_pago,v.fecha_pago, DATE_FORMAT(v.fecha_pago_comision,'%e/%m/%Y') as fecha_pago_comision,v.cuenta_ingreso,v.observaciones,v.comision_vendedor FROM usuarios_contrato uc LEFT JOIN validaciones v ON (uc.id=v.clave_usuario)  $condicion $subcondicion1 $subcondicion3 ORder by $sort $ascdesc") or die(mysqli_error($link)); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';


	if(existe("contrato",$campos)){echo'<td align=middle class="titles">Contrato</td>';} 
	if(existe("inciso",$campos)){echo'<td align=middle class="titles">Inciso</td>';} 				
	if(existe("clave",$campos)){echo'<td align=middle class="titles">Clave</td>';}
	if(existe("nombre",$campos)){echo'<td align=middle class="titles">Nombre</td>';}
	if(existe("fecha_inicio",$campos)){echo'<td align=middle class="titles">Fecha de Inicio</td>';}
	if(existe("fecha_vencimiento",$campos)){echo'<td align=middle class="titles">Fecha de Vencimiento</td>';}
	if(existe("status",$campos)){echo'<td align=middle class="titles">Status</td>';}
	if(existe("tipo_pago",$campos)){echo'<td align=middle class="titles">Tipo de pago</td>';}
	if(existe("fecha_pago",$campos)){echo'<td align=middle class="titles">Fecha de pago</td>';}
	if(existe("cuenta_ingreso",$campos)){echo'<td align=middle class="titles">Cuenta de Ingreso</td>';}
	if(existe("observaciones",$campos)){echo'<td align=middle class="titles">Observaciones</td>';}
	if(existe("comision_vendedor",$campos)){echo'<td align=middle class="titles">Comision Vendedor</td>';}
	if(existe("fecha_pago_comision",$campos)){echo'<td align=middle class="titles">Fecha de pago de comision</td>';}


	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 


	echo "<tr style='background-color: $bgcolor;'>";
	  
	if(existe("contrato",$campos)){echo'<td class="dataclass" align=middle>'.$row["contrato"].'</td>';} 
	if(existe("inciso",$campos)){echo'<td class="dataclass" align=middle>'.$row["inciso"].'</td>';} 				
	if(existe("clave",$campos)){echo'<td class="dataclass" align=middle>'.$row["clave"].'</td>';}
	if(existe("nombre",$campos)){echo'<td class="dataclass" align=middle>'.$row["nombre"].'</td>';}
	if(existe("fecha_inicio",$campos)){echo'<td class="dataclass" align=middle>'.$row["fecha_inicio"].'</td>';}
	if(existe("fecha_vencimiento",$campos)){echo'<td class="dataclass" align=middle>'.$row["fecha_vencimiento"].'</td>';}
	if(existe("status",$campos)){echo'<td class="dataclass" align=middle>'.$row["status"].'</td>';}
	if(existe("tipo_pago",$campos)){echo'<td class="dataclass" align=middle>'.$row["tipo_pago"].'</td>';}
	if(existe("fecha_pago",$campos)){echo'<td class="dataclass" align=middle>'.$row["fecha_pago"].'</td>';}
	if(existe("cuenta_ingreso",$campos)){echo'<td class="dataclass" align=middle>'.$row["cuenta_ingreso"].'</td>';}
	if(existe("observaciones",$campos)){echo'<td class="dataclass" align=middle>'.$row["observaciones"].'</td>';}
	if(existe("comision_vendedor",$campos)){echo'<td class="dataclass" align=middle>'.$row["comision_vendedor"].'</td>';}
	if(existe("fecha_pago_comision",$campos)){echo'<td class="dataclass" align=middle>'.$row["fecha_pago_comision"].'</td>';}
	  

	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["id"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}
#----------------------------------------------------------------------------------------------------
if($tablax=="ventas"){


       if(isset($_POST['filtrofecha1'])){
         $fecha_inicial =   $recepcion_a . "-". $recepcion_m ."-".$recepcion_d;
         $fecha_final=   $recepcion_ab . "-". $recepcion_mb ."-".$recepcion_db;
          $intervalo = "AND fecha_inicio >=  '".$fecha_inicial."'
AND fecha_vencimiento <=  '".$fecha_final."'";
       }else{
       $intervalo = "";
       }

        if($sort == 'nombre'){
        $sort = 'cliente';
        }

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT Poliza.idPoliza, Poliza.numPoliza as numPoliza, Cliente.nombre as cliente, Cliente.tipocliente, Empleado.nombre as vendedor, usuarios_contrato.status, SUM(usuarios_contrato.monto) as monto, SUM(usuarios_contrato.ingreso) as ingreso, usuarios_contrato.contrato, usuarios_contrato.estado as estado, usuarios_contrato.municipio as municipio, usuarios_contrato.serie as serie, usuarios_contrato.fecha_vencimiento as vigencia 
FROM usuarios_contrato 
inner join Poliza on usuarios_contrato.idpoliza = Poliza.idpoliza 
inner join Cliente on Poliza.idcliente = Cliente.idcliente
inner join Empleado on Cliente.idempleado = Empleado.idempleado
where usuarios_contrato.clave like '%$numcon%' $intervalo  group by usuarios_contrato.contrato order by $sort $ascdesc") or die(mysql_error()); 

	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';


	if(existe("cliente",$campos)){echo'<td align=middle class="titles">Cliente</td>';} 
	if(existe("numPoliza",$campos)){echo'<td align=middle class="titles">Num. Poliza</td>';} 				
	if(existe("vendedor",$campos)){echo'<td align=middle class="titles">Vendedor</td>';}
	if(existe("monto",$campos)){echo'<td align=middle class="titles">Monto</td>';}
	
	if(existe("ingreso",$campos)){echo'<td align=middle class="titles">Ingreso</td>';}
	if(existe("estado",$campos)){echo'<td align=middle class="titles">Estado</td>';}
	if(existe("municipio",$campos)){echo'<td align=middle class="titles">Municipio</td>';}
	if(existe("serie",$campos)){echo'<td align=middle class="titles">Serie</td>';}
	if(existe("vigencia",$campos)){echo'<td align=middle class="titles">Vigencia</td>';}	

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 


	echo "<tr style='background-color: $bgcolor;'>";
	  
	if(existe("cliente",$campos)){echo'<td class="dataclass" align=middle>'.$row["cliente"].'</td>';} 
	if(existe("numPoliza",$campos)){echo'<td class="dataclass" align=middle>'.$row["numPoliza"].'</td>';} 				
	if(existe("vendedor",$campos)){echo'<td class="dataclass" align=middle>'.$row["vendedor"].'</td>';}
	if(existe("monto",$campos)){echo'<td class="dataclass" align=middle>'.$row["monto"].'</td>';}
	if(existe("ingreso",$campos)){echo'<td class="dataclass" align=middle>'.$row["ingreso"].'</td>';}
	if(existe("estado",$campos)){echo'<td class="dataclass" align=middle>'.$row["estado"].'</td>';}
	if(existe("municipio",$campos)){echo'<td class="dataclass" align=middle>'.$row["municipio"].'</td>';}
	if(existe("serie",$campos)){echo'<td class="dataclass" align=middle>'.$row["serie"].'</td>';}		
if(existe("vigencia",$campos)){echo'<td class="dataclass" align=middle>'.$row["vigencia"].'</td>';}			

	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["idPoliza"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}

#----------------------------------------------------------------------------------------------------
if($tablax=="pagos"){


	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT pagos.id, pagos.conceptor, pagos.monto, pagos.status, Provedor.nombre from pagos left join Provedor on (pagos.proveedor = Provedor.id) $condicion order by $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';


	if(existe("nombre",$campos)){echo'<td align=middle class="titles">Nombre</td>';} 
	if(existe("conceptor",$campos)){echo'<td align=middle class="titles">Concepto</td>';} 				
	if(existe("monto",$campos)){echo'<td align=middle class="titles">Monto</td>';}
	if(existe("status",$campos)){echo'<td align=middle class="titles">Status</td>';}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 


	echo "<tr style='background-color: $bgcolor;'>";
	  
	if(existe("nombre",$campos)){echo'<td class="dataclass" align=middle>'.$row["nombre"].'</td>';} 
	if(existe("conceptor",$campos)){echo'<td class="dataclass" align=middle>'.$row["conceptor"].'</td>';} 				
	if(existe("monto",$campos)){echo'<td class="dataclass" align=middle>'.$row["monto"].'</td>';}
	if(existe("status",$campos)){echo'<td class="dataclass" align=middle>'.($row["status"] == 1 ? "Pagado" : "No Pagado" ).'</td>';}

	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["id"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}
#----------------------------------------------------------------------------------------------------
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

if($filtrofecha1=="enabled"){$subcondicion5="and (general.fecha_recepcion >= '$recepcion_a-$recepcion_m-$recepcion_d 00:00:00' and general.fecha_recepcion <= '$recepcion_ab-$recepcion_mb-$recepcion_db 23:59:59')";}
else{$subcondicion5="";}

if($filtrofecha2=="enabled"){$subcondicion6="and (cobranza.fecha >= '$suceso_a-$suceso_m-$suceso_d 00:00:00' and general.fecha_suceso <= '$suceso_ab-$suceso_mb-$suceso_db 23:59:59')";}
else{$subcondicion6="";}

if($status!="todos"){$subcondicionx7="and cobranza.status = '$status'";}
else{$subcondicionx7="";}

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT cobranza.id, cobranza.conceptor, cobranza.monto, cobranza.status, cobranza.fecha, Cliente.nombre, general.fecha_recepcion, general.id as 'ide', general.status as 'statusc'
							FROM cobranza,general,Cliente 
							WHERE cobranza.expediente=general.expediente 
								AND general.idCliente=Cliente.idCliente $subcondicion5 $subcondicion6 $subcondicionx7
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';} 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["ide"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}

#----------------------------------------------------------------------------------------------------
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

if($filtrofecha1=="enabled"){$subcondicion5="and (general.fecha_recepcion >= '$recepcion_a-$recepcion_m-$recepcion_d 00:00:00' and general.fecha_recepcion <= '$recepcion_ab-$recepcion_mb-$recepcion_db 23:59:59')";}
else{$subcondicion5="";}

if($filtrofecha2=="enabled"){$subcondicion6="and (pagos.fecha_pago >= '$suceso_a-$suceso_m-$suceso_d 00:00:00' and pagos.fecha_pago <= '$suceso_ab-$suceso_mb-$suceso_db 23:59:59')";}
else{$subcondicion6="";}

if($filtrofecha3=="enabled"){$subcondicion8="and (cobranza.fecha >= '$cobranza_a-$cobranza_m-$cobranza_d 00:00:00' and cobranza.fecha <= '$cobranza_ab-$cobranza_mb-$cobranza_db 23:59:59')";}
else{$subcondicion8="";}

if($status!="todos"){$subcondicionx7="and cobranza.status = '$status'";}
else{$subcondicionx7="";}

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT cobranza.id, cobranza.conceptor, cobranza.monto as 'monto', cobranza.status as 'status', cobranza.fecha as 'fecha', pagos.expediente, pagos.status as 'statusp', pagos.fecha_pago as 'fechap', pagos.monto as 'montop', Cliente.nombre, general.fecha_recepcion, general.id as 'ide', general.status as 'statusc'  
							FROM cobranza,general,Cliente, pagos 
							WHERE cobranza.expediente=general.expediente
							 	AND pagos.expediente=general.expediente 
								AND general.idCliente=Cliente.idCliente $subcondicion5 $subcondicion6 $subcondicion8 $subcondicionx7
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';
	
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';				        } 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["ide"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}

#----------------------------------------------------------------------------------------------------


if($tablax=="proveedores"){

if($status!="todos"){$condicion2p="and p.status = '$status'";}
else{$condicion2p="";}

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT 	p.id,
									p.nombre,
									p.usuario,
									p.contrasena,
									p.calle,
									p.colonia,
									e.NombreEstado as estado,
									m.NombreMunicipio as municipio,
									p.especialidad,
									p.horario,
									p.contacto,
									p.tel,
									p.fax,
									p.cel,
									p.nextel,
									p.nextelid,
									p.nextelid2,
									p.telcasa,
									p.telcasa2,
									p.mail,
									p.contacto2,
									p.tel2,
									p.fax2,
									p.cel2,
									p.nextel2,
									p.mail2,
									p.banco,
									p.numcuenta,
									p.clabe,
									p.observaciones,
									p.status
							FROM	Provedor p,Estado e,Municipio m
							WHERE	p.estado=e.idEstado
							AND		p.municipio=m.idMunicipio
							$condicion $condicion2p
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';


	if(existe("nombre",$campos)){echo'<td align=middle class="titles">Nombre</td>';} 
	if(existe("usuario",$campos)){echo'<td align=middle class="titles">Usuario</td>';} 				
	if(existe("contrasena",$campos)){echo'<td align=middle class="titles">Contrase&ntilde;a</td>';}
	if(existe("calle",$campos)){echo'<td align=middle class="titles">Calle</td>';}
	if(existe("colonia",$campos)){echo'<td align=middle class="titles">Colonia</td>';}
	if(existe("estado",$campos)){echo'<td align=middle class="titles">Estado</td>';}
	if(existe("municipio",$campos)){echo'<td align=middle class="titles">Municipio</td>';}
	if(existe("especialidad",$campos)){echo'<td align=middle class="titles">Especialidad</td>';}
	if(existe("horario",$campos)){echo'<td align=middle class="titles">Horario</td>';}
	if(existe("contacto",$campos)){echo'<td align=middle class="titles">Contacto 1</td>';}
	if(existe("tel",$campos)){echo'<td align=middle class="titles">Tel. Oficina 1</td>';}
	if(existe("tel2",$campos)){echo'<td align=middle class="titles">Tel. Oficina 2</td>';}
	if(existe("fax2",$campos)){echo'<td align=middle class="titles">Tel. Oficina 3</td>';}
	if(existe("fax",$campos)){echo'<td align=middle class="titles">Tel / Fax</td>';}
	if(existe("cel",$campos)){echo'<td align=middle class="titles">Celular</td>';}
	if(existe("nextel",$campos)){echo'<td align=middle class="titles">Nextel</td>';}
	if(existe("nextelid",$campos)){echo'<td align=middle class="titles">ID Nextel</td>';}
	if(existe("telcasa",$campos)){echo'<td align=middle class="titles">Tel. Casa</td>';}
	if(existe("mail",$campos)){echo'<td align=middle class="titles">E-mail</td>';}
	if(existe("contacto2",$campos)){echo'<td align=middle class="titles">Contacto 2</td>';}
	if(existe("cel2",$campos)){echo'<td align=middle class="titles">Celular</td>';}
	if(existe("nextel2",$campos)){echo'<td align=middle class="titles">Nextel</td>';}
	if(existe("nextelid2",$campos)){echo'<td align=middle class="titles">ID Nextel</td>';}
	if(existe("telcasa2",$campos)){echo'<td align=middle class="titles">Tel. Casa</td>';}
	if(existe("mail2",$campos)){echo'<td align=middle class="titles">E-mail</td>';}
	if(existe("banco",$campos)){echo'<td align=middle class="titles">Banco</td>';}
	if(existe("numcuenta",$campos)){echo'<td align=middle class="titles">Num. Cuenta</td>';}
	if(existe("clabe",$campos)){echo'<td align=middle class="titles">CLABE</td>';}
	if(existe("observaciones",$campos)){echo'<td align=middle class="titles">Observaciones</td>';}
	if(existe("status",$campos)){echo'<td align=middle class="titles">Status</td>';}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 


	echo "<tr style='background-color: $bgcolor;'>";
	  
	if(existe("nombre",$campos)){echo'<td class="dataclass" align=middle>'.$row["nombre"].'</td>';} 
	if(existe("usuario",$campos)){echo'<td class="dataclass" align=middle>'.$row["usuario"].'</td>';} 				
	if(existe("contrasena",$campos)){echo'<td class="dataclass" align=middle>'.$row["contrasena"].'</td>';}
	if(existe("calle",$campos)){echo'<td class="dataclass" align=middle>'.$row["calle"].'</td>';}
	if(existe("colonia",$campos)){echo'<td class="dataclass" align=middle>'.$row["colonia"].'</td>';}
	if(existe("estado",$campos)){echo'<td class="dataclass" align=middle>'.$row["estado"].'</td>';}
	if(existe("municipio",$campos)){echo'<td class="dataclass" align=middle>'.$row["municipio"].'</td>';}
	if(existe("especialidad",$campos)){echo'<td class="dataclass" align=middle>'.$row["especialidad"].'</td>';}
	if(existe("horario",$campos)){echo'<td class="dataclass" align=middle>'.$row["horario"].'</td>';}
	if(existe("contacto",$campos)){echo'<td class="dataclass" align=middle>'.$row["contacto"].'</td>';}
	if(existe("tel",$campos)){echo'<td class="dataclass" align=middle>'.$row["tel"].'</td>';}
	if(existe("tel2",$campos)){echo'<td class="dataclass" align=middle>'.$row["tel2"].'</td>';}
	if(existe("fax2",$campos)){echo'<td class="dataclass" align=middle>'.$row["fax2"].'</td>';}
	if(existe("fax",$campos)){echo'<td class="dataclass" align=middle>'.$row["fax"].'</td>';}
	if(existe("cel",$campos)){echo'<td class="dataclass" align=middle>'.$row["cel"].'</td>';}
	if(existe("nextel",$campos)){echo'<td class="dataclass" align=middle>'.$row["nextel"].'</td>';}
	if(existe("nextelid",$campos)){echo'<td class="dataclass" align=middle>'.$row["nextelid"].'</td>';}
	if(existe("telcasa",$campos)){echo'<td class="dataclass" align=middle>'.$row["telcasa"].'</td>';}
	if(existe("mail",$campos)){echo'<td class="dataclass" align=middle>'.$row["mail"].'</td>';}
	if(existe("contacto2",$campos)){echo'<td class="dataclass" align=middle>'.$row["contacto2"].'</td>';}
	if(existe("cel2",$campos)){echo'<td class="dataclass" align=middle>'.$row["cel2"].'</td>';}
	if(existe("nextel2",$campos)){echo'<td class="dataclass" align=middle>'.$row["nextel2"].'</td>';}
	if(existe("nextelid2",$campos)){echo'<td class="dataclass" align=middle>'.$row["nextelid2"].'</td>';}
	if(existe("telcasa2",$campos)){echo'<td class="dataclass" align=middle>'.$row["telcasa2"].'</td>';}
	if(existe("mail2",$campos)){echo'<td class="dataclass" align=middle>'.$row["mail2"].'</td>';}
	if(existe("banco",$campos)){echo'<td class="dataclass" align=middle>'.$row["banco"].'</td>';}
	if(existe("numcuenta",$campos)){echo'<td class="dataclass" align=middle>'.$row["numcuenta"].'</td>';}
	if(existe("clabe",$campos)){echo'<td class="dataclass" align=middle>'.$row["clabe"].'</td>';}
	if(existe("observaciones",$campos)){echo'<td class="dataclass" align=middle>'.$row["observaciones"].'</td>';}
	if(existe("status",$campos)){echo'<td class="dataclass" align=middle>'.$row["status"].'</td>';}

	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["id"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}
#----------------------------------------------------------------------------------------------------
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
	
	if(isset($quest) && $quest!="" && $quest!=" "){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$subcondicion1=" and (g.contrato like '%$quest%' OR e.general like '%$quest%')";
}
else{$subcondicion1="";}

if($filtrofecha1=="enabled"){$subcondicion2="and (g.fecha_recepcion >= '$recepcion_a-$recepcion_m-$recepcion_d 00:00:00' and g.fecha_recepcion <= '$recepcion_ab-$recepcion_mb-$recepcion_db 23:59:59')";}
else{$subcondicion2="";}

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT 	e.*, g.contrato, g.fecha_recepcion 
							FROM	evaluaciones e, general g 
							WHERE e.general=g.id
							$subcondicion1 $subcondicion2
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';} 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["id"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}

#----------------------------------------------------------------------------------------------------
if($tablax=="comisiones"){

	$arrayCampos=array(
		"vendedor"	=>	"Vendedor",
		"contrato"	=>	"Contrato",
		"comision"	=>	"Comision",
		"status"		=>	"Status"
	);

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT p.numPoliza as contrato,SUM(uc.comision) as comision,e.nombre as vendedor,cc.status 
							FROM Poliza p left join comisiones_contratos cc on (cc.contrato=p.numPoliza),Empleado e,usuarios_contrato uc 
							WHERE  uc.status = 'validado' 
								AND e.idEmpleado=p.idEmpleado 
								AND uc.contrato=p.numPoliza 
							GROUP BY uc.contrato
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';} 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["contrato"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}

#----------------------------------------------------------------------------------------------------
if($tablax=="facturas"){

	$arrayCampos=array(
		"factura"	=>	"Factura",
		"nombre"	=>	"Cliente",
		"fecha"	=>	"Fecha",
		"total"	=>	"Total",
		"statusfactura"		=>	"Status"
	);

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT facturas.id as factid,
								facturas.cliente, 
								facturas.factura, 
								DATE_FORMAT(facturas.fecha,'%e/%m/%Y') as fecha,
								facturas.total, 
								facturas.status as statusfactura, 
								Cliente.nombre 
							FROM facturas left join Cliente on (facturas.cliente = Cliente.idCliente)
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';} 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["factid"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}#----------------------------------------------------------------------------------------------------
if($tablax=="notas_remision"){

	$arrayCampos=array(
		"factura"	=>	"Nota",
		"nombre"	=>	"Cliente",
		"fecha"	=>	"Fecha",
		"total"	=>	"Total",
		"statusfactura"		=>	"Status"
	);

	$link = mysqli_connect($host, $username, $pass,$database); 
	////mysql_select_db($database, $link); 
	$result = mysqli_query($link,"SELECT 
								notasremision.id as factid, 
								notasremision.cliente, 
								notasremision.factura, 
								DATE_FORMAT(notasremision.fecha,'%e/%m/%Y') as fecha,
								notasremision.total, 
								notasremision.status as statusfactura, 
								Cliente.nombre 
							FROM notasremision left join Cliente on (notasremision.cliente = Cliente.idCliente)
							ORDER BY $sort $ascdesc") or die(mysql_error()); 
	if (mysqli_num_rows($result)){ 
	$comprime_columnas=implode(",",$campos);
	echo'<form action="exporta.php" method="post" name="frm" target="_blank">
	<input name="modulo" type="hidden" value="'.$tablax.'" />
	<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
	<input name="ordena" type="hidden" value="'.$sort.'" />
	<input name="updown" type="hidden" value="'.$ascdesc.'" />
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	                 <tr style="background-color: #bbbbbb; font-weight: bold; text-align: center;">';

	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo "<td align=middle class=titles>$nombreLegible</td>";} 
	}

	echo'
	    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
	  </tr>';

	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
	echo "<tr style='background-color: $bgcolor;'>";
	  
	foreach($arrayCampos as $nombreCampo => $nombreLegible)
	{
		if(existe($nombreCampo,$campos)){echo'<td class="dataclass" align=middle>'.$row[$nombreCampo].'</td>';} 
	}
	echo'<td class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["factid"].'"/></td>  
	    </tr>';
	  }  

	echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
	<br><br>
	<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
	<br><br>
	<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
	<option value="excel">Exportar a excel</option> 
	<option value="print">Imprimir</option>
	</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
	  }
	else{echo'<center><b>No hay resultados</b></center>';}
}
###########################################################################
if($tablax=="Cliente"){

$condicion="where Cliente.idCliente!=0";

if($status=="all"){$subcondicion1="";}
if($status=="validado"){$subcondicion1="and usuarios_contrato.status='validado'";}
if($status=="no validado"){$subcondicion1="and usuarios_contrato.status='no validado'";}

if($vendedor=="all"){$subcondicion2="";}
else{$subcondicion2="and Cliente.idEmpleado='$vendedor'";}

if($tipo_cliente=="all"){$subcondicion3="";}
else{$subcondicion3="and Cliente.tipocliente='$tipo_cliente'";}


if(isset($quest) && $quest!="" && $quest!=" "){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$subcondicion4=" and (Cliente.usuario like '%$quest%' or Cliente.nombre like '%$quest%' or Cliente.rfc like '%$quest%' or Cliente.contacto like '%$quest%' or Cliente.fisCalle like '%$quest%' or Cliente.fisNumero like '%$quest%' or Cliente.fisCiudad like '%$quest%' or Cliente.calle like '%$quest%' or Cliente.numero like '%$quest%' or Cliente.ciudad like '%$quest%' or Cliente.telefonoCasa like '%$quest%' or Cliente.telefonoOficina like '%$quest%' or Cliente.fax like '%$quest%' or Cliente.extension like '%$quest%' or Cliente.telefonoCelular like '%$quest%' or Cliente.nextel like '%$quest%' or Cliente.TelNextel like '%$quest%' or Cliente.email like '%$quest%' or Cliente.status like '%$quest%' or TipoCliente.nombre like '%$quest%' or Colonia.NombreColonia like '%$quest%' or Municipio.NombreMunicipio like '%$quest%' or Estado.NombreEstado like '%$quest%' or Empleado.nombre like '%$quest%')";
}
else{$subcondicion4="";}


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$query="SELECT  
				Cliente.idCliente, 
				Cliente.nombre, 
				Cliente.rfc, 
				Cliente.contacto, 
				Cliente.fisCalle, 
				Cliente.fisNumero, 
				Cliente.fisCiudad,  
				Cliente.calle, 
				Cliente.numero, 
				Cliente.ciudad, 
				Cliente.telefonoCasa, 
				Cliente.telefonoOficina,
				Cliente.fax, 
				Cliente.extension, 
				Cliente.telefonoCelular, 
				Cliente.nextel, 
				Cliente.TelNextel, 
				Cliente.email,  
				Empleado.nombre as vendedor, 
				Colonia.NombreColonia as colonia, 
				Municipio.NombreMunicipio as municipio, 
				Estado.NombreEstado as estado, 
				TipoCliente.nombre as tipocliente, 
				colfiscal.NombreColonia as fiscolonia, 
				munifiscal.NombreMunicipio as fismunicipio, 
				estadfiscal.NombreEstado as fisestado		 
			FROM Cliente
			LEFT JOIN Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) 
			left join Colonia on (Cliente.colonia = Colonia.idColonia) 
			left join Municipio on (Cliente.municipio = Municipio.idMunicipio) 
			left join Estado on (Cliente.estado = Estado.idEstado)  
			left join TipoCliente on (Cliente.tipocliente = TipoCliente.idTipoCliente) 
			left join Colonia as colfiscal on (Cliente.fisColonia = colfiscal.idColonia)  
			left join Municipio as munifiscal on (Cliente.fisMunicipio = munifiscal.idMunicipio) 
			left join Estado as estadfiscal on (Cliente.fisEstado = estadfiscal.idEstado)
			$condicion 
			$subcondicion1 
			$subcondicion2 
			$subcondicion3 
			$subcondicion4 
			order by $sort $ascdesc";
$result = mysqli_query($link,$query, $link) or die(mysql_error()); 
if (mysqli_num_rows($result)){ 
$comprime_columnas=implode(",",$campos);
echo'<form action="exporta.php" method="post" name="frm" target="_blank">
<input name="modulo" type="hidden" value="'.$tablax.'" />
<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
<input name="ordena" type="hidden" value="'.$sort.'" />
<input name="updown" type="hidden" value="'.$ascdesc.'" />
<table width="100%" border="0" cellspacing="3" cellpadding="3">
                 <tr>';

$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nombre</strong></td>';} 
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Vendedor</strong></td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>RFC</strong></td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contacto</strong></td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Direcci�n</strong></td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia</strong></td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio</strong></td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel�fono</strong></td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Celular</strong></td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel�fono de oficina</strong></td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fax</strong></td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nextel</strong></td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>ID Nextel</strong></td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Email</strong></td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Domicilio Fiscal</strong></td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia Fiscal</strong></td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad Fiscal</strong></td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio Fiscal</strong></td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado Fiscal</strong></td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo de cliente</strong></td>';}

echo'
    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
  </tr>';

$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 

if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}

  echo'<tr>';
  
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>';}
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["vendedor"].'</td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["rfc"].'</td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contacto"].'</td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["calle"].' '.$row["numero"].'</td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["colonia"].'</td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ciudad"].'</td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["municipio"].'</td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["estado"].'</td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoOficina"].''; if($row["extension"]!=""){echo' Ext. '.$row["extension"].'';} echo'</td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fax"].'</td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nextel"].'</td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["TelNextel"].'</td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["email"].'</td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCalle"].' '.$row["fisNumero"].'</td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fiscolonia"].'</td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCiudad"].'</td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fismunicipio"].'</td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisestado"].'</td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipocliente"].'</td>';}
  

echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["clave"].'"/></td>  
    </tr>';
  }  

echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
<br><br>
<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
<br><br>
<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
<option value="excel">Exportar a excel</option> 
<option value="print">Imprimir</option>
</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
}
#==================================

###########################################################################
if($tablax=="Polizatemp"){

$condicion="where Cliente.idCliente!='0'";

if($status=="all"){$subcondicion1="";}
if($status=="validado"){$subcondicion1="and usuarios_contrato.status='validado'";}
if($status=="no validado"){$subcondicion1="and usuarios_contrato.status='no validado'";}

if($vendedor=="all"){$subcondicion2="";}
else{$subcondicion2="and Cliente.idEmpleado='$vendedor'";}

if($tipo_cliente=="all"){$subcondicion3="";}
else{$subcondicion3="and Cliente.tipocliente='$tipo_cliente'";}


if(isset($quest) && $quest!="" && $quest!=" "){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$subcondicion4=" and (Cliente.usuario like '%$quest%' or Cliente.nombre like '%$quest%' or Cliente.rfc like '%$quest%' or Cliente.contacto like '%$quest%' or Cliente.fisCalle like '%$quest%' or Cliente.fisNumero like '%$quest%' or Cliente.fisCiudad like '%$quest%' or Cliente.calle like '%$quest%' or Cliente.numero like '%$quest%' or Cliente.ciudad like '%$quest%' or Cliente.telefonoCasa like '%$quest%' or Cliente.telefonoOficina like '%$quest%' or Cliente.fax like '%$quest%' or Cliente.extension like '%$quest%' or Cliente.telefonoCelular like '%$quest%' or Cliente.nextel like '%$quest%' or Cliente.TelNextel like '%$quest%' or Cliente.email like '%$quest%' or Cliente.status like '%$quest%' or TipoCliente.nombre like '%$quest%' or Colonia.NombreColonia like '%$quest%' or Municipio.NombreMunicipio like '%$quest%' or Estado.NombreEstado like '%$quest%' or Empleado.nombre like '%$quest%')";
}
else{$subcondicion4="";}


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$query="SELECT DISTINCT 
				Cliente.idCliente, 
				Cliente.nombre, 
				Cliente.rfc, 
				Cliente.contacto, 
				Cliente.fisCalle, 
				Cliente.fisNumero, 
				Cliente.fisCiudad,  
				Cliente.calle, 
				Cliente.numero, 
				Cliente.ciudad, 
				Cliente.telefonoCasa, 
				Cliente.telefonoOficina,
				Cliente.fax, 
				Cliente.extension, 
				Cliente.telefonoCelular, 
				Cliente.nextel, 
				Cliente.TelNextel, 
				Cliente.email,  
				usuarios_contrato.nombre as usuario, 
				usuarios_contrato.clave as clave, 
				usuarios_contrato.tel as uctel, 
				usuarios_contrato.cel as uccel, 
				usuarios_contrato.mail as ucmail, 
				usuarios_contrato.status,
				Empleado.nombre as vendedor, 
				Colonia.NombreColonia as colonia, 
				Municipio.NombreMunicipio as municipio, 
				Estado.NombreEstado as estado, 
				TipoCliente.nombre as tipocliente, 
				colfiscal.NombreColonia as fiscolonia, 
				munifiscal.NombreMunicipio as fismunicipio, 
				estadfiscal.NombreEstado as fisestado,
				fecha_inicio,
				fecha_vencimiento,
				marca,modelo,
				usuarios_contrato.tipo, 
				color, 
				placas, 
				serie, 
				servicio, 
				productos.producto,clave 
			FROM (Cliente 
			LEFT JOIN Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) 
			left join Colonia on (Cliente.colonia = Colonia.idColonia) 
			left join Municipio on (Cliente.municipio = Municipio.idMunicipio) 
			left join Estado on (Cliente.estado = Estado.idEstado)  
			left join TipoCliente on (Cliente.tipocliente = TipoCliente.idTipoCliente) 
			left join Colonia as colfiscal on (Cliente.fisColonia = colfiscal.idColonia)  
			left join Municipio as munifiscal on (Cliente.fisMunicipio = munifiscal.idMunicipio) 
			left join Estado as estadfiscal on (Cliente.fisEstado = estadfiscal.idEstado)
			left join Poliza on(Cliente.idCliente=Poliza.idCliente) 
			left join usuarios_contrato on (Poliza.numPoliza=usuarios_contrato.contrato) )
			left join productos on (usuarios_contrato.productos=productos.id) 
			$condicion 
			$subcondicion1 
			$subcondicion2 
			$subcondicion3 
			$subcondicion4 
			order by $sort $ascdesc";
$result = mysqli_query($link,$query, $link) or die(mysql_error()); 
if (mysqli_num_rows($result)){ 
$comprime_columnas=implode(",",$campos);
echo'<form action="exporta.php" method="post" name="frm" target="_blank">
<input name="modulo" type="hidden" value="'.$tablax.'" />
<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
<input name="ordena" type="hidden" value="'.$sort.'" />
<input name="updown" type="hidden" value="'.$ascdesc.'" />
<table width="100%" border="0" cellspacing="3" cellpadding="3">
                 <tr>';

$checa_array1=array_search("clave",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Clave</strong></td>';} 
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nombre</strong></td>';} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Usuario</strong></td>';} 				
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Vendedor</strong></td>';}
$checa_array1=array_search("uctel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Telefono</strong></td>';} 			
$checa_array1=array_search("uccel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Celular</strong></td>';} 			
$checa_array1=array_search("ucmail",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>E-mail</strong></td>';} 	
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Status</strong></td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>RFC</strong></td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contacto</strong></td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Direcci�n</strong></td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia</strong></td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio</strong></td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel�fono</strong></td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Celular</strong></td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel�fono de oficina</strong></td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fax</strong></td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nextel</strong></td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>ID Nextel</strong></td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Email</strong></td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Domicilio Fiscal</strong></td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia Fiscal</strong></td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad Fiscal</strong></td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio Fiscal</strong></td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado Fiscal</strong></td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo de cliente</strong></td>';}
$checa_array1=array_search("fecha_inicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fecha Inicio</strong></td>';}
$checa_array1=array_search("fecha_vencimiento",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fecha Vencimiento</strong></td>';}
$checa_array1=array_search("producto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Producto</strong></td>';}
$checa_array1=array_search("marca",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Marca</strong></td>';}
$checa_array1=array_search("modelo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Modelo</strong></td>';}
$checa_array1=array_search("tipo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo</strong></td>';}
$checa_array1=array_search("color",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Color</strong></td>';}
$checa_array1=array_search("placas",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Placas</strong></td>';}
$checa_array1=array_search("serie",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Serie</strong></td>';}
$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Servicio</strong></td>';}

echo'
    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
  </tr>';

$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 

if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}

  echo'<tr>';
  
$checa_array1=array_search("clave",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>';}
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>';}
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>';} 				
$checa_array1=array_search("uctel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["uctel"].'</td>';} 				
$checa_array1=array_search("uccel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["uccel"].'</td>';} 				
$checa_array1=array_search("ucmail",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ucmail"].'</td>';} 				
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["vendedor"].'</td>';}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["rfc"].'</td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contacto"].'</td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["calle"].' '.$row["numero"].'</td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["colonia"].'</td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ciudad"].'</td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["municipio"].'</td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["estado"].'</td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoOficina"].''; if($row["extension"]!=""){echo' Ext. '.$row["extension"].'';} echo'</td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fax"].'</td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nextel"].'</td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["TelNextel"].'</td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["email"].'</td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCalle"].' '.$row["fisNumero"].'</td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fiscolonia"].'</td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCiudad"].'</td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fismunicipio"].'</td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisestado"].'</td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipocliente"].'</td>';}
$checa_array1=array_search("fecha_inicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_inicio"].'</td>';}
$checa_array1=array_search("fecha_vencimiento",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_vencimiento"].'</td>';}
$checa_array1=array_search("producto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["producto"].'</td>';}
$checa_array1=array_search("marca",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["marca"].'</td>';}
$checa_array1=array_search("modelo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["modelo"].'</td>';}
$checa_array1=array_search("tipo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo"].'</td>';}
$checa_array1=array_search("color",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["color"].'</td>';}
$checa_array1=array_search("placas",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["placas"].'</td>';}
$checa_array1=array_search("serie",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["serie"].'</td>';}
$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>';}
  

echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["clave"].'"/></td>  
    </tr>';
  }  

echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
<br><br>
<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
<br><br>
<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
<option value="excel">Exportar a excel</option> 
<option value="print">Imprimir</option>
</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
}
#==================================


###########################################################################
if($tablax=="general"){

$condicion="where general.id!='0'";

if($status=="all"){$subcondicion1="";}
if($status=="abierto"){$subcondicion1="and general.status='abierto'";}
if($status=="en tramite"){$subcondicion1="and general.status='en tramite'";}
if($status=="concluido"){$subcondicion1="and general.status='concluido'";}
if($status=="cancelado posterior"){$subcondicion1="and general.status='cancelado posterior'";}
if($status=="cancelado al momento"){$subcondicion1="and general.status='cancelado al momento'";}

if($serviciof=="all"){$subcondicion2="";}
else{$subcondicion2="and general.servicio='$serviciof'";}

if($empleadof=="all"){$subcondicion3="";}
else{$subcondicion3="and general.idEmpleado='$empleadof'";}


if(isset($quest) && $quest!="" && $quest!=" "){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$subcondicion4=" and (general.contrato like '%$quest%' or general.reporta like '%$quest%' or general.num_contrato like '%$quest%' or general.convenio like '%$quest%' or general.expediente like '%$quest%' or general.aseguradora like '%$quest%' or general.aseg_poliza like '%$quest%' or general.asegurado like '%$quest%' or general.asegurado_y_o like '%$quest%' or general.aseg_conductor like '%$quest%' or general.usuario like '%$quest%' or general.reporte_cliente like '%$quest%' or general.motivo_servicio like '%$quest%' or general.auto_marca like '%$quest%' or general.auto_tipo like '%$quest%' or general.auto_modelo like '%$quest%' or general.auto_color like '%$quest%' or general.auto_placas like '%$quest%' or general.domicilio_cliente like '%$quest%' or general.ubicacion_requiere like '%$quest%' or general.destino_servicio like '%$quest%' or general.observaciones like '%$quest%' or Cliente.nombre like '%$quest%' or Provedor.nombre like '%$quest%')";
}
else{$subcondicion4="";}

if($filtrofecha1=="enabled"){$subcondicion5="and (general.fecha_recepcion >= '$recepcion_a-$recepcion_m-$recepcion_d 00:00:00' and general.fecha_recepcion <= '$recepcion_ab-$recepcion_mb-$recepcion_db 23:59:59')";}
else{$subcondicion5="";}

if($filtrofecha2=="enabled"){$subcondicion6="and (general.fecha_suceso >= '$suceso_a-$suceso_m-$suceso_d 00:00:00' and general.fecha_suceso <= '$suceso_ab-$suceso_mb-$suceso_db 23:59:59')";}
else{$subcondicion6="";}

if($filtrofecha3=="enabled"){$subcondicion7="and (general.apertura_expediente >= '$exped_a-$exped_m-$exped_d 00:00:00' and general.apertura_expediente <= '$exped_ab-$exped_mb-$exped_db 23:59:59')";}
else{$subcondicion7="";}

if($filtrofecha4=="enabled"){$subcondicion8="and (general.asignacion_proveedor >= '$asignax_a-$asignax_m-$asignax_d 00:00:00' and general.asignacion_proveedor <= '$asignax_ab-$asignax_mb-$asignax_db 23:59:59')";}
else{$subcondicion8="";}

if($filtrofecha5=="enabled"){$subcondicion9="and (general.contacto >= '$contactxx_a-$contactxx_m-$contactxx_d 00:00:00' and general.contacto <= '$contactxx_ab-$contactxx_mb-$contactxx_db 23:59:59')";}
else{$subcondicion9="";}

if($filtrofecha6=="enabled"){$subcondicion10="and (general.arribo >= '$arribox_a-$arribox_m-$arribox_d 00:00:00' and general.arribo <= '$arribox_ab-$arribox_mb-$arribox_db 23:59:59')";}
else{$subcondicion10="";}

if($filtrofecha7=="enabled"){$subcondicion11="and (seguimiento_juridico.fecha_accidente >= '$accidenx_a-$accidenx_m-$accidenx_d 00:00:00' and seguimiento_juridico.fecha_accidente <= '$accidenx_ab-$accidenx_mb-$accidenx_db 23:59:59')";}
else{$subcondicion11="";}


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT general.id,  TIMEDIFF(general.contacto,general.apertura_expediente) AS tiempoContacto , general.contrato, general.fecha_recepcion, general.fecha_suceso, general.apertura_expediente, general.contactoext, general.terminoext, general.cobertura, general.ejecutivo, general.asignacion_proveedor, general.contacto, general.arribo, general.reporta, general.tel_reporta, general.num_contrato, general.convenio, general.expediente, general.num_cliente, general.num_siniestro, general.ajustador, general.aseguradora, general.aseg_poliza, general.aseg_inciso, general.aseg_vigencia_inicio, general.aseg_vigencia_termino, general.aseg_cobertura, general.aseg_monto, general.asegurado, general.asegurado_y_o, general.aseg_tel1, general.aseg_tel2, general.aseg_domicilio, general.aseg_cp, general.aseg_ciudad, general.aseg_conductor, general.aseg_conductor_tel1, general.aseg_conductor_tel2, general.usuario, general.reporte_cliente, general.tecnico_solicitado, general.motivo_servicio, general.auto_marca, general.auto_tipo, general.auto_modelo, general.auto_color, general.auto_placas, general.tipo_asistencia_vial, general.tipo_asistencia_medica, general.domicilio_cliente, general.domicilio_sustituto, general.ubicacion_requiere, general.ubicacion_ciudad, general.destino_servicio, general.destino_ciudad, general.formato_carta, general.instructivo, general.costo, general.observaciones, general.status, general.banderazo, general.blindaje, general.maniobras, general.espera, general.otro, Empleado.nombre as empleado, servicios.servicio, Cliente.nombre as cliente, Estado.NombreEstado as ubica_estado, Municipio.NombreMunicipio as ubica_municipio, Colonia.NombreColonia as ubica_colonia, estaddestino.NombreEstado as dest_estado, munidestino.NombreMunicipio as dest_municipio, coldestino.NombreColonia as dest_colonia, Provedor.nombre as proveedor, colaseg.NombreColonia as asegur_colonia, muniaseg.NombreMunicipio as asegur_municipio, estadaseg.NombreEstado as asegur_estado, seguimiento_juridico.situacion_juridica, seguimiento_juridico.detencion, seguimiento_juridico.liberacion, seguimiento_juridico.fianzas_conductor, seguimiento_juridico.situacion_vehiculo, seguimiento_juridico.detencion_vehiculo, seguimiento_juridico.liberacion_vehiculo, seguimiento_juridico.fianzas_vehiculo, seguimiento_juridico.conductor as conductor_juridico, seguimiento_juridico.telconductor, seguimiento_juridico.telconductor2, seguimiento_juridico.siniestro as siniestro_juridico, seguimiento_juridico.averiguacion, seguimiento_juridico.autoridad, seguimiento_juridico.fecha_accidente, seguimiento_juridico.numlesionados, seguimiento_juridico.numhomicidios, seguimiento_juridico.delitos, seguimiento_juridico.danos, seguimiento_juridico.lesiones, seguimiento_juridico.homicidios, seguimiento_juridico.ataques, seguimiento_juridico.robo, seguimiento_juridico.descripcion, seguimiento_juridico.lugar_hechos, seguimiento_juridico.referencias, seguimiento_juridico.ciudad, seguimiento_juridico.ajustador as ajustador_juridico, seguimiento_juridico.telajustador, seguimiento_juridico.telajustador2, seguimiento_juridico.monto_danos, seguimiento_juridico.monto_deducible, seguimiento_juridico.resp_ajustador, seguimiento_juridico.resp_abogado, seguimiento_juridico.resp_perito, seguimiento_juridico.resp_consignado, seguimiento_juridico.juzgado, seguimiento_juridico.causa_penal, seguimiento_juridico.procesado, seguimiento_juridico.final_forma_pago, seguimiento_juridico.final_comentario, seguimiento_juridico.final_monto, seguimiento_juridico.final_estado, coljur.NombreColonia as jurid_colonia, munijur.NombreMunicipio as jurid_municipio, estadjur.NombreEstado as jurid_estado, pagos.monto
 from general left join Empleado on (general.idEmpleado = Empleado.idEmpleado) left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join Estado on (general.ubicacion_estado = Estado.idEstado) left join Municipio on (general.ubicacion_municipio = Municipio.idMunicipio) left join Colonia on (general.ubicacion_colonia = Colonia.idColonia) left join Estado as estaddestino on (general.destino_estado = estaddestino.idEstado) left join Municipio as munidestino on (general.destino_municipio = munidestino.idMunicipio) left join Colonia as coldestino on (general.destino_colonia = coldestino.idColonia) left join Provedor on (general.proveedor = Provedor.id) left join Colonia as colaseg on (general.aseg_colonia = colaseg.idColonia)  left join Municipio as muniaseg on (general.aseg_municipio = muniaseg.idMunicipio) left join Estado as estadaseg on (general.aseg_estado = estadaseg.idEstado) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) left join Colonia as coljur on (seguimiento_juridico.colonia = coljur.idColonia)  left join Municipio as munijur on (seguimiento_juridico.municipio = munijur.idMunicipio) left join Estado as estadjur on (seguimiento_juridico.estado = estadjur.idEstado) left join pagos on (general.expediente = pagos.expediente) $condicion $subcondicion1  $subcondicion2 $subcondicion3 $subcondicion4 $subcondicion5 $subcondicion6 $subcondicion7 $subcondicion8 $subcondicion9 $subcondicion10 $subcondicion11 order by $sort $ascdesc"); 




if (mysqli_num_rows($result)){ 
$comprime_columnas=implode(",",$campos);
echo'<form action="exporta.php" method="post" name="frm" target="_blank">
<input name="modulo" type="hidden" value="'.$tablax.'" />
<input name="columnas" type="hidden" value="'.$comprime_columnas.'" />
<input name="ordena" type="hidden" value="'.$sort.'" />
<input name="updown" type="hidden" value="'.$ascdesc.'" />
<table width="100%" border="0" cellspacing="3" cellpadding="3">
                 <tr>';

$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Servicio</strong></td>';} 
$checa_array1=array_search("contrato",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contrato</strong></td>';} 				$checa_array1=array_search("empleado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Empleado</strong></td>';}
$checa_array1=array_search("cliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Cliente</strong></td>';}
$checa_array1=array_search("fecha_recepcion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fecha recepcion</strong></td>';}
$checa_array1=array_search("fecha_suceso",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fecha suceso</strong></td>';}
$checa_array1=array_search("fecha_apertura",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Apertura expediente</strong></td>';}
$checa_array1=array_search("fecha_asignacion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Asignacion proveedor</strong></td>';}
$checa_array1=array_search("fecha_contacto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contacto</strong></td>';}
$checa_array1=array_search("tiempoContacto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tiempo de Contacto</strong></td>';}
$checa_array1=array_search("fecha_arribo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Arribo</strong></td>';}
$checa_array1=array_search("reporta",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Reporta</strong></td>';}
$checa_array1=array_search("tel_reporta",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel. de quien reporta</strong></td>';}
$checa_array1=array_search("num_contrato",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contrato</strong></td>';}
$checa_array1=array_search("convenio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Convenio</strong></td>';}
$checa_array1=array_search("expediente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Expediente</strong></td>';}
$checa_array1=array_search("num_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Nombre Cliente</strong></td>';}
$checa_array1=array_search("num_siniestro",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Num. siniestro</strong></td>';}
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Usuario</strong></td>';}
$checa_array1=array_search("reporte_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Reporte cliente</strong></td>';}
$checa_array1=array_search("tecnico_solicitado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>T�cnico solicitado</strong></td>';}
$checa_array1=array_search("motivo_servicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Motivo del servicio</strong></td>';}
$checa_array1=array_search("tipo_vial",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo asist. vial</strong></td>';}
$checa_array1=array_search("tipo_medica",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo asist. medica</strong></td>';}
$checa_array1=array_search("domicilio_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Domicilio cliente</strong></td>';}
$checa_array1=array_search("domicilio_sustituto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Domicilio sustituto</strong></td>';}
$checa_array1=array_search("ubicacion_requiere",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ubicacion donde requiere el servicio</strong></td>';}
$checa_array1=array_search("ubicacion_estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ubicacion Estado</strong></td>';}
$checa_array1=array_search("ubicacion_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ubicacion Municipio</strong></td>';}
$checa_array1=array_search("ubicacion_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ubicacion Colonia</strong></td>';}
$checa_array1=array_search("ubicacion_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ubicacion Ciudad</strong></td>';}
$checa_array1=array_search("destino_servicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Destino</strong></td>';}
$checa_array1=array_search("destino_estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Destino Estado</strong></td>';}
$checa_array1=array_search("destino_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Destino Municipio</strong></td>';}
$checa_array1=array_search("destino_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Destino Colonia</strong></td>';}
$checa_array1=array_search("destino_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Destino Ciudad</strong></td>';}
$checa_array1=array_search("formato_carta",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Formato carta</strong></td>';}
$checa_array1=array_search("instructivo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Instructivo</strong></td>';}
$checa_array1=array_search("proveedor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Proveedor</strong></td>';}
$checa_array1=array_search("costo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Costo</strong></td>';}
$checa_array1=array_search("observaciones",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Observaciones</strong></td>';}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Status</strong></td>';}
$checa_array1=array_search("auto_marca",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Marca auto</strong></td>';}
$checa_array1=array_search("auto_tipo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tipo auto</strong></td>';}
$checa_array1=array_search("auto_modelo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Modelo auto</strong></td>';}
$checa_array1=array_search("auto_color",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Color auto</strong></td>';}
$checa_array1=array_search("auto_placas",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Placas auto</strong></td>';}
$checa_array1=array_search("aseguradora",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Aseguradora</strong></td>';}
$checa_array1=array_search("ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ajustador</strong></td>';}
$checa_array1=array_search("aseg_poliza",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Poliza</strong></td>';}
$checa_array1=array_search("aseg_inciso",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Inciso</strong></td>';}
$checa_array1=array_search("aseg_vigencia_inicio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Vigencia inicio</strong></td>';}
$checa_array1=array_search("aseg_vigencia_termino",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Vigencia termino</strong></td>';}
$checa_array1=array_search("aseg_cobertura",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Cobertura</strong></td>';}
$checa_array1=array_search("aseg_monto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Monto</strong></td>';}
$checa_array1=array_search("asegurado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Asegurado</strong></td>';}
$checa_array1=array_search("asegurado_y_o",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Y/O</strong></td>';}
$checa_array1=array_search("aseg_tel1",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel.1</strong></td>';}
$checa_array1=array_search("aseg_tel2",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel.2</strong></td>';}
$checa_array1=array_search("aseg_domicilio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Domicilio</strong></td>';}
$checa_array1=array_search("aseg_cp",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>CP</strong></td>';}
$checa_array1=array_search("aseg_estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("aseg_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio</strong></td>';}
$checa_array1=array_search("aseg_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia</strong></td>';}
$checa_array1=array_search("aseg_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("aseg_conductor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Conductor</strong></td>';}
$checa_array1=array_search("aseg_conductor_tel1",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel. 1</strong></td>';}
$checa_array1=array_search("aseg_conductor_tel2",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel. 2</strong></td>';}
$checa_array1=array_search("situacion_juridica",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Situacion Juridica</strong></td>';}
$checa_array1=array_search("detencion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Detencion</strong></td>';}
$checa_array1=array_search("liberacion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Liberacion</strong></td>';}
$checa_array1=array_search("fianzas_conductor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fianzas</strong></td>';}
$checa_array1=array_search("situacion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Situacion Vehiculo</strong></td>';}
$checa_array1=array_search("detencion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Detencion Vehiculo</strong></td>';}
$checa_array1=array_search("liberacion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Liberacion Vehiculo</strong></td>';}
$checa_array1=array_search("fianzas_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fianzas Vehiculo</strong></td>';}
$checa_array1=array_search("conductor_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Conductor Vehiculo</strong></td>';}
$checa_array1=array_search("telconductor",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel. Conductor</strong></td>';}
$checa_array1=array_search("telconductor2",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Tel. Conductor 2</strong></td>';}
$checa_array1=array_search("siniestro",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Siniestro</strong></td>';}
$checa_array1=array_search("averiguacion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Averiguacion</strong></td>';}
$checa_array1=array_search("autoridad",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Autoridad</strong></td>';}
$checa_array1=array_search("fecha_accidente",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Fecha Accidente</strong></td>';}
$checa_array1=array_search("numlesionados",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Num. Lesionados</strong></td>';}
$checa_array1=array_search("numhomicidios",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Num. Homicidios</strong></td>';}
$checa_array1=array_search("delitos",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Delitos</strong></td>';}
$checa_array1=array_search("danos",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Da&ntilde;os</strong></td>';}
$checa_array1=array_search("lesiones",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Lesiones</strong></td>';}
$checa_array1=array_search("homicidios",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Homicidios</strong></td>';}
$checa_array1=array_search("ataques",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ataques</strong></td>';}
$checa_array1=array_search("robo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Robo</strong></td>';}
$checa_array1=array_search("descripcion",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Descripcion</strong></td>';}
$checa_array1=array_search("lugar_hechos",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Lugar de los Hechos</strong></td>';}
$checa_array1=array_search("referencias",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Referencias</strong></td>';}
$checa_array1=array_search("estado_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("municipio_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Municipio</strong></td>';}
$checa_array1=array_search("colonia_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Colonia</strong></td>';}
$checa_array1=array_search("ciudad_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("ajustador_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ajustador</strong></td>';}
$checa_array1=array_search("telajustador",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ajustador Telefono</strong></td>';}
$checa_array1=array_search("telajustador2",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ajustador Telefono 2</strong></td>';}
$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Monto Da&ntilde;os</strong></td>';}
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Monto Deducible</strong></td>';}
$checa_array1=array_search("resp_ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Responsabilidad Ajustador</strong></td>';}
$checa_array1=array_search("resp_abogado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Responsabilidad Abogado</strong></td>';}
$checa_array1=array_search("resp_perito",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Responsabilidad Perito</strong></td>';}
$checa_array1=array_search("resp_consignado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Responsabilidad Consignado</strong></td>';}
$checa_array1=array_search("juzgado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Juzgado</strong></td>';}
$checa_array1=array_search("causa_penal",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Causa Penal</strong></td>';}
$checa_array1=array_search("procesado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Procesado</strong></td>';}
$checa_array1=array_search("final_forma_pago",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Forma de Pago</strong></td>';}
$checa_array1=array_search("final_comentario",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Comentario</strong></td>';}
$checa_array1=array_search("final_monto",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Monto</strong></td>';}
$checa_array1=array_search("final_estado",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Estado</strong></td>';}
$checa_array1=array_search("banderazo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Banderazo</strong></td>';}
$checa_array1=array_search("blindaje",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Blindaje</strong></td>';}
$checa_array1=array_search("maniobras",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Maniobras</strong></td>';}
$checa_array1=array_search("espera",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Espera</strong></td>';}
$checa_array1=array_search("otro",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Otro</strong></td>';}
$checa_array1=array_search("total",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Total</strong></td>';}
$checa_array1=array_search("contactoext",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Contacto Ext</strong></td>';}
$checa_array1=array_search("terminoext",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Termino Ext</strong></td>';}
$checa_array1=array_search("cobertura",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Cobertura</strong></td>';}
$checa_array1=array_search("ejecutivo",$campos); if($checa_array1===FALSE){} else{echo'<td align=middle class="titles"><strong>Ejecutivo</strong></td>';}



echo'
    <td align=middle class="titles"><strong>Seleccionar</strong></td>			
  </tr>';

$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 

if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}

  echo'<tr>';
  
$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>';}
$checa_array1=array_search("contrato",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>';} 				
$checa_array1=array_search("empleado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["empleado"].'</td>';}
$checa_array1=array_search("cliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cliente"].'</td>';}
$checa_array1=array_search("fecha_recepcion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_recepcion"].'</td>';}
$checa_array1=array_search("fecha_suceso",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_suceso"].'</td>';}
$checa_array1=array_search("fecha_apertura",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["apertura_expediente"].'</td>';}
$checa_array1=array_search("fecha_asignacion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asignacion_proveedor"].'</td>';}
$checa_array1=array_search("fecha_contacto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contacto"].'</td>';}
$checa_array1=array_search("tiempoContacto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tiempoContacto"].'</td>';}
$checa_array1=array_search("fecha_arribo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["arribo"].'</td>';}
$checa_array1=array_search("reporta",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["reporta"].'</td>';}
$checa_array1=array_search("tel_reporta",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tel_reporta"].'</td>';}
$checa_array1=array_search("num_contrato",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["num_contrato"].'</td>';}
$checa_array1=array_search("convenio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["convenio"].'</td>';}
$checa_array1=array_search("expediente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["expediente"].'</td>';}
$checa_array1=array_search("num_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["num_cliente"].'</td>';}
$checa_array1=array_search("num_siniestro",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["num_siniestro"].'</td>';}
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>';}
$checa_array1=array_search("reporte_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["reporte_cliente"].'</td>';}
$checa_array1=array_search("tecnico_solicitado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tecnico_solicitado"].'</td>';}
$checa_array1=array_search("motivo_servicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["motivo_servicio"].'</td>';}
$checa_array1=array_search("tipo_vial",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo_asistencia_vial"].'</td>';}
$checa_array1=array_search("tipo_medica",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo_asistencia_medica"].'</td>';}
$checa_array1=array_search("domicilio_cliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["domicilio_cliente"].'</td>';}
$checa_array1=array_search("domicilio_sustituto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["domicilio_sustituto"].'</td>';}
$checa_array1=array_search("ubicacion_requiere",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ubicacion_requiere"].'</td>';}
$checa_array1=array_search("ubicacion_estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ubica_estado"].'</td>';}
$checa_array1=array_search("ubicacion_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ubica_municipio"].'</td>';}
$checa_array1=array_search("ubicacion_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ubica_colonia"].'</td>';}
$checa_array1=array_search("ubicacion_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ubicacion_ciudad"].'</td>';}
$checa_array1=array_search("destino_servicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["destino_servicio"].'</td>';}
$checa_array1=array_search("destino_estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["dest_estado"].'</td>';}
$checa_array1=array_search("destino_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["dest_municipio"].'</td>';}
$checa_array1=array_search("destino_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["dest_colonia"].'</td>';}
$checa_array1=array_search("destino_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["destino_ciudad"].'</td>';}
$checa_array1=array_search("formato_carta",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["formato_carta"].'</td>';}
$checa_array1=array_search("instructivo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["instructivo"].'</td>';}
$checa_array1=array_search("proveedor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["proveedor"].'</td>';}
$checa_array1=array_search("costo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto"],2).'</td>';}
$checa_array1=array_search("observaciones",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.nl2br($row["observaciones"]).'</td>';}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>';}
$checa_array1=array_search("auto_marca",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["auto_marca"].'</td>';}
$checa_array1=array_search("auto_tipo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["auto_tipo"].'</td>';}
$checa_array1=array_search("auto_modelo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["auto_modelo"].'</td>';}
$checa_array1=array_search("auto_color",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["auto_color"].'</td>';}
$checa_array1=array_search("auto_placas",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["auto_placas"].'</td>';}
$checa_array1=array_search("aseguradora",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseguradora"].'</td>';}
$checa_array1=array_search("ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ajustador"].'</td>';}
$checa_array1=array_search("aseg_poliza",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_poliza"].'</td>';}
$checa_array1=array_search("aseg_inciso",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_inciso"].'</td>';}
$checa_array1=array_search("aseg_vigencia_inicio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_vigencia_inicio"].'</td>';}
$checa_array1=array_search("aseg_vigencia_termino",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_vigencia_termino"].'</td>';}
$checa_array1=array_search("aseg_cobertura",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_cobertura"].'</td>';}
$checa_array1=array_search("aseg_monto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["aseg_monto"],2).'</td>';}
$checa_array1=array_search("asegurado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asegurado"].'</td>';}
$checa_array1=array_search("asegurado_y_o",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asegurado_y_o"].'</td>';}
$checa_array1=array_search("aseg_tel1",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_tel1"].'</td>';}
$checa_array1=array_search("aseg_tel2",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_tel2"].'</td>';}
$checa_array1=array_search("aseg_domicilio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_domicilio"].'</td>';}

$checa_array1=array_search("aseg_cp",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_cp"].'</td>';}

$checa_array1=array_search("aseg_estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asegur_estado"].'</td>';}
$checa_array1=array_search("aseg_municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asegur_municipio"].'</td>';}
$checa_array1=array_search("aseg_colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["asegur_colonia"].'</td>';}

$checa_array1=array_search("aseg_ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_ciudad"].'</td>';}

$checa_array1=array_search("aseg_conductor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_conductor"].'</td>';}
$checa_array1=array_search("aseg_conductor_tel1",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_conductor_tel1"].'</td>';}
$checa_array1=array_search("aseg_conductor_tel2",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["aseg_conductor_tel2"].'</td>';}
$checa_array1=array_search("situacion_juridica",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["situacion_juridica"].'</td>';}
$checa_array1=array_search("detencion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["detencion"].'</td>';}
$checa_array1=array_search("liberacion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["liberacion"].'</td>';}
$checa_array1=array_search("fianzas_conductor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fianzas"].'</td>';}
$checa_array1=array_search("situacion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["situacion_vehiculo"].'</td>';}
$checa_array1=array_search("detencion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["detencion_vehiculo"].'</td>';}
$checa_array1=array_search("liberacion_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["liberacion_vehiculo"].'</td>';}
$checa_array1=array_search("fianzas_vehiculo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fianzas_vehiculo"].'</td>';}
$checa_array1=array_search("conductor_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["conductor_juridico"].'</td>';}
$checa_array1=array_search("telconductor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telconductor"].'</td>';}
$checa_array1=array_search("telconductor2",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telconductor2"].'</td>';}
$checa_array1=array_search("siniestro",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["siniestro_juridico"].'</td>';}
$checa_array1=array_search("averiguacion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["averiguacion"].'</td>';}
$checa_array1=array_search("autoridad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["autoridad"].'</td>';}
$checa_array1=array_search("fecha_accidente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_accidente"].'</td>';}
$checa_array1=array_search("numlesionados",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numlesionados"].'</td>';}
$checa_array1=array_search("numhomicidios",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numhomicidios"].'</td>';}
$checa_array1=array_search("delitos",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["delitos"].'</td>';}
$checa_array1=array_search("danos",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["danos"].'</td>';}
$checa_array1=array_search("lesiones",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["lesiones"].'</td>';}
$checa_array1=array_search("homicidios",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["homicidios"].'</td>';}
$checa_array1=array_search("ataques",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ataques"].'</td>';}
$checa_array1=array_search("robo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["robo"].'</td>';}
$checa_array1=array_search("descripcion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["descripcion"].'</td>';}
$checa_array1=array_search("lugar_hechos",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["lugar_hechos"].'</td>';}
$checa_array1=array_search("referencias",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["referencias"].'</td>';}
$checa_array1=array_search("estado_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["jurid_estado"].'</td>';}
$checa_array1=array_search("municipio_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["jurid_municipio"].'</td>';}
$checa_array1=array_search("colonia_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["jurid_colonia"].'</td>';}
$checa_array1=array_search("ciudad_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ciudad"].'</td>';}
$checa_array1=array_search("ajustador_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ajustador_juridico"].'</td>';}
$checa_array1=array_search("telajustador",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telajustador"].'</td>';}
$checa_array1=array_search("telajustador2",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telajustador2"].'</td>';}
$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto_danos"],2).'</td>';}
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto_deducible"],2).'</td>';}

$checa_array1=array_search("resp_ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_ajustador"].'</td>';}
$checa_array1=array_search("resp_abogado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_abogado"].'</td>';}
$checa_array1=array_search("resp_perito",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_perito"].'</td>';}
$checa_array1=array_search("resp_consignado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_consignado"].'</td>';}
$checa_array1=array_search("juzgado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["juzgado"].'</td>';}
$checa_array1=array_search("causa_penal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["causa_penal"].'</td>';}
$checa_array1=array_search("procesado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["procesado"].'</td>';}

$checa_array1=array_search("final_forma_pago",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_forma_pago"].'</td>';}

$checa_array1=array_search("final_comentario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_comentario"].'</td>';}
$checa_array1=array_search("final_monto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["final_monto"],2).'</td>';}
$checa_array1=array_search("final_estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_estado"].'</td>';}

$checa_array1=array_search("banderazo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["banderazo"].'</td>';}
$checa_array1=array_search("blindaje",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["blindaje"].'</td>';}
$checa_array1=array_search("maniobras",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["maniobras"].'</td>';}
$checa_array1=array_search("espera",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["espera"].'</td>';}
$checa_array1=array_search("otro",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["otro"].'</td>';}

$total_lastop=$row["banderazo"]+$row["blindaje"]+$row["maniobras"]+$row["espera"]+$row["otro"];

$total_lastop=number_format($total_lastop,2);

$checa_array1=array_search("total",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["total"].'</td>';}

$checa_array1=array_search("contactoext",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contactoext"].'</td>';}

$checa_array1=array_search("terminoext",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["terminoext"].'</td>';}

$checa_array1=array_search("cobertura",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cobertura"].'</td>';}

$checa_array1=array_search("ejecutivo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ejecutivo"].'</td>';}


echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><input name="seleccionados[]" type="checkbox" value="'.$row["id"].'"/></td>  
    </tr>';

#----------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

$numcolumnasx=count($campos);
$numcolumnasx=$numcolumnasx+1;
$checa_array1=array_search("adjuntar_bitacora",$campos); if($checa_array1===FALSE){$numcolumnasx=$numcolumnasx;} else{$numcolumnasx=$numcolumnasx-1;}
$checa_array1=array_search("adjuntar_bitacora_legal",$campos); if($checa_array1===FALSE){$numcolumnasx=$numcolumnasx;} else{$numcolumnasx=$numcolumnasx-1;}	
	
$checa_array1=array_search("adjuntar_bitacora",$campos); if($checa_array1===FALSE){} else{echo'<tr><td colspan='.$numcolumnasx.' bgcolor="'.$bgcolor.'" class="dataclass">'; 
#############

$linkh = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $linkh); 
$resulth = mysqli_query($link,"SELECT * FROM bitacora where general='$row[id]' order by fecha desc", $linkh); 
if (mysqli_num_rows($resulth)){ 
  while ($rowh = @mysqli_fetch_array($resulth)) { 
$fexar=$rowh["fecha"];
$fexaz=explode(" ",$fexar);
$fexa=explode("-",$fexaz[0]);
$userh=$rowh["usuario"];
$dblx = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dblx);
$resultlx = mysqli_query($link,"SELECT * from Empleado where idEmpleado='$userx'",$dblx);
if (mysqli_num_rows($resultlx)){ 
$eluserx=mysql_result($resultlx,0,"nombre");
}

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($rowh["comentario"]).'</td>
		  </tr>

		</table>';  
		$eluserx="";
}}
	
##############
	echo'</td></tr>';}
###	#$$$$$$$$$$$$$$$$$$$$$$$$$$	#$$$$$$$$$$$$$$$$$$$$$$$$$$	#$$$$$$$$$$$$$$$$$$$$$$$$$$
	
	$checa_array1=array_search("adjuntar_bitacora_legal",$campos); if($checa_array1===FALSE){} else{echo'<tr><td colspan='.$numcolumnasx.' bgcolor="'.$bgcolor.'" class="dataclass">'; 
#############

$linkh = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $linkh); 
$resulth = mysqli_query($link,"SELECT * FROM notas_legal where general='$row[id]' order by fecha desc", $linkh); 
if (mysqli_num_rows($resulth)){ 
  while ($rowh = @mysqli_fetch_array($resulth)) { 
$fexar=$rowh["fecha"];
$fexaz=explode(" ",$fexar);
$fexa=explode("-",$fexaz[0]);

#$userh=$rowh["usuario"];
#$dblx = mysqli_connect($host,$username,$pass,$database);
#//mysql_select_db($database,$dblx);
#$resultlx = mysqli_query($link,"SELECT * from Empleado where idEmpleado='$userx'",$dblx);
#if (mysqli_num_rows($resultlx)){ 
#$eluserx=mysql_result($resultlx,0,"nombre");
#}

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>Etapa: '.$rowh["etapa"].'</b> | <b>Tipo: '.$rowh["tipo"].'</b></td></tr></table></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($rowh["comentario"]).'</td>
		  </tr>

		</table>';  
		$eluserx="";
}}
	
##############
	echo'</td></tr>';}
#----------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
  }  

echo'</table><table width=100%><tr><td bgcolor="#ffffff" align=middle>
<br><br>
<input name="checker" type="button" value="Seleccionar Todos" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', true);"/> &nbsp; <input name="unchecker" type="button" value="Seleccionar Ninguno" onclick="javascript:SetAllCheckBoxes(\'frm\', \'seleccionados[]\', false);"/>
<br><br>
<b>Seleccione formato de salida:</b> <select name="export_as" id="export_as">
<option value="excel">Exportar a excel</option> 
<option value="print">Imprimir</option>
</select> <input value="Exportar Seleccionados" type="submit" /><br><br></td></tr></table></form>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
}
#==================================

######################################################################


}
?>
</td></tr></table>