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

$accela = $_GET['accela'];

$checa_array1=array_search("cap_a",$explota_permisos);

if($checa_array1===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{} ?>

<table border=0 width=100% cellpadding=0 cellspacing=0>




 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php  

			if($accela=="new"){echo'Nueva Carpeta';}

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



<?php  if($accela=="edit" && isset($capid)){

$db = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from modcap where cid = '$capid'");
$idpermi=mysqli_result($result,0,"idpermi");
$nombre=mysqli_result($result,0,"nombre");
$icon=mysqli_result($result,0,"ico");
$activo=mysqli_result($result,0,"activo");


}



echo'<form name="frm" method="post" action="process.php?module=capacitacion&accela='.$accela.'&capid='.$capid.'&parent='.$parent.'">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                  
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<?php  echo"$nombre";?>" /> <input name="idpermi" type="hidden" id="idpermi" size="50" value="dir" /></td>
        
        </tr>
    
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Folder:</strong></td>
        
               <td bgcolor="#FFFFFF" width="200" valign="top">
               
               <table border="0" cellspacing="0" cellpadding="5">
               <tr>
               <td><input type="radio" name="icon" value="azul.png" <?php  if($icon=="azul.png"){echo' checked';} ?> <?php  if (empty($icon)) { echo ' checked';} ?> /></td>
               <td><img src="icon/azul.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="aluminio.png" <?php  if($icon=="aluminio.png"){echo' checked';} ?> /></td>
               <td><img src="icon/aluminio.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="crema.png" <?php  if($icon=="crema.png"){echo' checked';} ?> /></td>
               <td><img src="icon/crema.png"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="gris.png" <?php  if($icon=="gris.png"){echo' checked';} ?> /></td>
               <td><img src="icon/gris.png"  /></td>
				<td width="30"></td>
               <td><input type="radio" name="icon" value="naranja.png" <?php  if($icon=="naranja.png"){echo' checked';} ?> /></td>
               <td><img src="icon/naranja.png"  /></td>
				<td width="30"></td>
               <td><input type="radio" name="icon" value="rojo.png" <?php  if($icon=="rojo.png"){echo' checked';} ?> /></td>
               <td><img src="icon/rojo.png"  /></td>
               </tr>
               
               <tr>
               <td><input type="radio" name="icon" value="rosa.png" <?php  if($icon=="rosa.png"){echo' checked';} ?> /></td>
               <td><img src="icon/rosa.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="verde.png" <?php  if($icon=="verde.png"){echo' checked';} ?> /></td>
               <td><img src="icon/verde.png"  /></td>
               <td width="30"></td>
               <td></td>
               <td></td>
               </tr>
              
               </table>
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