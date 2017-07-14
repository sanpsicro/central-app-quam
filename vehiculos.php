<?php  
session_start();
 $explota_permisos=explode(",",$_SESSION["valid_permisos"]);
?>
 <html><head>
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_del.js" type="text/javascript"></script> 
</head><body>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="8" bgcolor="#bbbbbb"><table width="100%%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>Veh&iacute;culos</strong></td>
        <td width="100" align="center" class="blacklinks">
		<?php   $checa_array1=array_search("5_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="admin_vehiculos.php?accela=new&tmpid='.$tmpid.'&idPoliza='.$idPoliza.'&tipocliente='.$tipocliente.'">Nuevo veh�culo</a> ]'; } ?>
</td>
      </tr>
    </table>      </td>
  </tr>
  <?php  
if($code=="5"){echo'<tr><td colspan=8><b>Error: el tipo de cliente es unitario. No puede agregar m�s veh�culos.</b></td></tr>';}
   include 'conf.php';
   if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){
   $condicion="where idPoliza = '$idPoliza'";
   }
   else{
$condicion="where tmpid = '$tmpid'";
   }
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Vehiculo $condicion order by idVehiculo", $link); 
if (mysqli_num_rows($result)){ 
echo' <tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Marca</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Modelo</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Tipo</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Color</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Placas</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Serie</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Servicio</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Operaci&oacute;n</strong></td>
  </tr>';
$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["marca"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["modelo"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["color"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["placas"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["serie"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><center>';







$checa_array1=array_search("5_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo'<a href="admin_vehiculos.php?accela=edit&idVehiculo='.$row["idVehiculo"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'">Editar</a> |  ';}

$checa_array1=array_search("5_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=vehiculos&accela=delete&idVehiculo='.$row["idVehiculo"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'\',\'al vehiculo\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a>

';}





echo'</center></td>

</tr>';

   }

   echo'</table>';

   }

   

   ?>

  

 

  





 </body></html>

