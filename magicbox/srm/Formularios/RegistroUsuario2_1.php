<?php
include_once ("../controladores/ControlUsuario.php");

//muestra los datos consultados de acuerdo a la opción




?>
		<head>
	
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body {
	background-image: url(../Imagenes/fondo.jpg);
}
.Estilo1 strong {
	font-family: Comic Sans MS, cursive;
	color: #700;
	font-size: x-large;
}
        .Estilo2 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
        </style>
		
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

  <body>

<form action="" name=""  id="" method="post">


	
		
			
  <p align="center" class="Estilo1"><strong><?php echo $mensaje ?> </strong></p>
			
			<p align="center" class="Estilo2"><img src="../Imagenes/ca1.jpg" width="885" height="234" alt="lk"></p>
      


</form>
<?PHP
require_once("../Contenedores/footer.php");
?>