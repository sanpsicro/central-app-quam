<?php  
include 'conf.php';
$show=$_POST['show'];
$sort=$_POST['sort'];

$code=$_POST['code'];
isset($_GET['quest']) ? $quest=$_GET['quest'] : $quest="" ;
isset($_GET['display']) ? $display=$_GET['display'] : $display="" ;
isset($_GET['moko']) ? $moko=$_GET['moko'] : $moko="" ;



if(empty($show )){$show =50;}
if(empty($sort)){$sort="general.fecha_recepcion";}
if(empty($display)){$display="abierto";}
if(empty($moko)){$moko="all";}

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
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr>       <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Seguimiento</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
     <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="mainframe.php?module=seguimiento">
            <td width="700"> 
              <select name="show" id="mostrar">
                <option value="10" <?php   if($show =="10"){echo"selected";}?>>10 por p�gina</option>
                <option value="20"  <?php   if($show =="20"){echo"selected";}?>>20 por p�gina</option>
                <option value="30"  <?php   if($show =="30"){echo"selected";}?>>30 por p�gina</option>
                <option value="50"  <?php   if($show =="50"){echo"selected";}?>>50 por p�gina</option>
                <option value="100"  <?php   if($show =="100"){echo"selected";}?>>100 por p�gina</option>
                <option value="200"  <?php   if($show =="200"){echo"selected";}?>>200 por p�gina</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="general.fecha_recepcion"  <?php   if($sort=="general.fecha_recepcion"){echo"selected";}?>>Ordenar por fecha</option>
                <option value="general.expediente" <?php   if($sort=="general.expediente"){echo"selected";}?>>Ordenar por expediente</option>				
                <option value="general.status" <?php   if($sort=="general.status"){echo"selected";}?>>Ordenar por status</option>				
                <option value="Provedor.nombre" <?php   if($sort=="Provedor.nombre"){echo"selected";}?>>Ordenar por proveedor</option>				                
                <option value="general.contrato" <?php   if($sort=="general.contrato"){echo"selected";}?>>Ordenar por contrato</option>				                
                <option value="general.usuario" <?php   if($sort=="general.usuario"){echo"selected";}?>>Ordenar por Usuario</option>				                                
              </select>
              <select name="display" id="display">
                <option value="all" <?php   if($display=="all"){echo' selected ';} ?>>Todos</option>
                <option value="abierto" <?php   if($display=="abierto"){echo' selected ';} ?>>Abierto</option>
                <option value="en tramite" <?php   if($display=="en tramite"){echo' selected ';} ?>>En tramite</option>                
                <option value="abierto_tramite" <?php   if($display=="abierto_tramite"){echo' selected ';} ?>>Abierto o en tramite</option>                                
<!--                <option value="finalizado" <?php   if($display=="finalizado"){echo' selected ';} ?>>Finalizado</option> -->
                <option value="concluido" <?php   if($display=="concluido"){echo' selected ';} ?>>Conclu�do</option>                
                <option value="cancelado" <?php   if($display=="cancelado"){echo' selected ';} ?>>Cancelados</option>
              </select>
              
                            <select name="moko" id="moko">
                <option value="all" <?php   if($moko=="all"){echo' selected ';} ?>>Todos</option>
                <option value="conductor_detenido" <?php   if($moko=="conductor_detenido"){echo' selected ';} ?>>Conductor detenido</option>
                <option value="vehiculo_detenido" <?php   if($moko=="vehiculo_detenido"){echo' selected ';} ?>>Vehiculo detenido</option>
                <option value="fkrucm" <?php   if($moko=="fkrucm"){echo' selected ';} ?>>Servicios sin seguimiento en 1:30 horas</option>                
                <option value="fkrucmsh" <?php   if($moko=="fkrucmsh"){echo' selected ';} ?>>Servicios con un tiempo mayor a 45 minutos de contacto</option>                                
              </select>

              
          <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <form name="form1" method="post" action="bridge.php?module=seguimiento"><td align="right" class="questtitle">B�squeda: 
              <input name="quest" type="text" id="quest" size="15"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
    </td>
  </tr>
<tr><td>
<?php  
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo suceso registrado en bit�cora</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos de bit�cora actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Bit�cora eliminada</div></b><p>';}

if($display=="all"){$precondicion="Where general.id != '0'";}
if($display=="abierto"){$precondicion="Where general.status='abierto'";}
if($display=="en tramite"){$precondicion="Where general.status='en tramite'";}
if($display=="abierto_tramite"){$precondicion="Where (general.status='abierto' or general.status='en tramite')";}
if($display=="finalizado"){$precondicion="Where general.status='finalizado'";}
if($display=="concluido"){$precondicion="Where general.status='concluido'";}
if($display=="cancelado"){$precondicion="Where general.status like'%cancelado%'";}

if(isset($quest) && $quest!=""){
$precondicion="";
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$condicion="Where general.contrato like '%".$quest."%' 
			OR general.expediente like '%".$quest."%' 
			OR Provedor.nombre like '%".$quest."%' 
			OR Cliente.nombre like '%".$quest."%' 
			OR general.auto_placas like '%".$quest."%' 
			OR usuarios_contrato.nombre like '%".$quest."%'
			OR general.reporte_cliente like '%".$quest."%'
			OR general.fecha_recepcion like '%".$quest."%'
			OR general.usuario like '%".$quest."%'
			OR general.ubicacion_municipio like '%".$quest."%'
			OR general.destino_municipio like '%".$quest."%'";
}
else{$condicion="";}

if($moko=="all"){$postq="";}
if($moko=="conductor_detenido"){$postq="AND seguimiento_juridico.situacion_juridica='detenido'";}
if($moko=="vehiculo_detenido"){$postq="AND seguimiento_juridico.situacion_vehiculo='detenido'";}
if($moko=="fkrucmsh"){$postq="AND general.contacto!='0000-00-00 00:00:00' AND general.apertura_expediente!='0000-00-00 00:00:00' AND (TimeDiff(general.contacto,general.apertura_expediente)) > '00:45:00'";}

$link = mysqli_connect($host, $username, $pass, $database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;

if($moko!="fkrucm"){
$prego1="SELECT COUNT(*) FROM general left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join usuarios_contrato on (general.contrato = usuarios_contrato.clave) left join Provedor on (general.proveedor = Provedor.id) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) " . $precondicion ." " . $condicion ." ". $postq;}



if($moko=="fkrucm"){
$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");
$timelimit=date("Y-m-d H:i:s", mktime($hora-1,$minuto-30,$segundo,$mes,$dia,$ano));
#$prego1="SELECT COUNT(*) FROM general left join bitacora on (general.id = bitacora.general) left join notas_legal on (general.id =  notas_legal.general)  where (general.status='abierto' or general.status='en tramite') AND (notas_legal.fecha<='$timelimit' or bitacora.fecha<='$timelimit')";}
$prego1 = "SELECT COUNT(*) FROM general where general.status='abierto'  AND general.ultimoseguimiento<='" . $timelimit ."'";}

if($moko=="msgnew"){
$prego1 = "SELECT COUNT(*) FROM clientacora where tipo=2 and visto=0";}

if($moko=="chat"){
$prego1 = "SELECT COUNT(*) FROM chatstat where atendido=0 and status=2";}

$result = mysqli_query($link ,$prego1); 

list($total) = mysqli_fetch_row($result);
$tampag = $show ;
$reg1 = ($pag-1) * $tampag;

if($moko!="fkrucm"){$prego2="SELECT general.id, general.ubicacion_municipio , general.destino_municipio , TIMEDIFF(general.contacto,general.apertura_expediente) AS tiempoContacto , general.reporte_cliente, general.contrato, general.fecha_recepcion, general.expediente, general.usuario, general.status, servicios.servicio, servicios.tipo as tipoServicio, Cliente.nombre as cliente, usuarios_contrato.nombre as usuariox, Provedor.nombre as proveedor FROM general left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join usuarios_contrato on (general.contrato = usuarios_contrato.clave) left join Provedor on (general.proveedor = Provedor.id) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) " . $precondicion ." ".  $condicion ." ".  $postq ." order by " . $sort . " desc LIMIT " . $reg1 ." , " .$tampag;}

if($moko=="fkrucm"){
$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");
$timelimit=date("Y-m-d H:i:s", mktime($hora-1,$minuto-30,$segundo,$mes,$dia,$ano));
$prego2="SELECT general.id, general.ubicacion_municipio , general.destino_municipio , TIMEDIFF(general.contacto,general.apertura_expediente) AS tiempoContacto , general.reporte_cliente, general.contrato, general.fecha_recepcion, general.expediente, general.usuario, general.status, servicios.servicio, servicios.tipo as tipoServicio, Cliente.nombre as cliente, usuarios_contrato.nombre as usuariox, Provedor.nombre as proveedor FROM general left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join usuarios_contrato on (general.contrato = usuarios_contrato.clave) left join Provedor on (general.proveedor = Provedor.id) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) where general.status='abierto' AND general.ultimoseguimiento<='".$timelimit."' order by ". $sort. " desc LIMIT " .$reg1. " , " . $tampag;
}

if($moko=="msgnew"){$prego2="SELECT DISTINCT general.id, general.ubicacion_municipio , general.destino_municipio , TIMEDIFF(general.contacto,general.apertura_expediente) AS tiempoContacto , general.reporte_cliente, general.contrato, general.fecha_recepcion, general.expediente, general.usuario, general.status, servicios.servicio, servicios.tipo as tipoServicio, Cliente.nombre as cliente, usuarios_contrato.nombre as usuariox, Provedor.nombre as proveedor FROM general left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join usuarios_contrato on (general.contrato = usuarios_contrato.clave) left join Provedor on (general.proveedor = Provedor.id) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) left join clientacora on (general.id = clientacora.general) where general.id=clientacora.general and clientacora.visto=0 and clientacora.tipo=2 order by general.ultimoseguimiento  
  LIMIT ". $reg1 ."," . $tampag;}
//echo $prego2;

if($moko=="chat"){$prego2="SELECT DISTINCT general.id, general.ubicacion_municipio , general.destino_municipio , TIMEDIFF(general.contacto,general.apertura_expediente) AS tiempoContacto , general.reporte_cliente, general.contrato, general.fecha_recepcion, general.expediente, general.usuario, general.status, servicios.servicio, servicios.tipo as tipoServicio, Cliente.nombre as cliente, usuarios_contrato.nombre as usuariox, Provedor.nombre as proveedor FROM general left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join usuarios_contrato on (general.contrato = usuarios_contrato.clave) left join Provedor on (general.proveedor = Provedor.id) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) left join chatstat on (general.id = chatstat.gr) where general.id=chatstat.gr and chatstat.atendido=0 and chatstat.status=2 order by general.ultimoseguimiento  
  LIMIT ". $reg1 . " , " . $tampag;}
//echo $prego2;


$result = mysqli_query($link,$prego2) or die (mysql_error()); 


  
  

  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p�gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
for($isabel=1; $isabel<=$total_paginas; $isabel++)
{ 
if($pag==$isabel){    $texto .= "<option selected value=\" ". $enlace . $isabel . " \">".$isabel."</option> ";} else {
    $texto .= "<option"  .$thisis . " value=\" " .$enlace . $isabel . " \">".$isabel."</option> ";}
} 	
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$texto .= "</select></td><td width=5>&nbsp;</td><td width=30><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";
  return $texto;
}
#
  echo paginar($pag, $total, $tampag, "mainframe.php?module=seguimiento&quest=" .$quest ."&sort=".$sort ."&show=".$show."&display=".$display."&moko=".$moko."&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
                      <td align=middle class="titles">Servicio</td>
                      <td align=middle class="titles">Expediente</td>	
					  <td align=middle class="titles">Reporte Cliente</td>					  
                      <td align=middle class="titles">Fecha recepci�n</td>					  
                      <td align=middle class="titles">Tiempo de Contacto</td>
                      <td class="titles">Cliente</td>				  
                      <td class="titles">Usuario</td>					  
                      <td class="titles">Proveedor</td>					  					  
                      <td class="titles">Ubicacion Municipio</td>
                      <td class="titles">Destino Municipio</td>					  					  
                      <td width="150" class="titles">Operaci�n</td></tr>';
$bgcolor="#0b7eb7";
  while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}

$fexa=$row["fecha_recepcion"];
$fexa=explode(" ",$fexa);
$fexad=explode("-",$fexa[0]);

$resultMunicipio = mysqli_query( $link,"SELECT NombreMunicipio from Municipio where idMunicipio = '".$row[ubicacion_municipio]."'"); 
$ubicacionMunicipio=mysqli_result($resultMunicipio,0,"NombreMunicipio");

$resultMunicipio = mysqli_query($link,"SELECT NombreMunicipio from Municipio where idMunicipio = '".$row[destino_municipio]."'"); 
$destinoMunicipio=mysqli_result($resultMunicipio,0,"NombreMunicipio");

$generalid=$row["id"];
$nuevosmensajes = mysqli_query($link,"SELECT COUNT(*) FROM clientacora where visto=0 and tipo=2 and general=".$generalid);
list($sumale) = mysqli_fetch_row($nuevosmensajes);

  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["expediente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["reporte_cliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fexad[2].'/'.$fexad[1].'/'.$fexad[0].' '.$fexa[1].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tiempoContacto"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["proveedor"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$ubicacionMunicipio.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$destinoMunicipio.'</td>
';

echo'<td bgcolor="'.$bgcolor.'" class="dataclass"><center>';
if($sumale>=1) {echo '<img src="mensaje.gif">';} else {echo '<img src="msgoff.gif">';}
echo' | <a href="?module=detail_seguimiento&id='.$row["id"].'">Detalle</a> |';
echo' <a href="?module=bitacora&id='.$row["id"].'">Bit�cora</a>';

// $querylegal="SELECT tipo FROM servicios WHERE id='$row[servicio]'";
// #echo $querylegal;
// $resultlegal=mysqli_query($querylegal,$link)or die (mysql_error());
// $tipoServicio=mysqli_result($resultlegal,0,"tipo");
if($row['tipoServicio']=="legal")
{
	 $checa_array1=array_search("23_d",$explota_permisos);
	 if($checa_array1===FALSE){}else{
		echo ' | <a href="?module=seguimiento_caso&id='.$row["id"].'">Seguimiento</a> | <a href="?module=conclusion_caso&id='.$row["id"].'">Conclusi�n</a>';
	}
}
#echo' <a href="?module=cabina_b&id='.$row["id"].'&accela=edita">Editar</a> ';
echo'</center></td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
   echo paginar($pag, $total, $tampag, "mainframe.php?module=seguimiento&quest=".$quest."&sort=".$sort."&show=".$show."&display=".$display."&moko=".$moko."&pag=");
?>
</td></tr></table>