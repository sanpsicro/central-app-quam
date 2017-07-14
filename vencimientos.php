<?php  
	
	

$checa_arrayx=array_search("vencimientos",$explota_modulos);
if($checa_arrayx===FALSE)
	die("Acceso no autorizado a este modulo");
	
	extract($_GET);
	extract($_POST);
	//print_r($_POST);	
	
if(empty($show))
	$show=10;
if(empty($sort))
	$sort="fecha_vencimiento";
//echo "Dato: $tipoCont";	
if(!isset($tipoCont) || $tipoCont == '')
	$tipoCont=1;
	
?>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
		<td height="44" align="left">
			<table width=100% cellpadding=0 cellspacing=0>
				<tr>
					<td>
						<span class="maintitle">Vencimientos</span>
					</td>					
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="POST" action="bridge.php?module=vencimientos<?php  if($quest!=""){echo"&quest=$quest";}?>">
            <td width="600"> 
              <select name="show" id="mostrar">
                <option value="10" <?php  if($show=="10"){echo"selected";}?>>10 por p�gina</option>
                <option value="20"  <?php  if($show=="20"){echo"selected";}?>>20 por p�gina</option>
                <option value="30"  <?php  if($show=="30"){echo"selected";}?>>30 por p�gina</option>
                <option value="50"  <?php  if($show=="50"){echo"selected";}?>>50 por p�gina</option>
                <option value="100"  <?php  if($show=="100"){echo"selected";}?>>100 por p�gina</option>
                <option value="200"  <?php  if($show=="200"){echo"selected";}?>>200 por p�gina</option>
              </select>              
			  <select name="tipoCont" id="tipoCont">
			  	<option value="1" <?php  if($tipoCont==1){echo"selected";}?>>Vencidos</option>
				<option value="2" <?php  if($tipoCont==2){echo"selected";}?>>Por vencer</option>
				<option value="3" <?php  if($tipoCont==3){echo"selected";}?>>Todos</option>
			  </select>			  	 	 	
			  <select name="sort" id="ordenar">
                <option value="fecha_inicio"  <?php  if($sort=="fecha_inicio"){echo"selected";}?>>Ordenar po Fecha de Inicio</option>
                <option value="fecha_vencimiento" <?php  if($sort=="fecha_vencimiento"){echo"selected";}?>>Ordenar por Fecha de Vencimiento</option>
                <option value="contrato" <?php  if($sort=="contrato"){echo"selected";}?>>Ordenar por Contrato</option>
				<option value="nombre" <?php  if($sort=="nombre"){echo"selected";}?>>Ordenar por Nombre</option>
				<option value="status" <?php  if($sort=="status"){echo"selected";}?>>Ordenar por Status</option>
              </select>
			  <input type="submit" name="Submit2" value="Mostrar">
			  </td>			  
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=vencimientos"><td align="right" class="questtitle">B�squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" > <input type="submit" name="Submit" value="Buscar">
            </td>
			</form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php  

echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$condicion=" WHERE 1";

if(isset($quest) && $quest != '')
	$condicion.=" AND (contrato like '%$quest%' OR marca like '%$quest%' OR modelo like '%$quest%' OR tipo like '%$quest%' OR color like '%$quest%' OR placas like '%$quest%' OR serie like '%$quest%' OR servicio like '%$quest%' OR nombre like '%$quest%' OR domicilio like '%$quest%' OR ciudad like '%$quest%' OR clave like '%$quest%' OR status like '%$quest%')";

if(isset($tipoCont) && $tipoCont != '')
{
	if($tipoCont == 1)
		$condicion.=" AND fecha_vencimiento <= NOW()";
	else if($tipoCont == 2)	
		$condicion.=" AND fecha_vencimiento > NOW()";
}	
$link = mysqli_connect($host, $username, $pass,$database);
//mysql_select_db($database, $link); 

if (!isset($pag))
	$pag = 1;
	
	$result = mysqli_query($link,"SELECT COUNT(*) FROM usuarios_contrato $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$sql="SELECT
      contrato,
	  inciso,
	  clave,
	  nombre,
	  fecha_inicio,
	  fecha_vencimiento,
	  status
	  FROM
	  `usuarios_contrato`
	  $condicion
	  ORDER BY $sort
	  LIMIT $reg1, $tampag";
	  $result = mysqli_query($link,$sql); 
//echo "DATO:[$sql]";
if(!$result)
	die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<b>".mysql_error());
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
$_GET["tipoCont"]=$tipoCont;
//echo $_GET["tipoCont"];
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=vencimientos&quest=$quest&sort=$sort&show=$show&tipoCont=$tipoCont&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3" class="mainTable">
                    <tr> 
                      <td align=middle class="titles">Contrato</td>
                      <td align=middle class="titles">inciso</td>					  
                      <td align=middle class="titles">Clave del usuario</td>					  				  
                      <td align=middle class="titles">Nombre</td>
                      <td align=middle class="titles">Fecha de Inicio</td>					  
                      <td align=middle class="titles">Fecha de Vencimiento</td>					  
                      <td align=middle class="titles">Status</td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 

  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_inicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fecha_vencimiento"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"];
echo'</td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=vencimientos&quest=$quest&sort=$sort&show=$show&tipoCont=$tipoCont&pag=");
?>
</td></tr></table>
