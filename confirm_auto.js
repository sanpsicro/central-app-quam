function confirmUpdate(delUrl,name_cat) { 
if (confirm("Se dar� de alta el veh�culo con los siguientes datos:\n Marca: "  + document.frm.marca.value +"�Est� seguro de continuar?\n")) { 
document.location = delUrl; 
}
}
