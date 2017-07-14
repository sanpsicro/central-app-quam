<?php 
error_reporting(E_ALL);
$checa_arrayx=array_search("servicios",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

isset($_GET['sort']) ? $sort= $_GET['sort'] : $sort= null;
isset($_GET['show']) ? $show= $_GET['show'] : $show= null;





if(empty($show)){$show=10;}

if(empty($sort)){$sort="servicio";}

isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null;
isset($_GET['quest']) ? $quest = $_GET['quest'] : $quest = null;


?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Servicios</span></td><td width=150 class="blacklinks"><?php  $checa_array1=array_search("2_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_servicios&accela=new">Nuevo Servicio</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            <form name="form1" method="post" action="bridge.php?module=servicios<?php if($quest!=""){echo"&quest=$quest";}?>">



            <td width="400"> 



              <select name="show" id="mostrar">



                <option value="10" <?php if($show=="10"){echo"selected";}?>>10 por p&aacutegina</option>



                <option value="20"  <?php if($show=="20"){echo"selected";}?>>20 por p&aacutegina</option>



                <option value="30"  <?php if($show=="30"){echo"selected";}?>>30 por p&aacutegina</option>



                <option value="50"  <?php if($show=="50"){echo"selected";}?>>50 por p&aacutegina</option>



                <option value="100"  <?php if($show=="100"){echo"selected";}?>>100 por p&aacutegina</option>



                <option value="200"  <?php if($show=="200"){echo"selected";}?>>200 por p&aacutegina</option>



              </select>



              <select name="sort" id="ordenar">



                <option value="servicio"  <?php if($sort=="servicio"){echo"selected";}?>>Ordenar por servicio</option>
                
                                <option value="tipo"  <?php if($sort=="tipo"){echo"selected";}?>>Ordenar por tipo</option>



              </select>



              <input type="submit" name="Submit2" value="Mostrar"> </td>



          </form>



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=servicios"><td align="right" class="questtitle">B&uacutesqueda: 



              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>



<?php 



if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Servicio Registrado</div></b><p>';}



if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Servicio actualizados</div></b><p>';}



if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Servicio eliminado</div></b><p>';}



if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Servicio ya existe</div></b><p>';}





if(isset($quest) && $quest!=""){



echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';



$condicion="where (servicio like '%$quest%')";



}



else{$condicion="";}



$link = mysqli_connect($host, $username, $pass,$database); 

//mysql_select_db($database, $link); 

if (isset($_GET['pag'])){} else{$_GET['pag']=1;}

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;

$result = mysqli_query($link,"SELECT COUNT(*) FROM servicios $condicion"); 



list($total) = mysqli_fetch_row($result);



$tampag = $show;



$reg1 = ($pag-1) * $tampag;



$result = mysqli_query($link,"SELECT * FROM servicios $condicion order by $sort  



  LIMIT $reg1, $tampag"); 










  function paginar($actual, $total, $por_pagina, $enlace) {



  $pag = ($_GET['pag']);   



  $total_paginas = ceil($total/$por_pagina);



  $anterior = $actual - 1;



  $posterior = $actual + 1;



  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p&aacutegina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";







for($isabel=1; $isabel<=$total_paginas; $isabel++)



{ 



if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {



    $texto .= "<option  value=\"$enlace$isabel\">$isabel</option> ";} //se elimino thisis



} 	



$pag = ($_GET['pag']); 



if (!isset($pag)) $pag = 1;



$texto .= "</select></td><td width=5>&nbsp;</td><td width=30><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";





  



  return $texto;



  



}



#



  echo paginar($pag, $total, $tampag, "mainframe.php?module=servicios&quest=$quest&sort=$sort&show=$show&pag=");



#











if (mysqli_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">



                    <tr> 



                      <td align=middle class="titles"><b>Servicio</b></td>
                      <td align=middle class="titles"><b>Tipo</b></td>					  

                      <td align=middle class="titles"><b>Operaci�n</b></td></tr>';

$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass"><center>';



$checa_array1=array_search("2_d",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=detail_servicios&id='.$row["id"].'">Detalle</a> ';}



$checa_array1=array_search("2_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=admin_servicios&accela=edit&id='.$row["id"].'">Editar</a> ';}



$checa_array1=array_search("2_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=servicios&accela=delete&id='.$row["id"].'\',\'al servicio '.$row["servicio"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}









echo'</center></td></tr>

';



  }  



echo'</table>';



  }



else{echo'<center><b>No hay resultados</b></center>';}



  echo paginar($pag, $total, $tampag, "mainframe.php?module=servicios&quest=$quest&sort=$sort&show=$show&pag=");







?>



</td></tr></table>