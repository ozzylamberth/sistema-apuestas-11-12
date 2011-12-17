<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

//$cedula=$_GET["cedula"];
//include("../Clases/conexiones.php");

session_start();
$usuario= $_SESSION['usuario'];
include_once ("../magicbox/srm/DataConexion/conexion.php");
			
			
					/* $consulta77= "SELECT * FROM usuario where login='$usuario'"; 
					$resultado77= mysql_query($consulta77);
					while ($fila77= mysql_fetch_array($resultado77))
					{
					$usuariof=$fila77[6];
					} */
?>
<head>
<script language="JavaScript" type="text/javascript">

//<![CDATA[
mensagem= "<?php print($usuario)?>"; 




document.write("<b><font face=arial size=2 color=#ffffff>Logged On:  "+mensagem+" <\/font><\/b>");





//]]>

</script> 
<title>.::SISTEMA APUESTAS ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/coin-slider.css">
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-times.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>

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
        <h1><a href="srm/Formularios/home.php" target='paginita'>SISTEMA APUESTAS<span> SG</span> <small> </small></a></h1>
      </div>
      <div class="clr"></div>
      <style type="text/css">
/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this stylesheet and the associated (x)html
is available at http://www.cssplay.co.uk/menus/pro_dropline_dropdown.html
Copyright (c) 2005-2007 Stu Nicholls. All rights reserved.
This stylesheet and the associated (x)html may be modified in any 
way to fit your requirements.
=================================================================== */
.pro_linedrop {
height:36px;
width:742px;
background:url(line/blank_sepia.gif);
position:relative; 
font-family:arial, verdana, sans-serif; 
font-size:11px;
z-index:500;
}

.pro_linedrop .select {
margin:0; 
padding:0; 
list-style:none; 
white-space:nowrap;
}

.pro_linedrop li {
float:left;
background:url(line/blank_over_sepia.gif);
}

.pro_linedrop .select a {
display:block; 
height:36px; 
float:left; 
background: url(line/blank_sepia.gif); 
padding:0 0 0 15px; 
text-decoration:none; 
line-height:25px; 
white-space:nowrap; 
color:#ddd;
}

.pro_linedrop .select li.line a {color:#fc0;}

.pro_linedrop .select a b {
display:block; 
padding:0 30px 10px 15px; 
background:url(line/blank_sepia.gif) right top;
}

.pro_linedrop .select a:hover, 
.pro_linedrop .select li:hover a {
background: url(line/blank_over_sepia.gif); 
padding:0 0 0 15px;
line-height:27px;
cursor:pointer; 
color:#fff;
}

.pro_linedrop .select li.line a:hover, 
.pro_linedrop .select li.line:hover a {
color:#fc6;}

.pro_linedrop .select a:hover b, 
.pro_linedrop .select li:hover a b {
display:block; 
padding:0 30px 9px 15px; 
background:url(line/blank_over_sepia.gif) right top; 
cursor:pointer;
}

.pro_linedrop .sub {
display:none;
}
.pro_linedrop ul ul {display:none;}

/* IE6 only */
.pro_linedrop table {
border-collapse:collapse; 
margin:-1px; 
font-size:1em; 
width:0; 
height:0;
}

.pro_linedrop .sub {
margin:0; 
padding:0;
list-style:none;
}

.pro_linedrop .sub li {background:transparent;}

.pro_linedrop .select :hover .sub {
height:25px;
display:block; 
position:absolute;
float:left;
width:740px;
top:28px; 
left:0; 
text-align:center;
background:transparent url(line/transparent.gif);
border:1px solid #ddd;
}

.pro_linedrop .select :hover .rt li {float:right;}

.pro_linedrop .select :hover .sub li a 
{display:block; height:25px; line-height:22px; float:left; background:transparent url(line/transparent.gif); padding:0 16px; margin:0; white-space:nowrap; color:#888;font-size:10px;}

.pro_linedrop .select :hover .sub li.subline a {color:#ddd;}

.pro_linedrop .select :hover .sub li a:hover,
.pro_linedrop .select :hover .sub li:hover
{color:#000; line-height:20px; position:relative;}

.pro_linedrop .select :hover .sub li:hover > a {color:#ddd;}

.pro_linedrop .select :hover .sub :hover ul {padding:0; margin:0; list-style:none; display:block; width:112px; position:absolute; left:-1px; top:25px; border:1px solid #ddd; border-top:0; background:#000000;}

.pro_linedrop .select :hover .sub :hover ul li a {width:80px; text-align:left; height:20px; line-height:18px;}
.pro_linedrop .select :hover .sub :hover ul li a:hover {line-height:16px;}

</style>

</head>

<body>
<div class="pro_linedrop">
<ul class="select">
<li><a href="srm/Formularios/home.php" target='paginita'><b>Home</b></a></li>
<li class="line"><a href="srm/Formularios/home.php" target='paginita'><b>Operaciones Especiales</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="sub">
		<li class="subline"><a href="srm/Formularios/home.php">Registro<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>			
			<li><a href="srm/Formularios/categoria.php" target='paginita'>Categorias</a></li>			
			<li><a href="srm/Formularios/eventos.php" target='paginita'>Eventos</a></li>			
			<li><a href="srm/Formularios/Generar_Resultados.php" target='paginita'>Generar Resultados</a></li>			
		<li><a href="srm/Formularios/mapa.php" target='paginita'>Registro De Maquinas</a></li>		
			</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		
		
	
	
	
		<li class="subline"><a href="">Usuarios<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>
			<li><a href="srm/Formularios/RegistroUsuario.php" target='paginita'>Crear Usuarios</a></li>			
					
					
			</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		
		
		<li class="subline"><a href="">Eliminar<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>			
			<li><a href="srm/Formularios/eliminar_ca.php" target='paginita'>Categorias</a></li>			
			<li><a href="srm/Formularios/eliminar_ev.php" target='paginita'>Eventos</a></li>			
			<li><a href="srm/Formularios/eliminar_us.php" target='paginita'>Usuarios</a></li>			
					
					
			</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		
		
		<li class="subline"><a href="">Modificar<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>			
			<li><a href="srm/Formularios/modificar_ca.php" target='paginita'>Categorias</a></li>			
			<li><a href="srm/Formularios/modificar_ev.php" target='paginita'>Eventos</a></li>			
			<li><a href="srm/Formularios/modificar_us.php" target='paginita'>Usuarios</a></li>			
					
					
			</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
	</ul>	
		
	
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<li class="line"><a href="#nogo"><b>Operaciones de Consulta</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="sub">
	<li class="subline"><a href="">General<!--[if gte IE 7]><!--></a><!--<![endif]-->
	<ul>
		<li><a href="srm/Formularios/listarcat.php" target='paginita'>Listar Categorias</a></li>
	
		<li><a href="srm/Formularios/listareventos.php" target='paginita'>Listar Eventos</a></li>
		
		<li><a href="srm/Formularios/listar_ganadores2.php" target='paginita'>Listar Ganadores</a></li>
        
        <li><a href="srm/Formularios/mostrar_maquinas.php" target='paginita'>Mostrar Maquinas</a></li>
	</ul>
	</li>
	
	
		
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>

<li><a href="srm/Formularios/cerrar.php" target='paginita'><b>Cerrar Sesion</b></a></li>
</ul>
</div>

<h4>Copyright &copy; 2011 CSS </h4>
      
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
		<iframe name="paginita" frameborder="0" width="1000" height="600" align='center' target="_blank">
          <h2><span></span></h2>
		
          <p class="infopost">Post <span class="date">on 04 November 2011</span> by <a href="#">Administrator</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">Info</a>, <a href="#">Castellana</a> &nbsp;&nbsp; <a href="#" class="com"><span></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="srm/Imagenes/H3_2166_2011_XmasCalendar2011.jpg" width="182" height="165" alt="mm" /></div>
          <div class="img"><img src="srm/Imagenes/GA10_182x164_WelcomeFreeroll_1370_09.jpg" width="182" height="165" alt="mm" /></div>
          <div class="img"><img src="srm/Imagenes/pokerblog_teaser.jpg" width="182" height="165" alt="mm" /></div>
          <div class="post_content">
            <center><p> <a href="#"></a><img src="srm/Imagenes/sce.png" width="359" height="236" alt="nn" /></p></center>
            <p><strong></strong></p>
            <p class="spec"><a href="#" class="rm">&raquo; Leer MAS</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <div class="article">
          <h2><span>Un nuevo espacio</span> en La Castellana</h2>
          <p class="infopost">Posted <span class="date">on 04 November 2011</span> by <a href="#">Administrator</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">Info</a>, <a href="#">Castellana</a> &nbsp;&nbsp; <a href="#" class="com">No Comments <span></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="srm/Imagenes/PO6_2214_2011_WPTPrague_Pokerblog_COM.jpg" width="182" height="187" alt="mm" /></div>
          <div class="img"><img src="srm/Imagenes/H2_2316_2011_CASIntegrationStep3_NowliveHardLaunchRaffle.jpg" width="235" height="187" alt="mm" /></div>
          <div class="post_content">
            <p> <a href="#"></a></p>
            <p><strong></strong>PROXIMOS EVENTOS!!!</p>
            <p class="spec"><a href="#" class="rm">&raquo; Read more</a></p>
          </div>
          <div class="clr"><img src="srm/Imagenes/3671.gif" width="728" height="90" alt="ima5" /></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
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
    <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">Sistema Apuestas</a></p>
      <p class="rf">Design by <a href="#">Sistema Apuestas</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>

