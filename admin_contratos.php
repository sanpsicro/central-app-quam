<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks"><?php  $checa_array1=array_search("4_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_contratos&accela=new">Nuevo Contrato</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle">&nbsp; 
</td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">B&uacutesqueda: 
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
                <td valign="top" align="center"> <form name="form2" method="post" action="bridge.php?module=admin_contratos&accela=new">

                  <table width="100%%" border="0" cellspacing="3" cellpadding="3">

                    <tr>

                      <td width="48%" align="center" bgcolor="#CCCCCC"><strong>Buscar Cliente: 

                        <input name="cliente" type="text" id="cliente" size="50" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/>

                        <input type="submit" name="Submit2" value="Buscar" />

                      </strong></td>

                      </tr>

                  </table>

                                </form>

								

							<?php
						
isset($_GET['cliente']) ? $cliente = $_GET['cliente'] : $cliente = "" ;
isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = "" ;
$valid_userid = $_SESSION['valid_userid'];
							
if($_SESSION["valid_tipo"]!="administrador"){$subcondicion="AND idEmpleado='$valid_userid'";}
else{$subcondicion="";}						
							
$checa_array1=array_search("4_a",$explota_permisos);
if($checa_array1===FALSE){} else{
							if(isset($cliente) && $cliente!=""){
							echo'<br><b><div class="xplik">Resultados de la b&uacutesqueda:</div></b><p>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Cliente where nombre like '%".$cliente."%' $subcondicion order by nombre"); 


if (mysqli_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';

$bgcolor="#cccccc";

  while ($row = @mysqli_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass">'.$row["nombre"].'</td><td bgcolor="'.$bgcolor.'" class="dataclass" align=middle width=200><a href="?module=admin_contratos_b&idCliente='.$row["idCliente"].'&accela='.$accela.'">Generar Contrato para este Cliente</a></td></tr>';

							}

							echo'</table>';

							}

							}

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