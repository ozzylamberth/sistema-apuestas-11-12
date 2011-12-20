


<?PHP
/** 
*
* @Lista de Eventos caducados y sus ganadores
* 
* @autor: Eleany Garcia
* Página que lista los eventos ya finalizados y su ganador o ganadores
*
*/


//session_start();
include_once ("../controladores/controlEvento.php");


?>

          <h2--><style type="text/css">
<!--
body {
        background-image: url(../Imagenes/fondo.jpg);
}
-->
</style>
          
 <form name="form1" method="post" action="../controladores/ControlEvento.php">
            <p align="left" ><strong>Seleccione Evento</strong>:
             
  
  
 
  
  
  <select name="eve" class="gh" id="eve">
              <option value="0">Seleccione </option>
  <?php foreach ($eventos as $clave=>$valor): ?>
                <option value="<?php echo $valor["id"] ?>" > <?php echo $valor["nombre"]?></option>
  <?php endforeach; ?>
  </select>
              
              
            <p class="Estilo1 Estilo3">
                
              <input name="Buscar" type="submit" class="botn" id="Buscar" value="Buscar">

   
<?php  if($eve_id):?>   

    
        <p align="center">
        <strong>  
                        Evento: <?php  echo $eve_nombre?> 
                </strong>
    </p>
        <p align="center" >
        <strong> 
                Fecha: <?php echo $eve_fecha?>
                </strong>
    </p>
        <p align="center" >
        <strong>
                Nro de Ganadores: <?php echo $eve_nro_gan?>
        </strong>
    </p>

        <p align="center" >
        <strong>
                Tipo de Pago: <?php echo $eve_tipo_pago?>
        </strong>
    </p>


    <table width="600" border="1" align="center">
        <tr>
          <th scope="col" colspan="3"> Participantes </th> 
       </tr>
        
    <?php foreach($participantes_eve as $clave=>$valor):?>

        <tr>
          <td width="200" scope="col"> <?php echo $valor['par_nombre']; ?> </td> 
          <td width="200" scope="col"> <?php echo $valor['pe_top_apuesta']  ?>  </td> 
          <td width="200" scope="col"> <?php echo $valor['pe_tipo_pago'] ?> </td> 
        </tr>    

  <?php endforeach; ?>
    
     </table>
<?php endif; ?>

</form>
