<?php
ob_start();

if(isset($_POST['quest']) && isset($_GET['module'])){header("Location: mainframe.php?module=". $_GET['module']. "&quest=".$_POST['quest']);}

if(isset($_POST['sort']) && isset($_POST['show']) && isset($_GET['module']) && isset($_POST['tipoCont']))
{
	//echo "GOOD";
	header("Location: mainframe.php?module=".$_GET['module']."&sort=".$_POST['sort']."&show=".$_POST['show']."&quest=".$_GET['quest']."&tipoCont=".$_POST['tipoCont']);
}
else if(isset($_POST['sort']) && isset($_POST['show']) && isset($_GET['module']) && isset($_POST[status])){header("Location: mainframe.php?module=".$_GET['module']."&sort=".$_POST['sort']."&show=".$_POST['show']."&status=".$_POST[status]."&quest=".$_GET['quest']);}
elseif(isset($_POST['sort']) && isset($_POST['show']) && isset($_GET['module'])){header("Location: mainframe.php?module=".$_GET['module']."&sort=".$_POST['sort']."&show=".$_POST['show']."&quest=".$_GET['quest']);}


if(isset($_POST[cliente]) && isset($_GET['module'])){header("Location: mainframe.php?module=".$_GET['module']."&cliente=".$_POST['cliente']."&accela=".$_GET[accela]);}

if( (isset($_POST[clave_usuario]) or isset($_POST[nombre]) or isset($_POST[serie])  or isset($_POST[placas])) && isset($_GET['module']) && $_GET['module']=="cabina"){
header("Location: mainframe.php?module=".$_GET['module']."&clave_usuario=".$_POST[clave_usuario]."&nombre=".$_POST[nombre]."&placas=".$_POST[placas]."&serie=".$_POST[serie]);
exit;}
if(isset($_POST[busca_cliente]) && isset($_GET['module'])){header("Location: mainframe.php?module=".$_GET['module']."&busca_cliente=".$_POST['busca_cliente']);}

if(isset($_POST[display]) && isset($_POST['sort'])){header("Location: mainframe.php?module=".$_GET['module']."&display=".$_POST[display]."&sort=".$_POST['sort']);}
?>