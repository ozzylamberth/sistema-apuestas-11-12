<?php

$usuario= 'admin';

include_once ("../DataConexion/conexion.php");
//require_once("../Contenedores/header.php");


//$usuario= md5('$usuario');
//$clave= md5('$clave');
                                      $validar_Existencia=sql("SELECT * FROM administrador where admin_login=$usuario");  									  $row=oci_fetch_array($validar_Existencia,OCI_BOTH);
                                      $filas=oci_num_rows($validar_Existencia);
		
		                               echo $filas;
                                      		
                                        
								?>