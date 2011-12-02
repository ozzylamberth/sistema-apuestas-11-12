<?php

include_once ("conexion.php");
?>
		<head>
		
</head>
<?php  

$selec_Preg = sql("select pre_des from pregunta_secreta where pre_id=1");
	    $row=oci_fetch_array($selec_Preg,OCI_BOTH);
		 ?> 
	<input name="nombre" type="text" id="nombre" value="<? echo $row['pre_des'];?>" size="15" />
		

<form name="consulta" action="UsuarioRegistrado.php" method="post" onSubmit="MostrarConsulta('RegistroUsuario2.php');" return false>

		
		</select>
        
       
        
  
    
	
 </form>
<?PHP
require_once("../Contenedores/footer.php");
?>