<?php $checa_arrayx=array_search("cabina",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['idcaso']) ? $idcaso = $_GET['idcaso'] : $idcaso ="";
?>

<script type="text/javascript" src="subcombo.js"></script>
<script type="text/javascript"> 
function confirmcancel(delUrl) { 
if (confirm('Desea cancelar el servicio?')) { 
document.location = delUrl; 
}
}
</script>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>


<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><span class="maintitle">Cabina</span></td></tr>
	   <tr> <td  align="right">&nbsp; </td></tr>
 <tr>
   <td align="left"><form id="form1" name="form1" method="post" action="process.php?module=cabina_d&idcaso=<?php echo $idcaso;?>&accela=new">

     <table width="100%%" border="0" cellpadding="3" cellspacing="3">
       <tr>
         <td colspan="6" bgcolor="#999999"><span class="style1">Asignar proveedor </span></td>
       </tr>

       <tr>
         <td colspan="6" bgcolor="#CCCCCC"><p><strong>Proveedor: </strong></p>
		 <?php 		 	 
		 
		 echo'<iframe src ="asigna_proveedor.php?idcaso='.$idcaso.'" width="100%" height=400 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window2"></iframe>';
		 ?>           </td>
         </tr>
       <tr>
         <td colspan="6" bgcolor="#CCCCCC"><div align="center"><strong>Observaciones:<br />  
                 <textarea name="observaciones" cols="100" rows="5" id="observaciones"></textarea>
         </strong></div></td>
       </tr>
		
       
       <tr>
         <td colspan="6" align="center" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="C O N C L U I R   A L T A   D E   S E R V I C I O" />
           &nbsp;
           <input type="button" name="button2" id="button2" value="C A N C E L A R   S E R V I C I O" onClick="javascript:confirmcancel('process.php?module=cabina_d&accela=cancelar&idcaso=<?php echo $idcaso; ?>');" onMouseover="window.status=''; return true;"/></td>
         </tr>
     </table>
      </form>
   </td>
 </tr>
</table>
