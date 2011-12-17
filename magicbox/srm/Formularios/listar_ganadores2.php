<?PHP

/** 
*
* @Lista de eventos existentes
* 
* @autor: Irene Soto
* Página que lista los distintos eventos y su informacion para fines del administrador
*
*/

session_start();
include_once("../DataConexion/conexion.php");

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
<?php
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_gan=0;
        $selec_nom_eve= sql("select eve_nombre from evento WHERE eve_status LIKE 'Inactivo'");
  ?>
              </p>
            <p>
              <select name="eve" class="gh" id="eve">
                <option value="0">Seleccione </option>
                <?PHP
        while ($roweve=oci_fetch_array($selec_nom_eve,OCI_BOTH)){?>
                
                <option value="<?php echo $roweve["EVE_NOMBRE"] ?>" > <?php echo $roweve["EVE_NOMBRE"]?></option>
                <?php  } ?>
              </select>
              
              <?PHP
    if(isset($_POST['eve'])) 
    $eve_nombre = $_POST['eve']; //Te devolveria el atributo value del option seleccionado
	?>
          </p>
            <p>
              <input name="Buscar" type="submit" class="rem" id="Buscar" value="Buscar">
            </p></td>
    <td>&nbsp;</td>
  </tr>
</table></center>

</form>

 
  <?PHP  
      $selec_Id_Eve= sql("SELECT EVE_ID, EVE_NRO_GAN, EVE_FECHA FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	  
	  While($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   {	
	      $eve_id= $roweve2['EVE_ID'];
          $eve_nro_gan = $roweve2['EVE_NRO_GAN'];
		  $eve_fecha = $roweve2['EVE_FECHA'];
       }
	   
	   ?>
  	 
 
<?php
		if ($eve_nombre !='' )
		{ ?>
<form id="formAdmin" name="formAdmin" method="post" action="">
   
     <?php 
	 
	 $selec_Id_Par= sql("SELECT P.PAR_NOMBRE FROM RES_PAR RP, EVENTO E, PARTICIPANTE P WHERE RP.RP_FK_PAR_ID=P.PAR_ID AND RP.RP_FK_EVE_ID=E.EVE_ID AND E.EVE_ID=".$eve_id);
	   
	?>
    
 <p align="center"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" ><strong> Fecha: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" ><strong>Nro de Ganadores: <?php echo $eve_nro_gan?></strong></p>
 <table width="200" border="1" align="center">
   <tr>
    <td  align="center" width="200">NOMBRES</td>
    
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($selec_Id_Par,OCI_BOTH)){
               $par_nombre = $row['PAR_NOMBRE']; 
		
	     ?>
 
</table>
 
      <table width="200" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>  
<p>
  <?php }?>
  </h2>
</p>
<p><img src="../Imagenes/ganadores.gif" width="1037" height="100" alt="rrr"> </p>
