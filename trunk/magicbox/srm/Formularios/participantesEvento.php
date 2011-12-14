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
        
     
        
          <li class="active"><a href="index.html"><span>Inicio</span></a></li>
          <li><a href="srm/Formularios/listar_ganadores.php"><span>Ganadores</span></a></li>
          <li><a href="javascript:ventanaSecundaria('/Sistema_Apuestas/magicbox/srm/Formularios/iniciar.php')"><span>Log In</span></a></li>
          <li><a href="srm/Formularios/proximos_eventos.php"><span>Próximos Eventos</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider">  <a href="#"><img src="../Imagenes/ca2.jpg" width="957" height="262" alt=""><span>
        </span></a></div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
        
          <h2> <p>
   <?php
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_gan=0;
        $selec_nom_eve= sql("select eve_nombre from evento");
  ?>    
 </p>
 <p align="left" ><strong>Seleccione Evento</strong>:</p>
   
<form name="form1" method="post" action="">
  
    <select name="eve" class="gh" id="eve">
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

      <input name="Buscar" type="submit" class="botn" id="Buscar" value="Buscar">
</form>

 
  <?PHP  
      $selec_Id_Eve= sql("SELECT EVE_ID, EVE_NRO_GAN, EVE_FECHA FROM EVENTO WHERE EVE_NOMBRE LIKE '$eve_nombre'");
	  
	  While($roweve2=oci_fetch_array($selec_Id_Eve,OCI_BOTH))
	   {	
	      $eve_id= $roweve2['EVE_ID'];
          $eve_nro_gan = $roweve2['EVE_NRO_GAN'];
		  $eve_fecha = $roweve2['EVE_FECHA'];
       }
	   
	   ?>
  	 
 

<form id="formAdmin" name="formAdmin" method="post" action="">
   
     <?php 
	 
	 $query=sql("SELECT P.PAR_NOMBRE, PE.PE_TOP_APUESTA, PE.PE_TIPO_PAGO FROM EVENTO E, PAR_EVE PE, PARTICIPANTE P WHERE P.PAR_ID=PE.PE_FK_PAR_ID AND PE.PE_FK_EVE_ID = E.EVE_ID");
	   
	?>
    
 <p align="center"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" ><strong> Fecha: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" ><strong>Nro de Ganadores: <?php echo $eve_nro_gan?></strong></p>
 <table width="200" border="1" align="center">
   <tr>
    <td  align="center" width="200">Participantes</td>
    
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($query,OCI_BOTH)){
               $par_nombre = $row['PAR_NOMBRE']; 
		        $pe_top_apuesta = $row['PE_TOP_APUESTA']; 
				$pe_tipo_pago = $row['PE_TIPO_PAGO'];
	     ?>
 
</table>
 
      <table width="200" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
        </tr>
         <tr>
          <th width="200" scope="col"> <?php
		  if ($pe_top_apuesta==0) 
		  {
			echo "Sin tope apuesta";  
		  }
		  else
		  {
		  echo $pe_top_apuesta ;
		  }
		  ?>
          </th> 
        </tr>
        <tr>
          <th width="200" scope="col"> <?php
		  if ($pe_tipo_pago==0) 
		  {
			echo "Sin tipo pago especial";  
		  }
		  else
		  {
		  echo $pe_tipo_pago ;
		  }
		  ?> </th> 
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>    
 
<center><p><?php  echo "<a href='../../index.html'> Continuar </a> "; ?></p></center>
</p>
          </h2>
          <div class="clr"></div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small> <span>1</span> </p>
      </div>
      <div class="sidebar">
        <div class="gadget">
         
          <div class="clr"></div>
          <ul class="sb_menu">
           
          </ul>
        </div>
        <div class="gadget">
        
          <div class="clr"></div>
          <ul class="ex_menu">
           
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="clr"></div>
    </div>
  </div>
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
