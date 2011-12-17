<?php
include_once ('conexion.php');
$opcion1 = $_GET['id1'];		//Le asigno a una variable lo que recibo por la URL
$accion = $_GET['accion'];


//muestra los datos consultados de acuerdo a la opción
if ($accion == "habilitaSede")
{

$sql="select * from ciudad where id_estado='$opcion1'";
$result=mysql_query($sql);
while($consulta=mysql_fetch_array($result))
{
?>
	
		<td><select name="ciudad" id="ciudad" >
<?PHP
		

		
		
		    if (!$consulta) {
			$error="Error al recorrer los registros!!.";
			echo($error);
		    }
				else 
				{
			echo "<option value='".$consulta[0]."'>".$consulta[1]."</option>";
		    }
													

?>								
			</select>
<?PHP
}
}
?>