<style type="text/css">
.listTable th{
	font-size: 12px;
	background: #bbb;
	font-weight: bold;
}

.listTable td{
	text-align: center;
}
.even{background: #DCDCDC;}
.odd{background: #ccc;}

</style>
<?php  
if(empty($show)){$show=10;}
if(empty($display)){$display="no validados";}
if(empty($sort)){$sort="contrato, inciso";}

mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database); 

$query="SELECT uc.*
		FROM usuarios_contrato uc, Poliza p
			WHERE fecha_vencimiento != '0000-00-00'
			AND fecha_vencimiento <= ADDDATE( CURDATE( ) , 30 ) 
			AND p.status != 'cancelado'
			AND p.idPoliza = uc.idPoliza";
$result = mysqli_query($query) or die(mysql_error() + "<br>Consulta: $query"); 
?>
<div class="maintitle">Renovaciones</div>

<table class="listTable" width="100%" cellpadding="3"> 
<tr>
	<th>Contrato</th>
	<th>Inciso</th>
	<th>Clave de usuario</th>
	<th>Nombre</th>
	<th>Fecha de Inicio</th>
	<th>Fecha de Vencimiento</th>
</tr>
<?php  
while($row=mysqli_fetch_array($result))
{
	$class = ($i++%2==0) ? "even" : "odd";
	echo 	"<tr class='$class'>".	
			"<td>$row[contrato]</td>".
			"<td>$row[inciso]</td>".
			"<td>$row[clave]</td>".
			"<td>$row[nombre]</td>".
			"<td>$row[fecha_inicio]</td>".
			"<td>$row[fecha_vencimiento]</td>".
			"</tr>";
}
?>
</table>