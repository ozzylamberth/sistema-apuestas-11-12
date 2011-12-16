<?PHP

/** 
*
* @Lista de Categorias existentes
* 
* @autor: Irene Soto
* Página que lista las distintas categorias y su informacion para fines del administrador
*
*/

session_start();
include_once("../DataConexion/conexion.php");

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
.nn {
	color: #000;
}
-->
</style><body bgcolor="white">
	
<p align="center" class="Estilo1"><strong>Lista de Categorias</strong></p>
   

   <?php 
	$queryListaCat = sql("SELECT * FROM categoria");
	
	?>
 
<table width="300" border="1" align="center">
  <tr class="nn">
    <td width="100">Id</td>
    <td width="200">Nombre</td>
   </tr>
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($queryListaCat,OCI_BOTH)){
	           $cat_id = $row['CAT_ID'];
               $cat_nombre = $row['CAT_NOMBRE']; 
	     ?>
 
</table>
 
      <table width="300" border="1" align="center">
        <tr>
          <th width="100" scope="col"> <?php  echo $cat_id; ?></th>
          <th width="200" scope="col"> <?php echo $cat_nombre; ?> </th>  
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p>
  <p><img src="../Imagenes/ClasicosFutbol.gif" width="814" height="97" alt="cf"></p>
</center>
</p>


