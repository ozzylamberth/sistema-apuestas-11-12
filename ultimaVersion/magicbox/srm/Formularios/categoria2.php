<?Php

session_start();
$usuario= $_SESSION['usuario'];

?>
		<head>
	

		
        <style type="text/css">
         label.error { float: none; color: red; padding-left: .5em; vertical-align: text-bottom; display:none}
        body {
	background-image: url(../Imagenes/fondo.png);
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
        </style>
		
		</head>

              <body>

					
<form action="" name=""  id="" method="post">

	


		
			<h1 align="center" class="Estilo1"><strong><?php echo $mensaje ?>  </strong></h1>
			




</form>
<?PHP
require_once("../Contenedores/footer.php");

?>
