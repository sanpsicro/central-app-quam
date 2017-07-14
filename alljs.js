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

function getElementbyClass(classname){
	ccollect=new Array()
	var inc=0
	var alltags=document.all? document.all : document.getElementsByTagName("*")
	for (i=0; i<alltags.length; i++){
		if (alltags[i].className==classname)
		ccollect[inc++]=alltags[i]
	}
}
function contractcontent(omit){
	var inc=0
	while (ccollect[inc]){
		if (ccollect[inc].id!=omit)
		ccollect[inc].style.display="none"
		inc++
	}
}
function expandcontent(cid){
	if (typeof ccollect!="undefined"){
		if (collapseprevious=="yes")
			contractcontent(cid)
			document.getElementById(cid).style.display=(document.getElementById(cid).style.display!="block")? "block" : "none"
	}
}
function revivecontent(){
	contractcontent("omitnothing")
	selectedItem=getselectedItem()
	selectedComponents=selectedItem.split("|")
	for (i=0; i<selectedComponents.length-1; i++)
		document.getElementById(selectedComponents[i]).style.display="block"
}
function get_cookie(Name) { 
	var search = Name + "="
	var returnvalue = "";
	if (document.cookie.length > 0) {
		offset = document.cookie.indexOf(search)
		if (offset != -1) { 
			offset += search.length
			end = document.cookie.indexOf(";", offset);
			if (end == -1) end = document.cookie.length;
				returnvalue=unescape(document.cookie.substring(offset, end))
		}
	}
	return returnvalue;
}
function getselectedItem(){
	if (get_cookie(window.location.pathname) != ""){
		selectedItem=get_cookie(window.location.pathname)
		return selectedItem
	}
	else
		return ""
}
function saveswitchstate(){
	var inc=0, selectedItem=""
	while (ccollect[inc]){
		if (ccollect[inc].style.display=="block")
			selectedItem+=ccollect[inc].id+"|"
		inc++
	}
	document.cookie=window.location.pathname+"="+selectedItem
}
function do_onload(){
	uniqueidn=window.location.pathname+"firsttimeload"
	getElementbyClass("switchcontent")
	if (enablepersist=="on" && typeof ccollect!="undefined"){
		document.cookie=(get_cookie(uniqueidn)=="")? uniqueidn+"=1" : uniqueidn+"=0" 
		firsttimeload=(get_cookie(uniqueidn)==1)? 1 : 0 //check if this is 1st page load
		if (!firsttimeload)
			revivecontent()
	}
}
if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload
if (enablepersist=="on" && document.getElementById)
window.onunload=saveswitchstate

function f(o){
o.value=o.value.toUpperCase();
}
function g(o){
}
</script>
 <SCRIPT TYPE="text/javascript">
<!--
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