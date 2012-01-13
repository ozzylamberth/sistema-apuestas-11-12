<!-- Vista o interfaz grafica utilizada al recuperar la clave del administrador, la cual te permite recuperarla al ingresar tus datos-->
<script>
function validaSubmite(){
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
                <form name="RecuperarClave" id="RecuperarClave" method="post" action="?controlador=Home&accion=iniciarSesion">
                    <table width="500px" align='center' border="0">
                        <tr>
                            <td><font color="#000000">Cedula:</font></td>
                            <td><?php echo $cedula ?></td>
                        </tr>
						<tr>
                            <td>Pregunta Secreta: </td>
                            <td><?php echo $pregunta_secreta ?></td>
                        </tr>
                        <tr>
                            <td>Respuesta Secreta: </td>
                            <td><?php echo $respuesta_secreta ?></td>
                        </tr>
						<tr>
                            <td>Contraseña: </td>
                            <td><?php echo $clave ?></td>
                        </tr>
                        <tr>
                            <td align='center' colspan="2">
								</br>
								<input type="button" name="Registrar" id="Continuar" value="Continuar" onClick="validaSubmite()">
							</td>
                        </tr>
                    </table>
                </form>
            </font>
        </center>
    </body>
</html>
<?PHP
require_once("Contenedores/footer.php");
?>