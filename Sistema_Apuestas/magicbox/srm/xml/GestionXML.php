<?php
class GestionXML
{
	protected $db;
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
	
	public function GestionXML()
	{
	}
	
	
	public function ejemploXml()
	{
		
		die();
	}
	
	public function guardarXml($categorias,$maquinas,$eventos,$participantes,$administradores,$ruta)
	{
		$xml='<?xml version="1.0" encoding="utf-8"?>';
	 
		$nombre='db_Sistema_Apuestas.xml'; 
		$nombre_completo=$ruta.$nombre;
	 
		$archivo = fopen ($nombre_completo,'w'); 
		fwrite ($archivo, $xml); 

		$tag_apuesta=' <archivoXML>'.PHP_EOL;
		fwrite ($archivo, $tag_apuesta); 
		
		$this->guardarXmlCategorias($categorias,$archivo);
		$this->guardarXmlEventos($eventos,$archivo);
		$this->guardarXmlParticipantes($participantes,$archivo);
		$this->guardarXmlAdministradores($administradores,$archivo);
		$this->guardarXmlMaquinas($maquinas,$archivo);

		$tag_apuesta_c=' </archivoXML>'.PHP_EOL;
		fwrite ($archivo, $tag_apuesta_c); 
		

		fclose ($archivo); 
		
		
 } 
 
	public function guardarXmlCategorias($categorias,$archivo)
	{
		$tag_categorias='  <categorias>'.PHP_EOL;
		fwrite ($archivo, $tag_categorias); 
	 
		foreach($categorias as $clave=>$valor)
		{
			$tag_categoria='   <categoria>'.PHP_EOL;
			fputs ($archivo, $tag_categoria); 
			
			$tag_cat_id='     <catid>';
			fwrite ($archivo, $tag_cat_id);
			$cat_id= $valor['cat_id'];
			fwrite ($archivo, $cat_id);
			$tag_cat_id_c='</catid>'.PHP_EOL;
			fwrite ($archivo, $tag_cat_id_c);
			
			$tag_cat_nombre='     <catnombre>';
			fwrite ($archivo, $tag_cat_nombre);
			$cat_nombre= $valor['cat_nombre'];
			fwrite ($archivo, $cat_nombre);
			$tag_cat_nombre_c='</catnombre>'.PHP_EOL;
			fwrite ($archivo, $tag_cat_nombre_c);
			
			$tag_categoria_c='   </categoria>'.PHP_EOL;
			fwrite ($archivo, $tag_categoria_c); 
		}
	
		$tag_categorias_c='  </categorias>'.PHP_EOL;
		fwrite ($archivo, $tag_categorias_c); 

		//fclose ($archivo); 
	} 
	
	public function guardarXmlEventos($eventos,$archivo)
	{			
		$tag_eventos='  <eventos>'.PHP_EOL;
		fwrite ($archivo, $tag_eventos); 
	 
		foreach($eventos as $clave=>$valor)
		{
			$tag_evento='   <evento>'.PHP_EOL;
			fputs ($archivo, $tag_evento); 
			
			$tag_eve_id='     <id>';
			fwrite ($archivo, $tag_eve_id);
			$eve_id= $valor['eve_id'];
			fwrite ($archivo, $eve_id);
			$tag_eve_id_c='</id>'.PHP_EOL;
			fwrite ($archivo, $tag_eve_id_c);
			
			$tag_nombre='     <nombre>';
			fwrite ($archivo, $tag_nombre);
			$eve_nombre= $valor['eve_nombre'];
			fwrite ($archivo, $eve_nombre);
			$tag_nombre_c='</nombre>'.PHP_EOL;
			fwrite ($archivo, $tag_nombre_c);
			
			$tag_fecha='     <fecha>';
			fwrite ($archivo, $tag_fecha);
			$eve_fecha= $valor['eve_fecha'];
			fwrite ($archivo, $eve_fecha);
			$tag_fecha_c='</fecha>'.PHP_EOL;
			fwrite ($archivo, $tag_fecha_c);
			
			$tag_nropart='     <nropart>';
			fwrite ($archivo, $tag_nropart);
			$eve_nropart= $valor['eve_nro_part'];
			fwrite ($archivo, $eve_nropart);
			$tag_nropart_c='</nropart>'.PHP_EOL;
			fwrite ($archivo, $tag_nropart_c);
			
			$tag_nrogan='     <nrogan>';
			fwrite ($archivo, $tag_nrogan);
			$eve_nrogan= $valor['eve_nro_gan'];
			fwrite ($archivo, $eve_nrogan);
			$tag_nrogan_c='</nrogan>'.PHP_EOL;
			fwrite ($archivo, $tag_nrogan_c);
			
			$tag_cat_id='     <idcat>';
			fwrite ($archivo, $tag_cat_id);
			$eve_cat_id= $valor['eve_cat_id'];
			fwrite ($archivo, $eve_cat_id);
			$tag_cat_id_c='</idcat>'.PHP_EOL;
			fwrite ($archivo, $tag_cat_id_c);
			
			$tag_tipopago='     <tipopago>';
			fwrite ($archivo, $tag_tipopago);
			$eve_tipo_pago= $valor['eve_tipo_pago'];
			fwrite ($archivo, $eve_tipo_pago);
			$tag_tipopago_c='</tipopago>'.PHP_EOL;
			fwrite ($archivo, $tag_tipopago_c);
			
			$tag_admin_ced='     <cedadmin>';
			fwrite ($archivo, $tag_admin_ced);
			$eve_admin_ced= $valor['eve_admin_cedula'];
			fwrite ($archivo, $eve_admin_ced);
			$tag_admin_ced_c='</cedadmin>'.PHP_EOL;
			fwrite ($archivo, $tag_admin_ced_c);
			
			$tag_evento_c='   </evento>'.PHP_EOL;
			fwrite ($archivo, $tag_evento_c); 
		}
	
		$tag_eventos_c='  </eventos>'.PHP_EOL;
		fwrite ($archivo, $tag_eventos_c); 

		//fclose ($archivo); 
	} 		   
	
	public function guardarXmlParticipantes($participantes,$archivo)
	{			
		$tag_participantes='  <participantes>'.PHP_EOL;
		fwrite ($archivo, $tag_participantes); 
	 
		foreach($participantes as $clave=>$valor)
		{
			$tag_participante='   <participante>'.PHP_EOL;
			fputs ($archivo, $tag_participante); 
			
			$tag_par_id='     <idpart>';
			fwrite ($archivo, $tag_par_id);
			$par_id= $valor['par_id'];
			fwrite ($archivo, $par_id);
			$tag_par_id_c='</idpart>'.PHP_EOL;
			fwrite ($archivo, $tag_par_id_c);
			
			$tag_par_nombre='     <nombrepart>';
			fwrite ($archivo, $tag_par_nombre);
			$par_nombre= $valor['par_nombre'];
			fwrite ($archivo, $par_nombre);
			$tag_par_nombre_c='</nombrepart>'.PHP_EOL;
			fwrite ($archivo, $tag_par_nombre_c);
				
			$tag_par_tipopago='     <tipopagop>';
			fwrite ($archivo, $tag_par_tipopago);
			$par_tipo_pago= $valor['par_tipo_pago'];
			fwrite ($archivo, $par_tipo_pago);
			$tag_par_tipopago_c='</tipopagop>'.PHP_EOL;
			fwrite ($archivo, $tag_par_tipopago_c);
			
			$tag_topeapuesta='     <topeapuesta>';
			fwrite ($archivo, $tag_topeapuesta);
			$par_topeapuesta= $valor['par_tope_apuesta'];
			fwrite ($archivo, $par_topeapuesta);
			$tag_topeapuesta_c='</topeapuesta>'.PHP_EOL;
			fwrite ($archivo, $tag_topeapuesta_c);
			
			$tag_eve_id='     <ideve>';
			fwrite ($archivo, $tag_eve_id);
			$par_eve_id= $valor['par_eve_id'];
			fwrite ($archivo, $par_eve_id);
			$tag_eve_id_c='</ideve>'.PHP_EOL;
			fwrite ($archivo, $tag_eve_id_c);
			
			$tag_participante_c='   </participante>'.PHP_EOL;
			fwrite ($archivo, $tag_participante_c); 
		}
	
		$tag_participantes_c='  </participantes>'.PHP_EOL;
		fwrite ($archivo, $tag_participantes_c); 

		//fclose ($archivo); 
	}
	
	
	public function guardarXmlAdministradores($administradores,$archivo)
	{			
		$tag_administradores='  <administradores>'.PHP_EOL;
		fwrite ($archivo, $tag_administradores); 
	 
		foreach($administradores as $clave=>$valor)
		{
			$tag_administrador='   <administrador>'.PHP_EOL;
			fputs ($archivo, $tag_administrador); 
			
			$tag_admin_ced='     <cedulaadm>';
			fwrite ($archivo, $tag_admin_ced);
			$admin_cedula= $valor['admin_cedula'];
			fwrite ($archivo, $admin_cedula);
			$tag_admin_ced_c='</cedulaadm>'.PHP_EOL;
			fwrite ($archivo, $tag_admin_ced_c);
			
			$tag_admin_login='     <loginadm>';
			fwrite ($archivo, $tag_admin_login);
			$admin_login= $valor['admin_login'];
			fwrite ($archivo, $admin_login);
			$tag_admin_login_c='</loginadm>'.PHP_EOL;
			fwrite ($archivo, $tag_admin_login_c);
				
			$tag_admin_contrasena='     <contrasenaadm>';
			fwrite ($archivo, $tag_admin_contrasena);
			$admin_contrasena= $valor['admin_contrasena'];
			fwrite ($archivo, $admin_contrasena);
			$tag_admin_contrasena_c='</contrasenaadm>'.PHP_EOL;
			fwrite ($archivo, $tag_admin_contrasena_c);
			
			$tag_administrador_c='   </administrador>'.PHP_EOL;
			fwrite ($archivo, $tag_administrador_c); 
		}
	
		$tag_administradores_c='  </administradores>'.PHP_EOL;
		fwrite ($archivo, $tag_administradores_c); 

		//fclose ($archivo); 
	}
	
	
	public function guardarXmlMaquinas($maquinas,$archivo)
	{
		$tag_maquinas='  <maquinas>'.PHP_EOL;
		fwrite ($archivo, $tag_maquinas); 
	 
		foreach($maquinas as $clave=>$valor)
		{
			$tag_maquina='   <maquina>'.PHP_EOL;
			fputs ($archivo, $tag_maquina); 
			
			$tag_maq_id='     <maqid>';
			fwrite ($archivo, $tag_maq_id);
			$maq_id= $valor['maq_id'];
			fwrite ($archivo, $maq_id);
			$tag_cat_id_c='</maqid>'.PHP_EOL;
			fwrite ($archivo, $tag_cat_id_c);
			
			$tag_maq_status='     <maqstatus>';
			fwrite ($archivo, $tag_maq_status);
			$maq_status= $valor['maq_status'];
			fwrite ($archivo, $maq_status);
			$tag_maq_status_c='</maqstatus>'.PHP_EOL;
			fwrite ($archivo, $tag_maq_status_c);
			
			$tag_maquina_c='   </maquina>'.PHP_EOL;
			fwrite ($archivo, $tag_maquina_c); 
		}
	
		$tag_categorias_c='  </maquinas>'.PHP_EOL;
		fwrite ($archivo, $tag_categorias_c); 

		//fclose ($archivo); 
	} 
 	
 
}
?>