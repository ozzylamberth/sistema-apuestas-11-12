<?PHP

/** 
*
* @Eliminarcion de Administradores(usuarios)
* 
* @autor: Eleany Garcia
* Página de eliminacion de administradores contiene la información de los distintos administradores que se pueden eliminar
*
*/

session_start();
include_once("../DataConexion/conexion.php");


?>

<body bgcolor="white">
 <?php
$admin_nombre='';
$admin_cedula=0;
$admin_status='';
$admin_login='';
$admin_apellido='';

        $selec_Adm= sql("select admin_nombre from administrador");
?>
    
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
<p align="center" class="Estilo1"><strong>Eliminar</strong></p>
<tr><br>
<p align="center" class="Estilo1 Estilo3"><strong>Seleccione Administrador</strong></p>

<form name="form1" method="post" action="">
  
    <select name="admin" id="admin">
    <option value="0">Seleccione </option>
      <?PHP
  while ($rowad=oci_fetch_array($selec_Adm,OCI_BOTH)){?>
      
      <option value="<?php echo $rowad["ADMIN_NOMBRE"] ?>" > <?php echo $rowad["ADMIN_NOMBRE"]?></option>
      <?php  } ?>
    </select>
    
    <?PHP
  if(isset($_POST['admin'])) 
    $admin_nombre = $_POST['admin']; //Te devolveria el atributo value del option seleccionado
	?>
    
  </p>
  <p class="Estilo1 Estilo3">

      <input type="submit" name="Buscar" id="Buscar">
 </p>
 </form>
 
    <?PHP  
$selec_Adm1= sql("SELECT ADMIN_CEDULA, ADMIN_NOMBRE, ADMIN_STATUS, ADMIN_APELLIDO, ADMIN_LOGIN FROM ADMINISTRADOR WHERE ADMIN_NOMBRE LIKE '$admin_nombre'");

  While($rowad1=oci_fetch_array($selec_Adm1,OCI_BOTH)){	
  $admin_cedula = $rowad1['ADMIN_CEDULA'];
  $admin_nombre = $rowad1['ADMIN_NOMBRE'];
  $admin_status = $rowad1['ADMIN_STATUS'];
  $admin_apellido = $rowad1['ADMIN_APELLIDO'];
  $admin_login = $rowad1['ADMIN_LOGIN'];
  }

?>
  


<p align="center" class="Estilo1 Estilo3">&nbsp;</p>
  <form id="formAdmin" name="formAdmin" method="post" action="eliminar_us2.php">
  
  
    <fieldset>
      <legend></legend>
      <table width="485" height="65" border="1" align="center">
        <tr>
          <th scope="col"><legend>Datos del Administrador a Eliminar :</legend>
            <input type="hidden" name="ADMIN_CEDULA" id="ADMIN_CEDULA" value="<?php echo $admin_cedula ?>"/>
            <p>
              <label>Cedula : <?php echo $admin_cedula; ?> </label>
            </p>
            <p>
              <label>Nombre: <?php echo $admin_nombre ; ?> </label>
            </p>
            <p>
              <label>Apellido: <?php echo $admin_apellido ; ?> </label>
            </p>
            <p>
              <label>Login: <?php echo $admin_login ; ?> </label>
            </p>
            <p>
              <label>Status: <?php echo $admin_status; ?> </label>
            </p>
           
              <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar" />
            </p></th>
        </tr>
      </table>
    </fieldset>
</form>





