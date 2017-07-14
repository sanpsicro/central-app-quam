<?php
   include_once("conf.php");
   
   	include("ConsultasCabina.php");
   
   $link = mysqli_connect($host,$username,$pass,$database);
   
   if( $BUSRES = mysqli_query($link ,$SQLCABINA["Buscar"])){
       $BUSQUEDA = mysqli_fetch_assoc($BUSRES);
       
       if(mysqli_num_rows($BUSRES) == 1){
           $SEL = $BUSQUEDA;
       }
  //     echo "<!-- $SQLCABINA[Buscar] -->";
   }else{
         //echo $SQLCABINA["Buscar"];
   }
?>
<form action="" method="GET">
<input type="hidden" name="module" value="Cabina">
<table width=100% cellspacing=2 cellpading=0>
<tr>
<td bgcolor="#eeeeee" algin="right">Num. Poliza: </td>
<td bgcolor="#eeeeee">
<input type="text" name="sNumPoliza" value="<?php echo $_GET["sNumPoliza"]; ?>">
</td>

<td bgcolor="#eeeeee" algin="right">Nombre:</td>
<td bgcolor="#eeeeee">
<input type="text" name="sNombre" value="<?php echo $_GET["sNombre"]; ?>">
</td>

<td bgcolor="#eeeeee" algin="right">ID:</td>
<td bgcolor="#eeeeee">
<input type="text" name="sId" value="<?php echo $_GET["sId"]; ?>">
</td>

<td>
<input type="submit" name="BtnBuscar" value="Buscar">
</td>

</tr>
<tr>
<td bgcolor="#cccccc" colspan="7"><b><font size="4"><?php echo $SEL["nombre"]; ?> &nbsp; <?php echo $SEL["numPoliza"]; ?> &nbsp;<?php echo $SEL["idUsuarioFinal"]; ?></font></b></td>
</tr>
</table>
</form>
