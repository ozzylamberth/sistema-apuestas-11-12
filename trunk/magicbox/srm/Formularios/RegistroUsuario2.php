<?php
include_once ("../DataConexion/conexion.php");
include_once ("../DataConexion/guardarXmlAdmin.php");

//muestra los datos consultados de acuerdo a la opci�n
$admin_cedula =$_POST['admin_cedula'];
$admin_apellido=$_POST['admin_apellido'];
$admin_nombre=$_POST['admin_nombre'];
$admin_login= $_POST['admin_login'];
$admin_contrasena= $_POST['admin_contrasena'];
$pre_des= $_POST['pre_desc'];
$admin_resp_secreta= $_POST['admin_resp_secreta'];

require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');

?>
		<head>
	
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		<title>
		<strong>Registro de Casa De Apuesta</strong>
		</title>
		
		</head>

                 <body>

<form action="" name=""  id="" method="post">

<fieldset>
<legend><strong> Registro Realizado </strong></legend>

<!--        AQUI  LO QUE DEBERIA DE IR EN EL INSERT A LA BD     -->	
	<?php
	
	    $selec_Preid= sql("select pre_id from pregunta_secreta where pre_des LIKE '$pre_des'");
    	 $filas=oci_fetch_array($selec_Preid,OCI_BOTH);
	    $pre_id= $filas['PRE_ID'];
	
		
		
		
	     $validar_Existencia=sql("select * from administrador where admin_cedula = $admin_cedula");
         $fila=oci_fetch_array($validar_Existencia,OCI_BOTH);
		  $filas=oci_num_rows($validar_Existencia);
		 
         if ($filas > 0)
		{
		$log->error("Esta agregando un administrador que ya existe"); 
		echo "El administrador ya existe, verifica cuidadosamente la informacion e intenta nuevamente";
		?>
		<td colspan="3"><a href="RegistroUsuario.php"><h5 align="center">Continuar</h5></a></td>
		
		
		<?PHP
			exit(0);
		}
		else
		{ 
		
		$insertar_Cat= sql("insert into administrador (admin_cedula, admin_login,admin_contrasena, admin_resp_secreta, admin_nombre,admin_apellido,admin_status,admin_fk_id_pre) values ('$admin_cedula','$admin_login','$admin_contrasena','$admin_resp_secreta','$admin_nombre','$admin_apellido','Activo','$pre_id')");
      
	   
	    guardarXml();
		
		?>
	</fieldset>


<table align="center">
	<tr>
	
		<!---META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head--> 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='/magicbox/MenuOperativo2.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
      
	</tr>
	<?PHP
		} 

?>	



</form>
<?PHP
require_once("../Contenedores/footer.php");
?>