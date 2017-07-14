<?php 

$checa_arrayx=array_search("servicios",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

isset($_GET['id']) ? $id = $_GET['id'] : $id = null;

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Servicios</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=servicios"><td align="right" class="questtitle">B&uacutesqueda: 



              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?php 
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);

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

$result = mysqli_query($db,"SELECT * from servicios where id = '$id'");
$servicio=mysqli_result($result,0,"servicio");
$tipo=mysqli_result($result,0,"tipo");
$campos=mysqli_result($result,0,"campos");
$campos=explode(",",$campos);
?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td align="center" bgcolor="#bbbbbb"><b>Detalles del Servicio: <?php echo ''.$servicio.'';?></b></td>
    </tr>
      <tr>

    <td align="center" bgcolor="#bbbbbb"><b>Tipo: <?php echo ''.$tipo.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#eeeeee"><strong>Campos:</strong><p>
<table width=100% cellpadding=3 cellspacing=3>	
	<?php 
	$cuenta=0;
	foreach($campos as $micampo){
	if($cuenta=="0"){echo'<tr>';}
	echo'<td><li>'.$micampo.'</td>';
	$cuenta=$cuenta+1;
	if($cuenta=="3"){echo'</tr>'; $cuenta=0;}
	}
	?>
	</table>
	
	</td>
    </tr>

</table>





</td></tr></table>