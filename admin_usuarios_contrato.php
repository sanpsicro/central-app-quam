<?php 
session_start();
 include 'conf.php';
 
 $idPoliza = $_GET['idPoliza'];
 $tmpid = $_GET['tmpid'];
 $tipocliente = $_GET['tipocliente'];
 $numcontrato = $_GET['numcontrato'];
 isset($_GET['idCliente']) ? $idCliente = $_GET['idCliente'] : $idCliente=  0;
 
  $accela = $_GET['accela'];
  isset($_GET['same']) ? $same= $_GET['same'] : $same= null;
 
  isset($_POST['fecha']) ? $fecha= $_POST['fecha'] : $fecha= null;
  isset($_POST['comision']) ? $comision= $_POST['comision'] : $comision= null;
  isset($_GET['id']) ? $id= $_GET['id'] : $id= null;
  

 
  
  //indefinidas

   isset($_POST['marca']) ? $marca= $_POST['marca'] : $marca= null;
   isset($_POST['tipo']) ? $tipo= $_POST['tipo'] : $tipo= null;
   isset($_POST['placas']) ? $placas= $_POST['placas'] : $placas= null;
   isset($_POST['servicio']) ? $servicio= $_POST['servicio'] : $servicio= null;
  
   isset($_POST['tipoventa']) ? $tipoventa= $_POST['tipoventa'] : $tipoventa= null;
  isset($_POST['monto']) ? $monto= $_POST['monto'] : $monto= null;


  
   isset($_POST['modelo']) ? $modelo= $_POST['modelo'] : $modelo= null;
  isset($_POST['color']) ? $color= $_POST['color'] : $color= null;
   isset($_POST['serie']) ? $serie= $_POST['serie'] : $serie= null;
   isset($_POST['ingreso']) ? $ingreso= $_POST['ingreso'] : $ingreso= null;
   
   
   
   
   

  
  
   $nombre="";
   $domicilioa="";
   $domiciliob="";
   $domicilio="";
   $ciudad="";
   $municipio="";
   $estado="";
   $colonia="";
   $tel="";
   $cel="";
   $nextel="";
   $mail="";
  


  
  
  
 
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
  
 if($accela=="edit" && isset($id)){
 	
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from usuarios_contrato where id = '$id'") ;
$fecha_inicio=mysqli_result($result,0,"fecha_inicio");
$finicio=explode(" ",$fecha_inicio);
$finix=explode("-",$finicio[0]);
$fecha_vencimiento=mysqli_result($result,0,"fecha_vencimiento");
$fvence=explode(" ",$fecha_vencimiento);
$fvenx=explode("-",$fvence[0]);
$monto=mysqli_result($result,0,"monto")  ;
$comision=mysqli_result($result,0,"comision");
$ingreso=mysqli_result($result,0,"ingreso");

$tipoventa=mysqli_result($result,0,"tipo_venta");

$marca=mysqli_result($result,0,"marca");
$modelo=mysqli_result($result,0,"modelo");
$tipo=mysqli_result($result,0,"tipo");
$color=mysqli_result($result,0,"color");
$placas=mysqli_result($result,0,"placas");
$serie=mysqli_result($result,0,"serie");
$servicio=mysqli_result($result,0,"servicio");
$pre_idPoliza=mysqli_result($result,0,"idPoliza");
$pre_tmpid=mysqli_result($result,0,"tmpid");

$nombre=mysqli_result($result,0,"nombre");
$fecha_nacimiento=mysqli_result($result,0,"fecha_nacimiento");
$fecha=explode("-",$fecha_nacimiento);
$domicilio=mysqli_result($result,0,"domicilio");
$colonia=mysqli_result($result,0,"colonia");
$ciudad=mysqli_result($result,0,"ciudad");
$municipio=mysqli_result($result,0,"municipio");
$estado=mysqli_result($result,0,"estado");
$tel=mysqli_result($result,0,"tel");
$cel=mysqli_result($result,0,"cel");
$nextel=mysqli_result($result,0,"nextel");
$mail=mysqli_result($result,0,"mail");
}

######################################=====================
 if($accela=="new" && $same=="yes"){
$db = mysqli_connect($host,$username,$pass,$database);
////mysql_select_db($database,$db);
$result = mysqli_query($db,"SELECT * from Cliente where idCliente = '$idCliente'");
$nombre=mysqli_result($result,0,"nombre")  ;
$domicilioa=mysqli_result($result,0,"calle");
$domiciliob=mysqli_result($result,0,"numero");
$domicilio="$domicilioa $domiciliob";
$ciudad=mysqli_result($result,0,"ciudad");
$municipio=mysqli_result($result,0,"municipio");
$estado=mysqli_result($result,0,"estado");
$colonia=mysqli_result($result,0,"colonia");
$tel=mysqli_result($result,0,"telefonoCasa");
$cel=mysqli_result($result,0,"telefonoCelular");
$nextel=mysqli_result($result,0,"nextel");
$mail=mysqli_result($result,0,"email");


}
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link href="style_1.css" rel="stylesheet" type="text/css" />

 <SCRIPT TYPE="text/javascript">
<!--

function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789.-()*").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

//-->
</SCRIPT>

 <script type="text/javascript">
function f(o){
o.value=o.value.toUpperCase();
}
function g(o){
}
</script>
<script type="text/javascript" src="subcombo.js"></script>


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
                          capaContenedora.innerHTML="<input name='fecha_vencimiento' type='text' id='fecha_vencimiento' size='15' value='Cargando...' readonly='readonly' disabled='disabled'/>";
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
                                      capaContenedora.innerHTML="<input name='fecha_vencimiento' type='text' id='fecha_vencimiento' size='15' value='Cargando...' readonly='readonly' disabled='disabled'/>";
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
function calula(){
var alfa = document.frm.monto.value;
var beta = document.frm.comision.value;
cec= alfa - beta;
document.frm.ingreso.value= cec;
}
</script>
<script Language="JavaScript">
function validar(formulario) {

 /* if (formulario.tipoventa.value =="") {
    alert("Seleccione un tipo de venta");
    formulario.tipoventa.focus();
    return (false);
  }
*/

  if (formulario.nombre.value.length < 4) {
    alert("Escriba un nombre");
    formulario.nombre.focus();
    return (false);
  }
  
  
  if (formulario.domicilio.value.length < 4) {
    alert("Escriba un domicilio");
    formulario.domicilio.focus();
    return (false);
  }
  
    if (formulario.ciudad.value.length < 4) {
    alert("Escriba una ciudad");
    formulario.ciudad.focus();
    return (false);
  }
  
    if (formulario.estado.value==0) {
    alert("Seleccione un Estado");
    formulario.estado.focus();
    return (false);
  }
  
      if (formulario.municipio.value == 0) {
    alert("Seleccione un Municipio");
    formulario.estado.focus();
    return (false);
  }
  
  
     if (formulario.tel.value.length < 4) {
    alert("Escriba un tel�fono");
    formulario.tel.focus();
    return (false);
  }
  
  /*
  if ((formulario.mail.value.indexOf ('@', 0) == -1)||(formulario.mail.value.length < 5)) { 
    alert("Escriba una direcci�n de correo v�lida"); 
	    formulario.mail.focus();
    return (false); 
  }
  */
  return (true); 
}
</script>
<script language="JavaScript" src="js/calendar1.js"></script>

</head><body>
 <table width="100%%" border="0" cellspacing="3" cellpadding="3">
 <?php 
echo'<form name="frm" method="post" action="process.php?module=usuarios_contrato&accela='.$accela.'&idPoliza='.$idPoliza.'&tmpid='.$tmpid.'&id='.$id.'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'" onSubmit="return validar(this)">';
?>    

  <tr>

    <td colspan="4" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Usuarios</strong></td>


        <td width="300" align="center" class="blacklinks">[ <a href="admin_usuarios_contrato.php?accela=new&tmpid=<?php  echo $tmpid;?>&idPoliza=<?php  echo $idPoliza;?>&tipocliente=<?php  echo $tipocliente;?>&numcontrato=<?php  echo $numcontrato;?>&same=yes&idCliente=<?php  echo $idCliente;?>">Mismos datos que cliente</a> | <a href="usuarios_contrato.php?tmpid=<?php  echo $tmpid; ?>&idPoliza=<?php  echo $idPoliza; ?>&tipocliente=<?php  echo $tipocliente; ?>&numcontrato=<?php  echo $numcontrato; ?>&idCliente=<?php  echo $idCliente;?>">Lista de Usuarios</a> ]</td>
      </tr>

    </table>      </td>
  </tr>

  

   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos de contrato</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de inicio:</strong> </td>
     <td bgcolor="#bbbbbb"><table width=100% cellpadding=0 cellspacing=0><tr><td width="20"><input name="fecha_inicio" type="text" id="fecha_inicio" size="15" value="<?php 

		if($accela=="edit"){echo''.$finix[2].'-'.$finix[1].'-'.$finix[0].'';} else{echo date("j-n-Y"); } ?>" /></td>
       <td><a href="javascript:cal1.popup();"><img src="img/cal.gif" width="16" height="16" border="0" alt="Seleccionar fecha"></a></td>
       <td>&nbsp; <!-- strong>Hora:</strong>
        <input name="hora_inicio" type="text" id="hora_inicio" size="6" value="<?php 

		#if($accela=="edit"){echo''.$finicio[1].'';} else{echo date("H:i:s");                 } ?>" --></td></tr></table>
     </td>
     <td align="right" bgcolor="#bbbbbb"><strong>Tipo de venta:</strong> </td>
     <td bgcolor="#bbbbbb"><?php 

$link = mysqli_connect($host, $username, $pass,$database); 

////mysql_select_db($database, $link); 

$result = mysqli_query($link,"SELECT * FROM TipoVenta"); 

if (mysqli_num_rows($result)){ 
/*
echo'<select name="tipoventa" id="tipoventa" onChange="FAjax(\'fechacombo.php?&flim-flam=new Date().getTime()\',\'vencimiento\',\'opcion=\'+document.getElementById(\'tipoventa\').value+\'&actual=\'+document.getElementById(\'fecha_inicio\').value,\'POST\')" ><option value="">Seleccione una opci�n</option>';

*/

echo'<select name="tipoventa" id="tipoventa"><option value="">Seleccione una opci&oacuten</option>';


  while ($row = @mysqli_fetch_array($result)) { 

  echo'<option value="'.$row["idVenta"].'"';

     if($tipoventa==$row["idVenta"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>    </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de vencimiento:</strong></td>
     <td bgcolor="#bbbbbb"><table width=100% cellpadding=0 cellspacing=0><tr><td width="20">
     <div id="vencimiento"><input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value="<?php  if($accela=="edit"){echo''.$fvenx[2].'-'.$fvenx[1].'-'.$fvenx[0].'';}?>" /></div>
     
     </td>
           <td><a href="javascript:cal2.popup();"><img src="img/cal.gif" width="16" height="16" border="0" alt="Seleccionar fecha"></a></td>
          <td>&nbsp;
     <!-- strong>Hora:</strong> 
      <input name="hora_vencimiento" type="text" id="hora_vencimiento" size="6" value="<?php 

		#if($accela=="edit"){echo''.$fvence[1].'';} else{echo date("H:i:s");                 } ?>" -->     </td></tr></table>
        
        
     </td>
     <td align="right" bgcolor="#bbbbbb"><strong>Monto $:</strong></td>
     <td bgcolor="#bbbbbb"><input name="monto" type="text" id="monto" size="30"value="<?php  echo"$monto";?>" onChange="calula();"    onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Comisi&oacute;n $:</strong></td>
     <td bgcolor="#bbbbbb"><input name="comision" type="text" id="comision" size="30" value="<?php  echo"$comision";?>" onChange="calula();" onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Ingreso $:</strong></td>
     <td bgcolor="#bbbbbb"><input name="ingreso" type="text" id="ingreso" size="30" value="<?php  echo"$ingreso";?>" disabled="disabled"/></td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos personales</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Nombre :</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="nombre" type="text" id="nombre" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="<?php  echo $nombre; ?>"></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de nacimiento:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php 
		echo'  <select name="fecha_d" id="fecha_d">';			
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}          echo' </select>
            /
            <select name="fecha_m" id="fecha_m">';
			
			for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

			
			
echo'                        </select>
            /
            <select name="fecha_a" id="fecha_a">';

			for($contador=1930;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

                        echo'</select>';
		  
		  ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Domicilio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="domicilio" type="text" id="domicilio" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="<?php  echo $domicilio; ?>"></td>
	      <td align="right" bgcolor="#bbbbbb"><strong>Ciudad:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="ciudad" type="text" id="ciudad" size="30" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)" value="<?php  echo $ciudad; ?>"></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Estado:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><select name="estado" id="estado" onChange='cargaContenido(this.id)'>
            <option value='0'>Seleccione un Estado</option>
           
<?php 
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Estado order by NombreEstado"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
     if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}
  ?>
 </select></td>
 
      <td align="right" bgcolor="#bbbbbb"><strong>Municipio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php 
						  if($accela=="edit" or ($same=="yes" AND $accela=="new")){
						 echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}
echo'</select>';
	  }
  else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>
						<option value="0">Seleccione un Estado</option>
					</select>';}
						  ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Colonia:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><?php 
						  if($accela=="edit"  or ($same=="yes" AND $accela=="new")){
						 echo'  <select name="colonia" id="colonia">';
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia"); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  echo'<option value="'.$row["idColonia"].'"';
     if($colonia==$row["idColonia"]){echo"selected";}
	 echo'>'.$row["NombreColonia"].'</option>';
  }}
echo'</select>';
			  }
	  else{echo'<select disabled="disabled" name="colonia" id="colonia">
						<option value="0">Seleccione un Municipio</option>
					</select>';}
						  ?></td>
						       <td align="right" bgcolor="#bbbbbb"><strong>Tel&eacute;fono:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="tel" type="text" id="tel" size="30" onKeyPress="return numbersonly(this, event)" value="<?php  echo $tel; ?>"></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Celular:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="cel" type="text" id="cel" size="30" onKeyPress="return numbersonly(this, event)" value="<?php  echo $cel; ?>"></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Nextel:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="nextel" type="text" id="nextel" size="30" onKeyPress="return numbersonly(this, event)" value="<?php  echo $nextel; ?>"></td>
   </tr>
   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Email:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><input name="mail" type="text" id="mail" size="30" value="<?php  echo $mail; ?>"></td>
	      <td align="right" bgcolor="#bbbbbb">&nbsp;</td>
     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos del veh&iacute;culo</strong> </td>
   </tr>
   <tr>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Marca</strong><strong>:</strong><strong></strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="marca" type="text" id="marca" size="30" value="<?php  echo $marca; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Modelo:</strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="modelo" type="text" id="modelo" size="30" value="<?php  echo $modelo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Tipo:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="tipo" type="text" id="tipo" size="30" value="<?php  echo $tipo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Color:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="color" type="text" id="color" size="30" value="<?php  echo $color; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Placas:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="placas" type="text" id="placas" size="30" value="<?php  echo $placas; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Serie:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="serie" type="text" id="serie" size="30" value="<?php  echo $serie; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Servicio:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><select name="servicio" id="servicio">

       <option value="PARTICULAR" <?php  if($servicio=="PARTICULAR"){echo' selected';}  ?>>Particular</option>

       <option value="PUBLICO" <?php  if($servicio=="PUBLICO"){echo' selected';}  ?>>P&uacute;blico</option>

     </select>     </td>

     <td align="right" bgcolor="#bbbbbb">&nbsp;</td>

     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><?php 
     if($accela=="edit"){echo'<input type="submit" name="Submit" value="Actualizar Usuario"> ';}
	 else{echo'<input type="submit" name="Submit" value="Agregar Usuario"> ';}
	 ?>
       &nbsp; 
     <input type="reset" name="Submit2" value="Reestablecer">  &nbsp; 
     <?php 
     if($accela=="edit"){echo'<input type="button" name="cancel" value="Cancelar Contrato" onClick="location.href=\'process.php?module=usuarios_contrato&accela=cancel&idPoliza='.$idPoliza.'&id='.$id.'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'\'">';}
	 ?>
     
     </td>
   </tr>
   </form>
   <script language="JavaScript">
			<!-- // create calendar object(s) just after form tag closed
				 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
				 // note: you can have as many calendar objects as you need for your application
				 
ARR_MONTHS = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"] ;
				 
			var cal1 = new calendar1(document.forms['frm'].elements['fecha_inicio']);
				cal1.year_scroll = true;
				cal1.time_comp = false;
			var cal2 = new calendar1(document.forms['frm'].elements['fecha_vencimiento']);
				cal2.year_scroll = true;
				cal2.time_comp = false;
			//-->
			</script>

 </table>
 </body></html>