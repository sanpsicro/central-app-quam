<?php $checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=50;}
if(empty($sort)){$sort="p.expediente DESC";}
if(empty($selenium)){$selenium="all";}


isset($_POST['accela']) ? $accela  = $_POST['accela'] : $accela = "" ;
isset($_POST['quest']) ? $quest= $_POST['quest'] : $quest= "" ;
isset($_POST['sort']) ? $sort= $_POST['sort'] : $sort= "" ;
isset($_POST['show']) ? $show= $_POST['show'] : $show= "" ;
isset($_POST['selenium']) ? $selenium= $_POST['selenium'] : $selenium= "" ;



?><br />
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr>       <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Control de pagos</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
<tr> 
     <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>

<form class="filtro" method="post" action="mainframe.php?module=control_pagos">
<td width="700">
	<select name="show" id="mostrar">
		<option value="10" <?php if($show=="10"){echo"selected";}?>>10 por p&aacutegina</option>
		<option value="20"  <?php if($show=="20"){echo"selected";}?>>20 por p&aacutegina</option>
		<option value="30"  <?php if($show=="30"){echo"selected";}?>>30 por p&aacutegina</option>
		<option value="50"  <?php if($show=="50"){echo"selected";}?>>50 por p&aacutegina</option>
		<option value="100"  <?php if($show=="100"){echo"selected";}?>>100 por p&aacutegina</option>
		<option value="200"  <?php if($show=="200"){echo"selected";}?>>200 por p&aacutegina</option>
	</select>
	<select name="sort" id="ordenar">
		<option value="pr.nombre" <?php if($sort=="pr.nombre"){echo"selected";}?>>Ordenar por Proveedor</option>
		<option value="p.expediente DESC" <?php if($sort=="p.expediente DESC"){echo"selected";}?>>Ordenar por Expediente</option>
		<option value="p.status DESC" <?php if($sort=="p.status DESC"){echo"selected";}?>>Ordenar por status</option>                
	</select>
	<select name="selenium" id="selenium">
		<option value="all" <?php if($selenium=="all"){echo' selected ';}?>>Todos</option>
		<option value="pagados" <?php if($selenium=="pagados"){echo' selected ';}?>>Pagados</option>
		<option value="no pagados" <?php if($selenium=="no pagados"){echo' selected ';}?>>No Pagados</option>
	</select>
	<input type="submit" name="Submit2" value="Mostrar"></td><td align="right" class="questtitle">
</form>
<form class="filtro" method="post" action="bridge.php?module=control_pagos">
B&uacutesqueda: 
	<input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> 
	<input type="submit" name="Submit" value="Buscar">
 </td></form>
          </tr>
        </table>
    </td>
  </tr>


<tr><td>
<?php if(isset($code) && $code=="1"){echo'<br><div class="xplik">Nuevo pago Registrado</div>';}
if(isset($code) && $code=="2"){echo'<br><div class="xplik">Datos del Pago actualizados</div>';}
if(isset($code) && $code=="3"){echo'<div class="xplik">Pago eliminado</div>';}


if(isset($quest) && $quest!=""){
echo'<div class="xplik">Resultados de la b&uacutesqueda:</div>';
$condicion="WHERE pr.nombre like '%$quest%' OR p.expediente like '%$quest%'";
}
else{
if($selenium=="all"){$condicion="";}
if($selenium=="pagados"){$condicion="WHERE p.status='1'";}
if($selenium=="no pagados"){$condicion="WHERE p.status='0'";}
}
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT p.expediente from pagos p 
							LEFT JOIN Provedor pr 
								ON (p.proveedor=pr.id) $condicion 
							GROUP BY expediente"); 
$total = mysqli_num_rows($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$query="SELECT p.expediente, s.servicio, pr.nombre, SUM(p.monto) as monto, p.status, BIT_AND( p.status ) as todos_pagados , BIT_OR( p.status ) as alguno_pagado 
						FROM pagos p 
							LEFT JOIN Provedor pr
								ON (p.proveedor = pr.id)
							LEFT JOIN general g
								ON (g.id = p.expediente)
							LEFT JOIN servicios s
								ON (s.id = g.servicio)
							$condicion 
							GROUP BY p.expediente
							ORDER BY $sort 
							LIMIT $reg1, $tampag";
							$result = mysqli_query($link,$query) or die (mysqli_error($link)."Consulta $query"); 

#
  echo paginacion($pag, $total, $tampag, "mainframe.php?module=control_pagos&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">
                    <tr> 
                     <td align=middle class="titles">Expediente</td>				  	                     
					 <td align=middle class="titles">Servicio</td>
                     <td align=middle class="titles">Proveedor</td>
                     <td align=middle class="titles">Monto Total</td>					 
                     <td align=middle class="titles">Status</td>
                     <td align=middle class="titles">Detalles</td>
					 </tr>';

$bgcolor="#cccccc";
  while ($row = mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}
if($row['todos_pagados']== '1')
	$status = "Pagado";
else if($row['alguno_pagado'] == '1')
	$status = "Pagado Parcial";
else
	$status = "No Pagado";
	

  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a class="expediente" href="mainframe.php?module=detail_seguimiento&id='.$row["expediente"].'" target="_blank">'.$row["expediente"].'</a></td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto"],2).'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$status.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=control_pago&expediente='.$row["expediente"].'">Detalles</a></td>
</tr> 
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}

echo paginacion($pag, $total, $tampag, "mainframe.php?module=control_pagos&quest=$quest&sort=$sort&show=$show&pag=");
?>
<!-- <?php echo print_r($_SESSION);?> -->
</td></tr></table>