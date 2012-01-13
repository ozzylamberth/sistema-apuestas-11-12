<?php
    /**
     *Autor: Eduardo Torres
	  Fecha: 15/08/2011
	  @copyright GrupoNSM CA
	  Modificaciones:
     */
      //require_once("../Contenedores/header.php");
   // require_once("../Clases/conexiones.php");
    //$conexiones = new conexiones();


include_once ("../DataConexion/conexion.php");
    $cedula=$_POST["cedula"];
    $contrasena1=$_POST["contrasena1"];
	//$contrasena2=$_POST["contrasena2"];
	
	
	
	
	$act_Adm = sql("update administrador set admin_contrasena='$contrasena1' where admin_cedula='$cedula'"); 
	
	?>
	
		 <html>
    <head>
        <title></title>
    </head>
    <body>   
        <center>
            <font color="#000000" face="verdana">
                <p><h3>Su Nueva Contrasena se ha Guardado Exitosamente</h3></p>
               <META HTTP-EQUIV="REFRESH" CONTENT="5;URL=iniciar.php"> </head > 
			<b>
			<a href='iniciar.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
					
	</body>
	</html>
	<?PHP
	require_once("../Contenedores/footer.php");

//echo $cedula;

	?>
	<?PHP
	
?>
