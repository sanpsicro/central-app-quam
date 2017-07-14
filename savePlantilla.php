<?php

include('../conf.php');
conectar();
        if (isset($_POST['dtRecepcion']))
        $vdtRecepcion="'".mysql_escape_string($_POST['dtRecepcion'])."'";
        else $vdtRecepcion="NULL";

        if (isset($_POST['dtSucM']))
        $vdtSuceso="'" .mysql_escape_string($_POST['dtSucY']).'-'.mysql_escape_string($_POST['dtSucM']).'-'.mysql_escape_string($_POST['dtSucD']). "'";
        else $vdtSuceso="NULL";

/*        if (isset($_POST['hrAperturaExp']))
        $vhrAperturaExp="'" .mysql_escape_string($_POST['hrAperturaExp']). "'";
        else $vhrAperturaExp="NULL";*/

        if (isset($_POST['hrAsignacionProv']))
        $vhrAsignacionProv="'" .mysql_escape_string($_POST['hrAsignacionProv']). "'";
        else $vhrAsignacionProv="NULL";

        if (isset($_POST['hrContacto']))
        $vhrContacto="'" .mysql_escape_string($_POST['hrContacto']). "'";
        else $vhrContacto="NULL";

        if (isset($_POST['hrArribo']))
        $vhrArribo="'" .mysql_escape_string($_POST['hrArribo']). "'";
        else $vhrArribo="NULL";

        if (isset($_POST['tmContacto']))
        $vtmContacto="'" .mysql_escape_string($_POST['tmContacto']). "'";
        else $vtmContacto="NULL";

        if (isset($_POST['nmReporta']))
        $vnmReporta="'" .mysql_escape_string($_POST['nmReporta']). "'";
        else $vnmReporta="NULL";

        if (isset($_POST['telReporta']))
        $vtelReporta="'" .mysql_escape_string($_POST['telReporta']). "'";
        else $vtelReporta="NULL";

        if (isset($_POST['nContrato']))
        $vnContrato="'" .mysql_escape_string($_POST['nContrato']). "'";
        else $vnContrato="NULL";

        if (isset($_POST['nConvenio']))
        $vnConvenio="'" .mysql_escape_string($_POST['nConvenio']). "'";
        else $vnConvenio="NULL";

        if (isset($_POST['nExpediente']))
        $vnExpediente="'" .mysql_escape_string($_POST['nExpediente']). "'";
        else $vnExpediente="NULL";

        if (isset($_POST['nmCliente']))
        $vnmCliente="'" .mysql_escape_string($_POST['nmCliente']). "'";
        else $vnmCliente="NULL";

        if (isset($_POST['nSiniestro']))
        $vnSiniestro="'" .mysql_escape_string($_POST['nSiniestro']). "'";
        else $vnSiniestro="NULL";

        if (isset($_POST['idPoliza']))
        $vidPoliza="'" .mysql_escape_string($_POST['idPoliza']). "'";
        else $vidPoliza="NULL";

        if (isset($_POST['inciso']))
        $vinciso="'" .mysql_escape_string($_POST['inciso']). "'";
        else $vinciso="NULL";

        if (isset($_POST['nmAjustador']))
        $vnmAjustador="'" .mysql_escape_string($_POST['nmAjustador']). "'";
        else $vnmAjustador="NULL";

        if (isset($_POST['nmUsuario']))
        $vnmUsuario="'" .mysql_escape_string($_POST['nmUsuario']). "'";
        else $vnmUsuario="NULL";

        if (isset($_POST['tcSolicitado']))
        $vtcSolicitado="'" .mysql_escape_string($_POST['tcSolicitado']). "'";
        else $vtcSolicitado="NULL";

        if (isset($_POST['motivoServicio']))
        $vmotivoServicio="'" .mysql_escape_string($_POST['motivoServicio']). "'";
        else $vmotivoServicio="NULL";

        if (isset($_POST['autMarca']))
        $vautMarca="'" .mysql_escape_string($_POST['autMarca']). "'";
        else $vautMarca="NULL";

        if (isset($_POST['autTipo']))
        $vautTipo="'" .mysql_escape_string($_POST['autTipo']). "'";
        else $vautTipo="NULL";

        if (isset($_POST['autModelo']))
        $vautModelo="'" .mysql_escape_string($_POST['autModelo']). "'";
        else $vautModelo="NULL";

        if (isset($_POST['autPlacas']))
        $vautPlacas="'" .mysql_escape_string($_POST['autPlacas']). "'";
        else $vautPlacas="NULL";

        if (isset($_POST['cmbTipoAVial']))
        $vcmbTipoAVial="'" .mysql_escape_string($_POST['cmbTipoAVial']). "'";
        else $vcmbTipoAVial="NULL";

        if (isset($_POST['cmbTipoAMedica']))
        $vcmbTipoAMedica="'" .mysql_escape_string($_POST['cmbTipoAMedica']). "'";
        else $vcmbTipoAMedica="NULL";

        if (isset($_POST['DomCiente']))
        $vDomCiente="'" .mysql_escape_string($_POST['DomCiente']). "'";
        else $vDomCiente="NULL";

        if (isset($_POST['DomSustituto']))
        $vDomSustituto="'" .mysql_escape_string($_POST['DomSustituto']). "'";
        else $vDomSustituto="NULL";

        if (isset($_POST['UbicacionRequiere']))
        $vUbicacionRequiere="'" .mysql_escape_string($_POST['UbicacionRequiere']). "'";
        else $vUbicacionRequiere="NULL";

        if (isset($_POST['UbicacionReferencias']))
        $vUbicacionReferencias="'" .mysql_escape_string($_POST['UbicacionReferencias']). "'";
        else $vUbicacionReferencias="NULL";

        if (isset($_POST['UbicacionEstado']))
        $vUbicacionEstado="'" .mysql_escape_string($_POST['UbicacionEstado']). "'";
        else $vUbicacionEstado="NULL";

        if (isset($_POST['UbicacionMunicipio']))
        $vUbicacionMunicipio="'" .mysql_escape_string($_POST['UbicacionMunicipio']). "'";
        else $vUbicacionMunicipio="NULL";

        if (isset($_POST['UbicacionCiudad']))
        $vUbicacionCiudad="'" .mysql_escape_string($_POST['UbicacionCiudad']). "'";
        else $vUbicacionCiudad="NULL";

        if (isset($_POST['UbicacionCiudad']))
        $v="'" .mysql_escape_string($_POST['UbicacionCiudad']). "'";
        else $vUbicacionCiudad="NULL";

        if (isset($_POST['DestinoServicio']))
        $vDestinoServicio="'" .mysql_escape_string($_POST['DestinoServicio']). "'";
        else $vDestinoServicio="NULL";

        if (isset($_POST['DestEstado']))
        $vDestEstado="'" .mysql_escape_string($_POST['DestEstado']). "'";
        else $vDestEstado="NULL";

        if (isset($_POST['DestMunicipio']))
        $vDestMunicipio="'" .mysql_escape_string($_POST['DestMunicipio']). "'";
        else $vDestMunicipio="NULL";

        if (isset($_POST['DestCuidad']))
        $vDestCuidad="'" .mysql_escape_string($_POST['DestCuidad']). "'";
        else $vDestCuidad="NULL";

        if (isset($_POST['FormatoCarta']))
        $vFormatoCarta="'" .mysql_escape_string($_POST['FormatoCarta']). "'";
        else $vFormatoCarta="NULL";

        if (isset($_POST['VentanaInstructivo']))
        $vVentanaInstructivo="'" .mysql_escape_string($_POST['VentanaInstructivo']). "'";
        else $vVentanaInstructivo="NULL";

        if (isset($_POST['Proveedor']))
        $vProveedor="'" .mysql_escape_string($_POST['Proveedor']). "'";
        else $vProveedor="NULL";

        if (isset($_POST['ProvEstado']))
        $vProvEstado="'" .mysql_escape_string($_POST['ProvEstado']). "'";
        else $vProvEstado="NULL";

        if (isset($_POST['ProvLocalidad']))
        $vProvLocalidad="'" .mysql_escape_string($_POST['ProvLocalidad']). "'";
        else $vProvLocalidad="NULL";

        if (isset($_POST['Costo']))
        $vCosto="'" .mysql_escape_string($_POST['Costo']). "'";
        else $vCosto="NULL";

        if (isset($_POST['Observaciones']))
        $vObservaciones="'" .mysql_escape_string($_POST['Observaciones']). "'";
        else $vObservaciones="NULL";

        if (isset($_POST['Seguimiento']))
        $vSeguimiento="'" .mysql_escape_string($_POST['Seguimiento']). "'";
        else $vSeguimiento="NULL";

        if (isset($_POST['SeguimientoLegal']))
        $vSeguimientoLegal="'" .mysql_escape_string($_POST['SeguimientoLegal']). "'";
        else $vSeguimientoLegal="NULL";

        if (isset($_POST['autColor']))
        $vautColor="'" .mysql_escape_string($_POST['autColor']). "'";
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

echo "$consulta"; 

if(!$resultado = mysqli_query($consulta)) echo "Error";


?>
