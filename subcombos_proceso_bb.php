<?php  

	include 'conf.php';
if($_GET["select"]=="municipio"){
echo' <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Municipio where idEstado='$_GET[opcion]' order by NombreMunicipio", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);				
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
}	

if($_GET["select"]=="colonia"){
echo' <select name="colonia" id="colonia"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$_GET[opcion]' order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);							
  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
}	
###########################################

if($_GET["select"]=="municipio2"){

echo' <select name="municipio2" id="municipio2"  onChange=\'cargaContenido(this.id)\'><option value="0">SELECCIONE UNA OPCION</option>';

$link = mysqli_connect($host,$username,$pass,$database); 

//mysql_select_db($database, $link); 

$result = mysqli_query("SELECT * FROM Municipio where idEstado='$_GET[opcion]' order by NombreMunicipio", $link); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 

  		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);						

  echo'<option value="'.$row["idMunicipio"].'"';

     if($municipio==$row["idMunicipio"]){echo"selected";}

	 echo'>'.$row["NombreMunicipio"].'</option>';

  }}

echo'</select>';

}	

if($_GET["select"]=="colonia2"){
echo' <select name="colonia2" id="colonia2"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$_GET[opcion]' order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);									
  echo'<option value="'.$row["idColonia"].'"';
     if($colobia2==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
}	
###########################################

if($_GET["select"]=="aseg_municipio"){
echo' <select name="aseg_municipio" id="aseg_municipio"  onChange=\'cargaContenido(this.id)\'><option value="0">Seleccione una opcion</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Municipio where idEstado='$_GET[opcion]' order by NombreMunicipio", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row[NombreMunicipio],0,25);								
  echo'<option value="'.$row["idMunicipio"].'"';
     if($aseg_municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
}	
if($_GET["select"]=="aseg_colonia"){
echo' <select name="aseg_colonia" id="aseg_colonia"><option value="0">SELECCIONE UNA OPCION</option>';
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM Colonia where idMunicipio='$_GET[opcion]' order by NombreColonia", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row[NombreColonia],0,25);											
  echo'<option value="'.$row["idColonia"].'"';
     if($aseg_colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
}	

 ?>	

			  