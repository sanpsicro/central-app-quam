<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Pagos</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_pagos&accela=new">Nuevo Pago</a> ]</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" 			class="questtitle"> 
			<?php 
			if($accela=="new"){echo'Dar de alta Pago';}
			else{echo'Editar Pago';
			}
			?>
</td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=pagos"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
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
                <td valign="top"> <div align="center">
<?php

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

if($accela=="edit" && isset($id)){
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from pagos where id = '$id'");
$conceptor=mysqli_result($result,0,"conceptor");
$monto=mysqli_result($result,0,"monto");
$status=mysqli_result($result,0,"status");
}
echo'<form name="frm" method="post" action="process.php?module=pagos&accela='.$accela.'&id='.$id.'"><input name="proveedor" type="hidden" value="'.$proveedor.'" />';    
?>
<table width="100%%" border="0">
  <tr>
    <td valign="top"><center>
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td width="30%" align="right" bgcolor="#cccccc"><strong>Concepto:</strong></td>
          <td width="70%" bgcolor="#cccccc"><input name="conceptor" type="text" id="conceptor" size="30" value="<?php echo $conceptor; ?>"/></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#cccccc"><strong>Monto:</strong></td>
          <td bgcolor="#cccccc"><input name="monto" type="text" id="monto" size="30" value="<?php echo $monto; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#cccccc"><strong>Status:</strong> </td>
          <td bgcolor="#cccccc"><select name="status" id="status">
            <option value="pagado" <?php if($status=="pagado"){ echo ' selected ';} ?>>pagado</option>
            <option value="no pagado"  <?php if($status=="no pagado"){ echo ' selected ';} ?>>no pagado</option>
          </select>
          </td>
        </tr>
        <!--  <tr>

        <td align="right" bgcolor="#cccccc"><strong>Tipo de Cliente:</strong></td>

        <td bgcolor="#cccccc"><?php

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM TipoCliente"); 

if (mysqli_num_rows($result)){ 

echo'<select name="tipocliente" id="tipocliente">';

  while ($row = @mysqli_fetch_array($result)) { 

  echo'<option value="'.$row["idTipoCliente"].'"';

     if($tipocliente==$row["idTipoCliente"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>        </td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Tipo de Venta :</strong></td>

        <td bgcolor="#cccccc"><?php

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM TipoVenta"); 

if (mysqli_num_rows($result)){ 

echo'<select name="tipoventa" id="tipoventa" onChange=\'cargaContenido(this.id)\' ><option value="">Seleccione una opci&oacute;n</option>';

  while ($row = @mysqli_fetch_array($result)) { 

  echo'<option value="'.$row["idVenta"].'"';

     if($tipoventa==$row["idVenta"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>          </td>

      </tr>
      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Fecha de inicio:</strong> </td>

        <td bgcolor="#cccccc"><input name="fecha_inicio" type="text" id="fecha_inicio" size="15" value="<?php

		if($accela=="edit"){echo''.$fecha1ex[2].'-'.$fecha1ex[1].'-'.$fecha1ex[0].' '.$fecha1hr[0].':'.$fecha1hr[1].':'.$fecha1hr[2].'';} else{echo date("j-n-Y H:i:s");                 } ?>" readonly="readonly"/>		</td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Fecha de vencimiento:</strong> </td>

        <td bgcolor="#cccccc"><input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value="<?php if($accela=="edit"){echo''.$fecha2ex[2].'-'.$fecha2ex[1].'-'.$fecha2ex[0].' '.$fecha2hr[0].':'.$fecha2hr[1].':'.$fecha2hr[2].'';}?>" readonly="readonly"/></td>

      </tr>


      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Factura:</strong></td>

        <td bgcolor="#cccccc"><input name="factura" type="checkbox" id="factura" value="1" <?php if($factura=="1"){echo'checked';} else{} ?>></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Monto $</strong></td>

        <td bgcolor="#cccccc"><input name="monto" type="text" id="monto" size="30"value="<?php echo"$monto";?>" onchange="calula();"    onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Comisi&oacute;n $</strong></td>

        <td bgcolor="#cccccc"><input name="comision" type="text" id="comision" size="30" value="<?php echo"$comision";?>" onchange="calula();" onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Ingreso $</strong></td>

        <td bgcolor="#cccccc"><input name="ingreso" type="text" id="ingreso" size="30" value="<?php echo"$ingreso";?>" disabled="disabled"/></td>

      </tr>
	  -->
      </table>
      
      
      
    </center></td>
    </tr>




<?php
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database); 
$result = mysqli_query($link,"SELECT * FROM TipoCliente where idTipoCliente='$tipocliente'"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
$tipo_cliente=$row["nombre"];
  }
}
?>    

<!--
 <tr>

    <td colspan="2" valign="top"><iframe src ="beneficiarios.php?accela=<?php echo $accela;?>&tmpid=<?php echo "".$unixid."_".$valid_userid."";?>&idPoliza=<?php echo $idPoliza;?>" width="100%" height=200 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window2"></iframe></td>

    </tr>
-->
</table>

<!--

					  <script type="text/javascript">

					  

                            Calendar.setup({

                                    inputField     :    "fecha_inicio",   // id of the input field

                                    ifFormat       :    "%d-%m-%Y",       // format of the input field

                                    timeFormat     :    "24"

                            });

							

							  Calendar.setup({

                                    inputField     :    "fecha_vencimiento",   // id of the input field

                                    ifFormat       :    "%d-%m-%Y",       // format of the input field

                                    timeFormat     :    "24"

                            });

                  </script>  -->                   

                </div>

                </td>

              </tr>
  <tr>

    <td colspan="2" align="center" valign="top"><input type="submit" name="Submit" value="D a r   d e   A l t a   P a g o" /> </form>
    &nbsp;</td>
  </tr>


            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>