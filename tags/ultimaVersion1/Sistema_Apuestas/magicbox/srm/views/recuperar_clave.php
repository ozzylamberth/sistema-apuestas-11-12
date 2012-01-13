<script>
<!-- Vista o interfaz grafica utilizada al recuperar la clave del administrador-->
function validaSubmite(){
    if (document.RecuperarClave.cedula.value == false )
                alert("Debe Ingresar Cedula")
	else if (document.RecuperarClave.preguntaSecreta.value == 0 )
                alert("Debe seleccionar una pregunta")
	else if (document.RecuperarClave.respuestaSecreta.value == false )
                alert("Debe Ingresar una respuesta secreta")
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
                <form name="RecuperarClave" id="RecuperarClave" method="post" action="?controlador=Home&accion=guardarNuevaClave">
                    <table width="200px" align='center' border="0">
                        <tr>
                            <td><font color="#000000">Cedula:</font></td>
                            <td><input id="cedula" type="text" name="cedula" maxlength="8" size="9"/></td>
                        </tr>
						<tr>
                            <td>Pregunta Secreta: </td>
                            <td>
								<select name="preguntaSecreta" class="gh" id="pregunta">
									<option value="0">Seleccione </option>
										<?php foreach ($pregs as $clave=>$valor): ?>
											<option value="<?php echo $valor["pre_id"] ?>" > <?php echo $valor["pre_des"]?></option>
										<?php endforeach; ?>
								</select>
							</td>
                        </tr>
                        <tr>
                            <td>Respuesta Secreta: </td>
                            <td><label>
                              <input type="text" name="respuestaSecreta" id="respuestaSecreta">
                            </label></td>
                        </tr>
                        <tr>
                            <td align='center' colspan="2">
								</br>
								<input type="button" name="Registrar" id="Continuar" value="Continuar" onClick="validaSubmite()">
								&nbsp;&nbsp;
								<input type="button" name="Cancelar" id="Cancelar" value="Cancelar" onClick="windows.close()">
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