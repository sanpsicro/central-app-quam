<?php  $checa_arrayx=array_search("4_v",$explota_permisos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}



isset($_GET['quest']) ? $quest = $_GET['quest'] : $quest = "";
isset($_GET['display']) ? $display= $_GET['display'] : $display= "";
isset($_GET['sort']) ? $sort= $_GET['sort'] : $sort= "";

if(empty($show)){$show=10;}
if(empty($display)){$display="no validados";}
if(empty($sort)){$sort="contrato, inciso";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Validaciones</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=validaciones">
            <td width="400"> 
              <select name="display" id="display">
                <option value="todos" <?php  if($display=="todos"){echo"selected";}?>>Todos</option>
                <option value="validados"  <?php  if($display=="validados"){echo"selected";}?>>Validados</option>
                <option value="no validados"  <?php  if($display=="no validados"){echo"selected";}?>>No validados</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="contrato, inciso" <?php  if($sort=="contrato, inciso"){echo"selected";}?>>Ordenar por n�mero de contrato</option>
                <option value="nombre" <?php  if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=validaciones"><td align="right" class="questtitle">B�squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php  
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Validaci�n realizada</div></b><p>';}

if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';
$condicion="where nombre like '%$quest%' OR contrato like '%$quest%' OR clave like '%$quest%'";
}
else{
if($display=="todos"){$condicion="";}
if($display=="validados"){$condicion="Where status='validado'";}
if($display=="no validados"){$condicion="Where status='no validado'";}
}


$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query( $link,"SELECT  * from usuarios_contrato $condicion order by $sort limit 100"); 
if (mysqli_num_rows($result)){ 
echo'<form action="process.php?module=validaciones&idPoliza='.$idPoliza.'&accela=validar" method="post" name="frm">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
                 <tr>
    <td align=middle class="titles"><strong>Contrato</strong></td>
    <td align=middle class="titles"><strong>Inciso</strong></td>
    <td align=middle class="titles"><strong>Clave del usuario</strong></td>
    <td align=middle class="titles"><strong>Nombre</strong></td>
    <td align=middle class="titles"><strong>Fecha de inicio</strong></td>
    <td align=middle class="titles"><strong>Fecha de vencimiento</strong></td>
    <td align=middle class="titles"><strong>Status</strong></td>	
    <td align=middle class="titles"><strong>Operaciones</strong></td>		
  </tr>';

$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";}

$fecha1=$row["fecha_inicio"];
$fecha1=explode(" ",$fecha1);
$fecha1_date=explode("-",$fecha1[0]);
$fecha2=$row["fecha_vencimiento"];
$fecha2=explode(" ",$fecha2);
$fecha2_date=explode("-",$fecha2[0]);

  echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>  
  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td>
    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
	    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha1_date[2].'/'.$fecha1_date[1].'/'.$fecha1_date[0].' '.$fecha1[1].'</td>
		  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha2_date[2].'/'.$fecha2_date[1].'/'.$fecha2_date[0].' '.$fecha2[1].'</td>
	  	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'; 
			  if($row["status"]=="no validado"){
#			  echo'<input name="elegidos[]" type="checkbox" value="'.$row["id"].'" /> Validar';
echo'<a href="?module=valida_individual&id='.$row["id"].'&accela=new">no validado</a>';
}
			  else{echo''.$row["status"].'';}
			  echo'</td>
			  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=detail_validacion&id='.$row["id"].'">Detalle</a> | <a href="?module=valida_individual&id='.$row["id"].'&accela=edit">Editar</a></td>
  
  </tr>';

  }  



echo'</table><!-- <p align=center><input value="Validar seleccionados" type="submit" /> --></form>';



  }



else{echo'<center><b>No hay resultados</b></center>';}
?>
</td></tr></table>