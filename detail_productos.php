<?php 
$checa_arrayx=array_search("servicios",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
$id = $_GET['id'];
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Productos</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=productos"><td align="right" class="questtitle">B�squeda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?php 
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from productos where id = '".$id."'");
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$producto=$row['producto'];
$servicios=$row['servicios'];

$servicios=explode(",",$servicios);

$numeventos=$row['numeventos'];
$numeventos=explode(",",$numeventos);
$terminos=$row['terminos'];
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="center" bgcolor="#bbbbbb"><b>Detalles del Producto: <?php  echo ''.$producto.'';?></b></td>
    </tr>
  <tr>
    <td width="50%" bgcolor="#eeeeee"><strong>Servicios:</strong><p>
<table width=100% cellpadding=3 cellspacing=3>	
	<?php 
	$cuenta=0;
$absolute=0;	
foreach($servicios as $miservicio){
	if($cuenta=="0"){echo'<tr>';}

$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from servicios where id = '".$miservicio."'");
$row=mysqli_fetch_array($result,MYSQL_ASSOC);
$servicio=$row['servicio'];


	echo'<td><li>'.$servicio.' ['.$numeventos[$absolute].']</td>';	
	
	
	$cuenta=$cuenta+1;
$absolute=$absolute+1;	
	if($cuenta=="3"){echo'</tr>'; $cuenta=0;}
	}
	?>
	</table>
		</td>
    </tr>
	
	<tr><td bgcolor="#CCCCCC"><b>T&eacuterminos:</b>
	  <p>
	<?php 
	echo nl2br($terminos);
	?>
	</td>
	</tr>
</table>
</td></tr></table>