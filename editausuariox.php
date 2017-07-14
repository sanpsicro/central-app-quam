<?php 
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
isset($_GET['id']) ? $id = $_GET['id'] : $id="";

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


$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$usuario=mysqli_result($result,0,"usuario");
$num_cliente=mysqli_result($result,0,"num_cliente");
$num_siniestro=mysqli_result($result,0,"num_siniestro");
$reporte_cliente=mysqli_result($result,0,"reporte_cliente");
$tel_reporta=mysqli_result($result,0,"tel_reporta");
$ejecutivo=mysqli_result($result,0,"ejecutivo");
$cobertura=mysqli_result($result,0,"cobertura");
$email=mysqli_result($result,0,"email");
$reporta=mysqli_result($result,0,"reporta");
}
?>
<form id="form1" name="form1" method="post" action="process.php?module=usuariox&id=<?php echo $id;?>">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td bgcolor="#FFFFFF"><strong>Nombre del cliente:</strong></td>
      <td bgcolor="#FFFFFF"><input name="num_cliente" type="text" id="num_cliente" size="30" value="<?php echo $num_cliente;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>N&uacute;mero del siniestro:</strong></td>
      <td bgcolor="#FFFFFF"><input name="num_siniestro" type="text" id="num_siniestro" size="30" value="<?php echo $num_siniestro;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    
    <tr>
      <td width="200" bgcolor="#FFFFFF"><strong>Nombre de usuario:</strong></td>
      <td width="100" bgcolor="#FFFFFF"><input name="usuario" type="text" id="usuario" size="30" value="<?php echo $usuario;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Reporte Cliente:</strong></td>
      <td bgcolor="#FFFFFF"><input name="reporte_cliente" type="text" id="reporte_cliente" size="30" value="<?php echo $reporte_cliente;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Reporta:</strong></td>
      <td bgcolor="#FFFFFF"><input name="reporta" type="text" id="reporta" size="30" value="<?php echo $reporta;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Telefono de Contacto:</strong></td>
      <td bgcolor="#FFFFFF"><input name="tel_reporta" type="text" id="tel_reporta" size="30" value="<?php echo $tel_reporta;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Ejecutivo:</strong></td>
      <td bgcolor="#FFFFFF"><input name="ejecutivo" type="text" id="ejecutivo" size="30" value="<?php echo $ejecutivo;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Cobertura:</strong></td>
      <td bgcolor="#FFFFFF"><input name="cobertura" type="text" id="cobertura" size="30" value="<?php echo $cobertura;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>    
        <tr>
      <td bgcolor="#FFFFFF"><strong>E-Mail:</strong></td>
      <td bgcolor="#FFFFFF"><input name="email" type="text" id="cobertura" size="30" value="<?php echo $email;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>  
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="Guardar" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</form>
