<script type="text/javascript" src="subcombo.js"></script>

<style type="text/css">

<!--

.style1 {
	font-size: 9px
	color: #FFFFFF;
	font-weight: bold;
}

.stylex2 {font-size: 9px; font-weight: bold; }

-->

</style>
<script type="text/javascript">
<!--

function SetAllCheckBoxesd(FormName, FieldName, CheckValue)
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
		for(var i = 0; i < 12; i++)
			objCheckBoxes[i].checked = CheckValue;
}

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
		for(var i = 12; i < 32; i++)
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
		for(var i = 32; i < 51; i++)
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
		for(var i = 51; i < 56; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function SetAllCheckBoxesc(FormName, FieldName, CheckValue)
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
		for(var i = 56; i < 68; i++)
			objCheckBoxes[i].checked = CheckValue;
}




// -->

</script>
<script> 

function CheckAll()

{

count = document.frm.elements.length;

    for (i=0; i < count; i++) 

	{

    if(document.frm.elements[i].checked == 1)

    	{document.frm.elements[i].checked = 1; }

    else {document.frm.elements[i].checked = 1;}

	}

}

function UncheckAll(){

count = document.frm.elements.length;

    for (i=0; i < count; i++) 

	{

    if(document.frm.elements[i].checked == 1)

    	{document.frm.elements[i].checked = 0; }

    else {document.frm.elements[i].checked = 0;}

	}

}

</script>
<script Language="JavaScript">
function validar(formulario) {

  if (formulario.usuario.value.length < 4) {
    alert("Escriba un nombre de usuario");
    formulario.usuario.focus();
    return (false);
  }


  if (formulario.contrasena.value.length < 4) {
    alert("Escriba una contraseña");
    formulario.contrasena.focus();
    return (false);
  }
  
  
  if (formulario.nombre.value.length < 4) {
    alert("Escriba un nombre");
    formulario.nombre.focus();
    return (false);
  }
  
    if (formulario.cargo.value.length < 4) {
    alert("Escriba un cargo");
    formulario.cargo.focus();
    return (false);
  }
  
    if (formulario.direccion.value.length < 4) {
    alert("Escriba una dirección");
    formulario.direccion.focus();
    return (false);
  }
  
      if (formulario.estado.value == 0) {
    alert("Seleccione un estado");
    formulario.estado.focus();
    return (false);
  }
  
        if (formulario.municipio.value == 0) {
    alert("Seleccione un municipio");
    formulario.municipio.focus();
    return (false);
  }
  
          if (formulario.colonia.value == 0) {
    alert("Seleccione una colonia");
    formulario.colonia.focus();
    return (false);
  }
  
     if (formulario.telefonocasa.value.length < 4) {
    alert("Escriba un teléfono");
    formulario.telefonocasa.focus();
    return (false);
  }
  /*
  
  if ((formulario.email.value.indexOf ('@', 0) == -1)||(formulario.email.value.length < 5)) { 
    alert("Escriba una dirección de correo válida"); 
	    formulario.email.focus();
    return (false); 
  }
  */
  return (true); 
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Usuarios Acceso a Clientes</span></td><td width=150 class="blacklinks"><?php  $checa_array1=array_search("cl_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuarios&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php 

			if($accela=="new"){echo'Dar de alta Usuario';}

			else{echo'Editar Usuario';



			}

			?>



</td>







            <td>&nbsp;</td>



            <td align="right" class="questtitle">



            </td>



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


if($accela=="edit" && isset($idusuario)){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from accesocl where idusuario = '$idusuario'");

$usuario=mysqli_result($result,0,"usuario");

$contrasena=mysqli_result($result,0,"contrasena");

$nombre=mysqli_result($result,0,"nombre");

$email=mysqli_result($result,0,"email");

$contrato1=mysqli_result($result,0,"contrato1");

$contrato2=mysqli_result($result,0,"contrato2");

$contrato3=mysqli_result($result,0,"contrato3");

$contrato4=mysqli_result($result,0,"contrato4");

$contrato5=mysqli_result($result,0,"contrato5");

$permicl=mysqli_result($result,0,"permisos");

$explota_permicl=explode(",",$permicl);

$activo=mysqli_result($result,0,"activo");

}



echo'<form name="frm" method="post" action="process.php?module=accesocl&accela='.$accela.'&idusuario='.$idusuario.'" onSubmit="return validar(this)">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      
      <tr>
        
        <td align="right" bgcolor="#cccccc"><strong>Usuario:</strong></td>
        
        <td bgcolor="#cccccc"><input name="usuario" type="text" id="usuario" size="50" value="<?php echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
        
        </tr>
      
      <tr>
        
        <td align="right" bgcolor="#cccccc"><strong>Contrase&ntilde;a:</strong></td>
        
        <td bgcolor="#cccccc"><input name="contrasena" type="password" id="contrasena" size="50" value="<?php echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<?php echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Email:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="email" type="text" id="email" size="50" value="<?php echo"$email";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 1:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato1" type="text" id="email" size="50" value="<?php echo"$contrato1";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 2:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato2" type="text" id="email" size="50" value="<?php echo"$contrato2";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 3:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato3" type="text" id="email" size="50" value="<?php echo"$contrato3";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 4:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato4" type="text" id="email" size="50" value="<?php echo"$contrato4";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 5:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato5" type="text" id="email" size="50" value="<?php echo"$contrato5";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td align="right" valign="top" bgcolor="#cccccc"><strong>Usuario Activo:</strong> </td>
        
        <td bgcolor="#cccccc"><select name="activo" id="activo">
          
          <option value="1" <?php if($activo=="1"){echo' selected';} ?>>Si</option>
          
          <option value="0" <?php if($activo=="0"){echo' selected';} ?>>No</option>
          
          </select>        </td>
        
        </tr>
        <tr>
        <td align="right" valign="top" bgcolor="#cccccc"><strong>Permisos:</strong></td>
        <td bgcolor="#cccccc">
		<!-- 
		<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_caso" <?php $checa_arrayxa2=array_search("informacion_caso",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>  <strong>Informaci&oacute;n del caso</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="detalles_servicio" <?php $checa_arrayxa2=array_search("detalles_servicio",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>  <strong>Detalles del servicio</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_vehiculo" <?php $checa_arrayxa2=array_search("informacion_vehiculo",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>  
              <strong>Informaci&oacute;n del veh&iacute;culo</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_poliza" <?php $checa_arrayxa2=array_search("informacion_poliza",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>  
              <strong>Informaci&oacute;n de la p&oacute;liza</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_legal" <?php $checa_arrayxa2=array_search("informacion_legal",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>  <strong>Informaci&oacute;n legal del caso</strong></td>
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
                  <td><span class="style1">Informaci&oacute;n General</span> </td>
                  <td align="right"><b><a href="javascript:SetAllCheckBoxesd('frm', 'permicl[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesd('frm', 'permicl[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table></td>
            </tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="status" <?php $checa_arrayxa2=array_search("status",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Status</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="asignadoprov" <?php $checa_arrayxa2=array_search("asignadoprov",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Asignado a Proveedor</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="horasignado" <?php $checa_arrayxa2=array_search("horasignado",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Hora de Asignaci&oacute;n</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="horarribo" <?php $checa_arrayxa2=array_search("horarribo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Hora de Arribo</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="horacontacto" <?php $checa_arrayxa2=array_search("horacontacto",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Hora de Contacto (r)</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tiempoarribo" <?php $checa_arrayxa2=array_search("tiempoarribo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Tiempo de Arribo</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tiempocontacto" <?php $checa_arrayxa2=array_search("tiempocontacto",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Tiempo de Contacto</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="costointerno" <?php $checa_arrayxa2=array_search("costointerno",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Costo Interno</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ultimostatus" <?php $checa_arrayxa2=array_search("ultimostatus",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Hora de &uacute;ltimo status</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="horacontactoext" <?php $checa_arrayxa2=array_search("horacontactoext",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Hora de Contacto (ext)</strong></td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="permicl[]" type="checkbox" id="permicl[]" value="horaterminoext" <?php $checa_arrayxa2=array_search("horaterminoext",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> 
			    Hora de T&eacute;rmino (ext)
</strong> </td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="permicl[]" type="checkbox" id="permicl[]" value="horarecepcion" <?php $checa_arrayxa2=array_search("horarecepcion",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> 
			    Hora de Recepción
</strong> 
			    </td>
			</tr>
		</table>
		<br />
		<table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>
            <td colspan="4" bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><span class="style1">Informaci&oacute;n del caso</span></td>
                <td align="right"><b><a href="javascript:SetAllCheckBoxesa('frm', 'permicl[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesa('frm', 'permicl[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
              </tr>
            </table>              </td>
            </tr>
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="fecha_recepcion" <?php $checa_arrayxa2=array_search("fecha_recepcion",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha de recepci&oacute;n </strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="hora_apertura" <?php $checa_arrayxa2=array_search("hora_apertura",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Hora de apertura de expediente</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="num_contrato" <?php $checa_arrayxa2=array_search("num_contrato",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de contrato</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="reporta" <?php $checa_arrayxa2=array_search("reporta",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre de quien Reporta</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tel_reporta" <?php $checa_arrayxa2=array_search("tel_reporta",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tel. de Contacto</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="fecha_suceso" <?php $checa_arrayxa2=array_search("fecha_suceso",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha del suceso </strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="convenio" <?php $checa_arrayxa2=array_search("convenio",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong> N&uacute;mero de convenio</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="expediente" <?php $checa_arrayxa2=array_search("expediente",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de Expediente</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="num_cliente" <?php $checa_arrayxa2=array_search("num_cliente",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre del cliente</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="num_siniestro" <?php $checa_arrayxa2=array_search("num_siniestro",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>N&uacute;mero de siniestro</strong> </td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="inciso" <?php $checa_arrayxa2=array_search("inciso",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Inciso</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="usuario" <?php $checa_arrayxa2=array_search("usuario",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Nombre del Usuario</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="reporte_cliente" <?php $checa_arrayxa2=array_search("reporte_cliente",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
No. de Control</strong></td>
            <td bgcolor="#eeeeee"><strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="ejecutivo" <?php $checa_arrayxa2=array_search("ejecutivo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
Ejecutivo</strong></td>
            <td bgcolor="#eeeeee">
				<strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="fax" <?php $checa_arrayxa2=array_search("fax",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
Fax</strong>
			</td>
            <td bgcolor="#eeeeee">
				<strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="email" <?php $checa_arrayxa2=array_search("email",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
E-Mail</strong>
			</td>
          </tr>
		  <tr>
		  	<td bgcolor="#eeeeee">
				<strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="cobertura" <?php $checa_arrayxa2=array_search("cobertura",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
Cobertura</strong>
			</td>
			<td bgcolor="#eeeeee"><strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="cliente" <?php $checa_arrayxa2=array_search("cliente",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> 
              Cliente
</strong></td>
			<td bgcolor="#eeeeee"><strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="contrato" <?php $checa_arrayxa2=array_search("contrato",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> 
              Contrato
</strong></td>
			<td bgcolor="#eeeeee"><strong>
              <input name="permicl[]" type="checkbox" id="permicl[]" value="serviciosolicitado" <?php $checa_arrayxa2=array_search("serviciosolicitado",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> 
              Servicio solicitado
</strong></td>
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
                  <td align="right"><b><a href="javascript:SetAllCheckBoxes('frm', 'permicl[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxes('frm', 'permicl[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table>
              </td>
          </tr>
          <tr>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tecnico_solicitado" <?php $checa_arrayxa2=array_search("tecnico_solicitado",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>T&eacute;cnico Solicitado</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="motivo_servicio" <?php $checa_arrayxa2=array_search("motivo_servicio",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Motivo del servicio</strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ubicacion_requiere" <?php $checa_arrayxa2=array_search("ubicacion_requiere",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n y referencias donde se requiere el servicio </strong></td>
            <td width="25%" bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tipo_asistencia_vial" <?php $checa_arrayxa2=array_search("tipo_asistencia_vial",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de asistencia vial</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="tipo_asistencia_medica" <?php $checa_arrayxa2=array_search("tipo_asistencia_medica",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de asistencia m&eacute;dica</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="domicilio_cliente" <?php $checa_arrayxa2=array_search("domicilio_cliente",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Domicilio del cliente</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="domicilio_sustituto" <?php $checa_arrayxa2=array_search("domicilio_sustituto",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Domicilio donde recoger&aacute; auto sustituto</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ubicacion_estado" <?php $checa_arrayxa2=array_search("ubicacion_estado",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n estado</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ubicacion_municipio" <?php $checa_arrayxa2=array_search("ubicacion_municipio",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n municipio</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ubicacion_colonia" <?php $checa_arrayxa2=array_search("ubicacion_colonia",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n colonia</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="ubicacion_ciudad" <?php $checa_arrayxa2=array_search("ubicacion_ciudad",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ubicaci&oacute;n ciudad</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_servicio" <?php $checa_arrayxa2=array_search("destino_servicio",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino servicio</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_estado" <?php $checa_arrayxa2=array_search("destino_estado",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino estado</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_municipio" <?php $checa_arrayxa2=array_search("destino_municipio",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino municipio</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_colonia" <?php $checa_arrayxa2=array_search("destino_colonia",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino Colonia</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_ciudad" <?php $checa_arrayxa2=array_search("destino_ciudad",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Destino Ciudad</strong></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="formato_carta" <?php $checa_arrayxa2=array_search("formato_carta",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Formato de carta de auto sustituto </strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="instructivo" <?php $checa_arrayxa2=array_search("instructivo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Ventana con Instructivo para usuario auto sustituto </strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="observaciones" <?php $checa_arrayxa2=array_search("observaciones",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
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
                  <td align="right"><b><a href="javascript:SetAllCheckBoxesb('frm', 'permicl[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesb('frm', 'permicl[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table></td>
            </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="auto_marca" <?php $checa_arrayxa2=array_search("auto_marca",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Marca del auto</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="auto_tipo" <?php $checa_arrayxa2=array_search("auto_tipo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Tipo de auto</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="auto_modelo" <?php $checa_arrayxa2=array_search("auto_modelo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Modelo del auto</strong></td>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="auto_color" <?php $checa_arrayxa2=array_search("auto_color",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/> <strong>Color del auto</strong> </td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="auto_placas" <?php $checa_arrayxa2=array_search("auto_placas",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
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
            	 <td colspan="4" bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><span class="style1">Informaci&oacute;n del vuelo</span> </td>
                  <td align="right"><b><a href="javascript:SetAllCheckBoxesc('frm', 'permicl[]', true);"><font color=white>Seleccionar todos</font></a> <font color=white>|</font> <a href="javascript:SetAllCheckBoxesc('frm', 'permicl[]', false);"><font color=white>Seleccionar ninguno</font></a></b></td>
                </tr>
              </table></td>
            </tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="pasajero" <?php $checa_arrayxa2=array_search("pasajero",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Pasajero</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="fecha_compra" <?php $checa_arrayxa2=array_search("fecha_compra",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>Fecha de Compra</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="codigo_reserva" <?php $checa_arrayxa2=array_search("codigo_reserva",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
              <strong>C&oacute;digo de Reserva</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="vuelo" <?php $checa_arrayxa2=array_search("vuelo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Vuelo</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="fecha_vuelo" <?php $checa_arrayxa2=array_search("fecha_vuelo",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Fecha de Vuelo</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="origen_ciudad" <?php $checa_arrayxa2=array_search("origen_ciudad",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Or&iacute;gen Ciudad</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="destino_ciudad_v" <?php $checa_arrayxa2=array_search("destino_ciudad_v",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Ciudad de Destino</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="fecha_respuesta" <?php $checa_arrayxa2=array_search("fecha_respuesta",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Fecha de Respuesta</strong></td>
			</tr>
			<tr>
				<td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="motivo_servicio_v" <?php $checa_arrayxa2=array_search("motivo_servicio_v",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                  <strong>Motivo del Servicio</strong></td>
			  <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="telefono_v" <?php $checa_arrayxa2=array_search("telefono_v",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
                <strong>Tel. de Contacto</strong></td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="permicl[]" type="checkbox" id="permicl[]" value="fax_v" <?php $checa_arrayxa2=array_search("fax_v",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
Fax</strong> </td>
			  <td bgcolor="#eeeeee"><strong>
			    <input name="permicl[]" type="checkbox" id="permicl[]" value="email_v" <?php $checa_arrayxa2=array_search("email_v",$explota_permicl);
if($checa_arrayxa2===FALSE){} else{echo ' checked';}
 ?>/>
E-Mail</strong> </td>
			</tr>
		</table>
		<br>
		<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Informaci&oacute;n de la p&oacute;liza</span></td>
          </tr>

          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_poliza" <?php $checa_arrayxa2=array_search("informacion_poliza",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>
              <strong>Informaci&oacute;n de la p&oacute;liza</strong></td>
            </tr>
        </table>
		<br />
		<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Informaci&oacute;n legal del caso</span></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="informacion_legal" <?php $checa_arrayxa2=array_search("informacion_legal",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>
              <strong>Informaci&oacute;n legal del caso</strong></td>
          </tr>
        </table>
       <br />
       	<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Exportar</span></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="exportacion" <?php $checa_arrayxa2=array_search("exportacion",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>
              <strong>Exportación</strong></td>
          </tr>
        </table>
               <br />
       	<table width="100%%" border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td bgcolor="#666666"><span class="style1">Usuario Administrativo</span></td>
          </tr>
          <tr>
            <td bgcolor="#eeeeee"><input name="permicl[]" type="checkbox" id="permicl[]" value="administrativo" <?php $checa_arrayxa2=array_search("administrativo",$explota_permicl);if($checa_arrayxa2===FALSE){} else{echo ' checked';} ?>/>
              <strong>Exportar campos administrativos</strong></td>
          </tr>
        </table>
        </td>
      </tr>
      
      </table>
      
    </td>

    </tr>

</table>

<input type="submit" name="Submit" value="Guardar"/> 
&nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" />                      </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>