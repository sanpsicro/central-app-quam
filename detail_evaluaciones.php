<?php  
$checa_arrayx=array_search("evaluaciones",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['id']) ? $id = $_GET['id']: $id = "" ;
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Evaluaciones</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=evaluaciones"><td align="right" class="questtitle">B�squeda: 
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
$result = mysqli_query($db,"SELECT * from evaluaciones where general = '$id'");
$result2 = mysqli_query($db,"SELECT servicio,proveedor from general where id = '$id'");
$servid=mysqli_result($result2,0,"servicio");
$provid=mysqli_result($result2,0,"proveedor");
$result3 = mysqli_query($db,"SELECT servicio from servicios where id = '$servid'");
$result4 = mysqli_query($db,"SELECT nombre from Provedor where id = '$provid'");
$service=mysqli_result($result3,0,"servicio");
$proverbio=mysqli_result($result4,0,"nombre");
$fecha=mysqli_result($result,0,"fecha");
$fechax=explode(" ",$fecha);
$fechay=explode("-",$fechax[0]);
$nombre=mysqli_result($result,0,"nombre");
$relacion=mysqli_result($result,0,"relacion");
$cortesia=mysqli_result($result,0,"cortesia");
$puntualidad=mysqli_result($result,0,"puntualidad");
$presentacion=mysqli_result($result,0,"presentacion");
$atencion=mysqli_result($result,0,"atencion");
$solucion=mysqli_result($result,0,"solucion");
$observaciones=mysqli_result($result,0,"observaciones");
$encuestador=mysqli_result($result,0,"encuestador");
$promedio=mysqli_result($result,0,"promedio");
$renovaria=mysqli_result($result,0,"renovaria");
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles de evaluaci�n</b></td>
    </tr>
  <tr>

    <td width="25%" bgcolor="#FFFFFF"><strong>Expediente:</strong></td>
    <td width="25%" bgcolor="#FFFFFF"><?php  echo $id; ?> [<a href="mainframe.php?module=detail_seguimiento&id=<?php  echo $id; ?>" target="_blank">VER EXPEDIENTE</a>]</td>
  </tr>
  <tr>

    <td width="25%" bgcolor="#eeeeee"><strong>Servicio:</strong></td>
    <td width="25%" bgcolor="#eeeeee"><?php  echo $service; ?> </td>
  </tr>  
  <tr>

    <td width="25%" bgcolor="#FFFFFF"><strong>Proveedor:</strong></td>
    <td width="25%" bgcolor="#FFFFFF"><?php  echo $proverbio; ?> </td>
  </tr>  
  
  <tr>

    <td width="25%" bgcolor="#eeeeee"><strong>Fecha:</strong></td>
    <td width="25%" bgcolor="#eeeeee"><?php  
	echo''.$fechay[2].'/'.$fechay[1].'/'.$fechay[0].' '.$fechax[1].'';
	?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Nombre de la persona que contesta la encuesta:</strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $nombre; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;Qu&eacute; relaci&oacute;n tiene con el usuario? </strong></td>
    <td bgcolor="#eeeeee"><?php  echo $relacion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;El operador de nuestra cabina le atendi&oacute; con cortes&iacute;a y rapidez?</strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $cortesia; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;El servicio que usted solicit&oacute; lleg&oacute; en el tiempo prometido?</strong></td>
    <td bgcolor="#eeeeee"><?php  echo $puntualidad; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;C&oacute;mo calificar&iacute;a la presentaci&oacute;n de la persona que le dio el servicio?</strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $presentacion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;Usted se sinti&oacute; apoyado o respaldado por la persona que le atendi&oacute; en el lugar?</strong></td>
    <td bgcolor="#eeeeee"><?php  echo $atencion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;La soluci&oacute;n final a su problema como la calificar&iacute;a?</strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $solucion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Promedio:</strong></td>
    <td bgcolor="#eeeeee"><?php  echo $promedio; ?></td>
  </tr>
    <tr>
    <td bgcolor="#FFFFFF"><strong>En base al servicio de asistencia recibido, &iquest; Usted comprar�a nuevamente su seguro ?:</strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $renovaria; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Por &uacute;ltimo, &iquest;tiene usted alguna observaci&oacute;n o comentario que nos permita mejorar y brindarle un mejor servicio?</strong></td>
    <td bgcolor="#eeeeee"><?php  echo nl2br($observaciones); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Nombre de la persona que realiz&oacute; la encuesta: </strong></td>
    <td bgcolor="#FFFFFF"><?php  echo $encuestador; ?></td>
  </tr>
</table>





</td></tr></table>