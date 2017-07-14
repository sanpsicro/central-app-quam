<?php  
session_start();
$unixid = time(); 
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

isset($_SESSION['valid_userid']) ? $valid_userid = $_SESSION['valid_userid'] : $valid_userid = "" ;
isset($_GET['id']) ? $id = $_GET['id'] : $id = "" ;
isset($_GET['caso']) ? $caso = $_GET['caso'] : $caso = "" ;
isset($_GET['popup']) ? $popup = $_GET['popup'] : $popup = "" ;
isset($_POST['comentario']) ? $comentario = $_POST['comentario'] : $comentario = "" ;

$dbl = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbl);
$resultl = mysqli_query($dbl,"SELECT * from Empleado where idEmpleado='$valid_userid'");
if (mysqli_num_rows($resultl)){ 
$eluserx=mysqli_result($resultl,0,"nombre");
}

$linka = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $linka); 
$resultar = mysqli_query($linka,"SELECT * FROM Provedor where id='$id' LIMIT 1"); 
if (mysqli_num_rows($resultar)){ 
$nombrep=mysqli_result($resultar,0,"nombre");  
}

if($caso == "editar"){
$link =mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
$sSQL="UPDATE notasprov SET fecha='$fecha_a-$fecha_m-$fecha_d', comentario='$comentario' where id='$idnota'";
mysqli_query($link, $sSQL);
if($popup=="0")
	header("Location: mainframe.php?module=notas_proveedor&id=$id");
else
	header("Location: notas_proveedorb.php?id=$id");
}
if($caso == "nuevo"){
$link = mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
mysqli_query($link,"INSERT INTO `notasprov` (`general`, `usuario`, `fecha`, `comentario`) VALUES ('$id', '$valid_userid', now(), '$comentario')"); 


$asunto = 'Reporte Proveedores';

//$destinatario = 'notasproveedor@plataforma-aa.com';
$destinatario1 = 'sdominguez@qualityassist.mx';
$destinatario2 = 'ncontreras@qualityassist.mx';
$destinatario3 = 'amaldonado@qualityassist.mx';



$cuerpo =  '
<html>
<head>
</head>
<body>
<p><strong>
Se ha recibido el reporte de un nuevo proveedor.
<table cellspacing="0" cellpadding="5" border="0" width="650" align="center" bgcolor="#EEEEEE">
<tr>
<td><div align="right">Proveedor:</div></td>
<td>'.$nombrep.'</td>
</tr>
<tr>
<td><div align="right">Usuario que reporta:</div></td>
<td>'.$eluserx.'</td>
</tr>
<tr>
<td><div align="right">Comentario:</div></td>
<td>'.$comentario.'</td>
</tr>
</table>
<br /><br />


</strong></p>
</body>
</html>
';
	   $nombre = '=?UTF-8?B?'.base64_encode("Reporte de Proveedores").'?=';
       $headers = "MIME-Version: 1.0\r\n";
       $headers .= "Content-type: text/html; charset=UTF-8\r\n";
       $headers .= "From: ".$nombre." <reporteproveedores@americanassist.com>\r\n";
	 
       //mail($destinatario,$asunto,$cuerpo,$headers);
       mail($destinatario1,$asunto,$cuerpo,$headers);
       mail($destinatario2,$asunto,$cuerpo,$headers);
       mail($destinatario3,$asunto,$cuerpo,$headers);





if($popup=="0"){
	if(!empty($from_seguimiento))
		header("Location: mainframe.php?module=detail_seguimiento&id=$id");
	else
		header("Location: mainframe.php?module=notas_proveedor&id=$id");
}
else
	header("Location: notas_proveedorb.php?id=$id");
}

if($caso == "borrar"){
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From notasprov Where id ='$idnota' and general='$id'";
mysqli_query($link,$sSQL);
if($popup=="0")
	header("Location: mainframe.php?module=notas_proveedor&id=$id");
else
	header("Location: notas_proveedorb.php?id=$id");
}
?>