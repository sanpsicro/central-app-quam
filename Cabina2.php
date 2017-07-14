<?php

   include_once("conf.php");   if(isset($_GET['sNumPoliza']) || isset($_GET['sNombre']) || isset($_GET['sId']) ){
   include("ConsultasCabina.php");   }
   
?>
<div align="center">
<table width=100% border=1 bgcolor="#FFFFFF" cellspacing=2>
<tr>
<td colspan= 3>
<?php include("busqueda.php"); ?>
</div>
</td>
</tr>
<tr>
<td width=30% bgcolor=#EEEEEE>
<div align=center>
<?php include("Mensajes.php"); ?>
</div>
</td>
<td width=70% bgcolor=#EEEEEE>
<div align=center>
<?php include("IniciarAltaExpediente.php"); ?>
</div>
</td>

</tr>
<tr>
<td colspan= 3>
<?php include("ListarPolizas.php"); ?>
</td>
</tr>
</table>
</div>