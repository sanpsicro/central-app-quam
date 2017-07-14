<?php  

isset($_GET['id']) ? $id= $_GET['id'] : $id= "" ;

$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$query="SELECT  p.fecha_corte, 
				p.id, 
				p.expediente, 
				p.proveedor, 
				p.conceptor, 
				p.monto, 
				p.status,
				p.cerrado,
				p.fecha_pago
				FROM pagos p 
				WHERE p.id='$id'";
$result = mysqli_query($link,$query) or die (mysql_error($link)); 
extract(mysqli_fetch_array($result));

list($corte_anio,$corte_mes,$corte_dia)=explode("-",$fecha_corte);
list($pago_anio,$pago_mes,$pago_dia)=explode("-",$fecha_pago);

if($cerrado == '1'){
	$disabled = 'disabled="disabled"';
}


?>
<span class="maintitle">Alta de pago al Expediente <a href="detalle_seguimiento.php?id=<?php echo $expediente;?>" target="_blank"><?php echo $expediente;?></a></span>
<form method="post" action="control_pago_db.php?action=editar">
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="expediente" value="<?php echo $expediente;?>">
<input type="hidden" name="proveedor" value="<?php echo $proveedor;?>">
<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">

<?php  if($cerrado == '0'): ?>
<tr> 
	<th>Fecha de Corte</th>
	<td style="text-align:left">
		<select name="fecha_corte_dia">
		<?php  for($i=1;$i<=31;$i++): ?>
			<option value="<?php echo $i;?>" <?php  if($i==$corte_dia){ echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
		/
		<select name="fecha_corte_mes">
		<?php  for($i=1;$i<=12;$i++): ?>
			<option value="<?php echo $i;?>" <?php  if($i==$corte_mes){ echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
		/
		<select name="fecha_corte_anio">
		<?php  for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?php echo  $i;?>" <?php  if($i==$corte_anio){ echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
	</td>
</tr>
<tr>	
	<th>Concepto</th><td style="text-align:left"><input type="text" name="conceptor" value="<?php echo  $conceptor;?>" size="40"></td>
</tr>
<tr>
	<th>Monto</th><td style="text-align:left"><input type="text" name="monto" value="<?php echo $monto;?>" size="4"></td>				  
</tr>
<?php  else: ?>

<tr> 
	<th>Fecha de Corte</th>
	<td style="text-align:left">
		<?php  echo "$corte_dia/$corte_mes/$corte_anio"; ?>
		<input type="hidden" name="fecha_corte_dia" value="<?php echo $corte_dia;?>">
		<input type="hidden" name="fecha_corte_mes" value="<?php echo $corte_mes;?>">
		<input type="hidden" name="fecha_corte_anio" value="<?php  echo $corte_anio;?>">
	</td>
</tr>
<tr>	
	<th>Concepto</th><td style="text-align:left"><?php echo $conceptor;?><input type="hidden" name="conceptor" value="<?php echo $conceptor;?>" size="40"></td>
</tr>
<tr>s
	<th>Monto</th><td style="text-align:left"><?php echo $monto;?><input type="hidden" name="monto" value="<?php echo $monto;?>" size="4"></td>				  
</tr>

<?php  endif;?>
<tr>
	<th>Status</th>
	<td style="text-align:left">
		<input type="radio"  name="status" id="pagado" value="1" <?php if($status=="1"){ echo "checked='checked'";}?> /> <label for="pagado">Pagado</label><br />
		<input type="radio" name="status" id="no-pagado" value="0"  <?php  if($status=="0"){ echo "checked='checked'";}?> /> <label for="no-pagado">No Pagado</label>
	</td>
</tr>
<tr>
	<th>Fecha de Pago</th>
	<td style="text-align:left">
		<select name="fecha_pago_dia">
		<?php  for($i=1;$i<=31;$i++): ?>
			<option value="<?php echo $i;?>" <?php  if($i==$pago_dia){echo "selected='selected'";} ?> ><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
		/
		<select name="fecha_pago_mes">
		<?php  for($i=1;$i<=12;$i++): ?>
			<option value="<?php echo $i;?>" <?php  if($i==$pago_mes){echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
		/
		<select name="fecha_pago_anio">
		<?php  for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?php echo  $i;?>" <?php  if($i==$pago_anio){echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php  endfor; ?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Enviar" /></td>
</tr>
</table>
</form>