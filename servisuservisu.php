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


$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$motivo_servicio=mysqli_result($result,0,"motivo_servicio");
$tecnico_solicitado=mysqli_result($result,0,"tecnico_solicitado");
$tipo_asistencia_medica=mysqli_result($result,0,"tipo_asistencia_medica");
$tipo_asistencia_vial=mysqli_result($result,0,"tipo_asistencia_vial");
$ubicacion_requiere=mysqli_result($result,0,"ubicacion_requiere");
$domicilio_cliente=mysqli_result($result,0,"domicilio_cliente");
$domicilio_sustituto=mysqli_result($result,0,"domicilio_sustituto");
$ubicacion_estado=mysqli_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysqli_result($result,0,"ubicacion_municipio");
$ubicacion_colonia=mysqli_result($result,0,"ubicacion_colonia");
$ubicacion_ciudad=mysqli_result($result,0,"ubicacion_ciudad");
$destino_servicio=mysqli_result($result,0,"destino_servicio");
$destino_estado=mysqli_result($result,0,"destino_estado");
$destino_municipio=mysqli_result($result,0,"destino_municipio");
$destino_colonia=mysqli_result($result,0,"destino_colonia");
$destino_ciudad=mysqli_result($result,0,"destino_ciudad");
$observaciones=mysqli_result($result,0,"observaciones");
}


$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$ubicacion_colonia'",$db);
if (mysqli_num_rows($result)){ 
$ubicacion_colonia=mysqli_result($result,0,"NombreColonia");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$ubicacion_estado'",$db);
if (mysqli_num_rows($result)){ 
$ubicacion_estado=mysqli_result($result,0,"NombreEstado");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$ubicacion_municipio'",$db);
if (mysqli_num_rows($result)){ 
$ubicacion_municipio=mysqli_result($result,0,"NombreMunicipio");
}


$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$destino_estado'",$db);
if (mysqli_num_rows($result)){ 
$destino_estado=mysqli_result($result,0,"NombreEstado");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$destino_municipio'",$db);
if (mysqli_num_rows($result)){ 
$destino_municipio=mysqli_result($result,0,"NombreMunicipio");
}


$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$destino_colonia'",$db);
if (mysqli_num_rows($result)){ 
$destino_colonia=mysqli_result($result,0,"NombreColonia");
}

$ivx=0;

	  ?><table width="100%" border="0" cellspacing="3" cellpadding="3">
 <tr>
      
      <?php 
$checa_array=array_search("motivo_servicio",$camposex);
if($checa_array===FALSE){} else{
?>

      <td bgcolor="#ffffff"><strong>Motivo del servicio:</strong> <?php echo nl2br($motivo_servicio);?></td>
      
       <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>


<?php 
$checa_array=array_search("tecnico_solicitado",$camposex);
if($checa_array===FALSE){} else{
?>
   <td bgcolor="#ffffff"><strong>T&eacute;cnico solicitado:</strong> <?php echo $tecnico_solicitado;?></td>
   
    <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
            <?php 
$checa_array=array_search("tipo_asistencia_vial",$camposex);
if($checa_array===FALSE){} else{
?>
   <td bgcolor="#ffffff"><strong>Tipo de asistencia vial:</strong>  <?php echo $tipo_asistencia_vial;?></td>
    <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
              <?php 
$checa_array=array_search("tipo_asistencia_medica",$camposex);
if($checa_array===FALSE){} else{
?>
   <td bgcolor="#ffffff"><strong>Tipo de asistencia m&eacute;dica:</strong> <?php echo $tipo_asistencia_medica;?></td>

 <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?php 
$checa_array=array_search("domicilio_cliente",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Domicilio del cliente:</strong> <?php echo $domicilio_cliente;?></td>
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
        <?php 
$checa_array=array_search("domicilio_sustituto",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Domicilio donde recoger&aacute; auto sustituto:</strong> <?php echo $domicilio_sustituto;?></td>
      
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
               <?php 
$checa_array=array_search("ubicacion_requiere",$camposex);
if($checa_array===FALSE){} else{
?>
      
      <td bgcolor="#ffffff"><strong>Ubicaci&oacute;n donde se requiere el servicio: </strong><?php echo $ubicacion_requiere;?></td>
       <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
               <?php 
$checa_array=array_search("ubicacion_estado",$camposex);
if($checa_array===FALSE){} else{
?>

      <td bgcolor="#ffffff"><strong>Ubicaci&oacute;n Estado:</strong> <?php echo $ubicacion_estado;?></td>
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
            <?php 
$checa_array=array_search("ubicacion_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Ubicaci&oacute;n Municipio:</strong> <?php echo $ubicacion_municipio;?></td>
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
              <?php 
$checa_array=array_search("ubicacion_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Ubicaci&oacute;n Colonia:</strong> <?php echo $ubicacion_colonia;?></td>

<?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?php 
$checa_array=array_search("ubicacion_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Ubicaci&oacute;n Ciudad:</strong>  <?php echo $ubicacion_ciudad;?></td>
      
<?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?php 
$checa_array=array_search("destino_servicio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Destino del servicio:</strong> <?php echo $destino_servicio;?></td>     
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
               <?php 
$checa_array=array_search("destino_estado",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Destino Estado:</strong> <?php echo $destino_estado;?></td>            

 <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
                <?php 
$checa_array=array_search("destino_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Destino Municipio:</strong>  <?php echo $destino_municipio;?></td>
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
                          <?php 
$checa_array=array_search("destino_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Destino Colonia:</strong> <?php echo $destino_colonia;?></td> 
       <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
               <?php 
$checa_array=array_search("destino_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Destino Ciudad:</strong> <?php echo $destino_ciudad;?></td>            
      <?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
 <?php 
$checa_array=array_search("observaciones",$camposex);
if($checa_array===FALSE){} else{
?>
      <td bgcolor="#ffffff"><strong>Observaciones:</strong> <?php echo nl2br($observaciones);?></td>

<?php $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
	<?php if(empty($NO_EDITAR)):?>
    
    
    
      <td align="right" bgcolor="#ffffff"><strong><!--<a href="javascript:FAjax('editar_servisu.php?id=<?php echo $id;?>&flim-flam=new Date().getTime()','servisuservisu','','get');">Editar</a>-->
      
        [ 
      <a href="?module=edit_servisu&id=<?php echo $id;?>">Editar</a> ]</strong></td>
      
      
      
	<?php endif; ?>
    </tr></table>
