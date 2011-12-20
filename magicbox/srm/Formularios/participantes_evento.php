
<!--!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
.main .content .content_resize .mainbar .article #formAdmin p strong {
        font-size: 14;
}
.main .content .content_resize .mainbar .article #formAdmin p strong {
        color: #000;
}
.main .content .content_resize .mainbar .article p strong {
        font-size: 18px;
}
-->
<!--/style>
</head>
<body>
<script language=javascript>
function ventanaSecundaria (URL){
   window.open(URL,"ventana1","width=120,height=300,scrollbars=NO,resizable=no")
}
</script--> 

<?PHP
/** 
*
* @Lista de Eventos caducados y sus ganadores
* 
* @autor: Eleany Garcia
* Página que lista los eventos ya finalizados y su ganador o ganadores
*
*/


//session_start();
include_once ("../controladores/controlEvento.php");


?>
<!--div class="main">
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
      <div class="slider">
        <div id="coin-slider">  <a href="#"><img src="../Imagenes/participantes.gif" width="1000" height="100" alt=""><span>
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
          <h2--><style type="text/css">
<!--
body {
        background-image: url(../Imagenes/fondo.jpg);
}
-->
</style>
          
 <form name="form1" method="post" action="../controladores/ControlEvento.php">
            <p align="left" ><strong>Seleccione Evento</strong>:
             
  
  
 
  
  
  <select name="eve" class="gh" id="eve">
              <option value="0">Seleccione </option>
  <?php foreach ($eventos as $clave=>$valor): ?>
                <option value="<?php echo $valor["id"] ?>" > <?php echo $valor["nombre"]?></option>
  <?php endforeach; ?>
  </select>
              
              
            <p class="Estilo1 Estilo3">
                
              <input name="Buscar" type="submit" class="botn" id="Buscar" value="Buscar">

   
<?php  if($eve_id):?>   

    
        <p align="center">
        <strong>  
                        Evento: <?php  echo $eve_nombre?> 
                </strong>
    </p>
        <p align="center" >
        <strong> 
                Fecha: <?php echo $eve_fecha?>
                </strong>
    </p>
        <p align="center" >
        <strong>
                Nro de Ganadores: <?php echo $eve_nro_gan?>
        </strong>
    </p>

        <p align="center" >
        <strong>
                Tipo de Pago: <?php echo $eve_tipo_pago?>
        </strong>
    </p>


    <table width="600" border="1" align="center">
        <tr>
          <th scope="col" colspan="3"> Participantes </th> 
       </tr>
        
    <?php foreach($participantes_eve as $clave=>$valor):?>

        <tr>
          <td width="200" scope="col"> <?php echo $valor['par_nombre']; ?> </td> 
          <td width="200" scope="col"> <?php echo $valor['pe_top_apuesta']  ?>  </td> 
          <td width="200" scope="col"> <?php echo $valor['pe_tipo_pago'] ?> </td> 
        </tr>    

  <?php endforeach; ?>
    
     </table>
<?php endif; ?>

</form>
<!--center></center>
          <div class="clr"></div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small></p>
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
</html-->