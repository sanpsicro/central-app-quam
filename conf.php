<?php 
#Database
// $host="localhost"; 
// $username="plataforma2017_Q"; 
// $pass="yvNF!11}zSE+"; 
// $database="opcyons_opcyon";

$host="localhost";
$username="root";
$pass="";
$database="opcyons_opcyon";
#misc
$unixid = time(); 
#ajax & misc
if(!function_exists('conectar')):
	function conectar()
	{
		mysqli_connect("localhost","root","","opcyons_opcyon");
		//mysqli_connect("localhost","plataforma2017_Q","yvNF!11}zSE+","opcyons_opcyon");
		////mysql_select_db("opcyons_opcyon");
	}
endif;
if(!function_exists('conectar')):
function desconectar()
{
	mysqli_close();
}	    
endif;
?>