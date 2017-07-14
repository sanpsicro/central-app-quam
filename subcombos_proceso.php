<?php
include 'conf.php';

if($_GET["select"]=="municipio"){
isset($_POST['municipio']) ? $municipio = $_POST['municipio']  : $municipio =null ;
echo' <select name="municipio" id="municipio" onChange="cargaContenido(this.id)"><option value="0">SELECCIONE UNA OPCION</option>';

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$_GET[opcion]' order by NombreMunicipio"); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 

  		$row["NombreMunicipio"]=htmlentities($row["NombreMunicipio"]);
  		$row["NombreMunicipio"]=substr($row['NombreMunicipio'],0,25);		

  echo'<option value="'.$row["idMunicipio"].'"';

     if($municipio==$row["idMunicipio"]){echo" selected ";}

	 echo'>'.$row["NombreMunicipio"].' ('.$row["idMunicipio"].')</option>';

  }}

echo'</select>';

}	









#############################################

if($_GET["select"]=="colonia"){
isset($_POST['colonia']) ? $colonia = $_POST['colonia']  : $colonia =null ;
echo' <select name="colonia" id="colonia"><option value="0">SELECCIONE UNA OPCION</option>';

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$_GET[opcion]' order by NombreColonia"); 

if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 

    		$row["NombreColonia"]=htmlentities($row["NombreColonia"]);
  		$row["NombreColonia"]=substr($row["NombreColonia"],0,25);					

  echo'<option value="'.$row["idColonia"].'"';

     if($colonia==$row["idColonia"]){echo"selected";}

	 echo'>'.$row["NombreColonia"].' ('.$row["idColonia"].')</option>';

  }}

echo'</select>';

}	

###########################################

if($_GET["select"]=="municipio2"){

echo' <select name="municipio2" id="municipio2" onChange="cargaContenido(this.id)"><option value="0">SELECCIONE UNA OPCION</option>';

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$_GET[opcion]' order by NombreMunicipio"); 

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

#############################################

if($_GET["select"]=="colonia2"){

echo' <select name="colonia2" id="colonia2"><option value="0">SELECCIONE UNA OPCION</option>';

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database); 

$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$_GET[opcion]' order by NombreColonia"); 

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

/*

#	echo $_GET["opcion"];

	// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido

$listadoSelects=array(

"estado"=>"Estado",

"municipio"=>"Municipio"

);



function validaSelect($selectDestino)

{

	// Se valida que el select enviado via GET exista

	global $listadoSelects;

	if(isset($listadoSelects[$selectDestino])) return true;

	else return false;

}



function validaOpcion($opcionSeleccionada)

{

	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico

	if(is_numeric($opcionSeleccionada)) return true;

	else return false;

}



$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];



if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))

{

	$tabla=$listadoSelects[$selectDestino];

	include 'conf.php';

	conectar();

	$consulta=mysqli_query("SELECT * FROM Municipio WHERE idEstado='$opcionSeleccionada'") or die(mysql_error());

	desconectar();

	

	// Comienzo a imprimir el select

	echo "<select name='municipio' id='municipio'>";

	while($registro=mysqli_fetch_row($consulta))

	{

		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion

#		$registro["NombreMunicipio"]=htmlentities($registro["NombreMunicipio"]);

		// Imprimo las opciones del select

		echo "<option value='".$registro["idMunicipio"]."'>--".$registro[3]."--</option>";

	}			

	echo "</select>";

}

			 

			 */ ?>	

			  