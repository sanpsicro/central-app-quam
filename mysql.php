<?php
#Clase de conexion a base de datos y manejo de consultas
class MySQL{
  #$conexion;
  #$total_consultas;
  /*----------------------------------------------------------*/	
  function MySQL(){
  if(!isset($this->conexion)){
  $this->conexion = (mysqli_connect("localhost","opcyons_opcyonet","perpolas128")) or die(mysql_error());
  #$this->conexion = (mysqli_connect("localhost","root","")) or die(mysql_error());
  //mysql_select_db("opcyons_opcyon",$this->conexion) or die(mysql_error());
  }
  }
  /*----------------------------------------------------------*/	
 function query($consulta){
  $this->total_consultas++;
  $resultado = mysqli_query($consulta,$this->conexion);
  if(!$resultado){
  echo 'MySQL Error: ' . mysql_error();
  exit;
  }
  return $resultado; 
  }
  /*----------------------------------------------------------*/	
 function fetch_array($consulta){ 
  return mysqli_fetch_array($consulta);
  }
 /*----------------------------------------------------------*/	
 function num_rows($consulta){ 
  return mysqli_num_rows($consulta);
  }
 /*----------------------------------------------------------*/	 
 function getTotalConsultas(){
  return $this->total_consultas;
  }
}
#---------------USO---------------------------#
# include("mysql.php");  
#  $db = new MySQL();  
#   $query = $db->query("SELECT id FROM mitabla1");  
#   if($db->num_rows($query)>0){  
#   while($resultados = $db->fetch_array($query)){  
#   echo "ID: ".$resultados['id']."<br />";  
#   }  
#   } 
$db=new MySQL();
?>
