<?php
include 'conf.php';
$checa_arrayx=array_search("cabina",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="servicio";}

$clave_usuario = $_GET["clave_usuario"] ;
$nombre= $_GET["nombre"]  ;
$placas= $_GET["placas"]  ;
$serie= $_GET["serie"]  ;
?>

<script type='text/javascript' src='formexp.js'></script>
<script>
function expandir_formulario(){
 if (document.form2.costo.checked){
	xDisplay('capaexpansion', 'block')
 }else{
	xDisplay('capaexpansion', 'none')
 }
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><span class="maintitle">Cabina</span></td></tr>
	   <tr> <td  align="right">&nbsp;</td></tr>

 <tr>
   <td align="left"><form id="form1" name="form1" method="post" action="bridge.php?module=cabina">
     <table width="100%%" border="0">
       <tr>
         <td align="center" bgcolor="#CCCCCC"><strong>Nombre</strong> 
           <input name="nombre" type="text" id="nombre" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
         <td align="center" bgcolor="#CCCCCC"><strong>Clave de usuario</strong> 
           <input name="clave_usuario" type="text" id="clave_usuario" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
         <td align="center" bgcolor="#CCCCCC"><strong>C&oacutedigo Identificador</strong> 
           <input name="placas" type="text" id="placas" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
		 <td align="center" bgcolor="#CCCCCC"><strong>Serie</strong> 
           <input name="serie" type="text" id="serie" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td> 
         <td align="center" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Buscar" /></td>
       </tr>
     </table>
      </form>
   </td>
 </tr>
 
 <?php
 
 if(isset($nombre) && $nombre!=""){
 
  echo'<tr><td>';
echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>
Usuarios:<p>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from usuarios_contrato where nombre like '%$nombre%' AND productos!='' order by nombre"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nombre</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Clave usuario</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. Contrato</b></td>
 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Capturar</b></td>					  
					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina_b&clave='.$row["clave"].'">Capturar</a></td>
</tr>';
 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';
 
 
 ########################
  echo'<tr><td>Clientes:<p>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT Poliza.numPoliza, Cliente.nombre from Poliza left join Cliente on (Poliza.idCliente = Cliente.idCliente) where Cliente.nombre like '%$nombre%' order by nombre"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nombre</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. Contrato</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Ver</b></td>					  
					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numPoliza"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina&clave_usuario='.$row["numPoliza"].'">Ver usuarios de este contrato</a></td>
</tr>';

 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';
 
 
 
 }
 
 ##################################################
  elseif(isset($clave_usuario) && $clave_usuario!=""){
    echo'<tr><td>';
	echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';
  $scanclave=explode("_",$clave_usuario);
  $num_segmentos=count($scanclave);
  if($num_segmentos=="2"){
  echo'<b>Usuarios registrados para el contrato '.$clave_usuario.'</b><p>';
  $condicion="where contrato='$clave_usuario'";
  }
  elseif($num_segmentos=="3"){
   $condicion="where clave='$clave_usuario'";
  }
  else{$condicion="where clave='dinosaurio'";}
  
 

$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from usuarios_contrato ". $condicion ." order by inciso"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nombre</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Clave usuario</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. Contrato</b></td>
 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Capturar</b></td>					  
					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina_b&clave='.$row["clave"].'">Capturar</a></td>
</tr>';
 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';
 
 }

 #################################################
elseif(isset($placas) && $placas!=""){
echo'<tr><td>';
echo'<br><b><div class="xplik">Resultados de la buacutessqueda:</div></b><p>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from usuarios_contrato where placas like '%$placas%' order by placas"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Placas</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nombre</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Clave usuario</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. contrato</b></td>					  
 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Capturar</b></td>					  
					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["placas"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina_b&clave='.$row["clave"].'">Capturar</a></td>
</tr>';
 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';
} 
############################################

elseif(isset($serie) && $serie!=""){
 echo'<tr><td>';
echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query( $link,"SELECT * from usuarios_contrato where serie like '%".$serie."%' order by serie"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Serie</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nombre</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Clave usuario</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. contrato</b></td>					  
 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Capturar</b></td>					  
					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["serie"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina_b&clave='.$row["clave"].'">Capturar</a></td>
</tr>';
 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';
} 
############################################
if(isset($contrato) && $contrato!=""){

echo'<tr><td colspan=2 bgcolor="#CCCCCC">';

###############
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT idPoliza,fechaInicio,Poliza.status as polstat,Poliza.productos,Poliza.numPoliza,Cliente.nombre,numPoliza from Poliza left join Cliente on (Cliente.idCliente = Poliza.idCliente) where Poliza.numPoliza='$contrato'"); 
#$result = mysqli_query("SELECT idPoliza,fechaInicio,status,numPoliza,Cliente.nombre from Poliza left join Cliente on (Cliente.idCliente = Poliza.idCliente) where numPoliza = '$contrato'", $link); 
if (mysqli_num_rows($result)){ 
while ($row = @mysqli_fetch_array($result)) { 

echo'<table width="100%" border="0" cellpadding=3 cellspacing=3>
  <tr>
    <td width="50%" align="middle" bgcolor="#eeeeee"><b>Cliente:</b> '.$row["nombre"].'</td>
    <td width="50%" align="middle" bgcolor="#eeeeee"><b>Contrato:</b> '.$row["numPoliza"].'</td>
  </tr><form action="process.php?module=cabina&contrato='.$contrato.'&accela=new" method="post" name="form2">';
  
$fechainicio=$row["fechaInicio"];
$fex=explode(" ",$fechainicio);
$fexfex=explode("-",$fex[0]);
$fexhox=explode(":",$fex[1]);

$starthora=date(H);
$startmin=date(i);
$startseg=date(s);
$startmes=date(m);
$startdia=date(d);
$startano=date(Y);

$tiempoinicial=mktime($fexhox[0], $fexhox[1], $fexhox[2], $fexfex[1], $fexfex[2], $fexfex[0]);
$tiempolimit=mktime($starthora - 24, $startmin, $startseg, $startmes, $startdia, $startano);
$monthlimit=mktime($starthora, $startmin, $startseg, $startmes, $startdia - 30, $startano);
  
if($tiempoinicial>$tiempolimit){$errortiempo="si";}
else{$errortiempo="no";}

if($tiempoinicial<$monthlimit){$errormes="si";}
else{$errormes="no";}


if($row["polstat"]=="validado"){$errorvalidado="no";}
else{$errorvalidado="si";}


if($errortiempo=="si"){echo'<tr>
    <td><b>El contrato no ha cumplido 24 horas</b></td>
    <td><b>Servicio con costo:</b>  <input name="costo" type="checkbox" value="si" onclick="expandir_formulario()"/></td>
  </tr>';}
  
elseif($errormes=="si"){
if($errorvalidado=="si"){echo'<tr>
    <td><b>El contrato ha excedido el periodo de gracia sin ser validado</b></td>
    <td><b>Servicio con costo:</b>  <input name="costo" type="checkbox" value="si" onclick="expandir_formulario()"/></td>
  </tr>';}    
else{
$restform="si";
  }
  }  
  
  
  else{
  $gracia="si";
  $restform="si";
}


if($gracia=="si"){echo'<tr>
    <td bgcolor="#eeeeee" colspan=2><center><b>Cliente en periodo de gracia</b></center></td>
  </tr>
';}
  
echo'</table>';
/*
if($restform=="si"){echo'<div id=capaexpansion style="display:block">';}
else{echo'<div id=capaexpansion style="display:none">';}

echo' 
<table width="100%" border="0" cellpadding=3 cellspacing=3>';

$productos_poliza=explode(",",$row["productos"]);

foreach($productos_poliza as $losprod){
$dbp = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbp);
$resultp = mysqli_query("SELECT * from productos where id = '$losprod'",$dbp);
$producto=mysql_result($resultp,0,"producto");
$servicios=mysql_result($resultp,0,"servicios");
echo'<tr><td colspan=4 bgcolor="#bbbbbb"><b>'.$producto.'</b></td></tr>';

$servicios_poliza=explode(",",$servicios);
foreach($servicios_poliza as $losserv){
$dbs = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbs);
$results = mysqli_query("SELECT * from servicios where id = '$losserv'",$dbs);
$servicio=mysql_result($results,0,"servicio");
$campos=mysql_result($results,0,"campos");
echo'<tr><td colspan=4 bgcolor="#dddddd"><b>'.$servicio.'</b></td></tr>';

$muestracampos=explode(",",$campos);
$cuentatabs=0;
foreach($muestracampos as $campo){
if($cuentatabs==0){echo'<tr>';}
####################################################
if($campo=="fecha_recepcion"){echo'<td bgcolor="#dddddd" align=right>Fecha de recepci�n</td><td bgcolor="#dddddd"><input name="fecha_recepcion" type="text" value="dd-mm-aaaa hh:mm:ss" size="30" /></td>';}

if($campo=="fecha_suceso"){echo'<td bgcolor="#dddddd" align=right>Fecha del suceso</td><td bgcolor="#dddddd"><input name="fecha_suceso" type="text" value="dd-mm-aaaa hh:mm:ss" size="30" /></td>';}

if($campo=="contacto"){echo'<td bgcolor="#dddddd" align=right>Contacto</td><td bgcolor="#dddddd"><input name="contacto" type="text" value="" size="30" /></td>';}

if($campo=="reporta"){echo'<td bgcolor="#dddddd" align=right>Nombre de quien reporta</td><td bgcolor="#dddddd"><input name="reporta" type="text" value="" size="30" /></td>';}

if($campo=="tel_reporta"){echo'<td bgcolor="#dddddd" align=right>Tel�fono de quien reporta</td><td bgcolor="#dddddd"><input name="tel_reporta" type="text" value="" size="30" /></td>';}

if($campo=="num_contrato"){echo'<td bgcolor="#dddddd" align=right>N�mero de contrato</td><td bgcolor="#dddddd"><input name="num_contrato" type="text" value="" size="30" /></td>';}

if($campo=="convenio"){echo'<td bgcolor="#dddddd" align=right>Convenio</td><td bgcolor="#dddddd"><input name="convenio" type="text" value="" size="30" /></td>';}

if($campo=="expediente"){echo'<td bgcolor="#dddddd" align=right>Expediente</td><td bgcolor="#dddddd"><input name="expediente" type="text" value="" size="30" /></td>';}

if($campo=="num_cliente"){echo'<td bgcolor="#dddddd" align=right>N�mero del cliente</td><td bgcolor="#dddddd"><input name="num_cliente" type="text" value="" size="30" /></td>';}

if($campo=="num_siniestro"){echo'<td bgcolor="#dddddd" align=right>N�mero de siniestro del cliente</td><td bgcolor="#dddddd"><input name="num_siniestro" type="text" value="" size="30" /></td>';}


if($campo=="poliza"){echo'<td bgcolor="#dddddd" align=right>N�mero de Contrato</td><td bgcolor="#dddddd"><input name="poliza" type="text" value="" size="30" /></td>';}


if($campo=="inciso"){echo'<td bgcolor="#dddddd" align=right>Inciso</td><td bgcolor="#dddddd"><input name="inciso" type="text" value="" size="30" /></td>';}


if($campo=="ajustador"){echo'<td bgcolor="#dddddd" align=right>Nombre del ajustador</td><td bgcolor="#dddddd"><input name="ajustador" type="text" value="" size="30" /></td>';}

if($campo=="usuario"){echo'<td bgcolor="#dddddd" align=right>Nombre del usuario</td><td bgcolor="#dddddd"><input name="usuario" type="text" value="" size="30" /></td>';}

if($campo=="tecnico_solicitado"){echo'<td bgcolor="#dddddd" align=right>T�cnico solicitado</td><td bgcolor="#dddddd"><input name="tecnico_solicitado" type="text" value="" size="30" /></td>';}

####################################################
if($cuentatabs==2){echo'</tr>';}
$cuentatabs=$cuentatabs+1;
if($cuentatabs==2){$cuentatabs=0;}
}


}

}

    
echo'</form></table>
*/
echo'<input name="idcliente" type="hidden" value="'.$row["nombre"].'" /><input name="contrato" type="hidden" value="'.$contrato.'" />';
echo'<table width="100%%" border="0" cellpadding="3" cellspacing="3">
  <tr>
    <td bgcolor="#eeeeee"><strong>Nombre de quien reporta</strong></td>
    <td bgcolor="#eeeeee"><input name="nombre_reporta" type="text" id="nombre_reporta" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Tel&eacute;fono de quien reporta: </strong></td>
    <td bgcolor="#eeeeee"><input name="tel_reporta" type="text" id="tel_reporta" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>N&uacute;mero de contrato</strong> </td>
    <td bgcolor="#eeeeee"><input name="contrato" type="text" id="contrato" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Convenio</strong></td>
    <td bgcolor="#eeeeee"><input name="convenio" type="text" id="convenio" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>N&uacute;mero expediente</strong> </td>
    <td bgcolor="#eeeeee"><input name="expediente" type="text" id="expediente" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>N&uacute;mero del cliente</strong> </td>
    <td bgcolor="#eeeeee"><input name="cliente" type="text" id="cliente" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>N&uacute;mero de siniestro</strong> </td>
    <td bgcolor="#eeeeee"><input name="siniestro" type="text" id="siniestro" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Inciso</strong></td>
    <td bgcolor="#eeeeee"><input name="inciso" type="text" id="inciso" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Ajustador</strong></td>
    <td bgcolor="#eeeeee"><input name="ajustador" type="text" id="ajustador" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Usuario</strong></td>
    <td bgcolor="#eeeeee"><input name="usuario" type="text" id="usuario" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>T&eacute;cnico solicitado</strong> </td>
    <td bgcolor="#eeeeee"><input name="tecnico_solicitado" type="text" id="tecnico_solicitado" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Motivo del servicio</strong> </td>
    <td bgcolor="#eeeeee"><input name="motivo_servicio" type="text" id="motivo_servicio" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Marca del auto</strong> </td>
    <td bgcolor="#eeeeee"><input name="marca_auto" type="text" id="marca_auto" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Tipo de auto</strong> </td>
    <td bgcolor="#eeeeee"><input name="tipo_auto" type="text" id="tipo_auto" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Modelo del auto</strong> </td>
    <td bgcolor="#eeeeee"><input name="modelo_auto" type="text" id="modelo_auto" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Color del auto </strong></td>
    <td bgcolor="#eeeeee"><input name="color_auto" type="text" id="color_auto" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Placas del auto</strong> </td>
    <td bgcolor="#eeeeee"><input name="placas_auto" type="text" id="placas_auto" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Tipo de asistencia vial</strong> </td>
    <td bgcolor="#eeeeee"><select name="tipo_vial" id="tipo_vial">
      <option value="Traslado para evitar alcoholimetro">Traslado para evitar alcoholimetro</option>
      <option value="Siniestro">Siniestro</option>
      <option value="Asistencia">Asistencia</option>
      <option value="Cambio de llanta">Cambio de llanta</option>
      <option value="llaves en el interior del veh&iacute;culo">llaves en el interior del veh&iacute;culo</option>
      <option value="Env&iacute;o de gasolina">Env&iacute;o de gasolina</option>
      <option value="Problemas administrativos">Problemas administrativos</option>
    </select>    </td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Tipo de asistencia m&eacute;dica </strong></td>
    <td bgcolor="#eeeeee"><select name="tipo_medica" id="tipo_medica">
      <option value="Consulta telef&oacute;nica">Consulta telef&oacute;nica</option>
      <option value="Consulta a domicilio">Consulta a domicilio</option>
      <option value="Ambulancia">Ambulancia</option>
            </select></td>
    <td bgcolor="#eeeeee"><strong>Domicilio del cliente</strong> </td>
    <td bgcolor="#eeeeee"><input name="domicilio_cliente" type="text" id="domicilio_cliente" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Domicilio donde recoger&aacute; auto sustituto </strong></td>
    <td bgcolor="#eeeeee"><input name="domicilio_sustituto" type="text" id="domicilio_sustituto" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Ubicaci&oacute;n donde se requiere el servicio</strong> </td>
    <td bgcolor="#eeeeee"><input name="ubicacion" type="text" id="ubicacion" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Referencias</strong></td>
    <td bgcolor="#eeeeee"><input name="ubicacion_referencias" type="text" id="ubicacion_referencias" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Ubicacion Estado</strong></td>
    <td bgcolor="#eeeeee"><input name="ubicacion_estado" type="text" id="ubicacion_estado" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Ubicacion Municipio</strong></td>
    <td bgcolor="#eeeeee"><input name="ubicacion_municipio" type="text" id="ubicacion_municipio" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Ubicacion Ciudad</strong></td>
    <td bgcolor="#eeeeee"><input name="ubicacion_ciudad" type="text" id="ubicacion_ciudad" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Destino</strong></td>
    <td bgcolor="#eeeeee"><input name="destino" type="text" id="destino" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Destino Estado</strong> </td>
    <td bgcolor="#eeeeee"><input name="destino_estado" type="text" id="destino_estado" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Destino Municipio</strong> </td>
    <td bgcolor="#eeeeee"><input name="destino_municipio" type="text" id="destino_municipio" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Destino Ciudad </strong></td>
    <td bgcolor="#eeeeee"><input name="destino_ciudad" type="text" id="destino_ciudad" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Formato carta de auto sustituto</strong> </td>
    <td bgcolor="#eeeeee"><input name="formato_carta" type="text" id="formato_carta" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Ventana con instructivo</strong> </td>
    <td bgcolor="#eeeeee"><input name="ventana_instructivo" type="text" id="ventana_instructivo" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Proveedor</strong></td>
    <td bgcolor="#eeeeee"><input name="proveedor" type="text" id="proveedor" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Proveedor Estado</strong> </td>
    <td bgcolor="#eeeeee"><input name="proveedor_estado" type="text" id="proveedor_estado" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Proveedor Localidad</strong> </td>
    <td bgcolor="#eeeeee"><input name="proveedor_localidad" type="text" id="proveedor_localidad" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Costo</strong></td>
    <td bgcolor="#eeeeee"><input name="costo" type="text" id="costo" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Observaciones</strong></td>
    <td bgcolor="#eeeeee"><input name="observaciones" type="text" id="observaciones" size="30" /></td>
    <td bgcolor="#eeeeee"><strong>Seguimiento</strong></td>
    <td bgcolor="#eeeeee"><input name="seguimiento" type="text" id="seguimiento" size="30" /></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee">&nbsp;</td>
    <td align="right" bgcolor="#eeeeee"><input type="submit" name="Submit2" value="Enviar" /></td>
    <td bgcolor="#eeeeee"><input type="reset" name="Submit3" value="Reestablecer" /></td>
    <td bgcolor="#eeeeee">&nbsp;</td>
  </tr>
</table>';

#echo'</div>';


 }
 }
###############


echo'</td></tr>';
}
 ?>
</table>
<?php
if($seguimiento=="on"){

$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from general order by fecha_recepcion"); 
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Cliente</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. Contrato</b></td>
     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Fecha de recepci�n</b></td>					  
     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>T�cnico solicitado</b></td>					  	 
     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Motivo</b></td>					  	 	 
     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td>					  	 	 	 
     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Bit�cora</b></td>					  	 	 	 

					  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
 echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["idCliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["num_contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_recepcion"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tecnico_solicitado"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["motivo_servicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href=""><a href="javascript:confirmUpdate(\'process.php?module=cabina&accela=update&id='.$row["id"].'\',\'hh\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">'.$row["status"].'</a></a></td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=cabina_bitacora&id='.$row["id"].'">Bit�cora</a></td>
</tr>';
 }
 echo'</table>';
 } else{echo'<center><br><br><b>No se encontraron resultados</b><br><br></center>';}
  echo'</td></tr>';


}
?>