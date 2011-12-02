<?php

session_start();

include_once ("../DataConexion/conexion.php");
/* session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php'); */
 $eve_nombre= $_POST['eve_nombre'];
              
 require 'php/Logger.php';
// Tell log4php to use our configuration file.
Logger::configure('php/log4conf.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Sistema_de_Apuestas');
 
    
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
		
		<title>
		<strong>Asignar Ganadores</strong>
		</title>
		
		</head>

        <body>

	    <p>
	
        </p>
	    <form action="eventos3.php" method="post" name="unganador">
        
        <?php 
		
		
		$selec_Par= sql("SELECT eve_nro_gan FROM evento WHERE eve_nombre LIKE '$eve_nombre'");
		     $rowpar=oci_fetch_array($selec_Par,OCI_BOTH);
			 $eve_nro_gan= $rowpar["EVE_NRO_GAN"];
			
		?>
        
        <p><strong>Seleccione los participantes ganadores y presione agregar </strong></p>
    	  <table align="center" border="0" width="900">
			<tr>
				<td width="500" height="137" align='center'><p>
				  <select name="par_nombre" id="par_nombre" >
				    <option value="0">Seleccione </option>
				    <?PHP
		       $selec_Gan = sql("SELECT p.par_nombre FROM participante p, par_eve pe, evento e WHERE p.par_id=pe.pe_fk_par_id AND e.eve_id=pe.pe_fk_eve_id AND e.eve_nombre LIKE '$eve_nombre'");
	 
		         while ($rows=oci_fetch_array($selec_Gan,OCI_BOTH))
				  {
					 echo $rows["PAR_NOMBRE"]?>
				    <option value="<?php echo $rows["PAR_NOMBRE"]?>" > <?php echo $rows["PAR_NOMBRE"]?></option>
				    <?php  
				 }        
                ?>
			      </select>
				    
			      <input name="nro_Ganadores" type="hidden" value="<?php echo $eve_nro_gan?>">
			      
			      <input type="button" name="Agregar" id="Agregar" value="Agregar" onClick="javascript:agregarParticipante('<?php echo $eve_nro_gan?>')">
			      <br> 
			      </br>
			      <?php 
			$nro_Gan=1;
            while ($nro_Gan <= $eve_nro_gan)
            {
           
			    echo $nro_Gan?>
			      <input name="<?php echo $nro_Gan ?>" id="<?php echo $nro_Gan ?>"  type="hidden" maxlength="20">
			      <input name="Participante_<?php echo $nro_Gan ?>2" id="Participante_<?php echo $nro_Gan ?>" type="text" maxlength="20">
			      <input name="Participante_<?php echo $nro_Gan ?>" type="hidden" value="Participante_<?php echo $nro_Gan ?>">
				    
			      <br> 
			      </br>
				    
			      <?php $nro_Gan++; 
		    	}?>
				    
				    
				    
			      </strong></p>
				    
			      </p>
				  <p>
			    <input type="submit" align='center' name="continuar" id="button2" value="continuar">
			  </p></td>
		 	 </tr>
			</table>
		
</form>
	
	 <?PHP
require_once("../Contenedores/footer.php");
?>
	