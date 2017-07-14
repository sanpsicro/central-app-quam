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
height: 180px;
float:left;
	}

</style>



<?php

$from = $_GET['from'];
$capid= $_GET['capid']; 

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

if (empty($par) && !empty($from)) {

$checa_array1=array_search("dir".$capid,$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) {echo'Acceso no autorizado a este modulo';
die();} else{}
}

elseif (!empty($par) && empty($main) && empty($bm))
{
	$checa_array1=array_search("dir".$par,$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) {echo'Acceso no autorizado a este modulo';
die();} else{}
	
	}
	
elseif (!empty($par) && !empty($main) && empty($bm))
{
	$checa_array1=array_search("dir".$main,$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) {echo'Acceso no autorizado a este modulo';
die();} else{}
	
	}	
	
elseif (!empty($par) && !empty($main) && !empty($bm))
{
	$checa_array1=array_search("dir".$bm,$explota_permisos);
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array1===FALSE && $checa_array2===FALSE) {echo'Acceso no autorizado a este modulo';
die();} else{}
	
	}		

 ?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">
	  
	  <?php  
	  
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from modcap where cid = '$capid'");
$nombre=mysqli_result($result,0,"nombre");
echo $nombre;
	   ?>
      </span></td><td width=450 class="blacklinks">[ <a href="javascript:history.back(1)" class="blacklinks">Regresar</a> ] &nbsp;&nbsp;&nbsp; <?php   $checa_array1=array_search("cap_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=carpeta_admin&accela=new&capid='.$capid.'">Nuevo Tema</a> ] &nbsp;&nbsp;&nbsp; [ <a href="?module=capacitacion_admin&accela=edit&capid='.$capid.'">Editar Carpeta</a> ] &nbsp;&nbsp;&nbsp; [ <a href="?module=capacitacion_admin&accela=new&parent='.$capid.'">Agregar Subcarpeta</a> ]  ';} ?></td></tr></table></td></tr>




        </table>



      </td>



  </tr>







<tr><td>




<div class="contenedor" width="100%" align="center">
     <div style="clear:both; height:auto; width:100%; vertical-align:top;" align="center">


<?php  
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) { $activos="and activo=1"; } else{ $activos=""; }
$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database, $link); 

$result = mysqli_query("SELECT * FROM modcap WHERE parent=$capid $activos order by nombre asc", $link); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 

	
	echo '
	<div class="limpiar">
	<div class="gallist">
	<div class="carpeta">';
	$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) {} else{	
echo '
	<a href="?module=capacitacion_admin&accela=edit&capid='.$row["cid"].'"><img src="icon/edit.png" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="?module=capacitacion_delete&capid='.$row["cid"].'&carpeta='.$row["nombre"].'"><img src="icon/borrar.png"></a>'  
;

if ($row["activo"]==0) { echo '&nbsp;&nbsp;&nbsp;<img src="icon/private.png" border="0">'; } else {}

echo '<br />
	';
}
	
  	echo '
	<a href="?module=carpetas&capid='.$row["cid"].'&par='.$capid.'&main='.$par.'&bm='.$main.'"><img src="/icon/'.$row["ico"].'" border="0"></a><br />
	<div class="prodet">'.$row["nombre"].'</div></div>
	</div>
	</div>
		
	';


  

  }}



			  ?>      


<?php  
$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) { $activos="and activo=1"; } else{ $activos=""; }
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from modcont WHERE capid=$capid $activos order by titulo asc"); 
if (mysqli_num_rows($result)){ 
while ($row = @mysqli_fetch_array($result)) { 

echo '
	<div class="limpiar">
	<div class="gallist">
	<div class="carpeta">';
	
	$checa_array2=array_search("cap_a",$explota_permisos);
if ($checa_array2===FALSE) {} else{	
echo '
	<a href="?module=carpeta_admin&accela=edit&contid='.$row["id"].'&capid='.$capid.'"><img src="icon/edit.png" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="process.php?module=carpetas&accela=delete&contid='.$row["id"].'&capid='.$capid.'"><img src="icon/borrar.png"></a>
';
if ($row["activo"]==0) { echo '&nbsp;&nbsp;&nbsp;<img src="icon/private.png" border="0">'; } else {}	
	echo '<br />';
}

	
if ($row["tipo"]==="1") {

echo '	
	<a href="?module=carpetas_detail&contid='.$row["id"].'&capid='.$capid.'&par='.$par.'&main='.$main.'&bm='.$bm.'"><img src="/icon/cont.png" border="0"></a><br />
	';
}

if ($row["tipo"]==="2") {
	$name=$row["archivo"];
	$name = substr($name, -3);
 
 
 
switch ($name) {
 
case "jpg":
 
case "gif":
 
case "png":
 
        $icon_name = "image.png";
 
        break;
		
case "pdf":
 
case "doc":
 
 
        $icon_name = "pdf.png";
 
        break;		
 
case "mp3":
 
case "wav":
 
case "aif":
 
        $icon_name = "audio.png";
 
        break;
 
case "avi":
 
case "mov":
 
case "mpg":
 
case "asf":
 
case "wmv":
 
case "mp4":
 
        $icon_name = "video.png";
 
        break;
 
default:
 
        $icon_name = "file.png";
 
}
	echo '	
	<a href="'.$row["archivo"].'" target="_blank"><img src="/icon/'.$icon_name.'" border="0"></a><br />
	';

	
	  }
	
echo '
	<div class="prodet">
	'.$row["titulo"].'
</div>	
	</div>
	</div>
	</div>
		
	';


  }    }




?>

</div></div>

</td></tr></table>