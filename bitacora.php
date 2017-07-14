<?php
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
$expedientex=$id;
if(strlen($expedientex)==1){$expedientex="000000".$expedientex."";} 
if(strlen($expedientex)==2){$expedientex="00000".$expedientex."";} 
if(strlen($expedientex)==3){$expedientex="0000".$expedientex."";} 
if(strlen($expedientex)==4){$expedientex="000".$expedientex."";} 
if(strlen($expedientex)==5){$expedientex="00".$expedientex."";} 
if(strlen($expedientex)==6){$expedientex="0".$expedientex."";} 

?>
<script type="text/javascript">
function creaAjax(){
         var objetoAjax=false;
         try {
          /*Para navegadores distintos a internet explorer*/
          objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
          try {
                   /*Para explorer*/
                   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   catch (E) {
                   objetoAjax = false;
          }
         }

         if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
          objetoAjax = new XMLHttpRequest();
         }
         return objetoAjax;
}

/*----
*/   
function FAjax (url,capa,valores,metodo)
{
          var ajax=creaAjax();
          var capaContenedora = document.getElementById(capa);

/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/
if(metodo.toUpperCase()=='POST'){
         ajax.open ('POST', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                          capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"../img/loading.gif\"> <b><font color=\"#eeeeee\">Cargando.......</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200)
                   {
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

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Seguimiento / Expediente <?php echo $expedientex;?> </span></td>
      <td width=200 align="right" class="blacklinks">&nbsp;</td>

      </tr></table></td></tr>

<tr>

  <td>
  
	 
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Notas</strong></td>
          <td align="right"><b>[ <a href="javascript:FAjax('editar_notasb.php?id=<?php echo $id; ?>&amp;popup=0&amp;caso=nuevo&amp;flim-flam=new Date().getTime();','notas','','get');">Agregar Nota</a> ]</b></td>
        </tr>
      </table></td>
      </tr></table>
	  <div id="notas">
	  
	  
	  
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

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link ,"SELECT * FROM bitacora where general='".$id."' order by fecha desc"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  

$fexar=$row["fecha"];
$fexaz=explode(" ",$fexar);
$fexa=explode("-",$fexaz[0]);
$userx=$row["usuario"];

$dbl = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbl);
$resultl = mysqli_query($dbl,"SELECT * from Empleado where idEmpleado='".$userx."'");
if (mysqli_num_rows($resultl)){ 
$eluserx=mysqli_result($resultl,0,"nombre");
}

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'</td>
		  </tr>
<!-- 		
		<tr>
		  <td  align="right" bgcolor="#cccccc"><strong>[ 
	  <a href="javascript:FAjax(\'editar_notasb.php?id='.$id.'&idnota='.$row["id"].'&caso=editar&flim-flam=new Date().getTime()\',\'notas\',\'\',\'get\');">Editar</a>  |
	  
	  <a href="javascript:confirmDelete(\'upnotesb.php?caso=borrar&idnota='.$row["id"].'&id='.$id.'\',\'la nota\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ]</strong></td>
		  </tr> -->
		</table>';  
		$eluserx="";
}}
?>
</div>
    </td></tr></table>