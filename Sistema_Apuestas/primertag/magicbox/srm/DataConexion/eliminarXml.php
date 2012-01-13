<?php
   $xml = new DOMDocument(); 
   $xml->load('archivo.xml'); 
   $nodelist=$xml->getElementsByTagName('administrador');  
   $remove=null; 
  /* 
   function EliminarXML (id_evento){ */
        $var= $nodelist->length;
        for ($i = 0; $i < $nodelist->length; $i++){ 
           $innernodelist=$nodelist->item($i)->childNodes; 
           for ($j = 0; $j < $innernodelist->length; $j++){ 
                if ((((string)$innernodelist->item($j)->nodeName)==='cedula') && (((string)$innernodelist->item($j)->nodeValue)==17643852))
				{ 
                 	$remove=$nodelist->item($i); 
                    $j= $var;   // Se colocan las 2 variables de los ciclos en su valor máximo, porque ya se consiguio                                 el evento buscado,es un especie de break.
	                 $i=$var;                         
                    } 
              } 
         } 
         if ($remove!==null){            
           $remove->parentNode->removeChild($remove); 
           $xml->save('archivo.xml'); 
          } 
/*    } */
?>
         






