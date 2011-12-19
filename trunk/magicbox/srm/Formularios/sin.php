

<?php 

include_once ("../DataConexion/conexion.php");


 $fecha1=time();
			$fecha1 -= (270 * 60);
			$fecha = date("Y-m-d", $fecha1);
			
		

$selec_nom_eve= sql("select eve_id, eve_nombre from evento WHERE eve_fecha > to_date('$fecha', 'yyyy/mm/dd')");
		
		while($row=oci_fetch_array($selec_nom_eve,OCI_BOTH))
		{
			$var=$row['EVE_ID'];
			$var2=$row['EVE_NOMBRE'];
			
		echo $var2;	
		}
			
			
?>