<?php  
session_start();
$unixid = time(); 
include('conf.php'); 

if (empty($file1))  { header("Location: mainframe.php?module=detail_seguimiento&id=$general"); } 
else {
if(isset($file1) && $file1!="" && $file1!=" "){

$file_1_name_b=trim($file1_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'a', $file_1_name_b);
$file_1_name_b = str_replace('�', 'n', $file_1_name_b);
$file_1_name_b = str_replace('�', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file1,"adjuntosexp/$nuevonombre")){$archivo1=$nuevonombre; $unixid=$unixid+1;
} 
}



mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `adjuntos` (`id`, `general`, `fecha`, `adjunto`) VALUES ('', '$general', now(), '$archivo1')"); 
header("Location: mainframe.php?module=detail_seguimiento&id=$general");
}

?>