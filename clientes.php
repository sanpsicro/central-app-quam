<?php 
$checa_arrayx=array_search("clientes",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="nombre";}
isset($_GET['quest']) ? $quest = $_GET['quest'] : $quest =null ;
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">clientes</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("3_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_clientes&accela=new">Nuevo Cliente</a> ]'; } ?></td></tr></table></td></tr>
 <tr> 
     <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=clientes" <?php  if($quest!=""){echo"&quest=". $quest ;} ?> >
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <?php  if($show=="10"){echo"selected";}?>>10 por p&aacutegina</option>
                <option value="20"  <?php  if($show=="20"){echo"selected";}?>>20 por p&aacutegina</option>
                <option value="30"  <?php  if($show=="30"){echo"selected";}?>>30 por p&aacutegina</option>
                <option value="50"  <?php  if($show=="50"){echo"selected";}?>>50 por p&aacutegina</option>
                <option value="100"  <?php  if($show=="100"){echo"selected";}?>>100 por p&aacutegina</option>
                <option value="200"  <?php  if($show=="200"){echo"selected";}?>>200 por p&aacutegina</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="nombre"  <?php  if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>
<!--                 <option value="status" <?php  if($sort=="status"){echo"selected";}?>>Ordenar por status</option>				-->
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=clientes"><td align="right" class="questtitle">B&uacutesqueda: 
              <input name="quest" type="text" id="quest2" size="15"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php 
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Cliente Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Cliente actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Cliente eliminado</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: La clave de cliente ya existe</div></b><p>';}
if($valid_tipo=="vendedor"){$subcondicion1=" AND idEmpleado='$valid_userid'"; 
$subcondicion2="Where idEmpleado='$valid_userid'";}
else{$subcondicion1=""; 
$subcondicion2="";}
if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';
$condicion="where (nombre like '%".$quest."%' OR rfc like '%".$quest."%' OR estado like '%".$quest."%' OR municipio like '%".$quest."%' OR email like '%".$quest."%' OR usuario like '%".$quest."%') " . $subcondicion1;
}
else{$condicion=$subcondicion2;}
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT COUNT(*) FROM Cliente $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT * FROM Cliente $condicion order by $sort  
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=clientes&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
	echo'<table width="100%" border="0" cellspacing="3" cellpadding="3" class="mainTable">
	                    <tr> 
	                      <td align=middle class="titles">Nombre</th>
	                      <td align=middle class="titles">Tel$eacutefono Casa</th>
	                      <td align=middle class="titles">Tel&eacutefono Celular</th>					  
	                      <td align=middle class="titles">Tel&eacutefono Oficina</th>				  
	                      <td align=middle class="titles">Email</th>					  
	<!--                  <td align=middle class="titles">Status</th>		-->
	                      <td align=middle class="titles">Operaci�n</th></tr>';
	$bgcolor="#cccccc";
	while ($row = @mysqli_fetch_array($result)) { 
	if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}
  echo'                <tr> 
								<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
								<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>
								<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>
								<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoOficina"].'</td>
								<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="mailto:'.$row["email"].'">'.$row["email"].'</a></td>';
							echo'<!-- <td>';
								if($row["status"]=="validado"){echo''.$row["status"].'';}
								else{
									$checa_array1=array_search("3_v",$explota_permisos);
									if($checa_array1===FALSE){echo''.$row["status"].'';} else{echo'<a href="javascript:confirmUpdate(\'process.php?module=clientes&accela=update&idCliente='.$row["idCliente"].'\',\'del cliente '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Validar</a>';}
								}
							echo'</td> -->';
							echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><center>';
								$checa_array1=array_search("3_d",$explota_permisos);
								if($checa_array1===FALSE){} else{echo' <a href="?module=detail_clientes&idCliente='.$row["idCliente"].'">Detalle</a> ';}
								$checa_array1=array_search("3_c",$explota_permisos);
								if($checa_array1===FALSE){} else{echo' <a href="?module=admin_clientes&accela=edit&idCliente='.$row["idCliente"].'">Editar</a> ';}
								$checa_array1=array_search("3_b",$explota_permisos);
								if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=clientes&accela=delete&idCliente='.$row["idCliente"].'\',\'al cliente '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}
								echo'</center></td>
							</tr>';
	}  
	echo'</table>';
}
else{echo'<center><b>No hay resultados</b></center>';}
echo paginar($pag, $total, $tampag, "mainframe.php?module=clientes&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>