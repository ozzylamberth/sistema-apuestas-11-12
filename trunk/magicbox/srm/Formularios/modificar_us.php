    <script>
function validaSubmite(){


if (document.consulta.admin_login.value == false )
		alert("Debe Ingresar el login") 
else if (document.consulta.admin_contrasena.value == false )
		alert("Debe Ingresar Contrasena")
else if (document.consulta.admin_nombre.value == false )
		alert("Debe Ingresar Nombre")
else if (document.consulta.admin_apellido.value == false )
		alert("Debe Ingresar Apellido")
else if (document.consulta.admin_cedula.value == false )
		alert("Debe Ingresar La Cedula")

else
       document.consulta.submit()
		
}</script>

<?PHP

/** 
*
* @Lista de administradores para su modificacion de administradores
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de los administradores para su modificacion
*
*/


session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>

    <?php

  $admin_login='';
  $admin_contrasena ='';
  $admin_status='';
  $admin_nombre='';
  $admin_apellido='';
  $admin_cedula=0;
  
  
  
  

  
  
  
  

    $selec_admin= sql("SELECT admin_cedula FROM administrador ORDER BY admin_cedula");

?>
<form action="" method="post" name="formId" id="formId">
  <select name="admin_cedula1" id="admin_cedula1">
    <option value="0">Seleccione </option>
    <?php  
	while ($rows=oci_fetch_array($selec_admin,OCI_BOTH))
	{?>
    <option value="<?php echo $rows["ADMIN_CEDULA"] ?>" > <?php echo $rows["ADMIN_CEDULA"]?></option>
    <?php  } ?>
  </select>
  <?php
  
  if(isset($_POST['admin_cedula1'])) //$_GET si se hace por GET (url)
      $admin_cedula = $_POST['admin_cedula1']; //Te devolveria el atributo value del option seleccionado
    ?>
        <p>
          <input type="submit" name="Submit" value="Buscar" />
        </p>
</form>

     <?php 
      $selec_Admin=sql("SELECT admin_status, admin_nombre, admin_login, admin_contrasena, admin_apellido FROM administrador WHERE admin_cedula= '$admin_cedula'");
          
	 While($fila=oci_fetch_array($selec_Admin,OCI_BOTH))
	   {
	   $admin_login = $fila['ADMIN_LOGIN'];
	   $admin_contrasena = $fila['ADMIN_CONTRASENA'];
	   $admin_nombre = $fila['ADMIN_NOMBRE'];
       $admin_apellido = $fila['ADMIN_APELLIDO'];
	   $admin_status = $fila['ADMIN_STATUS'];
       }
	 
     ?>

	
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar al siguente Administrador :</legend>
                
        <p>
          <label>Login:
            <?php echo $admin_login ; ?>
          </label>
        </p>
       <p>
          <label>Contrasena:
            <input type="password" name="contrasena" id="contrasena" value="<?php echo $admin_contrasena;?>">

          </label>
        </p>
      
        <p>
          <label>Nombre:
            <?php echo $admin_nombre ; ?>
          </label>
            
        </p>
        
          <p>
          <label>Apellido:
            <?php echo $admin_apellido ; ?>
          </label>
            
        </p>
        
        <p>
          <label>Status:
            <?php echo $admin_status ; ?>
          </label>
            
        </p>
  </fieldset>
</form>


   <?php if ($admin_cedula!=0){?>
<form id="consulta" name="consulta" method="post" action= "modificar_us2.php">
  <fieldset>
    <legend>Ingrese los Nuevos Datos:</legend>
   
    <p>
    <input type="hidden" name="admin_cedula" Id="admin_cedula" value="<?php echo $admin_cedula?>"/>
      <label>Login:
        <input name="admin_login" type="text" id="admin_login" maxlength="15" />
      </label>
    </p>
    <p>
      <label>Contrasena: </label>
      <input type="text" name="admin_contrasena" id="admin_contrasena"  maxlength="20"/>
    </p>
   
    <p>
      <label>Nombre: </label>
      <input type="text" name="admin_nombre" id="admin_nombre"  maxlength="45"/>
    </p>
    <p>
      <label>Apellido: </label>
      <input type="text" name="admin_apellido" id="admin_apellido"  maxlength="45"/>
    </p>
    
    <p>
      <label>Status: </label>
      <input type="text" name="admin_status" id="admin_status"  maxlength="45"/>
    </p>
    
    <p>
      <input type="button" name="enviar" id="enviar" value="Modificar" onClick="validaSubmite()"/>
      <input type="reset" name="limpiar" id="limpiar" value=" Limpiar" />
    </p>
    <div align="center">
      </label>
    </div>

  </fieldset>

</form>


<?php } ?>
</body>
