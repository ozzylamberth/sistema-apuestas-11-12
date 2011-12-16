<?php 

include_once ("../DataConexion/conexion.php");
   // esta funcion guardara la maquina y la casa de apuesta
	function salvarMaquina($latitud,$longitud,$maq_marca,$maq_modelo,$maq_memoria,$maq_procesador,$maq_medidas,$maq_tarj_mem,$maq_cap_disco)
	{
		$insertar_Cat= sql("insert into maquina_apuesta values (AUTO_INC_categoria.NEXTVAL,'Activo',$longitud,$latitud,$maq_marca,$maq_modelo,$maq_memoria,$maq_procesador,$maq_medidas,$maq_tarj_mem,$maq_cap_disco)");
		
	}


?>