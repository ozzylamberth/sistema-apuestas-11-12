<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Apuestas GSG</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-times.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<style type="text/css">
<!--
.main .content .content_resize .mainbar .article h2 p strong {
	color: #700;
}
.main .content .content_resize .mainbar .article h2 #formAdmin p strong {
	color: #000;
}
.main .content .content_resize .mainbar .article h2 #formAdmin p strong {
	font-family: "Comic Sans MS", cursive;
}
.fff {
	color: #A00;
}
.main .content .content_resize .mainbar .article h2 #formAdmin table tr td {
	font-family: "Comic Sans MS", cursive;
}
.main .content .content_resize .mainbar .article p strong {
	font-size: 18px;
}
.main .content .content_resize .mainbar .article #formAdmin .Estilo1 strong {
	font-size: 14px;
}
.main .content .content_resize .mainbar .article #formAdmin .Estilo1 strong {
	color: #E9D3AD;
}
.main .content .content_resize .mainbar .article #formAdmin .Estilo1 strong {
	color: #000;
}
-->
</style>
</head>
<body>
<script language=javascript>
function ventanaSecundaria (URL){
   window.open(URL,"ventana1","width=120,height=300,scrollbars=NO,resizable=no")
}
</script> 

<?PHP
/** 
*
* @Lista de Eventos caducados y sus ganadores
* 
* @autor: Eleany Garcia
* Página que lista los eventos ya finalizados y su ganador o ganadores
*
*/


session_start();
include_once("../DataConexion/conexion.php");

?>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          
          </span>
         
        </form>
      </div>
      <div class="logo">
        <h1><a href="index.html">SISTEMA<span> APUESTAS SOGAR </span> <small></small></a></h1> 
     
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
        
     
        
          <li class="active"><a href="../../index.html"><span>Inicio</span></a></li>
          <li></li>
          <li><a href="javascript:ventanaSecundaria('/Sistema_Apuestas/magicbox/srm/Formularios/iniciar.php')"><span>Log In</span></a></li>
          <li><a href="listar_ganadores.php"><span>Ganadores</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
<<<<<<< .mine
=======
      <div class="slider">
        <div id="coin-slider">  <a href="#"><img src="../Imagenes/proximoseventos.gif" width="1023" height="100" alt=""><span>
        </span></a></div>
        <div class="clr"></div>
      </div>
>>>>>>> .r11
      <div class="clr"></div>
    </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
<<<<<<< .mine
        <div style="background-image:url(../Imagenes/fondo.jpg) "class="article">
          <form name="form1" method="post" action="" >
           <center> <table width="500" border="0">
  <tr>
    <td width="300"> <p align="left" ><strong>Seleccione Evento</strong>:
=======
        <div class="article">
          <h2>
            <p>&nbsp;</p>
            <p align="left" ><strong>Seleccione Evento</strong>:
>>>>>>> .r11
             <?php
 
         $fecha1=time();
	     $fecha1 -= (270 * 60);
		  $fecha = date("Y-m-d", $fecha1 );
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_part=0;
		
        $selec_nom_eve= sql("select eve_nombre from evento WHERE eve_status LIKE 'Activo'");
		 ?>
            </p>
            
            <select name="eve" id="eve">
              <option value="0">Seleccione </option>
              <?PHP
        while ($roweve=oci_fetch_array($selec_nom_eve,OCI_BOTH)){?>
              
              <option value="<?php echo $roweve["EVE_NOMBRE"] ?>" > <?php echo $roweve["EVE_NOMBRE"]?></option>
              <?php  } ?>
            </select>
            
            <?PHP
    if(isset($_POST['eve'])) 
    $eve_nombre = $_POST['eve']; //Te devolveria el atributo value del option seleccionado
	?>
            
            
            <p class="Estilo1 Estilo3">
              
              <input name="Buscar" type="submit" class="fff" id="Buscar" value="Buscar"></td>
    <center>
      <td width="200">&nbsp;</td></center>
  </tr>
</table> </center>         
</form>
 
 
 
  <?PHP  
      $selec_Id_Eve= sql("SELECT EVE_ID, EVE_NRO_PART, EVE_TIPO_PAGO, EVE_FECHA FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	  
	  While($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   {	
	      $eve_id= $roweve2['EVE_ID'];
          $eve_nro_part = $roweve2['EVE_NRO_PART'];
		  $eve_tipo_pago = $roweve2['EVE_TIPO_PAGO'];
		  $eve_fecha = $roweve2['EVE_FECHA'];
		  
		  
       } 
	   
	   ?>
  
 <?php
		if ($eve_nombre !='' )
		{ ?>

<form  id="formAdmin" name="formAdmin" method="post" action=""  >
   
   <?php 
	   $queryListaEve = sql("SELECT P.par_nombre, PE.pe_tipo_pago FROM evento E, participante P, par_eve PE WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND   PE.PE_FK_EVE_ID=E.EVE_ID AND E.eve_id=".$eve_id);
	
	?>
    
 <p align="center" class="Estilo1"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" class="Estilo1"><strong> Fecha de inicio: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" class="Estilo1"><strong>Nro de Participantes: <?php echo $eve_nro_part?>
 </strong></p>
 <p align="center" class="Estilo1"><strong>Tipo Pago: <?php echo  $eve_tipo_pago?>
 </strong></p>
 
<table width="400" border="1" align="center">
  <tr>
    <td width="200" height="22">Nombre</td>
    <td width="200">Razon de Pago</td>
   </tr>
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($queryListaEve,OCI_BOTH))
		   {
			   $par_nombre = $row['PAR_NOMBRE'];
			   $pe_tipo_pago = $row['PE_TIPO_PAGO'];
			   
			   if ($pe_tipo_pago==0)
			   {
				   $pe_tipo_pago=$eve_tipo_pago;
				}
		 ?>
 
</table>
 
      <table width="400" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
          <th width="200" scope="col"> <?php echo $pe_tipo_pago; ?> </th>
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>    
 <p>
   <?php } ?>
    <div id="coin-slider">  <a href="#"><img src="../Imagenes/proximoseventos.gif" width="997" height="100" alt="">
     <div class="clr"></div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small> <span>1</span>  </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg"></div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">GrupoSG</a></p>
      <p class="rf">Design by <a href="#">Grupo SG</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
