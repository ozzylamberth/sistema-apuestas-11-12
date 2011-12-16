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
          <li><a href="proximos_eventos.php"><span>Próximos Eventos</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
<<<<<<< .mine
        <div id="coin-slider">  <a href="#"><img src="../Imagenes/ganadores.gif" width="957" height="186" alt=""><span>
=======
        <div id="coin-slider">  <a href="#"><img src="../Imagenes/ganadores.gif" width="1022" height="100" alt="" /><span>
>>>>>>> .r11
        </span></a></div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div  style="background-image:url(../Imagenes/fondo.jpg)"class="article">
          <h2>
            <p align="left" ><strong>Seleccione Evento</strong>:
              <?php
        $eve_nombre='';
		$eve_id=0;
		$eve_fecha='';
		$eve_nro_gan=0;
        $selec_nom_eve= sql("select eve_nombre from evento WHERE eve_status LIKE 'Inactivo'");
  ?>
            </p>
   
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

      <input name="Buscar" type="submit" class="fff" id="Buscar" value="Buscar">
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
  	 
 
<?php
		if ($eve_nombre !='' )
		{ ?>
<form id="formAdmin" name="formAdmin" method="post" action="">
   
     <?php 
	 
	 $selec_Id_Par= sql("SELECT P.PAR_NOMBRE FROM RES_PAR RP, EVENTO E, PARTICIPANTE P WHERE RP.RP_FK_PAR_ID=P.PAR_ID AND RP.RP_FK_EVE_ID=E.EVE_ID AND E.EVE_ID=".$eve_id);
	   
	?>
    
 <p align="center"><strong>  
  Evento: <?php  echo $eve_nombre?> 
 </strong></p>
 <p align="center" ><strong> Fecha: <?php echo $eve_fecha?>
  </strong></p>
 <p align="center" ><strong>Nro de Ganadores: <?php echo $eve_nro_gan?></strong></p>
 <table width="200" border="1" align="center">
   <tr>
    <td  align="center" width="200">NOMBRES</td>
    
  
      <?php
	    $var= 1;
           While($row=oci_fetch_array($selec_Id_Par,OCI_BOTH)){
               $par_nombre = $row['PAR_NOMBRE']; 
		
	     ?>
 
</table>
 
      <table width="200" border="1" align="center">
        <tr>
          <th width="200" scope="col"> <?php echo $par_nombre; ?> </th> 
        </tr>
      </table>
    

  <?php 
   $var ++;
   }
	?>
</form>  <?php }?></h2>
          <div class="clr"></div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small> <span>1</span> </p>
      </div>
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
