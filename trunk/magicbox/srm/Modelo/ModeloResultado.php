<?php 


include_once ("../DataConexion/conexion.php");


function insertarResultado($res_resultado,$eve_id,$nro_ganadores)
{
		$insertres= sql("INSERT INTO RESULTADO VALUES (AUTO_INC_resultado.NEXTVAL,'$res_resultado')");
		$select_Id_Res= sql("SELECT MAX(RES_ID) AS RES_ID FROM RESULTADO");
		$filas=oci_fetch_array($select_Id_Res,OCI_BOTH);
		$res_id= $filas["RES_ID"];
        $nro_Part=1;
		
		while ($nro_Part <=  $nro_ganadores)
		{
		
			$par_id=$_POST['Id_'.$nro_Part];
			$par_nombre=$_POST['Participante_'.$nro_Part];
			$insertrp= sql("INSERT INTO RES_PAR  VALUES ('$res_id' , '$par_id', '$eve_id')");
			$nro_Part++;	
							
		}
			
		$act_Edo_Ev= sql("update evento set  eve_status = 'Inactivo' where eve_id='$eve_id'");
	

}



?>