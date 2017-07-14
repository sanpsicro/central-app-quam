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

$link = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database);
$result=mysqli_query($link,"SELECT tipo FROM servicios,general where general.servicio=servicios.id AND general.id='".$id."'");
$tipoServicio=mysqli_result($result,0,"tipo");
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Conclusi�n</span></td>
      <td width=100 class="blacklinks"><?php  if($tipoServicio=="legal"){echo "<a href='?module=detail_seguimiento&id=$id'>Detalle</a> | <a href='?module=seguimiento_caso&id=".$id."'>Seguimiento</a>";}?></td>


      </tr></table></td></tr>

<tr>

  <td>
  
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><strong>Conclusi�n del caso</strong></td>
      </tr></table>
	  <div id="finalizacion">	 
<?php

$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$status=mysqli_result($result,0,"status");
}	  
if($status=="finalizado"){
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '$id'");
if (mysqli_num_rows($result)){ 
$final_forma_pago=mysqli_result($result,0,"final_forma_pago");
$final_comentario=mysqli_result($result,0,"final_comentario");
$final_monto=mysqli_result($result,0,"final_monto");
$final_estado=mysqli_result($result,0,"final_estado");
$idex=mysqli_result($result,0,"id");
}	  


echo' <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="25%" bgcolor="#ffffff"><strong>Forma de pago:</strong> '.$final_forma_pago.'</td>
      <td width="25%" bgcolor="#ffffff"><strong>Comentario:</strong> '.$final_comentario.'</td>
      <td width="25%" bgcolor="#ffffff"><strong>Monto:</strong> $'.number_format($final_monto,2).'</td>
      <td width="25%" bgcolor="#ffffff"><strong>Estado:</strong> '.$final_estado.'</td>
    </tr>
    <tr>
      <td colspan="4" align="right" bgcolor="#ffffff"><strong>[ <a href="javascript:FAjax(\'editar_finalizacion.php?id='.$id.'&idex='.$idex.'&caso=editar&flim-flam=new Date().getTime()\',\'finalizacion\',\'\',\'get\');">Editar</a> ]</strong></td>
      </tr>
  </table> ';
}

else{
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td bgcolor="#ffffff" align=middle><b>No ha finalizado el caso<p>
	  <input type="button" name="Button" value="Finalizar caso" onclick="javascript:FAjax(\'editar_finalizacion.php?id='.$_GET[id].'&caso=finalizar&flim-flam=new Date().getTime();\',\'finalizacion\',\'\',\'get\');"/>
	  </b></td></tr></table>';
}
?>	   
	    
  </div>
  </td>
</tr></table>