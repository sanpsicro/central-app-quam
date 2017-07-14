<?php
error_reporting(E_ALL);
$checa_arrayx=array_search("ventas",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="numPoliza";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Ventas</span></td><td width=150 class="blacklinks">&nbsp;
	   </td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=ventas<?php  if($quest!=""){echo"&quest=$quest";}?>">
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
                <option value="numPoliza" <?php  if($sort=="numPoliza"){echo"selected";}?>>Ordenar por n&uacutemero de contrato</option>
                <option value="Cliente.nombre" <?php  if($sort=="Cliente.nombre"){echo"selected";}?>>Ordenar por cliente</option>                
                 <option value="Empleado.nombre" <?php  if($sort=="Empleado.nombre"){echo"selected";}?>>Ordenar por vendedor</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=ventas"><td align="right" class="questtitle">B&uacutesqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php  
if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la búsqueda:</div></b><p>';
$condicion="AND (Cliente.nombre like '%$quest%' OR Poliza.numPoliza like '%$quest%' or Empleado.nombre like '%$quest%')";
}
else{$condicion="";}
$previo="where (usuarios_contrato.status='validado' and Cliente.tipocliente!=4) or Cliente.tipocliente=4";
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)){ $pag = 1;}
$result = mysqli_query($link,"SELECT COUNT(*) from Poliza left join Cliente on (Cliente.idCliente = Poliza.idCliente) left join Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) left join usuarios_contrato on (Poliza.numPoliza = usuarios_contrato.contrato) $previo $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT Poliza.idPoliza,Poliza.numPoliza,Cliente.nombre as cliente, Cliente.tipocliente, Empleado.nombre as vendedor, usuarios_contrato.status as elstatus, SUM(usuarios_contrato.monto) as monto, SUM(usuarios_contrato.ingreso) as ingreso FROM Poliza left join  Cliente on (Cliente.idCliente = Poliza.idCliente) left join Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) left join usuarios_contrato on (Poliza.numPoliza = usuarios_contrato.contrato) $previo $condicion GROUP BY usuarios_contrato.contrato order by $sort LIMIT $reg1, $tampag"); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p&aacutegina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=ventas&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
                      <td align=middle class="titles"><b>Cliente</b></td>
                      <td align=middle class="titles"><b>Num. Contrato</b></td>
                     <td align=middle class="titles"><b>Vendedor</b></td>				  					  
                     <td align=middle class="titles"><b>Monto</b></td>				  					 
                     <td align=middle class="titles"><b>Ingreso</b></td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numPoliza"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["vendedor"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$ '.number_format($row['monto'],2).'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$ '.number_format($row['ingreso'],2).'</td>
</tr>
';
}
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=ventas&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>
