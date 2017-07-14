<?php 

if (!isset($_GET['sNumPoliza'])) $_GET['sNumPoliza'] = ""; 

if(!isset($SEL['idPoliza'])){ $SEL['idPoliza'] = "" ;}

$SQLCABINA = ["Buscar" => "select Poliza.idPoliza,numPoliza,Cliente.nombre,idUsuarioFinal
                            from Poliza join Cliente on (Cliente.idCliente = Poliza.idCliente)
                            left join UsuarioFinal on (UsuarioFinal.idPoliza = Poliza.idPoliza)
                            where (numPoliza like '%".$_GET['sNumPoliza']."%' and '".$_GET['sNumPoliza']."' <> '' and '".$_GET['sId']."' = '')
                            or (nombre like '%".$_GET['sNombre']."%' and '".$_GET['sNombre']."' <> '')
                            or (idUsuarioFinal like '".$_GET['sId']."' and '".$_GET['sId']."' <> '' and '".$_GET['sNumPoliza']."' = '')"
		     ,"BuscarID" => "select idPoliza,id from Polizas
                            where id like '".$SEL[idPoliza]."'"
		
		 ,"ObtenerProductos" => "select Producto.idProducto,Nombre,NumIncidente from Producto
                                     join ProductosPoliza on (Producto.idProducto = ProductosPoliza.idProducto)
                                   where idPoliza = '".$SEL[idPoliza]."'" 
		 , "ObtenerIncidentes" => "select idProducto,Producto.Nombre,count(idPoliza),NumIncidente, count(idPoliza)<NumIncidente AS MENOR
                                      from Expediente,ProductosPoliza
                                      where idProducto = '".$_GET[idProducto]."'
                                      group by idProducto,idPoliza " 
		 , "EnGracia" => "select idPoliza,
                              (
                                not pagada
                                AND
                                DATE_ADD(fechaInicio, INTERVAL 1 MONTH) > NOW()
                              )
                              AND fechaVence > NOW()
                              AND validada AS VALUE
                             from Poliza  where idPoliza = '".$SEL["idPoliza"]."'"
		    , "SinDerecho" => "select idPoliza,

                                (pagada AND fechaVence <= NOW())
                                OR (NOT pagada AND DATE_ADD(fechaInicio, INTERVAL 1 MONTH) < NOW())
                                OR NOW() < fechaInicio
                                OR cancelada
                                OR NOT validada AS VALUE
                             from Poliza  where idPoliza = '".$SEL[idPoliza]."'"
		  , "Libre" => "select idPoliza,
                             (pagada AND fechaVence > NOW())
                             AND fechaInicio <= NOW()
                             AND validada
                             AND NOT cancelada AS VALUE
                             from Poliza  where idPoliza = '".$SEL[idPoliza]."'"
		  , "AltaExpediente" =>   "select numPoliza,Cliente.nombre AS NombreCliente,now() as Ahora,
                           Cliente.idCliente,PlantillasBool.*
                           from Poliza join Cliente on (Cliente.idCliente = Poliza.idCliente)
                           join ProductosPoliza on (ProductosPoliza.idPoliza = Poliza.idPoliza)
                           join Producto on (Producto.idProducto = ProductosPoliza.idProducto)
                           join PlantillasBool on (PlantillasBool.idProducto = Producto.idProducto)
                           where Producto.idProducto =". $_GET["idProducto"]."  and Poliza.idPoliza =". $_GET["idPoliza"]
		 , "DatosExpediente" => "select numPoliza,idExpediente
                           from Expediente join Poliza on (Poliza.idPoliza = Expediente.idPoliza)
                           where idExpediente =". $_GET[idExpediente]
		 , "Seguimiento" => "select Poliza.numPoliza,Expediente.idExpediente,Expediente.nmCliente,
                                 Expediente.idUsuarioFinal,seguimiento.Bitacora,seguimiento.Estado,
                                 Expediente.idExpediente,Empleado.nombre AS NombreEmpleado
                                 from Expediente join seguimiento
                                 on (Expediente.idExpediente = seguimiento.idExpediente)
                                 join Poliza on (Expediente.idPoliza = Poliza.idPoliza)
                                 left join Empleado on (seguimiento.idEmpleado = Empleado.idEmpleado)
                                  where NOT concluido AND seguimiento.idSeguimiento in
                                  (select max(idSeguimiento) from seguimiento group by idExpediente)
                                  ", "AgregarSeguimiento" => "insert into seguimiento (idExpediente,Bitacora,Estado,idEmpleado)
                                       values (".$_POST[idExpediente].",'".$_POST[bitacora]."','".$_POST[estado]."',".$_SESSION["valid_userid"].") " ];





//  $SQLCABINA["Buscar"] = "select Poliza.idPoliza,numPoliza,Cliente.nombre,idUsuarioFinal
//                             from Poliza join Cliente on (Cliente.idCliente = Poliza.idCliente)
//                             left join UsuarioFinal on (UsuarioFinal.idPoliza = Poliza.idPoliza)
//                             where (numPoliza like '%".$_GET['sNumPoliza']."%' and '".$_GET['sNumPoliza']."' <> '' and '".$_GET['sId']."' = '')
//                             or (nombre like '%".$_GET['sNombre']."%' and '".$_GET['sNombre']."' <> '')
//                             or (idUsuarioFinal like '".$_GET['sId']."' and '".$_GET['sId']."' <> '' and '".$_GET['sNumPoliza']."' = '')";
                            
//     $SQLCABINA["BuscarID"] = "select idPoliza,id from Polizas
//                             where id like '".$SEL[idPoliza]."'";
//     $SQLCABINA["ObtenerProductos"] = "select Producto.idProducto,Nombre,NumIncidente from Producto
//                                      join ProductosPoliza on (Producto.idProducto = ProductosPoliza.idProducto)
//                                    where idPoliza = '".$SEL[idPoliza]."'";
//     $SQLCABINA["ObtenerIncidentes"] = "select idProducto,Producto.Nombre,count(idPoliza),NumIncidente, count(idPoliza)<NumIncidente AS MENOR
//                                       from Expediente,ProductosPoliza
//                                       where idProducto = '".$_GET[idProducto]."'
//                                       group by idProducto,idPoliza ";
                                      
//     $SQLCABINA["EnGracia"] = "select idPoliza,
//                               (
//                                 not pagada
//                                 AND
//                                 DATE_ADD(fechaInicio, INTERVAL 1 MONTH) > NOW()
//                               )
//                               AND fechaVence > NOW()
//                               AND validada AS VALUE
//                              from Poliza  where idPoliza = '".$SEL[idPoliza]."'";
//     $SQLCABINA["SinDerecho"] = "select idPoliza,

//                                 (pagada AND fechaVence <= NOW())
//                                 OR (NOT pagada AND DATE_ADD(fechaInicio, INTERVAL 1 MONTH) < NOW())
//                                 OR NOW() < fechaInicio
//                                 OR cancelada
//                                 OR NOT validada AS VALUE
//                              from Poliza  where idPoliza = '".$SEL[idPoliza]."'";
//     $SQLCABINA["Libre"] = "select idPoliza,
//                              (pagada AND fechaVence > NOW())
//                              AND fechaInicio <= NOW()
//                              AND validada
//                              AND NOT cancelada AS VALUE
//                              from Poliza  where idPoliza = '".$SEL[idPoliza]."'";
//     $SQLCABINA["AltaExpediente"] = "select numPoliza,Cliente.nombre AS NombreCliente,now() as Ahora,
//                            Cliente.idCliente,PlantillasBool.*
//                            from Poliza join Cliente on (Cliente.idCliente = Poliza.idCliente)
//                            join ProductosPoliza on (ProductosPoliza.idPoliza = Poliza.idPoliza)
//                            join Producto on (Producto.idProducto = ProductosPoliza.idProducto)
//                            join PlantillasBool on (PlantillasBool.idProducto = Producto.idProducto)
//                            where Producto.idProducto =". $_GET[idProducto]."  and Poliza.idPoliza =". $_GET[idPoliza];
//     $SQLCABINA["DatosExpediente"] = "select numPoliza,idExpediente
//                            from Expediente join Poliza on (Poliza.idPoliza = Expediente.idPoliza)
//                            where idExpediente =". $_GET[idExpediente];
                           
//     $SQLCABINA["Seguimiento"] = "select Poliza.numPoliza,Expediente.idExpediente,Expediente.nmCliente,
//                                  Expediente.idUsuarioFinal,seguimiento.Bitacora,seguimiento.Estado,
//                                  Expediente.idExpediente,Empleado.nombre AS NombreEmpleado
//                                  from Expediente join seguimiento
//                                  on (Expediente.idExpediente = seguimiento.idExpediente)
//                                  join Poliza on (Expediente.idPoliza = Poliza.idPoliza)
//                                  left join Empleado on (seguimiento.idEmpleado = Empleado.idEmpleado)
//                                   where NOT concluido AND seguimiento.idSeguimiento in
//                                   (select max(idSeguimiento) from seguimiento group by idExpediente)
//                                   ";

//     $SQLCABINA["AgregarSeguimiento"] = "insert into seguimiento (idExpediente,Bitacora,Estado,idEmpleado)
//                                        values (".$_POST[idExpediente].",'".$_POST[bitacora]."','".$_POST[estado]."',".$SESSION_USERID.") ";
                                       
?>
