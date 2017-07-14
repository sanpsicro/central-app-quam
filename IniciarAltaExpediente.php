<?php

  include("ConsultasCabina.php");
  if(isset($SEL["idPoliza"])){
  	
     echo "<form action=\"\" method=\"GET\">";
     echo "<input type=\"hidden\" name=\"module\" value=\"AltaExpediente\">";
     echo "<table class=NoBody><tr><td><b>Servicio:</b></td></tr>";
     echo "<tr><td>";
     echo "<input type=\"hidden\" name=\"idPoliza\" value= ".$SEL["idPoliza"]." >";
     echo "<select size=4 name=\"idProducto\">";
     $link  = mysqli_connect($host,$username,$pass,$database);
     $PRORES = mysqli_query($link , $SQLCABINA["ObtenerProductos"]);
     echo "<!-- $SQLCABINA[ObtenerProductos] -->";
     while($DATA = mysqli_fetch_assoc($PRORES)){
         echo "<option value=\" ".$DATA[idProducto]." \"> ".$DATA[Nombre]." </option>";
     }
     echo "</select>";
     echo "</td></tr>";
     echo "<tr><td colspan=2><input type=\"submit\" name=\"Iniciar\" value=\"Iniciar\"></td></tr></table>";
     echo "</form>";
  }
?>
