<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

if(empty($fecha[2])){$fecha[2]=date("d");}
if(empty($fecha[1])){$fecha[1]=date("m");}
if(empty($fecha[0])){$fecha[0]=date("Y");}

if($_GET['caso'] == "editar")
{
##
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from bitacora where general='$_GET[id]' AND  id= '$_GET[idnota]'",$db);
if (mysqli_num_rows($result)){ 
$fecha=mysql_result($result,0,"fecha");
$fecha=explode("-",$fecha);
$comentario=mysql_result($result,0,"comentario");
}
##
}
?>
<form method="post" enctype="multipart/form-data" action="upnotes.php?id=<?php  echo $id; ?>&caso=<?php  echo $caso; ?>&idnota=<?php  echo $idnota; ?>">

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
            <input type="button" name="Button" value="Cancelar" onClick="location.href='?module=bitacora&id=<?php  echo $id;?>'"/>		  </td>
  </tr>
</table>
</form>