<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Facturacion</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle"> 

</td>
            <td>&nbsp;</td>
           <form name="form1" method="post" action="bridge.php?module=facturacion"><td align="right" class="questtitle">B�squeda: 
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

                <td align="center" valign="top">
                
                
<?php
isset($_GET['id']) ?  $id= $_GET['id'] : $id= "" ;
isset($_GET['accela']) ?  $accela= $_GET['accela'] : $accela= "" ;

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


$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from facturas where id = '$id'");
$numfac=mysqli_result($result,0,"factura");
$orden=mysqli_result($result,0,"orden");
$descripcion=mysqli_result($result,0,"descripcion");
$precio=mysqli_result($result,0,"precio");
$status=mysqli_result($result,0,"status");				
				
				
echo'<form method="post" action="process.php?module=facturacion&accela='.$accela.'&id='.$id.'">'; 
?><table width="100%" cellpadding="3" cellspacing="3">
  <tr>
    <td bgcolor="#eeeeee"><strong>Factura Num: </strong></td>
    <td bgcolor="#eeeeee"><input name="factura" type="text" id="factura" value="<?php  echo $numfac;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Orden de venta:</strong></td>
    <td bgcolor="#eeeeee"><input name="orden" type="text" id="orden" value="<?php  echo $orden;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Monto:</strong></td>
    <td bgcolor="#eeeeee"><input name="monto" type="text" id="monto" value="<?php  echo $precio;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Descripcion:</strong></td>
    <td bgcolor="#eeeeee"><textarea name="descripcion" cols="50" rows="3"><?php  echo $descripcion;?></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Status:</strong></td>
    <td bgcolor="#eeeeee"><select name="status" id="status">
      <option value="no pagada" <?php  if($status=="no pagada"){echo' selected ';} ?>>No pagada</option>
      <option value="pagada" <?php  if($status=="pagada"){echo' selected ';} ?>>Pagada</option>
      <option value="cancelada" <?php  if($status=="cancelada"){echo' selected ';} ?>>Cancelada</option>
    </select>
    </td>
  </tr>
  
  <tr>
    <td bgcolor="#eeeeee">&nbsp;</td>
    <td bgcolor="#eeeeee"><input type="submit" name="Submit3" value="Enviar" />
      <input name="Submit2" type="reset" value="Reestablecer" /></td>
  </tr>
</table>
                </form>
                </td>
              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>