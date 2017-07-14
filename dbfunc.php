<?php
function consulta_mysql($query)
{
  include "conf.php";
  mysqli_connect($host,$username,$pass,$database);
  //mysql_select_db($database);
  
  $result=mysqli_query($query) or die (mysql_error()."<br><b>Consulta:</b> $query");
  
  return $result;
}

function select($datos,$tabla,$condiciones="")
{
  $query="SELECT $datos FROM $tabla";
  if($condiciones!="")
  {
    $query.=" $condiciones";
  }
  $result=consulta_mysql($query);
  return $result;
}

function getDato($dato,$tabla,$condicion)
{
	$result=consulta_mysql("SELECT $dato FROM $tabla $condicion");
	if(mysqli_num_rows($result)!=0)
		return mysql_result($result,0,$dato);
	else
		return "";
}

