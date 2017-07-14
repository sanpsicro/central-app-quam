<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 
$unixid = time(); 
include('conf.php'); 

$ahora = date("Y-m-d H:i:s");
$cerohoras = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
$cuatrohoras = date("Y-m-d H:i:s", mktime(4, 0, 0, date("m")  , date("d"), date("Y")));
$ochohoras = date("Y-m-d H:i:s", mktime(8, 0, 0, date("m")  , date("d"), date("Y")));
$docehoras = date("Y-m-d H:i:s", mktime(12, 0, 0, date("m")  , date("d"), date("Y")));
$cuatropm = date("Y-m-d H:i:s", mktime(16, 0, 0, date("m")  , date("d"), date("Y")));
$ochopm = date("Y-m-d H:i:s", mktime(20, 0, 0, date("m")  , date("d"), date("Y")));
$medianoche = date("Y-m-d H:i:s",mktime(23, 59, 0, date("m")  , date("d"), date("Y")));

if($ahora>$cerohoras && $ahora<$cuatrohoras) { $inicio=$cerohoras; $final=$cuatrohoras; }
if($ahora>$cuatrohoras && $ahora<$ochohoras) { $inicio=$cuatrohoras; $final=$ochohoras; }
if($ahora>$ochohoras && $ahora<$docehoras) { $inicio=$ochohoras; $final=$docehoras; }
if($ahora>$docehoras && $ahora<$cuatropm) { $inicio=$docehoras; $final=$cuatropm; }
if($ahora>$cuatropm && $ahora<$ochopm) { $inicio=$cuatropm; $final=$ochopm; }
if($ahora>$ochopm && $ahora<$medianoche) { $inicio=$ochopm; $final=$medianoche; }





$link = mysqli_connect($host, $username, $pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT COUNT(*) FROM Empleado where idEmpleado=$valid_userid AND activo=1 and qtip NOT BETWEEN '$inicio' AND '$final'", $link); 
list($total1) = mysqli_fetch_row($result);
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link);
$result2 = mysqli_query("SELECT COUNT(*) FROM quicktips where activo=1 LIMIT 1", $link); 
list($total2) = mysqli_fetch_row($result2);
$total3=$total1+$total2;
echo $total3;



?>