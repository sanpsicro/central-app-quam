function confirmUpdate(delUrl,name_cat) { 
if (confirm("Se dará de alta el vehículo con los siguientes datos:\n Marca: "  + document.frm.marca.value +"¿Está seguro de continuar?\n")) { 
document.location = delUrl; 
}
}
