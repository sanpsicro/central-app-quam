<?php  
session_start();
if(empty($_SESSION["valid_user"])){die();} 
?>
<html>
<head>
<title>Ding/Dong</title>
<script src="jquery.min.js">
</script>
<script>
var check;
function checkForMessages() {
    $.get("novisto.php", function(data) {
        if(data >= 1) {
            //There are new messages
            clearInterval(check);
            var mp3snd = "ding.mp3";
			var oggsnd = "ding.ogg";

			document.write('<audio autoplay="autoplay">');
			document.write('<source src="'+mp3snd+'" type="audio/mpeg">');
			document.write('<source src="'+oggsnd+'" type="audio/ogg">');
			document.write('<!--[if lt IE 9]>');
			document.write('<bgsound src="'+mp3snd+'" loop="1">');
			document.write('<![endif]-->');
			document.write('</audio>');
        }
    });
}
check = setInterval(checkForMessages, 5000);

</script>
</head>
<body>
<p></p>
</body>
</html>