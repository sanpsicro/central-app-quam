<?php 
ob_start("ob_gzhandler");
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 
$id=$_GET['id'];
$caso = "";
$monto="";
//$caso = $_POST['caso'];
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

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT expediente, proveedor from general where id = '".$id."'");
if (mysqli_num_rows($result)){ 
$exxxp=mysqli_result($result,0,"expediente");
$provx=mysqli_result($result,0,"proveedor");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT monto from pagos where expediente = '".$exxxp."' LIMIT 1");
if (mysqli_num_rows($result)){ 
$monto=mysqli_result($result,0,"monto");
}

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT banderazo, blindaje, maniobras, espera, otro, total from general where id = '".$id."'");
if (mysqli_num_rows($result)){ 
$banderazo=mysqli_result($result,0,"banderazo");
$blindaje=mysqli_result($result,0,"blindaje");
$maniobras=mysqli_result($result,0,"maniobras");
$espera=mysqli_result($result,0,"espera");
$otro=mysqli_result($result,0,"otro");
$totalCalculado=number_format($banderazo+$blindaje+$maniobras+$espera+$otro,2);
$total=mysqli_result($result,0,"total");

}
?>

<form method="post" onsubmit="FAjax('costointerno.php?&flim-flam=new Date().getTime()','statuscaso','id=<?php echo $id; ?>&caso=<?php echo $caso; ?>&monto='+document.getElementById('monto').value+'&expediente='+document.getElementById('expediente').value+'&proveedor='+document.getElementById('proveedor').value+'&banderazo='+document.getElementById('banderazo').value+'&blindaje='+document.getElementById('blindaje').value+'&maniobras='+document.getElementById('maniobras').value+'&espera='+document.getElementById('espera').value+'&otro='+document.getElementById('otro').value+'&total='+document.getElementById('total').value,'POST'); return false" action="#">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
          
<?php 		
session_start();
$explota_tipo=explode(",",$_SESSION["valid_tipo"]); ?>          
 <td colspan="2" align="center" bgcolor="#eeeeee"><strong>Costo interno</strong></td>

<?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?>  
            <td colspan="2" align="center" bgcolor="#eeeeee"><strong>Costo cliente</strong></td>
<?php } ?>                        
          </tr>
          <tr>

            <td width="25%"  <?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?> rowspan="6"<?php } ?>   bgcolor="#ffffff"><strong>Monto: 
              <input name="expediente" type="hidden" id="expediente" value="<?php echo $exxxp; ?>" />
              <input name="proveedor" type="hidden" id="proveedor" value="<?php echo $provx; ?>" />              
            </strong></td>
            <td width="25%"  <?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?> rowspan="6"<?php } ?>   bgcolor="#ffffff">$ 
            <input name="monto" type="text" id="monto" size="20"  value="<?php echo $monto; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
 <?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?>
            <td width="25%" bgcolor="#ffffff"><strong>Banderazo:</strong></td>
            <td width="25%" bgcolor="#ffffff">$ 
            <input name="banderazo" type="text" id="banderazo" size="20"  value="<?php echo $banderazo; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
<?php } ?>            
          </tr>
<?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?>          
          <tr>
            <td bgcolor="#ffffff"><strong>Blindaje:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="blindaje" type="text" id="blindaje" size="20"  value="<?php echo $blindaje; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Maniobras:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="maniobras" type="text" id="maniobras" size="20"  value="<?php echo $maniobras; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Tiempo de espera:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="espera" type="text" id="espera" size="20"  value="<?php echo $espera; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Otro:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="otro" type="text" id="otro" size="20"  value="<?php echo $otro; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
         <tr>
            <td bgcolor="#ffffff"><strong>Total:</strong></td>
            <td bgcolor="#ffffff">$ <?php echo $totalCalculado; ?></td>
          </tr>

<?php } ?>        

<?php if(array_search("administrador",$explota_tipo)!==FALSE) { } else { ?>  

<input name="banderazo" type="hidden" id="banderazo" size="20"  value="<?php echo $banderazo; ?>" />
<input name="blindaje" type="hidden" id="blindaje" size="20"  value="<?php echo $blindaje; ?>" />
<input name="maniobras" type="hidden" id="maniobras" size="20"  value="<?php echo $maniobras; ?>" />
<input name="espera" type="hidden" id="espera" size="20"  value="<?php echo $espera; ?>" />
<input name="otro" type="hidden" id="otro" size="20"  value="<?php echo $otro; ?>" />
 <?php } ?>
          
          <input name="total" type="hidden" id="total" value="<?php echo $totalCalculado; ?>">
			            
					<tr>
            <td <?php if(array_search("administrador",$explota_tipo)!==FALSE) { ?> colspan="4" <?php } else { ?> colspan="2" <?php } ?>   align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax('statuscaso.php?id=<?php echo $id; ?>&caso=<?php echo $caso; ?>&flim-flam=new Date().getTime()','statuscaso','','get');"/></td>
          </tr>
        </table>
</form>


<?php ob_flush();?>
