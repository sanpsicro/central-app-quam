<?php

$checa_arrayx=array_search("cabina",$explota_modulos);

isset($_GET['clave']) ? $clave = $_GET['clave'] : $clave = "";
isset($_GET['servicio']) ? $servicio = $_GET['servicio'] : $servicio = "";
isset($_GET['idcliente']) ? $idcliente = $_GET['idcliente'] : $idcliente = "";

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{


$link = mysqli_connect($host,$username,$pass,$database);
$sql="INSERT INTO `general` (`servicio`, `contrato`, `idCliente`, `fecha_recepcion`, `status`) VALUES ('$servicio', '$clave', '$idcliente', now(),  'abierto')";
mysqli_query($link, $sql) or die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<b>". mysqli_error($link));
$expediente=mysqli_insert_id($link);

echo "Expediente: [$expediente]<br>";
}
$expedientex=$expediente;
if(strlen($expedientex)==1){$expedientex="000000".$expedientex."";} 
if(strlen($expedientex)==2){$expedientex="00000".$expedientex."";} 
if(strlen($expedientex)==3){$expedientex="0000".$expedientex."";} 
if(strlen($expedientex)==4){$expedientex="000".$expedientex."";} 
if(strlen($expedientex)==5){$expedientex="00".$expedientex."";} 
if(strlen($expedientex)==6){$expedientex="0".$expedientex."";} 


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
?>
<script type="text/javascript" src="subcombo_cortoc.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-es.js"></script>
<script type="text/javascript" src="calendar-setup.js"></script>
 <script type="text/javascript">
function f(o){
o.value=o.value.toUpperCase();
}

function g(o){
}
</script>
<script Language="JavaScript">
function validar(formulario) {
<?php 
if($_POST['cobrarservicio']=="si"){
echo'if (formulario.costo.value =="") {
    alert("Ingrese el costo por servicio");
    formulario.costo.focus();
    return (false);
  }';
}
?>
  
  return (true); 
}
</script>
<script type="text/javascript"> 
function confirmcancel(delUrl) { 
if (confirm('Desea cancelar el servicio?')) { 
document.location = delUrl; 
}
}
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- 
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=800,height=500');");
}
// -->

</script>


<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>


<?php 
echo"
<SCRIPT LANGUAGE=\"JavaScript\">
popUp('bitacorab.php?id=".$expediente."');
</script>
";
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><span class="maintitle">Cabina / Expediente <?php echo $expedientex;?></span></td></tr>
	   <tr> <td  align="right">&nbsp;</td></tr>
 <tr>
   <td align="left">
   <?php 
   
 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from usuarios_contrato where clave = '$clave'");
$contrato=mysqli_result($result,0,"contrato");
$fecha_inicio=mysqli_result($result,0,"fecha_inicio");
$finicio=explode(" ",$fecha_inicio);
$finix=explode("-",$finicio[0]);
$fecha_vencimiento=mysqli_result($result,0,"fecha_vencimiento");
$fvence=explode(" ",$fecha_vencimiento);
$fvenx=explode("-",$fvence[0]);
$monto=mysqli_result($result,0,"monto");
$comision=mysqli_result($result,0,"comision");
$ingreso=mysqli_result($result,0,"ingreso");

$tipoventa=mysqli_result($result,0,"tipo_venta");

$marca=mysqli_result($result,0,"marca");
$modelo=mysqli_result($result,0,"modelo");
$tipo=mysqli_result($result,0,"tipo");
$color=mysqli_result($result,0,"color");
$placas=mysqli_result($result,0,"placas");
$serie=mysqli_result($result,0,"serie");
$servicio_vehiculo=mysqli_result($result,0,"servicio");
$pre_idPoliza=mysqli_result($result,0,"idPoliza");
$pre_tmpid=mysqli_result($result,0,"tmpid");

$nombre=mysqli_result($result,0,"nombre");
$fecha_nacimiento=mysqli_result($result,0,"fecha_nacimiento");
$fecha=explode("-",$fecha_nacimiento);
$domicilio=mysqli_result($result,0,"domicilio");
$colonia=mysqli_result($result,0,"colonia");
$ciudad=mysqli_result($result,0,"ciudad");
$municipio=mysqli_result($result,0,"municipio");
$estado=mysqli_result($result,0,"estado");
$tel=mysqli_result($result,0,"tel");
$cel=mysqli_result($result,0,"cel");
$nextel=mysqli_result($result,0,"nextel");
$mail=mysqli_result($result,0,"mail");

 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from TipoVenta where idVenta = '$tipoventa'");
$tipoventa=mysqli_result($result,0,"nombre");
/*
 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from Estado where idEstado = '$estado'");
$estado=mysqli_result($result,0,"nombreEstado");

 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from Municipio where idMunicipio = '$municipio'");
$municipio=mysqli_result($result,0,"nombreMunicipio");

 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from Colonia where idColonia = '$colonia'");
$colonia=mysqli_result($result,0,"nombreColonia");   
   */
   
   

 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from Poliza where idPoliza = '$pre_idPoliza'");
$idcliente=mysqli_result($result,0,"idCliente");

 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from Cliente where idCliente = '$idcliente'");
$nombre_cliente=mysqli_result($result,0,"nombre");

   
   
   
   
   
   
   
   
   
   
   
 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from servicios where id = '$servicio'");
$nombre_servicio=mysqli_result($result,0,"servicio");
$tipo_servicio=mysqli_result($result,0,"tipo");
$campos=mysqli_result($result,0,"campos");
$camposex=explode(",",$campos);

   
   
   echo'<form id="form1" name="form1" method="post" action="mainframe.php?module=pre_cabina_d&clave='.$clave.'&idcliente='.$idcliente.'&servicio='.$servicio.'&expediente='.$expediente.'" onSubmit="return validar(this)">';
   echo'<input name="servicio" type="hidden" value="'.$servicio.'" />
   <input name="idcliente" type="hidden" value="'.$idcliente.'" />
   <input name="clave" type="hidden" value="'.$clave.'" />
   ';
   
   ?>
     <table width="100%%" border="0" cellpadding="3" cellspacing="3">
       <tr>
         <td colspan="6" bgcolor="#999999">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><span class="style1"><?php echo $nombre_servicio;?></span></td>
             <td align="right"><strong>[ <a href="javascript:popUp('bitacorab.php?id=<?php echo $expediente;?>')">Lanzar bit&aacute;cora</a>]</strong></td>
           </tr>
         </table>           </td>
       </tr>
	   <tr>
			<td colspan="6" bgcolor="#CCCCCC">
				Tipo de expediente: 
				<select name="tipo_expediente">
					<option value="Normal">Normal</option>
					<option value="Cobro de Accesorio">Cobro de Accesorio</option>
				</select>
			</td>
	   </tr>
       <tr>
         <td colspan="6">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n del Usuario</span></td>
       </tr>
       <tr>
         <td colspan="6" bgcolor="#CCCCCC">Servicio capturado por usuario: 
           <input name="nix" type="text" id="nix" size="20" value="<?php echo $valid_user;?>" readonly/></td>
       </tr>
       <tr>
         <td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n General del Cliente </span></td>
       </tr>
       <tr>
       
       <?php 
       $checa_array=array_search("informacion_caso",$camposex);
if($checa_array===FALSE){
#################startelse
 $cuenta_campos=0;
$checa_array=array_search("fecha_recepcion",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Fecha de recepci&oacute;n:</strong></td><td bgcolor="#CCCCCC"><input name="fecha_recepcion" type="text" id="fecha_recepcion" size="10" readonly value="'.date("d-m-Y").'"/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}
#//
/*
$checa_array=array_search("hora_apertura",$camposex);
if($checa_array===FALSE){} else{
*/
echo'<td bgcolor="#CCCCCC"><strong>Tipo de expediente:</strong></td>
         <td bgcolor="#CCCCCC"><select name="tipo_expediente">
				<option value="Normal" selected="selected">Normal</option>
				<option value="Cobro de Accesorio">Cobro de Accesorio</option>
				</select>
			</td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}

echo'<td bgcolor="#CCCCCC"><strong>Hora de apertura del expediente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="hora1" type="text" id="hora1" size="8" value="'.date("H:i:s").'" readonly/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
/*
}
*/
#//
$checa_array=array_search("num_contrato",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Num. de contrato: 
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="num_contrato" type="text" id="num_contrato" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$contrato.'" readonly/>
         </strong></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}		 
		 }		 
#//
$checa_array=array_search("reporta",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Nombre de quien reporta: 
         </strong></td><td bgcolor="#CCCCCC"><input name="reporta" type="text" id="reporta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }
#//
$checa_array=array_search("tel_reporta",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Tel. de Contacto: 
         </strong></td>
         <td bgcolor="#CCCCCC"><input name="tel_reporta" type="text" id="tel_reporta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" onkeypress="return numbersonly(this, event)"/></td>';
		 
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }
#//
$checa_array=array_search("fecha_suceso",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Fecha en que se sucit&oacute; el hecho:</strong></td>
         <td bgcolor="#CCCCCC"><input name="fecha1" type="text" id="fecha1" size="15" value="'.date("d-m-Y").'" readonly="readonly"/></td>
		 	 <script type="text/javascript">
                            Calendar.setup({
                                    inputField     :    "fecha1",   // id of the input field
                                    ifFormat       :    "%d-%m-%Y",       // format of the input field
                                    timeFormat     :    "24"
                            });
                  </script>
				  
';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}
#//
$checa_array=array_search("convenio",$camposex);
if($checa_array===FALSE){} else{echo ' <td bgcolor="#CCCCCC"><strong>Num de convenio: 
             
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="convenio" type="text" id="convenio" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/>
         </strong></td>';
		 
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}		
#//	 
$checa_array=array_search("expediente",$camposex);
if($checa_array===FALSE){} else{
/*
 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($link,"SELECT * from general order by id desc limit 1");
$expediente=mysqli_result($result,0,"expediente");
#echo $expediente;
$expediente=$expediente+1;
*/

echo '<td bgcolor="#CCCCCC"><strong>N&uacute;mero de expediente: 
           
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="expediente" type="text" id="expediente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$expedientex.'" readonly/>
         </strong></td>';
		 
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}				 
#//		 
$checa_array=array_search("num_cliente",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Nombre del cliente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="cliente" type="text" id="cliente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$nombre_cliente.'"/></td>';
		 
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }				 
#//
$checa_array=array_search("num_siniestro",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>N&uacute;mero de siniestro: </strong></td><td bgcolor="#CCCCCC"><input name="siniestro" type="text" id="siniestro" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}
#//
$checa_array=array_search("inciso",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Inciso:</strong></td>
         <td bgcolor="#CCCCCC"><input name="inciso" type="text" id="inciso" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$inciso.'" onkeypress="return numbersonly(this, event)"/></td>';
		 
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}
#//
		 		 $checa_array=array_search("usuario",$camposex);
if($checa_array===FALSE){} else{echo ' <td bgcolor="#CCCCCC"><strong>Nombre de usuario:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="usuario" type="text" id="usuario" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$nombre.'"/></td>';
		 
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }
#//
		 		 $checa_array=array_search("reporte_cliente",$camposex);
if($checa_array===FALSE){} else{echo ' <td bgcolor="#CCCCCC"><strong>No. de Control:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="reporte_cliente" type="text" id="reporte_cliente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$reporte_cliente.'"/></td>';
		 
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }
#//

$checa_array=array_search("ejecutivo",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ejecutivo:</strong></td><td bgcolor="#CCCCCC"><input name="ejecutivo" type="text" id="ejecutivo" size="20" value=""/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}

#//

$checa_array=array_search("fax",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Fax:</strong></td><td bgcolor="#CCCCCC"><input name="fax" type="text" id="fax" size="20" value=""/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}

#//

$checa_array=array_search("email",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>E-Mail:</strong></td><td bgcolor="#CCCCCC"><input name="email" type="text" id="email" size="20" value=""/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}

#//

$checa_array=array_search("cobertura",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Cobertura:</strong></td><td bgcolor="#CCCCCC"><input name="cobertura" type="text" id="cobertura" size="20" value=""/></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}

#//


if($cuenta_campos=="2"){echo'<td colspan=2 bgcolor="#cccccc">&nbsp;</td>';}
if($cuenta_campos=="1"){echo'<td colspan=4 bgcolor="#cccccc">&nbsp;</td>';}
	
#################endelse
} else{echo'
<td bgcolor="#CCCCCC"><strong>Fecha de recepci&oacute;n:</strong></td><td bgcolor="#CCCCCC"><input name="fecha_recepcion" type="text" id="fecha_recepcion" size="10" readonly value="'.date("d-m-Y").'"/></td>

				  <td bgcolor="#CCCCCC"><strong>Hora de apertura del expediente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="hora1" type="text" id="hora1" size="8" value="'.date("H:i:s").'" readonly/></td>

		 <td bgcolor="#CCCCCC"><strong>Num. de contrato: 
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="num_contrato" type="text" id="num_contrato" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$contrato.'" readonly/>
         </strong></td>
		 
				  
		 </tr><tr>
		 <td bgcolor="#CCCCCC"><strong>Nombre de quien reporta: 
         </strong></td><td bgcolor="#CCCCCC"><input name="reporta" type="text" id="reporta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Telefono de quien reporta: 
         </strong></td>
         <td bgcolor="#CCCCCC"><input name="tel_reporta" type="text" id="tel_reporta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" onkeypress="return numbersonly(this, event)"/></td>

<td bgcolor="#CCCCCC"><strong>Fecha en que se sucit&oacute; el hecho:</strong></td>
         <td bgcolor="#CCCCCC"><input name="fecha1" type="text" id="fecha1" size="15" readonly  value="'.date("d-m-Y").'"  /></td>
		 	 <script type="text/javascript">
                            Calendar.setup({
                                    inputField     :    "fecha1",   // id of the input field
                                    ifFormat       :    "%d-%m-%Y",       // format of the input field
                                    timeFormat     :    "24"
                            });
                </script>

</tr><tr>

<td bgcolor="#CCCCCC"><strong>Num de convenio: 
             
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="convenio" type="text" id="convenio" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/>
         </strong></td>';
		 
		 
		 $expedientex=$expediente;
if(strlen($expedientex)==1){$expedientex="000000".$expedientex."";} 
if(strlen($expedientex)==2){$expedientex="00000".$expedientex."";} 
if(strlen($expedientex)==3){$expedientex="0000".$expedientex."";} 
if(strlen($expedientex)==4){$expedientex="000".$expedientex."";} 
if(strlen($expedientex)==5){$expedientex="00".$expedientex."";} 
if(strlen($expedientex)==6){$expedientex="0".$expedientex."";} 



echo '<td bgcolor="#CCCCCC"><strong>N&uacute;mero de expediente: 
           
         </strong></td>
         <td bgcolor="#CCCCCC"><strong>
           <input name="expediente" type="text" id="expediente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$expedientex.'" readonly/>
         </strong></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Nombre del cliente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="cliente" type="text" id="cliente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$nombre_cliente.'"/></td>
		 </tr><tr>
		 <td bgcolor="#CCCCCC"><strong>N&uacute;mero de siniestro: </strong></td><td bgcolor="#CCCCCC"><input name="siniestro" type="text" id="siniestro" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Inciso:</strong></td>
         <td bgcolor="#CCCCCC"><input name="inciso" type="text" id="inciso" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$inciso.'" onkeypress="return numbersonly(this, event)"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Nombre de usuario:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="usuario" type="text" id="usuario" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$nombre.'"/></td>
		 
		 </tr><tr>
		 <td bgcolor="#CCCCCC"><strong>Reporte cliente:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="reporte_cliente" type="text" id="reporte_cliente" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$reporte_cliente.'"/></td>
		 
 <td bgcolor="#CCCCCC">&nbsp;</td> <td bgcolor="#CCCCCC">&nbsp;</td><td bgcolor="#CCCCCC">&nbsp;</td><td bgcolor="#CCCCCC">&nbsp;</td>
		 </tr>
		 
';}


$checa_array=array_search("detalles_servicio",$camposex);
if($checa_array===FALSE){
echo'<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n Espec&iacute;fica del Servicio</span></td></tr><tr>';
#Startxelxe
$cuenta_campos=0;
$checa_array=array_search("tecnico_solicitado",$camposex);
if($checa_array===FALSE){} else{echo '<td height="25" bgcolor="#CCCCCC"><strong>T&eacute;cnico solicitado: </strong></td><td bgcolor="#CCCCCC"><select name="tecnico" id="tecnico">

<option value="Plomero">Plomero</option>
<option value="Cerrajero">Cerrajero</option>
<option value="Vidriero">Vidriero</option>
<option value="Electricista">Electricista</option>
<option value="Carpintero">Carpintero</option>
<option value="Ebanista">Ebanista</option>
<option value="Jardinero">Jardinero</option>
<option value="Herrero">Herrero</option>
<option value="Alba�iler�a">Alba�iler�a</option>
<option value="Impermeabilizador">Impermeabilizador</option>
<option value="Puertas el�ctricas">Puertas el�ctricas</option>
<option value="CCTV">CCTV</option>
<option value="T�cnico en electrodimesticos">T�cnico en electrodimesticos</option>
<option value="Lavado de Alfombras y Mobiliario">Lavado de Alfombras y Mobiliario</option>
<option value="Pintores">Pintores</option>
<option value="Mantenimiento y limpieza de Albercas">Mantenimiento y limpieza de Albercas</option>
<option value="T�cnico en computaci�n">T�cnico en computaci�n</option>
<option value="Transporte de Mudanzas">Transporte de Mudanzas</option>
<option value="Calefacci�n y A/A">Calefacci�n y A/A</option>
<option value="Handyman">Handyman</option>
<option value="Servicio Dom�stico">Servicio Dom�stico</option>
<option value="Otros t�cnicos">Otros t�cnicos</option>
</select></td>';
$cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}		 
#// 
if($cuenta_campos=="2"){echo'<td colspan=2 bgcolor="#cccccc">&nbsp;</td>';}
if($cuenta_campos=="1"){echo'<td colspan=4 bgcolor="#cccccc">&nbsp;</td>';}		 
#//		 
$checa_array=array_search("motivo_servicio",$camposex);
if($checa_array===FALSE){} else{echo '<tr><td colspan="3" bgcolor="#CCCCCC"><strong>Motivo del servicio:           <br />
           <center><textarea name="motivo" cols="40" rows="3" id="motivo" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></textarea>
           </center>
         </strong></td>';
		 $cuenta_campos=$cuenta_campos+1;
		 }
		 

#$cuenta_campos=0;		 
#//
$checa_array=array_search("ubicacion_requiere",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC" colspan=3><strong>Ubicaci&oacute;n donde requiere el servicio y referencias:</strong> <br>
 <center><textarea name="ubicacion" cols="40" rows="3" id="ubicacion" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></textarea>
           </center>
</td>';
		 $cuenta_campos=0;
}			 
#$cuenta_campos=0;	
echo'</tr><tr>';	 
#//
$checa_array=array_search("tipo_asistencia_vial",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Tipo de asistencia vial:</strong> </td>
         <td bgcolor="#CCCCCC"><select name="tipo_vial" id="tipo_vial">
           <option>Seleccione...</option>
           <option value="Traslado para evitar alcohol&iacute;metro">Traslado para evitar alcohol&iacute;metro</option>
             <option value="Siniestro">Siniestro</option>
             <option value="Asistencia">Asistencia</option>
			 <option value="Paso de Corriente">Paso de Corriente</option>
             <option value="Cambio de llanta">Cambio de llanta</option>
             <option value="Llaves en el interior del veh&iacute;culo">Llaves en el interior del veh&iacute;culo</option>
             <option value="Env&iacute;o de gasolina">Env&iacute;o de gasolina</option>
             <option value="Problemas administrativos">Problemas administrativos</option>
                    </select>         </td>';
					
					
							 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}	
#//					
$checa_array=array_search("tipo_asistencia_medica",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Tipo de asistencia m&eacute;dica:</strong> </td>
         <td bgcolor="#CCCCCC"><select name="tipo_medica" id="tipo_medica">
		   <option>Seleccione...</option>
             <option value="Consulta telef&oacute;nica">Consulta telef&oacute;nica</option>
             <option value="Consulta a domicilio">Consulta a domicilio</option>
             <option value="Ambulancia">Ambulancia</option>
         </select></td>';
	 
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}	
#//
$checa_array=array_search("domicilio_cliente",$camposex);
if($checa_array===FALSE){} else{echo '         <td bgcolor="#CCCCCC"><strong>Domicilio del Cliente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="domicilio" type="text" id="domicilio" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$domicilio.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//
$checa_array=array_search("domicilio_sustituto",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Domicilio donde recoger&aacute; auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="domicilio_sustituto" type="text" id="domicilio_sustituto" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$domicilio.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//
$checa_array=array_search("ubicacion_estado",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ubicaci�n Estado:</strong></td>
         <td bgcolor="#CCCCCC"><select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'><option value=\'0\'>Seleccione un Estado</option>';

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}
        echo'</select></td>';
				 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}			 
#//
$checa_array=array_search("ubicacion_municipio",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ubicaci�n Municipio:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio) && isset($estado)){
						 echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio"); 
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
						<option value="0">Seleccione un Estado</option>
					</select>';}

						  echo'</td>';
						  		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}	
#//			  		 
$checa_array=array_search("ubicacion_colonia",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ubicaci�n Colonia:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio) && isset($estado)){
						 echo'  <select name="colonia" id="colonia"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 

    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
			    		$miser=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,35);											
		  		$miser=substr($miser,0,25);											

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$miser.'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="colonia" id="colonia" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Municipio</option>
					</select>';}
						  echo'</td>';
						  		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}	
#//
$checa_array=array_search("ubicacion_ciudad",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ubicaci�n Ciudad o localidad:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="ciudad" type="text" id="ciudad" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$ciudad.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//
$checa_array=array_search("destino_servicio",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Destino:</strong></td>
         <td bgcolor="#CCCCCC"><input name="destino" type="text" id="destino" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}	
#//
$checa_array=array_search("destino_estado",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Destino Estado:</strong></td>
         <td bgcolor="#CCCCCC"><select name="estado2" id="estado2" onchange=\'cargaContenido(this.id)\'>
           <option value=\'0\'>Seleccione un Estado</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado2==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}
         echo'</select></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//
$checa_array=array_search("destino_municipio",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Destino Municipio:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if($accela=="edit"){
						 echo'  <select name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado2'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);								
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio2==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>

						<option value="0">Seleccione un Estado</option>

					</select>';
					}
echo'</td>';
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}	
#//
$checa_array=array_search("destino_colonia",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Destino Colonia:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio2) && isset($estado2)){
						 echo'  <select name="colonia2" id="colonia2"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);											

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia2==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="colonia2" id="colonia2" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Municipio</option>
					</select>';}
						  echo'</td>';
						  		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}	
#//						  		 
$checa_array=array_search("destino_ciudad",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ciudad o localidad: </strong></td>
         <td bgcolor="#CCCCCC"><input name="ciudad2" type="text" id="ciudad2" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//
$checa_array=array_search("formato_carta",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Formato de carta auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="formato_carta" type="text" id="formato_carta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}		 
		 }	
#//
$checa_array=array_search("instructivo",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Ventana con instructivo para auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="ventana" type="text" id="ventana" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }	
#//	 
if($cuenta_campos=="2"){echo'<td colspan=2 bgcolor="#cccccc">&nbsp;</td>';}
if($cuenta_campos=="1"){echo'<td colspan=4 bgcolor="#cccccc">&nbsp;</td>';}
echo'</tr>';
#Endelxex
} else{echo'

<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n Espec&iacute;fica del Servicio</span></td></tr>
<tr><td height="25" bgcolor="#CCCCCC"><strong>T&eacute;cnico solicitado: </strong></td><td bgcolor="#CCCCCC">
<select name="tecnico" id="tecnico">

<option value="Plomero">Plomero</option>
<option value="Cerrajero">Cerrajero</option>
<option value="Vidriero">Vidriero</option>
<option value="Electricista">Electricista</option>

</select></td>
 <td bgcolor="#CCCCCC">&nbsp;</td> <td bgcolor="#CCCCCC">&nbsp;</td><td bgcolor="#CCCCCC">&nbsp;</td><td bgcolor="#CCCCCC">&nbsp;</td></tr>

<tr><td colspan="6" bgcolor="#CCCCCC"><strong>Motivo del servicio:           <br />
           <center><textarea name="motivo" cols="90" rows="8" id="motivo" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></textarea>
           </center>
         </strong></td></tr><tr>
		 
		 <td bgcolor="#CCCCCC" colspan=6><strong>Ubicaci&oacute;n donde requiere el servicio y referencias:</strong> <br>

 <center><textarea name="ubicacion" cols="90" rows="8" id="ubicacion" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></textarea>
           </center>

</td></tr>
<tr><td bgcolor="#CCCCCC"><strong>Tipo de asistencia vial:</strong> </td>
         <td bgcolor="#CCCCCC"><select name="tipo_vial" id="tipo_vial">
           <option>Seleccione...</option>
           <option value="Traslado para evitar alcohol&iacute;metro">Traslado para evitar alcohol&iacute;metro</option>
             <option value="Siniestro">Siniestro</option>
             <option value="Asistencia">Asistencia</option>
             <option value="Cambio de llanta">Cambio de llanta</option>
             <option value="Llaves en el interior del veh&iacute;culo">Llaves en el interior del veh&iacute;culo</option>
             <option value="Env&iacute;o de gasolina">Env&iacute;o de gasolina</option>
             <option value="Problemas administrativos">Problemas administrativos</option>
                    </select>         </td>
					
					
					<td bgcolor="#CCCCCC"><strong>Tipo de asistencia m&eacute;dica:</strong> </td>
         <td bgcolor="#CCCCCC"><select name="tipo_medica" id="tipo_medica">
		   <option>Seleccione...</option>
             <option value="Consulta telef&oacute;nica">Consulta telef&oacute;nica</option>
             <option value="Consulta a domicilio">Consulta a domicilio</option>
             <option value="Ambulancia">Ambulancia</option>
         </select></td>
		 
		 
		 <td bgcolor="#CCCCCC"><strong>Domicilio del Cliente:</strong></td>
         <td bgcolor="#CCCCCC"><input name="domicilio" type="text" id="domicilio" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$domicilio.'"/></td>
		 </tr><tr>
		 <td bgcolor="#CCCCCC"><strong>Domicilio donde recoger&aacute; auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="domicilio_sustituto" type="text" id="domicilio_sustituto" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$domicilio.'"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Ubicaci�n Estado:</strong></td>
         <td bgcolor="#CCCCCC"><select name="estado" id="estado" onChange=\'cargaContenido(this.id)\'><option value=\'0\'>Seleccione un Estado</option>';

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

        echo'</select></td>
		 <td bgcolor="#CCCCCC"><strong>Ubicaci�n Municipio:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio) && isset($estado)){
						 echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option>
					</select>';}

						  echo'</td></tr><tr>
						  <td bgcolor="#CCCCCC"><strong>Ubicaci�n Colonia:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio) && isset($estado)){
						 echo'  <select name="colonia" id="colonia" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio' order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    	$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,35);											

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="colonia" id="colonia" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Municipio</option>
					</select>';}

						  echo'</td><td bgcolor="#CCCCCC"><strong>Ubicaci�n Ciudad o localidad:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="ciudad" type="text" id="ciudad" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$ciudad.'"/></td>
		 <td bgcolor="#CCCCCC"><strong>Destino:</strong></td>
         <td bgcolor="#CCCCCC"><input name="destino" type="text" id="destino" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td></tr><tr>
		 <td bgcolor="#CCCCCC"><strong>Destino Estado:</strong></td>
         <td bgcolor="#CCCCCC"><select name="estado2" id="estado2" onchange=\'cargaContenido(this.id)\'>
           <option value=\'0\'>Seleccione un Estado</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado2==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}


         echo'</select></td>
		 <td bgcolor="#CCCCCC"><strong>Destino Municipio:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($estado2)){
						 echo'  <select name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado2'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio2==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';

  }

else{echo'<select disabled="disabled" name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>

						<option value="0">Seleccione un Estado</option>

					</select>';
					}

echo'</td><td bgcolor="#CCCCCC"><strong>Destino Colonia:</strong></td>
         <td bgcolor="#CCCCCC">';
						  if(isset($municipio2) && isset($estado2)){
						 echo'  <select name="colonia2" id="colonia2" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio2'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,35);											

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia2==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="colonia2" id="colonia2" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Municipio</option>
					</select>';}

						  echo'</td></tr><tr><td bgcolor="#CCCCCC"><strong>Ciudad o localidad: </strong></td>
         <td bgcolor="#CCCCCC"><input name="ciudad2" type="text" id="ciudad2" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>
						  <td bgcolor="#CCCCCC"><strong>Formato de carta auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="formato_carta" type="text" id="formato_carta" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td><td bgcolor="#CCCCCC"><strong>Ventana con instructivo para auto sustituto:</strong> </td>
         <td bgcolor="#CCCCCC"><input name="ventana" type="text" id="ventana" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"/></td>
						  
</tr>';
}
       $checa_array=array_search("informacion_vehiculo",$camposex);
if($checa_array===FALSE){
#CIXVERICL
echo'<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n del Afiliado</span></td></tr><tr>';
$cuenta_campos=0;
$checa_array=array_search("auto_marca",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Marca:</strong></td>
         <td bgcolor="#CCCCCC"><input name="marca" type="text" id="marca" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$marca.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}
#//
$checa_array=array_search("auto_tipo",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Tipo:</strong></td>
         <td bgcolor="#CCCCCC"><input name="tipo" type="text" id="tipo" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$tipo.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
		 }
#//
$checa_array=array_search("auto_modelo",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Modelo:</strong></td>
         <td bgcolor="#CCCCCC"><input name="modelo" type="text" id="modelo" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$modelo.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}
#//
$checa_array=array_search("auto_color",$camposex);
if($checa_array===FALSE){} else{echo '<td bgcolor="#CCCCCC"><strong>Color:</strong></td>
         <td bgcolor="#CCCCCC"><input name="color" type="text" id="color" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$color.'"/></td>';
		 		 $cuenta_campos=$cuenta_campos+1;
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}}		 		 
#//
$checa_array=array_search("auto_placas",$camposex);
if($checa_array===FALSE){} else{echo '         <td bgcolor="#CCCCCC"><strong>C�digo Identificador:</strong></td><td bgcolor="#CCCCCC"><input name="placas" type="text" id="placas" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$placas.'"/></td>';
		 $cuenta_campos=$cuenta_campos+1;

if($cuenta_campos=="2"){echo'<td colspan=2 bgcolor="#cccccc">&nbsp;</td>';}
if($cuenta_campos=="1"){echo'<td colspan=4 bgcolor="#cccccc">&nbsp;</td>';}
		 
		 
if($cuenta_campos=="3"){echo'</tr><tr>'; $cuenta_campos=0;}
}	
echo'</tr>';
#CIXVERICL
} else{echo'
<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n del Veh&iacute;culo</span></td></tr>
<tr>
<td bgcolor="#CCCCCC"><strong>Marca:</strong></td>
         <td bgcolor="#CCCCCC"><input name="marca" type="text" id="marca" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$marca.'"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Tipo:</strong></td>
         <td bgcolor="#CCCCCC"><input name="tipo" type="text" id="tipo" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$tipo.'"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Modelo:</strong></td>
         <td bgcolor="#CCCCCC"><input name="modelo" type="text" id="modelo" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$modelo.'"/></td>
		 </tr><tr>
		 <td bgcolor="#CCCCCC"><strong>Color:</strong></td>
         <td bgcolor="#CCCCCC"><input name="color" type="text" id="color" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$color.'"/></td>
		 
		 <td bgcolor="#CCCCCC"><strong>Placas:</strong></td><td bgcolor="#CCCCCC"><input name="placas" type="text" id="placas" size="20" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="'.$placas.'"/></td>
		 <td bgcolor="#CCCCCC">&nbsp;</td>		 <td bgcolor="#CCCCCC">&nbsp;</td></tr>
		 
		 
';
}
	//Seccion de vuelos
	$checa_array=array_search("detalles_vuelo",$camposex);
	if($checa_array===FALSE)
	{
		$cuenta_campos=0;
		echo'<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n del Vuelo</span></td></tr><tr>';
		
		//Campo pasajero
		$checa_array=array_search("pasajero",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Pasajero:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="pasajero" type="text" id="pasajero" size="20" value="'.$pasajero.'"/></td>';
		 	$cuenta_campos++;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}			
		
		//Fecha de compra
		$checa_array=array_search("fecha_compra",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Fecha de Compra:</strong></td>
                   <td bgcolor="#CCCCCC"><input name="fecha_compra" type="text" id="fecha_compra" size="15" value="'.date("d-m-Y").'" readonly="readonly"/></td>
   		 	       <script type="text/javascript">
                   	Calendar.setup({
                    				inputField     :    "fecha_compra",   // id of the input field
                                    ifFormat       :    "%d-%m-%Y",       // format of the input field
                                    timeFormat     :    "24"
                            	});
	               </script>'; 
			$cuenta_campos++;	   
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}	
		
		//C�digo de reserva
		$checa_array=array_search("codigo_reserva",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>C&oacute;digo de Reserva:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="codigo_reserva" type="text" id="codigo_reserva" size="20" value="'.$codigo_reserva.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Vuelo
		$checa_array=array_search("vuelo",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Vuelo:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="vuelo" type="text" id="vuelo" size="20" value="'.$vuelo.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Fecha de vuelo
		$checa_array=array_search("fecha_vuelo",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{			
			echo '<td bgcolor="#CCCCCC"><strong>Fecha de vuelo:</strong></td>
                   <td bgcolor="#CCCCCC"><input name="fecha_vuelo" type="text" id="fecha_vuelo" size="15" value="'.date("d-m-Y").'" readonly="readonly"/></td>
   		 	       <script type="text/javascript">
                   	Calendar.setup({
                    				inputField     :    "fecha_vuelo",   // id of the input field
                                    ifFormat       :    "%d-%m-%Y",       // format of the input field
                                    timeFormat     :    "24"
                            	});
	               </script>'; 
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Fecha de vuelo
		$checa_array=array_search("origen_ciudad",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Ciudad de Or&iacute;gen:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="origen_ciudad" type="text" id="origen_ciudad" size="20" value="'.$origen_ciudad.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Ciudad Destino
		$checa_array=array_search("destino_ciudad_v",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Ciudad Destino:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="destino_ciudad_v" type="text" id="destino_ciudad_v" size="20" value="'.$destino_ciudad_v.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Fecha de Respuesta
		$checa_array=array_search("fecha_respuesta",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{			
			 
			 echo '<td bgcolor="#CCCCCC"><strong>Fecha de Respuesta:</strong></td>
                   <td bgcolor="#CCCCCC"><input name="fecha_respuesta" type="text" id="fecha_respuesta" size="15" value="'.date("d-m-Y").'" readonly="readonly"/></td>
   		 	       <script type="text/javascript">
                   	Calendar.setup({
                    				inputField     :    "fecha_respuesta",   // id of the input field
                                    ifFormat       :    "%d-%m-%Y",       // format of the input field
                                    timeFormat     :    "24"
                            	});
	               </script>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//motivo del servicio
		$checa_array=array_search("motivo_servicio_v",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Motivo del Servicio:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="motivo_servicio_v" type="text" id="motivo_servicio_v" size="20" value="'.$motivo_servicio_v.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Telefono
		$checa_array=array_search("telefono_v",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Tel. de Contacto:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="telefono_v" type="text" id="telefono_v" size="20" value="'.$telefono_v.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//Fax
		$checa_array=array_search("fax_v",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>Fax:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="fax_v" type="text" id="fax_v" size="20" value="'.$fax_v.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
		
		//E-mail
		$checa_array=array_search("email_v",$camposex);
		if($checa_array===FALSE)
		{
		}
		else
		{
			echo '<td bgcolor="#CCCCCC"><strong>E-mail:</strong></td>
	         <td bgcolor="#CCCCCC"><input name="email_v" type="text" id="email_v" size="20" value="'.$email_v.'"/></td>';
		 	$cuenta_campos=$cuenta_campos+1;
			if($cuenta_campos=="3")
			{
				echo'</tr><tr>';
				$cuenta_campos=0;
			}
		}
	}	

	   ?>
       
       
       
	   <?php 

		 
if($_POST[cobrarservicio]=="si"){echo '
<tr><td colspan=6 bgcolor="#999999"><span class="style1">Servicio con costo</span></td></tr>
<tr><td bgcolor="#CCCCCC"><strong>Costo del servicio:</strong></td><td bgcolor="#CCCCCC">$<input name="costo" type="text" id="costo" size="18" onkeypress="return numbersonly(this, event)"/></td>
         <td bgcolor="#CCCCCC">&nbsp;</td>
         <td bgcolor="#CCCCCC">&nbsp;</td>
         <td bgcolor="#CCCCCC">&nbsp;</td>
         <td bgcolor="#CCCCCC">&nbsp;</td>
</tr>
';}	

if($tipo_servicio=="legal"){echo'<input name="capturalegal" type="hidden" value="si" />';}
else{
$checa_array=array_search("informacion_legal",$camposex);
if($checa_array===FALSE){} else{echo'<input name="capturalegal" type="hidden" value="si" />';}
}
#info_poliza


$checa_array=array_search("informacion_poliza",$camposex);
if($checa_array===FALSE){} else{ 
###############
echo'<tr><td colspan="6" bgcolor="#999999"><span class="style1">Informaci&oacute;n de la Poliza </span></td></tr>';
echo'   <tr>
            <td width="100" bgcolor="#cccccc"><strong>Aseguradora:</strong></td>
            <td bgcolor="#cccccc"><input name="aseguradora" type="text" id="aseguradora" size="20" value="'.$aseguradora.'"/></td>
            <td width="150" bgcolor="#cccccc"><strong>Ajustador:</strong></td>
            <td bgcolor="#cccccc"><input name="ajustador" type="text" id="ajustador" size="20" value="'.$ajustador.'"/></td>


			

            <td width="150" bgcolor="#cccccc"><strong>Tel/ID:</strong></td>
						            <td bgcolor="#cccccc"><input name="telid" type="text" id="telid" size="20" value="'.$telid.'"/></td>
			          </tr>
          <tr>
           
		               <td width="150" bgcolor="#cccccc"><strong>P&oacute;liza:</strong></td> <td bgcolor="#cccccc"><input name="aseg_poliza" type="text" id="aseg_poliza" size="20" value="'.$aseg_poliza.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#cccccc"><strong>Inciso:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_inciso" type="text" id="aseg_inciso" size="20" value="'.$aseg_inciso.'"/></td>
            <td bgcolor="#cccccc"><strong>Vigencia inicio: </strong></td>
            <td bgcolor="#cccccc">';
			
echo'<select name="aseg_vigencia_inicio_dia" id="aseg_vigencia_inicio_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="aseg_vigencia_inicio_mes" id="aseg_vigencia_inicio_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="aseg_vigencia_inicio_ano" id="aseg_vigencia_inicio_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';

			echo'</td>
			          </tr>
          <tr>

            <td bgcolor="#cccccc"><strong>Vigencia t&eacute;rmino: </strong></td>
            <td bgcolor="#cccccc">';
			
echo'<select name="aseg_vigencia_termino_dia" id="aseg_vigencia_termino_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="aseg_vigencia_termino_mes" id="aseg_vigencia_termino_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="aseg_vigencia_termino_ano" id="aseg_vigencia_termino_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
echo'</td>
            <td bgcolor="#cccccc"><strong>Cobertura: </strong></td>
            <td bgcolor="#cccccc"><input name="cobertura" type="text" id="cobertura" size="20" value="'.$aseg_cobertura.'" /></td>
           <!-- <td bgcolor="#cccccc"><strong>Monto: </strong></td>
            <td bgcolor="#cccccc">$
            <input name="monto" type="text" id="monto" size="20" value="'.$aseg_monto.'" onKeyPress="return numbersonly(this, event)"/></td> -->
            <td bgcolor="#cccccc"><strong>Asegurado: </strong></td>
            <td bgcolor="#cccccc"><input name="asegurado" type="text" id="asegurado" value="'.$asegurado.'" size="20" /></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>y/o: </strong></td>
            <td bgcolor="#cccccc"><input name="aseg_y_o" type="text" id="aseg_y_o" size="20" value="'.$aseg_y_o.'"/></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_tel1" type="text" id="aseg_tel1" size="20" value="'.$aseg_tel1.'" onKeyPress="return numbersonly(this, event)" /></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_tel2" type="text" id="aseg_tel2" size="20" value="'.$aseg_tel2.'" onKeyPress="return numbersonly(this, event)" /></td>
    </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Calle y n&uacute;mero:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_domicilio" type="text" id="aseg_domicilio" size="20" value="'.$aseg_domicilio.'"/></td>
            <td bgcolor="#cccccc"><strong>C.P.:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_cp" type="text" id="aseg_cp" size="20" value="'.$aseg_cp.'"/></td>
            <td bgcolor="#cccccc"><strong>Estado:</strong></td>
            <td bgcolor="#cccccc">';
            

			echo'<select name="aseg_estado" id="aseg_estado" onchange="cargaContenido(this.id)"><option value="0">Seleccione un Estado</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'
              <option value="'.$row["idEstado"].'"';
     if($aseg_estado==$row["idEstado"]){echo'selected';}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

echo'</select>';
echo'</td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Municipio:</strong></td>
            <td bgcolor="#cccccc">';
			
if(isset($aseg_estado) && $aseg_estado!=""){
echo'  <select name="aseg_municipio" id="aseg_municipio" onChange=\'cargaContenido(this.id)\'><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,35);								
  echo'<option value="'.$row["idMunicipio"].'"';
     if($aseg_municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="aseg_municipio" id="aseg_municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option></select>';}	
						echo'</td>
            <td bgcolor="#cccccc"><strong>Colonia:</strong></td>
            <td bgcolor="#cccccc">';
			
			 if(isset($aseg_municipio) && $aseg_municipio!=""){
echo'  <select name="aseg_colonia" id="aseg_colonia"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,35);											

  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
 else{echo'<select disabled="disabled" name="aseg_colonia" id="aseg_colonia">
						<option value="0">Seleccione un Municipio</option>
					</select>';} 

echo'</td>
            <td bgcolor="#cccccc"><strong>Ciudad:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_ciudad" type="text" id="aseg_ciudad" size="20" value="'.$aseg_ciudad.'"/></td>
          </tr>
          <tr>
            <td bgcolor="#cccccc"><strong>Conductor:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_conductor" type="text" id="aseg_conductor" size="20" value="'.$aseg_conductor.'"/></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_conductor_tel1" type="text" id="aseg_conductor_tel1" size="20" value="'.$aseg_conductor_tel1.'" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#cccccc"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#cccccc"><input name="aseg_conductor_tel2" type="text" id="aseg_conductor_tel2" size="20" value="'.$aseg_conductor_tel2.'" onkeypress="return numbersonly(this, event)"/></td>
          </tr>
          ';

##################
}	



	   ?>
       <tr>
         <td colspan="6" align="center" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="A L T A   D E   S E R V I C I O" />
          &nbsp;
          <?php 
          echo' <input type="button" name="button2" id="button2" value="C A N C E L A R   S E R V I C I O" onClick="javascript:confirmcancel(\'process.php?module=cabina_d&accela=cancelar&idcaso='.$expediente.'\');" onMouseover="window.status=\'\'; return true;"/>';
		  ?></td>
         </tr>
     </table>

     </form>
   </td>
 </tr>
</table>
