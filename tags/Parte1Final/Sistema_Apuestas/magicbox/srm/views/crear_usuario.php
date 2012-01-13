<head>
<!-- 
@Eleany G 
Vista o interfaz grafica utilizada al crear un administrador-->
	<script>
		function validaSubmite()
		{/*
			if (document.RegistroUsuario.admin_nombre.value == false )
				alert("Debe Ingresar Nombre")
			else if (document.RegistroUsuario.admin_apellido.value == false )
				alert("Debe Ingresar Apellido")
			else if (document.RegistroUsuario.admin_cedula.value == false )
				alert("Debe Ingresar Respuesta Secreta")	
			else if (document.RegistroUsuario.admin_login.value == false )
				alert("Debe Ingresar el login")
			else if (document.RegistroUsuario.admin_contrasena.value == false )
				alert("Debe Ingresar el login")	
			else if (document.RegistroUsuario.admin_resp_secreta.value == false )
				alert("Debe Ingresar Respuesta Secreta")
			else */
				document.RegistroUsuario.submit()
		}
	</script>
        
     <script language="JavaScript">
        function acceptNum(e)
		{
			var tecla;
			tecla = (document.all) ? e.keyCode : e.which;
			if(tecla == 8)
			{
				return true;
			}
			var patron;
			//patron = /[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUV WXYZ0123456789]/
			patron = /\d/; //solo acepta numeros
			var te;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
	</script>
		
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
	<style type="text/css">
		body {
			background-image: url(Imagenes/fondo.jpg);
		}
		body,td,th {
			font-family: Comic Sans MS, cursive;
			font-weight: bold;
		}
		.regis {
			font-size: large;
			color: #800;
		}
		.boton {
			font-family: "Comic Sans MS", cursive;
			color: #A00;
			background-color: #000;
		}
		.irena {
			color: #800;
		}
		.mensaje 
		{
			color: #D00;
			font-size: 12px;
		}
	</style>
</head>

<body>
	<form name="RegistroUsuario" id="RegistroUsuario" method="post" action="?controlador=Usuarios&accion=ingresarUsuario">
		
		<title><center spry:hover="regis">Registro de Usuario</center></title>
			
		<h1 align="center" class="Estilo1"><strong>Crear Usuarios</strong></h1>
   	
		<br>			
		<br>
		
		<table align="center" width="600" height="439" border="0">
			<tr align='left' height="40">	
				<td align='right' width="180"><strong>FECHA</td>
				<td align='' width="300">
					<?php 
						$fecha1=time();
						$fecha1 -= (270 * 60);
						$fecha = date("Y-m-d", $fecha1 );
					?>
					<input type="text" name="fecha" readonly="readonly" value="<?php echo $fecha ?>">
				</td>
				<th align="right" width="300" rowspan="15">
					<img src="Imagenes/4753.gif" width="160" height="512" alt="mm">
				</th>
			</tr>
			
			<tr height="80">
				<th align="left" colspan="2">&nbsp;
					
				</th>
			</tr>
			
			<tr height="50">
				<th align='right' scope="col">
					<strong>Nombre:</strong>
				</th>
				<th align="left" scope="col">
					<input name='admin_nombre' type='text' id='admin_nombre' value="" size="30" maxlength="20">
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_nombre',$mensaje) && trim($mensaje['admin_nombre'])!='')
							{
								echo $mensaje['admin_nombre'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Apellido:</strong>
				</th>
				<th align="left" scope="col">
					<input name='admin_apellido' type='text' id='admin_apellido' value="" size="30" maxlength="25">
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_apellido',$mensaje) && trim($mensaje['admin_apellido'])!='')
							{
								echo $mensaje['admin_apellido'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Cedula:</strong>
				</th>
				<th align="left" scope="col">
					<input name='admin_cedula' type='text' id='admin_cedula' onKeyPress="return acceptNum(event)" value="" maxlength="10">
				</th>
			</tr>
            <tr>
				<td>
				</td>
				<td class="mensaje">
					<?php if(array_key_exists('admin_cedula',$mensaje) && trim($mensaje['admin_cedula'])!='')
						{
							echo $mensaje['admin_cedula'];
						}
					?>
				</td>	
			</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Login:</strong>
				</th>
				<th align="left" scope="col">
					<input name="admin_login" type="text" id="admin_login" maxlength="15">
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_login',$mensaje) && trim($mensaje['admin_login'])!='')
							{
								echo $mensaje['admin_login'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Contrase&ntilde;a:</strong>
				</th>
				<th align="left" scope="col">
					<input name="admin_contrasena" type="password" id="admin_contrasena" maxlength="8">
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_contrasena',$mensaje) && trim($mensaje['admin_contrasena'])!='')
							{
								echo $mensaje['admin_contrasena'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Pregunta Secreta:</strong>
				</th>
				<th align="left" width="300" scope="col">
					<select name="pregunta" class="gh" id="pregunta">
						<option value="0">Seleccione </option>
						<?php foreach ($preguntas as $clave=>$valor): ?>
							<option value="<?php echo $valor["pre_id"] ?>" ><?php echo $valor["pre_des"]?></option>
						<?php endforeach; ?>
					</select>
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('pre_id',$mensaje) && trim($mensaje['pre_id'])!='')
							{
								echo $mensaje['pre_id'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align='right' scope="col">
					<strong>Respuesta Secreta:</strong>
				</th>
				<th align="left" scope="col">
					<input name='admin_resp_secreta' type='text' id='admin_resp_secreta' value="" maxlength="100">
				</th>
			</tr>
            <tr>
					<td>
					</td>
					<td class="mensaje">
						<?php if(array_key_exists('admin_resp_secreta',$mensaje) && trim($mensaje['admin_resp_secreta'])!='')
							{
								echo $mensaje['admin_resp_secreta'];
							}
						?>
					</td>	
				</tr>
			<tr height="50">
				<th align="left" colspan="3">&nbsp;
					
				</th>
			</tr>
			<tr height="50">
				<th align="center" colspan="3" align="center">
					<input name="Registrar" type="submit" class="irena" id="Continuar con Registro"  value="Registrar">
					&nbsp;
					<input name="Limpiar" type="reset" class="irena" id="Limpiar" value="Restablecer">
				</th>
			</tr>
		</table>      
	</form>
            
	 
     
    <center> 
		<img src="Imagenes/GA1_2344_2011_XtremeXmasJPs_COM.jpg" width="576" height="212" alt="stcris"></p>
	</center>
	<?PHP
		require_once("Contenedores/footer.php");
	?>
  
</body>


