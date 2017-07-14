<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 
$unixid = time(); 
include('conf.php'); 

isset($_POST['recordatorio']) ? $recordatorio= $_POST['recordatorio'] : $recordatorio= "" ;
isset($_POST['general']) ? $general= $_POST['general'] : $general= "" ;
isset($_POST['expediente']) ? $expediente= $_POST['expediente'] : $expediente= "" ;
isset($_POST['proximos']) ? $proximos= $_POST['proximos'] : $proximos= "" ;
isset($_POST['privacidad']) ? $privacidad= $_POST['privacidad'] : $privacidad= 0 ;
isset($_POST['recordate']) ? $recordate= $_POST['recordate'] : $recordate= "" ;
isset($_POST['actuar']) ? $actuar= $_POST['actuar'] : $actuar= "" ;
isset($_POST['userid']) ? $userid= $_POST['userid'] : $userid= "" ;

$visto ="";



$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 



################################################################################


#----------------



if(isset($actuar) && $actuar=="new" && $proximos=="recuerdame"){




$link = mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `recordatorios` ( `empleado`, `recordatorio`, `general`, `hora`, `visto`, `privacidad`) 

		VALUES ('$userid', '$recordatorio', '$expediente', '$recordate', '$visto', '$privacidad')") or die(mysqli_error($link)); 


echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script> 
'; 

}

#=====

#----------------



if(isset($actuar) && $actuar=="new" && $proximos!="recuerdame"){

$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+$proximos,$segundo,$mes,$dia,$ano));



$link = mysqli_connect($host,$username,$pass,$database);

mysqli_query($link,"INSERT INTO `recordatorios` ( `empleado`, `recordatorio`, `general`, `hora`, `visto`, `privacidad`) 

VALUES ('$userid', '$recordatorio', '$expediente', '$newtime', '$visto', '$privacidad')") or die(mysqli_error($link)); 

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script> 
';

}

#=====


if(isset($actuar) && $actuar=="snooze5"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+5,$segundo,$mes,$dia,$ano));


$link = mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysqli_query($link, $sSQL);

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====

#=====



if(isset($actuar) && $actuar=="snooze10"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+10,$segundo,$mes,$dia,$ano));


$link = mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysqli_query($link, $sSQL);

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====

#=====



if(isset($actuar) && $actuar=="snooze15"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+15,$segundo,$mes,$dia,$ano));


$link = mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysqli_query($link,$sSQL);

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====



if(isset($actuar) && $actuar=="expediente"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+5,$segundo,$mes,$dia,$ano));


$link =mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysqli_query($link, $sSQL);

echo '
<script type="text/javascript">
window.onload = window.parent.location.href = "mainframe.php?module=detail_seguimiento&id='.$general.'";
</script>

';

}



#=====





if(isset($actuar) && $actuar=="olvidar"){




$link = mysqli_connect($host,$username,$pass,$database);

$sSQL="UPDATE recordatorios SET visto=1 where id='$id'";

mysqli_query($link, $sSQL);

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====


if(isset($actuar) && $actuar=="qtiper"){




$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE Empleado SET qtip=now() where idEmpleado='$userid'";
mysqli_query($link, $sSQL);


$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE quicktips SET visto = visto + 1 where id='$id'";
mysqli_query($link, $sSQL);


echo '
<script>
function cierralo2() {
parent.jQuery.fancybox.close();
}
cierralo2();
</script>
';

}



#=====


?>