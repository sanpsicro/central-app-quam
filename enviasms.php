<?php  
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>

<?php  

echo $gr;
echo $to;
echo $body;
header("Location: mainframe.php?module=detail_seguimiento&id=$gr");

/*
require('twilio/Services/Twilio.php'); 
 
$account_sid = 'AC3048129fd0b1bb1c671c85f6125f15fc'; 
$auth_token = 'd28ff46a069b4e16057677cc2da8764d'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$client->account->messages->create(array( 
	'To' => "+525545938821", 
	'From' => "+18326123789", 
	'Body' => "Mensaje de prueba desde plataforma",   
));
*/

			?>



