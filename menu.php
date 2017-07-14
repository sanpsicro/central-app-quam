<style type="text/css">
@-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {background-color: #FF0000; opacity: 1.0;}
}
.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 1.0s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction:alternate;
}
</style>
<?php  if(empty($_SESSION["valid_user"])){die();} 

$explota_modulos=explode(",",$_SESSION["valid_modulos"]);

?> 


<table width="218" border="0" cellspacing="0" cellpadding="0">
            <tr><td><?php  
                $checa_array1=array_search("cabina",$explota_modulos);

if($checa_array1===FALSE){} else{ ?>
					<div id="alertas">
	
	
                <div id="external_page_content_displayer"></div> <?php  } ?>
                

	</div>                
                <div style="clear: both;"></div>
				<ul class="mainMenu">
                    <?php  
					if(array_search("capacitacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=capacitacion">Organizaci�n y M�todos</a></li>
                        
					<?php  }
					if(array_search("usuarios",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=usuarios">Usuarios</a></li>
					<?php  }
                    	if(array_search("webservice",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=usuariosws">Webservice</a></li>
					<?php  }
                    	if(array_search("webservice",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=accesocl">Acceso Clientes</a></li>
					<?php  }
					if(array_search("clientes",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=clientes">Clientes</a></li>
					<?php  }
					if(array_search("contratos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=contratos">Contratos</a></li>
					<?php  }
					if(array_search("4_v",$explota_permisos)!==FALSE) { ?>
						<li><a href="?module=validaciones">Validaciones</a></li>
					<?php  }
					if(array_search("servicios",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=servicios">Servicios</a></li>
						<li><a href="?module=productos">Productos</a></li>
					<?php  }
					if(array_search("proveedores",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=proveedores">Proveedores</a></li>
                        <?php  }
					if(array_search("proveedores",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=buscador_proveedor" target="_blank">Buscador Proveedores</a></li>
					<?php  }
					if(array_search("ventas",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=ventas">Ventas</a></li>
					<?php  } 
					if(array_search("cabina",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=cabina">Cabina</a></li>
					<?php  }
					if(array_search("seguimiento",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=seguimiento">Seguimiento</a></li>
					<?php  }
					if(array_search("pagos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=control_pagos">Control de Pagos</a></li>
						<li><a href="?module=control_cobranza">Control de Cobranza</a></li>
					<?php  }
					if(array_search("evaluaciones",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=evaluaciones">Evaluaciones</a></li>
					<?php  }
					if(array_search("comisiones_vendedores",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=comisiones_vendedores">Comisiones de vendedores</a></li>
					<?php  }
					if(array_search("facturacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=facturacion">Facturaci&oacute;n</a></li>
						<li><a href="?module=notasremision">Notas de Remision</a></li>
					<?php  }
					if(array_search("exportacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=exportacion">Reportes</a></li>
					<?php  }
					if(array_search("vencimientos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=vencimientos">Vencimientos</a></li>
   					<?php  }
					if(array_search("uploadc",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=importador">Importador Contratos</a></li>
					<?php  } ?>
                    
				</ul>
                <br /><br />
				</td>
              </tr>
              <tr><td>

</td>
</tr>
  </table>