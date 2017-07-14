<script> 

function Enab(hx)
{
i=0+hx;

//count = document.frm.servicios.length;
//    for (i=0; i < count; i++) 	{
    if(document.frm.servicios[i].checked)
    	{document.frm.numeventos[i].disabled = 0;
		document.frm.numeventos[i].value = "";}
    else {document.frm.numeventos[i].disabled = 1;
	document.frm.numeventos[i].value = "Ingrese numero";
	}
//	}

}


</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 

      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Productos</span></td><td width=150 class="blacklinks"><?php   $checa_array1=array_search("2_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_productos&accela=new">Nuevo Producto</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<?php 
            isset($_GET['accela']) ? $accela  = $_GET['accela'] : $accela = null ;
            isset($_GET['id']) ? $id  = $_GET['id'] : $id = null ;
			

			if($accela=="new"){echo'Dar de alta Producto';}
  
			else{echo'Editar Producto';



			}

			?>



</td>







            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=productos"><td align="right" class="questtitle">B&uacutesqueda: 



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

//descomentar si todos empiezan uncheck
$serviciosx = ["",""]; 

 if($accela=="edit" && isset($id)){
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from productos where id = '$id'");
$producto=mysqli_result($result,0,"producto");
$terminos=mysqli_result($result,0,"terminos");
$servicios=mysqli_result($result,0,"servicios");
$serviciosx=explode(",",$servicios);
$numeventos=mysqli_result($result,0,"numeventos");
$numeventosx=explode(",",$numeventos);
}



echo'<form name="frm" method="post" action="process.php?module=productos&accela='.$accela.'&id='.$id.'">';    

?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Producto:</strong></td>

        <td bgcolor="#cccccc"><input name="producto" type="text" id="producto" size="30"value="<?php  echo"$producto";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#cccccc"><strong>T&eacute;rminos:</strong></td>
        <td bgcolor="#cccccc"><textarea name="terminos" cols="100" rows="10" id="terminos" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><?php  echo"$terminos";?></textarea></td>
      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Servicios:</strong></td>

        <td bgcolor="#cccccc"><?php 
		
$cuentainputs=0;
$cuentallenos=0;
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM servicios"); 
if (mysqli_num_rows($result)){ 
$cuenta=0;
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';
while ($row = @mysqli_fetch_array($result)) { 
$llenaxv="no";
if($cuenta=="0"){echo'<tr>';}
echo'<td bgcolor="#eeeeee" width=50%><table width=100% cellpadding=0 cellspacing=0><tr><td width=50%><input name="servicios[]" id="servicios" type="checkbox" value="'.$row["id"].'"';
$checa_array=array_search($row["id"],$serviciosx);
if($checa_array===FALSE){} else{echo ' checked'; 
$llenaxv="si";}
echo' onClick="Enab('.$cuentainputs.')"><b>'.$row["servicio"].'</b></td><td width=50%>N&uacutem. de eventos <input name="numeventos[]" id="numeventos" type="text" size="10"';
if($llenaxv=="si"){echo 'value="'.$numeventosx["$cuentallenos"].'"';  $ponesto=""; $cuentallenos=$cuentallenos+1;}else{echo'value="Ingrese numero"'; $ponesto="disabled";}

echo''.$ponesto.' onKeyPress="return numbersonly(this, event)"></></td></tr></table>
</td>';
$cuenta=$cuenta+1;
if($cuenta=="2"){echo'</tr>'; $cuenta=0;}
$cuentainputs=$cuentainputs+1;
  }  
echo'</table>';
  }
?>		</td>
      </tr>

      

    </table>      </td>
    </tr>

  <tr>

    <td align="center" valign="top"><input type="submit" name="Submit" value="Guardar" />
     &nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" /></td>
    </tr>


</table>

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