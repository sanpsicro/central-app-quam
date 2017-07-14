<?php

   include_once("conf.php");
   include("ConsultasCabina.php");
//conectar();
   $link  = mysqli_connect($host,$username,$pass,$database);

//FORM 300



        if (isset($_POST['dtRecepcion']))
        $vdtRecepcion="'".mysqli_real_escape_string($_POST['dtRecepcion'])."'";
        else $vdtRecepcion="NULL";

        if (isset($_POST['dtSucM']))
        $vdtSuceso="'" .mysqli_real_escape_string($_POST['dtSucY']).'-'.mysqli_real_escape_string($_POST['dtSucM']).'-'.mysqli_real_escape_string($_POST['dtSucD']). "'";
        else $vdtSuceso="NULL";

/*        if (isset($_POST['hrAperturaExp']))
        $vhrAperturaExp="'" .mysqli_real_escape_string($_POST['hrAperturaExp']). "'";
        else $vhrAperturaExp="NULL";*/

        if (isset($_POST['hrAsignacionProv']))
        $vhrAsignacionProv="'" .mysqli_real_escape_string($_POST['hrAsignacionProv']). "'";
        else $vhrAsignacionProv="NULL";

        if (isset($_POST['hrContacto']))
        $vhrContacto="'" .mysqli_real_escape_string($_POST['hrContacto']). "'";
        else $vhrContacto="NULL";

        if (isset($_POST['hrArribo']))
        $vhrArribo="'" .mysqli_real_escape_string($_POST['hrArribo']). "'";
        else $vhrArribo="NULL";

        if (isset($_POST['tmContacto']))
        $vtmContacto="'" .mysqli_real_escape_string($_POST['tmContacto']). "'";
        else $vtmContacto="NULL";

        if (isset($_POST['nmReporta']))
        $vnmReporta="'" .mysqli_real_escape_string($_POST['nmReporta']). "'";
        else $vnmReporta="NULL";

        if (isset($_POST['telReporta']))
        $vtelReporta="'" .mysqli_real_escape_string($_POST['telReporta']). "'";
        else $vtelReporta="NULL";

        if (isset($_POST['nContrato']))
        $vnContrato="'" .mysqli_real_escape_string($_POST['nContrato']). "'";
        else $vnContrato="NULL";

        if (isset($_POST['nConvenio']))
        $vnConvenio="'" .mysqli_real_escape_string($_POST['nConvenio']). "'";
        else $vnConvenio="NULL";

        if (isset($_POST['nExpediente']))
        $vnExpediente="'" .mysqli_real_escape_string($_POST['nExpediente']). "'";
        else $vnExpediente="NULL";

        if (isset($_POST['nmCliente']))
        $vnmCliente="'" .mysqli_real_escape_string($_POST['nmCliente']). "'";
        else $vnmCliente="NULL";

        if (isset($_POST['nSiniestro']))
        $vnSiniestro="'" .mysqli_real_escape_string($_POST['nSiniestro']). "'";
        else $vnSiniestro="NULL";

        if (isset($_POST['idPoliza']))
        $vidPoliza="'" .mysqli_real_escape_string($_POST['idPoliza']). "'";
        else $vidPoliza="NULL";

        if (isset($_POST['inciso']))
        $vinciso="'" .mysqli_real_escape_string($_POST['inciso']). "'";
        else $vinciso="NULL";

        if (isset($_POST['nmAjustador']))
        $vnmAjustador="'" .mysqli_real_escape_string($_POST['nmAjustador']). "'";
        else $vnmAjustador="NULL";

        if (isset($_POST['nmUsuario']))
        $vnmUsuario="'" .mysqli_real_escape_string($_POST['nmUsuario']). "'";
        else $vnmUsuario="NULL";

        if (isset($_POST['tcSolicitado']))
        $vtcSolicitado="'" .mysqli_real_escape_string($_POST['tcSolicitado']). "'";
        else $vtcSolicitado="NULL";

        if (isset($_POST['motivoServicio']))
        $vmotivoServicio="'" .mysqli_real_escape_string($_POST['motivoServicio']). "'";
        else $vmotivoServicio="NULL";

        if (isset($_POST['autMarca']))
        $vautMarca="'" .mysqli_real_escape_string($_POST['autMarca']). "'";
        else $vautMarca="NULL";

        if (isset($_POST['autTipo']))
        $vautTipo="'" .mysqli_real_escape_string($_POST['autTipo']). "'";
        else $vautTipo="NULL";

        if (isset($_POST['autModelo']))
        $vautModelo="'" .mysqli_real_escape_string($_POST['autModelo']). "'";
        else $vautModelo="NULL";

        if (isset($_POST['autPlacas']))
        $vautPlacas="'" .mysqli_real_escape_string($_POST['autPlacas']). "'";
        else $vautPlacas="NULL";

        if (isset($_POST['cmbTipoAVial']))
        $vcmbTipoAVial="'" .mysqli_real_escape_string($_POST['cmbTipoAVial']). "'";
        else $vcmbTipoAVial="NULL";

        if (isset($_POST['cmbTipoAMedica']))
        $vcmbTipoAMedica="'" .mysqli_real_escape_string($_POST['cmbTipoAMedica']). "'";
        else $vcmbTipoAMedica="NULL";

        if (isset($_POST['DomCiente']))
        $vDomCiente="'" .mysqli_real_escape_string($_POST['DomCiente']). "'";
        else $vDomCiente="NULL";

        if (isset($_POST['DomSustituto']))
        $vDomSustituto="'" .mysqli_real_escape_string($_POST['DomSustituto']). "'";
        else $vDomSustituto="NULL";

        if (isset($_POST['UbicacionRequiere']))
        $vUbicacionRequiere="'" .mysqli_real_escape_string($_POST['UbicacionRequiere']). "'";
        else $vUbicacionRequiere="NULL";

        if (isset($_POST['UbicacionReferencias']))
        $vUbicacionReferencias="'" .mysqli_real_escape_string($_POST['UbicacionReferencias']). "'";
        else $vUbicacionReferencias="NULL";

        if (isset($_POST['UbicacionEstado']))
        $vUbicacionEstado="'" .mysqli_real_escape_string($_POST['UbicacionEstado']). "'";
        else $vUbicacionEstado="NULL";

        if (isset($_POST['UbicacionMunicipio']))
        $vUbicacionMunicipio="'" .mysqli_real_escape_string($_POST['UbicacionMunicipio']). "'";
        else $vUbicacionMunicipio="NULL";

        if (isset($_POST['UbicacionCiudad']))
        $vUbicacionCiudad="'" .mysqli_real_escape_string($_POST['UbicacionCiudad']). "'";
        else $vUbicacionCiudad="NULL";

        if (isset($_POST['UbicacionCiudad']))
        $v="'" .mysqli_real_escape_string($_POST['UbicacionCiudad']). "'";
        else $vUbicacionCiudad="NULL";

        if (isset($_POST['DestinoServicio']))
        $vDestinoServicio="'" .mysqli_real_escape_string($_POST['DestinoServicio']). "'";
        else $vDestinoServicio="NULL";

        if (isset($_POST['DestEstado']))
        $vDestEstado="'" .mysqli_real_escape_string($_POST['DestEstado']). "'";
        else $vDestEstado="NULL";

        if (isset($_POST['DestMunicipio']))
        $vDestMunicipio="'" .mysqli_real_escape_string($_POST['DestMunicipio']). "'";
        else $vDestMunicipio="NULL";

        if (isset($_POST['DestCuidad']))
        $vDestCuidad="'" .mysqli_real_escape_string($_POST['DestCuidad']). "'";
        else $vDestCuidad="NULL";

        if (isset($_POST['FormatoCarta']))
        $vFormatoCarta="'" .mysqli_real_escape_string($_POST['FormatoCarta']). "'";
        else $vFormatoCarta="NULL";

        if (isset($_POST['VentanaInstructivo']))
        $vVentanaInstructivo="'" .mysqli_real_escape_string($_POST['VentanaInstructivo']). "'";
        else $vVentanaInstructivo="NULL";

        if (isset($_POST['Proveedor']))
        $vProveedor="'" .mysqli_real_escape_string($_POST['Proveedor']). "'";
        else $vProveedor="NULL";

        if (isset($_POST['ProvEstado']))
        $vProvEstado="'" .mysqli_real_escape_string($_POST['ProvEstado']). "'";
        else $vProvEstado="NULL";

        if (isset($_POST['ProvLocalidad']))
        $vProvLocalidad="'" .mysqli_real_escape_string($_POST['ProvLocalidad']). "'";
        else $vProvLocalidad="NULL";

        if (isset($_POST['Costo']))
        $vCosto="'" .mysqli_real_escape_string($_POST['Costo']). "'";
        else $vCosto="NULL";

        if (isset($_POST['Observaciones']))
        $vObservaciones="'" .mysqli_real_escape_string($_POST['Observaciones']). "'";
        else $vObservaciones="NULL";

        if (isset($_POST['Seguimiento']))
        $vSeguimiento="'" .mysqli_real_escape_string($_POST['Seguimiento']). "'";
        else $vSeguimiento="NULL";

        if (isset($_POST['SeguimientoLegal']))
        $vSeguimientoLegal="'" .mysqli_real_escape_string($_POST['SeguimientoLegal']). "'";
        else $vSeguimientoLegal="NULL";

        if (isset($_POST['autColor']))
        $vautColor="'" .mysqli_real_escape_string($_POST['autColor']). "'";
        else $vautColor="NULL";


$consulta  = "INSERT INTO Expediente (
dtRecepcion ,
dtSuceso,
hrAsignacionProv,
hrContacto,
hrArribo ,
tmContacto,
nmReporta ,
telReporta ,
nContrato       ,
nConvenio ,
nExpediente ,
nmCliente ,
nSiniestro ,
idPoliza ,
inciso  ,
nmAjustador,
nmUsuario       ,
tcSolicitado,
motivoServicio,
autMarca        ,
autTipo         ,
autModelo       ,
autPlacas       ,
cmbTipoAVial,
cmbTipoAMedica,
DomCiente       ,
DomSustituto ,
UbicacionRequiere,
UbicacionReferencias,
UbicacionEstado         ,
UbicacionMunicipio      ,
UbicacionCiudad         ,
DestinoServicio         ,
DestEstado      ,
DestMunicipio,
DestCuidad      ,
FormatoCarta ,
VentanaInstructivo,
Proveedor       ,
ProvEstado      ,
ProvLocalidad ,
Costo   ,
Observaciones,
Seguimiento ,
SeguimientoLegal,
autColor
) ";

$consulta.="values(
$vdtRecepcion ,
$vdtSuceso,
$vhrAsignacionProv,
$vhrContacto,
$vhrArribo ,
$vtmContacto,
$vnmReporta ,
$vtelReporta ,
$vnContrato     ,
$vnConvenio ,
$vnExpediente ,
$vnmCliente ,
$vnSiniestro ,
$vidPoliza ,
$vinciso        ,
$vnmAjustador,
$vnmUsuario     ,
$vtcSolicitado,
$vmotivoServicio,
$vautMarca      ,
$vautTipo       ,
$vautModelo     ,
$vautPlacas     ,
$vcmbTipoAVial,
$vcmbTipoAMedica,
$vDomCiente     ,
$vDomSustituto ,
$vUbicacionRequiere,
$vUbicacionReferencias,
$vUbicacionEstado       ,
$vUbicacionMunicipio    ,
$vUbicacionCiudad       ,
$vDestinoServicio       ,
$vDestEstado    ,
$vDestMunicipio,
$vDestCuidad    ,
$vFormatoCarta ,
$vVentanaInstructivo,
$vProveedor     ,
$vProvEstado    ,
$vProvLocalidad ,
$vCosto         ,
$vObservaciones,
$vSeguimiento ,
$vSeguimientoLegal,
$vautColor
)";

if(isset($_POST)){
     if($resultado = mysqli_query($link,$consulta)){
      header("Location: ?module=Cabina");
      die();
     }
}
?>

<HTML>
<HEAD>
 <TITLE>Alta de Expediente</TITLE>
 <script language="javascript" src="dates.js"></script>
</HEAD>
<body onload="fillDateForms()">

<form action="" method="POST">
<?php 

if(!$resultado = mysqli_query($link,$SQLCABINA["AltaExpediente"])) echo $SQLCABINA["AltaExpediente"];
else
while ($fila = mysqli_fetch_assoc($resultado)){
?>
<table width=100%>
<tr><td>
<b>Numero Poliza:</b> <?php echo $fila["numPoliza"]; ?>
<input type="hidden" name="idPoliza" value="<?php echo $fila["idPoliza"]; ?>" >
</td><td>
<b>Numero de Expediente:</b> <?php echo $fila["idExpediente"]; ?>
</td><td>
<b>Fecha y Hora de Recepci&oacute;n:</b> <?php echo $fila["Ahora"]; ?>
<input type="hidden" name="dtRecepcion" value="<?php echo $fila["Ahora"]; ?>" >
</td>

<td>
<b>: </b>
</td>
</table>

<table>
<tr>
<td>

<table>
<tr><td>Nombre del Cliente</td></tr>
<tr><td><input type="text" size="20" value="<?php echo $fila["NombreCliente"]; ?>">  </td></tr>
</table>

</td>
<td>

</td>
<td>

<?php if($fila['dtSuceso']) { ?>
<table width=250>
<tr>
<td>
Fecha en que se suscit� el hecho:
</td>
</tr>
<tr>
<td>
<select NAME='dtSucY' onchange=refreshDateForm(2) id="dtSucY"></select>
<select NAME='dtSucM' onchange=refreshDateForm(2) id="dtSucM">
               <option VALUE="01">Enero</option>
               <option VALUE="02">Febrero</option>
                           <option VALUE="03">Marzo</option>
                           <option VALUE="04">Abril</option>
                           <option VALUE="05">Mayo</option>
                           <option VALUE="06">Junio</option>
                           <option VALUE="07">Julio</option>
                           <option VALUE="08">Agosto</option>
                           <option VALUE="09">Septiembre</option>
                           <option VALUE="10">Octubre</option>
                           <option VALUE="11">Noviembre</option>
                           <option VALUE="12">Diciembre</option>
                  </select>
<select NAME='dtSucD' id="dtSucD"></select>
</td>
</tr>
</table>
<?php }?>


</td>
<td>
</td><td>
<?php if($fila['hrAsignacionProv']) { ?>
<table>
<tr>
<td>
Hora de asignaci�n del proveedor:
</td>
</tr>
<tr>
<td>
<input type="text" name="hrAsignacionProv" id="hrAsignacionProv" size="20"/>
</td>
</tr>
</table>
<?php } ?>

</td>
<td>
<?php if($fila['hrContacto']) { ?>
<table>
<tr>
<td>
Hora de contacto:
</td>
</tr>
<tr>
<td>
<input type="text" name="hrContacto" id="hrContacto" size="20"/>
</td>
</tr>
</table>
<?php } ?>

</td>
</tr>
</table>
<table>
<tr>
<td>
<?php if($fila['hrArribo']) { ?>
<table>
<tr>
<td>
Hora de arribo:
</td>
</tr>
<tr>
<td>
<input type="text" name="hrArribo" id="hrArribo" size="20"/>
</td>
</tr>
</table>
<?php } ?>

</td>
<td>
<?php if($fila['nmReporta']) { ?>
<table>
<tr>
<td>
Nombre de quien reporta:
</td>
</tr>
<tr>
<td>
<input type="text" name="nmReporta" id="nmReporta" size="30"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['telReporta']) { ?>
<table>
<tr>
<td>
Tel. de quien reporta:
</td>
</tr>
<tr>
<td>
<input type="text" name="telReporta" id="telReporta" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['nConvenio']) { ?>
<table>
<tr>
<td>
No. de convenio:
</td>
</tr>
<tr>
<td>
<input type="text" name="nConvenio" id="nConvenio" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['nSiniestro']) { ?>
<table>
<tr>
<td>
N�mero de siniestro:
</td>
</tr>
<tr>
<td>
<input type="text" name="nSiniestro" id="nSiniestro" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['inciso']) { ?>
<table>
<tr>
<td>
Inciso:
</td>
</tr>
<tr>
<td>
<input type="text" name="inciso" id="inciso" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['nmAjustador']) { ?>
<table>
<tr>
<td>
Nombre del ajustador:
</td>
</tr>
<tr>
<td>
<input type="text" name="nmAjustador" id="nmAjustador" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['nmUsuario']) { ?>
<table>
<tr>
<td>
Nombre del usuario:
</td>
</tr>
<tr>
<td>
<input type="text" name="nmUsuario" id="nmUsuario" size="20"/>
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['tcSolicitado']) { ?>
<table>
<tr>
<td>
Que t�cnico solicita:
</td>
</tr>
<tr>
<td>
<input type="text" name="tcSolicitado" id="tcSolicitado" size="20" />
</td>
</tr>
</table>
<?php } ?>
</td>
<td><?php if($fila['motivoServicio']) { ?><table>
<tr>
<td>Que fue lo que sucedi� (motivo que origina servicio):
</td></tr><tr>
<td>
<input type="text" name="motivoServicio" id="motivoServicio" size="35"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['autMarca']) { ?><table>
<tr>
<td>Marca:
</td></tr><tr>
<td>
<input type="text" name="autMarca" id="autMarca" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['autTipo']) { ?><table>
<tr>
<td>Tipo:
</td></tr><tr>
<td>
<input type="text" name="autTipo" id="autTipo" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['autModelo']) { ?><table>
<tr>
<td>Modelo:
</td></tr><tr>
<td>
<input type="text" name="autModelo" id="autModelo" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['autColor']) { ?><table>
<tr>
<td>Color:
</td></tr><tr>
<td>
<input type="text" name="autColor" id="autColor" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['autPlacas']) { ?><table>
<tr>
<td>Placas:
</td></tr><tr>
<td>
<input type="text" name="autPlacas" id="autPlacas" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td>
<?php if($fila['cmbTipoAVial']) { ?><table>
<tr>
<td>Tipo de servicio asistencia vial:
</td>
</tr>
<tr>
<td>
<select NAME="cmbTipoAVial" id="cmbTipoAVial">
               <option VALUE='Traslado para evitar alcohol�metro'>Traslado para evitar alcohol�metro</option>
               <option VALUE='Siniestro'>Siniestro</option>
                           <option VALUE='Asistencia'>Asistencia</option>
                           <option VALUE='Cambio de llanta'>Cambio de llanta</option>
                           <option VALUE='Llaves en el interior del veh�culo'>Llaves en el interior del veh�culo</option>
                           <option VALUE='Env�o de gasolina'>Env�o de gasolina</option>
                           <option VALUE='Problemas administrativos'>Problemas administrativos</option>
                  </select>
</td>
</tr></table>
<?php } ?>
</td>
<td>
<?php if($fila['cmbTipoAMedica']) { ?>
<table width=250>
<tr>
<td>Tipo de servicio asistencia medica:
</td>
</tr>
<tr>
<td>
<select NAME="cmbTipoAMedica" id="cmbTipoAMedica">
               <option VALUE='Consulta Telef�nica'>Consulta Telef�nica</option>
               <option VALUE='Consulta A domicilio'>Consulta A domicilio</option>
                           <option VALUE='Ambulancia'>Ambulancia</option>
                  </select>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['DomCiente']) { ?><table>
<tr>
<td>Domicilio del cliente:
</td></tr><tr>
<td>
<input type="text" name="DomCiente" id="DomCiente" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['cmbTipoAVial']) { ?><table>
<tr>
<td>Domicilio donde recoger� su auto sustituto:
</td></tr><tr>
<td>
<input type="text" name="" id="" size="40"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['UbicacionRequiere']) { ?><table>
<tr>
<td>Ubicaci�n donde requiere el servicio:
</td></tr><tr>
<td>
<input type="text" name="UbicacionRequiere" id="UbicacionRequiere" size="30"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['UbicacionReferencias']) { ?><table>
<tr>
<td>Referencias:
</td></tr><tr>
<td>
<input type="text" name="UbicacionReferencias" id="UbicacionReferencias" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['UbicacionEstado']) { ?><table>
<tr>
<td>Estado:
</td></tr><tr>
<td>
<input type="text" name="UbicacionEstado" id="UbicacionEstado" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['UbicacionMunicipio']) { ?><table>
<tr>
<td>Municipio:
</td></tr><tr>
<td>
<input type="text" name="UbicacionMunicipio" id="UbicacionMunicipio" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['UbicacionCiudad']) { ?><table>
<tr>
<td>Ciudad o localidad:
</td></tr><tr>
<td>
<input type="text" name="UbicacionCiudad" id="UbicacionCiudad" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['DestinoServicio']) { ?><table>
<tr>
<td>Destino:
</td></tr><tr>
<td>
<input type="text" name="DestinoServicio" id="DestinoServicio" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['DestEstado']) { ?><table>
<tr>
<td>Estado:
</td></tr><tr>
<td>
<input type="text" name="DestEstado" id="DestEstado" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['DestMunicipio']) { ?><table>
<tr>
<td>Municipio:
</td></tr><tr>
<td>
<input type="text" name="DestMunicipio" id="DestMunicipio" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['DestCuidad']) { ?><table>
<tr>
<td>Ciudad o localidad:
</td></tr><tr>
<td>
<input type="text" name="DestCuidad" id="DestCuidad" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['FormatoCarta']) { ?><table>
<tr>
<td>Formato de carta auto sustituto:
</td></tr><tr>
<td>
<input type="text" name="FormatoCarta" id="FormatoCarta" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td>
<?php if($fila['Proveedor']) { ?><table>
<tr>
<td>Proveedor:
</td></tr><tr>
<td>
<input type="text" name="Proveedor" id="Proveedor" size="20"/>
</td>
</tr></table>
<?php } ?>

</td>
<td><?php if($fila['ProvEstado']) { ?><table>
<tr>
<td>Estado:
</td></tr><tr>
<td>
<input type="text" name="ProvEstado" id="ProvEstado" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td>
<?php if($fila['ProvLocalidad']) { ?><table>
<tr>
<td>Localidad:
</td></tr><tr>
<td>
<input type="text" name="ProvLocalidad" id="ProvLocalidad" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
<td>
<?php if($fila['Costo']) { ?><table>
<tr>
<td>Costo Autorizado:
</td></tr><tr>
<td>
<input type="text" name="Costo" id="Costo" size="20"/>
</td>
</tr></table>
<?php } ?>
</td>
</tr>
</table>
<table>
<tr>
<td><?php if($fila['Observaciones']) { ?><table>
<tr>
<td>Observaciones:
</td></tr><tr>
<td>
<textarea name="Observaciones" id="Observaciones" size="20"></textarea>
</td>
</tr></table>
<?php } ?>
</td>
<td><?php if($fila['Seguimiento']) { ?><table>
<tr>
<td>SEGUIMIENTO TEXTO:
</td></tr><tr>
<td>
<input type="text" name="Seguimiento" id="Seguimiento" size="20"/>
</td>
</tr></table>
<?php } ?></td>
<td>
<?php if($fila['SeguimientoLegal']) { ?><table>
<tr>
<td>SEGUIMIENTO LEGAL AUTOMOVIL�STICO:
</td></tr><tr>
<td>
<input type="text" name="SeguimientoLegal" id="SeguimientoLegal" size="20"/>
</td>
</tr></table>
<?php } ?>

</td>
</tr>
</table>
<?php 
}
?>
<input type="submit" value="Agregar">
</form>
</body>
</HTML>
