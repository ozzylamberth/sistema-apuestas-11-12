<!-- 
@ Eleany G
Vista o interfaz grafica que muestra los participantes por eventos -->

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />

<style type="text/css">
<
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(Imagenes/fondo.jpg);
	color: #800;
	font-size: x-large;
	text-align: center;
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
.kk {
	color: #000;
}

>
</style>

<body bgcolor="white">
	</br>
	<p align="center" class="Estilo1"><strong>Lista de Participantes de los Eventos</strong></p>
	</br>
	<form id="desactivar_user" name="desactivar_user" method="post" action="?controlador=Home&accion=home">

		<table width="700" border="0" align="center" class="lista">
       		<?php if(count($participantes_evento)>0): ?>
				<?php foreach($participantes_evento as $clave=>$valor):?>
                <tr class="kk">
                    <th width="200" colspan="2">Evento: <?php echo $clave; ?></th>
                </tr>
                    <?php foreach($valor as $i=>$participante):?>
                    <tr>
                        <td width="200" scope="col"> Participante: </td> 
                        <td width="200" scope="col"> <?php  echo $participante; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php else: ?>
              	<tr class="kk">
                    <th width="200" colspan="2">No hay registros de eventos y sus participantes en el sistema!!!</th>
                </tr>
             <?php endif; ?>    
		</table>
    
		<center>
			<input name="Continuar" type="submit" class="bot" id="Continuar" value="Continuar" align='center'>
			</br></br>
			<p><img src="Imagenes/CASAAPUESTASOG.gif" width="907" height="106" alt="25"></p>
		</center>
	</form>
</body>
