<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Notas de Remisión</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
    <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle"> 

</td>
            <td>&nbsp;</td>
           <form name="form1" method="post" action="bridge.php?module=notasremision"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td bgcolor="#eeeeee">
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
    <td valign="top" bgcolor="#eeeeee"><table width="100%" border="0" cellspacing="5" cellpadding="5">

        <tr> 

          <td><table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">

              <tr> 

                <td align="center" valign="top"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="center" bgcolor="#eeeeee"><form id="form2" name="form2" method="post" action="bridge.php?module=admin_notasremision_b">
                  Buscar Cliente: 
                  <input name="busca_cliente" type="text" id="busca_cliente" />
                                                <input type="submit" name="Submit2" value="buscar" />
                </form></td>
  </tr>
</table>

<?php

if(isset($busca_cliente) && $busca_cliente!=""){
							echo'<br><b><div class="xplik">Resultados de la búsqueda:</div></b><p>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Cliente where nombre like '%$busca_cliente%' order by nombre"); 

if (mysqli_num_rows($result)){ 

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';

$bgcolor="#cccccc";

  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass">'.$row["nombre"].'</td><td bgcolor="'.$bgcolor.'" class="dataclass" align=middle width=200><a href="?module=admin_notasremision_b&idCliente='.$row["idCliente"].'&accela=newfactura">Generar Nota de Remisión para este Cliente</a></td></tr>';

							}

							echo'</table>';

							}

							}
							
							if(isset($accela) && $accela=="newfactura"){

echo'<form method="post" action="process.php?module=notasremision&accela=new" target="_blank"><table width="100%" border="0" cellspacing="3" cellpadding="3">
<input name="idCliente" type="hidden" value="'.$idCliente.'" />
  <tr>
    <td bgcolor="#eeeeee"><strong>Cliente:</strong> </td>
    <td bgcolor="#eeeeee">'.$nombre.'</td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Nota de Remisión Num:</strong> </td>
    <td bgcolor="#eeeeee"><input name="factura" type="text" id="factura" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Orden de venta:</strong> </td>
    <td bgcolor="#eeeeee"><input name="orden" type="text" id="orden" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Monto:</strong></td>
    <td bgcolor="#eeeeee"><input name="monto" type="text" id="monto" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Descripcion</strong></td>
    <td bgcolor="#eeeeee"><textarea name="descripcion" cols="50" rows="3"></textarea></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit3" value="Crear e imprimir" onClick="location.href=\'pre_notasremision.php\'"/></td>
  </tr>
</table></form>';							
							
							}
							?>	
							
							
							

							
                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>