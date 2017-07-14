<?php  
$checa_arrayx=array_search("4_v",$explota_permisos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Validaciones</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=validaciones">
            </form>
            <form name="form1" method="post" action="bridge.php?module=validaciones">
              <td align="right" class="questtitle">B&uacute;squeda: 
                <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr>
  <td>
<p>
  <?php  
  
  isset($_GET['id']) ? $id = $_GET['id'] : $id = "" ;
  isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = "" ;
  
  
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
$result = mysqli_query($db,"SELECT * from usuarios_contrato where id = '$id'");
if (mysqli_num_rows($result)){ 
$contrato=mysqli_result($result,0,"contrato");
$inciso=mysqli_result($result,0,"inciso");
$clave=mysqli_result($result,0,"clave");
$nombre=mysqli_result($result,0,"nombre");
}
if($accela!="new"){$accela="edit";}
if($accela=="edit"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from validaciones  where clave_usuario  = '$clave'");
if (mysqli_num_rows($result)){ 
$idval=mysqli_result($result,0,"id");
$tipo_pago=mysqli_result($result,0,"tipo_pago");
$fecha_pago=mysqli_result($result,0,"fecha_pago");
$uno_fecha=explode("-",$fecha_pago);
$fecha_pago_comision=mysqli_result($result,0,"fecha_pago_comision");
$dos_fecha=explode("-",$fecha_pago_comision);
$cuanta_ingreso=mysqli_result($result,0,"cuenta_ingreso");
$observaciones=mysqli_result($result,0,"observaciones");
$comision_vendedor=mysqli_result($result,0,"comision_vendedor");
}
}
?>
</p>
<form id="form2" name="form2" method="post" action="process.php?module=validaciones&accela=<?php  echo $accela?><?php  if($accela=="edit"){echo'&idval='.$idval.'';}?>">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="4" bgcolor="#CCCCCC"><strong>Validaci&oacute;n de usuario de contrato 
        <input name="id" type="hidden" id="id" value="<?php  echo $id; ?>" />
        <input name="clave" type="hidden" id="contrato" value="<?php  echo $clave; ?>" />        
      </strong></td>
    </tr>
    <tr>
      <td width="25%" align="right" bgcolor="#ffffff"><strong>Nombre:</strong></td>
      <td width="25%" bgcolor="#ffffff"><?php  echo $nombre; ?></td>
      <td width="25%" align="right" bgcolor="#ffffff"><strong>Clave de usuario:</strong></td>
      <td width="25%" bgcolor="#ffffff"><?php  echo $clave; ?></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#ffffff"><strong>Tipo de pago:</strong></td>
      <td bgcolor="#ffffff"><select name="tipo_pago" id="tipo_pago">
        <option value="efectivo" <?php  if($tipo_pago=="efectivo"){echo' selected ';}?>>Efectivo</option>
        <option value="cheque"  <?php  if($tipo_pago=="cheque"){echo' selected ';}?>>Cheque</option>
        <option value="transferencia"  <?php  if($tipo_pago=="transferencia"){echo' selected ';}?>>Transferencia</option>
        <option value="tarjeta de credito"  <?php  if($tipo_pago=="tarjeta de credito"){echo' selected ';}?>>Tarjeta de cr&eacute;dito</option>
        <option value="domicializacion"  <?php  if($tipo_pago=="domicializacion"){echo' selected ';}?>>Domicializaci&oacute;n</option>
        <option value="recibo telefonico"  <?php  if($tipo_pago=="recibo telefonico"){echo' selected ';}?>>Recibo telef&oacute;nico</option>
        <option value="otro"  <?php  if($tipo_pago=="otro"){echo' selected ';}?>>Otro</option>
      </select>      </td>
      <td align="right" bgcolor="#ffffff"><strong>Fecha de pago:</strong></td>
      <td bgcolor="#ffffff"><?php  
if(empty($uno_fecha[2])){$uno_fecha[2]=date("j");}	  
if(empty($uno_fecha[1])){$uno_fecha[1]=date("m");}	  
if(empty($uno_fecha[0])){$uno_fecha[0]=date("Y");}	  
	  
echo'<select name="pago_dia" id="pago_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="pago_mes" id="pago_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="pago_ano" id="pago_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			?></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#ffffff"><strong>Cuenta de ingreso del pago:</strong></td>
      <td bgcolor="#ffffff"><select name="cuenta_ingreso" id="cuenta_ingreso">
        <option value="caja" <?php  if($cuanta_ingreso=="caja"){echo' selected ';}?>>Caja</option>
        <option value="bancomer" <?php  if($cuanta_ingreso=="bancomer"){echo' selected ';}?>>Bancomer</option>
        <option value="banorte" <?php  if($cuanta_ingreso=="banorte"){echo' selected ';}?>>Banorte</option>
        <option value="hsbc" <?php  if($cuanta_ingreso=="hsbc"){echo' selected ';}?>>HSBC</option>
        <option value="banamex" <?php  if($cuanta_ingreso=="banamex"){echo' selected ';}?>>Banamex</option>
        <option value="otro" <?php  if($cuanta_ingreso=="otro"){echo' selected ';}?>>Otro</option>        
      </select>      </td>
      <td align="right" bgcolor="#ffffff"><strong>Observaciones:</strong></td>
      <td bgcolor="#ffffff"><textarea name="observaciones" id="observaciones" cols="50" rows="3"><?php  echo $observaciones;?></textarea></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#ffffff"><strong>Monto comisi&oacute;n vendedor:</strong></td>
      <td bgcolor="#ffffff">$
        <input name="comision" type="text" id="comision" size="20"  onKeyPress="return numbersonly(this, event)" value="<?php  echo $comision_vendedor;?>"/></td>
      <td align="right" bgcolor="#ffffff"><strong>Fecha de pago de comisi&oacute;n</strong></td>
      <td bgcolor="#ffffff"><?php  
if(empty($dos_fecha[2])){$dos_fecha[2]=date("j");}	  
if(empty($dos_fecha[1])){$dos_fecha[1]=date("m");}	  
if(empty($dos_fecha[0])){$dos_fecha[0]=date("Y");}	  
	  
echo'<select name="pago_comision_dia" id="pago_comsion_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="pago_comision_mes" id="pago_comision_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="pago_comision_ano" id="pago_comision_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			?></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#ffffff"><input type="submit" name="button" id="button" value="Validar" /></td>
      </tr>
  </table>
</form>
</td>
</tr></table>