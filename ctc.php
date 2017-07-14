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
				



$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://192.168.1.200/api/actions/call",
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => false,
    CURLOPT_POSTFIELDS     => array(
        'number' => '9'.$tel,
        'extension' => $extension,
    ),
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);

		
				}

			else{}

			?>

