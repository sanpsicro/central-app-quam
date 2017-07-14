<?php $idCliente = $_GET['idCliente'];?>
<script type="text/javascript" src="subcombo.js"></script>
<script> 
function CheckAll()
{
count = document.frm.elements.length;
    for (i=0; i < count; i++) 
	{
    if(document.frm.elements[i].checked == 1)
    	{document.frm.elements[i].checked = 1; }
    else {document.frm.elements[i].checked = 1;}
	}
}
function UncheckAll(){
count = document.frm.elements.length;
    for (i=0; i < count; i++) 
	{
    if(document.frm.elements[i].checked == 1)
    	{document.frm.elements[i].checked = 0; }
    else {document.frm.elements[i].checked = 0;}
	}
}
</script>
<table border=0 width=100% cellpadding=0 cellspacing=0>

 <tr> 

      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Clientes</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_clientes&accela=new">Nuevo Cliente</a> ]</td></tr></table></td></tr>

 <tr> 

      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>

            

            <td width="400" 			class="questtitle">&nbsp; 
			

</td>



            <td>&nbsp;</td>

            <form name="form1" method="post" action="mainframe.php?module=clientes"><td align="right" class="questtitle">B�squeda: 

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
                <td valign="top" align="center"><p>&nbsp;</p><?php  if(isset($idCliente) && $idCliente!=""){ echo'                  <p><strong>Se ha registrado al Cliente en la base de datos </strong></p>
                  <form id="form2" name="form2" method="post" action="mainframe.php?module=admin_contratos_b&accela=new">
				  <input name="idCliente" type="hidden" value="'.$idCliente.'" />
                    <p>
                      <input name="contrato" type="submit" id="contrato" value="Generar Contrato" />
                    </p>
                    <p>&nbsp;                      </p>
                  </form>';} ?>
                  </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>


</td></tr></table>