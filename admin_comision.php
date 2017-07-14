<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Comisiones de Vendedores</span></td><td width=150 class="blacklinks">&nbsp;</td>
      </tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <form action="mainframe.php?module=comisiones_vendedores" method="post" name="form1" id="form1">
            <td width="400"><select name="show" id="mostrar">
                <option value="10" <?php  if($show=="10"){echo"selected";}?>>10 por p&aacute;gina</option>
                <option value="20"  <?php  if($show=="20"){echo"selected";}?>>20 por p&aacute;gina</option>
                <option value="30"  <?php  if($show=="30"){echo"selected";}?>>30 por p&aacute;gina</option>
                <option value="50"  <?php  if($show=="50"){echo"selected";}?>>50 por p&aacute;gina</option>
                <option value="100"  <?php  if($show=="100"){echo"selected";}?>>100 por p&aacute;gina</option>
                <option value="200"  <?php  if($show=="200"){echo"selected";}?>>200 por p&aacute;gina</option>
              </select>
                <select name="sort" id="ordenar">
                  <option value="numPoliza" <?php  if($sort=="numPoliza"){echo"selected";}?>>Ordenar por n&uacute;mero de contrato</option>
                  <option value="Cliente.nombre" <?php  if($sort=="Cliente.nombre"){echo"selected";}?>>Ordenar por cliente</option>
                  <option value="Empleado.nombre" <?php  if($sort=="Empleado.nombre"){echo"selected";}?>>Ordenar por vendedor</option>
                </select>
                <input type="submit" name="Submit3" value="Mostrar" />
            </td>
          </form>
          <td>&nbsp;</td>
          <form action="bridge.php?module=comisiones_vendedores" method="post" name="form1" id="form1">
            <td align="right" class="questtitle">B&uacute;squeda:
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" />
                <input type="submit" name="Submit3" value="Buscar" />
            </td>
          </form>
        </tr>
      </table></td>
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

$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from comisiones_contratos where contrato = '$contrato'");
$status=mysqli_result($result,0,"status");
echo'<form name="frm" method="post" action="process.php?module=comisiones_vendedores&contrato='.$contrato.'">';    
?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      <tr>
        <td align="right" bgcolor="#cccccc"><strong>Status:</strong></td>
        <td bgcolor="#cccccc"><select name="status" id="status">
          <option value="pagado" <?php  if($status=="pagado"){ echo' selected ';} ?>>Pagado</option>
          <option value="no pagado" <?php  if($status=="no pagado"){ echo' selected ';} ?>>No pagado</option>
        </select>        </td>
      </tr>
      

      

    </table>      </td>
    </tr>

  <tr>

    <td align="center" valign="top"><input type="submit" name="Submit" value="Enviar" onclick="this.disabled=true;this.form.submit();"/> &nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" /></td>
    </tr>


</table>

                  </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>