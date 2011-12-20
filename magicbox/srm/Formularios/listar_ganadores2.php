<?PHP

/** 
*
* @Lista de eventos existentes
* 
* @autor: Eleany Garcia
* Página que lista los distintos eventos y su informacion para fines del administrador
*
*/

include_once('../controladores/controlListarGanadores.php');

?>

<style type="text/css">
<!--
body,td,th {
	font-family: "Comic Sans MS", cursive;
	color: #000;
	font-size: 14px;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #800;
	font-size: x-large;
	text-align: center;
}
.kk {
	color: #000;
}
#formAdmin p strong {
	font-size: 14px;
}
#formAdmin p strong {
	color: #000;
}
.hhh {
	font-size: large;
	color: #800;
}
.hhh strong {
	color: #800;
}
#formAdmin p strong {
	color: #800;
}
.rem {
	color: #800;
}
-->
</style><body bgcolor="white">
	
  <form name="form1" method="post" action="">
    <center> <table width="500" border="0">
  <tr>
     <td width="300"><p><span class="hhh"><strong>Seleccione Evento</strong>:</span>

              </p>
            <p>
              <select name="eve" class="gh" id="eve">
                <option value="0">Seleccione </option>
                <?php foreach ($eventos as $clave=>$valor): ?>
                <option value="<?php echo $valor["eve_id"] ?>" > <?php echo $valor["eve_nombre"]?></option>
                <?php endforeach; ?>
              </select>
            </p>
            <p>
              <input name="Buscar" type="submit" class="rem" id="Buscar" value="Buscar">
            </p></td>
    <td>&nbsp;</td>
  </tr>
</table></center>

</form>
  	 
 

		<?php  if($eve_id):?> 
		
<form id="formAdmin" name="formAdmin" method="post" action="">
   
    
 <p align="center"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" ><strong> Fecha: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" ><strong>Nro de Ganadores: <?php echo $eve_nro_gan?></strong></p>
 <table width="200" border="1" align="center">
   <tr>
    <td  align="center" width="200">NOMBRES</td>
    
 
  <?php foreach($ganadores_eve as $clave=>$valor):?>

        <tr>
          <th width="200" scope="col"> <?php echo $valor['par_nombre']; ?> </th> 
        </tr>
        <?php endforeach; ?>
        
      </table>
    

<?php endif; ?>
</form>  
<p>
 
  </h2>
</p>
<p><img src="../Imagenes/ganadores.gif" width="1037" height="100" alt="rrr"> </p>
