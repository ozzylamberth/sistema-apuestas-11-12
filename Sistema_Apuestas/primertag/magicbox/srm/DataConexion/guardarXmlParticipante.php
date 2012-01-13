<?Php
  function guardarXmlParticipante()
{ 
include_once "conexion.php";
  
   $SelectEve= sql("SELECT P.PAR_NOMBRE, E.EVE_ID, PE.PE_TIPO_PAGO, PE.PE_TOP_APUESTA, E.EVE_TIPO_PAGO FROM PARTICIPANTE P, EVENTO E, PAR_EVE PE WHERE E.EVE_ID = PE.PE_FK_EVE_ID AND PE.PE_FK_PAR_ID = P.PAR_ID ");
     	
	 
	 $xml='<?xml version="1.0" encoding="utf-8"?>';
	 $nombre='C:/Users/Eleany G/Desktop/administrador.xml'; 
     $archivo = fopen ($nombre,'w'); 
	 fwrite ($archivo, $xml);  
	 
	 $admin='<participantes>'.PHP_EOL;
	 fwrite ($archivo, $admin); 
	 
	while($fila=oci_fetch_array($SelectEve,OCI_BOTH))
	{
		//print_r($fila);
		$tag='<participante>'.PHP_EOL;
		fputs ($archivo, $tag); 
		
		$login='<nombre>'.PHP_EOL;
		fwrite ($archivo, $login);
		
		$a= $fila['PAR_NOMBRE'].PHP_EOL;
		fwrite ($archivo, $a);
		
		$loginc='</nombre>'.PHP_EOL;
		fwrite ($archivo, $loginc);
		
		
		$eveid='<evento>'.PHP_EOL;
		fwrite ($archivo, $eveid);
		
		$evevalor=$fila['EVE_ID'].PHP_EOL;
		fwrite ($archivo, $evevalor);
		
		$evec='</evento>'.PHP_EOL;
		fwrite ($archivo, $evec);
		
		$tipopag='<pago>'.PHP_EOL;
		fwrite ($archivo, $tipopag);
		
		$tp=$fila['PE_TIPO_PAGO'];
		if ($tp==0)
		{
			$tipo_Pago=$fila['EVE_TIPO_PAGO'].PHP_EOL;
		    fwrite ($archivo, $tipo_Pago);
			
		}
		else 
		{
			$tipo_Pago=$fila['PE_TIPO_PAGO'].PHP_EOL;
		    fwrite ($archivo, $tipo_Pago);
			
		}
		
		$tipopagc='</pago>'.PHP_EOL;
		fwrite ($archivo, $tipopagc);
		
		
		$tope='<tope>'.PHP_EOL;
		fwrite ($archivo, $tope);
		
		$top_Apuesta=$fila['PE_TOP_APUESTA'];
		if ($top_Apuesta ==0)
		{
			$sin_Tope='0'.PHP_EOL;
		    fwrite ($archivo, $sin_Tope);
		}
		else
		{
			$tipo_Pago=$fila['PE_TOP_APUESTA'].PHP_EOL;
		    fwrite ($archivo, $tipo_Pago);
		
		}
		
		
		
		
		$topec='</tope>'.PHP_EOL;
		fwrite ($archivo, $topec);
		
		$tagc='</participante>'.PHP_EOL;
		fwrite ($archivo, $tagc); 
	
	}
	
	
	 $adminc='</participantes>'.PHP_EOL;
	 fwrite ($archivo, $adminc); 

      fclose ($archivo); 
  } 
		   
 	
 ?> 


