<?php
    /**
     * autor: Eduardo Torres
     * Fecha: 15/08/2011
		@copyright GrupoNSM C.A
		Modificaciones:
     */

	 
	

	 //require_once("../Contenedores/header.php");
?>
<script>
function validaSubmite(){
    if (document.RecuperarClave.cedula.value == false )
		alert("Debe Ingresar Cedula")
		else 
       document.RecuperarClave.submit()
} 	
</script>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <center>
            <font color="#000000" face="verdana"><h3>Recuperar Clave</h3>
                <form name="RecuperarClave" id="RecuperarClave" method="post" action="mostrarPreguntaSecreta.php">
                    <table align='center'>
                        <tr>
                            <td><font color="#000000">Cedula:</font></td>
                            <td><input id="cedula" type="text" name="cedula" maxlength="8" size="9"/></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td colspan="2" align='center'><input type="button" name="Registrar" id="Continuar" value="Continuar" onclick="validaSubmite()"></td>
                        </tr>
                    </table>
					</form>
					<form name='volverse' action='iniciar.php'> 
<table align='center'>
					<td><input type="submit" align='center' name="Cancelar" id="button2" value="Cancelar"></td>
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
