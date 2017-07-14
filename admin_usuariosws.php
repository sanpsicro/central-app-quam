<?php 
isset($_GET['idusuario']) ? $idusuario= $_GET['idusuario'] : $idusuario= "" ;
isset($_GET['accela']) ? $accela= $_GET['accela'] : $accela= "" ;

?>
<script type="text/javascript" src="subcombo.js"></script>

<style type="text/css">

<!--

.style1 {font-size: 9px}
.stylex2 {font-size: 9px; font-weight: bold; }

-->

</style>

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
<script Language="JavaScript">
function validar(formulario) {

  if (formulario.usuario.value.length < 4) {
    alert("Escriba un nombre de usuario");
    formulario.usuario.focus();
    return (false);
  }


  if (formulario.contrasena.value.length < 4) {
    alert("Escriba una contrase�a");
    formulario.contrasena.focus();
    return (false);
  }
  
  
  if (formulario.nombre.value.length < 4) {
    alert("Escriba un nombre");
    formulario.nombre.focus();
    return (false);
  }
  
    if (formulario.cargo.value.length < 4) {
    alert("Escriba un cargo");
    formulario.cargo.focus();
    return (false);
  }
  
    if (formulario.direccion.value.length < 4) {
    alert("Escriba una direcci�n");
    formulario.direccion.focus();
    return (false);
  }
  
      if (formulario.estado.value == 0) {
    alert("Seleccione un estado");
    formulario.estado.focus();
    return (false);
  }
  
        if (formulario.municipio.value == 0) {
    alert("Seleccione un municipio");
    formulario.municipio.focus();
    return (false);
  }
  
          if (formulario.colonia.value == 0) {
    alert("Seleccione una colonia");
    formulario.colonia.focus();
    return (false);
  }
  
     if (formulario.telefonocasa.value.length < 4) {
    alert("Escriba un tel�fono");
    formulario.telefonocasa.focus();
    return (false);
  }
  /*
  
  if ((formulario.email.value.indexOf ('@', 0) == -1)||(formulario.email.value.length < 5)) { 
    alert("Escriba una direcci�n de correo v�lida"); 
	    formulario.email.focus();
    return (false); 
  }
  */
  return (true); 
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Usuarios Webservice</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("ws_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuarios&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php  
			
			

			if($accela=="new"){echo'Dar de alta Usuario';}

			else{echo'Editar Usuario';



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

 if($accela=="edit" && isset($idusuario)){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from webservice where idusuario = '$idusuario'");

$usuario=mysqli_result($result,0,"usuario");

$contrasena=mysqli_result($result,0,"contrasena");

$nombre=mysqli_result($result,0,"nombre");

$email=mysqli_result($result,0,"email");

$contrato1=mysqli_result($result,0,"contrato1");

$contrato2=mysqli_result($result,0,"contrato2");

$contrato3=mysqli_result($result,0,"contrato3");

$contrato4=mysqli_result($result,0,"contrato4");

$contrato5=mysqli_result($result,0,"contrato5");

$activo=mysqli_result($result,0,"activo");

}



echo'<form name="frm" method="post" action="process.php?module=usuariosws&accela='.$accela.'&idusuario='.$idusuario.'" onSubmit="return validar(this)">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      
      <tr>
        
        <td align="right" bgcolor="#cccccc"><strong>Usuario:</strong></td>
        
        <td bgcolor="#cccccc"><input name="usuario" type="text" id="usuario" size="50" value="<?php  echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
        
        </tr>
      
      <tr>
        
        <td align="right" bgcolor="#cccccc"><strong>Contrase&ntilde;a:</strong></td>
        
        <td bgcolor="#cccccc"><input name="contrasena" type="password" id="contrasena" size="50" value="<?php  echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<?php  echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Email:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="email" type="text" id="email" size="50" value="<?php  echo"$email";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 1:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato1" type="text" id="email" size="50" value="<?php  echo"$contrato1";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 2:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato2" type="text" id="email" size="50" value="<?php  echo"$contrato2";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 3:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato3" type="text" id="email" size="50" value="<?php  echo"$contrato3";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 4:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato4" type="text" id="email" size="50" value="<?php  echo"$contrato4";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Contrato 5:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="contrato5" type="text" id="email" size="50" value="<?php  echo"$contrato5";?>"/></td>
        
        </tr>
      
      <tr>
        
        <td align="right" valign="top" bgcolor="#cccccc"><strong>Usuario Activo:</strong> </td>
        
        <td bgcolor="#cccccc"><select name="activo" id="activo">
          
          <option value="1" <?php  if($activo=="1"){echo' selected';} ?>>Si</option>
          
          <option value="0" <?php  if($activo=="0"){echo' selected';} ?>>No</option>
          
          </select>        </td>
        
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