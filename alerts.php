<?php
session_start();
if(empty($_SESSION["valid_user"])){die();} 
?>
<?php include('conf.php'); ?>
<?php include('dbfunc.php'); ?>



<?php




$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query( $link,"SELECT COUNT(*) FROM general where status='abierto'"); 
list($total) = mysqli_fetch_row($result);

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM general left join seguimiento_juridico on (general.id = seguimiento_juridico.general) where (general.status='abierto' or general.status='en tramite') AND seguimiento_juridico.situacion_juridica='detenido'"); 
list($total2) = mysqli_fetch_row($result);

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM general left join seguimiento_juridico on (general.id = seguimiento_juridico.general) where (general.status='abierto' or general.status='en tramite') AND seguimiento_juridico.situacion_vehiculo='detenido'"); 
list($total3) = mysqli_fetch_row($result);

$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$timelimit=date("Y-m-d H:i:s", mktime($hora-1,$minuto-30,$segundo,$mes,$dia,$ano));
$recordate=date("Y-m-d H:i:s", mktime($hora,$minuto,$segundo,$mes,$dia,$ano));
#echo $timelimit;
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
/*
$result = mysqli_query("SELECT COUNT(*) FROM general left join bitacora on (general.id = bitacora.general) left join notas_legal on (general.id =  notas_legal.general)  where (general.status='abierto' or general.status='en tramite') AND (notas_legal.fecha<='$timelimit' or bitacora.fecha<='$timelimit')", $link); 

$result = mysqli_query("SELECT COUNT(*) FROM general left join bitacora on (general.id = bitacora.general) left join notas_legal on (general.id =  notas_legal.general)  where (general.status='abierto' or general.status='en tramite') AND (notas_legal.fecha<='$timelimit' or bitacora.fecha<='$timelimit')", $link); 
*/

$result = mysqli_query( $link,"SELECT COUNT(*) FROM general where general.status='abierto' AND general.ultimoseguimiento<='$timelimit'"); 

list($total4) = mysqli_fetch_row($result);


############

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM general where contacto!='0000-00-00 00:00:00' AND apertura_expediente!='0000-00-00 00:00:00' AND status='abierto' AND (TimeDiff(contacto,apertura_expediente)) >= '00:45:00'"); 
list($total5) = mysqli_fetch_row($result);

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(DISTINCT general) FROM clientacora where tipo=2 and visto=0"); 
list($total6) = mysqli_fetch_row($result);


$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM chatstat where atendido=0 and status=2"); 
list($total7) = mysqli_fetch_row($result);

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM recordatorios where visto=0 and empleado='".$_SESSION["valid_user"]."' and privacidad=1 and hora<now()"); 
list($total8) = mysqli_fetch_row($result);

$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT COUNT(*) FROM recordatorios where visto=0 and empleado!='".$_SESSION["valid_user"]."' and privacidad=0 and hora<now()"); 
list($total9) = mysqli_fetch_row($result);

$total10=$total8+$total9;

echo '
<div class="alerticons">

<div class="alertarea">
<div class="iconalert"><a href="?module=main"><img src="images/home.png" border="0" title="Dashboard"></a></div>
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total > 0) echo'<a href="?module=seguimiento&display=abierto">'; else {} echo'<img src="images/atencion.png" border="0" title="En Proceso de Atencion">'; if ($total > 0) echo'</a>'; else {} echo'</div>';
if ($total > 0) echo'
<div class="alertinfo">'.$total.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total6 > 0) echo'<a href="?module=seguimiento&moko=msgnew">'; else {} echo'<img src="images/msg.png" border="0" title="Mensajes Nuevos">'; if ($total6 > 0) echo'</a>'; else {} echo'</div>';
if ($total6 > 0) echo'
<div class="alertinfo">'.$total6.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total2 > 0) echo'<a href="?module=seguimiento&display=abierto_tramite&moko=conductor_detenido">'; else {} echo'<img src="images/detenido.png" border="0" title="Conductor Detenido">'; if ($total2 > 0) echo'</a>'; else {} echo'</div>';
if ($total2 > 0) echo'
<div class="alertinfo">'.$total2.'</div>'; else {} echo '
</div>
<div class="separador"></div>


';

echo '


<div class="alertarea">
<div class="iconalert">'; if ($total3 > 0) echo'<a href="?module=seguimiento&display=abierto_tramite&moko=vehiculo_detenido">'; else {} echo'<img src="images/autodetenido.png" border="0" title="Vehiculo Detenido">'; if ($total3 > 0) echo'</a>'; else {} echo'</div>';
if ($total3 > 0) echo'
<div class="alertinfo">'.$total3.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total7 > 0) echo'<a href="?module=seguimiento&moko=chat">'; else {} echo'<img src="images/chat.png" border="0" title="Chats sin Atender">'; if ($total7 > 0) echo'</a>'; else {} echo'</div>';
if ($total7 > 0) echo'
<div class="alertinfo">'.$total7.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total4 > 0) echo'<a href="?module=seguimiento&display=abierto&moko=fkrucm">'; else {} echo'<img src="images/sinseguimiento.png" border="0" title="Sin Seguimiento en 1:30 Horas">'; if ($total4 > 0) echo'</a>'; else {} echo'</div>';
if ($total4 > 0) echo'
<div class="alertinfo">'.$total4.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert">'; if ($total5 > 0) echo'<a href="?module=seguimiento&display=abierto&moko=fkrucmsh">'; else {} echo'<img src="images/contacto.png" border="0" title="Tiempo de Contacto mayor a 45 Minutos">'; if ($total5 > 0) echo'</a>'; else {} echo'</div>';
if ($total5 > 0) echo'
<div class="alertinfo">'.$total5.'</div>'; else {} echo '
</div>
<div class="separador"></div>

<div class="alertarea">
<div class="iconalert"><a href="recordatorios.php" class="fancybox-new fancybox.iframe bklink"><img src="images/temporizador.png" border="0" title="Recordatorios"></a></div>';
if ($total10 > 0) echo'
<div class="alertinfo">'.$total10.'</div>'; else {} echo '
</div>

</div>
';

 ?>
 



