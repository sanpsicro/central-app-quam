<?php 
error_reporting(E_ALL);
$checa_arrayx=array_search("contratos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['idPoliza']) ? $idPoliza = $_GET['idPoliza'] : $idPoliza = 0; 
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">B&uacutesqueda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
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
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Poliza where idPoliza = '$idPoliza'");
$idCliente=mysqli_result($result,0,"idCliente");
$idEmpleado=mysqli_result($result,0,"idEmpleado");
$fechaCaptura=mysqli_result($result,0,"fechaCaptura");
$fecha1=explode(" ",$fechaCaptura);
$fecha1=explode("-",$fecha1[0]);
$numPoliza=mysqli_result($result,0,"numPoliza");
$tipoVenta=mysqli_result($result,0,"tipoVenta");
$fechaInicio=mysqli_result($result,0,"fechaInicio");
$fecha2=explode(" ",$fechaInicio);
$fecha2=explode("-",$fecha2[0]);
$fechaVence=mysqli_result($result,0,"fechaVence");
$fecha3=explode(" ",$fechaVence);
$fecha3=explode("-",$fecha3[0]);
$factura=mysqli_result($result,0,"factura");
$monto=mysqli_result($result,0,"monto");
$comision=mysqli_result($result,0,"comision");
$ingreso=mysqli_result($result,0,"ingreso");
$productos=mysqli_result($result,0,"productos");
###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query($db2,"SELECT * from Empleado where idEmpleado = '".$idEmpleado."'");
$vendedor=mysqli_result($result2,0,"nombre");
###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query($db2,"SELECT * from Cliente where idCliente = '".$idCliente."'");
$cliente=mysqli_result($result2,0,"nombre");
###
/*
$db6 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db6);
$result6 = mysqli_query("SELECT * from TipoVenta where idVenta = '$tipoVenta'",$db6);
$tipoVenta=mysqli_result($result6,0,"nombre");
*/
$db7 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db7);
$result7 = mysqli_query($db7,"SELECT * from productos where id = '".$productos."'");
$elproducto=mysqli_result($result7,0,"producto");
$terminos=mysqli_result($result7,0,"terminos");
###

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Contrato <?php echo ''.$numPoliza.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Cliente:</strong> <?php echo $cliente?></td>

    <td bgcolor="#CCCCCC"><strong>Vendedor:</strong> <?php echo $vendedor?></td>
    </tr>

  <tr>


    <td bgcolor="#CCCCCC" colspan=2><strong>Producto:</strong> <?php echo $elproducto; ?></td>
    </tr>
<?php 
	if($factura=="1"){
echo'<tr><td align=right><b>Factura</b></td><td>&nbsp;</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Monto:</strong></td><td bgcolor="#CCCCCC">$'.number_format($monto,2).'</td></tr>
<tr><td align=right><strong>Comisi&oacuten:</strong></td><td>$'.number_format($comision,2).'</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Ingreso:</strong></td><td bgcolor="#CCCCCC">$'.number_format($ingreso,2).'</td></tr>';
}

echo'</table>';

##################
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM usuarios_contrato where idPoliza='$idPoliza' order by inciso"); 
if (mysqli_num_rows($result)){ 
echo'<table width=100% cellpadding=3 cellspacing=3><tr><td colspan=8 align=middle><b>Usuarios</b></td></tr>
<tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Contrato</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Inciso</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Clave del usuario</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de inicio</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de vencimiento</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Status</strong></td>	
  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 

$fecha1=$row["fecha_inicio"];
$fecha1=explode(" ",$fecha1);
$fecha1_date=explode("-",$fecha1[0]);
$fecha2=$row["fecha_vencimiento"];
$fecha2=explode(" ",$fecha2);
$fecha2_date=explode("-",$fecha2[0]);

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
//se suprimio '.$fecha2[1].' '.$fecha1[1].'
  echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>  
  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td>
    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
	    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha1_date[2].'/'.$fecha1_date[1].'/'.$fecha1_date[0].' </td>
		  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha2_date[2].'/'.$fecha2_date[1].'/'.$fecha2_date[0].' </td>
		  	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>
 </tr>';

  
  }
  echo'</table>';
  }

 
?>

</table>
</td></tr></table>