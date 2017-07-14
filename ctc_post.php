<?php  
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>


			<?php  

if(isset($tel) && ($extension)) {
				
echo ('
<form method="post" action="http://192.168.1.200/api/actions/call">
<input type="hidden" name="number" value="9'.$tel.'">
<input type="hidden" name="extension" value="'.$extension.'">
<input type="image" src="call.png" alt="Llamar" style="border:0px;" />

</form>


');
		
				}

			else{}

			?>

