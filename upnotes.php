<?php 
session_start();
$unixid = time(); 

isset($_GET['caso']) ? $caso = $_GET['caso'] : $caso ="" ;
isset($_GET['id']) ? $id = $_GET['id'] : $id ="" ;
isset($_GET['idnota']) ? $idnota = $_GET['idnota'] : $idnota ="" ;

isset($_POST['general']) ? $general= $_POST['general'] : $general="" ;
isset($_POST['etapa']) ? $etapa= $_POST['etapa'] : $etapa="" ;
isset($_POST['tipo']) ? $tipo= $_POST['tipo'] : $tipo="" ;
isset($_POST['comentario']) ? $comentario= $_POST['comentario'] : $comentario="" ;
isset($_POST['file1']) ? $archivo1= $_POST['file1'] : $archivo1="" ;
isset($_POST['file2']) ? $archivo2= $_POST['file2'] : $archivo2="" ;
isset($_POST['file3']) ? $archivo3= $_POST['file3'] : $archivo3="" ;
isset($_POST['file4']) ? $archivo4= $_POST['file4'] : $archivo4="" ;

isset($_POST['fecha_a']) ? $fecha_a= $_POST['fecha_a'] : $fecha_a="" ;
isset($_POST['fecha_m']) ? $fecha_m= $_POST['fecha_m'] : $fecha_m="" ;
isset($_POST['fecha_d']) ? $fecha_d= $_POST['fecha_d'] : $fecha_d="" ;




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

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$archivo1=mysqli_result($result,0,"adjunto1");
$archivo2=mysqli_result($result,0,"adjunto2");
$archivo3=mysqli_result($result,0,"adjunto3");
$archivo4=mysqli_result($result,0,"adjunto4");
}
}

if(isset($file1) && $file1!="" && $file1!=" "){
if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$exfile1=mysqli_result($result,0,"adjunto1");
if($exfile1!="" && $exfile1!=" "){
$predel="proveedores/adjuntos/".$exfile1."";
unlink($predel);
}
}
}


$file_1_name_b=trim($file1_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file1,"proveedores/adjuntos/$nuevonombre")){$archivo1=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file2) && $file2!="" && $file2!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$exfile2=mysqli_result($result,0,"adjunto2");
if($exfile2!="" && $exfile2!=" "){
$predel="proveedores/adjuntos/".$exfile2."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file2_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file2,"proveedores/adjuntos/$nuevonombre")){$archivo2=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file3) && $file3!="" && $file3!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$exfile3=mysqli_result($result,0,"adjunto3");
if($exfile3!="" && $exfile3!=" "){
$predel="proveedores/adjuntos/".$exfile3."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file3_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file3,"proveedores/adjuntos/$nuevonombre")){$archivo3=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file4) && $file4!="" && $file4!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$exfile4=mysqli_result($result,0,"adjunto4");
if($exfile4!="" && $exfile4!=" "){
$predel="proveedores/adjuntos/".$exfile4."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file4_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file4,"proveedores/adjuntos/$nuevonombre")){$archivo4=$nuevonombre; $unixid=$unixid+1;
}
}


if($caso == "editar"){
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE notas_legal SET fecha='$fecha_a-$fecha_m-$fecha_d', etapa='$etapa', tipo='$tipo', comentario='$comentario', adjunto1='$archivo1', adjunto2='$archivo2', adjunto3='$archivo3', adjunto4='$archivo4' where id='$idnota'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}
if($caso == "nuevo"){
$link = mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `notas_legal` (`general`, `fecha`, `etapa`, `tipo`, `comentario`, `adjunto1`, `adjunto2`, `adjunto3`, `adjunto4`) VALUES ('$id', '$fecha_a-$fecha_m-$fecha_d', '$etapa', '$tipo', '$comentario', '$archivo1', '$archivo2', '$archivo3', '$archivo4')") or die(mysqli_error($link)); 
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}

if($caso == "borrar"){

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notas_legal where id='$idnota' and general = '$id'");
if (mysqli_num_rows($result)){ 
$exfile1=mysqli_result($result,0,"adjunto1");
$exfile2=mysqli_result($result,0,"adjunto2");
$exfile3=mysqli_result($result,0,"adjunto3");
$exfile4=mysqli_result($result,0,"adjunto4");
if($exfile1!="" && $exfile1!=" "){
$predel="proveedores/adjuntos/".$exfile1."";
unlink($predel);
}
if($exfile2!="" && $exfile2!=" "){
$predel2="proveedores/adjuntos/".$exfile2."";
unlink($predel2);
}
if($exfile3!="" && $exfile3!=" "){
$predel3="proveedores/adjuntos/".$exfile3."";
unlink($predel3);
}
if($exfile4!="" && $exfile4!=" "){
$predel4="proveedores/adjuntos/".$exfile4."";
unlink($predel4);
}
}

$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From notas_legal Where id ='$idnota' and general='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}
?>