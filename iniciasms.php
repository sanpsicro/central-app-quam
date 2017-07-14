<?php  
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>



<?php  include('conf.php'); ?>
<?php  include('dbfunc.php'); ?>
<?php  


$link = mysqli_connect($host,$username,$pass,$database); 
				//mysql_select_db($database, $link); 
				$result = mysqli_query("SELECT tel_reporta FROM general where id='$gr' LIMIT 1", $link); 
				
				
				
				if (mysqli_num_rows($result)){ 
					  while ($row = @mysqli_fetch_array($result)) { 
					  

				$cel=$row["tel_reporta"];
				
					  } }

?>

			<?php  

if (isset($gr)) {
				
echo ('
<form id="form1" name="form1" method="post" action="sendsms.php">
<input type="hidden" name="to" value="5545938821">
<input type="hidden" name="gr" value="'.$gr.'">
<input type="submit" value="ENVIAR LIGA">	

</form>


');


		
				}

			else{}

			?>

