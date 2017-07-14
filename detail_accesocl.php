<?php
error_reporting(E_ALL);
if(isset( $_SESSION["valid_user"] ) && isset( $_SESSION["valid_modulos"] ) && isset($_SESSION["valid_permisos"] ))
{}
else {
header("Location: index.php?errorcode=3");
}
$checa_arrayx=array_search("accesocl",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Usuarios Acceso a Clientes</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>





          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?php
isset($_GET['idusuario']) ? $idusuario = $_GET['idusuario'] : $idusuario = null ; 

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

$result = mysqli_query($db,"SELECT * from accesocl where idusuario = '$idusuario'");

$usuario=mysqli_result($result,0,"usuario");

$contrasena=mysqli_result($result,0,"contrasena");

$nombre=mysqli_result($result,0,"nombre");

$email=mysqli_result($result,0,"email");

$contrato1=mysqli_result($result,0,"contrato1");

$contrato2=mysqli_result($result,0,"contrato2");

$contrato3=mysqli_result($result,0,"contrato3");

$contrato4=mysqli_result($result,0,"contrato4");

$contrato5=mysqli_result($result,0,"contrato5");

$permicl_enlatados=mysqli_result($result,0,"permisos");

$activo=mysqli_result($result,0,"activo"); 




?>

<table width="100%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del usuario: <?php echo ' '.$usuario.' ';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <?php echo $nombre ?></td>



    </tr>

  <tr>

    <td><strong>Usuario:</strong> <?php echo $usuario?></td>



    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Email:</strong> <?php echo $email?></td>



    </tr>

  <tr>

    <td><strong>Contrato 1:</strong> <?php echo $contrato2?></td>

  

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 2:</strong> <?php echo $contrato2?></td>

  

    </tr>

  <tr>

    <td><strong>Contrato 3:</strong> <?php echo $contrato3?></td>

   

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 4:</strong> <?php echo $contrato4?></td>



  </tr>
  
    <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 5:</strong> <?php echo $contrato5?></td>



  </tr>
  
  <tr>
  
 
  
 

</table>





</td></tr></table>