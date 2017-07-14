<?php
session_start();

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

 if($accela=="edit" && isset($idVehiculo)){

  include 'conf.php';

$db = mysqli_connect($host,$username,$pass,$database);

////mysql_select_db($database,$db);

$result = mysqli_query($db,"SELECT * from Vehiculo where idVehiculo = '$idVehiculo'");

$marca=mysqli_result($result,0,"marca");

$modelo=mysqli_result($result,0,"modelo");

$tipo=mysqli_result($result,0,"tipo");

$color=mysqli_result($result,0,"color");

$placas=mysqli_result($result,0,"placas");

$serie=mysqli_result($result,0,"serie");

$servicio=mysqli_result($result,0,"servicio");

$pre_idPoliza=mysqli_result($result,0,"idPoliza");

$pre_tmpid=mysqli_result($result,0,"tmpid");

}







?>

 <html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link href="style_1.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript">
function f(o){
o.value=o.value.toUpperCase();
}
function g(o){

}
</script>

</head><body>

 <table width="100%%" border="0" cellspacing="3" cellpadding="3">

 <?php  

echo'<form name="frm" method="post" action="process.php?module=vehiculos&accela='.$accela.'&idPoliza='.$idPoliza.'&tmpid='.$tmpid.'&idVehiculo='.$idVehiculo.'&tipocliente='.$tipocliente.'">';

?>    

  <tr>

    <td colspan="4" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Veh&iacute;culos</strong></td>

        <td width="150" align="center" class="blacklinks">[ <a href="vehiculos.php?tmpid=<?php  echo $tmpid; ?>&idPoliza=<?php  echo $idPoliza; ?>&tipocliente=<?php  echo $tipocliente; ?>">Lista de veh�culos</a> ]</td>

      </tr>

    </table>      </td>

  </tr>

  

   <tr>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Marca</strong><strong>:</strong><strong></strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="marca" type="text" id="marca" size="30" value="<?php  echo $marca; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Modelo:</strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="modelo" type="text" id="modelo" size="30" value="<?php  echo $modelo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Tipo:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="tipo" type="text" id="tipo" size="30" value="<?php  echo $tipo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Color:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="color" type="text" id="color" size="30" value="<?php  echo $color; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Placas:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="placas" type="text" id="placas" size="30" value="<?php  echo $placas; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Serie:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="serie" type="text" id="serie" size="30" value="<?php  echo $serie; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Servicio:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><select name="servicio" id="servicio">

       <option value="PARTICULAR" <?php  if($servicio=="PARTICULAR"){echo' selected';}  ?>>Particular</option>

       <option value="PUBLICO" <?php  if($servicio=="PUBLICO"){echo' selected';}  ?>>P&uacute;blico</option>

     </select>

     </td>

     <td align="right" bgcolor="#bbbbbb"><input type="submit" name="Submit" value="Agregar Veh&iacute;culo" onClick="return confirm(
  'Se dar� de alta el veh�culo con los siguientes datos:\n \n Marca: ' + document.frm.marca.value + ' \n Modelo: ' + document.frm.modelo.value + '\n Tipo: ' + document.frm.tipo.value + '\n Color: ' + document.frm.color.value + '\n Placas: ' + document.frm.placas.value + '\n Serie: ' + document.frm.serie.value + '\n  \n \n �Desea continuar?');"></td>

     <td align="left" bgcolor="#bbbbbb"><input type="reset" name="Submit2" value="Reestablecer"></td>

   </tr></form>

 </table>



  





 </body></html>

