<?php  
$hoydia=$_POST[actual];
#$hoy_partida=explode(" ",$hoydia);
$fecha_partida=explode("-",$hoydia);
/*
if($_POST[opcion]=="1"){$endate=mktime($fecha_partida[1], $fecha_partida[0], $fecha_partida[2] + 1);}
if($_POST[opcion]=="2"){$endate=mktime($fecha_partida[1] + 6, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="3"){$endate=mktime($fecha_partida[1] + 1, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="4"){$endate=mktime($fecha_partida[1], $fecha_partida[0], $fecha_partida[2] + 10);}
*/

if($_POST[opcion]=="1"){$endate=mktime(0, 0, 0, $fecha_partida[1], $fecha_partida[0], $fecha_partida[2] + 1);}
if($_POST[opcion]=="2"){$endate=mktime(0, 0, 0, $fecha_partida[1] + 6, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="3"){$endate=mktime(0, 0, 0, $fecha_partida[1] + 1, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="4"){$endate=mktime(0, 0, 0, 00, 00, 0000);}

#$startinicial=mktime($starthora, $startmin, $startseg, $startmes, $startdia + 7, $startano);
#$nuevaf = date('j-n-Y', $endate); 
$nuevaf = date('j-n-Y', $endate); 
echo'<input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value="'.$nuevaf.'"/>';

?>	
