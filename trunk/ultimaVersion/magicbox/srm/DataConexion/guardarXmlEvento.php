<?Php
  function guardarXmlEvento()
{  
include_once "conexion.php";
  
   $SelectEve= sql("SELECT * FROM EVENTO");
     	//$fila=oci_fetch_array($SelectAdm,OCI_BOTH);
		
		//print_r($fila);
	 
	 $xml='<?xml version="1.0" encoding="utf-8"?>';
	 $nombre='C:/Users/Eleany G/Desktop/eventos.xml'; 
     $archivo = fopen ($nombre,'w'); 
	 fwrite ($archivo, $xml);  
	 
	 $admin='<eventos>'.PHP_EOL;
	 fwrite ($archivo, $admin); 
	 
	while($fila=oci_fetch_array($SelectEve,OCI_BOTH))
	{
		//print_r($fila);
		$tag='<evento>'.PHP_EOL;
		fputs ($archivo, $tag); 
		
		$login='<id>'.PHP_EOL;
		fwrite ($archivo, $login);
		
		$a= $fila['EVE_ID'].PHP_EOL;
		fwrite ($archivo, $a);
		
		$loginc='</id>'.PHP_EOL;
		fwrite ($archivo, $loginc);
		
		$contra='<nombre>'.PHP_EOL;
		fwrite ($archivo, $contra);
		
		$nombre_Evento= $fila['EVE_NOMBRE'].PHP_EOL;
	    fwrite ($archivo, $nombre_Evento);
		
		$contrac='</nombre>'.PHP_EOL;
		fwrite ($archivo, $contrac);
		
		$fecha_e='<fecha>'.PHP_EOL;
		fwrite ($archivo, $fecha_e);
		
		$nombre_Evento= $fila['EVE_FECHA'].PHP_EOL;
	    fwrite ($archivo, $nombre_Evento);
		
		$fechac='</fecha>'.PHP_EOL;
		fwrite ($archivo, $fechac);
		
		
		$id_Cat= $fila['EVE_FK_ID_CATEGORIA'];
		$nombre_Cat= sql("SELECT CAT_NOMBRE FROM CATEGORIA WHERE CAT_ID= $id_Cat");
		$filac=oci_fetch_array($nombre_Cat,OCI_BOTH);
		$catnombre= $filac['CAT_NOMBRE'].PHP_EOL;
		
		
		
		$catl='<categoria>'.PHP_EOL;
		fwrite ($archivo, $catl);
		
		
	    fwrite ($archivo, $catnombre);
		
		$fechac='</categoria>'.PHP_EOL;
		fwrite ($archivo, $fechac);
		
		
		$parti='<participantes>'.PHP_EOL;
		fwrite ($archivo, $parti);
		
		$nro= $fila['EVE_NRO_PART'].PHP_EOL;
	    fwrite ($archivo, $nro);
		
		$partic='</participantes>'.PHP_EOL;
		fwrite ($archivo, $partic);
		
		$gana='<ganadores>'.PHP_EOL;
		fwrite ($archivo, $gana);
		
		$nrog= $fila['EVE_NRO_GAN'].PHP_EOL;
	    fwrite ($archivo, $nrog);
		
		$ganac='</ganadores>'.PHP_EOL;
		fwrite ($archivo, $ganac);
		
		
	
		
		
		$pago='<pago>'.PHP_EOL;
		fwrite ($archivo, $pago);
		
		$tipopago= $fila['EVE_TIPO_PAGO'].PHP_EOL;
	    fwrite ($archivo, $tipopago);
		
		$pagoc='</pago>'.PHP_EOL;
		fwrite ($archivo, $pagoc);
		
		
		
		
		$tagc='</evento>'.PHP_EOL;
		fwrite ($archivo, $tagc); 
	
	}
	
	
	 $adminc='</eventos>'.PHP_EOL;
	 fwrite ($archivo, $adminc); 

      fclose ($archivo); 
 } 
	    
 	
 ?> 


