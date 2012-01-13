<?php

session_start();
$usuario= $_SESSION['usuario'];
include_once ("../DataConexion/conexion.php");
/* session_start();
$usuario= $_SESSION['usuario'];
include_once ('conexion.php'); */
 $cat_Nombre= $_POST["Cat_nombre"];
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
        
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>


		<head>
       <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body,td,th {
	font-family: Comic Sans MS, cursive;
	color: #000;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #800;
}
       .hhhh {
	color: #800;
}
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
			  
		          <p>
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
		            <input name="Agregar" type="button" class="hhhh" id="Agregar" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')" value="Agregar">
	              </p>
		          <p><br> 
		            </br>
		            <?php 
			$nro_Part=1;
            while ($nro_Part <=  $nro_Participantes)
            {
           
			    echo $nro_Part?>
		            <input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
		            <input name="Participante_<?php echo $nro_Part ?>" type="text" id="Participante_<?php echo $nro_Part ?>" size="40" maxlength="40">
		            <!--input name="Participante_<?php echo $nro_Part ?>" type="hidden" value="Participante_<?php echo $nro_Part ?>"-->
		            
		            <br> 
		            </br>
		            
		            <?php $nro_Part++; 
		    	}?>
	              </p>
		          <center><img src="../Imagenes/BANNERMISS.gif" width="1000" height="90" alt="misses"></center>
			    
			    
		      </strong></p>
		   
			  <p>
			    <input name="continuar" type="submit" class="hhhh" id="button2" value="continuar" align='center'>
			  </p></td>
		 	 </tr>
			</table>
    	  <p>&nbsp;</p>
        </form>
	 <p>
	<?php 	
	} 	if ($tipo_Ganador==='tabla_Resultados'){   
	?>
    </p>
	    <form name="eventos2" id= "eventos2" method="post" action="eventos3.php">
	      <p>&nbsp;</p>
	      <table align="center" border="0" width="900">
	        <tr>
	          <td width="500" align='center'><p><strong> Ingrese el Nro de resultados:
	            </select>
	          </strong> <strong>
	          <input name="nro_Resultados" type="text" id="nro_Resultados" onKeyPress="return acceptNum(event)" maxlength="4">
	          </strong></p>
	            <p><strong>Seleccione los participantes y presione agregar (en caso de no existir agreguelos)</strong></p>
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
                  
	              <input name="nro_Participantes" id="nro_Participantes" type="hidden" value="<?php echo $nro_Participantes?>">
	              <input name="tipo_Ganador" type="hidden" value="<?php echo $tipo_Ganador?>">
	              <input name="fecha_Evento" type="hidden" value="<?php echo $fecha_Evento?>">
	              <input name="desc_Evento" type="hidden" value="<?php echo $desc_Evento?>">
	              <input name="cat_Id" type="hidden" value="<?php echo $cat_Id?>">
	              <input name="Agregar2" type="button" class="hhhh" id="Agregar2" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')" value="Agregar">
	              </strong></p>
	            <p>
                <strong>Ingrese el Nombre, Raz&oacute;n de pago y Monto tope si aplica</p>
	            
                <p>
	              <?php
			      $nro_Part=1;
                  while ($nro_Part <=  $nro_Participantes){
                  echo $nro_Part ?>
                  
                
                  
	              <input name="Id_<?php echo $nro_Part ?>" id="Id_<?php echo $nro_Part ?>"  type="hidden" maxlength="20">
                  
	              <input name="Participante_<?php echo $nro_Part ?>" type="text" id="Participante_<?php echo $nro_Part ?>" size="20" maxlength="20">
	              <label>
	                <select name="tipo_Pago_<?php echo $nro_Part ?>" id="tipo_Pago_<?php echo $nro_Part ?>">
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
	                <input name="tope_Apuesta_<?php echo $nro_Part ?>" type="text" id="tope_Apuesta_<?php echo $nro_Part ?>" size="20" maxlength="20">
                  </label>
	              <br>
	              </br>
	              <?php 
				  $nro_Part++; 
			    }
				   ?>
                </p>
	            <p>
	              <input name="button" type="button" class="hhhh" id="button" onClick="validaSubmite()" value="continuar" align='center'>
	            </p>
              </td>
            </tr>
          </table>
	      <center><p><img src="../Imagenes/BANNERMISS.gif" width="1000" height="90" alt="miisss"></p></center>
        </form>
	    <?php 	
	    }	
	    ?>
	<fieldset>
  
            
			
  </tr>

</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
	