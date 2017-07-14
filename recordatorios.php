<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 

$valid_userid = $_SESSION['valid_userid'];
?>
<html>
<head>
<title>AMERICAN ASSIST :: PLATAFORMA-AA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style_1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link rel="stylesheet" href="js/datepicker/css/bootstrap-datetimepicker.min.css" />
<style>

body { background-color: #b81f19;
background-image: url("images/reloj.png");
background-repeat: no-repeat; 
background-position: left bottom;
}

</style>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
 $(function() {
        $('#proximos').change(function(){
            $('#recuerdame').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
</head>
<body>
<?php  
$referencia=$_SERVER['HTTP_REFERER'];
$parsed = parse_url( $referencia, PHP_URL_QUERY );
parse_str( $parsed, $query );
$module=$query['module'];
$general=$query['id'];
?>


<div class="centerb"><h2 class="whiter">TEMPORIZADOR DE TAREAS</h2>
<br />

<div class="col-xs-1"></div>
<div class="col-xs-10">
<form action="memoria.php" method="post">
<div class="form-group">
    <label for="recordatorio" class="whiter">Tarea:</label>
    <input type="text" class="form-control" id="recordatorio" name="recordatorio" placeholder="Recordatorio">
</div>
<?php  if ($module=="detail_seguimiento") { ?>
<div class="form-group">
    <label for="expediente" class="whiter">Relacionado al expediente:</label>
    <input type="text" class="form-control" id="expediente" name="expediente" value="<?php  $general?>" placeholder="expediente">
</div>
<?php  } else { ?> <input type="hidden" name="general" value="" />  <?php  }?>
<div class="form-group">
 	<label for="proximos" class="whiter">Programar en los próximos:</label>
    <select  class="form-control" name="proximos" id="proximos">
    <option value="5">5 minutos</option>
    <option value="10">10 minutos</option>
    <option value="15">15 minutos</option>
    <option value="20">20 minutos</option>
    <option value="30">30 minutos</option>
    <option value="45">45 minutos</option>
    <option value="60">60 minutos</option>
    <option value="recuerdame">Programar a fecha futura</option>
    
    </select>
</div>
<?php  
$hactual=date("H");
$mes=date("m");
$dia=date("d");
$ano=date("Y");
$minuto=date("i");
$nminuto=$minuto+5;
?>
<div class="form-group" id="recuerdame" style="display:none">
 	<label for="datetimepicker1" class="whiter">Programar a fecha futura:</label>
     <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="recordate" class="form-control" readonly />
                                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    
</div>
 <div class="checkbox">
    <label class="whiter">
      <input type="checkbox" name="privacidad"> Sólo para mi
    </label>
  </div>
<input type="hidden" name="actuar" value="new" />
<input type="hidden" name="userid" value="<?php  $valid_userid?>" />
<div class="centerb"><button type="submit" class="btn btn-success" role="button">CREAR</button></div>
</form>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker(
				{
                   minDate: moment().add(5, 'm'),
				   format: 'YYYY-MM-DD HH:mm',
				   ignoreReadonly: true
                }
                    );
            });
        </script>
        <div class="col-xs-1"></div>
        <br>
        <div class="centerb"><a href="mainframe.php?module=recordatorioslista" class="btn btn-warning" role="button" target="_parent">HISTORIAL DE TAREAS</a></div>
</body>
</html>