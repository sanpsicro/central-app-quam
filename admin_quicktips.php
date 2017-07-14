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
            <td><span class="maintitle">Quicktips</span></td><td width=150 class="blacklinks"><p>&nbsp;</p>
              <p>&nbsp;</p></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php  
			
			isset($_GET['id']) ?  $id= $_GET['id'] : $id= "" ;
			isset($_GET['accela']) ?  $accela= $_GET['accela'] : $accela= "" ;

			if($accela=="new"){echo'Nuevo Quicktip';}

			else{echo'Editar Quicktip';



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

  
  function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}

if($accela=="edit" && isset($id)){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from quicktips where id = '$id'");

$titulo=mysqli_result($result,0,"titulo");

$mensaje=mysqli_result($result,0,"mensaje");

$icon=mysqli_result($result,0,"icono");

$visto=mysqli_result($result,0,"visto");

$activo=mysqli_result($result,0,"activo");

}


if($accela=="new"){

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT visto from quicktips where visto > 0 order by visto DESC LIMIT 1");
$vistas=mysqli_result($result,0,"visto");
if ($vistas>2) {
$visto=$vistas-1;
}
else {$visto=1;}
}




echo'<form name="frm" method="post" action="process.php?module=quicktips&accela='.$accela.'&id='.$id.'" onSubmit="return validar(this)">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
      
      <tr>
        
        <td align="right" bgcolor="#cccccc"><strong>T&iacute;tulo: </strong></td>
        
        <td bgcolor="#cccccc"><input name="titulo" type="text" id="titulo" size="50" value="<?php  echo"$titulo";?>"></td>
        
        </tr>
      
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Mensaje:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><textarea name="mensaje" id="mensaje" cols="50" rows="5" /><?php  echo"$mensaje";?></textarea></td>
        
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
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>&Iacute;cono:</strong></td>
        
        <td  bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="5">
               <tr>
               <td><input type="radio" name="icon" value="QT-01.png" <?php  if($icon=="QT-01.png"){echo' checked';} ?> <?php  if (empty($icon)) { echo ' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-01.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-02.png" <?php  if($icon=="QT-02.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-02.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-03.png" <?php  if($icon=="QT-03.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-03.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-04.png" <?php  if($icon=="QT-04.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-04.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-05.png" <?php  if($icon=="QT-05.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-05.png" width="90" height="90"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="QT-06.png" <?php  if($icon=="QT-06.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-06.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-07.png" <?php  if($icon=="QT-07.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-07.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-08.png" <?php  if($icon=="QT-08.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-08.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-09.png" <?php  if($icon=="QT-09.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-09.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-10.png" <?php  if($icon=="QT-10.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-10.png" width="90" height="90"  /></td>
               </tr>
               <tr>
               <td><input type="radio" name="icon" value="QT-11.png" <?php  if($icon=="QT-11.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-11.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-12.png" <?php  if($icon=="QT-12.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-12.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-13.png" <?php  if($icon=="QT-13.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-13.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-14.png" <?php  if($icon=="QT-14.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-14.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-15.png" <?php  if($icon=="QT-15.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-15.png" width="90" height="90"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="QT-16.png" <?php  if($icon=="QT-16.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-16.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-17.png" <?php  if($icon=="QT-17.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-17.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-18.png" <?php  if($icon=="QT-18.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-18.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-19.png" <?php  if($icon=="QT-19.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-19.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-20.png" <?php  if($icon=="QT-20.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-20.png" width="90" height="90"  /></td>
               </tr>
               <tr>
               <td><input type="radio" name="icon" value="QT-21.png" <?php  if($icon=="QT-21.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-21.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-22.png" <?php  if($icon=="QT-22.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-22.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-23.png" <?php  if($icon=="QT-23.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-23.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-24.png" <?php  if($icon=="QT-24.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-24.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-25.png" <?php  if($icon=="QT-25.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-25.png" width="90" height="90"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="QT-26.png" <?php  if($icon=="QT-26.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-26.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-27.png" <?php  if($icon=="QT-27.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-27.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-28.png" <?php  if($icon=="QT-28.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-28.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-29.png" <?php  if($icon=="QT-29.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-29.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-30.png" <?php  if($icon=="QT-30.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-30.png" width="90" height="90"  /></td>
               </tr>
               <tr>
               <td><input type="radio" name="icon" value="QT-31.png" <?php  if($icon=="QT-31.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-31.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-32.png" <?php  if($icon=="QT-32.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-32.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-33.png" <?php  if($icon=="QT-33.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-33.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-34.png" <?php  if($icon=="QT-34.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-34.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-35.png" <?php  if($icon=="QT-35.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-35.png" width="90" height="90"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="QT-36.png" <?php  if($icon=="QT-36.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-36.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-37.png" <?php  if($icon=="QT-37.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-37.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-38.png" <?php  if($icon=="QT-38.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-38.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-39.png" <?php  if($icon=="QT-39.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-39.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-40.png" <?php  if($icon=="QT-40.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-40.png" width="90" height="90"  /></td>
               </tr>
               <tr>
               <td><input type="radio" name="icon" value="QT-41.png" <?php  if($icon=="QT-41.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-41.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-42.png" <?php  if($icon=="QT-42.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-42.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-43.png" <?php  if($icon=="QT-43.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-43.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-44.png" <?php  if($icon=="QT-44.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-44.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-45.png" <?php  if($icon=="QT-45.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-45.png" width="90" height="90"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="QT-46.png" <?php  if($icon=="QT-46.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-46.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-47.png" <?php  if($icon=="QT-47.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-47.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-48.png" <?php  if($icon=="QT-48.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-48.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-49.png" <?php  if($icon=="QT-49.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-49.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-50.png" <?php  if($icon=="QT-50.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-50.png" width="90" height="90"  /></td>
               </tr>
               <tr>
               <td><input type="radio" name="icon" value="QT-51.png" <?php  if($icon=="QT-51.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-51.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-52.png" <?php  if($icon=="QT-52.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-52.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-53.png" <?php  if($icon=="QT-53.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-53.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-54.png" <?php  if($icon=="QT-54.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-54.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-55.png" <?php  if($icon=="QT-55.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-55.png" width="90" height="90"  /></td>
               </tr>  
                <tr>
               <td><input type="radio" name="icon" value="QT-56.png" <?php  if($icon=="QT-56.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-56.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-57.png" <?php  if($icon=="QT-57.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-57.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-58.png" <?php  if($icon=="QT-58.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-58.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-59.png" <?php  if($icon=="QT-59.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-59.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-60.png" <?php  if($icon=="QT-60.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-60.png" width="90" height="90"  /></td>
               </tr>     
                <tr>
               <td><input type="radio" name="icon" value="QT-61.png" <?php  if($icon=="QT-61.png"){echo' checked';} ?>  /></td>
               <td width="95"><img src="icon/qt/QT-61.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-62.png" <?php  if($icon=="QT-62.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-62.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-63.png" <?php  if($icon=="QT-63.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-63.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-64.png" <?php  if($icon=="QT-64.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-64.png" width="90" height="90"  /></td>
               <td width="20"></td>
               <td><input type="radio" name="icon" value="QT-65.png" <?php  if($icon=="QT-65.png"){echo' checked';} ?> /></td>
               <td width="95"><img src="icon/qt/QT-65.png" width="90" height="90"  /></td>
               </tr>             
               </table></td>
        
        </tr>
      
      </table>
      
    </td>

    </tr>

</table>
<input type="hidden" name="visto" value="<?php  echo"$visto";?>" />
<input type="submit" name="Submit" value="Guardar"/> 
&nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" />    <br /><br />

<a href="?module=quicktips" class="blacklinks">CANCELAR</a>      <br />
<br />
     </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>