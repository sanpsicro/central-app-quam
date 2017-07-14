<?php  
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from general where id = '$id'",$db);
if (mysqli_num_rows($result)){ 
$marca=mysql_result($result,0,"auto_marca");
$tipo=mysql_result($result,0,"auto_tipo");
$modelo=mysql_result($result,0,"auto_modelo");
$color=mysql_result($result,0,"auto_color");
$placas=mysql_result($result,0,"auto_placas");
}


echo'<form method="post" onsubmit="FAjax(\'datosvehiculo.php?&flim-flam=new Date().getTime()\',\'datosvehiculo\',\'id='.$_GET['id'].'&caso='.$_GET['caso'].'&marca=\'+document.getElementById(\'marca\').value+\'&tipo=\'+document.getElementById(\'tipo\').value+\'&modelo=\'+document.getElementById(\'modelo\').value+\'&color=\'+document.getElementById(\'color\').value+\'&placas=\'+document.getElementById(\'placas\').value,\'POST\'); return false" action="#">';
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          

          <tr>
            <td bgcolor="#ffffff"><strong>Marca: </strong></td>
            <td bgcolor="#ffffff"><input name="marca" id="marca" type="text" size="25" value="'.$marca.'"/></td>
			
            <td bgcolor="#ffffff"><strong>Tipo: </strong></td>
            <td bgcolor="#ffffff"><input name="tipo" id="tipo" type="text" size="25" value="'.$tipo.'"/></td>
						

            <td bgcolor="#ffffff"><strong>Modelo: </strong></td>
            <td bgcolor="#ffffff"><input name="modelo" id="modelo" type="text" size="25" value="'.$modelo.'"/></td>						
						</tr>
						
						
						          <tr>
            <td bgcolor="#ffffff"><strong>Color: </strong></td>
            <td bgcolor="#ffffff"><input name="color" id="color" type="text" size="25" value="'.$color.'"/></td>
			
            <td bgcolor="#ffffff"><strong>Placas: </strong></td>
            <td bgcolor="#ffffff"><input name="placas" id="placas" type="text" size="25" value="'.$placas.'"/></td>
			

            <td bgcolor="#ffffff">&nbsp;</td>
            <td bgcolor="#ffffff">&nbsp;</td>						

						
						
						
			</tr>
			<tr>
            <td colspan="6" align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'datosvehiculo.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime();\',\'datosvehiculo\',\'\',\'get\');"/></td>
          </tr>
        </table>
</form>';
?>

