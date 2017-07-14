<?php 
if(empty($_SESSION["valid_user"])){die();} 

$explota_modulos=explode(",",$_SESSION["valid_modulos"]);


                  if(array_search("cabina",$explota_modulos)!==FALSE) { ?>
						<li <?php if ($module=="cabina") {?> class="active" <?php } ?>><a href="?module=cabina" class="menunw">CABINA</a></li>
				<?php } ?>
                
                <?php 
					if(array_search("seguimiento",$explota_modulos)!==FALSE) { ?>
						<li <?php if ($module=="seguimiento") {?> class="active" <?php } ?>><a href="?module=seguimiento" class="menunw">SEGUIMIENTO</a></li>
					<?php } ?>
                    
                                    <?php 
					if(array_search("proveedores",$explota_modulos)!==FALSE) { ?>
						<li <?php if ($module=="buscador_proveedores") {?> class="active" <?php } ?>><a href="?module=buscador_proveedor" class="menunw" target="_blank"><span class="glyphicon glyphicon-search"></span> PROVEEDORES</a></li>
					<?php } ?>
                    
                    <li class="dropdown">
          <a href="#" class="dropdown-toggle menunw fonter" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MENÚ <span class="caret"></span></a>
          <ul class="dropdown-menu">
<?php	
					if(array_search("capacitacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=capacitacion" class="menunw2">ORGANIZACIÓN</a></li>
                        
					<?php	}
					if(array_search("usuarios",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=usuarios" class="menunw2">USUARIOS</a></li>
					<?php }
                    	if(array_search("webservice",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=usuariosws" class="menunw2">WEBSERVICE</a></li>
					<?php }
                    	if(array_search("webservice",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=accesocl" class="menunw2">ACCESO CLIENTES</a></li>
					<?php }
					if(array_search("clientes",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=clientes" class="menunw2">CLIENTES</a></li>
					<?php }
					if(array_search("contratos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=contratos" class="menunw2">CONTRATOS</a></li>
					<?php }
					    if(array_search("4_v",$explota_permisos)!==FALSE) { ?>
						<li><a href="?module=validaciones" class="menunw2">VALIDACIONES</a></li>
					<?php }
					if(array_search("servicios",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=servicios" class="menunw2">SERVICIOS</a></li>
						<li><a href="?module=productos" class="menunw2">PRODUCTOS</a></li>
					<?php }
					if(array_search("proveedores",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=proveedores" class="menunw2">PROVEEDORES</a></li>
                    <?php }
					if(array_search("ventas",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=ventas" class="menunw2">VENTAS</a></li>
					<?php }
					if(array_search("pagos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=control_pagos" class="menunw2">PAGOS</a></li>
						<li><a href="?module=control_cobranza" class="menunw2">COBRANZA</a></li>
					<?php }
					if(array_search("evaluaciones",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=evaluaciones" class="menunw2">EVALUACIONES</a></li>
					<?php }
					if(array_search("comisiones_vendedores",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=comisiones_vendedores" class="menunw2">COMISIONES</a></li>
					<?php }
					if(array_search("facturacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=facturacion" class="menunw2">FACTURACIÓN</a></li>
						<li><a href="?module=notasremision" class="menunw2">REMISIÓN</a></li>
					<?php }
					if(array_search("exportacion",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=exportacion" class="menunw2">REPORTES</a></li>
					<?php }
					if(array_search("vencimientos",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=vencimientos" class="menunw2">VENCIMIENTOS</a></li>
   					<?php }
					if(array_search("uploadc",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=importador" class="menunw2">IMPORTADOR</a></li>
                    <?php }
					if(array_search("quicktips",$explota_modulos)!==FALSE) { ?>
						<li><a href="?module=quicktips" class="menunw2">QUICKTIPS</a></li>
					<?php } ?>
                    
          </ul>
        </li>

