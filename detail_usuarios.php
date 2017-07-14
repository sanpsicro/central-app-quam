<?php  
if ( isset( $_SESSION['valid_user'] ) && isset( $_SESSION['valid_modulos'] )&& isset( $_SESSION['valid_permisos'] ))
{}
else {
header("Location: index.php?errorcode=3");
}
$checa_arrayx=array_search("usuarios",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=usuarios"><td align="right" class="questtitle">B&uacutesqueda: 



              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?php  
isset($_GET['idEmpleado']) ? $idEmpleado = $_GET['idEmpleado'] : $idEmpleado = "" ;

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

$result = mysqli_query($db,"SELECT * from Empleado where idEmpleado = '$idEmpleado'");

$usuario=mysqli_result($result,0,"usuario");

$contrasena=mysqli_result($result,0,"contrasena");

$nombre=mysqli_result($result,0,"nombre");

$cargo=mysqli_result($result,0,"cargo");

$departamento=mysqli_result($result,0,"idDepartamento");

$direccion=mysqli_result($result,0,"direccion");

$estado=mysqli_result($result,0,"estado");

$municipio=mysqli_result($result,0,"municipio");

$colonia=mysqli_result($result,0,"colonia");

$extension=mysqli_result($result,0,"extension");

$telefonocasa=mysqli_result($result,0,"telefonoCasa");

$telefonocelular=mysqli_result($result,0,"telefonoCelular");

$nextel=mysqli_result($result,0,"nextel");

$idnextel=mysqli_result($result,0,"idnextel");

$email=mysqli_result($result,0,"email");

$tipo=mysqli_result($result,0,"tipo");

$modules=mysqli_result($result,0,"modules");

$modules_exploited=explode(",",$modules);

$permisos=mysqli_result($result,0,"permisos");

$permisos_exploited=explode(",",$permisos);

$activo=mysqli_result($result,0,"activo"); 



###

$db2 = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db2);

$result2 = mysqli_query($db2,"SELECT * from Departamento where idDepartamento = '$departamento'");

$departamento=mysqli_result($result2,0,"nombre");





###

$db3 = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db3);

$result3 = mysqli_query($db3,"SELECT * from Estado where idEstado = '$estado'");

$estado=mysqli_result($result3,0,"nombreEstado");





###

$db4 = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db4);

$result4 = mysqli_query($db4,"SELECT * from Municipio where idMunicipio = '$municipio'");

$municipio=mysqli_result($result4,0,"nombreMunicipio");



###

$db5 = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db5);

$result5 = mysqli_query($db5,"SELECT * from Colonia where idColonia = '$colonia'");

$colonia=mysqli_result($result5,0,"nombreColonia");

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del usuario <?php  echo ''.$usuario.' ('.$tipo.')';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <?php  echo $nombre?></td>

    <td bgcolor="#CCCCCC"><strong>Cargo:</strong> <?php  echo $cargo?></td>

    </tr>

  <tr>

    <td><strong>Departamento:</strong> <?php  echo $departamento?></td>

    <td><strong>Activo:</strong> <?php  if($activo=="1"){echo'S�';} else{echo'No';}?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Direcci�n:</strong> <?php  echo $direccion?></td>

    <td bgcolor="#CCCCCC"><strong>Estado:</strong> <?php  echo $estado?></td>

    </tr>

  <tr>

    <td><strong>Municipio:</strong> <?php  echo $municipio?></td>

    <td><strong>Colonia:</strong> <?php  echo $colonia?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Tel�fono Casa:</strong> <?php  echo $telefonocasa?></td>

    <td bgcolor="#CCCCCC"><strong>Tel�fono Celular:</strong> <?php  echo $telefonocelular?></td>

    </tr>

  <tr>

    <td><strong>Nextel:</strong> <?php  echo $nextel?></td>

    <td><strong>ID Nextel:</strong> <?php  echo $idnextel?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Email:</strong> <?php  echo '<a href="mailto:'.$email.'">'.$email.'</a>';?></td>

   <td><strong>Extensi�n:</strong> <?php  echo $extension?></td>

  </tr>

</table>





</td></tr></table>