<?php

session_start();

include_once ("../DataConexion/conexion.php");

$eve_nro_gan=0; 
 require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
 
     /*  VALIDACION DE LA FECHA   
	 
	 if ($fecha<$fecha_Evento){
		      echo "<script language='javascript'>
              window.location='casa_apuesta.php';			
	          </script>";
	
			
		} */
 ?>



<head>


    <script>
		 function validaSubmite(){
			if (document.eventos2.nro_Resultados.value == null)
				alert("La tabla de resultados ni puede tener mas ganadores que participantes")
			else
     			document.eventos2.submit()
			}
    </script>
    
    
    
        
        <script language="JavaScript">
            function acceptNum(e)
			{
				var tecla;
				tecla = (document.all) ? e.keyCode : e.which;
			if(tecla == 8)
				{return true;}
				var patron;
				//patron = /[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUV WXYZ0123456789]/
				patron = /\d/; //solo acepta numeros
				var te;
				te = String.fromCharCode(tecla);
				return patron.test(te);
			}
			
			function agregarParticipante(nro_participantes)
			{
				var part=document.getElementById('par_nombre').value;
				var i=1;
				
				if(part==0)
					alert('debe escoger a un participante');
				else
				{
						while(i<=nro_participantes)
						{
							var nombre='Participante_'+i;

							if(document.getElementById(nombre).value==part)
							{
									alert('No se puede agregar el mismo participante dos veces!');
									break;
							}
							else
							{
								if(document.getElementById(nombre).value=='')
								{    								
									document.getElementById(i).value=part;
									document.getElementById(nombre).value=part;
									break;
								}
								
							}
							i++;
						}
				}
			}
		</script>
        
</head>


		<head>
       <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        </style>
		
		
		
		</head>

        <body>

	    <form action="eventos3.php" method="post" name="unganador">
       
    	  <table align="center" border="0" width="900">
			<tr>
				<td width="500" height="137" align='center'><p><strong>Seleccione Evento:    
				   
                    <select name="Evento" id="Evento">
                    
			    	  <option value="0">Seleccione</option>
                       
				   <?php 
	 	              $select_EVE= sql("SELECT EVE_NOMBRE FROM EVENTO WHERE EVE_STATUS LIKE 'Activo'");
		               
                      while ($rows=oci_fetch_array($select_EVE,OCI_BOTH))
				 {
					 echo $rows["EVE_NOMBRE"]?>
		             <option value="<?php echo $rows["EVE_NOMBRE"]?>" selected > <?php echo $rows["EVE_NOMBRE"]?></option>
                     
		          <?php  
				 }        
                  ?>
                
                 <?php
  
                if(isset($_POST['Evento'])) //$_GET si se hace por GET (url)
                $eve_nombre = $_POST['Evento']; //Te devolveria el atributo value del option seleccionado
                  ?>
                  
   			    </select> 
			</strong>
         </p>
			  
		<select name="par_nombre" id="par_nombre" >
		        <option value="0">Seleccione </option>
		        <?PHP 
				$select_IdEvento= sql("Select eve_id, eve_nro_gan FROM evento WHERE eve_id LIKE '$eve_nombre'");
				 while ($rowIdE=oci_fetch_array($selec_IdEvento,OCI_BOTH))
				 {
					 $eve_id=$rowIdE["EVE_ID"];
					 $eve_nro_gan=$rowIdE["EVE_NRO_GAN"];
				 }
					 
				
		        $selec_Gannom = sql("select p.par_nombre FROM participante p, par_eve pe, evento e WHERE p.par_id=pe.pe_fk_par_id AND e.eve_id=pe.pe_fk_eve_id AND e.eve_id=".$eve_id);
	 
		         while ($rowgan=oci_fetch_array($selec_GAnnom,OCI_BOTH))
				 {
					 echo $rowgan["PAR_NOMBRE"]?>
		             <option value="<?php echo $rows["PAR_NOMBRE"]?>" > <?php echo $rows["PAR_NOMBRE"]?></option>
		        <?php  
				}        
                ?>
	     </select>
			  
              <input name="nro_Ganadores" type="hidden" value="<?php echo $eve_nro_gan?>">
              <input name="eve_id" type="hidden" value="<?php echo $eve_id?>"> 
              <input type="button" name="Agregar" id="Agregar" value="Agregar" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')">
              <br> </br>
		    <?php 
			$nro_gan=1;
            while ($nro_gan <= $eve_nro_gan)
            {
           
			    echo $nro_gan?>
		        <input name="<?php echo $nro_gan ?>" id="<?php echo $nro_gan ?>"  type="hidden" maxlength="20">
		        <input name="Ganador_<?php echo $nro_gan ?>2" id="Ganador_<?php echo $nro_gan ?>" type="text" maxlength="20">
		        <input name="Ganador_<?php echo $nro_gan ?>" type="hidden" value="Ganador_<?php echo $nro_gan ?>">
              
		      <br> </br>
			    
	     	    <?php $nro_gan++; 
		    	}?>
			    
			    
			    
		      </strong></p>
		   
			  <p>
			    <input type="submit" align='center' name="continuar" id="button2" value="continuar">
			  </p></td>
	 	    </tr>
		  </table>
		
</form>
	 <p>&nbsp;</p>
	    
        
        
	    <p>&nbsp;</p>
	    <tr> </tr>

</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
	