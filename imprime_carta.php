<html><head><title>Factura</title><link href="style_1.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style10 {
	color: #063D7C;
	font-weight: bold;
}
.style11 {
	font-size: 20px;
	color: #00266D;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" text="#000000" onLoad="printpage()">
<p>
  <script language="Javascript1.2">
 
 function printpage() {
window.print();  
}
</script>
  <?php  
include('conf.php');


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

isset($_GET['id']) ? $id = $_GET['id'] : $id = "" ;
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '$id'");
$expediente=mysqli_result($result,0,"expediente");
$reporte_cliente=mysqli_result($result,0,"reporte_cliente");
$num_cliente=mysqli_result($result,0,"num_cliente");
$marca=mysqli_result($result,0,"auto_marca");
$tipo=mysqli_result($result,0,"auto_tipo");
$modelo=mysqli_result($result,0,"auto_modelo");
$color=mysqli_result($result,0,"auto_color");
$placas=mysqli_result($result,0,"auto_placas");
$proveedor=mysqli_result($result,0,"proveedor");
$banderazo=mysqli_result($result,0,"banderazo");
$blindaje=mysqli_result($result,0,"blindaje");
$maniobras=mysqli_result($result,0,"maniobras");
$espera=mysqli_result($result,0,"espera");
$otro=mysqli_result($result,0,"otro");
$total=mysqli_result($result,0,"total");
$idEmpleado=mysqli_result($result,0,"idEmpleado");
$cliente=mysqli_result($result,0,"idCliente");


$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT nombre from Provedor where id = '$proveedor'");
$proveedor=mysqli_result($result,0,"nombre");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT nombre from Empleado where idEmpleado = '$idEmpleado'");
$empleado=mysqli_result($result,0,"nombre");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Cliente where idCliente = '$cliente'");
$cliente=mysqli_result($result,0,"nombre");


?>
</p>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="105"><img src="img/ayasalog.gif" width="105" height="88"></td>
        <td align="center"><span class="style11">Abogados y Asistencia para Empresas S.A. de C.V.</span></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#053F7A"><img src="img/dot.gif" width="1" height="1"></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td><p><strong><?php  #echo $proveedor;
		?></strong></p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              <td width="250"><p><strong>M&eacute;xico D.F. a
                <?php  
		echo date("d");?>
                de
                <?php  
		
		$dias = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
echo $dias[date('n')-1];
?>
                de <?php  echo date("Y");?>.</strong></p>
                  <p><strong>Reporte Cliente: <?php  echo $reporte_cliente;?></strong></p></td>
            </tr>
          </table>
          <p><strong>A QUIEN CORRESPONDA:</strong></p>
          <p><strong>PRESENTE:</strong></p>
          <p>&nbsp;</p>
          <p><strong>Por este conducto me permito hacer de  su conocimiento, que en el servicio otorgado bajo el n&uacute;mero de expediente  citado al rubro, relacionado con la unidad Marca: <?php  echo $marca; ?>, Tipo: <?php  echo $tipo; ?>, Modelo: <?php  echo $modelo; ?>, Color: <?php  echo $color; ?>, Placas: <?php  echo $placas; ?>, se  generaron los siguientes costos adicionales como lo establece el convenio que  existe entre GRUAS AYASA y <?php  echo $cliente; ?>: </strong></p>
          <table width="300" border="0" cellspacing="3" cellpadding="3">
            <tr>
              <td><strong>Banderazo:</strong></td>
              <td><strong>$<?php  echo number_format($banderazo,2);?></strong></td>
            </tr>
            <tr>
              <td><strong>Blindaje:</strong></td>
              <td><strong>$<?php  echo number_format($blindaje,2);?></strong></td>
            </tr>
            <tr>
              <td><strong>Maniobras</strong></td>
              <td><strong>$<?php  echo number_format($maniobras,2);?></strong></td>
            </tr>
            <tr>
              <td><strong>Tiempo de Espera</strong></td>
              <td><strong>$<?php  echo number_format($espera,2);?></strong></td>
            </tr>
            <tr>
              <td><strong>Otro:</strong></td>
              <td><strong>$<?php  echo number_format($otro,2);?></strong></td>
            </tr>
            <tr>
              <td><strong>TOTAL </strong></td>
              <td><strong>$<?php  
			  $totalix=$otro+$espera+$maniobras+$blindaje+$banderazo;
#			  $totalix=$totalix*1.15;
			  echo number_format($totalix,2);?></strong></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p><strong>Es por lo anterior que solicito se  cubra la factura que acompa&ntilde;a al presente informe y quedo a sus &oacute;rdenes para  cualquier aclaraci&oacute;n. </strong></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>________________________________________________________________________</td>
            </tr>
            <tr>
              <td><p align="center"><strong><?php  echo $empleado; ?></strong><br>
                      <strong>Coordinador Cabina</strong></p></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p></p></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#053E75"><img src="img/dot.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td><p align="center" class="style10">Eje Central L&aacute;zaro  C&aacute;rdenas 1201 1er Piso, Col. Nueva Industrial Vallejo, Tel. 91 12 98 16 </p></td>
  </tr>
  
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

