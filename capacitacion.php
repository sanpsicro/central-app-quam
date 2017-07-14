<style>

.contenedor
{
padding: 30px;
text-align: center;	
}

.gallist {
position: relative;
padding-top: 10px;
width: 180px;
height: 180px;
text-align: center;

}

.prodet
{
text-align: center;
padding-top: 5px;
}

.carpeta
{
	position: relative;
	width: 160px;
	height: 160px;
	text-align: center;
	bottom: 10px;	
	
}

.limpiar
{
width: 180px;
height: 230px;
float:left;
	}

</style>

<?php  
$checa_arrayx=array_search("capacitacion",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Organizaci&oacuten y M&eacutetodos</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("cap_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=capacitacion_admin&accela=new">Nueva Carpeta</a> ]';} ?></td></tr></table></td></tr>
   </table>
      </td>
  </tr>
<tr><td>

<div class="contenedor" width="100%" align="center">
     <div style="clear:both; height:auto; width:100%; vertical-align:top;" align="center">

  <?php  
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) { $activos="and activo=1"; } else{ $activos=""; }

$link = mysqli_connect($host,$username,$pass,$database); 

//mysql_select_db($database, $link); 

$result = mysqli_query($link,"SELECT * FROM modcap WHERE parent=0 $activos order by nombre"); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 
$checa_array1=array_search("dir".$row["cid"],$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) { echo ''; } else{
	
	echo '
	<div class="limpiar">
	<div class="gallist">
	<div class="carpeta">
	';
	
	$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) {} else{	
echo '
	<a href="?module=capacitacion_admin&accela=edit&capid='.$row["cid"].'"><img src="icon/edit.png" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="?module=capacitacion_delete&capid='.$row["cid"].'&carpeta='.$row["nombre"].'"><img src="icon/borrar.png"></a>';
	if ($row["activo"]==0) { echo '&nbsp;&nbsp;&nbsp;<img src="icon/private.png" border="0">'; } else {}
	echo '<br />
	';
}
	
	echo'
	<a href="?module=carpetas&capid='.$row["cid"].'&from=cap"><img src="/icon/'.$row["ico"].'" border="0"></a><br />
	<div class="prodet">'.$row["nombre"].'</div></div>
	</div>
	</div>
		
	';
}

  

  }}



			  ?>         
</div>
</div>
</td></tr></table>