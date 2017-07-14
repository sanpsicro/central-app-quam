<?php
$idCliente = $_GET['idCliente'];
$checa_arrayx=array_search("clientes",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Clientes</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=clientes"><td align="right" class="questtitle">B�squeda: 



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

//////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from Cliente where idCliente = '".$idCliente."'");

$idempleado=mysqli_result($result,0,"idEmpleado");

$usuario=mysqli_result($result,0,"usuario");

$nombre=mysqli_result($result,0,"nombre");

$rfc=mysqli_result($result,0,"rfc");

$contacto=mysqli_result($result,0,"contacto");

$calle2=mysqli_result($result,0,"fisCalle");

$numero2=mysqli_result($result,0,"fisNumero");

$colonia2=mysqli_result($result,0,"fisColonia");

$ciudad2=mysqli_result($result,0,"fisCiudad");

$municipio2=mysqli_result($result,0,"fisMunicipio");

$estado2=mysqli_result($result,0,"fisEstado");

$calle=mysqli_result($result,0,"calle");

$numero=mysqli_result($result,0,"numero");

$colonia=mysqli_result($result,0,"colonia");

$ciudad=mysqli_result($result,0,"ciudad");

$municipio=mysqli_result($result,0,"municipio");

$estado=mysqli_result($result,0,"estado");

$telefonocasa=mysqli_result($result,0,"telefonoCasa");

$telefonooficina=mysqli_result($result,0,"telefonoOficina");

$fax=mysqli_result($result,0,"fax");

$extension=mysqli_result($result,0,"extension");

$telefonocelular=mysqli_result($result,0,"telefonoCelular");

$nextel=mysqli_result($result,0,"nextel");

$telnextel=mysqli_result($result,0,"TelNextel");

$email=mysqli_result($result,0,"email");

$status=mysqli_result($result,0,"status");

$tipocliente=mysqli_result($result,0,"tipocliente");



###

$db2 = mysqli_connect($host,$username,$pass,$database);

//////mysql_select_db($database,$db2);

$result2 = mysqli_query($db2,"SELECT * from Empleado where idEmpleado = '".$idempleado."'");

$vendedor=mysqli_result($result2,0,"nombre");



###

$db3 = mysqli_connect($host,$username,$pass,$database);

//////mysql_select_db($database,$db3);

$result3 = mysqli_query($db3,"SELECT * from Estado where idEstado = '".$estado."'");

$estado=mysqli_result($result3,0,"NombreEstado");



$db3b = mysqli_connect($host,$username,$pass,$database);

//////mysql_select_db($database,$db3b);

$result3b = mysqli_query($db3b,"SELECT * from Estado where idEstado = '".$estado2."'");

$estado2=mysqli_result($result3b,0,"NombreEstado");





###

$db4 =  mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db4);

$result4 = mysqli_query($db4,"SELECT * from Municipio where idMunicipio = '$municipio'");

$municipio=mysqli_result($result4,0,"NombreMunicipio");





$db4b =  mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db4b);

$result4b = mysqli_query($db4b,"SELECT * from Municipio where idMunicipio = '$municipio2'");

$municipio2=mysqli_result($result4b,0,"NombreMunicipio");





###

$db5 =  mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db5);

$result5 = mysqli_query($db5,"SELECT * from Colonia where idColonia = '$colonia'");

$colonia=mysqli_result($result5,0,"NombreColonia");



$db5b =  mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db5b);

$result5b = mysqli_query($db5b,"SELECT * from Colonia where idColonia = '$colonia2'");

$colonia2=mysqli_result($result5b,0,"NombreColonia");



###

$db6 =  mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db6);

$result6 = mysqli_query($db6,"SELECT * from TipoCliente where idTipoCliente = '$tipocliente'");

$tipocliente=mysqli_result($result6,0,"nombre");

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Cliente <?php echo ''.$nombre.' ('.$tipocliente.')';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <?php echo $nombre?></td>

    <td bgcolor="#CCCCCC"><strong>Vendedor:</strong> <?php echo $vendedor?></td>

    </tr>

  <tr>

    <td><strong>Clave del usuario:</strong> <?php echo $usuario?></td>

    <td><strong>Status:</strong> <?php echo $status?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>RFC:</strong> <?php echo $rfc?></td>

    <td bgcolor="#CCCCCC"><strong>Contacto:</strong> <?php echo $contacto?></td>

    </tr>

  <tr>

    <td><strong>Direcci�n:</strong> <?php echo "$calle $numero"; ?></td>

    <td><strong>Colonia:</strong> <?php echo $colonia?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Ciudad:</strong> <?php echo $ciudad?></td>

    <td bgcolor="#CCCCCC"><strong>Municipio:</strong> <?php echo $municipio?></td>

    </tr>

  <tr>

    <td><strong>Estado:</strong> <?php echo $estado?></td>

    <td><strong>Email:</strong> <?php echo '<a href="mailto:'.$email.'">'.$email.'</a>';?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Casa:</strong> <?php echo $telefonocasa?></td>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Celular:</strong> <?php echo $telefonocelular?></td>

  </tr>

  <tr>

    <td><strong>Tel&eacute;fono Oficina:</strong> <?php echo $telefonooficina?> &nbsp; <strong>Extensi&oacute;n:</strong> <?php echo $extension?></td>

    <td><strong>Fax:</strong> <?php echo $fax?></td>

  </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>ID Nextel:</strong> <?php echo $nextel?></td>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Nextel:</strong> <?php echo $telnextel?></td>

  </tr>

  <tr>

    <td><strong>Domicilio Fiscal:</strong> <?php echo "$calle2 $numero2"; ?></td>

    <td><strong>Colonia:</strong> <?php echo $colonia2?></td>

  </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Ciudad:</strong> <?php echo $ciudad2?></td>

    <td bgcolor="#CCCCCC"><strong>Municipio:</strong> <?php echo $municipio2?></td>

  </tr>

  <tr>

    <td><strong>Estado:</strong> <?php echo $estado2?></td>

    <td>&nbsp;</td>

  </tr>

</table>





</td></tr></table>