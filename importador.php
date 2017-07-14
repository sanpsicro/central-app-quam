<?php  
	
	

$checa_arrayx=array_search("uploadc",$explota_modulos);
if($checa_arrayx===FALSE)
	die("Acceso no autorizado a este modulo");
		
?>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
		<td height="44" align="left">
			<table width=100% cellpadding=0 cellspacing=0>
				<tr>
					<td>
						<span class="maintitle">Importador de Contratos</span>
					</td>					
				</tr>
			</table>
		</td>
<tr><td>


<div id="container">
<div id="form">

<form name="form1" method="post" action="mainframe.php?module=importador1">
Ingrese el contrato a utilizar: <input type="text" name="contrato" size="40" />
<input type="submit" value="Continuar" />
</form>

</div>
</div>
</td></tr></table>
