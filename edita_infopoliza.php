<?php 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 


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
$id=$_GET['id'];

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '".$id."'");
if (mysqli_num_rows($result)){ 
$ajustador=mysqli_result($result,0,"ajustador");
$telid=mysqli_result($result,0,"telid");
$aseguradora=mysqli_result($result,0,"aseguradora");
$aseg_poliza=mysqli_result($result,0,"aseg_poliza");
$aseg_inciso=mysqli_result($result,0,"aseg_inciso");
$aseg_vigencia_inicio=mysqli_result($result,0,"aseg_vigencia_inicio");
$uno_fecha=explode("-",$aseg_vigencia_inicio);
$aseg_vigencia_termino=mysqli_result($result,0,"aseg_vigencia_termino");
$dos_fecha=explode("-",$aseg_vigencia_termino);
$aseg_cobertura=mysqli_result($result,0,"aseg_cobertura");
$aseg_monto=mysqli_result($result,0,"aseg_monto");
$asegurado=mysqli_result($result,0,"asegurado");
$aseg_y_o=mysqli_result($result,0,"asegurado_y_o");
$aseg_tel1=mysqli_result($result,0,"aseg_tel1");
$aseg_tel2=mysqli_result($result,0,"aseg_tel2");
$aseg_domicilio=mysqli_result($result,0,"aseg_domicilio");
$aseg_cp=mysqli_result($result,0,"aseg_cp");
$estado=mysqli_result($result,0,"aseg_estado");
$municipio=mysqli_result($result,0,"aseg_municipio");
$colonia=mysqli_result($result,0,"aseg_colonia");
$aseg_ciudad=mysqli_result($result,0,"aseg_ciudad");
$aseg_conductor=mysqli_result($result,0,"aseg_conductor");
$aseg_conductor_tel1=mysqli_result($result,0,"aseg_conductor_tel1");
$aseg_conductor_tel2=mysqli_result($result,0,"aseg_conductor_tel2");
}
?>

<form name="frm"  method="post" onsubmit="FAjax('infopoliza.php?&flim-flam=new Date().getTime()','infopoliza','id=<?php echo $id; ?>&aseguradora='+document.getElementById('aseguradora').value+'&ajustador='+document.getElementById('ajustador').value+'&aseg_poliza='+document.getElementById('aseg_poliza').value+'&aseg_inciso='+document.getElementById('aseg_inciso').value+'&aseg_vigencia_inicio='+document.getElementById('aseg_vigencia_inicio_ano').value+'-'+document.getElementById('aseg_vigencia_inicio_mes').value+'-'+document.getElementById('aseg_vigencia_inicio_dia').value+'&aseg_vigencia_termino='+document.getElementById('aseg_vigencia_termino_ano').value+'-'+document.getElementById('aseg_vigencia_termino_mes').value+'-'+document.getElementById('aseg_vigencia_termino_dia').value+'&aseg_cobertura='+document.getElementById('cobertura').value+'&telid='+document.getElementById('telid').value+'&asegurado='+document.getElementById('asegurado').value+'&aseg_y_o='+document.getElementById('aseg_y_o').value+'&aseg_tel1='+document.getElementById('aseg_tel1').value+'&aseg_tel2='+document.getElementById('aseg_tel2').value+'&aseg_domicilio='+document.getElementById('aseg_domicilio').value+'&aseg_cp='+document.getElementById('aseg_cp').value+'&aseg_estado='+document.getElementById('estado').value+'&aseg_municipio='+document.getElementById('municipio').value+'&aseg_colonia='+document.getElementById('colonia').value+'&aseg_ciudad='+document.getElementById('aseg_ciudad').value+'&aseg_conductor='+document.getElementById('aseg_conductor').value+'&aseg_conductor_tel1='+document.getElementById('aseg_conductor_tel1').value+'&aseg_conductor_tel2='+document.getElementById('aseg_conductor_tel2').value,'POST'); return false" action="#">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="100" bgcolor="#FFFFFF"><strong>Aseguradora:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseguradora" type="text" id="aseguradora" size="25" value="<?php echo $aseguradora; ?>"/></td>
            <td width="150" bgcolor="#FFFFFF"><strong>Ajustador:</strong></td>
            <td bgcolor="#FFFFFF"><input name="ajustador" type="text" id="ajustador" size="25" value="<?php echo $ajustador; ?>"/></td>
            
                        <td width="150" bgcolor="#FFFFFF"><strong>Tel/ID:</strong></td>
            <td bgcolor="#FFFFFF"><input name="telid" type="text" id="telid" size="25" value="<?php echo $telid; ?>"/></td>

          </tr>
          <tr>
                      <td width="150" bgcolor="#FFFFFF"><strong>P&oacute;liza:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_poliza" type="text" id="aseg_poliza" size="25" value="<?php echo $aseg_poliza; ?>" onKeyPress="return numbersonly(this, event)"/></td>

            <td bgcolor="#FFFFFF"><strong>Inciso:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_inciso" type="text" id="aseg_inciso" size="25" value="<?php echo $aseg_inciso; ?>"/></td>
            <td bgcolor="#FFFFFF"><strong>Vigencia inicio: </strong></td>
            <td bgcolor="#FFFFFF"><?php 
echo'<select name="aseg_vigencia_inicio_dia" id="aseg_vigencia_inicio_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="aseg_vigencia_inicio_mes" id="aseg_vigencia_inicio_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="aseg_vigencia_inicio_ano" id="aseg_vigencia_inicio_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$uno_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			?></td>
           
          </tr>
          <tr>
           <td bgcolor="#FFFFFF"><strong>Vigencia t&eacute;rmino: </strong></td>
            <td bgcolor="#FFFFFF"><?php 
echo'<select name="aseg_vigencia_termino_dia" id="aseg_vigencia_termino_dia">';	
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';}		
echo'</select>/';

echo'<select name="aseg_vigencia_termino_mes" id="aseg_vigencia_termino_mes">';			
for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>/';

echo'<select name="aseg_vigencia_termino_ano" id="aseg_vigencia_termino_ano">';			
for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$dos_fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';}
echo'</select>';
			
			?></td>
            <td bgcolor="#FFFFFF"><strong>Cobertura: </strong></td>
            <td bgcolor="#FFFFFF"><input name="cobertura" type="text" id="cobertura" size="25" value="<?php echo $aseg_cobertura; ?>" /></td>
            
                        <td bgcolor="#FFFFFF"><strong>Conductor:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_conductor" type="text" id="aseg_conductor" size="25"  value="<?php echo $aseg_conductor; ?>"/></td>
           

<!--             <td bgcolor="#FFFFFF"><strong>Monto: </strong></td>


            <td bgcolor="#FFFFFF">$
            <input name="monto" type="text" id="monto" size="28" value="<?php echo $aseg_monto; ?>" onKeyPress="return numbersonly(this, event)"/></td>-->
 
          </tr>
          <tr>
          <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_conductor_tel1" type="text" id="aseg_conductor_tel1" size="25"  value="<?php echo$aseg_conductor_tel1; ?>" onKeyPress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_conductor_tel2" type="text" id="aseg_conductor_tel2" size="25"  value="<?php echo$aseg_conductor_tel2; ?>" onkeypress="return numbersonly(this, event)"/></td>
            <td bgcolor="#FFFFFF"><strong>Asegurado: </strong></td>
            <td bgcolor="#FFFFFF"><input name="asegurado" type="text" id="asegurado" value="<?php echo $asegurado; ?>" size="25"/></td>
           
    </tr>
          <tr>
           <td bgcolor="#FFFFFF"><strong>y/o: </strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_y_o" type="text" id="aseg_y_o" size="25"  value="<?php echo $aseg_y_o; ?>"/></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_tel1" type="text" id="aseg_tel1" size="25"  value="<?php echo $aseg_tel1; ?>" onKeyPress="return numbersonly(this, event)" /></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_tel2" type="text" id="aseg_tel2" size="25"  value="<?php echo $aseg_tel2; ?>" onKeyPress="return numbersonly(this, event)" /></td>
           
          </tr>
          <tr>
           <td bgcolor="#FFFFFF"><strong>Calle y n&uacute;mero:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_domicilio" type="text" id="aseg_domicilio" size="25"  value="<?php echo $aseg_domicilio; ?>"/></td>
            <td bgcolor="#FFFFFF"><strong>C.P.:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_cp" type="text" id="aseg_cp" size="25"  value="<?php echo $aseg_cp; ?>"/></td>
            <td bgcolor="#FFFFFF"><strong>Estado:</strong></td>
            <td bgcolor="#FFFFFF">
            
            <?php 
			echo'<select name="estado" id="estado" onchange="cargaContenido(this.id)"><option value="0">Seleccione un Estado</option>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'
              <option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo'selected';}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

echo'        
            </select>';
			?>			</td>
          
           
          </tr>
          <tr>
           <td bgcolor="#FFFFFF"><strong>Municipio:</strong></td>
            <td bgcolor="#FFFFFF"><?php 
			
if(isset($estado) && $estado!=""){
echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='".$estado."'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
  }
else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option></select>';}	?></td>
            <td bgcolor="#FFFFFF"><strong>Colonia:</strong></td>
            <td bgcolor="#FFFFFF">
			<?php 
			 if(isset($municipio) && $municipio!=""){
echo'  <select name="colonia" id="colonia">';
$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
  }
 else{echo'<select disabled="disabled" name="colonia" id="colonia">
						<option value="0">Seleccione un Municipio</option>
					</select>';}?>	</td>
            <td bgcolor="#FFFFFF"><strong>Ciudad:</strong></td>
            <td bgcolor="#FFFFFF"><input name="aseg_ciudad" type="text" id="aseg_ciudad" size="25"  value="<?php echo $aseg_ciudad; ?>"/></td>
          </tr>
          
          <tr>
            <td colspan="6" align="center" bgcolor="#FFFFFF"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax('infopoliza.php?id=<?php echo $id; ?>&flim-flam=new Date().getTime()','infopoliza','','get');"/></td>
          </tr>
        </table>	
</form>