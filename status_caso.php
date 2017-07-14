<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popup(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600');");
}
// End -->
</script>


<script type="text/javascript" language="JavaScript">
function confirmGeneral(generalurl) { 
if (confirm("¿Está seguro?")) { 
document.location = generalurl; 
}
}
</script>

<?php 
if(!isset($_SESSION)){
session_start();
}

if(isset($_GET['id']) && $_GET['id'] != ""){ 
	$id = $_GET['id'];
}elseif(isset($_POST['id']) && $_POST['id'] != ""){
	$id = $_POST['id'];
	
	}else{ $id= "" ;
	}

if(!function_exists("mysqli_result")){
	
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
	
	
} 

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$explota_permisos=explode(",",$_SESSION['valid_permisos']);
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from general where id = '".$id."'");
if (mysqli_num_rows($result)){ 

$banderazo=mysqli_result($result,0,"banderazo");
$blindaje=mysqli_result($result,0,"blindaje");
$maniobras=mysqli_result($result,0,"maniobras");
$espera=mysqli_result($result,0,"espera");
$otro=mysqli_result($result,0,"otro");
$total=mysqli_result($result,0,"total");


$statuscaso=mysqli_result($result,0,"status");
$proveedorasignado=mysqli_result($result,0,"proveedor");
$expp=mysqli_result($result,0,"expediente");

$fexa1=mysqli_result($result,0,"fecha_recepcion");
$fexa1=explode(" ",$fexa1);
$fexa1d=explode("-",$fexa1[0]);
$fexa1gh=mysqli_result($result,0,"fecha_recepcion");

$fzor=mysqli_result($result,0,"ultimostatus");
$fzor1=explode(" ",$fzor);
$fzor1d=explode("-",$fzor1[0]);


##
$kosmos2=mysqli_result($result,0,"apertura_expediente");
$fexax=mysqli_result($result,0,"apertura_expediente");
$fexax=explode(" ",$fexax);
$fexaxd=explode("-",$fexax[0]);
##
$telos2=mysqli_result($result,0,"asignacion_proveedor");
$fexa2=mysqli_result($result,0,"asignacion_proveedor");
$fexa2=explode(" ",$fexa2);
$fexa2d=explode("-",$fexa2[0]);
##
$telos1=mysqli_result($result,0,"arribo");
$fexa3=mysqli_result($result,0,"arribo");
if($fexa3=="0000-00-00 00:00:00"  && empty($NO_EDITAR)){$whitr='<input type="button" name="Button" value="El Proveedor ha arribado" onClick="javascript:confirmGeneral(\'?module=detail_seguimiento&id='.$id.'&set_date=arribo\')"/>';}
else{
$fexa3=explode(" ",$fexa3);
$fexa3d=explode("-",$fexa3[0]);
$whitr= "".$fexa3d[2]."/".$fexa3d[1]."/".$fexa3d[0]." ".$fexa3[1]."";
}
##
$kosmos1=mysqli_result($result,0,"contacto");
$fexa4=mysqli_result($result,0,"contacto");
if($fexa4=="0000-00-00 00:00:00" && empty($NO_EDITAR)){$tyurru='<input type="button" name="Button" value="El Proveedor ha contactado" onClick="javascript:confirmGeneral(\'?module=detail_seguimiento&id='.$id.'&set_date=contacto\')"/>';}
else{
$fexa4=explode(" ",$fexa4);
$fexa4d=explode("-",$fexa4[0]);
$tyurru="".$fexa4d[2]."/".$fexa4d[1]."/".$fexa4d[0]." ".$fexa4[1]."";
}

##
$minus1=strtotime('-1 years');
$minus2=strtotime('-2 years');
$telos1a=mysqli_result($result,0,"contactoext");
$fexa3a=mysqli_result($result,0,"contactoext");
if($fexa3a=="0000-00-00 00:00:00"  && empty($NO_EDITAR)){$whitrext='
<form action="?module=detail_seguimiento&id=' .$id. '&set_date=contactoext" method="post"/>
<select name="dcontext">
<option value="'.date("d").'" selected>'.date("d").'</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="mcontext">
<option value="'.date("m").'">'.$meses[date("n")-1].'</option>
<option value="01">Enero</option>
<option value="02">Febrero</option>
<option value="03">Marzo</option>
<option value="04">Abril</option>
<option value="05">Mayo</option>
<option value="06">Junio</option>
<option value="07">Julio</option>
<option value="08">Agosto</option>
<option value="09">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select>
<select name="acontext">
<option value="'.date("Y").'" selected>'.date("Y").'</option>
<option value="'.date("Y", $minus1).'">'.date("Y", $minus1).'</option>
<option value="'.date("Y", $minus2).'">'.date("Y", $minus2).'</option>
</select>
<select name="hcontext">
<option value="'.date("H").'" selected>'.date("H").'</option>
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
</select>
<select name="mincontext">
<option value="'.date("i").'" selected>'.date("i").'</option>
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
<input type="hidden" name="segundero1" value="'.date("s").'">
<input type="Submit" name="Button" value="Asignar">
</form>
';}
else{
$fexa3a=explode(" ",$fexa3a);
$fexa3da=explode("-",$fexa3a[0]);
$whitrext="".$fexa3da[2]."/".$fexa3da[1]."/".$fexa3da[0]." ".$fexa3a[1]."";
}
##
$kosmos1a=mysqli_result($result,0,"terminoext");
$fexa4a=mysqli_result($result,0,"terminoext");
if($fexa4a=="0000-00-00 00:00:00" && empty($NO_EDITAR)){$tyurruext='
<form action="?module=detail_seguimiento&id='.$id.'&set_date=terminoext" method="post"/>
<select name="dterminoext">
<option value="'.date("d").'" selected>'.date("d").'</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="mterminoext">
<option value="'.date("m").'">'.$meses[date("n")-1].'</option>
<option value="01">Enero</option>
<option value="02">Febrero</option>
<option value="03">Marzo</option>
<option value="04">Abril</option>
<option value="05">Mayo</option>
<option value="06">Junio</option>
<option value="07">Julio</option>
<option value="08">Agosto</option>
<option value="09">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option>
</select>
<select name="aterminoext">
<option value="'.date("Y").'" selected>'.date("Y").'</option>
<option value="'.date("Y", $minus1).'">'.date("Y", $minus1).'</option>
<option value="'.date("Y", $minus2).'">'.date("Y", $minus2).'</option>
</select>
<select name="hterminoext">
<option value="'.date("H").'" selected>'.date("H").'</option>
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
</select>
<select name="minterminoext">
<option value="'.date("i").'" selected>'.date("i").'</option>
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
<input type="hidden" name="segundero2" value="'.date("s").'">
<input type="Submit" name="Button" value="Asignar">
</form>
';}
else{
$fexa4a=explode(" ",$fexa4a);
$fexa4da=explode("-",$fexa4a[0]);
$tyurruext="".$fexa4da[2]."/".$fexa4da[1]."/".$fexa4da[0]." ".$fexa4a[1]."";
}

##

}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Provedor where id = '$proveedorasignado'");
if (mysqli_num_rows($result)){ 
$proveedorasignado=mysqli_result($result,0,"nombre");
$proveedornotas=mysqli_result($result,0,"id");
}
####
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT monto from pagos where expediente = '$expp' LIMIT 1");
if (mysqli_num_rows($result)){ 
$costoint=mysqli_result($result,0,"monto");
}


#########################_______________________
#""""""""""""""""""""""""""""""""""""

#function segundos_tiempo($segundos){
#$minutos=$segundos/60;
#$horas=floor($minutos/60);
#$minutos2=$minutos%60;
#$segundos_2=$segundos%60%60%60;
#if($minutos2<10)$minutos2='0'.$minutos2;
#if($segundos_2<10)$segundos_2='0'.$segundos_2;
#if($segundos<60){ /* segundos */
#$resultado= round($segundos).' Segundos';
#}elseif($segundos>60 && $segundos<3600){/* minutos */
#$resultado= $minutos2.':'.$segundos_2.' Minutos';
#}else{/* horas */
#$resultado= $horas.':'.$minutos2.':'.$segundos_2.' Horas';
#}
#return $resultado;
#}
#$segundos=date('h')*60*60+(date('i')*60)+date('s');

function segundos_tiempo($segundos){
$minutos=$segundos/60;
$horas=floor($minutos/60);
$minutos2=$minutos%60;
$segundos_2=$segundos%60%60%60;
if($minutos2<10)$minutos2='0'.$minutos2;
if($segundos_2<10)$segundos_2='0'.$segundos_2;
if($segundos<60){ /* segundos */
$resultado= '00:00:'.round($segundos).'';
}elseif($segundos>60 && $segundos<3600){/* minutos */
$resultado= '00:'.$minutos2.':'.$segundos_2.'';
}else{/* horas */
$resultado= $horas.':'.$minutos2.':'.$segundos_2.'';
}
return $resultado;
}
$segundos=date('h')*60*60+(date('i')*60)+date('s');

#""""""""""""""""""""""""""""""""""""




?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td bgcolor="#ffffff"><strong>Status:</strong> <?php  echo $statuscaso;?></td>
    <td bgcolor="#ffffff"><strong>Asignado a proveedor:</strong> <?php  echo $proveedorasignado;?></td>
    <td bgcolor="#ffffff"><strong>Hora de recepci�n:</strong> <?php  echo''.$fexa1d[2].'/'.$fexa1d[1].'/'.$fexa1d[0].' '.$fexa1[1].'';?></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff"><strong>Hora de registro:</strong> <?php  echo''.$fexaxd[2].'/'.$fexaxd[1].'/'.$fexaxd[0].' '.$fexax[1].'';?></td>
    <td bgcolor="#ffffff"><strong>Hora de asignaci&oacute;n:</strong> <?php  echo''.$fexa2d[2].'/'.$fexa2d[1].'/'.$fexa2d[0].' '.$fexa2[1].'';?></td>
    <td bgcolor="#ffffff"><strong>Hora de arribo:</strong> <?php  echo $whitr;	?></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff"><strong>Hora de contacto:</strong> <?php  echo $tyurru;	?></td>
    <td bgcolor="#FFFFFF"><strong>Tiempo de arribo:</strong> <?php 
    if($telos2!="0000-00-00 00:00:00" && $telos1!="0000-00-00 00:00:00"){
$cortax1=explode(" ",$telos1);
$cortax1d=explode("-",$cortax1[0]);
$cortax1t=explode(":",$cortax1[1]);
#
$cortax2=explode(" ",$telos2);
$cortax2d=explode("-",$cortax2[0]);
$cortax2t=explode(":",$cortax2[1]);
#$tiempolimit=mktime($starthora - 24, $startmin, $startseg, $startmes, $startdia, $startano);	
$date1 = mktime($cortax1t[0],$cortax1t[1],$cortax1t[2],$cortax1d[1],$cortax1d[2],$cortax1d[0]);
$date2 = mktime($cortax2t[0],$cortax2t[1],$cortax2t[2],$cortax2d[1],$cortax2d[2],$cortax2d[0]);

$dif1=$date1-$date2;
#if($dif1<60){echo "$dif1 segundos";}
#if($dif1>60 && $dif1<3600){$dif1=$dif1/60; echo "$dif1 minutos";}
echo segundos_tiempo($dif1);
	}
	?></td>
    <td bgcolor="#FFFFFF"><strong>Tiempo de contacto:</strong>
    <?php 
if($kosmos2!="0000-00-00 00:00:00" && $kosmos1!="0000-00-00 00:00:00"){
$cortax1=explode(" ",$kosmos1);
$cortax1d=explode("-",$cortax1[0]);
$cortax1t=explode(":",$cortax1[1]);
#
$cortax2=explode(" ",$kosmos2);
$cortax2d=explode("-",$cortax2[0]);
$cortax2t=explode(":",$cortax2[1]);
#
$date1 = mktime($cortax1t[0],$cortax1t[1],$cortax1t[2],$cortax1d[1],$cortax1d[2],$cortax1d[0]);
$date2 = mktime($cortax2t[0],$cortax2t[1],$cortax2t[2],$cortax2d[1],$cortax2d[2],$cortax2d[0]);

$dif2=$date1-$date2;

echo segundos_tiempo($dif2);
	}
	?>
    </td>
  </tr>
    <tr>
    <td bgcolor="#ffffff"><strong>Concluir caso:</strong> <?php  
	
	if($statuscaso=="concluido"){echo'Caso Conclu&iacute;do';} else{ if(empty($NO_EDITAR)){ echo'<input type="button" name="Button" value="Conclu&iacute;r caso" onClick="javascript:confirmGeneral(\'?module=detail_seguimiento&id='.$id.'&set_status=concluido\')"/>';}} ?></td>
    <td bgcolor="#FFFFFF"><strong>Costo interno:</strong> $<?php  echo number_format($costoint,2); ?></td>

<td bgcolor="#FFFFFF"><b>Hora de ultimo status:</b> 
<?php 
if($fzor!="0000-00-00 00:00:00"){echo''.$fzor1d[2].'/'.$fzor1d[1].'/'.$fzor1d[0].' '.$fzor1[1].'';}
else{echo''.$fexaxd[2].'/'.$fexaxd[1].'/'.$fexaxd[0].' '.$fexax[1].'';}
?>


</td></tr>
<tr>
<td bgcolor="#ffffff"><strong>Hora de Contacto (externo):</strong> <?php  echo $whitrext;	?></td>
<td bgcolor="#ffffff"><strong>Hora de Termino (externo):</strong> <?php  echo $tyurruext;	?></td>
<td bgcolor="#ffffff"></td>
</tr>
<tr>
    <td colspan="3" align="right" bgcolor="#ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        
        <?php 
        if(($banderazo!="0.00" or $blindaje!="0.00" or $maniobras!="0.00" or $espera!="0.00" or $otro!="0.00" or $total!="0.00" or $costoint!="0.00") && empty($NO_EDITAR)){echo'
		<form><input type=button value="Imprimir Carta de Costos" onClick="javascript:popup(\'imprime_carta.php?id='.$id.'\')"></form>';}
		?>
        
        </td>
		<?php  if(empty($NO_EDITAR)):?>
  
 
        
			<td align="right"><strong>[ <a href="javascript:FAjax('editacosto.php?id=<?php  echo $id;?>&amp;flim-flam=new Date().getTime()','statuscaso','','get');">Editar costo</a> | <a href="javascript:FAjax('editastatuscaso.php?id=<?php  echo $id;?>&amp;flim-flam=new Date().getTime()','statuscaso','','get');">Editar status</a> | <a href="javascript:FAjax('reasignarproveedor.php?id=<?php  echo $id;?>&amp;flim-flam=new Date().getTime()','statuscaso','','get');">Reasignar Proveedor</a> 
  
     
            
                           <?php 
        if(($proveedorasignado!="")){echo'
		      | <a href="notas_proveedorb.php?id='.$proveedornotas.'" target="_blank">Reportar Proveedor</a> ';}
		?>    
        ]
        </strong></td>
        
        
        
		<?php  endif; ?>
      </tr>
    </table>      </td>
  </tr>
</table>
