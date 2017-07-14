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
 
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$auto_marca=mysqli_result($result,0,"auto_marca");
$auto_tipo=mysqli_result($result,0,"auto_tipo");
$auto_modelo=mysqli_result($result,0,"auto_modelo");
$auto_color=mysqli_result($result,0,"auto_color");
$auto_placas=mysqli_result($result,0,"auto_placas");
}

	  ?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td bgcolor="#FFFFFF"><strong>Codigo Identificador:</strong> <?php echo $auto_placas;?></td>
    <td bgcolor="#FFFFFF"><strong>Marca:</strong> <?php echo $auto_marca;?></td>
    <td bgcolor="#FFFFFF"><strong>Tipo:</strong> <?php echo $auto_tipo;?></td>
    
  </tr>
  <tr>
  <td bgcolor="#FFFFFF"><strong>Modelo:</strong> <?php echo $auto_modelo;?></td>
    <td bgcolor="#FFFFFF"><strong>Color:</strong> <?php echo $auto_color;?></td>
    
	<?php if(empty($NO_EDITAR)):?>
    <td align="right" bgcolor="#FFFFFF"><strong>
    
 
    
    [ <a href="javascript:FAjax('editar_datosvehiculo.php?id=<?php echo $id;?>&amp;flim-flam=new Date().getTime()','datosvehiculo','','get');">Editar</a> ]</strong></td>
    
  
    
	<?php endif; ?>
  </tr>
</table>
