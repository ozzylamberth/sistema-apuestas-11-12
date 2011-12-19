<?php

$usuario= 'admin';

include_once ("../DataConexion/conexion.php");

                                      $validar_Existencia=sql("SELECT * FROM administrador where admin_login=$usuario"); 
									  $row=oci_fetch_array($validar_Existencia,OCI_BOTH);
                                      $filas=oci_num_rows($validar_Existencia);
		
		                               echo $filas;
                                      		
                                        
								?>