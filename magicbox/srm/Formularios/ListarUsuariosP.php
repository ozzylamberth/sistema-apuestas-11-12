<?php

/** 
*
* @Lista de administradores existentes
* 
* @autor: Irene Soto
* Página que lista los distintos administradores y su informacion (datos personales,status,etc) para fines del administrador
*
*/


include_once ("../Controladores/ControlListarUsuarios.php");
?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #700;
	font-size: x-large;
}
.mm {
	color: #000;
}
-->
</style><body bgcolor="white">
	<p align="center" class="Estilo1 Estilo1"><strong></strong></p>
	

<body bgcolor="white">
	
<p align="center" class="Estilo1"><strong>Lista de Administradores</strong></p>
   

<table width="800" border="1" align="center">
  <tr class="mm">
    <td width="200">Cedula</td>
    <td width="200">Nombre</td>
    <td width="200">Apellido</td>
    <td width="200">Login</td>
    <td width="200">Status</td>
    
   </tr>
   
      <?php foreach($lista_usu as $clave=>$valor):?>
        <tr>
          <th width="200" scope="col"> <?php  echo $valor['admin_cedula']; ?></th>
          <th width="200" scope="col"> <?php echo $valor['admin_nombre']; ?> </th>  
          <th width="200" scope="col"> <?php  echo $valor['admin_apellido']; ?></th>
          <th width="200" scope="col"> <?php echo $valor['admin_login']; ?> </th>
          <th width="200" scope="col"> <?php  echo $valor['admin_status']; ?></th>
        </tr>
        <?php endforeach; ?>
      </table>
    

 
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p></center>
</p>


