<?php  

$linka = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$resultar = mysqli_query("SELECT * FROM Provedor where id='$_GET[id]' LIMIT 1", $link); 
if (mysqli_num_rows($resultar)){ 
  while ($row = @mysqli_fetch_array($resultar)) { 
  

$nombrep=$row["nombre"];
  }
}
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
if (confirm("�Est� seguro de querer eliminar \n" + name_cat + "?")) { 
document.location = delUrl; 
}
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="questtitle">Notas / Proveedor <?php  echo $nombrep;?> </span></td>
      <td width=200 align="right" class="blacklinks">&nbsp;</td>

      </tr></table></td></tr>

<tr>

  <td>
  
	 
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Notas</strong></td>
          <td align="right"><b>[ <a href="javascript:FAjax('editar_notasp.php?id=<?php  echo $id; ?>&amp;popup=0&amp;caso=nuevo&amp;flim-flam=new Date().getTime();','notas','','get');">Agregar Nota</a> ]</b></td>
        </tr>
      </table></td>
      </tr></table>
	  <div id="notas">
	  <?php  
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM notasprov where general='$id' order by fecha desc", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  

$fexar=$row["fecha"];
$fexaz=explode(" ",$fexar);
$fexa=explode("-",$fexaz[0]);
$userx=$row["usuario"];

$dbl = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbl);
$resultl = mysqli_query("SELECT * from Empleado where idEmpleado='$userx'",$dbl);
if (mysqli_num_rows($resultl)){ 
$eluserx=mysql_result($resultl,0,"nombre");
}

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'</td>
		  </tr>

		</table>';  
		$eluserx="";
}}
?>
</div>
    </td></tr></table>