<?php  



	extract($_GET);

	extract($_POST);

	

	$campos=array('pasajero', 'fecha_compra', 'codigo_reserva', 'vuelo', 'fecha_vuelo', 'origen_ciudad', 'destino_ciudad_v', 'fecha_respuesta', 'motivo_servicio_v', 'telefono_v', 'fax_v', 'email_v');

	$name=array('Pasajero', 'Fecha de Compra', 'C&oacute;digo de Reserva', 'Vuelo', 'Fecha de Vuelo', 'Ciudad de Or&iacute;gen', 'Ciudad de Destino', 'Fecha de Respuesta', 'Motivo del Servicio', 'Tel. de Contacto', 'Fax', 'E-mail');

	

	$nver=0;

	for($i=0;$i<sizeof($campos);$i++)

	{

		$aux=$campos[$i];

		if($$aux != '')

			$nver++;

	}

	

	if($nver > 0)

	{

		$sql="UPDATE general SET ";

		for($i=0;$i<sizeof($campos);$i++)

		{

			if($i > 0)

				$sql.=", ";

			$aux=$campos[$i];

			$sql.=$campos[$i]."='".$$aux."'";

		}

		$sql.=" WHERE id='".$id."'";

		//die($sql);

		$db = mysqli_connect($host,$username,$pass,$database);

		//mysql_select_db($database,$db);

		mysqli_query($sql,$db) or die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<br><b>".mysql_error());

		header("Location: mainframe.php?module=detail_seguimiento&id=$id");

		die();

	}

	$db = mysqli_connect($host,$username,$pass,$database);

	//mysql_select_db($database,$db);

	$sql="SELECT * from general where id = '$id'";

	$result = mysqli_query($sql,$db);

	if(!$result)

		die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<br><b>".mysql_error());

	$row=mysqli_fetch_assoc($result);

	//print_r($row);

	extract($row);

	$sql="SELECT * from servicios where id = '$servicio'";	

	$result = mysqli_query($sql,$db);

	if(!$result)

		die("Error en:<br><i>$sql</i><br><br>Descripci&oacute;n:<br><b>".mysql_error());

	$row=mysqli_fetch_assoc($result);		

	$camposex=explode(",",$row['campos']);	

	//print_r($camposex);

?>

<script type="text/javascript" src="calendar.js"></script>

<script type="text/javascript" src="lang/calendar-es.js"></script>

<script type="text/javascript" src="calendar-setup.js"></script>

<form id="form1" name="form1" method="post" action="#">

<input type="hidden" name="id" value=" <?php  echo $id; ?> ">

  <table width="100%" border="0" cellspacing="3" cellpadding="3">

  <?php

	  $cont=0;

	  echo "<tr>";

	  for($i=0;$i<sizeof($campos);$i++)

	  {	  	

		  if(in_array($campos[$i], $camposex))

		  {	  	

			echo '<td bgcolor="#FFFFFF"><strong>'.$name[$i].':</strong></td>';

			$aux=$campos[$i];

			if($campos[$i] == 'fecha_compra' || $campos[$i] == 'fecha_vuelo' || $campos[$i] == 'fecha_respuesta')

			{

				echo '<td bgcolor="#FFFFFF"><input name="'.$campos[$i].'" type="text" id="'.$campos[$i].'" size="10" readonly value="'.$$aux.'"/></td>';

				echo '<script type="text/javascript">';

                echo 'Calendar.setup({

                    				inputField     :    "'.$campos[$i].'",   // id of the input field

                                    ifFormat       :    "%Y-%m-%d",       // format of the input field

                                    timeFormat     :    "24"

                            	});

	               </script>'; 	            

			}	

			else

				echo '<td bgcolor="#FFFFFF"><input name="'.$campos[$i].'" type="text" id="'.$campos[$i].'" size="30" value="'.$$aux.'"/></td>';

			$cont++;

			if($cont == 3)

			{

				echo "</tr><tr>";

				$cont=0;

			}

		  }	  		

	  }	  

	  echo "</tr>";	

  ?>  

    <tr>

      <td bgcolor="#FFFFFF">&nbsp;</td>

      <td bgcolor="#FFFFFF" colspan="5"><input type="submit" name="button" id="button" value="Guardar" /></td>      

    </tr>

  </table>

</form>

























