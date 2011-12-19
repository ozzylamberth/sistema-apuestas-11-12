<?php
    /**
     *Autor: Eduardo Torres
	  Fecha: 15/08/2011
	  @copyright GrupoNSM CA
	  Modificaciones:
     */
     // require_once("../Contenedores/header.php");
   // require_once("../Clases/conexiones.php");
    //$conexiones = new conexiones();



include_once("../controladores/ControlClave2.php");   
//echo $cedula;

   
	
	
			if ($filas> 0)
			{
			?>
                        <p align="center" class="Estilo1"><strong>Ingrese su Nueva Contraseña</strong></p>
						 
						 <html>
    <head>
        <title></title>
    </head>
    <body>   
        <center>
            <font color="#000000" face="verdana">
                <h3>Recuperaci&oacute;n de Clave</h3>
                <form name="respuestaSecreta" id="formPreguntaSecreta"  method="post" action="Guardarclave.php">
                    <table border="0">
                        <tr>
                            <td>Contrasena: </td>
                            <td><input type="password" id="contrasena" type="text" name="contrasena1"></td>
                        </tr>
                        <tr>
                            <td><input id="cedula" type="hidden" value="<?php print($cedula); ?>" name="cedula"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="consultarCedula" value="Guardar"></td>
                        </tr>
                    </table>
                </form>
            </font>
        </center>
    </body>
</html>
<?PHP
require_once("../Contenedores/footer.php");
?>				
            <?PHP
			exit;
			}
			else
			{
			?>
						 <p align="center" class="Estilo1"><strong>La Respuesta Secreta Proporcionada es Incorrecta</strong></p>
						 <p align="center" class="Estilo1"><strong></strong></p>
						 	<form name='volverse' action='iniciar.php'> 
<table align='center'>
					<td><input type="submit" align='center' name="Cancelar" id="button2" value="Salir"></td>
					</tr>
					</table>
</form>
			<?PHP		
			}
		?>

<?PHP
require_once("../Contenedores/footer.php");
?>