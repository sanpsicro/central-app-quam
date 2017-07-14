<?php 
   ob_start ("ob_gzhandler");
   header ("content-type: text/javascript; charset: UTF-8");
   header ("cache-control: must-revalidate");
   $offset = 60 * 60;
   $expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";
   header ($expire);
?>
function confirmDelete(delUrl,name_cat) { 
	if (confirm("¿Está seguro de querer eliminar \n" + name_cat + "?")) { 
		document.location = delUrl; 
	}
}
function confirmUpdate(delUrl,name_cat) { 
	if (confirm("Se dará de alta el vehículo con los siguientes datos:\n Marca: "  + document.frm.marca.value +"¿Está seguro de continuar?\n")) { 
		document.location = delUrl; 
	}
}
function confirmUpdate(delUrl,name_cat) { 
	if (confirm("¿Está seguro de querer actualizar los datos  \n" + name_cat + "?")) { 
		document.location = delUrl; 
	}
}

// jump
function jump(fe){
	var opt_key = fe.selectedIndex;
	var uri_val = fe.options[opt_key].value;
	window.open(uri_val,'_top');
	return true;
}

// submitonce
function submitonce(theform){
	//if IE 4+ or NS 6+
	if (document.all||document.getElementById){
		//screen thru every element in the form, and hunt down "submit" and "reset"
		for (i=0;i<theform.length;i++){
			var tempobj=theform.elements[i]
			if(tempobj.type.toLowerCase()=="submit"||tempobj.type.toLowerCase()=="reset")
			//disable em
			tempobj.disabled=true
		}
	}
}


// Todos los demás

function f(o){
o.value=o.value.toUpperCase();
}
function g(o){
}

function numbersonly(myfield, e, dec)
{
var key;
var keychar;
if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);
// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;
// numbers
else if ((("0123456789.-()* abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ").indexOf(keychar) > -1))
   return true;
// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

function disableForm(theform) {
if (document.all || document.getElementById) {
for (i = 0; i < theform.length; i++) {
var tempobj = theform.elements[i];
if (tempobj.type.toLowerCase() == "submit" || tempobj.type.toLowerCase() == "reset")
tempobj.disabled = true;
}
setTimeout('alert("Formulario enviado.")', 2000);
return true;
}
else {
alert("Formulario enviado. Espere.");
return false;
   }
}