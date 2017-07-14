<?php 
$checa_arrayx=array_search("cabina",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="servicio";}
isset($_GET['clave']) ? $clave = $_GET['clave'] : $clave = "";
?>
<script language="javascript">
function enableCosto(hx)
{
i=0+hx;

count = document.frm.servicios.length;
    for (i=0; i < count; i++) 	{
    if(document.formaxx.concosto[i].checked)    	
	{document.formaxx.usar[i].disabled = 0;}
    else {document.formaxx.usar[i].disabled = 1;}
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

 function microtime_float()
{
    list($useg, $seg) = explode(" ", microtime());
    return ($useg + $seg);
}
echo microtime_float();
$inicio=microtime_float();
 echo "<!-- $inicio -->";
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT nombre,contrato,fecha_inicio,productos,status,marca,modelo,tipo,color,placas,serie,fecha_inicio,fecha_vencimiento from usuarios_contrato where clave='".$clave."'");
$nombre=mysqli_result($result,0,"nombre");
$contrato=mysqli_result($result,0,"contrato");
$fechainicio=mysqli_result($result,0,"fecha_inicio");
$productos=mysqli_result($result,0,"productos");
$productos_poliza=explode(",",$productos);
#$idcliente=mysqli_result($result,0,"id");
$polstat=mysqli_result($result,0,"status");
$marca=mysqli_result($result,0,"marca");
$modelo=mysqli_result($result,0,"modelo");
$tipo=mysqli_result($result,0,"tipo");
$color=mysqli_result($result,0,"color");
$placas=mysqli_result($result,0,"placas");
$serie=mysqli_result($result,0,"serie");
list($anioi,$mesi,$diai)=explode("-",mysqli_result($result,0,"fecha_inicio"));
$fecha_inicio="$diai/$mesi/$anioi";
list($aniov,$mesv,$diav)=explode("-",mysqli_result($result,0,"fecha_vencimiento"));
$fecha_vencimiento="$diav/$mesv/$aniov";
$fechafinal="$diav-$mesv-$aniov";


$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT idCliente from Poliza where numPoliza ='".$contrato."'");
$idcliente=mysqli_result($result,0,"idCliente");
#echo "- $idcliente - $contrato -";



#echo "- $idcliente -";


 /*
$link = mysqli_connect($host,$username,$pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($db,"SELECT idPoliza,fechaInicio,Poliza.status as polstat,Poliza.productos,Poliza.numPoliza,Cliente.nombre,numPoliza from Poliza left join Cliente on (Cliente.idCliente = Poliza.idCliente) where Poliza.numPoliza='$contrato'", $link); 
if (mysqli_num_rows($result)){ 
while ($row = @mysqli_fetch_array($result)) { 

echo'<table width="100%" border="0" cellpadding=3 cellspacing=3>
  <tr>
    <td width="50%" align="middle" bgcolor="#eeeeee"><b>Cliente:</b> '.$row["nombre"].'</td>
    <td width="50%" align="middle" bgcolor="#eeeeee"><b>Contrato:</b> '.$row["numPoliza"].'</td>
  </tr><form action="process.php?module=cabina&contrato='.$contrato.'&accela=new" method="post" name="form2">';
$fechainicio=$row["fechaInicio"];
*/  

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
$timers = strtotime($fechafinal);
$totimers = time();


$alertas="";
$despliega="";
  
if($tiempoinicial>$tiempolimit){$errortiempo="si";}
else{$errortiempo="no";}

if($timers<$totimers){$errorvigencia="si";}
else{$errorvigencia="no";}

if($tiempoinicial<$monthlimit){$errormes="si";}
else{$errormes="no";}

if($polstat=="validado"){$errorvalidado="no";}
else{$errorvalidado="si";}


if($errortiempo=="si"){
$alertas=''.$alertas.' <script language="Javascript">alert ("El contrato no ha cumplido 24 horas")</script>';

$despliega='<tr>
    <td align=middle bgcolor="#ff0000"><b><font color="#ffffff">El contrato no ha cumplido 24 horas</font></b></td>
    <td align=middle bgcolor="#FFCC00"><b>Servicio con costo </b>  <input name="costo" type="checkbox" value="si" onclick="expandir_formulario()"/></td>
  </tr>';}
  
elseif($errormes=="si"){
if($errorvalidado=="si"){
$alertas=''.$alertas.' <script language="Javascript">alert ("El contrato ha excedido el periodo de gracia sin ser validado")</script>';

$despliega='<tr><td align=middle bgcolor="#ff0000"><b><font color="#ffffff">El contrato ha excedido el periodo de gracia sin ser validado</font></b></td>
    <td align=middle bgcolor="#FFCC00"><b>Servicio con costo </b><input name="costo" type="checkbox" value="si" onclick="expandir_formulario()"/></td>
  </tr>';
  }    
else{
$restform="si";
  }
  }  
  else{
  $gracia="si";
  $restform="si";
}


if($errorvigencia=="si"){
$alertas=''.$alertas.'<script language="Javascript">alert ("USUARIO SIN VIGENCIA")</script>';

$despliega='<tr>
    <td align=middle bgcolor="#ff0000"><b><font color="#ffffff">P�liza Vencida</font></b></td>
    <td align=middle bgcolor="#FFCC00"> NO UTILIZAR SERVICIOS <script language="Javascript">history.go(-1);</script></td>
  </tr>';}



if($gracia=="si"){
$alertas=''.$alertas.' <script language="Javascript">alert ("Cliente en periodo de gracia")</script>';
$despliega='<tr>
    <td bgcolor="#ff0000" colspan=2><center><b><font color="#ffffff">Cliente en periodo de gracia</font></b></center></td>
  </tr>
';}

#}}
  
  
#echo'</table>';

echo $alertas;
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
 </table>
 <?php 
 
echo"<form action='process.php?module=cabina&clave=".$clave."&accela=new' method='post' name='form2'>
<table width='100%' border='0' cellpadding=3 cellspacing=3>
  <tr>
    <td width='50%' align='middle' bgcolor='#eeeeee'>
		<b>Cliente:</b> ".$nombre."<br>
	</td>
    <td width='50%' align='middle' bgcolor='#eeeeee' valign='top'><b>Contrato:</b> ".$contrato."</td></tr>
	<tr>
		<td colspan='2'>
			<b>VEHICULO:</b> $marca $tipo $modelo COLOR $color. <b>PLACAS:</b> $placas <b>SERIE:</b> $serie.
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<b>Vigencia:</b> del $fecha_inicio al $fecha_vencimiento
		</td>
	</tr>";
 echo ''.$despliega.'</table></form>';
 
if($restform=="si"){echo'<div id=capaexpansion style="display:block">';}
else{echo'<div id=capaexpansion style="display:none">';}
echo'<table width="100%" border="0" cellpadding=0 cellspacing=0>
<tr><td width=50% align="middle" bgcolor="#cccccc"><b>Alta de servicio</b></td><td width=50% align="middle" bgcolor="#cccccc"><b>Hist�rico de servicios</b></td></tr>
<tr><td width=50% valign=top><table width="100%" border="0" cellpadding=3 cellspacing=3>';
foreach($productos_poliza as $losprod){
$link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbp);
$resultp = mysqli_query($link,"SELECT producto,servicios,numeventos from productos where id = '$losprod'");
$producto=mysqli_result($resultp,0,"producto");
$servicios=mysqli_result($resultp,0,"servicios");
$incidencias=mysqli_result($resultp,0,"numeventos");
echo'<tr><td bgcolor="#bbbbbb"><b>'.$producto.'</b></td><td bgcolor="#bbbbbb" width=150 align=middle><b>Eventos disponibles</b></td><td bgcolor="#bbbbbb" width=150 align=middle><b>Usar servicio</b></td></tr>';

$servicios_poliza=explode(",",$servicios);
$incidencias_poliza=explode(",",$incidencias);
$in=0;
foreach($servicios_poliza as $losserv){
 $link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbs);
$results = mysqli_query($link,"SELECT id,servicio from servicios where id = '$losserv'");
$servicio=mysqli_result($results,0,"servicio");
$service=mysqli_result($results,0,"id");

##startcomprobacion
$link = mysqli_connect($host,$username,$pass,$database);
$result=mysqli_query($link,"select COUNT(id) as cantidad from general where contrato = '$clave' AND servicio='$service' AND status!='cancelado al momento'");
$cuantosson=mysqli_result($result,0,"cantidad");
mysqli_free_result($result);
##endcomprobacion
$disponibles=$incidencias_poliza[$in]-$cuantosson;
if($disponibles<1){
$disponibles=0;
$distro='<input name="usar" id="usar" type="submit" value="Usar servicio Con Costo">'; $erroreventos="si";}
else{$distro='<input name="usar" type="submit" value="Usar servicio">'; $erroreventos="no";}

echo'<tr><td bgcolor="#dddddd"><b>'.$servicio.'</b></td><td bgcolor="#dddddd" align=middle><b>'.$disponibles.'</b></td><form action="mainframe.php?module=cabina_c&clave='.$clave.'&servicio='.$service.'&idcliente='.$idcliente.'" method="post" name="formaxx" id="formaxx"><td bgcolor="#dddddd" align=middle>'; 
if($errortiempo=="si" or ($errormes=="si" && $errorvalidado=="si") or $erroreventos=="si"){echo'<input name="cobrarservicio" type="hidden" value="si" />';}
echo''.$distro.'</td></form></tr>';
$in=$in+1;
}}


echo'</table></td><td width=50% valign=top>

<table width="100%" border="0" cellpadding=3 cellspacing=3>
<tr><td bgcolor="#bbbbbb" align=middle><b>N�mero de expediente</b></td><td bgcolor="#bbbbbb"  align=middle><b>Servicio utilizado</b></td><td bgcolor="#bbbbbb"  align=middle><b>Detalle</b></td></tr>';

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
#$result = mysqli_query($db,"SELECT  general.id, general.expediente, servicios.servicio from general left join servicios on (general.servicio = servicios.id) where contrato = '$clave' AND status!='cancelado al momento'"); 
$result = mysqli_query($link,"SELECT  g.id, g.expediente, s.servicio from general g,servicios s WHERE g.servicio = s.id AND contrato = '$clave' AND status!='cancelado al momento' ORDER BY id DESC LIMIT 5"); 

if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<tr> 
<td bgcolor="#bbbbbb" align=middle>'.$row["expediente"].'</td>
<td bgcolor="#bbbbbb" align=middle>'.$row["servicio"].'</td>
<td bgcolor="#bbbbbb" align=middle><a href="javascript:popUp(\'detallecaso.php?id='.$row["id"].'\')">Detalle</a></td>
</tr>';
}}


echo'</table>

</td></tr></table></div>';

 ?>