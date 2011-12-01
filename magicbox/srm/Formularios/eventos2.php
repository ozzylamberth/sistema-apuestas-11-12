<?php

session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
/* session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php'); */
 $cat_Nombre= $_POST["cat_Nombre"];
 $desc_Evento= $_POST["desc_Evento"];
 $fecha_Evento= $_POST["fecha_Evento"];
$fecha= $_POST['Fecha'];
 if(isset($_POST['tipo_Ganador'])) $tipo_Ganador= $_POST['tipo_Ganador'];
 $nro_Participantes= $_POST["nro_Participantes"];
 
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
				var part_nombre=document.getElementById('par_nombre').options[document.getElementById('par_nombre').selectedIndex].text;
				var i=1;
				
				
				if(part==0)
					alert('debe escoger a un participante');
				else
				{
						while(i<=nro_participantes)
						{
							var nombre='Participante_'+i;
							var id='Id_'+i;

							if(document.getElementById(nombre).value==part_nombre)
							{
									alert('No se puede agregar el mismo participante dos veces!');
									break;
							}
							else
							{
								if(document.getElementById(nombre).value=='')
								{    								
									document.getElementById(id).value=part;
									document.getElementById(nombre).value=part_nombre;
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
		<strong>Registro de Categoria</strong>
		</title>
		
		</head>

        <body>

	    <p>
	      <?php 
	 	$select_Id_Cat= sql("SELECT CAT_ID FROM CATEGORIA WHERE CAT_NOMBRE LIKE '$cat_Nombre'");
	 
	 	$filas=oci_fetch_array($select_Id_Cat,OCI_BOTH);
	 	$cat_Id= $filas["CAT_ID"];
	
		if ($tipo_Ganador==='un_Ganador') {
		
	?>
        </p>
	    <form action="eventos3.php" method="post" name="unganador">
        <p><strong>Seleccione los participantes y presione agregar (en caso de no existir agreguelos)</strong></p>
    	  <table align="center" border="0" width="900">
			<tr>
				<td width="500" height="137" align='center'><p><strong>Seleccione Tipo De Pago:    
				    <select name="tipo_Pago" id="tipo_Pago">
			    	  <option value="0">Seleccione</option>
			      	  <option value="1">1:1</option>
			      	  <option value="2">2:1</option>
			      	  <option value="3">3:1</option>
			      	  <option value="4">4:1</option>
                      <option value="5">5:1</option>
                      <option value="6">6:1</option>
                      <option value="7">7:1</option>
                      <option value="8">8:1</option>
                      <option value="9">9:1</option>
                      <option value="10">10:1</option>
                
   			    </select> 
			</strong>
         </p>
			  
		<select name="par_nombre" id="par_nombre" >
		        <option value="0">Seleccione </option>
		        <?PHP
		        $selec_Parnom = sql("select par_nombre, par_id from participante");
	 
	 			print_r($select_Parnom);
		         while ($rows=oci_fetch_array($selec_Parnom,OCI_BOTH))
				 {
					 
					 echo $rows["PAR_NOMBRE"]?>
		             <option value="<?php echo $rows["PAR_ID"]?>" > <?php echo $rows["PAR_NOMBRE"]?></option>
		        <?php  
				}        
                ?>
	     </select>
			  
              <input name="nro_Participantes" type="hidden" value="<?php echo $nro_Participantes?>">
              <input name="tipo_Ganador" type="hidden" value="<?php echo $tipo_Ganador?>"> 
              <input name="fecha_Evento" type="hidden" value="<?php echo $fecha_Evento?>"> 
              <input name="desc_Evento" type="hidden" value="<?php echo $desc_Evento?>">
              <input name="cat_Id" type="hidden" value="<?php echo $cat_Id?>">
              <input type="button" name="Agregar" id="Agregar" value="Agregar" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')">
              <br> </br>
		    <?php 
			$nro_Part=1;
            while ($nro_Part <=  $nro_Participantes)
            {
           
			    echo $nro_Part?>
		        <input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
                   <input name="Participante_<?php echo $nro_Part ?>" id="Participante_<?php echo $nro_Part ?>" type="text" maxlength="20">
		        <!--input name="Participante_<?php echo $nro_Part ?>" type="hidden" value="Participante_<?php echo $nro_Part ?>"-->
              
		      <br> </br>
			    
	     	    <?php $nro_Part++; 
		    	}?>
			    
			    
			    
		      </strong></p>
		   
			  <p>
			    <input type="submit" align='center' name="continuar" id="button2" value="continuar">
			  </p></td>
		 	 </tr>
			</table>
		
</form>
	 <p>
	<?php 	
	} 
	if ($tipo_Ganador==='tabla_Resultados'){   
	?>
    </p>
	    <form name="eventos2" id= "eventos2" method="post" action="eventos3.php">
	      <table align="center" border="0" width="900">
	        <tr>
	          <td width="500" align='center'><p><strong> Ingrese el Nro de resultados:
	            </select>
	            <input type="text" name="nro_Resultados" id="nro_Resultados" onKeyPress="return acceptNum(event)">
	            </strong> </p>
	            <p>
	              <select name="par_nombre" id="par_nombre" >
	               <option value="0">Seleccione </option>
	              <?PHP
					$selec_Parnom = sql("select par_nombre,par_id from participante");
	  				 while ($rows=oci_fetch_array($selec_Parnom,OCI_BOTH))
		             {			
	                 echo $rows["PAR_NOMBRE"]?>
	                <option value="<?php echo $rows["PAR_ID"]?>" > <?php echo $rows["PAR_NOMBRE"]?></option>
	                <?php  
					}
					?>
                    
                  </select>
                  
	              <input name="nro_Participantes2" id="nro_Participantes2" type="hidden" value="<?php echo $nro_Participantes?>">
	              <input name="tipo_Ganador2" type="hidden" value="<?php echo $tipo_Ganador?>">
	              <input name="fecha_Evento2" type="hidden" value="<?php echo $fecha_Evento?>">
	              <input name="desc_Evento2" type="hidden" value="<?php echo $desc_Evento?>">
	              <input name="cat_Id2" type="hidden" value="<?php echo $cat_Id?>">
	              <input type="button" name="Agregar2" id="Agregar2" value="Agregar" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')">
	              </strong></p>
	            <p>
                <strong><br/>
                </p>
	            
                <p>
	              <?php
			      $nro_Part2=1;
                  while ($nro_Part2 <=  $nro_Participantes){
                  echo $nro_Part2 ?>
	              <input name="<?php echo $nro_Part2 ?>" id="Id_<?php echo $nro_Part2 ?>"  type="hidden" maxlength="20">
	              <input name="Participante_<?php echo $nro_Part2 ?>" id="Participante_<?php echo $nro_Part2 ?>" type="text" maxlength="20">
	              <label>
	              <select name="tipo_Pago_<?php echo $nro_Part2 ?>" id="tipo_Pago_<?php echo $nro_Part2 ?>">
	                  <option value="1">2:1</option>
	                  <option value="2">1:1</option>
	                  <option value="3">3:1</option>
	                  <option value="4">4:1</option>
	                  <option value="5">5:1</option>
	                  <option value="6">6:1</option>
	                  <option value="7">7:1</option>
	                  <option value="8">8:1</option>
	                  <option value="9">9:1</option>
	                  <option value="10">10:1</option>
                    </select>
                  </label>
	              <label>
	                <input type="text" name="tope_Apuesta_<?php echo $nro_Part2 ?>" id="tope_Apuesta_<?php echo $nro_Part2 ?>">
                  </label>
	              <br>
	              </br>
	              <?php 
				  $nro_Part2++; 
			    }
				   ?>
                </p>
	            <p>
	              <input type="button" align='center' name="button" id="button" value="continuar" onClick="validaSubmite()">
	            </p>
                </td>
            </tr>
          </table>
        </form>
        
        
	    <p>&nbsp;</p>
	    <?php 	
	    }	
	    ?>
	<fieldset>
  <legend><strong> Registro Realizado </strong></legend>
	  
	  
  <!--        AQUI  LO QUE DEBERIA DE IR EN EL INSERT A LA BD     -->	
	  
		  
	


	


<table align="center">
	<tr>
	
 		<!--META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"--> </head > 
			<b>
			<p align="center" class="Estilo1"><strong>Registro Realizado con Exito!!! </strong></p>
			<p align="center" class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='home.php' class="Estilo1"></br>Regresar al Menu Principal</a></p>
            
			
  </tr>

</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
	