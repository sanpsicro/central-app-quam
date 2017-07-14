<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 


isset($_POST['id']) ? $id = $_POST['id'] : $id = "" ;
isset($_POST['crt_ajustador']) ? $crt_ajustador= $_POST['crt_ajustador'] : $crt_ajustador= "" ;
isset($_POST['crt_abogado']) ? $crt_abogado= $_POST['crt_abogado'] : $crt_abogado= "" ;
isset($_POST['crt_perito']) ? $crt_perito= $_POST['crt_perito'] : $crt_perito= "" ;
isset($_POST['crt_consignado']) ? $crt_consignado= $_POST['crt_consignado'] : $crt_consignado= "" ;
isset($_POST['juzgado']) ? $juzgado= $_POST['juzgado'] : $juzgado= "" ;
isset($_POST['causa_penal']) ? $causa_penal= $_POST['causa_penal'] : $causa_penal= "" ;
isset($_POST['procesado']) ? $procesado= $_POST['procesado'] : $procesado= "" ;


isset($_GET['flim-flam']) ? $flim_flam= $_GET['flim-flam'] : $flim_flam= "" ;



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

if(isset($_POST['id']) && $_POST['id'] != ""){
$crt_ajustador=utf8_decode($crt_ajustador); 
$crt_abogado=utf8_decode($crt_abogado); 
$crt_perito=utf8_decode($crt_perito); 
$crt_consignado=utf8_decode($crt_consignado); 
$juzgado=utf8_decode($juzgado); 
$causa_penal=utf8_decode($causa_penal); 


$link = mysqli_connect($host,$username,$pass,$database);
$result=mysqli_query($link,"select * from seguimiento_juridico where general = '$id'");
$cuantosson=mysqli_num_rows($result);
mysqli_free_result($result);
if ($cuantosson>0) {
#actualizar registro
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET resp_ajustador='$crt_ajustador', resp_abogado='$crt_abogado', resp_perito='$crt_perito', resp_consignado='$crt_consignado', juzgado='$juzgado', causa_penal='$causa_penal', procesado='$procesado' where general='$id'";
mysqli_query($link, $sSQL);

}
else{
#crear registro
$link = mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `seguimiento_juridico` (general,`resp_ajustador`, `resp_abogado`, `resp_perito`, `resp_consignado`, `juzgado`, `causa_penal`, `procesado`) VALUES ('$id','$crt_ajustador', '$crt_abogado', '$crt_perito', '$crt_consignado', '$juzgado', '$causa_penal', '$procesado')") or die(mysqli_error($link)); 
}
}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '$id'");
if (mysqli_num_rows($result)){ 
$resp_ajustador=mysqli_result($result,0,"resp_ajustador");
$resp_abogado=mysqli_result($result,0,"resp_abogado");
$resp_perito=mysqli_result($result,0,"resp_perito");
$resp_consignado=mysqli_result($result,0,"resp_consignado");
$juzgado=mysqli_result($result,0,"juzgado");
$causa_penal=mysqli_result($result,0,"causa_penal");
$procesado=mysqli_result($result,0,"procesado");
}	  
?>	   
	    <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="25%" bgcolor="#ffffff"><strong>Ajustador:</strong> <?php  echo $resp_ajustador; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Abogado:</strong> <?php  echo $resp_abogado; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Perito:</strong> <?php  echo $resp_perito; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Consignado:</strong> <?php  echo $resp_consignado; ?></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#ffffff"><strong>Juzgado:</strong> <?php  echo $juzgado; ?></td>
      </tr>
    <tr>
      <td colspan="4" bgcolor="#ffffff"><strong>Causa penal: </strong> <?php  echo $causa_penal; ?></td>
      </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Procesado:</strong> <?php  echo $procesado; ?></td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td align="right" bgcolor="#ffffff"><strong>[ <a href="javascript:FAjax('editar_criterio.php?id=<?php  echo $id;?>&flim-flam=new Date().getTime()','criterio','','get');">Editar</a> ]</strong></td>
    </tr>
  </table>