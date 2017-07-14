<?php  
if(empty($show)){$show=10;}
if(empty($sort)){$sort="nombre";}
include('conf.php'); 
?>

<html>
<head><title>OPCYON</title>
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_del.js" type="text/javascript"></script> 
<script src="confirm_update.js" type="text/javascript"></script> 
<script type="text/javascript" language="JavaScript">
	<!-- 
function jump(fe){
var opt_key = fe.selectedIndex;
var uri_val = fe.options[opt_key].value;
window.open(uri_val,'_top');
return true;
	}
	//-->
	
 </script>

</head>
<body>
<table border=0 width=100% cellpadding=0 cellspacing=0>

 <tr> 

      <td height="44" align="left" background="img/blackbar.gif"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Proveedores</span></td><td width=150 class="blacklinks">[ <a href="admin_proveedores.php?accela=new">Nuevo Proveedor</a> ]</td></tr></table></td></tr>

 <tr> 

      <td height="47" align="left" background="img/bar5.gif"><table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>

            <form name="form1" method="post" action="modulo_proveedores.php<?php  if($quest!=""){echo"?quest=$quest";}?>">

            <td width="400"> 

              <select name="show" id="mostrar">

                <option value="10" <?php  if($show=="10"){echo"selected";}?>>10 por p�gina</option>

                <option value="20"  <?php  if($show=="20"){echo"selected";}?>>20 por p�gina</option>

                <option value="30"  <?php  if($show=="30"){echo"selected";}?>>30 por p�gina</option>

                <option value="50"  <?php  if($show=="50"){echo"selected";}?>>50 por p�gina</option>

                <option value="100"  <?php  if($show=="100"){echo"selected";}?>>100 por p�gina</option>

                <option value="200"  <?php  if($show=="200"){echo"selected";}?>>200 por p�gina</option>

              </select>

              <select name="sort" id="ordenar">

                <option value="nombre"  <?php  if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>

                <option value="direccion" <?php  if($sort=="direccion"){echo"selected";}?>>Ordenar por direccion</option>

                <option value="estado" <?php  if($sort=="estado"){echo"selected";}?>>Ordenar por estado</option>				

              </select>

              <input type="submit" name="Submit2" value="Mostrar"> </td>

          </form>

            <td>&nbsp;</td>

            <form name="form1" method="post" action="modulo_proveedores.php"><td align="right" class="questtitle">B�squeda: 

              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">

            </td></form>

          </tr>

        </table>

      </td>

  </tr>



<tr><td bgcolor="#eeeeee">

<?php  

if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Proveedor Registrado</div></b><p>';}

if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Proveedor actualizados</div></b><p>';}

if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Proveedor eliminado</div></b><p>';}

if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Proveedor ya existe</div></b><p>';}

if(isset($code) && $code=="5"){echo'<br><b><div class="xplik">User permissions updated</div></b><p>';}



if(isset($quest) && $quest!=""){

echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';

$condicion="where (nombre like '%$quest%' OR direccion like '%$quest%' OR estado like '%$quest%' OR municipio like '%$quest%' OR email like '%$quest%')";

}

else{$condicion="";}

$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query("SELECT COUNT(*) FROM Provedor $condicion", $link); 

list($total) = mysqli_fetch_row($result);

$tampag = $show;

$reg1 = ($pag-1) * $tampag;

$result = mysqli_query("SELECT * FROM Provedor $condicion order by $sort  

  LIMIT $reg1, $tampag", $link); 

$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;


  function paginar($actual, $total, $por_pagina, $enlace) {

  $pag = ($_GET['pag']);   

  $total_paginas = ceil($total/$por_pagina);

  $anterior = $actual - 1;

  $posterior = $actual + 1;

  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15 bgcolor=#eeeeee background=\"img/barpaginador.gif\">&nbsp;</td><td width=80 bgcolor=#eeeeee background=\"img/barpaginador.gif\"><font color=#FFFFFF>Ir a la p�gina</font></td><td width=5 background=img/barpaginador.gif>&nbsp;</td><td width=30 bgcolor=#eeeeee background=\"img/barpaginador.gif\"><select name=\"url\" onchange=\"return jump(this);\">";



for($isabel=1; $isabel<=$total_paginas; $isabel++)

{ 

if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {

    $texto .= "<option $thisis value=\"$enlace$isabel\">$isabel</option> ";}

} 	

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;

$texto .= "</select></td><td width=5 background=img/barpaginador.gif>&nbsp;</td><td bgcolor=#eeeeee background=\"img/barpaginador.gif\" width=30><font color=#FFFFFF>de ".$total_paginas."</font></td><td background=img/barpaginador.gif>&nbsp;</td></tr></form></table>";


  

  return $texto;

  

}

#

  echo paginar($pag, $total, $tampag, "modulo_proveedores.php?quest=$quest&sort=$sort&show=$show&pag=");

#





if (mysqli_num_rows($result)){ 

echo'<table width="100%" border="0" cellspacing="0" cellpadding="0" background="img/back_main.gif">

                    <tr> 

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Proveedor</b></td>

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Direcci�n</b></td>

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Tel�fono casa</b></td>

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Tel�fono celular</b></td>					  

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Nextel</b></td>					  

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td background="img/bar4.gif" align=middle class="dataclass"><b>Email</b></td>					  


                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>					  

                      <td background="img/bar4.gif" width=100  align=middle class="dataclass"><b>Operaci�n</b></td></tr>';



  while ($row = @mysqli_fetch_array($result)) { 

  echo'                <tr> 

                      <td class="dataclass" align=middle>'.$row["nombre"].'</td>

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td class="dataclass" align=middle>'.$row["direccion"].'';
					  if($row["estado"]!=""){echo', '.$row["estado"].'';}
 					  if($row["municipio"]!=""){echo', '.$row["municipio"].'';}
					  if($row["cp"]!=""){echo', CP '.$row["cp"].'';}					  
					  
					  echo'</td>
					  
<td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>
<td class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>
<td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>
<td class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>
<td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>
<td class="dataclass" align=middle>'.$row["nextel"].'</td>


                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td class="dataclass" align=middle><a href="mailto:'.$row["email"].'">'.$row["email"].'</a></td>

                      <td width="1" background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                      <td class="dataclass"><center><a href="admin_proveedores.php?accela=edit&idProvedor='.$row["idProvedor"].'">Editar</a> | <a href="javascript:confirmDelete(\'process.php?module=modulo_proveedores&accela=delete&idProvedor='.$row["idProvedor"].'\',\'al proveedor '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a></center></td></tr>

                    <tr> 

                      <td colspan=13  background="img/spacer1.gif"><img src="img/spacer1.gif" width="1" height="1"></td>

                    </tr>';

  }  

echo'</table>';

  }

else{echo'<center><b>No results</b></center>';}

  echo paginar($pag, $total, $tampag, "modulo_proveedores.php?quest=$quest&sort=$sort&show=$show&pag=");



?>

</td></tr></table>
</body>
</html>
