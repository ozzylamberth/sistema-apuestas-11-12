<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
* AUTHOR: Eduardo Torres
* DATE: 16/08/2011
*/

//$cedula=$_GET["cedula"];
//include("../Clases/conexiones.php");

session_start();
$usuario= $_SESSION['usuario'];
$con = mysql_connect("localhost","root","");
			if (!$con)
				{
			die('Could not connect: ' . mysql_error());
				}	
			$bd = mysql_select_db("sistema_apuestas",$con);
			
					$consulta77= "SELECT * FROM usuario where login='$usuario'"; 
					$resultado77= mysql_query($consulta77);
					while ($fila77= mysql_fetch_array($resultado77))
					{
					$usuariof=$fila77[6];
					}
?>
<head>
<script language="JavaScript" type="text/javascript">

//<![CDATA[
mensagem= "<?php print($usuariof)?>"; 




document.write("<b><font face=arial size=2 color=#ffffff>Logged On:  "+mensagem+" <\/font><\/b>");





//]]>

</script> 
<title>.:: SISTEMA APUESTAS Provided By MG ::.</title>
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
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text">
          </span>
          <input name="button_search" src="images/search.gif" class="button_search" type="image">
        </form>
      </div>
      <div class="logo">
       <h1><a href="srm/Formularios/home.php" target='paginita'>SISTEMA APUESTAS<span> MG</span> <small> </small></a></h1>
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
<li class="line"><a href="" target='paginita'><b>Operaciones Especiales</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="sub">
		<li class="subline"><a href="">Registros<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>
			<li><a href="srm/Formularios/categoria.php" target='paginita'>Categorias</a></li>			
			<li><a href="srm/Formularios/categoria.php" target='paginita'>Eventos</a></li>			
			<li><a href="srm/Formularios/categoria.php" target='paginita'>Ganador Evento</a></li>			
			<li><a href="srm/Formularios/categoria.php" target='paginita'>Resultado</a></li>			
					
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
		<li><a href="srm/Formularios/" target='paginita'>Listar Categorias</a></li>
	
		<li><a href="srm/Formularios/" target='paginita'>Listar Eventos</a></li>
		
		<li><a href="srm/Formularios/" target='paginita'>Listado General</a></li>
	</ul>
	</li>
	
	<li class="subline"><a href="">Servicios<!--[if gte IE 7]><!--></a><!--<![endif]-->
	<ul>
		
	</ul>
	</li>
	
		
	</li>
		
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<li class="line"><a href=""><b>Contacto</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class="sub rt">
		
		<li class="subline"><a href="">Soporte Tecnico<!--[if gte IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
			<ul>
			<li><a href="srm/Formularios/home.php">Contactar Admin</a></li>
			
			</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li><a href=""></a></li>
		<li><a href=""></a></li>
		<li><a href="#nogo"></a></li>
	</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
<li><a href="srm/Formularios/cerrar.php" target='paginita'><b>Cerrar Sesion</b></a></li>
</ul>
</div>

<h4>Copyright &copy; 2011 CSS MG</h4>
      
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
		<iframe name="paginita" frameborder="0" width="1000" height="600" align='center' target="_blank">
          <h2><span></span></h2>
		
          <p class="infopost">Post <span class="date">on 04 November 2011</span> by <a href="#">Administrator</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">Info</a>, <a href="#">Castellana</a> &nbsp;&nbsp; <a href="#" class="com">No Comments <span></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="" width="198" height="188" alt="" class="fl" /></div>
          <div class="post_content">
            <p> <a href="#"></a> </p>
            <p><strong></strong> </p>
            <p class="spec"><a href="#" class="rm">&raquo; Read more</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <div class="article">
          <h2><span>Un nuevo espacio</span> en La Castellana</h2>
          <p class="infopost">Posted <span class="date">on 04 November 2011</span> by <a href="#">Administrator</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">Info</a>, <a href="#">Castellana</a> &nbsp;&nbsp; <a href="#" class="com">No Comments <span></span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="" width="198" height="188" alt="" class="fl" /></div>
          <div class="post_content">
            <p> <a href="#"></a> Ahora muy cerca de ti.</p>
            <p><strong></strong> </p>
            <p class="spec"><a href="#" class="rm">&raquo; Read more</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 1</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
      </div>
	  </iframe>
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
      <div class="col c1">
        <h2><span>Galeria</span> de Imagenes</h2>
        <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Resumen</span> de Servicios</h2>
        <p>Empresa lider en el ambito de la construccion.</p>
        <ul class="fbg_ul">
          <li><a href="#">.</a></li>
          <li><a href="#">.</a></li>
          <li><a href="#">.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contactanos</span> </h2>
        <p>Informacion de contacto:</p>
        <p class="contact_info"> <span>Direccion:</span> Av Fco de Miranda, Edif Parque Cristal, Torre Oeste, Piso 15 Oficina 15-01.<br />
          <span>Telefono:</span> +58212-285-3844<br />
          <span>FAX:</span> +58212-284-8907<br />
          <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MG</a></p>
      <p class="rf">Design by <a href="#">MG</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>

