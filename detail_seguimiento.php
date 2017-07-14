<script type="text/javascript">
function creaAjax(){
         var objetoAjax=false;
         try {
          /*Para navegadores distintos a internet explorer*/
          objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
          try {
                   /*Para explorer*/
                   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   catch (E) {
                   objetoAjax = false;
          }
         }
         if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
          objetoAjax = new XMLHttpRequest();
         }
         return objetoAjax;
}
/*----
*/   
function FAjax (url,capa,valores,metodo)
{
          var ajax=creaAjax();
          var capaContenedora = document.getElementById(capa);
/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/
if(metodo.toUpperCase()=='POST'){
         ajax.open ('POST', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                          capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"img/loading.gif\"> <b><font color=\"#eeeeee\">Cargando.......</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200)
                   {
                        document.getElementById(capa).innerHTML=ajax.responseText;
                   }
                   else if(ajax.status==404)
                                             {
                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                           else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(valores);
         return;
}
/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/
if (metodo.toUpperCase()=='GET'){
         ajax.open ('GET', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                                      capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"img/loading.gif\" align=\"absmiddle\"> <b><font color=\"#0b7eb7\" size=3 face=arial>Cargando...</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200){
                                             document.getElementById(capa).innerHTML=ajax.responseText;
                   }
                   else if(ajax.status==404)
                                             {
                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                                             else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(null);
         return
}
} 
</script>
<script type="text/javascript">
function confirmborra(idex,tercero) { 
if (confirm("¿Está seguro de querer eliminar al tercero?\n")) { 
FAjax('terceros_editado.php?id='+idex+'&idtercero='+tercero+'&caso=borrar&flim-flam='+new Date().getTime(),'terceros','','get');
}
}
</script>
<script type="text/javascript" src="subcombo.js"></script>
<?php 
isset($_GET['id']) ? $id = $_GET['id'] : $id="";
isset($_GET['set_date']) ? $set_date = $_GET['set_date'] : $set_date="";

isset($_POST['dterminoext']) ? $dterminoext= $_POST['dterminoext'] : $dterminoext="";
isset($_POST['mterminoext']) ? $mterminoext= $_POST['mterminoext'] : $mterminoext="";
isset($_POST['aterminoext']) ? $aterminoext= $_POST['aterminoext'] : $aterminoext="";
isset($_POST['hterminoext']) ? $hterminoext= $_POST['hterminoext'] : $hterminoext="";
isset($_POST['minterminoext']) ? $minterminoext= $_POST['minterminoext'] : $minterminoext="";
isset($_POST['segundero2']) ? $segundero2= $_POST['segundero2'] : $segundero2="";

isset($_POST['dcontext']) ? $dcontext= $_POST['dcontext'] : $dcontext="";
isset($_POST['mcontext']) ? $mcontext= $_POST['mcontext'] : $mcontext="";
isset($_POST['acontext']) ? $acontext= $_POST['acontext'] : $acontext="";
isset($_POST['hcontext']) ? $hcontext= $_POST['hcontext'] : $hcontext="";
isset($_POST['mincontext']) ? $mincontext= $_POST['mincontext'] : $mincontext="";
isset($_POST['segundero1']) ? $segundero1= $_POST['segundero1'] : $segundero1="";




if(isset($_POST['exxxp'])){
$exxxp = $_POST['exxxp'];
}else{
$exxxp = null;
}

function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
} 
$checa_array1=array_search("sg_e",$explota_permisos);
if($checa_array1===FALSE){$NO_EDITAR=true;} else{}

if($set_date=="arribo"){
	$db =mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET arribo=now() where id='".$id."'";
mysqli_query($db, $sSQL);
}
if($set_date=="contacto"){
$db = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET contacto=now() where id='".$id."'";
mysqli_query($db, $sSQL);
}
if($set_date=="contactoext"){
	$db =mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET contactoext='".$acontext."-" .$mcontext."-".$dcontext . $hcontext.":".$mincontext.":".$segundero1."' where id='".$id."'";
mysqli_query($db, $sSQL);
}
if($set_date=="terminoext"){
	$db =mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET terminoext='$aterminoext-$mterminoext-$dterminoext $hterminoext:$minterminoext:$segundero2' where id='".$id."'";
mysqli_query($db, $sSQL);
}
if($set_status=="concluido"){
$db =mysqli_connect($host,$username,$pass,$database);
 $sSQL="UPDATE general SET status='concluido', ultimostatus=now() where id='".$id."'";
mysqli_query($db, $sSQL);
}
if(empty($_SESSION["valid_user"])){die();} 
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
//echo "SELECT * from general where id = '".$id."'<br>";

$result = mysqli_query($db,"SELECT * from general where id = '".$id."'");
$servicio=mysqli_result($result,0,"servicio");
$contrato=mysqli_result($result,0,"contrato");
$cliente=mysqli_result($result,0,"idCliente");
$fecha_recepcion=mysqli_result($result,0,"fecha_recepcion");
$fexa1=explode(" ",$fecha_recepcion);
$fexa1d=explode("-",$fexa1[0]);
$fecha_suceso=mysqli_result($result,0,"fecha_suceso");
$fexa2=explode(" ",$fecha_suceso);
$fexa2d=explode("-",$fexa2[0]);
$reporta=mysqli_result($result,0,"reporta");
$tel_reporta=mysqli_result($result,0,"tel_reporta");
$num_contrato=mysqli_result($result,0,"num_contrato");
$expediente=mysqli_result($result,0,"expediente");
$num_cliente=mysqli_result($result,0,"num_cliente");
$num_siniestro=mysqli_result($result,0,"num_siniestro");
$ajustador=mysqli_result($result,0,"ajustador");
$usuario=mysqli_result($result,0,"usuario");
$motivo_servicio=mysqli_result($result,0,"motivo_servicio");
$auto_marca=mysqli_result($result,0,"auto_marca");
$auto_tipo=mysqli_result($result,0,"auto_tipo");
$auto_modelo=mysqli_result($result,0,"auto_modelo");
$auto_color=mysqli_result($result,0,"auto_color");
$auto_placas=mysqli_result($result,0,"auto_placas");
$ubicacion_requiere=mysqli_result($result,0,"ubicacion_requiere");
$ubicacion_referencias=mysqli_result($result,0,"ubicacion_referencias");
$ubicacion_estado=mysqli_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysqli_result($result,0,"ubicacion_municipio");
$ubicacion_ciudad=mysqli_result($result,0,"ubicacion_ciudad");
$observaciones=mysqli_result($result,0,"observaciones");
$reporte_cliente=mysqli_result($result,0,"reporte_cliente");
$probestar=mysqli_result($result,0,"Proveedor");
$convenio=mysqli_result($result,0,"convenio");
$inciso=mysqli_result($result,0,"inciso");
$ejecutivo=mysqli_result($result,0,"ejecutivo");
$fax=mysqli_result($result,0,"fax");
$email=mysqli_result($result,0,"email");
$cobertura=mysqli_result($result,0,"cobertura");
$pasajero=mysqli_result($result,0,"pasajero");
$fecha_compra =mysqli_result($result,0,"fecha_compra");
$codigo_reserva =mysqli_result($result,0,"codigo_reserva");
$vuelo=mysqli_result($result,0,"vuelo");
$fecha_vuelo =mysqli_result($result,0,"fecha_vuelo");
$origen_ciudad =mysqli_result($result,0,"origen_ciudad");
$destino_ciudad_v =mysqli_result($result,0,"destino_ciudad_v");
$fecha_respuesta =mysqli_result($result,0,"fecha_respuesta");
$motivo_servicio_v =mysqli_result($result,0,"motivo_servicio_v");
$telefono_v =mysqli_result($result,0,"telefono_v");
$fax_v =mysqli_result($result,0,"fax_v");
$email_v =mysqli_result($result,0,"email_v");

$result = mysqli_query($db,"SELECT * from servicios where id = '".$servicio."'");
$servicio=mysqli_result($result,0,"servicio");
$tipoServicio=mysqli_result($result,0,"tipo");
$campos=mysqli_result($result,0,"campos");

/*$row=mysqli_fetch_assoc($result);
extract($row);*/
$camposex=explode(",",$campos);
$result = mysqli_query($db,"SELECT * from Cliente where idCliente = '".$cliente."'");
$cliente=mysqli_result($result,0,"nombre");
$result = mysqli_query($db,"SELECT * from Estado where idEstado = '".$ubicacion_estado."'");
$ubicacion_estado=mysqli_result($result,0,"NombreEstado");
$result = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '".$ubicacion_municipio."'");
$ubicacion_municipio=mysqli_result($result,0,"NombreMunicipio");
$result = mysqli_query($db,"SELECT * from Provedor where id = '".$probestar."'");
$probestar=mysqli_result($result,0,"nombre");

function sumDays($ano,$mes,$dia){
	$jd = GregorianToJD ($mes,$dia,$ano);
	$jd =  $jd + 21;
	$gregorian = JDToGregorian ($jd);
	$gregorian = explode('/',$gregorian);
	if($gregorian[0] <= 9){ $gregorian[0] = '0'.$gregorian[0]; }
	if($gregorian[1] <= 9){ $gregorian[1] = '0'.$gregorian[1]; }
	$fecha = $gregorian[2].'-'.$gregorian[0].'-'.$gregorian[1];
	return $fecha;
}


$dbl = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbl);
$resultl = mysqli_query($dbl,"SELECT * from Empleado where idEmpleado='".$valid_userid."'");
$extension=mysqli_result($resultl,0,"extension");

?> 

<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
      <td width="50%"><span class="maintitle">Detalle del Expediente <?php  echo $expediente;?></span></td>
      <td width=50% align="right"><span class="maintitle">Prov: <?php  echo $probestar;?></span></td>
      </tr>
<tr>
	<td width=100 class="blacklinks"><?php  if($tipoServicio=="legal"){echo "<a href='?module=seguimiento_caso&id=".$id."'>Seguimiento</a> | <a href='?module=conclusion_caso&id=".$id."'>Conclusi�n</a>";}?></td>
</tr>
	  </table></td></tr>
<tr>
  <td>
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td class="titles" colspan=3><strong>Status del caso</strong></td>
    </tr></table> <div id="statuscaso"><?php 
    include("status_caso.php");
	?></div>  
    <?php 
	$ivx=0;
$checa_array=array_search("informacion_caso",$camposex);
$checa_array2=array_search("num_contrato",$camposex);
$checa_array3=array_search("reporta",$camposex);
$checa_array4=array_search("tel_reporta",$camposex);
$checa_array5=array_search("fecha_suceso",$camposex);
$checa_array6=array_search("convenio",$camposex);
$checa_array7=array_search("expediente",$camposex);
$checa_array8=array_search("num_cliente",$camposex);
$checa_array9=array_search("num_siniestro",$camposex);
$checa_array10=array_search("inciso",$camposex);
$checa_array11=array_search("usuario",$camposex);
$checa_array12=array_search("reporte_cliente",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE  && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE && $checa_array7===FALSE && $checa_array8===FALSE && $checa_array9===FALSE && $checa_array10===FALSE && $checa_array11===FALSE && $checa_array12===FALSE)
{}
else{
	?>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td class="titles" colspan=3><strong>Informaci&oacute;n del caso</strong></td>
      </tr>
    <tr>
     <td width="33%" bgcolor="#ffffff"><strong>Servicio solicitado:</strong> <?php  echo $servicio;?></td>
      <td width="33%" bgcolor="#ffffff"><strong>Contrato:</strong> <?php  echo $contrato;?></td>
      <td width="33%" bgcolor="#ffffff"><strong>Cliente:</strong> <?php  echo $cliente;?></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Fecha de recepci&oacute;n:</strong> <?php  echo ''.$fexa1d[2].'/'.$fexa1d[1].'/'.$fexa1d[0].' '.$fexa1[1].'' ;?></td>
       <?php  $ivx++; 			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}?>
      
<?php 
$checa_arrayx=array_search("reporta",$camposex);
if($checa_arrayx===FALSE){} else{
?>    
      <td bgcolor="#ffffff"><strong>Reporta:</strong> <?php  echo $reporta;?></td>
      
      <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
<?php 
$checa_arrayx=array_search("tel_reporta",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td bgcolor="#ffffff">
<form method="POST" action="http://192.168.1.200/api/actions/call" target="_blank">      
      <strong>Tel. de contacto:</strong> 
		  <?php  echo $tel_reporta;?>
  <?php 
	  $telctc1 = $tel_reporta;
      $telcall1 = preg_replace('/[^0-9]/', '', $telctc1);
  ?>

<input type="hidden" name="number" value="9<?php  echo $telcall1; ?>">
<input type="hidden" name="extension" value="<?php  echo $extension; ?>">
<input type="image" src="call.png" alt="Llamar" style="border:0px;" />

</form>

      </td>      
            <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
            
<?php 
$checa_arrayx=array_search("fecha_suceso",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td bgcolor="#ffffff"><strong>Fecha del suceso:</strong> <?php  echo ''.$fexa2d[2].'/'.$fexa2d[1].'/'.$fexa2d[0].' '.$fexa2[1].'' ;?></td>
      <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
      <?php 
$checa_arrayx=array_search("convenio",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td bgcolor="#ffffff"><strong>Convenio:</strong> <?php  echo $convenio;?></td>      <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
      <?php 
$checa_arrayx=array_search("inciso",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td bgcolor="#ffffff"><strong>Inciso:</strong> <?php  echo $inciso;?></td>             <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
      <td bgcolor="#ffffff"><strong>N&uacute;mero de contrato:</strong> <?php  echo $num_contrato;?></td>   <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			?>  
      <td bgcolor="#ffffff"><strong>Expediente:</strong> <?php  echo $expediente;?></td>   <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			?>  
      <td bgcolor="#ffffff"><strong>Nombre del cliente:</strong> <?php  echo $num_cliente;?></td>  <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			?>
        <?php 
$checa_arrayx=array_search("num_siniestro",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
          <td bgcolor="#ffffff"><strong>N&uacute;mero del siniestro:</strong> <?php  echo $num_siniestro;?></td>
 <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
          <?php 
$checa_arrayx=array_search("usuario",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td bgcolor="#ffffff"><strong>Usuario:</strong> <?php  echo $usuario;?></td>
 <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
      
      <?php 
$checa_arrayx=array_search("reporte_cliente",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
            <td bgcolor="#ffffff"><strong>Reporte cliente:</strong> <?php  echo $reporte_cliente;?></td>
 <?php  $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>

	<?php 
		$checa_arrayx=array_search("ejecutivo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Ejecutivo:</strong> <?php  echo $ejecutivo;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("fax",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Fax:</strong> <?php  echo $fax;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("email",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>E-mail:</strong> <?php  echo $email;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("cobertura",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Cobertura:</strong> <?php  echo $cobertura;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>	 			
    </tr>
       
       <tr><td colspan=3 align="right" bgcolor="#FFFFFF"><strong>
       <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '<!--';} else{echo'';}
?>

       [ <a href="?module=editausuariox&id=<?php  echo $id;?>">Editar</a>]
       <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '-->';} else{echo'';}
?>
       </strong></td>
       </tr>
       
   </table>
   <?php 
   $checa_arrayx=array_search("vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
   ?>
   <table width="100%" border="0" cellspacing="3" cellpadding="3">
   	<tr>
    	<td class="titles" colspan=3><strong>Informaci&oacute;n del vuelo</strong></td>
    </tr>   
	<?php 
		$ivx=0;
		$checa_arrayx=array_search("pasajero",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Pasajero:</strong> <?php  echo $pasajero;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("fecha_compra",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Fecha de Compra:</strong> <?php  echo $fecha_compra;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("codigo_reserva",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>C&oacute;digo de Reserva:</strong> <?php  echo $codigo_reserva;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Vuelo:</strong> <?php  echo $vuelo;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("fecha_vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else{
			if($fecha_vuelo == '0000-00-00'){
				$fecha_vuelo = 'No definida';
			}else{
				//$fecha_vuelo = explode('-',$fecha_vuelo);
				//$fecha_vuelo = sumDays($fecha_vuelo[0],$fecha_vuelo[1],$fecha_vuelo[2]);
				//$fecha_vuelo = $fecha_vuelo[0],$fecha_vuelo[1],$fecha_vuelo[2];
				
			}
			?>          
	    	<td bgcolor="#ffffff"><strong>Fecha de Vuelo:</strong> <?php  echo $fecha_vuelo;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("origen_ciudad",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Ciudad de Or&iacute;gen:</strong> <?php  echo $origen_ciudad;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("destino_ciudad_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Ciudad de Destino:</strong> <?php  echo $destino_ciudad_v;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("fecha_respuesta",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Fecha de Respuesta:</strong> <?php  echo $fecha_respuesta;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("motivo_servicio_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Motivo de Servicio:</strong> <?php  echo $motivo_servicio_v;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("telefono_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Tel. de Contacto:</strong> <?php  echo $telefono_v;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("fax_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>Fax:</strong> <?php  echo $fax_v;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?php 
		$checa_arrayx=array_search("email_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td bgcolor="#ffffff"><strong>E-mail:</strong> <?php  echo $email_v;?></td>
			<?php 
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?> 	
    
      <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '<!--';} else{echo'';}
?>
    
    <tr>
		<td colspan=3 align="right" bgcolor="#FFFFFF"><strong>[ <a href="?module=editavuelo&id=<?php  echo $id;?>">Editar</a>]</strong></td>
    </tr>
    
   <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '-->';} else{echo'';}
?>        
       
   </table>
   
        <?php 
}
}
	?>	
	 
      
       
              <?php 
$checa_array=array_search("detalles_servicio",$camposex);
$checa_array2=array_search("tecnico_solicitado",$camposex);
$checa_array3=array_search("motivo_servicio",$camposex);
$checa_array4=array_search("ubicacion_requiere",$camposex);
$checa_array5=array_search("tipo_asistencia_vial",$camposex);
$checa_array6=array_search("tipo_asistencia_medica",$camposex);
$checa_array7=array_search("domicilio_cliente",$camposex);
$checa_array8=array_search("domicilio_sustituto",$camposex);
$checa_array9=array_search("ubicacion_estado",$camposex);
$checa_array10=array_search("ubicacion_municipio",$camposex);
$checa_array11=array_search("ubicacion_colonia",$camposex);
$checa_array12=array_search("ubicacion_ciudad",$camposex);
$checa_array13=array_search("destino_servicio",$camposex);
$checa_array14=array_search("destino_estado",$camposex);
$checa_array15=array_search("destino_municipio",$camposex);
$checa_array16=array_search("destino_colonia",$camposex);
$checa_array17=array_search("destino_ciudad",$camposex);
$checa_array18=array_search("formato_carta",$camposex);
$checa_array19=array_search("instructivo",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE && $checa_array7===FALSE && $checa_array8===FALSE && $checa_array9===FALSE && $checa_array10===FALSE && $checa_array11===FALSE && $checa_array12===FALSE && $checa_array13===FALSE && $checa_array14===FALSE && $checa_array15===FALSE && $checa_array16===FALSE && $checa_array17===FALSE && $checa_array18===FALSE && $checa_array19===FALSE){} else{
	?>
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" class="titles"><strong>Detalles del servicio</strong> </td>
      </tr></table> <div id="servisuservisu"> <?php 
      include('servisuservisu.php'); 
	  ?>  
      </div>
      <?php        }	  ?>
      
       <?php 
$checa_array=array_search("informacion_vehiculo",$camposex);
$checa_array2=array_search("auto_marca",$camposex);
$checa_array3=array_search("auto_tipo",$camposex);
$checa_array4=array_search("auto_modelo",$camposex);
$checa_array5=array_search("auto_color",$camposex);
$checa_array6=array_search("auto_placas",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE){} else{
	?>
    <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" class="titles"><strong>Informaci&oacute;n del afiliado</strong> </td>
      </tr></table><div id="datosvehiculo">
          <?php 
include ("datos_vehiculo.php");
	?>
      </div>   
      <?php  } ?>
                    <?php 
$checa_array=array_search("informacion_poliza",$camposex);
if($checa_array===FALSE){} else{
	?>
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
       <tr>
      <td colspan="3" class="titles"><strong>Informaci&oacute;n de la p&oacute;liza</strong></td>
    </tr></table>
    <div id="infopoliza">
    <?php 
include ("info_poliza.php");
	?>
     
    </div>
          <?php        }	  ?>
                          <?php 
$checa_array=array_search("informacion_legal",$camposex);
if($checa_array===FALSE){} else{
	?>
          <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" class="titles"><strong>Situaci&oacute;n Jur&iacute;dica </strong></td>
      </tr></table>
	  <div id="situacion" style="display:block">
	  <?php 
	  $db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '".$id."'");
if (mysqli_num_rows($result)){ 
$situacion_conductor=mysqli_result($result,0,"situacion_juridica");
$detencion=mysqli_result($result,0,"detencion");
$detenido1=mysqli_result($result,0,"detencion");
$liberado1=mysqli_result($result,0,"liberacion");
$detencion=explode("-",$detencion);
$liberacion=mysqli_result($result,0,"liberacion");
$liberacion=explode("-",$liberacion);
$fianzas_conductor=mysqli_result($result,0,"fianzas_conductor");
$monto_fianzas_conductor=mysqli_result($result,0,"monto_fianzas_conductor");
$folios_fianzas_conductor=mysqli_result($result,0,"folios_fianzas_conductor");
$concepto_fianzas_conductor=mysqli_result($result,0,"concepto_fianzas_conductor");
$caucion_conductor=mysqli_result($result,0,"caucion_conductor");
$monto_caucion_conductor=mysqli_result($result,0,"monto_caucion_conductor");
$concepto_caucion_conductor=mysqli_result($result,0,"concepto_caucion_conductor");
$situacion_vehiculo=mysqli_result($result,0,"situacion_vehiculo");
$detencion_vehiculo=mysqli_result($result,0,"detencion_vehiculo");
$detenido2=mysqli_result($result,0,"detencion_vehiculo");
$liberado2=mysqli_result($result,0,"liberacion_vehiculo");
$detencion_vehiculo=explode("-",$detencion_vehiculo);
$liberacion_vehiculo=mysqli_result($result,0,"liberacion_vehiculo");
$liberacion_vehiculo=explode("-",$liberacion_vehiculo);
$fianzas_vehiculo=mysqli_result($result,0,"fianzas_vehiculo");
$monto_fianzas_vehiculo=mysqli_result($result,0,"monto_fianzas_vehiculo");
$folios_fianzas_vehiculo=mysqli_result($result,0,"folios_fianzas_vehiculo");
$concepto_fianzas_vehiculo=mysqli_result($result,0,"concepto_fianzas_vehiculo");
$caucion_vehiculo=mysqli_result($result,0,"caucion_vehiculo");
$monto_caucion_vehiculo=mysqli_result($result,0,"monto_caucion_vehiculo");
$concepto_caucion_vehiculo=mysqli_result($result,0,"concepto_caucion_vehiculo");
}
	  ?>
	  <table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del conductor: </strong> <?php  echo $situacion_conductor;?></td>
            <td bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong>  <?php  
			if ($detenido1 !="0000-00-00") {
			echo ''.$detencion[2].'/'.$detencion[1].'/'.$detencion[0].'';
			}
			else { echo 'Nunca detenido'; }
			?></td>
            <td bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong>  <?php  
			if ($liberado1 !="0000-00-00") {
			echo ''.$liberacion[2].'/'.$liberacion[1].'/'.$liberacion[0].'';
			}
			else { echo ''; }
			?></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><?php  echo nl2br($caucion_conductor);?></td><td><?php  echo nl2br($monto_caucion_conductor);?></td><td><?php  echo nl2br($concepto_caucion_conductor);?></td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><?php  echo nl2br($fianzas_conductor);?></td><td><?php  echo nl2br($monto_fianzas_conductor);?></td><td><?php  echo nl2br($folios_fianzas_conductor);?></td><td><?php  echo nl2br($concepto_fianzas_conductor);?></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Situaci&oacute;n del veh&iacute;culo: </strong> <?php  echo $situacion_vehiculo;?></td>
            <td bgcolor="#ffffff"><strong>Detenci&oacute;n:</strong> <?php 
            if ($detenido2 !="0000-00-00") {
			echo ''.$detencion_vehiculo[2].'/'.$detencion_vehiculo[1].'/'.$detencion_vehiculo[0].'';
			}
			else {echo'Nunca Detenido';}
			?></td>
            <td bgcolor="#ffffff"><strong>Liberaci&oacute;n:</strong> <?php 
            if ($liberado2 !="0000-00-00") {
			echo ''.$liberacion_vehiculo[2].'/'.$liberacion_vehiculo[1].'/'.$liberacion_vehiculo[0].'';
			}
			else{echo'';}
			
			?></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#ffffff">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><?php  echo nl2br($caucion_vehiculo);?></td><td><?php  echo nl2br($monto_caucion_vehiculo);?></td><td><?php  echo nl2br($concepto_caucion_vehiculo);?></td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><?php  echo nl2br($fianzas_vehiculo);?></td><td><?php  echo nl2br($monto_fianzas_vehiculo);?></td><td><?php  echo nl2br($folios_fianzas_vehiculo);?></td><td><?php  echo nl2br($concepto_fianzas_vehiculo);?></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#ffffff"><strong>
              <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '<!--';} else{echo'';}
?>     
            [ <a href="javascript:FAjax('editar.php?id=<?php  echo $id;?>&caso=situacion&flim-flam=new Date().getTime();','situacion','','get');">Editar</a> ]
            
              <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '-->';} else{echo'';}
?>     
            </strong> </td>
          </tr>
</table></div>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" class="titles"><strong>Detalle del Siniestro</strong></td>
      </tr></table>
<div id="siniestro">
<?php 
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
$result = mysqli_query($db,"SELECT * from seguimiento_juridico where general = '".$id."'");
if (mysqli_num_rows($result)){ 
$conductor=mysqli_result($result,0,"conductor");
$tel1=mysqli_result($result,0,"telconductor");
$tel2=mysqli_result($result,0,"telconductor2");
$siniestro=mysqli_result($result,0,"siniestro");
$averiguacion=mysqli_result($result,0,"averiguacion");
$autoridad=mysqli_result($result,0,"autoridad");
$fecha_accidente=mysqli_result($result,0,"fecha_accidente");
$fecha_accidente=explode("-",$fecha_accidente);
$numlesionados=mysqli_result($result,0,"numlesionados");
$numhomicidios=mysqli_result($result,0,"numhomicidios");
$delitos=mysqli_result($result,0,"delitos");
$danos=mysqli_result($result,0,"danos");
$lesiones=mysqli_result($result,0,"lesiones");
$homicidios=mysqli_result($result,0,"homicidios");
$ataques=mysqli_result($result,0,"ataques");
$robo=mysqli_result($result,0,"robo");
$descripcion=mysqli_result($result,0,"descripcion");
$lugar_hechos=mysqli_result($result,0,"lugar_hechos");
$referencias=mysqli_result($result,0,"referencias");
$colonia=mysqli_result($result,0,"colonia");
$ciudad=mysqli_result($result,0,"ciudad");
$municipio=mysqli_result($result,0,"municipio");
$estado=mysqli_result($result,0,"estado");
$ajustador=mysqli_result($result,0,"ajustador");
$telajustador1=mysqli_result($result,0,"telajustador");
$telajustador2=mysqli_result($result,0,"telajustador2");
$monto_danos=mysqli_result($result,0,"monto_danos");
$monto_deducible=mysqli_result($result,0,"monto_deducible");
}
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
$result = mysqli_query($db,"SELECT * from Colonia where idColonia = '$colonia'");
if (mysqli_num_rows($result)){ 
$colonia=mysqli_result($result,0,"NombreColonia");
}
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
$result = mysqli_query($db,"SELECT * from Estado where idEstado = '$estado'");
if (mysqli_num_rows($result)){ 
$estado=mysqli_result($result,0,"NombreEstado");
}
$db = mysqli_connect($host,$username,$pass,$database);
//////mysql_select_db($database);
$result = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '$municipio'");
if (mysqli_num_rows($result)){ 
$municipio=mysqli_result($result,0,"NombreMunicipio");
}
?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <!-- tr>
            <td bgcolor="#FFFFFF"><strong>Conductor:</strong> <?php  echo $conductor; ?></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> <?php  echo $tel1; ?></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> <?php  echo $tel2; ?></td>
          </tr -->
          <tr>
            <td bgcolor="#FFFFFF"><strong>Siniestro:</strong> <?php  echo $siniestro; ?></td>
            <td bgcolor="#FFFFFF"><strong>Averiguaci&oacute;n previa: </strong> <?php  echo $averiguacion; ?></td>
            <td bgcolor="#FFFFFF"><strong>Autoridad:</strong> <?php  echo $autoridad; ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Fecha del accidente: </strong> <?php  echo''.$fecha_accidente[2].'/'.$fecha_accidente[1].'/'.$fecha_accidente[0].''; ?></td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de lesionados: </strong> <?php  echo $numlesionados; ?></td>
            <td bgcolor="#FFFFFF"><strong>N&uacute;mero de homicidios: </strong> <?php  echo $numhomicidios; ?></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td><strong>Delitos:</strong> 
				   <?php  /* if($delitos=="si"){echo'S�';} else{echo'No';} */ ?>
				  </td>
                  <td><strong>Da&ntilde;os:</strong>
				  <?php  if($danos=="si"){echo'S�';} else{echo'No';} ?>				  
				  </td>
                  <td><strong>Lesiones:</strong>
				  				 <?php  if($lesiones=="si"){echo'S�';} else{echo'No';} ?>
				  </td>
                  <td><strong>Homicidios:</strong>
				  				  <?php  if($homicidios=="si"){echo'S�';} else{echo'No';} ?>
				  </td>
                  <td><strong>Ataques:</strong>
				<?php   if($ataques=="si"){echo'S�';} else{echo'No';} ?>
				  </td>
                  <td><strong>Robo:</strong>
				<?php    if($robo=="si"){echo'S�';} else{echo'No';}	?>
				  </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#FFFFFF"><strong>Descripci&oacute;n:</strong><br> <?php  echo nl2br($descripcion); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" colspan="2"><strong>Lugar de los hechos y Referencias: </strong>  <?php   echo "$lugar_hechos $referencias"; ?></td>
            <td bgcolor="#FFFFFF"><strong>Colonia:</strong>  <?php   echo $colonia; ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><strong>Ciudad:</strong>  <?php   echo $ciudad; ?></td>
            <td bgcolor="#FFFFFF"><strong>Municipio:</strong>  <?php   echo $municipio; ?></td>
            <td bgcolor="#FFFFFF"><strong>Estado:</strong>  <?php   echo $estado; ?></td>
          </tr>
          <!-- tr>
            <td bgcolor="#FFFFFF"><strong>Ajustador:</strong>  <?php   echo $ajustador; ?></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong>  <?php   echo $telajustador1; ?></td>
            <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong>  <?php   echo $telajustador2; ?></td>
          </tr -->
          <tr>
            <td bgcolor="#FFFFFF"><strong>Monto da&ntilde;os: </strong> $<?php   echo number_format($monto_danos,2); ?></td>
            <td bgcolor="#FFFFFF"><strong>Monto Deducible: </strong>$<?php   echo number_format($monto_deducible,2); ?></td>
            <td align="right" bgcolor="#FFFFFF"><strong>
              <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '<!--';} else{echo'';}
?>     
            [ <a href="?module=editaDetallesSiniestro&id=<?php  echo $id; ?>">Editar</a> ]
            
              <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '-->';} else{echo'';}
?>     
</strong></td>
          </tr>
        </table>
</div>
    	  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" class="titles"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Terceros</strong></td><td align="right"><strong>
            <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '<!--';} else{echo'';}
?>     
          [ 
          
          <a href="mainframe.php?module=edicionTerceros&id=<?php  echo $id; ?>&caso=nuevo" class="wtlink">Agregar Tercero</a> ]
            <?php       
        $checa_array1=array_search("sg_e",$explota_permisos);

if($checa_array1===FALSE){echo '-->';} else{echo'';}
?>     
          </strong></td>
        </tr>
      </table>        </td>
      </tr>
  </table>
  <div id="terceros">
  <?php 
$link = mysqli_connect($host,$username,$pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($db,"SELECT * FROM terceros where general='".$id."' order by tipo desc, nombre", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
$colonia=$row["colonia"];
$municipio=$row["municipio"];
$estado=$row["estado"];
$dbw = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbw);
$resultw = mysqli_query($db,"SELECT * from Colonia where idColonia = '$colonia'",$dbw);
if (mysqli_num_rows($resultw)){ 
$colonia=mysqli_result($resultw,0,"NombreColonia");
}
$dbw = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbw);
$resultw = mysqli_query($db,"SELECT * from Estado where idEstado = '$estado'",$dbw);
if (mysqli_num_rows($resultw)){ 
$estado=mysqli_result($resultw,0,"NombreEstado");
}
$dbw = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbw);
$resultw = mysqli_query($db,"SELECT * from Municipio where idMunicipio = '$municipio'",$dbw);
if (mysqli_num_rows($resultw)){ 
$municipio=mysqli_result($resultw,0,"NombreMunicipio");
}
echo' <table width="100%" border="0" cellspacing="3" cellpadding="3">
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Tipo:</strong> '.$row["tipo"].'</td>
		    <td colspan="2" bgcolor="#FFFFFF"><strong>Nombre:</strong> '.$row["nombre"].'</td>
		    </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>';
			
if($row["tipo"]=="Persona"){echo'Grado de lesi&oacute;n:';}
else{echo'Da&ntilde;o estimado:';}			
			
			echo'</strong> '.$row["dano_lesion"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> '.$row["tel1"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> '.$row["tel2"].'</td>
		  </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Descripci&oacute;n del da&ntilde;o: </strong><br>'.nl2br($row["descripcion"]).'</td>
		    </tr>
		  <tr>
		    <td colspan="3" bgcolor="#FFFFFF"><strong>Comentarios:</strong><br> '.nl2br($row["comentarios"]).'</td>
		    </tr>
			<tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Datos del veh&iacute;culo</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Marca:</b> '.$row["marca_vehiculo"].'</td>
			<td><b>Tipo:</b> '.$row["tipo_vehiculo"].'</td>
			<td><b>Modelo:</b> '.$row["modelo_vehiculo"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Color:</b> '.$row["color_vehiculo"].'</td>
			<td><b>Placas:</b> '.$row["placas_vehiculo"].'</td>
			<td>&nbsp;</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td colspan="3"><b>Informaci&oacute;n del Seguro</b></td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Aseguradora:</b> '.$row["aseguradora"].'</td>
			<td><b>P&oacute;liza:</b> '.$row["poliza"].'</td>
			<td><b>Inciso:</b> '.$row["inciso"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Siniestro:</b> '.$row["siniestro"].'</td>
			<td><b>Abogado:</b> '.$row["abogado"].'</td>
			<td><b>Empresa:</b> '.$row["empresa"].'</td>
		   </tr>
		   <tr bgcolor="#FFFFFF">
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel1_abogado"].'</td>
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel2_abogado"].'</td>
			<td></td>
		   </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Calle:</strong> '.$row["calle"].'</td>
		    <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> '.$row["ciudad"].'</td>
		    <td bgcolor="#FFFFFF"><strong>C.P.:</strong> '.$row["cp"].'</td>
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF"><strong>Estado:</strong> '.$estado.'</td>
		    <td bgcolor="#FFFFFF"><strong>Municipio:</strong> '.$municipio.'</td>
		    <td bgcolor="#FFFFFF"><strong>Colonia:</strong> '.$colonia.'</td>
		  </tr>
		  <tr>
		    <td bgcolor="#FFFFFF">&nbsp;</td>
		    <td bgcolor="#FFFFFF">&nbsp;</td>
		    <td align="right" bgcolor="#FFFFFF"><strong>[ <a href="mainframe.php?module=edicionTerceros&id='.$id.'&idtercero='.$row["id"].'&caso=editar">Editar</a>  | <a href="javascript:confirmborra('.$id.','.$row["id"].');">Eliminar</a> ]</strong></td>
		    </tr>
	    </table>  ';
}
}
  ?>
    	 
  </div>
  </td>
</tr></table>
          <?php        }	  ?>
          
<br />
<?php 
   $checa_arrayx=array_search("tieneatt",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
   ?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
   <tr>
      <td class="titles"><strong>Archivos Adjuntos</strong></td>
      <td class="titles"><strong>Fecha de Publicacion</strong></td>
 </tr>     

<?php 
$link = mysqli_connect($host,$username,$pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($db,"SELECT * FROM adjuntos where general='".$id."' order by fecha desc", $link); 
if (mysqli_num_rows($result)){ 

  while ($row = @mysqli_fetch_array($result)) { 
$fechadjunto=$row["fecha"];
$fechadjunto=explode("-",$fechadjunto);
echo'   <tr>
      <td bgcolor="#FFFFFF"><a href="adjuntosexp/'.$row["adjunto"].'" target="_blank">'.$row["adjunto"].'</a></td>
	  <td bgcolor="#FFFFFF">'.$fechadjunto[2].'/'.$fechadjunto[1].'/'.$fechadjunto[0].'</td>
 </tr>   ';
}
}
  ?>
 
  <tr>
      <td colspan="2" class="titles"><form method="post" enctype="multipart/form-data" action="upload.php?general=<?php  echo $id; ?>"><strong>Agregar archivo:</strong> <input name="file1" type="file" size="50"/> <input type="submit" value="AGREGAR"/></form></td>
 </tr> 
 </table>
          
<br /><br />          
          <?php  } ?>
<?php  
if (!isset($current)) { $current=1; }
else {}
?>          
   <link href="css/tabs.css" rel="stylesheet">       

<script>
$(document).ready(function() {
    $("#content").find("[id^='tab']").hide(); // Hide all content
    $("#tabs li:nth-child(<?php $current;?>)").attr("id","current"); // Activate the first tab
    $("#content div:nth-child(<?php $current;?>)").fadeIn(); // Show first tab's content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#content").find("[id^='tab']").hide(); // Hide all content
          $("#tabs li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
});

$(document).ready(function() {
    var text_max = 160;
    $('#textarea_feedback').html(text_max + ' caracteres restantes');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' caracteres restantes');
    });
});
</script>

<div class="containerw">
<ul id="tabs">
    <li><a href="#" name="tab1">SEGUIMIENTO INTERNO</a></li>
    <li><a href="#" name="tab2">SEGUIMIENTO EXTERNO</a></li>
    <li><a href="#" name="tab3">CHAT CON USUARIO</a></li>
    <li><a href="#" name="tab4">UBICACION</a></li>
    <li><a href="#" name="tab5">SMS</a></li>
</ul>     

<div id="content"> 
    <div id="tab1">
<form method="post" action="upnotesb.php?id=<?php  echo $id; ?>&popup=0&caso=nuevo">
		  <input type="hidden" name="from_seguimiento" value="true" />
<div class="comentare">    
<strong>AGREGAR COMENTARIO:</strong><br />
<textarea name="comentario" cols="140" rows="5" id="comentario"></textarea>
<div class="clear"></div>  
<input name="Enviar" type="submit" value="Enviar" />
    </div></form><div class="clear"></div>
      <?php 
				$link = mysqli_connect($host,$username,$pass,$database); 
				////mysql_select_db($database, $link); 
				$result = mysqli_query($db,"SELECT * FROM bitacora where general='".$id."' order by fecha desc", $link); 
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$fexar=$row["fecha"];
				$fexaz=explode(" ",$fexar);
				$fexa=explode("-",$fexaz[0]);
				$userx=$row["usuario"];

				$dbl = mysqli_connect($host,$username,$pass,$database);
				////mysql_select_db($database,$dbl);
				$resultl = mysqli_query($db,"SELECT * from Empleado where idEmpleado='$userx'",$dbl);
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");
				}

			echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#0b7eb7"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><span class="whiter"><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</span></td><td align=right><span class="whiter"><strong>'.$eluserx.'</strong></span></td></tr></table></td>
				</tr>
				<tr>
				  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'</td>
				  </tr>
				</table><div class="clear"></div>';  
			$eluserx="";
}}
?>
    </div>
    
    <div id="tab2">
<form method="post" action="upnotescon.php?id=<?php  echo $id; ?>&popup=0&caso=nuevo">
		  <input type="hidden" name="from_seguimiento" value="true" />
          <input type="hidden" name="num_poliza" value="<?php  echo $num_contrato; ?>" />
<div class="comentare">    
<strong>AGREGAR COMENTARIO:</strong><br />
<textarea name="comentario" cols="140" rows="5" id="comentario"></textarea><div class="clear"></div>
<input name="Enviar" type="submit" value="Enviar" />
</div>    
        </form><div class="clear"></div>
       
     <?php 
				$link = mysqli_connect($host,$username,$pass,$database); 
				////mysql_select_db($database, $link); 
				$result = mysqli_query($db,"SELECT * FROM clientacora where general='".$id."' order by fecha desc", $link); 
				
				
				
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$fexar=$row["fecha"];
				$fexaz=explode(" ",$fexar);
				$fexa=explode("-",$fexaz[0]);
				$userx=$row["usuario"];
				$tipo=$row["tipo"];
				$visto=$row["visto"];
				$mensaje=$row["id"];
				$modular=$row["modules"];
				
				if ( $tipo == 1 ) {
				$dbl = mysqli_connect($host,$username,$pass,$database);
				////mysql_select_db($database,$dbl);
				$resultl = mysqli_query($db,"SELECT * from Empleado where idEmpleado='$userx'",$dbl);
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");
				$eliframe="";
				}
				}
				if (( $tipo == 2 ) && (empty($modular)))  {
					
				$dbl = mysqli_connect($host,$username,$pass,$database);
				////mysql_select_db($database,$dbl);
				$resultl = mysqli_query($db,"SELECT nombre from Cliente where idCliente='$userx'",$dbl);
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");				
				}	
				if ( $visto == 0 ) {
						$eliframe="
						<iframe width='0' height='0' src='visto.php?idmensaje=$mensaje'>
						</iframe>
						";
						}
					if ( $visto == 1) { $eliframe=""; } 
					}
if (($tipo == 2) && ($modular=="acceso"))  {
					
								$dbl = mysqli_connect($host,$username,$pass,$database);
				////mysql_select_db($database,$dbl);
				$resultl = mysqli_query($db,"SELECT nombre from accesocl where idusuario='$userx'",$dbl);
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");				
				}	
				if ( $visto == 0 ) {
						$eliframe="
						<iframe width='0' height='0' src='visto.php?idmensaje=$mensaje'>
						</iframe>
						";
						}
					if ( $visto == 1) { $eliframe=""; } 
					}				
					
					if (($tipo == 2) && ($modular=="contratos"))  {
					
								$dbl = mysqli_connect($host,$username,$pass,$database);
				////mysql_select_db($database,$dbl);
				$resultl = mysqli_query($db,"SELECT nombre from webservice where idusuario='$userx'",$dbl);
				if (mysqli_num_rows($resultl)){ 
				$eluserx=mysqli_result($resultl,0,"nombre");				
				}	
				if ( $visto == 0 ) {
						$eliframe="
						<iframe width='0' height='0' src='visto.php?idmensaje=$mensaje'>
						</iframe>
						";
						}
					if ( $visto == 1) { $eliframe=""; } 
					}									
				
				
			echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#0b7eb7"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><span class="whiter"><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</span></td><td align=right><strong><span class="whiter">'.$eluserx.'</span></strong></td></tr></table></td>
				</tr>
				<tr>
				  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'
				  <br />
				  '.$eliframe.'
				  
				  </td>
				  </tr>
				</table><div class="clear"></div>
';  
			$eluserx="";
}}
?>
    </div>
    
    
    <div id="tab3">
    
<?php 
$dbl = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbl);
$resultl = mysqli_query($db,"SELECT status from chatstat where gr='".$id."'",$dbl);
	if (mysqli_num_rows($resultl)){ 
		$stat=mysqli_result($resultl,0,"status");		
	}
	
	if (mysqli_num_rows($resultl)==0) {  
	
	?> 
	<div style="clear:both; height:auto; width:90%; vertical-align:top; position: relative;">     
	<div class="limpiar">
	 <div class="leftchat">            
<strong>    CHAT DESACTIVADO, ACTIVE CHAT PRIMERO</strong>
	</div>
    </div>
    <div class="rightchat">
    <form id="form1" name="form1" method="post" action="process.php?module=chat&id=<?php $id;?>&accela=active">
	<input type="submit" value="ACTIVAR CHAT" />
    </form>
    </div>
    </div>
    <?php 
	 }
	 if ($stat == 1) { 
                ?>   
     <div style="clear:both; height:auto; width:90%; vertical-align:top; position: relative;">     
	<div class="limpiar">
	 <div class="leftchat">            
<strong>    CHAT DESACTIVADO, ACTIVE CHAT PRIMERO</strong>
	</div>
    </div>
    <div class="rightchat">
    <form id="form1" name="form1" method="post" action="process.php?module=chat&id=<?php $id;?>&accela=reactive">
	<input type="submit" value="ACTIVAR CHAT" />
    </form>
    </div>
    </div>
    
	<?php 
	 }
	 if ($stat == 2) { 
                ?>   
     <div style="clear:both; height:auto; width:90%; vertical-align:top; position: relative;">     
	<div class="limpiar">
     <div class="leftchat">            
    <iframe width="690" height="500" src="chat/begin.php?gr=<?php $id?>" scrolling="no" frameborder="0"></iframe>
	</div>
    </div>
    <div class="rightchat">

<?php 
$link = mysqli_connect($host,$username,$pass,$database); 
				////mysql_select_db($database, $link); 
				$result = mysqli_query($link,"SELECT tel_reporta FROM general where id='".$id."' LIMIT 1"); 
				
				
				
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$celsms=$row["tel_reporta"];
				
					  } }
					  


?>

<strong>URL PARA EL USUARIO: http://aateayuda.com/<?php $id?>/</strong><br />

<?php 
$cuentacel=strlen($celsms);
if ($cuentacel == 10) { ?>

<strong>SE ENVIAR� UN SMS A: +52<?php $celsms?></strong>
<br />
<form id="form1" name="form1" method="post" action="process.php?module=enviasms1">
<input type="hidden" name="to" value="+52<?php $celsms?>">
<input type="hidden" name="gr" value="<?php $id?>">
<input type="hidden" name="body" value="Durante su asistencia puede contactarnos por chat: http://aateayuda.com/<?php $id?>">
<input type="submit" value="ENVIAR LIGA">	
</form>
<?php  } else { echo ("<strong>ERROR: No se puede enviar SMS, \"Tel. de contacto\" debe ser de 10 digitos</strong>"); } ?>
<br /><br /><br />
    <form id="form1" name="form1" method="post" action="process.php?module=chat&id=<?php $id;?>&accela=deactive">
	<input type="submit" value="DESACTIVAR CHAT" />
    </form>
    </div>
    </div>
    <?php  } ?>
    


    </div>
        <div id="tab4">
   <?php 
$dbl = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$dbl);
$resultl = mysqli_query($db,"SELECT lat,longi from chatstat where gr='".$id."'",$dbl);
	if (mysqli_num_rows($resultl)){ 
		$lat=mysqli_result($resultl,0,"lat");		
		$longi=mysqli_result($resultl,0,"longi");		
	}
	
	if (!empty($lat) && !empty($longi)) {
		
		?> 
		
		
<a href="http://maps.google.com/maps?q=<?php $lat?>,<?php $longi?>&ll=<?php $lat?>,<?php $longi?>&z=17" target="_blank"><img src="http://maps.googleapis.com/maps/api/staticmap?center='<?php $lat?>,<?php $longi?>&zoom=15&size=720x640&markers=color:red%7C<?php $lat?>,<?php $longi?>&maptype=roadmap&sensor=false" width="720" height="640" border="0" /></a>
        
		<?php 
		
		 }
	
	else { echo "<strong>Usuario no ha ingresado su ubicaci�n</strong>";}
	
	?>
    </div>
        <div id="tab5">

<?php 
$link = mysqli_connect($host,$username,$pass,$database); 
				////mysql_select_db($database, $link); 
				$result = mysqli_query($link,"SELECT tel_reporta FROM general where id='".$id."' LIMIT 1"); 
				
				
				
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$celsms=$row["tel_reporta"];
				
					  } }
					  


?>        
        
<?php 
$cuentacel=strlen($celsms);

if ($cuentacel == 10) { ?>

<strong>SE ENVIARÁ UN SMS A: +52<?php $celsms?></strong>
<br />
<form id="form1" name="form1" method="post" action="process.php?module=enviasms2">
<input type="hidden" name="to" value="+52<?php $celsms?>">
<input type="hidden" name="gr" value="<?php $id?>">
<textarea id="textarea" name="body" cols="80" rows="4" maxlength="160"></textarea>
<br />
<input type="submit" value="ENVIAR MENSAJE">	
<div id="textarea_feedback"></div>
</form>
<div class="leftchatb">  
<strong> MENSAJES ENVIADOS:</strong><br />
 <?php 
 
 require('twilio/Services/Twilio.php'); 
 
$account_sid = 'AC3048129fd0b1bb1c671c85f6125f15fc'; 
$auth_token = 'd28ff46a069b4e16057677cc2da8764d'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$messages = $client->account->messages->getIterator(0, 50, array( 
	'To' => "+52".$celsms,   
	
)); 


 
foreach ($messages as $message) { 

$gmdate = $message->date_sent;
$timestamp = date( 'd/m/Y H:i:s', strtotime( $gmdate) );


echo '<table width="440" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#0b7eb7"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><span class="whiter"><strong>Fecha:</strong> '.$timestamp.'</span></td><td align=right><b></b></td></tr></table></td>
				</tr>
				<tr>
				  <td bgcolor="#ffffff"><strong>Mensaje:</strong><br>'.$message->body.'
				  </td>
				  </tr>
				</table>';

}
 
 ?>
 </div>
 
  <div class="rightchatb">
 <strong> MENSAJES RECIBIDOS:</strong><br />
 
  <?php 
 
 
 
$messagesb = $client->account->messages->getIterator(0, 50, array( 
	'From' => "+52".$celsms,   
	
)); 


 
foreach ($messagesb as $messageb) { 
$gmdate2 = $messageb->date_sent;
$timestamp2 = date( 'd/m/Y H:i:s', strtotime( $gmdate2) );
echo '<table width="440" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#0b7eb7"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><span class="whiter"><strong>Fecha:</strong> '.$timestamp2.'</span></td><td align=right><b></b></td></tr></table></td>
				</tr>
				<tr>
				  <td bgcolor="#ffffff"><strong>Mensaje:</strong><br>'.$messageb->body.'
				  </td>
				  </tr>
				</table>';

}
 
 ?>
 
  </div>

<?php  } else { echo ("<strong>ERROR: No se puede iniciar CHAT SMS, \"Tel. de contacto\" debe ser de 10 digitos</strong>"); } ?>

<br /><br /><br />

    </div>
</div>       
</div>          
<br /><br />

