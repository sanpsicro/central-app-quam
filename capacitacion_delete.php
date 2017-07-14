<style>

.contenedor
{
width: 70%;
padding: 30px;	
}



</style>



<?php   


$checa_array1=array_search("dir".$capid,$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) {echo'Acceso no autorizado a este modulo';
die();} else{} ?>

<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">
	  
	  <?php  
	  
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from modcap where cid = '$capid'",$db);
$nombre=mysql_result($result,0,"nombre");
echo $nombre;
	   ?>
      </span></td><td width=350 class="blacklinks">[ <a href="javascript:history.back(1)" class="blacklinks">Regresar</a> ] </td></tr></table></td></tr>




        </table>



      </td>



  </tr>







<tr><td>




<?php   $checa_array1=array_search("cap_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'

<div align="center">

<br /><br />
<h1>Se eliminar&aacute; la carpeta: '.$carpeta.'</h1><br /><br />
<span>Se eliminar&aacute;n todos sus contenidos incluyendo subcarpetas.</span>
<br /><br />
<form name="frm" method="post" action="process.php?module=capacitacion&accela=delete&capid='.$capid.'">
<input type="submit" value="CONFIRMAR">
</form>

</div>



';} ?>




</td></tr></table>