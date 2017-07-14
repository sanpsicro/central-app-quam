<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

isset($_GET['id']) ? $id = $_GET['id']: $id = "" ;
isset($_GET['caso']) ? $caso = $_GET['caso']: $caso = "" ;

 echo'<iframe src ="asigna_proveedor.php?idcaso='.$id.'" width="100%" height=200 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window2"></iframe><p align=center>
 <input type="button" name="Button" value="Finalizar y Volver" onclick="javascript:FAjax(\'statuscaso.php?id='.$id.'&caso='.$caso.'&flim-flam=new Date().getTime()\',\'statuscaso\',\'\',\'get\');"/>
 ';
 
?>

