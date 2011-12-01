<?Php
 function guardarXml()
{
include_once "conexion.php";
  
   $SelectAdm= sql("SELECT * FROM ADMINISTRADOR");
     	//$fila=oci_fetch_array($SelectAdm,OCI_BOTH);
		
		//print_r($fila);
	 
	 $xml='<?xml version="1.0" encoding="utf-8"?>';
	 $nombre='C:/Users/Irene/Desktop/administradores.xml'; 
     $archivo = fopen ($nombre,'w'); 
	 fwrite ($archivo, $xml);  
	 
	 $admin='<administradores>';
	 fwrite ($archivo, $admin); 
	 
	while($fila=oci_fetch_array($SelectAdm,OCI_BOTH))
	{
		//print_r($fila);
		$tag='<administrador>'.PHP_EOL;
		fputs ($archivo, $tag); 
		
		$login='<login>'.PHP_EOL;
		fwrite ($archivo, $login);
		
		$a= $fila['ADMIN_LOGIN'].PHP_EOL;
		fwrite ($archivo, $a);
		
		$loginc='</login>'.PHP_EOL;
		fwrite ($archivo, $loginc);
		
		$contra='<contrasena>'.PHP_EOL;
		fwrite ($archivo, $contra);
		
		$admincontra= $fila['ADMIN_CONTRASENA'];
		$admcontracifrada=md5($admincontra).PHP_EOL;
	    fwrite ($archivo, $admcontracifrada);
		
		$contrac='</contrasena>'.PHP_EOL;
		fwrite ($archivo, $contrac);
		
		$tagc='</administrador>'.PHP_EOL;
		fwrite ($archivo, $tagc); 
	
	}
	
	
	 $adminc='</administradores>';
	 fwrite ($archivo, $adminc); 

	echo "holaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
      fclose ($archivo); 
 } 
		   
 	
 ?> 


