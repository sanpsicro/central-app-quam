<?php $checa_arrayx=array_search("proveedores",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['show']) ? $show  = $_GET['show'] : $show = null ;
isset($_GET['sort']) ? $sort  = $_GET['sort'] : $sort = null ;
isset($_GET['quest']) ? $quest  = $_GET['quest'] : $quest = null ;
isset($_GET['accela']) ? $accela  = $_GET['accela'] : $accela = null ;

if(empty($show)){$show=10;}
if(empty($sort)){$sort="nombre";}
?>


<script type="text/javascript"> 
//below javascript is used for Disabling right-click on HTML page
document.oncontextmenu=new Function("return false");//Disabling right-click


//below javascript is used for Disabling text selection in web page
document.onselectstart=new Function ("return false"); //Disabling text selection in web page
if (window.sidebar){
document.onmousedown=new Function("return false"); 
document.onclick=new Function("return true") ; 


//Disable Cut into HTML form using Javascript 
document.oncut=new Function("return false"); 


//Disable Copy into HTML form using Javascript 
document.oncopy=new Function("return false"); 


//Disable Paste into HTML form using Javascript  
document.onpaste=new Function("return false"); 
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Proveedores</span></td><td width=150 class="blacklinks">
	  <?php  $checa_array1=array_search("15_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_proveedores&accela=new">Nuevo Proveedor</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            <form name="form1" method="post" action="bridge.php?module=proveedores<?php if($quest!=""){echo"&quest=$quest";}?>">



            <td width="400"> 



              <select name="show" id="mostrar">



                <option value="10" <?php if($show=="10"){echo"selected";}?>>10 por p�gina</option>



                <option value="20"  <?php if($show=="20"){echo"selected";}?>>20 por p�gina</option>



                <option value="30"  <?php if($show=="30"){echo"selected";}?>>30 por p�gina</option>



                <option value="50"  <?php if($show=="50"){echo"selected";}?>>50 por p�gina</option>



                <option value="100"  <?php if($show=="100"){echo"selected";}?>>100 por p�gina</option>



                <option value="200"  <?php if($show=="200"){echo"selected";}?>>200 por p�gina</option>



              </select>



              <select name="sort" id="ordenar">
                <option value="nombre"  <?php if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>
                <option value="status"  <?php if($sort=="status"){echo"selected";}?>>Ordenar por status</option>                
              </select>



              <input type="submit" name="Submit2" value="Mostrar"> </td>



          </form>



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=proveedores"><td align="right" class="questtitle">B&uacutesqueda: 



              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>



<?php

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

$dbl = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbl);
$resultl = mysqli_query($dbl,"SELECT * from Empleado where idEmpleado='$valid_userid'");
$extension=mysqli_result($resultl,0,"extension");


if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Proveedor Registrado</div></b><p>';}



if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Proveedor actualizados</div></b><p>';}



if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Proveedor eliminado</div></b><p>';}



if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Proveedor ya existe</div></b><p>';}





if(isset($quest) && $quest!=""){



echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';



$condicion="where (nombre like '%$quest%' or especialidad like '%$quest%' or estado = '$quest')";



}



else{$condicion="";}



$link = mysqli_connect($host,$username,$pass,$database); 

////mysql_select_db($database, $link); 

if (isset($_GET['pag'])){} else{$_GET['pag']=1;}

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;

$result = mysqli_query($link,"SELECT COUNT(*) FROM Provedor $condicion"); 



list($total) = mysqli_fetch_row($result);



$tampag = $show;



$reg1 = ($pag-1) * $tampag;



$result = mysqli_query($link,"SELECT * FROM Provedor $condicion order by $sort  



  LIMIT $reg1, $tampag"); 








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



  echo paginar($pag, $total, $tampag, "mainframe.php?module=proveedores&quest=$quest&sort=$sort&show=$show&pag=");



#











if (mysqli_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">



                    <tr> 

                      <td align=middle class="titles"><b>Especialidad</b></td>

                      <td align=middle class="titles"><b>Proveedor</b></td>
                      <td align=middle class="titles"><b>Status</b></td>					  		 
					  <td align=middle class="titles"><b>Estado</b></td>
			 		  <td align=middle class="titles"><b>Municipio</b></td>
                      <td align=middle class="titles"><b>Tel�fono</b></td>					  
                      <td align=middle class="titles"><b>Celular</b></td>					  
                      <td align=middle class="titles"><b>Fax</b></td>					  
                      <td align=middle class="titles"><b>Nextel</b></td>					  
                      <td align=middle class="titles"><b>Email</b></td>					  

                      <td bgcolor="#BBBBBB" width=150  align=middle class="dataclass"><b>Operaci�n</b></td></tr>';

$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}


$resultMunicipio = mysqli_query($link,"SELECT NombreMunicipio from Municipio where idMunicipio = '$row[municipio]'"); 
$ubicacionMunicipio=mysqli_result($resultMunicipio,0,"NombreMunicipio");


$resultEstado = mysqli_query($link,"SELECT NombreEstado from Estado where idEstado = '$row[estado]'"); 
$ubicacionEstado=mysqli_result($resultEstado,0,"NombreEstado");

  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["especialidad"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$ubicacionEstado.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$ubicacionMunicipio.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><form method="POST" action="http://192.168.1.200/api/actions/call" target="_blank"> 
'.$row["tel"].'';
 $telctc1 = $row["tel"];
 $telcall1 = preg_replace('/[^0-9]/', '', $telctc1);
echo'
<input type="hidden" name="number" value="9'.$telcall1.'">
<input type="hidden" name="extension" value="'.$extension.'">
<input type="image" src="call.png" alt="Llamar" style="border:0px;" />
</form>
</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cel"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fax"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nextel"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="mailto:'.$row["mail"].'">'.$row["mail"].'</a></td>
<td bgcolor="'.$bgcolor.'" class="dataclass"><center>';



$checa_array1=array_search("15_d",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=detail_proveedores&id='.$row["id"].'">Detalle</a> ';}



$checa_array1=array_search("15_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="?module=admin_proveedores&accela=edit&id='.$row["id"].'">Editar</a> ';}



$checa_array1=array_search("15_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=proveedores&accela=delete&id='.$row["id"].'\',\'al proveedor '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}









echo'</center></td></tr>

';



  }  



echo'</table>';



  }



else{echo'<center><b>No hay resultados</b></center>';}



  echo paginar($pag, $total, $tampag, "mainframe.php?module=proveedores&quest=$quest&sort=$sort&show=$show&pag=");







?>



</td></tr></table>