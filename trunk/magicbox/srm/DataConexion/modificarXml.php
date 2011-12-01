<?php
/* function ModificarXml($admin_login,$admin_contrasena)
{ */
$xml = new DOMDocument();
$archivo = 'archivo.xml';
$xml->load($archivo);
$nodelist=$xml->getElementsByTagName('administrador'); 
$replace=null;
$admin_cedula=17643852;
$admin_login='IreneIsable';
$admin_contrasena='ytyt';
     $Nroelemen= $nodelist->length; // Esta variable con la longitud se usa para hacer un break cuando consiga elemento                                        a modificar
       for ($i = 0; $i < $nodelist->length; $i++)
	   {
             $innernodelist=$nodelist->item($i)->childNodes;
             for($j = 0; $j < $innernodelist->length; $j++)
			 {
	
      			 if ((((string)$innernodelist->item($j)->nodeName)==='cedula') && (((string)$innernodelist->item($j)->nodeValue)== $admin_cedula))
	  			  {
            		  $replace=$nodelist->item($i);    
	         		  $j= $Nroelemen;   // Se colocan las 2 variables de los ciclos en su valor máximo, porque ya se consiguio en                                evento buscado,es un especie de break.
	         		  $i=$Nroelemen; 
	  			 
     	     	  }
	          }
	   }
      
       //deberia pasar nuevamnete los valores TODOS 
      if($replace!==null){
	     $login= 'login';
	     $contrasena= 'contrasena';
	     $administrador='administrador';
	 
         $new=$xml->createElement($administrador);
         $log=$xml->createElement($login,'$admin_login');
         $con=$xml->createElement($contrasena,'$admin_contrasena');
        
  
         $new->appendChild($log);
         $new->appendChild($con);
        
         $replace->parentNode->replaceChild($new,$replace);
     }
	 $xml->save($archivo);
/* } // Cierre de la Función! */

?>