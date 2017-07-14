 <?php
 
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '$id'");
if (mysqli_num_rows($result)){ 
$aseguradora=mysqli_result($result,0,"aseguradora");
$ajustador=mysqli_result($result,0,"ajustador");
$telid=mysqli_result($result,0,"telid");
$aseg_poliza=mysqli_result($result,0,"aseg_poliza");
$aseg_inciso=mysqli_result($result,0,"aseg_inciso");
$aseg_inicio=mysqli_result($result,0,"aseg_vigencia_inicio");
$aseg_termino=mysqli_result($result,0,"aseg_vigencia_termino");
$aseg_cobertura=mysqli_result($result,0,"aseg_cobertura");
$aseg_monto=mysqli_result($result,0,"aseg_monto");
$aseg_asegurado=mysqli_result($result,0,"asegurado");
$asegurado_y_o=mysqli_result($result,0,"asegurado_y_o");
$aseg_tel1=mysqli_result($result,0,"aseg_tel1");
$aseg_tel2=mysqli_result($result,0,"aseg_tel2");
$aseg_calle=mysqli_result($result,0,"aseg_domicilio");
$aseg_cp=mysqli_result($result,0,"aseg_cp");
$aseg_estado=mysqli_result($result,0,"aseg_estado");
$aseg_municipio=mysqli_result($result,0,"aseg_municipio");
$aseg_colonia=mysqli_result($result,0,"aseg_colonia");
$aseg_ciudad=mysqli_result($result,0,"aseg_ciudad");
$aseg_conductor=mysqli_result($result,0,"aseg_conductor");
$aseg_conductor_tel1=mysqli_result($result,0,"aseg_conductor_tel1");
$aseg_conductor_tel2=mysqli_result($result,0,"aseg_conductor_tel2");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Estado where idEstado = '".$aseg_estado."'");
if (mysqli_num_rows($result)){ 
$aseg_estado=mysqli_result($result,0,"NombreEstado");
}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '".$aseg_municipio."'");
if (mysqli_num_rows($result)){ 
$aseg_municipio=mysqli_result($result,0,"NombreMunicipio");
}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Colonia where idColonia = '".$aseg_colonia."'");
if (mysqli_num_rows($result)){ 
$aseg_colonia=mysqli_result($result,0,"NombreColonia");
}

	  ?>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td bgcolor="#FFFFFF"><strong>Aseguradora:</strong> <?php echo $aseguradora;?></td>
          <td bgcolor="#FFFFFF"><strong>Ajustador:</strong> <?php echo $ajustador;?></td>
                    <td bgcolor="#FFFFFF"><strong>Tel/ID:</strong> <?php echo $telid;?></td>

        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>P&oacute;liza:</strong> <?php echo $aseg_poliza;?> &nbsp;&nbsp; <strong>Inciso:</strong> <?php echo $aseg_inciso;?></td>
          <td bgcolor="#FFFFFF"><strong>Vigencia inicio:</strong> <?php echo $aseg_inicio;?></td>
          <td bgcolor="#FFFFFF"><strong>Vigencia t&eacute;rmino:</strong> <?php echo $aseg_termino;?></td>

        </tr>
        <tr>
<!--           <td bgcolor="#FFFFFF"><strong>Monto RC: </strong> $<?php echo $aseg_monto;?></td> -->
          <td bgcolor="#FFFFFF"><strong>Cobertura:</strong> <?php echo $aseg_cobertura;?></td>
                    <td bgcolor="#FFFFFF"><strong>Conductor:</strong> <?php echo $aseg_conductor;?></td>
                              <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono conductor1:</strong> <?php echo $aseg_conductor_tel1;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono conductor2:</strong> <?php echo $aseg_conductor_tel2;?></td>
<td bgcolor="#FFFFFF"><strong>Asegurado:</strong> <?php echo $aseg_asegurado;?></td>
      <td bgcolor="#FFFFFF"><strong>Y/O:</strong> <?php echo $asegurado_y_o;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> <?php echo $aseg_tel1;?></td>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> <?php echo $aseg_tel2;?></td>
          <td bgcolor="#FFFFFF"><strong>Calle y n&uacute;mero:</strong> <?php echo $aseg_calle;?></td>

        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Colonia:</strong> <?php echo $aseg_colonia;?></td>
          <td bgcolor="#FFFFFF"><strong>C.P.</strong> <?php echo $aseg_cp;?></td>
          <td bgcolor="#FFFFFF"><strong>Estado:</strong> <?php echo $aseg_estado;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> <?php echo $aseg_ciudad;?></td>
          <td bgcolor="#FFFFFF"><strong>Municipio:</strong> <?php echo $aseg_municipio;?></td>
		<?php if(empty($NO_EDITAR)):?>
          <td align="right" bgcolor="#FFFFFF"><strong>
           
          
          [ <a href="javascript:FAjax('edita_infopoliza.php?id=<?php echo $id;?>&flim-flam=new Date().getTime()','infopoliza','','get');">Editar</a> ]</strong></td>
          
           
          
		  <?php endif; ?>
        </tr>
      </table>