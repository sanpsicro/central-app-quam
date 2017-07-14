<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File</title>
</head>
<body>
<form name="seendfile" method="post" action="file_seg.php">
<table width="0" border="0">
  <tr>
    <td>Nombre</td>
    <td>Archivo</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

<input type="hidden" name="id" value="<?php  $_GET['id']?>" />
<input type="hidden" name="time" value="<?php  echo date("Y-m-d H:m:s")?>" />
    <td><input type="text" name="name" /></td>
    <td><input type="file" name="file" /></td>
    <td><input type="submit" name="envia" value="envia" /></td>
    
  </tr>
</table></form>
</body>
</html>