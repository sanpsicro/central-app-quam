<?php 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

isset($_GET['id']) ? $id = $_GET['id'] : $id = null ; 
isset($_GET['flim-flam']) ? $flim_flam = $_GET['flim-flam'] : $flim_flam = null ; 
##
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);

//initialize
$resp_ajustador="";
$resp_abogado="";
$resp_perito="";
$resp_consignado="";
$juzgado="";
$causa_penal="";
$procesado="";


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


$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '$id'");
if (mysqli_num_rows($result)){ 
$resp_ajustador=mysqli_result($result,0,"resp_ajustador");
$resp_abogado=mysqli_result($result,0,"resp_abogado");
$resp_perito=mysqli_result($result,0,"resp_perito");
$resp_consignado=mysqli_result($result,0,"resp_consignado");
$juzgado=mysqli_result($result,0,"juzgado");
$causa_penal=mysqli_result($result,0,"causa_penal");
$procesado=mysqli_result($result,0,"procesado");
}
##
echo'<form method="post" onsubmit="FAjax(\'criterio.php?&flim-flam=new Date().getTime()\',\'criterio\',\'id='.$_GET['id'].'&crt_ajustador=\'+document.getElementById(\'crt_ajustador\').value+\'&crt_abogado=\'+document.getElementById(\'crt_abogado\').value+\'&crt_perito=\'+document.getElementById(\'crt_perito\').value+\'&crt_consignado=\'+document.getElementById(\'crt_consignado\').value+\'&juzgado=\'+document.getElementById(\'juzgado\').value+\'&causa_penal=\'+document.getElementById(\'causa_penal\').value+\'&procesado=\'+document.getElementById(\'procesado\').value,\'POST\'); return false" action="#">';

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="25%" bgcolor="#ffffff"><strong>Ajustador:</strong>
<select name="crt_ajustador" id="crt_ajustador">
<option value="Sin evaluar"'; 
if($resp_ajustador=="Sin evaluar"){echo' selected ';}
echo'>Sin evaluar
<option value="Responsable"'; 
if($resp_ajustador=="Responsable"){echo' selected ';}
echo'>Responsable
<option value="Ofendido"';
if($resp_ajustador=="Ofendido"){echo' selected ';}
echo'>Ofendido
<option value="Corresponsable"';
if($resp_ajustador=="Corresponsable"){echo' selected ';}
echo'>Corresponsable
<option value="Informe"'; 
if($resp_ajustador=="Informe"){echo' selected ';}
echo'>Informe
<option value="Ambos"'; 
if($resp_ajustador=="Ambos"){echo' selected ';}
echo'>Ambos
</select></td>
    <td width="25%" bgcolor="#ffffff"><strong>Abogado: 
      <select name="crt_abogado" id="crt_abogado">
<option value="Sin evaluar"'; 
if($resp_abogado=="Sin evaluar"){echo' selected ';}
echo'>Sin evaluar
<option value="Responsable"'; 
if($resp_abogado=="Responsable"){echo' selected ';}
echo'>Responsable
<option value="Ofendido"';
if($resp_abogado=="Ofendido"){echo' selected ';}
echo'>Ofendido
<option value="Corresponsable"';
if($resp_abogado=="Corresponsable"){echo' selected ';}
echo'>Corresponsable
<option value="Informe"'; 
if($resp_abogado=="Informe"){echo' selected ';}
echo'>Informe
<option value="Ambos"'; 
if($resp_ajustador=="Ambos"){echo' selected ';}
echo'>Ambos
      </select>
    </strong></td>
    <td width="25%" bgcolor="#ffffff"><strong>Perito: 
      <select name="crt_perito" id="crt_perito">

<option value="Sin evaluar"'; 
if($resp_perito=="Sin evaluar"){echo' selected ';}
echo'>Sin evaluar
<option value="Responsable"'; 
if($resp_perito=="Responsable"){echo' selected ';}
echo'>Responsable
<option value="Ofendido"';
if($resp_perito=="Ofendido"){echo' selected ';}
echo'>Ofendido
<option value="Corresponsable"';
if($resp_perito=="Corresponsable"){echo' selected ';}
echo'>Corresponsable
<option value="Informe"'; 
if($resp_perito=="Informe"){echo' selected ';}
echo'>Informe
<option value="Ambos"'; 
if($resp_ajustador=="Ambos"){echo' selected ';}
echo'>Ambos
      </select>
    </strong></td>
    <td width="25%" bgcolor="#ffffff"><strong>Consignado: 
      <select name="crt_consignado" id="crt_consignado">

<option value="Sin evaluar"'; 
if($resp_consignado=="Sin evaluar"){echo' selected ';}
echo'>Sin evaluar
<option value="Responsable"'; 
if($resp_consignado=="Responsable"){echo' selected ';}
echo'>Responsable
<option value="Ofendido"';
if($resp_consignado=="Ofendido"){echo' selected ';}
echo'>Ofendido
<option value="Corresponsable"';
if($resp_consignado=="Corresponsable"){echo' selected ';}
echo'>Corresponsable
<option value="Informe"'; 
if($resp_consignado=="Informe"){echo' selected ';}
echo'>Informe
<option value="Ambos"'; 
if($resp_ajustador=="Ambos"){echo' selected ';}
echo'>Ambos
      </select>
    </strong></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#ffffff"><strong>Juzgado: 
      
    </strong></td>
    <td bgcolor="#ffffff"><strong>
      <input name="juzgado" type="text" id="juzgado" size="30" value="'.$juzgado.'" />
    </strong></td>
    <td align="right" bgcolor="#ffffff"><strong>Causa penal: </strong></td>
    <td bgcolor="#ffffff"><strong>
      <input name="causa_penal" type="text" id="causa_penal" size="30" value="'.$causa_penal.'"/>
    </strong></td>
  </tr>
  
  <tr>
    <td bgcolor="#ffffff"><strong>Procesado: 
      <select name="procesado" id="procesado">
        <option value="no"'; 
		if($procesado=="no"){echo' selected ';}
		echo'>No</option>
        <option value="si"';
		if($procesado=="si"){echo' selected ';}		
		echo'>Si</option>
      </select>
    </strong></td>
    <td bgcolor="#ffffff"><input name="Enviar" type="submit" value="Enviar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'criterio.php?id='.$_GET['id'].'&flim-flam=new Date().getTime()\',\'criterio\',\'\',\'get\');"/></td>
    <td bgcolor="#ffffff">&nbsp;</td>
    <td align="right" bgcolor="#ffffff">&nbsp;</td>
  </tr>
</table>';

echo'</form>';
?>


