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
$db = mysqli_connect($host,$username,$pass,$database);


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
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Poliza where numPoliza = '$contrato'");
$idPoliza=mysqli_result($result,0,"idPoliza");
$producto=mysqli_result($result,0,"productos");
$resultX = mysqli_query("SELECT inciso from usuarios_contrato where idPoliza = '$idPoliza' order by inciso desc LIMIT 1",$db);
if (mysqli_num_rows($resultX)) { 
$ultimoinciso=mysqli_result($resultX,0,"inciso");
} else { $ultimoinciso="SIN INCISOS";  }





if (empty($idPoliza)) {
	
	print "$contrato: Contrato no existente. <a href='?module=importador'>REGRESAR</a><br />\n";
	
	}

else {

	print "Seleccione el archivo a publicar<br />\n";

	print "Ultimo inciso: $ultimoinciso<br />\n";

	print "<form enctype='multipart/form-data' action='?module=importador2' method='post'>";

	print "Archivo:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";
	print "<input type='hidden' name='contrato' value='$contrato'>";
	print "<input type='hidden' name='inciso' value='$ultimoinciso'>";
	print "<input type='hidden' name='idPoliza' value='$idPoliza'>";
	print "<input type='hidden' name='producto' value='$producto'>";
	print "<input type='submit' name='submit' value='Importar'></form>";
}


?>

</div>
</div>
</td></tr></table>
