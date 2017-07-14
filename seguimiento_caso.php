<script type="text/javascript">

function creaAjax(){
    var objetoAjax=false;
	try {
          /*Para navegadores distintos a internet explorer*/
          objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        } 
		catch (e) 
		{
			try {
                   /*Para explorer*/
                   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (E) {
	                objetoAjax = false;
				}
        }
		
    if (!objetoAjax && typeof XMLHttpRequest!='undefined') 
	{
		objetoAjax = new XMLHttpRequest();
	}
		return objetoAjax;
}

function FAjax (url,capa,valores,metodo)
{
		          var ajax=creaAjax();
		          var capaContenedora = document.getElementById(capa);
		/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/
		if(metodo.toUpperCase()=='POST'){
		         ajax.open ('POST', url, true);
		         ajax.onreadystatechange = function() 
					{
						if (ajax.readyState==1) {
		                    capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"../img/loading.gif\"> <b><font color=\"#eeeeee\">Cargando.......</font></b></td></tr></table>";
						}
						else if (ajax.readyState==4){
		                   if(ajax.status==200)
		                   {
		                        document.getElementById(capa).innerHTML=ajax.responseText;
		                   }
		                   else if(ajax.status==404)
		                            capaContenedora.innerHTML = "La direccion no existe";
		               }
		               else{
		                    capaContenedora.innerHTML = "Error: ".ajax.status;
		                }
		            }
	
		         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		         ajax.send(valores);
		         return;		
}

/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/

if (metodo.toUpperCase()=='GET'){
         ajax.open ('GET', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                                      capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"../img/loading.gif\" align=\"absmiddle\"> <b><font color=\"#cccccc\" size=3 face=arial>Cargando...</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200){
                                             document.getElementById(capa).innerHTML=ajax.responseText;
                   }
                   else if(ajax.status==404)
                                             {
                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                                             else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
          }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(null);
         return
}
} 

</script>

<script type="text/javascript">

function confirmDelete(delUrl,name_cat) { 

if (confirm("¿Está seguro de querer eliminar \n" + name_cat + "?")) { 

document.location = delUrl; 

}

}

</script>
<?php
isset($_GET['id']) ? $id = $_GET['id'] : $id = "" ; 

include 'conf.php';
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
$link = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database);
$result=mysqli_query($link, "SELECT tipo FROM servicios,general where general.servicio=servicios.id AND general.id='".$id."'") ;
$tipoServicio=mysqli_result($result,0,"tipo");
?>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Seguimiento</span></td>
      <td width=100 class="blacklinks"><?php  if($tipoServicio=="legal"){echo "<a href='?module=detail_seguimiento&id=".$id."' >Detalle</a> | <a href='?module=conclusion_caso&id=".$id."'>Conclusi�n</a>";}?></td>




      </tr></table></td></tr>



<tr>



  <td>

  

  <table width="100%" border="0" cellspacing="3" cellpadding="3">

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><strong>Criterio de responsabilidad</strong></td>

      </tr></table>

	  <div id="criterio">	 

<?php 



$db = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '".$id."'");

#echo $id;

if (mysqli_num_rows($result)){ 

$resp_ajustador=mysqli_result($result,0,"resp_ajustador");

$resp_abogado=mysqli_result($result,0,"resp_abogado");

$resp_perito=mysqli_result($result,0,"resp_perito");

$resp_consignado=mysqli_result($result,0,"resp_consignado");

$juzgado=mysqli_result($result,0,"juzgado");

$causa_penal=mysqli_result($result,0,"causa_penal");

$procesado=mysqli_result($result,0,"procesado");

}	  

?>	   

	    <table width="100%" border="0" cellspacing="3" cellpadding="3">

    <tr>

      <td width="25%" bgcolor="#ffffff"><strong>Ajustador:</strong> <?php  echo $resp_ajustador; ?></td>

      <td width="25%" bgcolor="#ffffff"><strong>Abogado:</strong> <?php  echo $resp_abogado; ?></td>

      <td width="25%" bgcolor="#ffffff"><strong>Perito:</strong> <?php  echo $resp_perito; ?></td>

      <td width="25%" bgcolor="#ffffff"><strong>Consignado:</strong> <?php  echo $resp_consignado; ?></td>

    </tr>

    <tr>

      <td colspan="4" bgcolor="#ffffff"><strong>Juzgado:</strong> <?php  echo $juzgado; ?></td>

      </tr>

    <tr>

      <td colspan="4" bgcolor="#ffffff"><strong>Causa penal: </strong> <?php  echo $causa_penal; ?></td>

      </tr>

    <tr>

      <td bgcolor="#ffffff"><strong>Procesado:</strong> <?php  echo $procesado; ?></td>

      <td bgcolor="#ffffff">&nbsp;</td>

      <td bgcolor="#ffffff">&nbsp;</td>

      <td align="right" bgcolor="#ffffff"><strong>[ <a href="javascript:FAjax('editar_criterio.php?id=<?php  echo $id;?>&flim-flam=new Date().getTime()','criterio','','get');">Editar</a> ]</strong></td>

    </tr>

  </table>

	  

  </div>

  <table width="100%" border="0" cellspacing="3" cellpadding="3">

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td><strong>Notas</strong></td>

          <td align="right"><b>[ <a href="javascript:FAjax('editar_notas.php?id=<?php  echo $id; ?>&amp;caso=nuevo&amp;flim-flam=new Date().getTime();','notas','','get');">Agregar Nota</a> ]</b></td>

        </tr>

      </table></td>

      </tr></table>
 <table width="100%" border="0" cellspacing="2" cellpadding="0">
<tr>
<td valign="top">
	  <div id="notas">

	  <?php 

$link = mysqli_connect($host, $username, $pass,$database); 

//mysql_select_db($database, $link); 

$result = mysqli_query($link,"SELECT * FROM notas_legal where general='".$id."' order by fecha desc"); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 

  

$fexa=$row["fecha"];
list($fechaajuste,$hora)=explode(" ",$fexa);
$fexa=explode("-",$fechaajuste);



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">

		<tr>

		  <td width="33%" bgcolor="#FFFFFF"><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].'</td>

		  <td width="33%" bgcolor="#FFFFFF"><strong>Etapa:</strong> '.$row["etapa"].'</td>

		  <td width="33%" bgcolor="#FFFFFF"><strong>Tipo:</strong> '.$row["tipo"].'</td>

		</tr>

		<tr>

		  <td colspan="3" bgcolor="#FFFFFF"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'</td>

		  </tr>

		<tr>

		  <td colspan="3" bgcolor="#FFFFFF"><strong>Archivos adjuntos: </strong>';

		  

if($row["adjunto1"]!=""){echo'<li><a href="proveedores/adjuntos/'.$row["adjunto1"].'" target="_blank">'.$row["adjunto1"].'</a>';}		  

if($row["adjunto2"]!=""){echo'<li><a href="proveedores/adjuntos/'.$row["adjunto2"].'" target="_blank">'.$row["adjunto2"].'</a>';}		  

if($row["adjunto3"]!=""){echo'<li><a href="proveedores/adjuntos/'.$row["adjunto3"].'" target="_blank">'.$row["adjunto3"].'</a>';}		  

if($row["adjunto4"]!=""){echo'<li><a href="proveedores/adjuntos/'.$row["adjunto4"].'" target="_blank">'.$row["adjunto4"].'</a>';}		  

		  

		  

echo'		  </td></tr>

		<!-- tr>

		  <td colspan="3" align="right" bgcolor="#FFFFFF"><strong>[ 

	  <a href="javascript:FAjax(\'editar_notas.php?id='.$id.'&idnota='.$row["id"].'&caso=editar&flim-flam=new Date().getTime()\',\'notas\',\'\',\'get\');">Editar</a>  |

	  

	  <a href="javascript:confirmDelete(\'upnotes.php?caso=borrar&idnota='.$row["id"].'&id='.$id.'\',\'la nota\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ]</strong></td>

		  </tr -->

		</table><hr>';  

}}

?>

</div>
</td>
<td width="3" bgcolor="#000066"></td>
<td width="49%" valign="top">

<div id="notas2">
		  <?php 
				$link = mysqli_connect($host, $username, $pass,$database); 
				//mysql_select_db($database, $link); 
				$result = mysqli_query($link,"SELECT * FROM notaslegalcliente where general='".$id."' order by fecha desc"); 
				
				
				
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$fexar=$row["fecha"];
				$fexaz=explode(" ",$fexar);
				$fexa=explode("-",$fexaz[0]);
				$userx=$row["usuario"];
				$tipo=$row["tipo"];
				$visto=$row["visto"];
				$mensaje=$row["id"];
				
				
					
								$dbl = mysqli_connect($host,$username,$pass,$database);
				//mysql_select_db($database,$dbl);
				$resultl = mysqli_query($dbl,"SELECT nombre from Cliente where idCliente='".$userx."'");
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");
				}	
					
				
				
			echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
				</tr>
				<tr>
				  <td><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'
				  <br />
				 				  
				  </td>
				  </tr>
				</table>';  
			
}}
?>
</div>
    </td></tr></table>