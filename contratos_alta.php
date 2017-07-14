<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_contratos&accela=new">Nuevo Contrato</a> ]</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
         <tr>
            <td width="400" 			class="questtitle">&nbsp; 
</td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="mainframe.php?module=contratos"><td align="right" class="questtitle">B&uacutesqueda: 
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
                <td valign="top" align="center"><p>&nbsp;</p>
                <?php  
                isset($_POST['tmpid']) ? $tmpid = $_POST['tmpid'] : $tmpid = 0 ;
                isset($_POST['cliente']) ? $cliente = $_POST['cliente'] : $cliente = 0 ;
                isset($_POST['rfc']) ? $rfc = $_POST['rfc'] : $rfc = 0 ;
                isset($_POST['numcontrato']) ? $numcontrato = $_POST['numcontrato'] : $numcontrato = 0 ;
                isset($_POST['producto']) ? $producto = $_POST['producto'] : $producto = 0 ;
                isset($_GET['idPoliza']) ? $idPoliza = $_GET['idPoliza'] : $idPoliza = "" ;
				
$checa_array1=array_search("4_i",$explota_permisos);

if($checa_array1===FALSE){
echo'<p><strong>Se ha registrado el Contrato en la base de datos </strong></p><br><br>

<a href="?module=contratos">Ir a lista de contratos</a><br><br>';
} else{
				
				
				if(isset($idPoliza) && $idPoliza!=""){ echo'<p><strong>Se ha registrado el Contrato en la base de datos </strong></p>
                  <form id="form2" name="form2" method="post" action="imprime_contrato.php" target="_blank">
				  <input name="idPoliza" type="hidden" value="'.$idPoliza.'" />
                    <p>
                      <input name="submit" type="submit" id="submit" value="Imprimir Contrato" />
                    </p>
                    <p>&nbsp;                      </p>
                  </form>';} 
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