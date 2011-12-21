<?PHP

/** 
*
* @Eliminarcion de eventos
* 
* @autor: Eleany Garcia
* Página de eliminacion de eventos contiene la información de los distintos eventos que se pueden eliminar
*
*/


include_once("../DataConexion/conexion.php");
include_once ("../Controladores/ControlGenerarResultados2.php");


?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	color: #000;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
	color: #000;
}
.jj {
	color: #000;
}
.bot {
	color: #800;
}
-->
</style><body bgcolor="white">
  <p align="center" class="Estilo1 Estilo1"><span class="Estilo1">
    
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
        
    

        
  <br>
  </p>
  <p align="center" class="Estilo1 Estilo3"><img src="../Imagenes/CASAAPUESTASOG.gif" width="925" height="79" alt="casa"></p>
      
  <form name="form1" id="form1" method="post" action="" >


 <p class="Estilo1 Estilo3">
   
 <center><table width="500" border="0">
  <tr>
    <td width="300"><strong>Seleccione el Evento</strong></p>
 <p class="Estilo1 Estilo3">
 
  <select name="evento" class="gh" id="evento">
              <option value="0">Seleccione </option>
  <?php foreach ($eventos as $clave=>$valor): ?>
  		<option value="<?php echo $valor["id"] ?>" ><?php echo $valor["nombre"]?></option>
  <?php endforeach; ?>
  </select>
  
 </p>
 <p class="Estilo1 Estilo3">
    <input name="Buscar" type="submit" class="bot" id="Buscar" value="Buscar">
 </p></td>
    <center><td><img src="../Imagenes/bsb.png" width="127" height="114" alt="jhjh"></td></center>
  </tr>
</table></center>

   
</form> 
 
    <p>
      <?PHP
	
	$selec_Eve1= sql("select EVE_ID,  EVE_NRO_GAN, EVE_TIPO_PAGO, EVE_FECHA, EVE_NRO_PART from evento where EVE_NOMBRE LIKE '$evento'");

    While($rowev1=oci_fetch_array($selec_Eve1,OCI_BOTH))
	{	
     $eve_id = $rowev1['EVE_ID'];
     $eve_nro_gan = $rowev1['EVE_NRO_GAN'];
	 $eve_tipo_pago = $rowev1['EVE_TIPO_PAGO'];
	 $eve_fecha = $rowev1['EVE_FECHA'];
	 $nro_Participantes= $rowev1['EVE_NRO_PART'];
 
     }
     ?>
    </p>
    <?php  if($id):?>
<form action="Generar_Resultados2.php" method="post" name="resul">
  <table align="center" border="0" width="900">
	<tr>
				<td width="700" height="137" align='center'><p><strong>Seleccione los participantes y presione agregar (en caso de no existir agreguelos)</strong></p>
			  
		          <p>
		            <select name="par_nombre" id="par_nombre" >
		              <option value="0">Seleccione </option>
		              <?PHP
		        $selec_Parnom = sql("select p.par_nombre, p.par_id from participante p, par_eve pe WHERE  p.par_id=pe.pe_fk_par_id AND pe.pe_fk_eve_id=".$eve_id);
	 
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
		            <input name="eve_id" type="hidden" value="<?php echo  $eve_id?>">
		            <input name="eve_nro_gan" type="hidden" value="<?php echo $eve_nro_gan?>">
		            
		            
		            <input name="Agregar" type="button" class="bot" id="Agregar" onClick="javascript:agregarParticipante('<?php echo $nro_Participantes?>')" value="Agregar">
		            <br> 
		            </br>
		            <?php 
			$nro_Part=1;
          
    while ($nro_Part <=  $eve_nro_gan)
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
		          <p><span class="jj">Descripción:</span>
<label>
            <textarea name="descripcion_eve" cols="40" rows="2" id="descripcion_eve"></textarea>
            </label>
		            </strong></p>
		            
	              </p>
		          <p>
			    <input name="continuar" type="submit" class="bot" id="button2" value="continuar" align='center'>
			  </p>
      </td>
      <td width="200">
      </td>
    </tr>
  </table>
<?php endif; ?>		
</form>