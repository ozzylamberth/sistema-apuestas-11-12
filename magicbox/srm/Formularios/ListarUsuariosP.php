<?php

/** 
*
* @Lista de administradores existentes
* 
* @autor: Irene Soto
* Página que lista los distintos administradores y su informacion (datos personales,status,etc) para fines del administrador
*
*/

session_start();
include_once ("../DataConexion/conexion.php");
?>

<body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<body bgcolor="white">
	
<p align="center" class="Estilo1"><strong>Lista de Administradores</strong></p>
   

   <?php 
	$queryListaAdm = sql("SELECT * FROM administrador");
	
	?>
 
<table width="800" border="1" align="center">
  <tr>
    <td width="200">Cedula</td>
    <td width="200">Nombre</td>
    <td width="200">Apellido</td>
    <td width="200">Login</td>
    <td width="200">Status</td>
    
   </tr>
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($queryListaAdm,OCI_BOTH)){
	           $admin_cedula = $row['ADMIN_CEDULA'];
               $admin_nombre = $row['ADMIN_NOMBRE'];
			   $admin_apellido = $row['ADMIN_APELLIDO']; 
			   $admin_login = $row['ADMIN_LOGIN']; 
			   $admin_status = $row['ADMIN_STATUS']; 
	     ?>
 
</table>
 
      <table width="800" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php  echo $admin_cedula; ?></th>
          <th width="200" scope="col"> <?php echo $admin_nombre; ?> </th>  
          <th width="200" scope="col"> <?php  echo $admin_apellido; ?></th>
          <th width="200" scope="col"> <?php echo $admin_login; ?> </th>
          <th width="200" scope="col"> <?php  echo $admin_status; ?></th>
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p></center>
</p>


