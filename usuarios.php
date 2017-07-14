<?php 

isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null;
isset($_GET['idEmpleado']) ? $idEmpleado = $_GET['idEmpleado'] : $idEmpleado = null; 
isset($_GET['quest']) ? $quest = $_GET['quest'] : $quest = null;
isset($_GET['show']) ? $show = $_GET['show'] : $show = null;
isset($_GET['sort']) ? $sort = $_GET['sort'] : $sort = null;


$checa_arrayx=array_search("usuarios",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="nombre";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("1_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuarios&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=usuarios<?php  if($quest!=""){echo"&quest=".$quest;}?>">
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <?php  if($show=="10"){echo"selected";}?>>10 por página</option>
                <option value="20"  <?php  if($show=="20"){echo"selected";}?>>20 por página</option>
                <option value="30"  <?php  if($show=="30"){echo"selected";}?>>30 por página</option>
                <option value="50"  <?php  if($show=="50"){echo"selected";}?>>50 por página</option>
                <option value="100"  <?php  if($show=="100"){echo"selected";}?>>100 por página</option>
                <option value="200"  <?php  if($show=="200"){echo"selected";}?>>200 por página</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="nombre"  <?php  if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>
                <option value="usuario" <?php  if($sort=="usuario"){echo"selected";}?>>Ordenar por usuario</option>
                <option value="tipo" <?php  if($sort=="tipo"){echo"selected";}?>>Ordenar por tipo</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=usuarios"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" > <input type="submit" name="Submit" value="Buscar">
            </td></form>
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
echo'<br><b><div class="xplik">Resultados de la búsqueda:</div></b><p>';
$condicion="where (nombre like '%$quest%' OR direccion like '%$quest%' OR estado like '%$quest%' OR municipio like '%$quest%' OR email like '%$quest%' OR usuario like '%$quest%')";
}
else{$condicion="";}
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT COUNT(*) FROM Empleado $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT * FROM Empleado $condicion order by $sort  
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
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la página</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuarios&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3" class="mainTable">
                    <tr> 
                      <td align=middle class="titles">Nombre</th>
                      <td align=middle class="titles">Usuario</th>					  
                      <td align=middle class="titles">Tipo</th>					  				  
                      <td align=middle class="titles">Teléfono casa</th>
                      <td align=middle class="titles">Teléfono celular</th>					  
                     <td align=middle class="titles">Email</th>					  
                      <td align=middle class="titles">Operación</th></tr>';
$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="mailto:'.$row["email"].'">'.$row["email"].'</a></td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>';
$checa_array1=array_search("1_d",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=detail_usuarios&idEmpleado='.$row["idEmpleado"].'">Detalle</a> ';}
$checa_array1=array_search("1_c",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=admin_usuarios&accela=edit&idEmpleado='.$row["idEmpleado"].'">Editar</a> ';}
$checa_array1=array_search("1_b",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=usuarios&accela=delete&idEmpleado='.$row["idEmpleado"].'\',\'al empleado '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}
echo'</td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuarios&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>