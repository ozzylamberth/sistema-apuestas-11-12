<?Php

include_once "conexion.php";
function guardarXml(){ // probar si la funcion sirve sin pasar nada
$select_admin = sql("SELECT * FROM color");

   function manejoArchivo($xml){
   $nombre='archivo.xml'; 
   $archivo = fopen ($nombre,'a');            
   fwrite ($archivo, $xml);                   
   fclose ($archivo); }
   
$root='<Colores>';
manejoArchivo($root);

While($variable=oci_fetch_array($select_admin,OCI_BOTH)){
	  $col_id2 = $variable['COL_ID'];
	  $col_nombre2 = $variable['COL_NOMBRE'];
    
	$xml='<color>
	      <col_id>'.$col_id2.'</col_id>
		  <col_nombre>'.$col_nombre2.'</col_nombre>
		  </color>';
	
	 manejoArchivo($xml);
   
    }
	
$rootc='</Colores>';
manejoArchivo($rootc);
}
	  
?>


