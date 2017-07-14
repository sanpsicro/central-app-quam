<?php 
session_start();


isset($_GET['id']) ? $id = $_GET['id'] : $id = 0 ;
isset($_GET['idPoliza']) ? $idPoliza = $_GET['idPoliza'] : $idPoliza = 0 ;
isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = "" ;
isset($_GET['idCliente']) ? $idCliente = $_GET['idCliente'] : $idCliente = "" ;
isset($_GET['tmpid']) ? $tmpid = $_GET['tmpid'] : $tmpid = "" ;
isset($_GET['tipocliente']) ? $tipocliente = $_GET['tipocliente'] : $tipocliente = "" ;
isset($_GET['numcontrato']) ? $numcontrato = $_GET['numcontrato'] : $numcontrato = "" ;

 include 'conf.php';
 
 
 
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
$fecha_inicio=mysqli_result($result,0,"fecha_inicio");
$finicio=explode(" ",$fecha_inicio);
$finix=explode("-",$finicio[0]);
$fecha_vencimiento=mysqli_result($result,0,"fecha_vencimiento");
$fvence=explode(" ",$fecha_vencimiento);
$fvenx=explode("-",$fvence[0]);
$monto=mysqli_result($result,0,"monto");
$comision=mysqli_result($result,0,"comision");
$ingreso=mysqli_result($result,0,"ingreso");

$tipoventa=mysqli_result($result,0,"tipo_venta");

$marca=mysqli_result($result,0,"marca");
$modelo=mysqli_result($result,0,"modelo");
$tipo=mysqli_result($result,0,"tipo");
$color=mysqli_result($result,0,"color");
$placas=mysqli_result($result,0,"placas");
$serie=mysqli_result($result,0,"serie");
$servicio=mysqli_result($result,0,"servicio");
$pre_idPoliza=mysqli_result($result,0,"idPoliza");
$pre_tmpid=mysqli_result($result,0,"tmpid");

$nombre=mysqli_result($result,0,"nombre");
$fecha_nacimiento=mysqli_result($result,0,"fecha_nacimiento");
$fecha=explode("-",$fecha_nacimiento);
$domicilio=mysqli_result($result,0,"domicilio");
$colonia=mysqli_result($result,0,"colonia");
$ciudad=mysqli_result($result,0,"ciudad");
$municipio=mysqli_result($result,0,"municipio");
$estado=mysqli_result($result,0,"estado");
$tel=mysqli_result($result,0,"tel");
$cel=mysqli_result($result,0,"cel");
$nextel=mysqli_result($result,0,"nextel");
$mail=mysqli_result($result,0,"mail");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from TipoVenta where idVenta = '$tipoventa'");
$tipoventa=mysqli_result($result,0,"nombre");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Estado where idEstado = '$estado'");
$estado=mysqli_result($result,0,"nombreEstado");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '$municipio'");
$municipio=mysqli_result($result,0,"nombreMunicipio");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Colonia where idColonia = '$colonia'");
$colonia=mysqli_result($result,0,"nombreColonia");

?>

<html><head>
<link href="style_1.css" rel="stylesheet" type="text/css" />
</head><body>
 <table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="4" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Usuarios</strong></td>

        <td width="150" align="center" class="blacklinks">[ <a href="usuarios_contrato.php?tmpid=<?php  echo $tmpid; ?>&idPoliza=<?php  echo $idPoliza; ?>&tipocliente=<?php  echo $tipocliente; ?>&numcontrato=<?php  echo $numcontrato; ?>&idCliente=<?php  echo $idCliente;?>">Lista de Usuarios</a> ]</td>
      </tr>

    </table>      </td>
  </tr>

  

   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos de contrato</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de inicio:</strong> </td>
     <td bgcolor="#bbbbbb"><?php  echo''.$finix[2].'/'.$finix[1].'/'.$finix[0].' './* no se sabe su utilidad $finicio[1].*/''; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Tipo de venta:</strong> </td>
     <td bgcolor="#bbbbbb"><?php  echo $tipoventa;


?>    </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de vencimiento:</strong></td>
     <td bgcolor="#bbbbbb"><div id="vencimiento"><?php  echo''.$fvenx[2].'/'.$fvenx[1].'/'.$fvenx[0].' './* no se sabe para que sirve $fvence[1].*/''; ?></div></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Monto:</strong></td>
     <td bgcolor="#bbbbbb">$<?php  echo number_format($monto,2);?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Comisi&oacute;n:</strong></td>
     <td bgcolor="#bbbbbb">$<?php  echo number_format($comision,2); ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Ingreso:</strong></td>
     <td bgcolor="#bbbbbb">$<?php  echo number_format($ingreso,2); ?></td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos personales</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Nombre:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $nombre; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de nacimiento:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo''.$fecha[2].'/'.$fecha[1].'/'.$fecha[0].''; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Domicilio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $domicilio; ?></td>
	      <td align="right" bgcolor="#bbbbbb"><strong>Ciudad:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $ciudad; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Estado:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $estado;  ?>
</td>
 
      <td align="right" bgcolor="#bbbbbb"><strong>Municipio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $municipio;  ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Colonia:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $colonia;  ?></td>
						       <td align="right" bgcolor="#bbbbbb"><strong>Tel&eacute;fono:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $tel; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Celular:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $cel; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Nextel:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $nextel; ?></td>
   </tr>
   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Email:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php  echo $mail; ?></td>
	      <td align="right" bgcolor="#bbbbbb">&nbsp;</td>
     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos del veh&iacute;culo</strong> </td>
   </tr>
   <tr>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Marca</strong><strong>:</strong><strong></strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><?php  echo $marca; ?></td>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Modelo:</strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><?php  echo $modelo; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Tipo:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><?php  echo $tipo; ?></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Color:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><?php  echo $color; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Placas:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><?php  echo $placas; ?></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Serie:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><?php  echo $serie; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Servicio:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><?php  echo $servicio;  ?></td>

     <td align="right" bgcolor="#bbbbbb">&nbsp;</td>

     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>

 </table>
 </body></html>