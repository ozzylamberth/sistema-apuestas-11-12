<?php
/**
* Autor: Irene Soto
* Fecha: 20/11/2011
@copyright Grupo SotoGarcia
Modificaciones: Cambios del include, toda la persistencia de datos y la conexion a la base de datos
se coloco en una carpeta llamada DataConexion
*/


	 include_once("../controladores/ControlPregSecreta.php");   
	
	 
	 

	
		  
	if ($filas <=0)
	{
	?>
		 <p align="center" class="Estilo1"><strong>La Cedula Ingresada no coincide con los Registros</strong></p>
		 <p align="center" class="Estilo1"><strong></strong></p>
  		<form name='volverse' action='iniciar.php'> 
          <table align='center'>
		     <td><input type="submit" align='center' name="Cancelar" id="button2" value="Salir"></td>
		     </tr>
		  </table>
        </form>
		 <?PHP
	
		exit (0);
	}
	else
	{
	?>

<html>
    <head>
        <title></title>
    </head>
    <body>   
        <center>
            <font color="#000000" face="verdana">
                <h3>Recuperaci&oacute;n de Clave</h3>
                <form name="respuestaSecreta" id="formPreguntaSecreta"  method="post" action="mostrarClave.php">
                    <table border="0">
                        <tr>
                            <td>Pregunta Secreta: </td>
                            <td><input size="50" readonly="readonly" value="<?php echo $pre_des ?>"/></td>
                        </tr>
                        <tr>
                            <td>Respuesta Secreta: </td>
                            <td><input  type="password" id="respuestaSecreta" type="text" name="respuestaSecreta"/ maxlength="20"></td>
                        </tr>
                        <tr>
                            <td><input id="cedula" type="hidden" value="<?php echo $cedula ?>" name="cedula"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="consultarCedula" value="Continuar"></td>
                        </tr>
                    </table>
                </form>
            </font>
        </center>
    </body>
</html>
<?PHP
}
require_once("../Contenedores/footer.php");
?>