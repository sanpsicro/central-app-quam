<?php  
	
	

$checa_arrayx=array_search("uploadc",$explota_modulos);
if($checa_arrayx===FALSE)
	die("Acceso no autorizado a este modulo");
		
?>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
		<td height="44" align="left">
			<table width=100% cellpadding=0 cellspacing=0>
				<tr>
					<td>
						<span class="maintitle">Importador de Contratos</span>
					</td>					
				</tr>
			</table>
		</td>
<tr><td>

<style type="text/css">

}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
<div id="container">
<div id="form">

<?php  

include 'conf.php';


//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "Archivo ". $_FILES['filename']['name'] ." se publico correctamente." . "</h1>";
		echo "<h2>Contenido:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}

ini_set('auto_detect_line_endings',TRUE);	
$handle = fopen($_FILES['filename']['tmp_name'], "r");
$firstRow = true;


while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$clave = "_";	
/*
$fechaini = date("Y-m-d", strtotime($data[2]));
$fechafin = date("Y-m-d", strtotime($data[3]));
$fechanac = date("Y-m-d", strtotime($data[13]));
*/
$fechaini = $data[2];
$fechafin = $data[3];
$fechanac = $data[13];

		
		$sSQL="INSERT into usuarios_contrato(`id`, `contrato`, `inciso`, `idPoliza`, `tipo_venta`, `fecha_inicio`, `fecha_vencimiento`, `marca`, `modelo`, `tipo`, `color`, `placas`, `serie`, `servicio`, `soloHistorico`, `tmpid`, `nombre`, `parentezco`, `fecha_nacimiento`, `domicilio`, `colonia`, `ciudad`, `municipio`, `estado`, `tel`, `cel`, `nextel`, `mail`, `clave`, `password`, `productos`, `status`, `monto`, `comision`, `ingreso`) values('','$contrato','$data[0]','$idPoliza','$data[1]','$fechaini','$fechafin','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','','','$data[11]','$data[12]','$fechanac','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$contrato$clave$data[0]','$data[23]','$producto','validado','$data[24]','$data[25]','$data[26]')";

$link = mysqli_connect($host,$username,$pass,$database);
mysqli_query($link, $sSQL);
		
	
	
}

ini_set('auto_detect_line_endings',FALSE);

fclose($handle);

	print "\n<br>IMPORTACION REALIZADA CON EXITO";

echo $sSQL;

	//view upload form
}else {

echo $sSQL;

}

?>

</div>
</div>
</td></tr></table>
