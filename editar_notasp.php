<link href="style_1.css" rel="stylesheet" type="text/css" />
<?php  
include('conf.php'); 
isset($_GET['id']) ? $id = $_GET['id'] : $id ="" ;
isset($_GET['caso']) ? $caso = $_GET['caso'] : $caso ="" ;
isset($_GET['idnota']) ? $idnota = $_GET['idnota'] : $idnota ="" ;

if(empty($fecha[2])){$fecha[2]=date("d");}
if(empty($fecha[1])){$fecha[1]=date("m");}
if(empty($fecha[0])){$fecha[0]=date("Y");}

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

if($caso == "editar")
{
##
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from notasprov where general='$id' AND  id= '$idnota'");
if (mysqli_num_rows($result)){ 
$fecha=mysqli_result($result,0,"fecha");
$fecha=explode("-",$fecha);
$comentario=mysqli_result($result,0,"comentario");
}
##
}else{
$comentario = "";	
	
}
?>
<form method="post" enctype="multipart/form-data" action="upnotesp.php?id=<?php  echo $id; ?>&popup=<?php  echo $popup; ?>&caso=<?php  echo $caso; ?>&idnota=<?php  echo $idnota; ?>&proveedor=<?php  echo $nombrep; ?>">

<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<!-- <tr>
		  <td width="33%" bgcolor="#FFFFFF"><strong>Fecha:</strong> <?php  
		echo'  <select name="fecha_d" id="fecha_d">';			
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}          echo' </select>
            /
            <select name="fecha_m" id="fecha_m">';
			
			for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

			
			
echo'                        </select>
            /
            <select name="fecha_a" id="fecha_a">';

			for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

                        echo'</select>';
		  
		  ?></td>
    </tr>-->
		<tr>
		  <td bgcolor="#FFFFFF"><p><strong>Comentario:<br />
		  </strong><strong>
          <textarea name="comentario" cols="90" rows="6" id="comentario"><?php  echo $comentario;?></textarea>
          </strong></p>	      </td>
  </tr>
		
		<tr>
		  <td align="center" bgcolor="#FFFFFF">
<input name="Enviar" type="submit" value="Enviar" /> 
            &nbsp;&nbsp;
           <input type="button" name="Submit2" value="Cancelar" class="butn" onClick="location.href='notas_proveedorb.php?id=<?php  echo $id;?>'">
		  </td>
  </tr>
</table>
</form>