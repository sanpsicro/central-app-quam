<?php  
$checa_arrayx=array_search("webservice",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=1000;}
if(empty($sort)){$sort="contrato1";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios Webservice</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("ws_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuariosws&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
     
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php  
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Usuario Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Usuario actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Usuario eliminado</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Usuario ya existe</div></b><p>';}
if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$condicion="where (nombre like '%$quest%' OR direccion like '%$quest%' OR estado like '%$quest%' OR municipio like '%$quest%' OR email like '%$quest%' OR usuario like '%$quest%')";
}
else{$condicion="";}
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT COUNT(*) FROM webservice $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT * FROM webservice $condicion order by $sort  
  LIMIT $reg1, $tampag"); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p�gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
for($isabel=1; $isabel<=$total_paginas; $isabel++)
{ 
if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {
    $texto .= "<option $thisis value=\"$enlace$isabel\">$isabel</option> ";}
} 	
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$texto .= "</select></td><td width=5>&nbsp;</td><td width=30><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";
  
  return $texto;
  
}
#
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuariosws&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3" class="mainTable">
                    <tr> 
	                  <td align=middle class="titles">Usuario</th>	
                      <td align=middle class="titles">Nombre</th>
                      <td align=middle class="titles">Contrato 1</th>					  
                      <td align=middle class="titles">Contrato 2</th>					  				  
                      <td align=middle class="titles">Contrato 3</th>
                      <td align=middle class="titles">Contrato 4</th>					  
                      <td align=middle class="titles">Contrato 5</th>					  
                      <td align=middle class="titles">Operaci�n</th></tr>';
$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato1"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato2"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato3"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato4"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato5"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>';
$checa_array1=array_search("ws_d",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=detail_usuariosws&idusuario='.$row["idusuario"].'">Detalle</a> ';}
$checa_array1=array_search("ws_c",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=admin_usuariosws&accela=edit&idusuario='.$row["idusuario"].'">Editar</a> ';}
$checa_array1=array_search("ws_b",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=usuariosws&accela=delete&idusuario='.$row["idusuario"].'\',\'al usuario '.$row["usuario"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}
echo'</td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuariosws&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>