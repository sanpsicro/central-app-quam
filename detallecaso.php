<?php
session_start();
include('conf.php');
error_reporting(0);
echo'<html><head><title>Opcyon</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style_1.css" rel="stylesheet" type="text/css"></head><body>';
include('detail_seguimiento.php');
echo'</body></html>';
?>