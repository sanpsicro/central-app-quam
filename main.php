<?php
if(empty($_SESSION["valid_user"])){die();} 
?> 

<form id="form2" name="form2" method="post" action="mainframe.php?module=main">
     <table width="100%" border="1">
       <tbody><tr>

         <td align="center" ><em>No. Contrato.</em> 
          <input name="Nocontrato" type="text" id="Nocontrato" size="19" value="" onkeyup=suma(this.form)></td>
          
         <input type="text" name="contract" id="contract" onchange="getService()">

         <select name="" id="services">

         </select>

<script type="template" id="template_services">
    <option value="[[value]]">[[name]]</option>
</script>

<script>
    function getService() {

        var contract = $('#contract').val();

        $.ajax({
            type : 'POST',
            url : 'ruta donde cachas',
            data : {contract : contract},
            success : function(data) {

                var services = $("#services");
                var template = document.querySelector('#template_services').innerHTML;

                services.empty();

                $.each(data, function(i, element){

                    services.append(template.replace( /\[\[value\]\]/, element.value )
                            .replace( /\[\[name\]\]/, element.name ));
                });
            }
        });
    }
</script>


         <td align="center"><em>Perido</em>
                <select name="show" id="mostrar">
                <option value="Hoy">Hoy</option>
                <option value="20">Ultimos 7 dias</option>
                <option value="30">Mes actual</option>
                <option value="100">Ultimos 30 dias</option>
                <option value="200">Ultimos 3 meses</option>
                <option value="200">Ultimos 6 meses</option>
                <option value="200">Año actual</option>
                <option value="200">Ultimos 12 meses</option>
                <option value="200">Desde inicio de la cuenta</option>
              </select></td>
<br>

</tr>

<table width="100%%" border="1">
         <td align="center"><em>Servicios.</em> 
           <input name="Servicios" type="text" id="Servicios" size="19" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

         <td align="center"><em>Estatus.</em> 
           <input name="Estatus" type="text" id="Estatus" size="19" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

		 <td align="center"><em>Estado.</em> 
           <input name="Estado" type="text" id="Estado" size="19" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td><br>

<table width="100%%">
        
         <td align="center"><input type="submit" name="Submit" value="Buscar"></td>
       </tr>
     </tbody></table></table>
      </form>
   </td>

<?php 
isset($_POST['Nocontrato']) ? $contrato = $_POST['Nocontrato'] : $contrato = null;
isset($_POST['show']) ? $peri = $_POST['show'] : $peri =null;
isset($_POST['Servicios']) ? $ser = $_POST['Servicios'] : $ser = null;
isset($_POST['Estatus']) ? $esta = $_POST['Estatus'] : $esta = null;
isset($_POST['Estado']) ? $estado = $_POST['Estado'] : $estado = null;

if("Hoy" == $peri){
$now = time();
$num = date("w");
if ($num == 0)
{ $sub = 6; }
else { $sub = ($num-1); }
$WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
$todayh = getdate($WeekMon); //monday week begin reconvert

$d = $todayh[mday];
$m = $todayh[mon];
$y = $todayh[year];
echo $d-$m-$y; //getdate converted day


}
else
{ 
  echo "<br/> &nbsp;No es";
}
echo "<br/> &nbsp; No. Contrato. es  ". $contrato;

echo "<br/> &nbsp; servicio. es  ". $ser;
echo "<br/> &nbsp; servicio. es  ". $esta;
echo "<br/> &nbsp; servicio. es  ". $estado;
?>

<style>
body { 
  background: url(back_home.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin: 0;
  padding: 0;
  border: 0;
  background-color:#666;
  width: inherit;
  height: inherit;

}

</style>

<script type="text/javascript">
faster();
</script>