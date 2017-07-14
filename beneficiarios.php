<?php
session_start();
 $explota_permisos=explode(",",$_SESSION["valid_permisos"]);
?>
 <html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_del.js" type="text/javascript"></script> 
</head><body>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="8" bgcolor="#bbbbbb"><table width="100%%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>Beneficiarios</strong></td>
        <td width="150" align="center" class="blacklinks">
		<?php  echo'
	[ <a href="admin_beneficiarios.php?accela=new&tmpid='.$tmpid.'&idPoliza='.$idPoliza.'&tipocliente='.$tipocliente.'">Nuevo beneficiario</a> ]'; ?>
</td>
      </tr>
    </table>      </td>
  </tr>
  <?php  
if($code=="5"){echo'<tr><td colspan=8><b>Error: el tipo de cliente es unitario. No puede agregar m�s beneficiarios.</b></td></tr>';}
   include 'conf.php';
   if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){
   $condicion="where idPoliza = '$idPoliza'";
   }
   else{
$condicion="where tmpid = '$tmpid'";
   }
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Beneficiario $condicion order by nombre"); 
if (mysqli_num_rows($result)){ 
echo' <tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Edad</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Parentesco</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Operaci&oacute;n</strong></td>
  </tr>';
$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["edad"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["parentesco"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><center>';

$checa_array1=array_search("5_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo'<a href="admin_beneficiarios.php?accela=edit&id='.$row["id"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'">Editar</a> |  ';}

$checa_array1=array_search("5_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=beneficiarios&accela=delete&id='.$row["id"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'\',\'al beneficiario\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a>
';}
echo'</center></td>
</tr>';
   }
   echo'</table>';
   }
   ?>
 </body></html>