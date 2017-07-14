<?php  
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['expediente']) ? $expediente= $_GET['expediente'] : $expediente= "" ;


?>
<span class="maintitle">Pagos Expediente <a href="detalle_seguimiento.php?id=<?php  $expediente?>" target="_blank"><?php  $expediente?></a></span><br />
<?php  
if(isset($code) && $code=="1"){echo'<br><div class="xplik">Nuevo pago Registrado</div>';}
if(isset($code) && $code=="2"){echo'<br><div class="xplik">Datos del Pago actualizados</div>';}
if(isset($code) && $code=="3"){echo'<div class="xplik">Pago eliminado</div>';}


$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysqli_query($link,"SELECT p.expediente from pagos p 
							LEFT JOIN Provedor pr 
								ON (p.proveedor=pr.id)
							WHERE p.expediente='$expediente'"); 
$total = mysqli_num_rows($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$query="SELECT 	DATE_FORMAT(p.fecha_corte,'%e/%m/%y') as fecha_corte, 
				p.id, 
				p.expediente, 
				pr.nombre,
				pr.id as proveedor_id,
				p.conceptor, 
				p.monto, 
				p.status,
				p.cerrado,
				DATE_FORMAT(p.fecha_pago,'%e/%m/%y') as fecha_pago
						FROM pagos p 
							LEFT JOIN Provedor pr
								ON (p.proveedor = pr.id)
							LEFT JOIN general g
								ON (g.id = p.expediente)
							WHERE p.expediente='$expediente'";
$result = mysqli_query($link,$query) or die (mysqli_error($link)); 


if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">
                    <tr> 
                     <th>Fecha de Corte</th>				  	                     
					 <th>Concepto</th>
                     <th>Monto</th>				 
                     <th>Status</th>
                     <th>Fecha de Pago</th>
                     <th>Detalles</th>
					 </tr>';

$pago_cerrado = false;

  while ($row = mysqli_fetch_array($result)) { 
if($i++%2==0){$class="even";} else{$class="odd";}
	
if($pago_cerrado === false){
	$pago_cerrado = ($row['cerrado']=='0') ? false : true;
}	

$proveedor=$row["proveedor_id"];	

  echo'                <tr> 
<td class="'.$class.'">'.$row["fecha_corte"].'</a></td>
<td class="'.$class.'">'.$row["conceptor"].'</td>
<td class="'.$class.'">$'.number_format($row["monto"],2).'</td>
<td class="'.$class.'">'.($row['status']==1?'Pagado':'No Pagado').'</td>
<td class="'.$class.'">'.$row['fecha_pago'].'</a></td>
<td class="'.$class.'"><a href="?module=control_pago_editar&id='.$row["id"].'">Editar</a></td>
</tr> 
';
  }  
echo'</table>';
  }
else{
	echo'<center><b>No hay resultados</b></center>';
}
?>
<?php if($pago_cerrado === false): ?> 
<div class="control_pagos">
	<a href="mainframe.php?module=control_pago_alta&expediente=<?php  $expediente?>&proveedor=<?php  $proveedor?>">Agregar Pago</a>
	<small><a href="control_pago_db.php?action=cerrar&expediente=<?php  $expediente?>&proveedor=<?php  $proveedor?>">Cerrar Pagos</a></small>
</div>
<?php endif; ?>
<!-- <?php  echo print_r($_SESSION);?> -->
</td></tr></table>