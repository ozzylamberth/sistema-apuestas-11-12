<?php
/**
* Autor: Irene Soto
* Fecha: 20/11/2011
@copyright Grupo SotoGarcia
Modificaciones: Cambios del include, toda la persistencia de datos y la conexion a la base de datos
se coloco en una carpeta llamada DataConexion
*/

include_once ("../DataConexion/conexion.php");
	 $cedula=$_POST["cedula"];
	 
	 $validar_Existencia=sql("SELECT * from administrador where admin_cedula=".$cedula);
	 $fila=(oci_fetch_array($validar_Existencia,OCI_BOTH));
	 $filas=oci_num_rows($validar_Existencia);
	 
	 
	 

	
		  
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
	     $validar_Existencia2=sql("SELECT * from administrador where admin_cedula=".$cedula);
		while ($fila2=oci_fetch_array($validar_Existencia2,OCI_BOTH))
		{
				 $admin_fk_id_pre = $fila2['ADMIN_FK_ID_PRE'];	
				 $admin_resp_secreta= $fila2['ADMIN_RESP_SECRETA'];
		}
		
		 $selec_Preg=sql("select pre_des from pregunta_secreta where pre_id = $admin_fk_id_pre");
         $fila_pre=oci_fetch_array($selec_Preg,OCI_BOTH);
		 $pre_des= $fila_pre['PRE_DES'];
		

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
                            <td><input id="cedula" type="hidden" value="<?php print($cedula); ?>" name="cedula"/></td>
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