<?PHP

/** 
*
* @Confirmacion de modificacion de administradores
* 
* @autor: Eleany Garcia
* Página que confirma las modificaciones realizadas a un administrador (hace el update) y redirecciona a home
*
*/

session_start();
include_once("../DataConexion/conexion.php");


$casapu_id = $_POST['casapu_id'];
$casapu_nombre = $_POST['casapu_nombre'];
?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
    
      <?php	
		$actualiza_Casa = sql("UPDATE CASA_APUESTA SET CASAPU_NOMBRE='$casapu_nombre' WHERE CASAPU_ID= ".$casapu_id);
	   ?>

        <!--META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"--> 
        </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Modificacion Realizada con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por       favor ingrese en el siguiente enlace <a href='home.php' class="Estilo1"></br>  Regresar al Menu Principal</a></p>
            
 
</body>

									  


