<?php  
$checa_arrayx=array_search("evaluaciones",$explota_modulos);

isset($_GET['id']) ? $id = $_GET['id'] :  $id = "";
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Validaciones</span></td>
          <td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
             <form name="form1" method="post" action="bridge.php?module=validaciones"><td align="right" class="questtitle">B&uacutesqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>


          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?php
 function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}

$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from usuarios_contrato where id = '$id'");
if (mysqli_num_rows($result)){ 
$clave=mysqli_result($result,0,"clave");
$nombre=mysqli_result($result,0,"nombre");
}

$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from validaciones  where clave_usuario  = '$clave'");
if (mysqli_num_rows($result)){ 
$tipo_pago=mysqli_result($result,0,"tipo_pago");
$fecha_pago=mysqli_result($result,0,"fecha_pago");
$fecha1=explode("-",$fecha_pago);
$fecha_pago_comision=mysqli_result($result,0,"fecha_pago_comision");
$fecha2=explode("-",$fecha_pago_comision);
$cuanta_ingreso=mysqli_result($result,0,"cuenta_ingreso");
$observaciones=mysqli_result($result,0,"observaciones");
$comision_vendedor=mysqli_result($result,0,"comision_vendedor");
}
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles de validaci&oacute;n</b></td>
    </tr>

  <tr>

    <td width="25%" bgcolor="#eeeeee"><strong>Nombre:</strong> <?php  echo $nombre;?></td>
    <td width="25%" bgcolor="#eeeeee"><p><strong>Clave de usuario:</strong> <?php  echo $clave;?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Tipo de pago:</strong> <?php  echo $tipo_pago;?></td>
    <td bgcolor="#FFFFFF"><strong>Fecha de pago:</strong> <?php  echo''.$fecha1[2].'/'.$fecha1[1].'/'.$fecha1[0].'';?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Cuenta de ingreso del pago:</strong> <?php  echo $cuanta_ingreso;?></td>
    <td bgcolor="#eeeeee"><strong>Observaciones:</strong> <?php  echo nl2br($observaciones);?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Monto comisi&oacute;n vendedor:</strong> $<?php  echo number_format($comision_vendedor,2); ?></td>
    <td bgcolor="#FFFFFF"><strong>Fecha de pago de comisi&oacute;n:</strong> <?php  echo''.$fecha2[2].'/'.$fecha2[1].'/'.$fecha2[0].'';?></td>
  </tr>
</table>





</td></tr></table>