<?Php
include_once ("../controladores/ControlCasaA.php");

?>
		<head>
	    <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body {
	background-image: url(../Imagenes/fondo.png);
}
.Estilo1 strong {
	color: #700;
	font-family: "Cooper Black";
}
        .Estilo2 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
        </style>	
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

 <body>

<form action=".php" name=""  id="" method="post">


	
	
		<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=home.php"> </head > 
			<h1 align="center" class="Estilo1"><strong><?php echo $mensaje ?>  </strong></h1>
			<p align="center" class="Estilo2"><span class="Estilo2">Sera enviado a la pagina principal automaticamente.... Si no es redirigido por favor ingrese en el siguiente enlace</span></p>
			<p align="center" class="Estilo2"><span class="Estilo2"><a href='/magicbox/MenuOperativo2.php' class="Estilo1"></br>
		    Regresar al Menu Principal</a></span><a href='/magicbox/MenuOperativo2.php' class="Estilo1"></a></p>
			<p align="center" class="Estilo2"><img src="../Imagenes/ca1.jpg" width="970" height="291" alt="lk"></p>

	

</form>
<?PHP
require_once("../Contenedores/footer.php");
?>
