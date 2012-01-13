<?Php

session_start();
$usuario= $_SESSION['usuario'];

?>
		<head>
	

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body {
	background-image: url(../Imagenes/fondo.jpg);
}
body,td,th {
	font-family: Comic Sans MS, cursive;
}
.titulo {
	font-family: "Cooper Std Black";
}
     .jjj {
	color: #700;
	font-size: x-large;
}
        .Estilo2 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
        .Estilo1 strong {
	font-size: 24px;
}
        </style>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

              <body>

					


	
			<h1 align="center" class="Estilo1"><strong><?php echo $mensaje ?>  </strong></h1>
			<p align="center">            
			<p align="center" class="Estilo2"><span class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es re dirigido por favor ingrese en el siguiente enlace<a href='../Formularios/home.php' class="Estilo1"></br>
			</a></span></p>
			<p align="center" class="Estilo2"><span class="Estilo2"><a href='../Formularios/home.php' class="Estilo1">Regresar al Menu Principal</a></span>			</p>
			<p align="center"><img src="../Imagenes/ClasicosFutbol.gif" width="1026" height="103" alt="cf"></p>

<?PHP
require_once("../Contenedores/footer.php");

?>
