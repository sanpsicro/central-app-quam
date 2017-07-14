<?php 
isset($_GET['id']) ? $id  = $_GET['id'] : $id = null ;
isset($_GET['accela']) ? $accela  = $_GET['accela'] : $accela = null ;
?>
<script type="text/javascript" src="subcombo_corto.js"></script>
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
    selector: "textarea#precios",
	relative_urls: true,
	language: "es_MX",
	theme: "modern",
	width: 380,
	height: 200,
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

      <td height="44" align="left" background="img/blackbar.gif"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Proveedores</span></td><td width=150 class="blacklinks">[ <a href="admin_proveedores.php?accela=new">Nuevo Proveedor</a> ]</td></tr></table></td></tr>

 <tr> 

      <td height="47" align="left" background="img/bar5.gif"><table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>

            

            <td width="400" 			class="questtitle"> 
            
            
  <?php 
  
 
			if($accela=="new"){echo'Dar de alta Proveedor';}
			else{echo'Editar Proveedor';

			}
			if($accela=="new"){
$_SESSION['coberturas']="";
}
			?>

</td>



            <td>&nbsp;</td>

            <form name="form1" method="post" action="bridge.php?module=proveedores"><td align="right" class="questtitle">B�squeda: 

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

 if($accela=="edit" && isset($id)){
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Provedor where id = '$id'");
$nombre=mysqli_result($result,0,"nombre");
$usuario=mysqli_result($result,0,"usuario");
$contrasena=mysqli_result($result,0,"contrasena");
$calle=mysqli_result($result,0,"calle");
$colonia=mysqli_result($result,0,"colonia");
$cp=mysqli_result($result,0,"cp");
$estado=mysqli_result($result,0,"estado");
$municipio=mysqli_result($result,0,"municipio");
$especialidad=mysqli_result($result,0,"especialidad");
$trabajos=mysqli_result($result,0,"trabajos");
$serviciosx=explode(",",$trabajos);
$cobertura=mysqli_result($result,0,"cobertura");
$horario=mysqli_result($result,0,"horario");
$precios=mysqli_result($result,0,"precios");
$sucursales=mysqli_result($result,0,"sucursales");
$contacto=mysqli_result($result,0,"contacto");
$tel=mysqli_result($result,0,"tel");
$fax=mysqli_result($result,0,"fax");
$cel=mysqli_result($result,0,"cel");
$nextel=mysqli_result($result,0,"nextel");
$nextelid=mysqli_result($result,0,"nextelid");
$nextelid2=mysqli_result($result,0,"nextelid2");
$telcasa=mysqli_result($result,0,"telcasa");
$telcasa2=mysqli_result($result,0,"telcasa2");
$mail=mysqli_result($result,0,"mail");
$contacto2=mysqli_result($result,0,"contacto2");
$tel2=mysqli_result($result,0,"tel2");
$fax2=mysqli_result($result,0,"fax2");
$cel2=mysqli_result($result,0,"cel2");
$nextel2=mysqli_result($result,0,"nextel2");
$mail2=mysqli_result($result,0,"mail2");
$banco=mysqli_result($result,0,"banco");
$numcuenta=mysqli_result($result,0,"numcuenta");
$clabe=mysqli_result($result,0,"clabe");
$observaciones=mysqli_result($result,0,"observaciones");
$status=mysqli_result($result,0,"status");
$lastuser=mysqli_result($result,0,"lastuser");
$lastdate=mysqli_result($result,0,"lastdate");
}
echo'<form name="form1" method="post" action="process.php?module=proveedores&accela='.$accela.'&id='.$id.'">';     

?>

                      <table border="0" cellspacing="3" cellpadding="3" width=100%>

                        <tr>
                          <td align="right" valign="top"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <td align="right" bgcolor="#eeeeee"><strong>Nombre:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nombre" type="text" id="nombre" size="50" value="<?php  echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Usuario:</strong></td>
                              <td bgcolor="#eeeeee"><input name="usuario" type="text" id="usuario" size="50" value="<?php  echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contrase&ntilde;a:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contrasena" type="password" id="contrasena" size="50" value="<?php  echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Calle y no.:</strong></td>
                              <td bgcolor="#eeeeee"><input name="calle" type="text" id="calle" size="50" value="<?php  echo"$calle";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Colonia:</strong></td>
                              <td bgcolor="#eeeeee"><input name="colonia" type="text" id="colonia" size="50" value="<?php  echo"$colonia";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>C.P.:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cp" type="text" id="cp" size="50" value="<?php  echo"$cp";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Estado:</strong></td>
                              <td bgcolor="#eeeeee"><select name="estado" id="estado" onchange='cargaContenido(this.id)'>
                                  <option value='0'>Seleccione un Estado</option>
                                  <?php  

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

			  ?>
                              </select></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Municipio:</strong></td>
                              <td bgcolor="#eeeeee"><?php  
						  if($accela=="edit"){
						 echo'  <select name="municipio" id="municipio">';


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}

					  
echo'</select>';
						  }
						  else{echo'<select disabled="disabled" name="municipio" id="municipio">
						<option value="0">Seleccione un Estado</option>
					</select>';}
						  ?>                              </td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Especialidad:</strong></td>
                              <td bgcolor="#eeeeee"><input name="especialidad" type="text" id="especialidad" size="50" value="<?php  echo"$especialidad";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Trabajos que realiza:</strong></td>
                              <td bgcolor="#eeeeee"><?php  
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM servicios"); 
if (mysqli_num_rows($result)){ 
$cuenta=0;
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';

while ($row = @mysqli_fetch_array($result)) { 
if($cuenta=="0"){echo'<tr>';}

echo'<td bgcolor="#eeeeee" width=50%><input name="servicios[]" id="servicios" type="checkbox" value="'.$row["id"].'"';
$checa_array=array_search($row["id"],$serviciosx);
if($checa_array===FALSE){} else{echo ' checked';}
echo'> '.$row["servicio"].'</td>';

$cuenta=$cuenta+1;
if($cuenta=="2"){echo'</tr>'; $cuenta=0;}
  }  

echo'</table>';
  }
?></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Horario de atenci&oacute;n:</strong> </td>
                              <td bgcolor="#eeeeee"><input name="horario" type="text" id="horario" size="50" value="<?php  echo"$horario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Lista de Precios:</strong> </td>
                              <td bgcolor="#eeeeee"><textarea name="precios" cols="50" rows="5" id="precios" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><?php  echo"$precios";?></textarea></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Sucursales:</strong></td>
                              <td bgcolor="#eeeeee"><textarea name="sucursales" cols="50" rows="5" id="sucursales" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><?php  echo"$sucursales";?></textarea></td>
                            </tr>
                          </table></td>
                          <td colspan="2" align="right" valign="top"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contacto 1:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contacto" type="text" id="contacto" onblur="f(this)" onclick="f(this)" onkeydown="f(this)" onkeyup="f(this)" size="50" onattrmodified="g(this)" onpropertychange="g(this)" value="<?php  echo"$contacto";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 1:</strong></td>
                              <td bgcolor="#eeeeee"><input name="tel" type="text" id="tel" size="50" value="<?php  echo"$tel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 2:</strong></td>
                              <td bgcolor="#eeeeee"><input name="tel2" type="text" id="tel2" size="50" value="<?php  echo"$tel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 3:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="fax2" type="text" id="fax2" size="50" value="<?php  echo"$fax2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel / Fax:</strong></td>
                              <td bgcolor="#eeeeee"><input name="fax" type="text" id="fax" size="50" value="<?php  echo"$fax";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Celular:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cel" type="text" id="cel" size="50" value="<?php  echo"$cel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Nextel:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nextel" type="text" id="nextel" size="50" value="<?php  echo"$nextel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>ID Nextel:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nextelid" type="text" id="nextelid" size="50" value="<?php  echo"$nextelid";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Casa:</strong></td>
                              <td bgcolor="#eeeeee"><input name="telcasa" type="text" id="telcasa" size="50" value="<?php  echo"$telcasa";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>E-mail:</strong></td>
                              <td bgcolor="#eeeeee"><input name="mail" type="text" id="mail" size="50" value="<?php  echo"$mail";?>" /></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contacto 2:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contacto2" type="text" id="contacto2" onblur="f(this)" onclick="f(this)" onkeydown="f(this)" onkeyup="f(this)" size="50" onattrmodified="g(this)" onpropertychange="g(this)" value="<?php  echo"$contacto2";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel&eacute;fono Celular:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cel2" type="text" id="cel2" size="50" value="<?php  echo"$cel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Nextel:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="nextel2" type="text" id="nextel2" size="50" value="<?php  echo"$nextel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>ID Nextel:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="nextelid2" type="text" id="nextelid2" size="50" value="<?php  echo"$nextelid2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>E-mail:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="mail2" type="text" id="mail2" size="50" value="<?php  echo"$mail2";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Banco:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="banco" type="text" id="banco" size="50" value="<?php  echo"$banco";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>No. de Cuenta:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="numcuenta" type="text" id="numcuenta" size="50" value="<?php  echo"$numcuenta";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>CLABE:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="clabe" type="text" id="clabe" size="50" value="<?php  echo"$clabe";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Observaciones:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><strong><strong>
                                <textarea name="observaciones" cols="50" rows="10" id="observaciones" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><?php  echo"$observaciones";?></textarea>
                              </strong></strong></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Status:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><select name="status" id="status">
                                <option value="activo" <?php  if($status=="activo"){echo' selected ';} ?>>Activo</option>
                                <option value="inactivo" <?php  if($status=="inactivo"){echo' selected ';} ?>>Inactivo</option>
                              </select>
                              </td>
                            </tr>
                            						<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Modificado:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><?php  echo"$lastdate";?> por: <strong><?php  echo"$lastuser";?></strong></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee" colspan="2">
                           <?php  
			if($accela=="new"){echo'';}
			else{echo'<iframe src ="notas_proveedorb.php?&id='.$id.'&popup=1" name="window2" width="100%" marginwidth="50" height="200" marginheight="50" align="30" frameborder="0" id="window2" border="0"></iframe>';

			}
			?>
                           
                          
                              </td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
					  
					  <table width="100%" border="0" cellspacing="3" cellpadding="3">
                                                      <tr>
                                                        <td width="100%" bgcolor="#eeeeee"> <strong>Areas de cobertura:</strong>
														<?php  
														echo'<iframe src ="areas_cobertura.php?accela='.$accela.'&id='.$id.'" name="window1" width="100%" marginwidth="50" height="200" marginheight="50" align="30" frameborder="0" id="window1" border="0"></iframe>';
														?>
                                                      </td>
                                                      </tr>
                                                    </table>
                      <input type="submit" name="Submit" value="Guardar" />
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