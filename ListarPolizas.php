<?php
 if(!isset($BUSRES)||(@mysqli_num_rows($BUSRES) <= 1)){
     if(isset($_GET["BtnBuscar"])&&(@mysqli_num_rows($BUSRES) <= 0)){
         echo "No existen registros con los datos Seleccionados";
     }
 }
 else{
     echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\"><tr><td bgcolor=\"#CCCCCC\">Nombre</td><td bgcolor=\"#CCCCCC\">NumPoliza</td><td bgcolor=\"#CCCCCC\">ID</td>";
     if(@mysqli_data_seek($BUSRES,0)){
        while($DATA = mysqli_fetch_assoc($BUSRES)){
           echo "<tr><td bgcolor=\"#EEEEEE\">$DATA[nombre]</td><td bgcolor=\"#EEEEEE\"><a href=\"?module=Cabina&sNumPoliza=$DATA[numPoliza]\">$DATA[numPoliza]</a></td><td bgcolor=\"#EEEEEE\"><a href=\"?module=Cabina&sNumPoliza=$DATA[numPoliza]&sId=$DATA[idUsuarioFinal]\">$DATA[idUsuarioFinal]</a></td></tr>";
        }
     }
    echo "</table>";
 }
?>
