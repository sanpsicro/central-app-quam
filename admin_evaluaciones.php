<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Evaluaciones</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle"> 
			Realizar evaluaci�n
</td>
            <td>&nbsp;</td>
           <form name="form1" method="post" action="bridge.php?module=evaluaciones"><td align="right" class="questtitle">B�squeda: 
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
$result = mysqli_query($db,"SELECT * from evaluaciones where general = '$id'");
$fecha=mysqli_result($result,0,"fecha");
$nombre=mysqli_result($result,0,"nombre");
$relacion=mysqli_result($result,0,"relacion");
$cortesia=mysqli_result($result,0,"cortesia");
$puntualidad=mysqli_result($result,0,"puntualidad");
$presentacion=mysqli_result($result,0,"presentacion");
$atencion=mysqli_result($result,0,"atencion");
$solucion=mysqli_result($result,0,"solucion");
$renovaria=mysqli_result($result,0,"renovaria");
$observaciones=mysqli_result($result,0,"observaciones");
$encuestador=mysqli_result($result,0,"encuestador");
}
echo'<form name="frm" method="post" action="process.php?module=evaluaciones&accela='.$accela.'&id='.$id.'">';    
?>
<table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-size: 15px;">
  <tr>
    <td style="font-size: 13px;" style="font-size: 13px;" width="50%" bgcolor="#eeeeee"><strong>Nombre de la persona que contesta la encuesta:</strong></td>
    <td style="font-size: 13px;" width="200" bgcolor="#eeeeee"><input name="nombre" type="text" id="nombre" size="50" value="<?php  echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" /></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;Qu&eacute; relaci&oacute;n tiene con el usuario? </strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><input name="relacion" type="text" id="relacion" size="50" value="<?php  echo"$relacion";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" /></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" height="70" colspan="2" valign="middle" bgcolor="#eeeeee"><div align="justify">&ldquo;A continuaci&oacute;n le realizare varias preguntas para conocer el grado de satisfacci&oacute;n que usted percibe de nuestro servicio, todas podr&aacute; usted calificarlas en una escala del 0 al 10, en la inteligencia de que el 0 significa el grado de menos satisfacci&oacute;n y el 10 grado de m&aacute;xima satisfacci&oacute;n&rdquo;</div></td>
    </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;El operador de nuestra cabina le atendi&oacute; con cortes&iacute;a y rapidez?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="cortesia" id="cortesia">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>    </td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;El servicio que usted solicit&oacute; lleg&oacute; en el tiempo prometido?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="puntualidad" id="puntualidad">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;C&oacute;mo calificar&iacute;a la presentaci&oacute;n del personal que le prestan servicio?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="presentacion" id="presentacion">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;Usted se sinti&oacute; apoyado o respaldado por la persona que le atendi&oacute; en el lugar?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="atencion" id="atencion">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>&iquest;La soluci&oacute;n final a su problema como la calificar&iacute;a?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="solucion" id="solucion">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select></td>
  </tr>
   <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>En base al servicio de asistencia recibido, &iquest; Usted comprar�a nuevamente su __________ ?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><select name="renovaria" id="renovaria">
      <option value="SI">SI</option>
      <option value="NO">NO</option>
      <option value="NO SABE">NO SABE</option>

    </select></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>Por &uacute;ltimo, &iquest;tiene usted alguna observaci&oacute;n o comentario que nos permita mejorar y brindarle un mejor servicio?</strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><textarea name="observaciones" cols="50" rows="4" id="observaciones" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></textarea></td>
  </tr>
  <tr>
    <td style="font-size: 13px;" height="70" colspan="2" bgcolor="#eeeeee"><div align="justify">Le agradecemos su tiempo para contestar esta encuesta, ser&aacute; tomada en cuenta para optimizaar nuestros procedimientos y pol&iacute;ticas de calidad.</div></td>
    </tr>
  <tr>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><strong>Nombre de la persona que realiz&oacute; la encuesta: </strong></td>
    <td style="font-size: 13px;" bgcolor="#eeeeee"><input name="encuestador" type="text" id="encuestador" size="50" value="<?php  echo"$encuestador";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" /></td>
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