<?php
$checa_array1=array_search("cap_a",$explota_permisos);
isset($_GET['accela']) ? $accela = $_GET['accela'] : $accela = null;
isset($_GET['capid']) ? $capid = $_GET['capid'] : $capid = null;
if($checa_array1===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{} ?>


	<!-- Add jQuery library -->
	

	<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox-archivos').fancybox({
				
				
	'width'  : 850,           // set the width
    'height' : 600,           // set the height
	'autoSize' : false,
    'type'   : 'iframe',      // tell the script to create an iframe
	 modal : false,
				
				});

		});
	</script>

<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	relative_urls: true,
	language: "es_MX",
	theme: "modern",
	width: 680,
	height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
  
   external_filemanager_path:"/filemanager/",
   filemanager_title:"Archivos" ,
   filemanager_access_key:"chksiw299aX" ,
   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
 });
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>




 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php  

			if($accela=="new"){echo'Nuevo Tema';}

			else{echo'Editar Carpeta';



			}

			?>



</td>







            <td>&nbsp;</td>



            <td align="right" class="questtitle">



            </td>



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

 if($accela=="edit" && isset($contid)){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query("SELECT * from modcont where id = '$contid'",$db);
$titulo=mysqli_result($result,0,"titulo");
$tipo=mysqli_result($result,0,"tipo");
$contenido=mysqli_result($result,0,"contenido");
$archivo=mysqli_result($result,0,"archivo");
$activo=mysqli_result($result,0,"activo");


}



echo'<form name="frm" method="post" action="process.php?module=carpetas&accela='.$accela.'&capid='.$capid.'&contid='.$contid.'"">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                  
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>T&iacute;tulo:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="titulo" type="text" id="nombre" size="50" value="<?php  echo"$titulo";?>" /></td>
        
        </tr>
    
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Tipo:</strong></td>
        
               <td bgcolor="#FFFFFF" width="200" valign="top">
               
               <input type="radio" name="tipo" value="1" <?php  if($tipo=="1"){echo' checked';} ?> <?php  if (empty($tipo)) { echo ' checked';} ?> /> Contenido <br /><br />
               
                              <input type="radio" name="tipo" value="2" <?php  if($tipo=="2"){echo' checked';} ?> /> Descarga <br /><br />
               
     </td>
        </tr>
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Contenido:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><textarea name="contenido"><?php  echo"$contenido";?></textarea></td>
        
        </tr>
  
       <tr>
        
        <td width="100" align="right" valign="middle" bgcolor="#cccccc"><strong>Archivo:</strong>
        <br /><br />
        </td>
        
        <td width="200" bgcolor="#cccccc"><input name="archivo" type="text" id="fieldID2" size="50" value="<?php  echo"$archivo";?>" />
        <a class="fancybox-archivos fancybox.iframe bklink" href="filemanager/dialog.php?type=2&field_id=fieldID2&akey=chksiw299aX">Seleccionar</a>
                </td>
        
        </tr>
      
        <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Activo:</strong></td>
        
               <td bgcolor="#FFFFFF" width="200" valign="top">
               
               <select name="activo" id="activo">

          <option value="1" <?php  if($activo=="1"){echo' selected';} ?>>Si</option>

          <option value="0" <?php  if($activo=="0"){echo' selected';} ?>>No</option>

        </select>   
                             
               
     </td>
        </tr>
      
      </table>
      
    </td>

    </tr>

</table>

<input type="submit" name="Submit" value="Guardar"/> 
&nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" />                      </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>