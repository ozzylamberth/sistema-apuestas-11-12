<?Php

include_once ('conexion.php');


 $admin_nombre= $_POST["admin_nombre"];
 $admin_apellido= $_POST["admin_apellido"];
 $admin_cedula= $_POST["admin_cedula"];
 $admin_resp_secreta= $_POST["admin_resp_secreta"];
// $pregunta_secreta= $_POST["pregunta_secreta"];
 
  $admin_login= $_POST["admin_login"];
 //El usuario sera el email.
 //Password Aleatorio.

 
/**

 * The letter l (lowercase L) and the number 1

 * have been removed, as they can be mistaken

 * for each other.

 */
/* 


function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}



// Usage

$password = createRandomPassword(); */



		
	$fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1 );

?>
		<head>
		<script language='javascript' src="../js/popcalendar.js"></script>
		

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		<title>
		Registro de Compania
		</title>
		
		</head>

                 <body>

					
<!--        AQUI ESTA LO QUE DEBERIA DE IR EN EL FOOTER      					

<form action="requisicion8.php" name="requisicion"  id="requisicion" method="post">
-->
<fieldset >
  <legend>Registro de Usuario</legend>

<?PHP

//Consulta Compania		
		$validar_Exist= sql("SELECT * FROM administrador where admin_cedula=".$admin_cedula); 
									   $fila=oci_fetch_array($validar_Exist,OCI_BOTH);
                                       $existe=oci_num_rows($validar_Exist);
		
	
		
		if ($existe > 0)
		{
		echo "Usuario Registrado";
		?>
		<td colspan="3"><a href="recuperarClave.php"><h5 align="center">&#191; Olvidaste tu Contrase&ntilde;a ?</h5></a></td>
		<td colspan="3"><a href="../../index.html"><h5 align="center">Salir</h5></a></td>
		
		<?PHP
		exit(0);
		}
		else
		{
			
			/*
			hacer: el valor del id para insertar abajo
			$select_idPreg= sql(" Select pre_id from pregunta secreta where pre_des=".$pregunta_secreta);
			$fila2=oci_fetch_array($validar_Exist,OCI_BOTH);
            $existe2=oci_num_rows($validar_Exist) */;
		
		
	$insert_admin=sql("insert into administrador (admin_cedula,admin_login,admin_contrasena ,admin_resp_secreta ,admin_nombre ,admin_apellido,admin_status,admin_fk_id_pre) VALUES (admin_cedula,'admin_login','admin_contrasena','admin_res_secreta','admin_nombre','admin_apellido','Activo',1)");
	

	 
	
	
	
	?>
	</fieldset>


<table align="center">
	<tr>
	
		<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=../../index.html"> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! Debera esperar a que el Administrador del Sitio active su cuenta! </strong></p>
			<p align="center" class="Estilo1"><strong>Por favor tome en cuenta su password: <?PHP  echo " $password"; ?>  puede conservarlo o cambiar el mismo en su menu al iniciar sesion.</strong></p>
            <p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='../../index.html' class="Estilo1"></br>Regresar al Menu Principal</a></p>
           
			<?PHP
			
			?>
	</tr>
	<?PHP
		}

?>




</table>
</form>
<?PHP
require_once("../Contenedores/footer.php");
?>