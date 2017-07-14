<?php  
error_reporting(E_ALL);
$checa_arrayx=array_search("proveedores",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['id']) ? $id  = $_GET['id'] : $id = null ;
?>

<script type="text/javascript"> 
//below javascript is used for Disabling right-click on HTML page
document.oncontextmenu=new Function("return false");//Disabling right-click


//below javascript is used for Disabling text selection in web page
document.onselectstart=new Function ("return false"); //Disabling text selection in web page
if (window.sidebar){
document.onmousedown=new Function("return false"); 
document.onclick=new Function("return true") ; 


//Disable Cut into HTML form using Javascript 
document.oncut=new Function("return false"); 


//Disable Copy into HTML form using Javascript 
document.oncopy=new Function("return false"); 


//Disable Paste into HTML form using Javascript  
document.onpaste=new Function("return false"); 
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Proveedores</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=proveedores"><td align="right" class="questtitle">B&uacutesqueda: 
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
$result = mysqli_query($db,"SELECT * from Provedor where id = '$id'");
$nombre=mysqli_result($result,0,"nombre");
$usuario=mysqli_result($result,0,"usuario");
$contrasena=mysqli_result($result,0,"contrasena");
$calle=mysqli_result($result,0,"calle");
$colonia=mysqli_result($result,0,"colonia");
$cp=mysqli_result($result,0,"cp");
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
$nextelid=mysqli_result($result,0,"nextelid");
$nextelid2=mysqli_result($result,0,"nextelid2");
$telcasa=mysqli_result($result,0,"telcasa");
$telcasa2=mysqli_result($result,0,"telcasa2");
$mail=mysqli_result($result,0,"mail");
$contacto2=mysqli_result($result,0,"contacto2");
$tel2=mysqli_result($result,0,"tel2");
$fax2=mysqli_result($result,0,"fax2");
$cel2=mysqli_result($result,0,"cel2");
$nextel2=mysqli_result($result,0,"nextel2");
$mail2=mysqli_result($result,0,"mail2");
$banco=mysqli_result($result,0,"banco");
$numcuenta=mysqli_result($result,0,"numcuenta");
$clabe=mysqli_result($result,0,"clabe");
$observaciones=mysqli_result($result,0,"observaciones");
$lastuser=mysqli_result($result,0,"lastuser");
$lastdate=mysqli_result($result,0,"lastdate");
###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query($db2,"SELECT * from Municipio where idMunicipio = '$municipio'");
$municipio=mysqli_result($result2,0,"NombreMunicipio");
###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query($db2,"SELECT * from Estado where idEstado = '$estado'");
$estado=mysqli_result($result2,0,"NombreEstado");
###
$db6 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db6);
$result6 = mysqli_query($db6,"SELECT * from TipoVenta where idVenta = '$tipoVenta'");
$tipoVenta=mysqli_result($result6,0,"nombre") ;

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Proveedor <?php  echo ''.$nombre.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Usuario:</strong> <?php  echo $usuario?></td>

    <td bgcolor="#CCCCCC"><strong>Direcci�n:</strong> <?php  echo ''.$calle.' COL '.$colonia.' CP '.$cp.', '.$municipio.', '.$estado.'';?></td>
    </tr>

  <tr>

    <td valign="top"><strong>Especialidad :</strong> <?php  echo''.$especialidad.''; ?></td>

    <td valign="top"><strong>Horario de atenci&oacute;n:</strong> <?php  echo''.$horario.''; ?></td>
    </tr>

  <tr>

    <td valign="top" bgcolor="#CCCCCC"><strong>Trabajos que realiza:</strong> <p><?php  
	$trabajos=explode(",",$trabajos);
	foreach($trabajos as $chamba){
	
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query($db2,"SELECT * from servicios where id = '$chamba'");
$servicio=mysqli_result($result2,0,"servicio");
echo'<li>'.$servicio.'<br>';	
	
	}

?></td>

    <td valign="top" bgcolor="#CCCCCC"><strong>Area de cobertura:</strong><p> 
	<?php  
$areas_cobertura=explode(",",$cobertura);
sort($areas_cobertura);
foreach($areas_cobertura as $mikarea){
if($mikarea!="" && $mikarea!=" "){
$apart=explode("-",$mikarea);
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Estado where idEstado = '$apart[0]'");
$estado=mysqli_result($result,0,"NombreEstado");
$result = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '$apart[1]'");
$municipio=mysqli_result($result,0,"NombreMunicipio");
echo'<li>'.$estado.' - '.$municipio.' <strong>('.$apart[2].')</strong><br>';
}
}	?></td>
    </tr>
  <tr>
    <td valign="top"><strong>Lista de precios: </strong><?php  echo $precios; ?></td>
    <td valign="top"><strong>Sucursales:</strong> <?php  echo nl2br($sucursales); ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#CCCCCC"><strong>Contacto 1:</strong> <?php  echo $contacto ; ?><br>
	<strong>Tel. Oficina 1:</strong> <?php  echo $tel ; ?><br>
	<strong>Tel. Oficina 2:</strong> <?php  echo $tel2 ; ?><br>
	<strong>Tel. Oficina 3:</strong> <?php  echo $fax2 ; ?><br>
	<strong>Tel / Fax:</strong> <?php  echo $fax ; ?><br>
	<strong>Celular:</strong> <?php  echo $cel ; ?><br>
	<strong>Nextel:</strong> <?php  echo $nextel ; ?><br>
	<strong>ID Nextel:</strong> <?php  echo $nextelid ; ?><br>
	<strong>Tel. Casa:</strong> <?php  echo $telcasa ; ?><br>
	<strong>Email:</strong> <?php  echo $mail ; ?></td>
    <td valign="top" bgcolor="#CCCCCC"><strong>Contacto2:</strong> <?php  echo $contacto2 ; ?><br>
	<strong>Celular:</strong> <?php  echo $cel2 ; ?><br>
	<strong>Nextel:</strong> <?php  echo $nextel2 ; ?><br>
	<strong>ID Nextel:</strong> <?php  echo $nextelid2 ; ?><br>
	<strong>Tel. Casa:</strong> <?php  echo $telcasa2 ; ?><br>
	<strong>Email:</strong> <?php  echo $mail2 ; ?></td>
  </tr>
  <tr>
	<td colspan="2"  valign="top" bgcolor="#CCCCCC">
	<b>Banco:</b><?php  echo $banco; ?><br>
	<b>No. Cuenta:</b><?php  echo $numcuenta; ?><br>
	<b>CLABE:</b><?php  echo $clabe; ?><br>
	</td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><p><strong>Observaciones:</strong></p>
      <p><?php  echo nl2br($observaciones); ?>
      <br /><br />
      <strong>Modificado el: <?php  echo $lastdate; ?> por: <?php  echo $lastuser; ?></strong>
      </p>
      </td>
    </tr>
    
      <tr>
    <td colspan="2" valign="top"><?php  
    echo'<iframe src ="notas_proveedorb.php?&id='.$id.'&popup=1" name="window2" width="100%" marginwidth="50" height="200" marginheight="50" align="30" frameborder="0" id="window2" border="0"></iframe>';
														?>
	</td>
    </tr>
</table>
</td></tr></table>