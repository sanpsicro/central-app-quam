<?php  
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

isset($_GET['clave']) ? $clave = $_GET['clave'] : $clave = "" ;
isset($_GET['id_proveedor']) ? $id_proveedor = $_GET['id_proveedor'] : $id_proveedor = "" ;
isset($_GET['idcaso']) ? $idcaso = $_GET['idcaso'] : $idcaso = "" ;

if(isset($_GET['clave']) && isset ($_GET['id_proveedor']) && isset ($_GET['idcaso'])){
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET asignacion_proveedor=now(), contacto='0000-00-00 00:00:00', arribo='0000-00-00 00:00:00', proveedor='$id_proveedor' where contrato='$clave' AND id='$idcaso'";
mysqli_query($link, $sSQL);

$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET proveedor='$id_proveedor' where general='$idcaso'";
mysqli_query($link, $sSQL);


################################
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Provedor where id = '$id_proveedor'");
$nombre=mysqli_result($result,0,"nombre");
$usuario=mysqli_result($result,0,"usuario");
$contrasena=mysqli_result($result,0,"contrasena");
$calle=mysqli_result($result,0,"calle");
$estado=mysqli_result($result,0,"estado");
$municipio=mysqli_result($result,0,"municipio");
$especialidad=mysqli_result($result,0,"especialidad");
$trabajos=mysqli_result($result,0,"trabajos");
$serviciosx=explode(",",$trabajos);
$cobertura=mysqli_result($result,0,"cobertura");
$horario=mysqli_result($result,0,"horario");
$precios=mysqli_result($result,0,"precios");
$sucursales=mysqli_result($result,0,"sucursales");
$contacto=mysqli_result($result,0,"contacto");
$tel=mysqli_result($result,0,"tel");
$fax=mysqli_result($result,0,"fax");
$cel=mysqli_result($result,0,"cel");
$nextel=mysqli_result($result,0,"nextel");
$mail=mysqli_result($result,0,"mail");
$contacto2=mysqli_result($result,0,"contacto2");
$tel2=mysqli_result($result,0,"tel2");
$fax2=mysqli_result($result,0,"fax2");
$cel2=mysqli_result($result,0,"cel2");
$nextel2=mysqli_result($result,0,"nextel2");
$mail2=mysqli_result($result,0,"mail2");
$observaciones=mysqli_result($result,0,"observaciones");
################################


}   
?>



 <html><head>

<link href="style_1.css" rel="stylesheet" type="text/css" />
 </head><body>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><strong>Proveedor asignado</strong> </td>
        <td width="200"><b><a href="asigna_proveedor.php?idcaso=<?php  echo $idcaso; ?>"><font color="#000000">Asignar caso a otro proveedor</font></a></b></td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td><table width="100%%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td width="20%"><strong>Proveedor:</strong></td>
          <td width="80%"><?php  echo $nombre;?></td>
        </tr>
        <tr>
          <td bgcolor="#dddddd"><strong>Especialidad:</strong></td>
          <td bgcolor="#dddddd"><?php  echo $especialidad;?></td>
        </tr>
        <tr>
          <td><strong>Contacto:</strong></td>
          <td><?php  echo $contacto;?></td>
        </tr>
        <tr>
          <td bgcolor="#dddddd"><strong>Tel�fono:</strong></td>
          <td bgcolor="#dddddd"><?php  echo $tel;?></td>
        </tr>
		        <tr>
          <td><strong>Fax:</strong></td>
          <td><?php  echo $fax;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Celular:</strong></td>
          <td bgcolor="#dddddd"><?php  echo $cel;?></td>
        </tr>
		        <tr>
          <td><strong>Nextel:</strong></td>
          <td><?php  echo $nextel;?></td>
        </tr>
                <tr>
          <td><strong>Contacto2:</strong></td>
          <td><?php  echo $contacto2;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Tel�fono:</strong></td>
          <td bgcolor="#dddddd"><?php  echo $tel2;?></td>
        </tr>
		        <tr>
          <td><strong>Fax:</strong></td>
          <td><?php  echo $fax2;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Celular:</strong></td>
          <td bgcolor="#dddddd"><?php  echo $cel2;?></td>
        </tr>
		        <tr>
          <td><strong>Nextel:</strong></td> <td><?php  echo $nextel2;?></td></tr>

      </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
</table>


 
 </body></html>

