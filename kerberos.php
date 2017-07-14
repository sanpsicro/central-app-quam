<?php

#die();

include('conf.php'); 
isset($_POST['claes']) ? $claes = $_POST['claes'] : $claes = null;
isset($_POST['user'] ) ? $user = $_POST['user'] : $user = null;


if($claes=="logout"){

session_start();

session_unregister("valid_user");

session_unregister("valid_permisos");

session_unregister("valid_tipo");

session_unregister("valid_modulos");

session_unregister("valid_userid");

session_destroy();

$mensaje = "Finalizando sesión";

$luura="index.php?logout=yes";

$opera="#4C718C"; 

}

else{

$conexion = mysqli_connect($host,$username,$pass,$database);

//mysqli_select_db ($database, $conexion);

$query = mysqli_query($conexion,"SELECT * FROM `Empleado` WHERE `usuario` ='". $user ."'");

$array = mysqli_fetch_array($query);

$arrayusuario = ($array["usuario"]); 

$arraypassword = ($array["contrasena"]);

$tipo = ($array["tipo"]);

$nombre = ($array["nombre"]);

$userid = ($array["idEmpleado"]);

$modulos = ($array["modules"]);

$permisos = ($array["permisos"]);

$activo = ($array["activo"]);



if(mysqli_num_rows($query) != 0) {

if ($_POST["user"]== $arrayusuario && $_POST["password"]== $arraypassword){

session_start();

$valid_user=$_POST['user'];

//session_register( "valid_user" );

$_SESSION['valid_user'] =$valid_user;

$_SESSION['valid_permisos'] = $permisos;

$_SESSION['valid_tipo'] = $tipo;

$_SESSION['valid_nombre'] = $nombre;

//session_register("valid_modulos");

//session_register("valid_userid");		

		$valid_modulos = $modulos;

		$valid_userid = $userid;		

$_SESSION['valid_modulos'] =$modulos;
$_SESSION['valid_userid'] =$userid;		



$mensaje="Usuario Autorizado<p>Redirigiendo<p>";

$luura="mainframe.php";

$opera="#4C718C";


		if($activo!="1"){
		$mensaje = "Error: Usuario no activo";
		$luura="index.php?errorcode=4";
		$opera="#cc0000";
		}



		if(isset($remember) && $remember=="yes"){
		
		setcookie("login_data",$_POST['user']."---divisor---".$_POST['password'],time()+86400*30);
		
}else{

setcookie("login_data","",time()-86400*30);

}



} else {

$mensaje = "Error: Contraseña incorrecta";

$luura="index.php?errorcode=2";

$opera="#cc0000";

}

} else {

$mensaje = "Error: Usuario Incorrecto";

$luura="index.php?errorcode=1";

$opera="#cc0000";

}

}

?>



<?php echo'
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>LOGIN...</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.spinner {
  margin: 100px auto;
  width: 50px;
  height: 30px;
  text-align: center;
  font-size: 10px;
}

.spinner > div {
  background-color: #333;
  height: 100%;
  width: 6px;
  display: inline-block;
  
  -webkit-animation: stretchdelay 1.2s infinite ease-in-out;
  animation: stretchdelay 1.2s infinite ease-in-out;
}

.spinner .rect2 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}

.spinner .rect3 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

.spinner .rect4 {
  -webkit-animation-delay: -0.9s;
  animation-delay: -0.9s;
}

.spinner .rect5 {
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}

@-webkit-keyframes stretchdelay {
  0%, 40%, 100% { -webkit-transform: scaleY(0.4) }  
  20% { -webkit-transform: scaleY(1.0) }
}

@keyframes stretchdelay {
  0%, 40%, 100% { 
    transform: scaleY(0.4);
    -webkit-transform: scaleY(0.4);
  }  20% { 
    transform: scaleY(1.0);
    -webkit-transform: scaleY(1.0);
  }
}
</style>

</head>



<body>



<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">



  <tr>



    <td><div align="center">



<table cellpadding="0" cellspacing="0" width="100%">



 



          <tr>



            <td><center><b>'.$mensaje.'</b>
			<div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div>
			<p><script language="javascript">



var loadedcolor=\'#\' ;       // PROGRESS BAR COLOR



var unloadedcolor=\'\';     // COLOR OF UNLOADED AREA



var bordercolor=\'\';            // COLOR OF THE BORDER



var barheight=25;                  // HEIGHT OF PROGRESS BAR IN PIXELS



var barwidth=50;                  // WIDTH OF THE BAR IN PIXELS



var waitTime=1;                   // NUMBER OF SECONDS FOR PROGRESSBAR







// THE FUNCTION BELOW CONTAINS THE ACTION(S) TAKEN ONCE BAR REACHES 100%.



// IF NO ACTION IS DESIRED, TAKE EVERYTHING OUT FROM BETWEEN THE CURLY BRACES ({})



// BUT LEAVE THE FUNCTION NAME AND CURLY BRACES IN PLACE.



// PRESENTLY, IT IS SET TO DO NOTHING, BUT CAN BE CHANGED EASILY.



// TO CAUSE A REDIRECT TO ANOTHER PAGE, INSERT THE FOLLOWING LINE:



// window.location="http://redirect_page.html";



// JUST CHANGE THE ACTUAL URL OF COURSE :)







var action=function(){window.location= "'.$luura.'"; }







//*****************************************************//



//**********  DO NOT EDIT BEYOND THIS POINT  **********//



//*****************************************************//







var ns4=(document.layers)?true:false;



var ie4=(document.all)?true:false;



var blocksize=(barwidth-2)/waitTime/10;



var loaded=0;



var PBouter;



var PBdone;



var PBbckgnd;



var Pid=0;



var txt=\'\';



if(ns4){



txt+=\'<table border=0 cellpadding=0 cellspacing=0><tr><td>\';



txt+=\'<ilayer name="PBouter" visibility="hide" height="\'+barheight+\'" width="\'+barwidth+\'" onmouseup="hidebar()">\';



txt+=\'<layer width="\'+barwidth+\'" height="\'+barheight+\'" bgcolor="\'+bordercolor+\'" top="0" left="0"></layer>\';



txt+=\'<layer width="\'+(barwidth-2)+\'" height="\'+(barheight-2)+\'" bgcolor="\'+unloadedcolor+\'" top="1" left="1"></layer>\';



txt+=\'<layer name="PBdone" width="\'+(barwidth-2)+\'" height="\'+(barheight-2)+\'" bgcolor="\'+loadedcolor+\'" top="1" left="1"></layer>\';



txt+=\'</ilayer>\';



txt+=\'</td></tr></table>\';



}else{



txt+=\'<div id="PBouter" onmouseup="hidebar()" style="position:relative; visibility:hidden; background-color:\'+bordercolor+\'; width:\'+barwidth+\'px; height:\'+barheight+\'px;">\';



txt+=\'<div style="position:absolute; top:1px; left:1px; width:\'+(barwidth-2)+\'px; height:\'+(barheight-2)+\'px; background-color:\'+unloadedcolor+\'; font-size:1px;"></div>\';



txt+=\'<div id="PBdone" style="position:absolute; top:1px; left:1px; width:0px; height:\'+(barheight-2)+\'px; background-color:\'+loadedcolor+\'; font-size:1px;"></div>\';



txt+=\'</div>\';



}







document.write(txt);







function incrCount(){



window.status="Loading...";



loaded++;



if(loaded<0)loaded=0;



if(loaded>=waitTime*10){



clearInterval(Pid);



loaded=waitTime*10;



setTimeout(\'hidebar()\',100);



}



resizeEl(PBdone, 0, blocksize*loaded, barheight-2, 0);



}







function hidebar(){



clearInterval(Pid);



window.status=\'\';



//if(ns4)PBouter.visibility="hide";



//else PBouter.style.visibility="hidden";



action();



}







//THIS FUNCTION BY MIKE HALL OF BRAINJAR.COM



function findlayer(name,doc){



var i,layer;



for(i=0;i<doc.layers.length;i++){



layer=doc.layers[i];



if(layer.name==name)return layer;



if(layer.document.layers.length>0)



if((layer=findlayer(name,layer.document))!=null)



return layer;



}



return null;



}







function progressBarInit(){



PBouter=(ns4)?findlayer(\'PBouter\',document):(ie4)?document.all[\'PBouter\']:document.getElementById(\'PBouter\');



PBdone=(ns4)?PBouter.document.layers[\'PBdone\']:(ie4)?document.all[\'PBdone\']:document.getElementById(\'PBdone\');



resizeEl(PBdone,0,0,barheight-2,0);



if(ns4)PBouter.visibility="show";



else PBouter.style.visibility="visible";



Pid=setInterval(\'incrCount()\',95);



}







function resizeEl(id,t,r,b,l){



if(ns4){



id.clip.left=l;



id.clip.top=t;



id.clip.right=r;



id.clip.bottom=b;



}else id.style.width=r+\'px\';



}







window.onload=progressBarInit;			



</script><p><a href="'.$luura.'" class="wtlink">Si su navegador no lo redirige autom&aacute;ticamente, haga click aqu&iacute;.</a><br><br></center></td>



          </tr>



       



        </table>



      </div></td>



  </tr>



</table>



</body></html>



'; ?>