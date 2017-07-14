<?php 
$checa_arrayx=array_search("contratos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
$show = $_GET['show'];
$sort = $_GET['sort'];
$status = $_GET['status'];
$quest = $_GET['quest'];
$code = $_GET['code'];
if(empty($show)){$show=10;}
if(empty($sort)){$sort="numPoliza";}
if(empty($status)){$status="activo";}

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
 <script type="text/javascript" language="JavaScript">
function confirmGeneral(generalurl) { 
if (confirm("Est&aacute seguro?")) { 
document.location = generalurl; 
}
}
</script>



<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks"><?php 
$checa_array1=array_search("4_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_contratos&accela=new">Nuevo Contrato</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=contratos<?php if($quest!=""){echo"&quest=$quest";}?>">
            <td width="500"> 
              <select name="show" id="mostrar">
                <option value="10" <?php if($show=="10"){echo"selected";}?>>10 por p&aacutegina</option>
                <option value="20"  <?php if($show=="20"){echo"selected";}?>>20 por p&aacutegina</option>
                <option value="30"  <?php if($show=="30"){echo"selected";}?>>30 por p&aacutegina</option>
                <option value="50"  <?php if($show=="50"){echo"selected";}?>>50 por p&aacutegina</option>
                <option value="100"  <?php if($show=="100"){echo"selected";}?>>100 por p&aacutegina</option>
                <option value="200"  <?php if($show=="200"){echo"selected";}?>>200 por p&aacutegina</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="numPoliza" <?php if($sort=="numPoliza"){echo"selected";}?>>Ordenar por n&uacutemero de contrato</option>
                <option value="fechaCaptura" <?php if($sort=="fechaCaptura"){echo"selected";}?>>Ordenar por fecha de captura</option>                
<!--                 <option value="Poliza.status" <?php if($sort=="Poliza.status"){echo"selected";}?>>Ordenar por status</option>				-->
              </select>
              <select name="status" id="status">
                <option value="activo" <?php if($status=="activo"){echo'selected';}?>>activo</option>
                <option value="cancelado" <?php if($status=="cancelado"){echo'selected';}?>>cancelado</option>
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">B&uacutesqueda: 
              <input name="quest" type="text" id="quest" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php 

if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Contrato Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Contrato actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Contrato eliminado</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Contrato ya existe</div></b><p>';}
if($valid_tipo=="vendedor"){$subcondicion1=" AND Poliza.idEmpleado='$valid_userid'"; 
$subcondicion2="Where Poliza.idEmpleado='$valid_userid'";

if($status=="cancelado"){$condistatus="AND Poliza.status='cancelado'";}
else{$condistatus="AND Poliza.status!='cancelado'";}


}
else{$subcondicion1=""; 
$subcondicion2="";

if($status=="cancelado"){$condistatus="Where Poliza.status='cancelado'";}
else{$condistatus="where Poliza.status!='cancelado'";}

}


if(isset($quest) && $quest!=""){



echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';

$condistatus="";
$subcondicion2="";

$condicion="where (Cliente.nombre like '%$quest%' OR numPoliza like '%$quest%') $subcondicion1";


}



else{$condicion=$subcondicion2;}



$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database, $link); 

if (isset($_GET['pag'])){} else{$_GET['pag']=1;}

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;

$result2x = mysqli_query($link,"SELECT COUNT(*) from Poliza left join 

Cliente on (Cliente.idCliente = Poliza.idCliente) $condicion $condistatus"); 



list($total) = mysqli_fetch_row($result2x);



$tampag = $show;



$reg1 = ($pag-1) * $tampag;



$result = mysqli_query($link,"SELECT idPoliza,Cliente.nombre,numPoliza,fechaCaptura,productos,Poliza.status as polstatus from Poliza left join Cliente on (Cliente.idCliente = Poliza.idCliente) $condicion $condistatus order by $sort LIMIT $reg1, $tampag"); 



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



  echo paginar($pag, $total, $tampag, "mainframe.php?module=contratos&quest=$quest&sort=$sort&show=$show&status=$status&pag=");



#











if (mysqli_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">



                    <tr> 



                      <td align=middle class="titles"><b>Cliente</b></td>

                      <td align=middle class="titles"><b>Num. Contrato</b></td>
                      <td align=middle class="titles"><b>Status</b></td>					  
                     <td align=middle class="titles"><b>Fecha de captura</b></td>				  					  
                     <td align=middle class="titles"><b>Producto</b></td>				  					 

                     <td align=middle class="titles"><b>Operaci&oacuten</b></td></tr>';

$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}


$cvx=$row["fechaCaptura"];
$capdat=explode(" ",$cvx);

$fechaex=explode("-",$capdat[0]);

$producto=$row["productos"];

$dbv = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbv);
$resultv = mysqli_query($dbv,"SELECT * from productos where id =". $producto);
$producto= mysqli_result($resultv,0,'producto');

if($row['polstatus'] == "no validado"){$row['polstatus'] = "activo";}



  echo' <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numPoliza"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["polstatus"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fechaex[2].'/'.$fechaex[1].'/'.$fechaex[0].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$producto.'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass"><center>';



$checa_array1=array_search("4_d",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=detail_contratos&idPoliza='.$row["idPoliza"].'">Detalle</a> ';}



$checa_array1=array_search("4_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=admin_contratos_b&accela=edit&idPoliza='.$row["idPoliza"].'">Editar</a> ';

if($row["polstatus"]!="cancelado"){
echo' <a href="javascript:confirmGeneral(\'process.php?module=contratos&accela=cancela&idPoliza='.$row["idPoliza"].'\',\'del contrato '.$row["numPoliza"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Cancelar Contrato</a> ';
}
}



$checa_array1=array_search("4_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=contratos&accela=delete&idPoliza='.$row["idPoliza"].'\',\'al contrato '.$row["numPoliza"].' y a todos sus vehiculos y beneficiarios asociados\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}





echo'</center></td></tr>

';



  }  



echo'</table>';



  }



else{echo'<center><b>No hay resultados</b></center>';}





  echo paginar($pag, $total, $tampag, "mainframe.php?module=contratos&quest=$quest&sort=$sort&show=$show&status=$status&pag=");







?>


</td></tr></table>

