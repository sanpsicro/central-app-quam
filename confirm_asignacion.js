function confirmAssign(delUrl,name_cat) { 
if (confirm("¿Está seguro de querer asignar el servicio \n" + name_cat + "?")) { 
document.location = delUrl; 
}
}
