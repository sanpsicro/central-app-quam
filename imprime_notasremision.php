<html><head><title>Factura</title><link href="style_1.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#FFFFFF" text="#000000" onLoad="printpage()">
<script language="Javascript1.2">
 
 function printpage() {
window.print();  
}
</script>
<?php  
include('conf.php');
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Cliente where idCliente = '$idCliente'",$db);
$nombre=mysql_result($result,0,"nombre");
$contacto=mysql_result($result,0,"contacto");
$rfc=mysql_result($result,0,"rfc");
$calle=mysql_result($result,0,"fisCalle");
$numero=mysql_result($result,0,"fisNumero");
$colonia=mysql_result($result,0,"fisColonia");
$ciudad=mysql_result($result,0,"fisCiudad");
$municipio=mysql_result($result,0,"fisMunicipio");
$estado=mysql_result($result,0,"fisEstado");


$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$colonia'",$db);
$colonia=mysql_result($result,0,"nombreColonia");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$estado'",$db);
$estado=mysql_result($result,0,"nombreEstado");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
$municipio=mysql_result($result,0,"nombreMunicipio");




?>
<table border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse"
bordercolor="#000000" width="100%">
  <tr> 
    <td><div align="right">Nota de Remsi�n: <?php  
$numfac=$factura;
if(strlen($numfac)==1){$numfac="000000".$numfac."";} 
if(strlen($numfac)==2){$numfac="00000".$numfac."";} 
if(strlen($numfac)==3){$numfac="0000".$numfac."";} 
if(strlen($numfac)==4){$numfac="000".$numfac."";} 
if(strlen($numfac)==5){$numfac="00".$numfac."";} 
if(strlen($numfac)==6){$numfac="0".$numfac."";} 

	echo "$numfac";?></div></td>
  </tr>
  <tr> 
    <td><div align="center"> 
        <p>OPCYON</p>
      </div></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr> 
          <td width="15%" valign="top"> <div align="right">Cliente:<br>
              Raz�n Social:<br>
              Contacto:<br>
              RFC:</div></td>
          <td width="35%" valign="top"><?php  echo "$nombre<br>$nombre<br>$contacto<br>$rfc"; ?></td>
          <td width="15%" rowspan="2" valign="bottom"> <div align="right">Fecha:<br>
              Orden de Venta:: </div></td>
          <td width="35%" rowspan="2" valign="bottom"><?php  
		  echo date("d/m/Y");
		  echo'<br>'.$orden.'';
		  ?></td>
        </tr>
        <tr>
          <td width="15%" valign="top">&nbsp;</td>
          <td valign="top"><?php  echo "$calle $numero<br>COL. $colonia<br>$municipio<br>$ciudad, $estado "; ?></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr bgcolor="#CCCCCC"> 
          <td width="10%"> <div align="center">Cantidad</div></td>
          <td width="40%"> <div align="center">Descripci&oacute;n</div></td>
          <td width="10%"> <div align="center">Precio Unitario</div></td>
          <td width="10%"> <div align="center">Importe</div></td>
        </tr>
        <?php  

if(isset($monto) && $monto!=""){  echo ' <tr><td align=middle>1</td><td align=left>'.$descripcion.'</td><td align=middle>$'.number_format($monto,2).'</td><td align=middle>$'.number_format($monto,2).'</td></tr>';}	

	
$importe1=$cantidad1*$precio1;	
$importe2=$cantidad2*$precio2;			
$importe3=$cantidad3*$precio3;
if(isset($cantidad1) && $cantidad1!=""){  echo ' <tr><td align=middle>'.$cantidad1.'</td><td align=left>'.$descripcion1.'</td><td align=middle>$'.number_format($precio1,2).'</td><td align=middle>$'.number_format($importe1,2).'</td></tr>';}	

if(isset($cantidad2) && $cantidad2!=""){  echo ' <tr><td align=middle>'.$cantidad2.'</td><td align=left>'.$descripcion2.'</td><td align=middle>$'.number_format($precio2,2).'</td><td align=middle>$'.number_format($importe2,2).'</td></tr>';}	

if(isset($cantidad3) && $cantidad3!=""){  echo ' <tr><td align=middle>'.$cantidad3.'</td><td align=left>'.$descripcion3.'</td><td align=middle>$'.number_format($precio3,2).'</td><td align=middle>$'.number_format($importe3,2).'</td></tr>';}	

			  ?>
      </table>
    </td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr> 
          <td>( 
            <?php 
function Centenas($VCentena) { 
$Numeros[0] = "cero"; 
$Numeros[1] = "uno"; 
$Numeros[2] = "dos"; 
$Numeros[3] = "tres"; 
$Numeros[4] = "cuatro"; 
$Numeros[5] = "cinco"; 
$Numeros[6] = "seis"; 
$Numeros[7] = "siete"; 
$Numeros[8] = "ocho"; 
$Numeros[9] = "nueve"; 
$Numeros[10] = "diez"; 
$Numeros[11] = "once"; 
$Numeros[12] = "doce"; 
$Numeros[13] = "trece"; 
$Numeros[14] = "catorce"; 
$Numeros[15] = "quince"; 
$Numeros[20] = "veinte"; 
$Numeros[30] = "treinta"; 
$Numeros[40] = "cuarenta"; 
$Numeros[50] = "cincuenta"; 
$Numeros[60] = "sesenta"; 
$Numeros[70] = "setenta"; 
$Numeros[80] = "ochenta"; 
$Numeros[90] = "noventa"; 
$Numeros[100] = "ciento"; 
$Numeros[101] = "quinientos"; 
$Numeros[102] = "setecientos"; 
$Numeros[103] = "novecientos"; 
If ($VCentena == 1) { return $Numeros[100]; } 
Else If ($VCentena == 5) { return $Numeros[101];} 
Else If ($VCentena == 7 ) {return ( $Numeros[102]); } 
Else If ($VCentena == 9) {return ($Numeros[103]);} 
Else {return $Numeros[$VCentena];} 

} 



function Unidades($VUnidad) { 
$Numeros[0] = "cero"; 
$Numeros[1] = "un"; 
$Numeros[2] = "dos"; 
$Numeros[3] = "tres"; 
$Numeros[4] = "cuatro"; 
$Numeros[5] = "cinco"; 
$Numeros[6] = "seis"; 
$Numeros[7] = "siete"; 
$Numeros[8] = "ocho"; 
$Numeros[9] = "nueve"; 
$Numeros[10] = "diez"; 
$Numeros[11] = "once"; 
$Numeros[12] = "doce"; 
$Numeros[13] = "trece"; 
$Numeros[14] = "catorce"; 
$Numeros[15] = "quince"; 
$Numeros[20] = "veinte"; 
$Numeros[30] = "treinta"; 
$Numeros[40] = "cuarenta"; 
$Numeros[50] = "cincuenta"; 
$Numeros[60] = "sesenta"; 
$Numeros[70] = "setenta"; 
$Numeros[80] = "ochenta"; 
$Numeros[90] = "noventa"; 
$Numeros[100] = "ciento"; 
$Numeros[101] = "quinientos"; 
$Numeros[102] = "setecientos"; 
$Numeros[103] = "novecientos"; 

$tempo=$Numeros[$VUnidad]; 
return $tempo; 
} 

function Decenas($VDecena) { 
$Numeros[0] = "cero"; 
$Numeros[1] = "uno"; 
$Numeros[2] = "dos"; 
$Numeros[3] = "tres"; 
$Numeros[4] = "cuatro"; 
$Numeros[5] = "cinco"; 
$Numeros[6] = "seis"; 
$Numeros[7] = "siete"; 
$Numeros[8] = "ocho"; 
$Numeros[9] = "nueve"; 
$Numeros[10] = "diez"; 
$Numeros[11] = "once"; 
$Numeros[12] = "doce"; 
$Numeros[13] = "trece"; 
$Numeros[14] = "catorce"; 
$Numeros[15] = "quince"; 
$Numeros[20] = "veinte"; 
$Numeros[30] = "treinta"; 
$Numeros[40] = "cuarenta"; 
$Numeros[50] = "cincuenta"; 
$Numeros[60] = "sesenta"; 
$Numeros[70] = "setenta"; 
$Numeros[80] = "ochenta"; 
$Numeros[90] = "noventa"; 
$Numeros[100] = "ciento"; 
$Numeros[101] = "quinientos"; 
$Numeros[102] = "setecientos"; 
$Numeros[103] = "novecientos"; 
$tempo = ($Numeros[$VDecena]); 
return $tempo; 
} 





function NumerosALetras($Numero){ 


$Decimales = 0; 
//$Numero = intval($Numero); 
$letras = ""; 

while ($Numero != 0){ 

// '*---> Validaci�n si se pasa de 100 millones 

If ($Numero >= 1000000000) { 
$letras = "Error en Conversi�n a Letras"; 
$Numero = 0; 
$Decimales = 0; 
} 

// '*---> Centenas de Mill�n 
If (($Numero < 1000000000) And ($Numero >= 100000000)){ 
If ((Intval($Numero / 100000000) == 1) And (($Numero - (Intval($Numero / 100000000) * 100000000)) < 1000000)){ 
$letras .= (string) "cien millones "; 
} 
Else { 
$letras = $letras & Centenas(Intval($Numero / 100000000)); 
If ((Intval($Numero / 100000000) <> 1) And (Intval($Numero / 100000000) <> 5) And (Intval($Numero / 100000000) <> 7) And (Intval($Numero / 100000000) <> 9)) { 
$letras .= (string) "cientos "; 
} 
Else { 
$letras .= (string) " "; 
} 
} 
$Numero = $Numero - (Intval($Numero / 100000000) * 100000000); 
} 

// '*---> Decenas de Mill�n 
If (($Numero < 100000000) And ($Numero >= 10000000)) { 
If (Intval($Numero / 1000000) < 16) { 
$tempo = Decenas(Intval($Numero / 1000000)); 
$letras .= (string) $tempo; 
$letras .= (string) " millones "; 
$Numero = $Numero - (Intval($Numero / 1000000) * 1000000); 
} 
Else { 
$letras = $letras & Decenas(Intval($Numero / 10000000) * 10); 
$Numero = $Numero - (Intval($Numero / 10000000) * 10000000); 
If ($Numero > 1000000) { 
$letras .= $letras & " y "; 
} 
} 
} 

// '*---> Unidades de Mill�n 
If (($Numero < 10000000) And ($Numero >= 1000000)) { 
$tempo=(Intval($Numero / 1000000)); 
If ($tempo == 1) { 
$letras .= (string) " un mill�n "; 
} 
Else { 
$tempo= Unidades(Intval($Numero / 1000000)); 
$letras .= (string) $tempo; 
$letras .= (string) " millones "; 
} 
$Numero = $Numero - (Intval($Numero / 1000000) * 1000000); 
} 

// '*---> Centenas de Millar 
If (($Numero < 1000000) And ($Numero >= 100000)) { 
$tempo=(Intval($Numero / 100000)); 
$tempo2=($Numero - ($tempo * 100000)); 
If (($tempo == 1) And ($tempo2 < 1000)) { 
$letras .= (string) "cien mil "; 
} 
Else { 
$tempo=Centenas(Intval($Numero / 100000)); 
$letras .= (string) $tempo; 
$tempo=(Intval($Numero / 100000)); 
If (($tempo <> 1) And ($tempo <> 5) And ($tempo <> 7) And ($tempo <> 9)) { 
$letras .= (string) "cientos "; 
} 
Else { 
$letras .= (string) " "; 
} 
} 
$Numero = $Numero - (Intval($Numero / 100000) * 100000); 
} 

// '*---> Decenas de Millar 
If (($Numero < 100000) And ($Numero >= 10000)) { 
$tempo= (Intval($Numero / 1000)); 
If ($tempo < 16) { 
$tempo = Decenas(Intval($Numero / 1000)); 
$letras .= (string) $tempo; 
$letras .= (string) " mil "; 
$Numero = $Numero - (Intval($Numero / 1000) * 1000); 
} 
Else { 
$tempo = Decenas(Intval($Numero / 10000) * 10); 
$letras .= (string) $tempo; 
$Numero = $Numero - (Intval(($Numero / 10000)) * 10000); 
If ($Numero > 1000) { 
$letras .= (string) " y "; 
} 
Else { 
$letras .= (string) " mil "; 

} 
} 
} 


// '*---> Unidades de Millar 
If (($Numero < 10000) And ($Numero >= 1000)) { 
$tempo=(Intval($Numero / 1000)); 
If ($tempo == 1) { 
$letras .= (string) "un"; 
} 
Else { 
$tempo = Unidades(Intval($Numero / 1000)); 
$letras .= (string) $tempo; 
} 
$letras .= (string) " mil "; 
$Numero = $Numero - (Intval($Numero / 1000) * 1000); 
} 

// '*---> Centenas 
If (($Numero < 1000) And ($Numero > 99)) { 
If ((Intval($Numero / 100) == 1) And (($Numero - (Intval($Numero / 100) * 100)) < 1)) { 
#$letras = $letras & "cien "; 
$letras .= (string) " cien "; 
} 
Else { 
$temp=(Intval($Numero / 100)); 
$l2=Centenas($temp); 
$letras .= (string) $l2; 
If ((Intval($Numero / 100) <> 1) And (Intval($Numero / 100) <> 5) And (Intval($Numero / 100) <> 7) And (Intval($Numero / 100) <> 9)) { 
$letras .= "cientos "; 
} 
Else { 
$letras .= (string) " "; 
} 
} 

$Numero = $Numero - (Intval($Numero / 100) * 100); 

} 

// '*---> Decenas 
If (($Numero < 100) And ($Numero > 9) ) { 
If ($Numero < 16 ) { 
$tempo = Decenas(Intval($Numero)); 
$letras .= $tempo; 
$Numero = $Numero - Intval($Numero); 
} 
Else { 
$tempo= Decenas(Intval(($Numero / 10)) * 10); 
$letras .= (string) $tempo; 
$Numero = $Numero - (Intval(($Numero / 10)) * 10); 
If ($Numero > 0.99) { 
$letras .=(string) " y "; 

} 
} 
} 

// '*---> Unidades 
If (($Numero < 10) And ($Numero > 0.99)) { 
$tempo=Unidades(Intval($Numero)); 
$letras .= (string) $tempo; 

$Numero = $Numero - Intval($Numero); 
} 


// '*---> Decimales 
If ($Decimales > 0) { 

// $letras .=(string) " con "; 
// $Decimales= $Decimales*100; 
// echo ("*"); 
// $Decimales = number_format($Decimales, 2); 
// echo ($Decimales); 
// $tempo = Decenas(Intval($Decimales)); 
// $letras .= (string) $tempo; 
// $letras .= (string) "centavos"; 
} 
Else { 
If (($letras <> "Error en Conversi�n a Letras") And (strlen(Trim($letras)) > 0)) { 
$letras .= (string) " "; 

} 
} 
return $letras; 
} 
} 


//favor de teclear a mano la cantidad numerica a convertir y asignarla a $tt 
$minkus=($monto)*1.15;
$tt = $minkus; 

$tt = $tt+0.009; 
$Numero = intval($tt); 
$Decimales = $tt - Intval($tt); 
$Decimales= $Decimales*100; 
$Decimales= Intval($Decimales); 
$x=NumerosALetras($Numero); 
echo ($x); 
If ($Decimales > 0){ 

$y=NumerosALetras($Decimales); 
echo (" pesos "); 
#echo ($y); 
#echo ("/100 M.N.");
#echo (" centavos"); 

} 
else { 
echo (" pesos "); 
#echo ("cero centavos"); 
} 
$minkuskas=number_format($minkus,2);
$minkuscos=explode(".",$minkuskas);
$centimos=substr($minkuscos[1],0,2);
echo" $centimos/100 M.N.";

?>
            )</td>
          <td width="15%">&nbsp;</td>
          <td width="1%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>Subtotal</td>
          <td>:$</td>
          <td align=right>
		  
		  <?php  
		  $subx=$monto;
		   echo ''.number_format($subx,2).'';?></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>IVA</td>
          <td>:$</td>
          <td align=right><?php  
		  $ivax=$subx*0.15;
		  
		  echo ''.number_format($ivax,2).'';?></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>Total</td>
          <td>:$</td>
          <td align=right><?php  
		  $totalx=$subx+$ivax;
		  echo ''.number_format($totalx,2).'';?></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body></html>

