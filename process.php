<?php
session_start();
set_time_limit(300);
ob_start();

if ( isset( $_SESSION["valid_user"] ) && isset($_SESSION["valid_modulos"] ) && isset($_SESSION["valid_permisos"] ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>
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
 
// from admin_contratos
isset($_POST['tmpid']) ? $tmpid = $_POST['tmpid'] : $tmpid = 0 ;
isset($_POST['cliente']) ? $cliente = $_POST['cliente'] : $cliente = 0 ;
isset($_POST['rfc']) ? $rfc = $_POST['rfc'] : $rfc = "" ;


if(isset($_POST['numcontrato']) && $_POST['numcontrato']!= "") { $numcontrato = $_POST['numcontrato'];}elseif(isset($_GET['numcontrato'])){$numcontrato = $_GET['numcontrato'];}else{$numcontrato=0;}


isset($_POST['producto']) ? $producto = $_POST['producto'] : $producto = "" ;
isset($_GET['idPoliza']) ? $idPoliza = $_GET['idPoliza'] : $idPoliza = "" ;
// admin_contratos 
 isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null;
 isset($_GET['idCliente']) ? $idCliente = $_GET['idCliente'] : $idCliente = null;
 isset($_GET['module']) ? $module = $_GET['module'] : $module = null;
 
 isset($_POST['modules_auth']) ? $modules_auth = $_POST['modules_auth'] : $modules_auth = null;
 isset($_POST['permi']) ? $permi = $_POST['permi'] : $permi = null;
 isset($_POST['usuario']) ? $usuario = $_POST['usuario'] : $usuario = null;
 isset($_POST['rfc']) ? $rfc = $_POST['rfc'] : $rfc = 0;
 isset($_POST['contacto']) ? $contacto = $_POST['contacto'] : $contacto = null;
 isset($_POST['calle']) ? $calle = $_POST['calle'] : $calle = 0;
 isset($_POST['calle2']) ? $calle2 = $_POST['calle2'] : $calle2 = 0;
 isset($_POST['numero']) ? $numero = $_POST['numero'] : $numero = null;
 isset($_POST['numero2']) ? $numero2 = $_POST['numero2'] : $numero2 = null;
 isset($_POST['ciudad']) ? $ciudad = $_POST['ciudad'] : $ciudad = null;
 isset($_POST['ciudad2']) ? $ciudad2 = $_POST['ciudad2'] : $ciudad2 = null;
 isset($_POST['telefonooficina']) ? $telefonooficina= $_POST['telefonooficina'] : $telefonooficina= 0;
 isset($_POST['fax']) ? $fax = $_POST['fax'] : $fax = null;
 isset($_POST['telnextel']) ? $telnextel = $_POST['telnextel'] : $telnextel = 0;
 
 isset($_POST['email']) ? $email = $_POST['email'] : $email = null;
 isset($_POST['usuario']) ? $usuario = $_POST['usuario'] : $usuario = null;
 
 
 
 //cuidar los valores numericos, no poner null sino 0
 isset($_POST['idem']) ? $idem= $_POST['idem'] : $idem = null;
 isset($_POST['contrasena']) ? $contrasena = $_POST['contrasena'] : $contrasena= null;
 isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = null;
 isset($_POST['cargo']) ? $cargo = $_POST['cargo'] : $cargo = null;
 isset($_POST['departamento']) ? $departamento = $_POST['departamento'] : $departamento = null;
 isset($_POST['direccion']) ? $direccion = $_POST['direccion'] : $direccion = null;
 isset($_POST['estado']) ? $estado = $_POST['estado'] : $estado = 0;
 isset($_POST['estado2']) ? $estado2 = $_POST['estado2'] : $estado2 = 0;
 isset($_POST['monto']) && $_POST['monto'] != "" ? $monto = $_POST['monto'] : $monto = 0;
 isset($_POST['factura']) ? $factura = $_POST['factura'] : $factura = 0;
 isset($_POST['comision']) && $_POST['comision'] != "" ? $comision = $_POST['comision'] : $comision = '0';
 isset($_POST['municipio']) ? $municipio= $_POST['municipio'] : $municipio = 0;
 isset($_POST['municipio2']) ? $municipio2= $_POST['municipio2'] : $municipio2 = 0;
 isset($_POST['colonia']) ? $colonia = $_POST['colonia'] : $colonia = 0;
 isset($_POST['colonia2']) ? $colonia2 = $_POST['colonia2'] : $colonia2 = 0;
 isset($_POST['extension']) ? $extension = $_POST['extension'] : $extension = null;
 isset($_POST['telefonocasa']) ? $telefonocasa = $_POST['telefonocasa'] : $telefonocasa = null;
 isset($_POST['telefonocelular']) ? $telefonocelular = $_POST['telefonocelular'] : $telefonocelular = null;
 isset($_POST['idnextel']) ? $idnextel= $_POST['idnextel'] : $idnextel= null;
 isset($_POST['nextel']) ? $nextel= $_POST['nextel'] : $nextel = null;
 isset($_POST['email']) ? $email= $_POST['email'] : $email = null;
 isset($_POST['activo']) ? $activo = $_POST['activo'] : $activo = null;
 isset($_POST['tipocliente']) ? $tipocliente = $_POST['tipocliente'] : $tipocliente = 0;
 isset($_POST['tipoventa']) ? $tipoventa = $_POST['tipoventa'] : $tipoventa = 0;
 isset($_POST['vendedor']) ? $vendedor = $_POST['vendedor'] : $vendedor = null;
 
 
 //from admin_servicios (and some frmo admin_productos)
 isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null ;
 isset($_GET['id']) ? $id = $_GET['id'] : $id = null ;
 isset($_POST['servicios']) ? $servicios = $_POST['servicios'] : $servicios = null ;
 isset($_POST['tipo']) ? $tipo = $_POST['tipo'] : $tipo = null ;
 isset($_POST['servicio']) ? $servicio = $_POST['servicio'] : $servicio = null ;
 
 //from admin_productos
 isset($_POST['numeventos']) ? $numeventos = $_POST['numeventos'] : $numeventos = null ;
 isset($_POST['terminos']) ? $terminos = $_POST['terminos'] : $terminos = null ;
 
 //from usuarios_contrato 
 isset($_POST['fecha_inicio']) ? $fecha_inicio = $_POST['fecha_inicio'] : $fecha_inicio = null ;
 isset($_POST['fecha_vencimiento']) ? $fecha_vencimiento = $_POST['fecha_vencimiento'] : $fecha_vencimiento = null ;
 isset($_POST['fecha_a']) ? $fecha_a = $_POST['fecha_a'] : $fecha_a = null ;
 isset($_POST['fecha_d']) ? $fecha_d = $_POST['fecha_d'] : $fecha_d = null ;
 isset($_POST['fecha_m']) ? $fecha_m = $_POST['fecha_m'] : $fecha_m = null ;
 isset($_POST['domicilio']) ? $domicilio = $_POST['domicilio'] : $domicilio = null ;
 
 
 
 //from usuarios_contrato
 isset($_POST['marca']) ? $marca = $_POST['marca'] : $marca = null ;
 isset($_POST['modelo']) ? $modelo = $_POST['modelo'] : $modelo = null ;
 isset($_POST['serie']) ? $serie = $_POST['serie'] : $serie = null ;
 isset($_POST['color']) ? $color = $_POST['color'] : $color = null ;
 isset($_POST['placas']) ? $placas = $_POST['placas'] : $placas = null ;
 isset($_POST['tel']) ? $tel = $_POST['tel'] : $tel = null ;
 isset($_POST['cel']) ? $cel = $_POST['cel'] : $cel = null ;
 isset($_POST['mail']) ? $mail = $_POST['mail'] : $mail = null ;
 
 //from cabina_d
 isset($_GET['idcaso']) ? $idcaso = $_GET['idcaso'] : $idcaso = null ;
 
#----------------
if($module=="usuarios"){ 
if(count($modules_auth)!="0" && $modules_auth!=" " && $modules_auth!=""){$modulos_enlatados=implode(",",$modules_auth);}
else{$modulos_enlatados="";}
if(count($permi)!="0" && $permi!=" " && $permi!=""){$permisos_enlatados=implode(",",$permi);}
else{$permisos_enlatados="";}

if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","´");

}



if(isset($accela) && $accela=="new"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from Empleado where usuario = '".$usuario."'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=".$module."&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `Empleado` ( `usuario`, `contrasena`, `nombre`, `cargo`, `idDepartamento`, `direccion`, `estado`, `municipio`, `colonia`, `extension`, `telefonoCasa`, `telefonoCelular`, `nextel`, `idnextel`, `email`, `tipo`, `modules`, `permisos`, `activo`) 

VALUES ('".$usuario."', '$contrasena', '$nombre', '$cargo', '$departamento', '$direccion', '$estado', '$municipio', '$colonia', '$extension', '$telefonocasa', '$telefonocelular', '$nextel', '$idnextel', '$email', '$tipo', '$modulos_enlatados', '$permisos_enlatados', '$activo')"); 

header("Location: mainframe.php?module=".$module."&code=1");

}

#=====



if(isset($accela) && $accela=="edit"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from Empleado where usuario = '".$usuario."' AND idEmpleado!='".$idEmpleado."'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Empleado SET usuario='$usuario', contrasena='$contrasena', nombre='$nombre', cargo='$cargo', idDepartamento='$departamento', direccion='$direccion', estado='$estado', municipio='$municipio', colonia='$colonia', extension='$extension', telefonoCasa='$telefonocasa', telefonoCelular='$telefonocelular', nextel='$nextel', idnextel='$idnextel', email='$email', tipo='$tipo', modules='$modulos_enlatados', permisos='$permisos_enlatados', activo='$activo' where idEmpleado='$idEmpleado'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From Empleado Where idEmpleado ='$idEmpleado'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}

}

################################################################################


#----------------
if($module=="usuariosws"){ 
	
	isset($_GET['idusuario']) ? $idusuario= $_GET['idusuario'] : $idusuario= "" ;
	
	
	isset($_POST['usuario']) ? $usuario= $_POST['usuario'] : $usuario= "" ;
	isset($_POST['contrasena']) ? $contrasena= $_POST['contrasena'] : $contrasena= "" ;
	isset($_POST['nombre']) ? $nombre= $_POST['nombre'] : $nombre= "" ;
	isset($_POST['email']) ? $email= $_POST['email'] : $email= "" ;
	isset($_POST['contrato1']) ? $contrato1= $_POST['contrato1'] : $contrato1= "" ;
	isset($_POST['contrato2']) ? $contrato2= $_POST['contrato2'] : $contrato2= "" ;
	isset($_POST['contrato3']) ? $contrato3= $_POST['contrato3'] : $contrato3= "" ;
	isset($_POST['contrato4']) ? $contrato4= $_POST['contrato4'] : $contrato4= "" ;
	isset($_POST['contrato5']) ? $contrato5= $_POST['contrato5'] : $contrato5= "" ;
	isset($_POST['activo']) ? $activo= $_POST['activo'] : $activo= "" ;
	
	
if(count($modules_auth)!="0" && $modules_auth!=" " && $modules_auth!=""){$modulos_enlatados=implode(",",$modules_auth);}
else{$modulos_enlatados="";}
if(count($permi)!="0" && $permi!=" " && $permi!=""){$permisos_enlatados=implode(",",$permi);}
else{$permisos_enlatados="";}

if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","�");

}



if(isset($accela) && $accela=="new"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from webservice where usuario = '$usuario'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `webservice` ( `usuario`, `contrasena`, `nombre`, `email`, `contrato1`, `contrato2`, `contrato3`, `contrato4`, `contrato5`, `activo`) 

VALUES ('$usuario', '$contrasena', '$nombre', '$email', '$contrato1', '$contrato2', '$contrato3', '$contrato4', '$contrato5', '$activo')"); 

header("Location: mainframe.php?module=$module&code=1");

}

#=====



if(isset($accela) && $accela=="edit"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from webservice where usuario = '$usuario' AND idusuario!='$idusuario'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE webservice SET usuario='$usuario', contrasena='$contrasena', nombre='$nombre', email='$email', contrato1='$contrato1', contrato2='$contrato2', contrato3='$contrato3', contrato4='$contrato4', contrato5='$contrato5', activo='$activo' where idusuario='$idusuario'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From webservice Where idusuario ='$idusuario'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}

}

################################################################################


#----------------
if($module=="quicktips"){ 

isset($_GET['id']) ?  $id= $_GET['id'] : $id= "" ;

isset($_POST['titulo']) ? $titulo= $_POST['titulo'] : $titulo= "" ;
isset($_POST['mensaje']) ? $mensaje= $_POST['mensaje'] : $mensaje= "" ;
isset($_POST['activo']) ? $activo= $_POST['activo'] : $activo= "" ;
isset($_POST['icon']) ? $icon= $_POST['icon'] : $icon= "" ;
isset($_POST['visto']) ? $visto= $_POST['visto'] : $visto= "" ;

if(isset($accela) && $accela=="new"){





$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `quicktips` ( `titulo`, `mensaje`, `icono`, `visto`, `activo`) 

VALUES ('$titulo', '$mensaje', '$icon', '$visto', '$activo')"); 

header("Location: mainframe.php?module=$module");

}

#=====



if(isset($accela) && $accela=="edit"){







$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE quicktips SET titulo='$titulo', mensaje='$mensaje', icono='$icon', visto='$visto', activo='$activo' where id='$id'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module");

}



#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From quicktips Where id ='$id'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}

}

################################################################################

#----------------
if($module=="chat"){ 

if(isset($accela) && $accela=="active"){


$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `chatstat` (`gr`, `status`, `atendido`) 

VALUES ('$id', 2, 1)"); 

header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=3");

}

#=====



if(isset($accela) && $accela=="reactive"){



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE chatstat SET status=2 where gr=$id";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=3");

}

#======

if(isset($accela) && $accela=="deactive"){



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE chatstat SET status=1 where gr=$id";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=3");

}


}



################################################################################

#----------------
if($module=="enviasms1"){ 

if(isset($gr)){

require('twilio/Services/Twilio.php'); 
 
$account_sid = 'AC3048129fd0b1bb1c671c85f6125f15fc'; 
$auth_token = 'd28ff46a069b4e16057677cc2da8764d'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$client->account->messages->create(array( 
	'To' => $to, 
	'From' => "+18326123789", 
	'Body' => $body,   
));

header("Location: mainframe.php?module=detail_seguimiento&id=$gr&current=3");

}

}



################################################################################

#----------------
if($module=="enviasms2"){ 

if(isset($gr)){

require('twilio/Services/Twilio.php'); 
 
$account_sid = 'AC3048129fd0b1bb1c671c85f6125f15fc'; 
$auth_token = 'd28ff46a069b4e16057677cc2da8764d'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$client->account->messages->create(array( 
	'To' => $to, 
	'From' => "+18326123789", 
	'Body' => $body, 
));

header("Location: mainframe.php?module=detail_seguimiento&id=$gr&current=5");

}

}



################################################################################

#----------------
if($module=="capacitacion"){ 
	
isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "" ;	
isset($_POST['idpermi']) ? $idpermi= $_POST['idpermi'] : $idpermi= "" ;	
isset($_POST['icon']) ? $icon= $_POST['icon'] : $icon= "" ;	
isset($_POST['activo']) ? $activo= $_POST['activo'] : $activo= "" ;	


isset($_GET['capid']) ? $capid= $_GET['capid'] : $capid= "" ;	
isset($_GET['parent']) ? $parent= $_GET['parent'] : $parent= "" ;	



if(isset($accela) && $accela=="new"){


$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `modcap` (`nombre`, `ico`, `parent`, `activo`) 

VALUES ('$nombre', '$icon', '$parent', '$activo')"); 

header("Location: mainframe.php?module=$module");

}

#=====



if(isset($accela) && $accela=="edit"){



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE modcap SET nombre='$nombre', ico='$icon', activo='$activo' where cid='$capid'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=carpetas&capid=$capid");

}

#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From modcap Where cid ='$capid'";
$sSQL2="Delete From modcap Where parent ='$capid'";
$sSQL3="Delete From modcont Where capid ='$capid'";
mysqli_query($link,$sSQL);
mysqli_query($link,$sSQL2);
mysqli_query($link,$sSQL3);

header("Location: mainframe.php?module=$module");

}



}

################################################################################

#----------------
if($module=="carpetas"){ 

if(isset($accela) && $accela=="new"){


$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `modcont` (`capid`, `titulo`, `tipo`, `contenido`, `archivo`, `fecha`, `activo`) 

VALUES ('$capid', '$titulo', '$tipo', '$contenido', '$archivo', now(), '$activo')"); 


 $link= mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbl);
$resultl = mysqli_query($link,"SELECT nombre from modcap where cid='$capid'");
if (mysqli_num_rows($resultl)){ 
$carpeta=mysqli_result($resultl,0,"nombre");
}

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT email FROM Empleado where (permisos LIKE '%$capid,%' OR permisos LIKE '%cap_a,%') AND activo=1 AND email LIKE '%@%' order by email desc"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  $destinatario=$row["email"];
  
  
  $asunto = 'Contenido agregado en '.$carpeta.'';


$cuerpo =  '
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<body>
<p>
Se ha agregado un nuevo contenido en la carpeta <strong>'.$carpeta.'</strong> con el t&iacute;tulo: <strong>'.$titulo.'</strong></p>
</body>
</html>
';
	   $nombre = '=?UTF-8?B?'.base64_encode("Reporte de Proveedores").'?=';
       $headers = "MIME-Version: 1.0\r\n";
       $headers .= "Content-type: text/html; charset=UTF-8\r\n";
       $headers .= "From: PLATAFORMA-AA <plataforma@plataforma-aa.com>\r\n";
	 
       mail($destinatario,$asunto,$cuerpo,$headers);


  
  
  }}


header("Location: mainframe.php?module=$module&capid=$capid");

}

#=====



if(isset($accela) && $accela=="edit"){



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE modcont SET titulo='$titulo', tipo='$tipo', contenido='$contenido', archivo='$archivo', activo='$activo' where id='$contid'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&capid=$capid");

}

#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From modcont Where id ='$contid'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&capid=$capid");

}



}

################################################################################

#----------------
if($module=="accesocl"){ 
if(count($modules_auth)!="0" && $modules_auth!=" " && $modules_auth!=""){$modulos_enlatados=implode(",",$modules_auth);}
else{$modulos_enlatados="";}
if(count($permicl)!="0" && $permicl!=" " && $permicl!=""){$permicl_enlatados=implode(",",$permicl);}
else{$permicl_enlatados="";}

if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","�");

}



if(isset($accela) && $accela=="new"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from accesocl where usuario = '$usuario'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `accesocl` ( `usuario`, `contrasena`, `nombre`, `email`, `contrato1`, `contrato2`, `contrato3`, `contrato4`, `contrato5`, `permisos`, `activo`) 

VALUES ('$usuario', '$contrasena', '$nombre', '$email', '$contrato1', '$contrato2', '$contrato3', '$contrato4', '$contrato5', '$permicl_enlatados','$activo')"); 

header("Location: mainframe.php?module=$module&code=1");

}

#=====



if(isset($accela) && $accela=="edit"){



##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from accesocl where usuario = '$usuario' AND idusuario!='$idusuario'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE accesocl SET usuario='$usuario', contrasena='$contrasena', nombre='$nombre', email='$email', contrato1='$contrato1', contrato2='$contrato2', contrato3='$contrato3', contrato4='$contrato4', contrato5='$contrato5', permisos='$permicl_enlatados', activo='$activo' where idusuario='$idusuario'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From accesocl Where idusuario ='$idusuario'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}

}


################################################################################


if($module=="clientes"){ 



if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","´");

}



if(isset($accela) && $accela=="new"){

/*

##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from Cliente where usuario = '$usuario'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion
*/

if($idem=="si"){

$calle2=$calle;

$numero2=$numero;

$colonia2=$colonia;

$ciudad2=$ciudad;

$municipio2=$municipio;

$estado2=$estado;

}



$link= mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `Cliente` ( `idEmpleado`, `usuario`, `contrasena`, `nombre`, `rfc`, `contacto`, `fisCalle`, `fisNumero`, `fisColonia`, `fisCiudad`, `fisMunicipio`, `fisEstado`, `calle`, `numero`, `colonia`, `ciudad`, `municipio`, `estado`, `telefonoCasa`, `telefonoOficina`, `fax`, `extension`, `telefonoCelular`, `nextel`, `TelNextel`, `email`, `status`, `tipocliente`) 

		VALUES ('$vendedor', '$usuario', '$contrasena', '$nombre', '$rfc', '$contacto', '$calle2', '$numero2', '$colonia2', '$ciudad2', '$municipio2', '$estado2', '$calle', '$numero', '$colonia', '$ciudad', '$municipio', '$estado', '$telefonocasa', '$telefonooficina', '$fax', '$extension', '$telefonocelular', '$nextel', '$telnextel', '$email', 'no validado', '$tipocliente')" ) or die(mysqli_error($link));



$idCliente=mysqli_insert_id($link) or die(mysqli_error($link));  



header("Location: mainframe.php?module=clientes_alta&idCliente=$idCliente&code=1");



}

#=====



if(isset($accela) && $accela=="edit"){


/*
##startcomprobacion

$link = mysqli_connect($host,$username,$pass,$database);

$result=mysqli_query($link,"select * from Cliente where usuario = '$usuario' AND idCliente!='$idCliente'");

$cuantosson=mysqli_num_rows($result);

mysqli_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion

*/

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Cliente SET idEmpleado='$vendedor', usuario='$usuario', contrasena='$contrasena', nombre='$nombre', rfc='$rfc', contacto='$contacto', fisCalle='$calle2', fisNumero='$numero2', fisColonia='$colonia2', fisCiudad='$ciudad2', fisMunicipio='$municipio2', fisEstado='$estado2', calle='$calle', numero='$numero', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', telefonoCasa='$telefonocasa', telefonoOficina='$telefonooficina', fax='$fax', extension='$extension', telefonoCelular='$telefonocelular', nextel='$nextel', TelNextel='$telnextel', email='$email', tipocliente='$tipocliente' where idCliente='$idCliente'";

 mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="Delete From Cliente Where idCliente ='$idCliente'";

mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}





if($accela=="update"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Cliente SET status='validado' where idCliente='$idCliente'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&code=2");

}

}









################################################################################
if($module=="usuarios_contrato"){ 


if($accela=="new" or $accela=="edit"){
$fecha1expre=explode(" ",$fecha_inicio);
$fecha1ex=explode("-",$fecha1expre[0]);

if($fecha_vencimiento!=""){
$fecha2expre=explode(" ",$fecha_vencimiento);
$fecha2ex=explode("-",$fecha2expre[0]);
}else{
	$fecha2expre=explode(" ","00-00-00");
	$fecha2ex=explode("-",$fecha2expre[0]);
}

$ingreso=($monto-$comision);
}


if(isset($accela) && $accela=="new"){
/*
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";
$condicion="where idPoliza = '$idPoliza'";
}
else{$condicion="where tmpid='$tmpid'";}
*/

if($tipocliente=="1"){
##startcomprobacion
$link = mysqli_connect($host,$username,$pass,$database);
$result=mysqli_query($link,"select * from usuarios_contrato where contrato='$numcontrato'");
$cuantosson=mysqli_num_rows($result);
mysqli_free_result($result);
if ($cuantosson>0) {
#header("Location: mainframe.php?module=$module&code=4");
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=5&tipocliente=$tipocliente&idCliente=$idCliente");
die();
}
##endcomprobacion
}


##startcomprobacion_subnumero
// $link = mysqli_connect($host,$username,$pass,$database);
// $result=mysqli_query($link,"select * from usuarios_contrato where contrato='$numcontrato'");
// $numusers=mysqli_num_rows($result);
// mysqli_free_result($result);
// $inciso=$numusers+1;

//
// Reparacion consecutivo incisos
//
$link = mysqli_connect($host,$username,$pass,$database);
$numero=mysqli_query($link,"SELECT inciso as maximoInciso FROM usuarios_contrato WHERE contrato='$numcontrato' ORDER BY inciso DESC LIMIT 1");
if(mysqli_num_rows($numero))
{
	$incisoAnterior=mysqli_result($numero,0,"maximoInciso");
	$inciso = $incisoAnterior + 1;
}
else{
	$inciso = 1;}
##endcomprobacion_subnumero

$clave="".$numcontrato."_".$inciso."";
$password="".$fecha_d."".$fecha_m."".$fecha_a."";

$separador="-";
//se quito .$fecha2expre[1] de values
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `usuarios_contrato` ( `contrato`, `inciso`, `idPoliza`, `tipo_venta`, `fecha_inicio`, `fecha_vencimiento`, `marca`, `modelo`, `tipo`, `color`, `placas`, `serie`, `servicio`, `nombre`, `fecha_nacimiento`, `domicilio`, `colonia`, `ciudad`, `municipio`, `estado`, `tel`, `cel`, `nextel`, `mail`, `clave`, `password`, `status`, `monto`, `comision`, `ingreso`) 
		VALUES ('$numcontrato', '$inciso', '$idPoliza', '$tipoventa', '$fecha1ex[2]-$fecha1ex[1]-$fecha1ex[0] $fecha1expre[1]', '$fecha2ex[2]$separador$fecha2ex[1]$separador$fecha2ex[0]$fecha2expre[1]', '$marca', '$modelo', '$tipo', '$color', '$placas', '$serie', '$servicio', '$nombre', '$fecha_a-$fecha_m-$fecha_d',  '$domicilio', '$colonia', '$ciudad', '$municipio', '$estado', '$tel', '$cel', '$nextel', '$mail', '$clave', '$password', 'no validado', '$monto', '$comision', '$ingreso')") or die(mysqli_error($link));
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=1&tipocliente=$tipocliente&idCliente=$idCliente");
}
#=====
if(isset($accela) && $accela=="edit"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', tipo_venta='$tipoventa', fecha_inicio='$fecha1ex[2]-$fecha1ex[1]-$fecha1ex[0] $fecha1expre[1]', fecha_vencimiento='$fecha2ex[2]-$fecha2ex[1]-$fecha2ex[0] $fecha2expre[1]', marca='$marca', modelo='$modelo', tipo='$tipo', color='$color', placas='$placas', serie='$serie', servicio='$servicio', nombre='$nombre', fecha_nacimiento='$fecha_a-$fecha_m-$fecha_d', domicilio='$domicilio', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', tel='$tel', cel='$cel', nextel='$nextel', mail='$mail', monto='$monto', comision='$comision', ingreso='$ingreso' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=2&tipocliente=$tipocliente&idCliente=$idCliente");
}

#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From usuarios_contrato Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=3&tipocliente=$tipocliente&idCliente=$idCliente");
}



#=====
if(isset($accela) && $accela=="cancel"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET status='cancelado posterior' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=2&tipocliente=$tipocliente&idCliente=$idCliente");
}

#=====

}
################################################################################

if($module=="beneficiarios"){ 
if(isset($accela) && $accela=="new"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";
$condicion="where idPoliza = '$idPoliza'";
}
else{$condicion="where tmpid='$tmpid'";}

$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `Beneficiario` ( `idPoliza`, `nombre`, `edad`, `parentesco`, `tmpid`) 
VALUES ('$idPoliza', '$nombre', '$edad', '$parentesco', '$tmpid')");
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=1&tipocliente=$tipocliente");
}
#=====
if(isset($accela) && $accela=="edit"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE Beneficiario SET idPoliza='$idPoliza', nombre='$nombre', edad='$edad', parentesco='$parentesco', tmpid='$tmpid' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=2&tipocliente=$tipocliente");
}

#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From Beneficiario Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=3&tipocliente=$tipocliente");
}
}
################################################################################




if($module=="contratos"){ 


if($accela=="cancela"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Poliza SET status='cancelado' where idPoliza='$idPoliza'";
mysqli_query($link, $sSQL);

/*
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysqli_query($link, $sSQL);
*/

header("Location: mainframe.php?module=$module&code=2");
}

if($accela=="new" or $accela=="edit"){
if($factura=="1"){} else{$factura="0";}
$ingreso=($monto-$comision);
}

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `Poliza` ( `idCliente`, `idEmpleado`, `fechaCaptura`, `numPoliza`, `tipoCliente`, `tipoVenta`, `factura`, `monto`, `comision`, `ingreso`, `productos`,subpolizas, `status`, `usuario`, `password`) 
VALUES ('$cliente', '$vendedor', now(), '$numcontrato', '$tipocliente', '$tipoventa', '$factura', '$monto', '$comision', '$ingreso', '$producto',0, 'no validado', '$numcontrato', '$rfc')");
$idPoliza=mysqli_insert_id($link) or die(mysqli_error($link));   // se agrego $link  
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysqli_query($link,$sSQL) or die(var_dump($producto)); // actualiza usuarios_contrato

$link= mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$resultz = mysqli_query($link,"SELECT * from Empleado where idEmpleado = '$vendedor'");
$consecutivo=mysqli_result($resultz,0,"indexPoliza");
$consecutivo=($consecutivo+1);

$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE Empleado SET indexPoliza='$consecutivo' where idEmpleado='$vendedor'";
mysqli_query($link, $sSQL) ;

header("Location: mainframe.php?module=contratos_alta&idPoliza=$idPoliza");
}

#=====



if(isset($accela) && $accela=="edit"){

/*
foreach($productos as $idpro){
$link= mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from productos where id = '$idpro'",$db);
$servicios=mysqli_result($result,0,"servicios");
$serviciosx=explode(",",$servicios);
$numeventos=mysqli_result($result,0,"numeventos");
$numeventosx=explode(",",$numeventos);
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `siniestros` ( `contrato`, `producto`, `servicios`, `eventos` ) 
VALUES ('$numcontrato', '$idpro', '$servicios', '$numeventos')");
}
*/


$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Poliza SET tipoCliente='$tipocliente', tipoVenta='$tipoventa', factura='$factura', monto='$monto', comision='$comision', ingreso='$ingreso', productos='$producto' where idPoliza='$idPoliza'";
mysqli_query($link, $sSQL);

$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysqli_query($link, $sSQL);


header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){


$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From Poliza Where idPoliza ='$idPoliza'";
mysqli_query($link,$sSQL);

$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="SELECT clave From usuarios_contrato Where idPoliza ='$idPoliza'";
$result=mysqli_query($link,$sSQL);
while($row=mysqli_fetch_array($result))
{
	$query="DELETE FROM validaciones WHERE clave_usuario='$row[clave]'";
	mysqli_query($link,$query);
}

$sSQL="Delete From usuarios_contrato Where idPoliza ='$idPoliza'";
mysqli_query($link,$sSQL);

header("Location: mainframe.php?module=$module&code=3");
}



#########



if($accela=="update"){

$link= mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE Poliza SET status='validado' where idPoliza='$idPoliza'";

mysqli_query($link, $sSQL);

header("Location: mainframe.php?module=$module&code=2");

}



}

################################################################################
if($module=="servicios"){ 


if(($accela=="new" or $accela=="edit") && is_array($servicios)){
	
	$servicios_enlatados=implode(",",$servicios);}

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database) ;
mysqli_query($link,"INSERT INTO `servicios` ( `servicio`, `tipo`, `campos`) 
VALUES ('$servicio', '$tipo', '$servicios_enlatados')") or die(mysqli_error($link));
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE servicios SET servicio='$servicio', tipo='$tipo', campos='$servicios_enlatados' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From servicios Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

################################################################################
if($module=="productos"){ 

if($accela=="new" or $accela=="edit"){
if(is_array($servicios)){$servicios_enlatados=implode(",",$servicios);}
if(is_array($numeventos)){$numeventos_enlatados=implode(",",$numeventos);}
}

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `productos` ( `producto`, `servicios`, `numeventos`, `terminos`) 
VALUES ('$producto', '$servicios_enlatados', '$numeventos_enlatados', '$terminos')");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE productos SET producto='$producto', servicios='$servicios_enlatados', numeventos='$numeventos_enlatados', terminos='$terminos' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From productos Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

if($module=="cabina_d"){
if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET observaciones='$observaciones' where id='$idcaso'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=cabina&code=1");
}

if(isset($accela) && $accela=="cancelar"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET status='cancelado al momento' where id='$idcaso'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=cabina&code=2");
}
}




################################################################################
if($module=="proveedores"){ 

if($accela=="new" or $accela=="edit"){
if(is_array($servicios)){$servicios_enlatados=implode(",",$servicios);}
session_start();
$cobertura=$_SESSION['coberturas'];
session_unregister("coberturas");
}

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `Provedor` ( `nombre`, `usuario`, `contrasena`, `calle`, `colonia`, `cp`, `estado`, `municipio`, `especialidad`, `trabajos`, `cobertura`, `horario`, `precios`, `sucursales`, `contacto`, `tel`, `fax`, `cel`, `nextel`, `nextelid`, `nextelid2`, `telcasa`, `telcasa2`, `mail`, `contacto2`, `tel2`, `fax2`, `cel2`, `nextel2`, `mail2`, `banco`, `numcuenta`, `clabe`, `observaciones`, `status`,`lastuser`, `lastdate`) 
VALUES ('$nombre', '$usuario', '$contrasena', '$calle', '$colonia', '$cp', '$estado', '$municipio', '$especialidad', '$servicios_enlatados', '$cobertura', '$horario', '$precios', '$sucursales', '$contacto', '$tel', '$fax', '$cel', '$nextel', '$nextelid', '$nextelid2', '$telcasa', '$telcasa2', '$mail', '$contacto2', '$tel2', '$fax2', '$cel2', '$nextel2', '$mail2', '$banco', '$numcuenta', '$clabe', '$observaciones', '$status', '$valid_user', now())");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE Provedor SET nombre='$nombre', usuario='$usuario', contrasena='$contrasena', calle='$calle', colonia='$colonia', cp='$cp', estado='$estado', municipio='$municipio', especialidad='$especialidad', trabajos='$servicios_enlatados', cobertura='$cobertura', horario='$horario', precios='$precios', sucursales='$sucursales', contacto='$contacto', tel='$tel', fax='$fax', cel='$cel', nextel='$nextel', nextelid='$nextelid', nextelid2='$nextelid2', telcasa='$telcasa', telcasa2='$telcasa2', mail='$mail', contacto2='$contacto2', tel2='$tel2', fax2='$fax2', cel2='$cel2', nextel2='$nextel2', mail2='$mail2', banco='$banco', numcuenta='$numcuenta', clabe='$clabe', observaciones='$observaciones', status='$status', lastuser='$valid_user', lastdate=now() where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From Provedor Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

################################################################################
if($module=="evaluaciones"){ 

$promedio=($cortesia+$puntualidad+$presentacion+$atencion+$solucion)/5;

$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `evaluaciones` ( `general`, `fecha`, `nombre`, `relacion`, `cortesia`, `puntualidad`, `presentacion`, `atencion`, `solucion`, `observaciones`, `encuestador`, `promedio`, `renovaria`) 
VALUES ('$id', now(), '$nombre', '$relacion', '$cortesia', '$puntualidad', '$presentacion', '$atencion', '$solucion', '$observaciones', '$encuestador', '$promedio', '$renovaria')");

$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET evaluado='evaluado' where id='$id'";
mysqli_query($link, $sSQL);


header("Location: mainframe.php?module=$module&code=1");
}


################################################################################
if($module=="facturacion"){ 
	
isset($_GET['id']) ?  $id= $_GET['id'] : $id= "" ;

isset($_POST['factura']) ?  $factura= $_POST['factura'] : $factura= "" ;
isset($_POST['monto']) ?  $monto= $_POST['monto'] : $monto= "" ;
isset($_POST['descripcion']) ?  $descripcion= $_POST['descripcion'] : $descripcion = "" ;
isset($_POST['orden']) ?  $orden= $_POST['orden'] : $orden = "" ;
isset($_POST['status']) ?  $status= $_POST['status'] : $status = "" ;
	

$iva=$monto*0.15;
$total=$iva+$monto;

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `facturas` ( `cliente`, `factura`, `fecha`, `orden`, `cantidad`, `descripcion`, `precio`, `subtotal`, `iva`, `total`, `status`) 
VALUES ('$idCliente', '$factura', now(), '$orden', '1', '$descripcion', '$monto', '$monto', '$iva', '$total', 'no pagada')");
header("Location: imprime_factura.php?idCliente=$idCliente&factura=$factura&orden=$orden&monto=$monto&descripcion=$descripcion");
}
#=====

if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE facturas SET factura='$factura', orden='$orden', descripcion='$descripcion', precio='$monto', subtotal='$monto', iva='$iva', total='$total', status='$status' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From facturas Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}


if($module=="validaciones"){ 
/*
if(isset($accela) && $accela=="validar"){
if(is_array($elegidos)){
foreach($elegidos as $choosed){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET status='validado' where id='$choosed'";
mysqli_query($link, $sSQL);
}
}
header("Location: mainframe.php?module=$module&display=validados");
}
*/
	
	isset($_GET['idval']) ? $idval = $_GET['idval']  :  $idval = "" ;

	isset($_POST['id']) ? $id= $_POST['id']  :  $id= "" ;
	isset($_POST['clave']) ? $clave= $_POST['clave']  :  $clave= "" ;
	isset($_POST['tipo_pago']) ? $tipo_pago= $_POST['tipo_pago']  :  $tipo_pago= "" ;
	isset($_POST['pago_dia']) ? $pago_dia= $_POST['pago_dia']  :  $pago_dia= "" ;
	isset($_POST['pago_mes']) ? $pago_mes= $_POST['pago_mes']  :  $pago_mes= "" ;
	isset($_POST['pago_ano']) ? $pago_ano= $_POST['pago_ano']  :  $pago_ano= "" ;
	isset($_POST['cuenta_ingreso']) ? $cuenta_ingreso= $_POST['cuenta_ingreso']  :  $cuenta_ingreso= "" ;
	isset($_POST['pago_comision_dia']) ? $pago_comision_dia= $_POST['pago_comision_dia']  :  $pago_comision_dia= "" ;
	isset($_POST['pago_comision_mes']) ? $pago_comision_mes= $_POST['pago_comision_mes']  :  $pago_comision_mes= "" ;
	isset($_POST['pago_comision_ano']) ? $pago_comision_ano= $_POST['pago_comision_ano']  :  $pago_comision_ano= "" ;
	

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE usuarios_contrato SET status='validado' where id='$id'";
mysqli_query($link, $sSQL);

$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `validaciones` ( `clave_usuario`, `tipo_pago`, `fecha_pago`, `cuenta_ingreso`, `observaciones`, `comision_vendedor`, `fecha_pago_comision`) 
VALUES ('$clave', '$tipo_pago', '$pago_ano-$pago_mes-$pago_dia', '$cuenta_ingreso', '$observaciones', '$comision', '$pago_comision_ano-$pago_comision_mes-$pago_comision_dia')");
header("Location: mainframe.php?module=$module&code=1");
}
if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE validaciones SET tipo_pago='$tipo_pago', fecha_pago='$pago_ano-$pago_mes-$pago_dia', cuenta_ingreso='$cuenta_ingreso', observaciones='$observaciones', comision_vendedor='$comision', fecha_pago_comision='$pago_comision_ano-$pago_comision_mes-$pago_comision_dia' where id='$idval'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}

}



if($module=="pagos"){ 

$iva=$monto*0.15;
$total=$iva+$monto;

if(isset($accela) && $accela=="new"){
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `pagos` ( `proveedor`, `concepto`, `monto`,`status`,`expediente`,`fecha_corte`) 
VALUES ('$proveedor', '$conceptor', '$monto', '0','$expediente',NOW())");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE pagos SET concepto='$conceptor', monto='$monto', status='$status' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}

if(isset($accela) && $accela=="pagar"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE pagos SET fecha_pago=NOW(), status='1' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&code=2");
}

#=====
if(isset($accela) && $accela=="delete"){
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From pagos Where id ='$id'";
mysqli_query($link,$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

if($module=="comisiones_vendedores"){
##startcomprobacion
$link = mysqli_connect($host,$username,$pass,$database);
$result=mysqli_query($link,"select * from comisiones_contratos where contrato = '$contrato'");
$cuantosson=mysqli_num_rows($result);
mysqli_free_result($result);
if ($cuantosson>0) {
#actualizar registro
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE comisiones_contratos SET status='$status' where contrato='$contrato'";
mysqli_query($link, $sSQL);
}
else{
#crear registro
$link= mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `comisiones_contratos` (`contrato`, `status`) VALUES ('$contrato', '$status')"); 
}
##endcomprobacion
header("Location: mainframe.php?module=$module&code=2");
}
#_________________________________________________________________
if($module=="detail_seguimiento"){
$link= mysqli_connect($host,$username,$pass,$database);
$motivo_servicio=strtoupper($motivo_servicio);
$ubicacion_requiere=strtoupper($ubicacion_requiere);
$observaciones=strtoupper($observaciones);
$sSQL="UPDATE general SET tecnico_solicitado='$tecnico_solicitado', motivo_servicio='$motivo_servicio', tipo_asistencia_vial='$tipo_asistencia_vial', tipo_asistencia_medica='$tipo_asistencia_medica', domicilio_cliente='$domicilio_cliente', domicilio_sustituto='$domicilio_sustituto', ubicacion_requiere='$ubicacion_requiere', ubicacion_estado='$estado', ubicacion_municipio='$municipio', ubicacion_colonia='$colonia', ubicacion_ciudad='$ciudad', destino_servicio='$destino_servicio', destino_estado='$estado2', destino_municipio='$municipio2', destino_colonia='$colonia2', destino_ciudad='$ciudad2', observaciones='$observaciones' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=$module&id=$id");
}

if($module=="usuariox"){

	isset($_POST['num_cliente']) ? $num_cliente = $_POST['num_cliente'] : $num_cliente = "" ;	
	isset($_POST['num_siniestro']) ? $num_siniestro= $_POST['num_siniestro'] : $num_siniestro= "" ;	
	isset($_POST['usuario']) ? $usuario= $_POST['usuario'] : $usuario= "" ;	
	isset($_POST['reporte_cliente']) ? $reporte_cliente= $_POST['reporte_cliente'] : $reporte_cliente= "" ;	
	isset($_POST['tel_reporta']) ? $tel_reporta= $_POST['tel_reporta'] : $tel_reporta= "" ;	
	isset($_POST['ejecutivo']) ? $ejecutivo= $_POST['ejecutivo'] : $ejecutivo= "" ;	
	isset($_POST['cobertura']) ? $cobertura= $_POST['cobertura'] : $cobertura= "" ;	
	isset($_POST['reporta']) ? $reporta= $_POST['reporta'] : $reporta= "" ;	
	
$num_cliente=strtoupper($num_cliente);
$num_siniestro=strtoupper($num_siniestro);
$usuario=strtoupper($usuario);
$reporte_cliente=strtoupper($reporte_cliente);
$tel_reporta=strtoupper($tel_reporta);
$ejecutivo=strtoupper($ejecutivo);
$cobertura=strtoupper($cobertura);
$email=$email;
$reporta=strtoupper($reporta);
$link= mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET num_cliente='$num_cliente', num_siniestro='$num_siniestro', usuario='$usuario', reporte_cliente='$reporte_cliente', tel_reporta='$tel_reporta', ejecutivo='$ejecutivo', cobertura='$cobertura', email='$email', reporta='$reporta' where id='$id'";
mysqli_query($link, $sSQL);
header("Location: mainframe.php?module=detail_seguimiento&id=$id");
}

?>