<style>

.contenedor
{
width: 70%;
padding: 30px;	
}



</style>

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

<?php  

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
      </span></td><td width=350 class="blacklinks">[ <a href="javascript:history.back(1)" class="blacklinks">Regresar</a> ] &nbsp;&nbsp;&nbsp; <?php   $checa_array1=array_search("cap_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=carpeta_admin&accela=edit&contid='.$contid.'&capid='.$capid.'">Editar</a> ] &nbsp;&nbsp;&nbsp; [ <a href="process.php?module=carpetas&accela=delete&contid='.$contid.'&capid='.$capid.'">Eliminar</a> ]';} ?></td></tr></table></td></tr>




        </table>



      </td>



  </tr>







<tr><td>






<?php  

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * from modcont WHERE id=$contid order by fecha desc"); 
if (mysqli_num_rows($result)){ 
while ($row = @mysqli_fetch_array($result)) { 

echo ' 

<div class="contenedor">

<h1>'.$row["titulo"].'</h1><br /><br />'.$row["contenido"].'</div>'
		
	;
	
	


  }    }



else{echo'<center><b>Carpeta Vacia</b></center>';}
?>



</td></tr></table>