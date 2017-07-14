<?php  

if(empty($_SESSION["valid_user"])){echo'Acceso no autorizado a este modulo'; die();} else {}
if(empty($show)){$show=1000;}
if(empty($sort)){$sort="hora DESC";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Historial de Tareas</span></td><td width=150 class="blacklinks">[ <a href="recordatorios.php" class="fancybox-new fancybox.iframe">Nueva Tarea</a> ]</td></tr></table></td></tr>
 <tr> 
     
         <td>
      </td>
  </tr>
<tr><td>
<?php  
$condicion="";
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT COUNT(*) FROM recordatorios $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT * FROM recordatorios $condicion order by $sort  
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=recordatorioslista&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
	                  <td class="titles">Recordatorio</td>	
                      <td class="titles">Expediente</td>	
					   <td class="titles">Hora</td>	
					   <td class="titles">Usuario</td>
					   <td class="titles">Atendido</td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
  $usuario=$row["empleado"];
  $link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
  $resultar = mysqli_query($link,"SELECT usuario FROM Empleado where idEmpleado=$usuario"); 
$usuario=mysql_result($resultar,0,"usuario");
  
	$class = ($i++%2==0)? "even" : "odd";
  echo'                <tr class="'.$class.'"> 
<td>'.$row["recordatorio"].'</td>
<td><div class="centerb">'; if(!empty($row["general"])) { echo '<a href="mainframe.php?module=detail_seguimiento&id='.$row["general"].'">'.$row["general"].'</a>'; } else {} echo'</div></td>
<td><div class="centerb">'.$row["hora"].'</div></td>
<td><div class="centerb">'.$usuario.'</div></td>
<td><div align="center">'; if ($row["visto"]==1) {  echo 'SI'; } if ($row["visto"]==0) { echo 'NO'; } echo'</div></td></tr>';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=quicktips&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td>
 </tr>
        </table>
</td></tr></table>