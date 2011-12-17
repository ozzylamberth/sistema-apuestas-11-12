<?php
 include_once("../DataConexion/conexion.php"); 
$opcion1 = $_GET['id1'];		//Le asigno a una variable lo que recibo por la URL
$accion = $_GET['accion'];


//muestra los datos consultados de acuerdo a la opción


if ($accion == "habilitaSede")
{
?>

<td><select name="tipo" id="tipo" >
    	
		
<?php
switch ($opcion1)
					{
						case 0: break;
						case 1: $select_marca= sql("SELECT DISTINCT MAQ_MARCA FROM maquina_apuesta");
	                            while ($filas=oci_fetch_array($select_marca,OCI_BOTH))
								{ ?>
                                
                              <option value="<?php echo $filas["MAQ_MARCA"] ?>" > <?php echo $filas["MAQ_MARCA"]?></option>
								
								<?php }
								
	                            break;
								
						case 2: $select_status= sql("SELECT DISTINCT MAQ_STATUS FROM maquina_apuesta");
	                            while ($filas=oci_fetch_array($select_status,OCI_BOTH))
								{?>
									 
					              <option value="<?php echo $filas["MAQ_STATUS"] ?>" > <?php echo $filas["MAQ_STATUS"]?></option>
					
								<?php }
								
								break;
								
						case 3: $select_modelo= sql("SELECT DISTINCT MAQ_MODELO FROM maquina_apuesta");
	                            while ($filas=oci_fetch_array($select_modelo,OCI_BOTH))
								{ ?>
                                
                              <option value="<?php echo $filas["MAQ_MODELO"] ?>" > <?php echo $filas["MAQ_MODELO"]?></option>
								
								<?php }
								break;
								
						case 4: $select_memoria= sql("SELECT DISTINCT MAQ_MEMORIA FROM maquina_apuesta");
	                            while ($filas=oci_fetch_array($select_memoria,OCI_BOTH))
								{ ?>
                                
                              <option value="<?php echo $filas["MAQ_MEMORIA"] ?>" > <?php echo $filas["MAQ_MEMORIA"]?></option>
								
								<?php }
								
								break;
								
						case 5: $select_procesador= sql("SELECT DISTINCT MAQ_PROCESADOR FROM maquina_apuesta");
	                            while ($filas=oci_fetch_array($select_procesador,OCI_BOTH))
								{ ?>
                                
                              <option value="<?php echo $filas["MAQ_PROCESADOR"] ?>" > <?php echo $filas["MAQ_PROCESADOR"]?></option>
								
								<?php }
								break;
					}

?>

</select>
				
<?PHP
}
?>