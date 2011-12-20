<?PHP

/** 
*
* @Lista de Categorias existentes
* 
* @autor: Irene Soto
* Página que lista las distintas categorias y su informacion para fines del administrador
*
*/

include_once ("../controladores/ControlListarCat.php");

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
	
<p align="center" class="Estilo1"><strong>Lista de Categor&iacute;as</strong></p>
   

  
 
<table width="300" border="1" align="center">
   <tr class="nn">
       <td width="200">Nombre</td>
   </tr>
</table>
 
<table width="300" border="1" align="center">
         <?php foreach($categorias as $clave=>$valor):?>
        <tr>
           <td width="200" scope="col"> <?php echo $valor['cat_nombre']; ?> </td> 
        </tr>    

  <?php endforeach; ?>
    
      </table>
    

 
 
<center><p><?php  echo "<a href='Home.php'> Continuar </a> "; ?></p>
  <p><img src="../Imagenes/ClasicosFutbol.gif" width="814" height="97" alt="cf"></p>
</center>
</p>


