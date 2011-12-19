    
<?PHP

/** 
*
* @Lista de administradores para su modificacion de administradores
* 
* @autor: Eleany Garcia
* Página que muestra la informacion de los administradores para su modificacion
*
*/

include_once ("../controladores/ControlModificarUsu.php")


?>

<style type="text/css">
<!--
body,td,th {
	font-family: Comic Sans MS, cursive;
	font-weight: bold;
}
body {
	background-image: url(../Imagenes/fondo.jpg);
}
.bnm {
	font-family: "Comic Sans MS", cursive;
	color: #800;
	background-color: #000;
}
.mn {
	font-family: "Comic Sans MS", cursive;
}
.Estilo1.Estilo1 {
	font-size: large;
	color: #700;
}
.irena {
	color: #800;
}
-->
</style><body bgcolor="white">
<p align="center" class="Estilo1">Modificar Administrador</p>

<form action="" method="post" name="formId" id="formId">
  <select name="usuario" class="gh" id="usuario">
    <option value="0">Seleccione </option>
    <?php foreach ($usuarios as $clave=>$valor): ?>
    <option value="<?php echo $valor["admin_cedula"] ?>" ><?php echo $valor["admin_cedula"]?></option>
    <?php endforeach; ?>
  </select>
  <p>
    <input name="Submit" type="submit" class="irena" value="Buscar" />
  </p>
</form>

 

 <?php  if($admin_cedula):?>
<form id="formPariente" name="formPariente" method="post" action="">
  <fieldset>
        <legend>Si desea modificar al siguente Administrador :</legend>
                
        <p>
          <label>Login:
            <?php echo $admin_login ; ?>
          </label>
        </p>
        <p>
          <label>Nombre:
            <?php echo $admin_nombre ; ?>
          </label>
            
        </p>
        
          <p>
          <label>Apellido:
            <?php echo $admin_apellido ; ?>
          </label>
            
        </p>
        
        <p>
          <label>Status:
            <?php echo $admin_status ; ?>
          </label>
            
        </p>
  </fieldset>
</form>


  
<form id="consulta" name="consulta" method="post" action= "../Formularios/modificar_us2.php">
  <fieldset>
    <legend>Ingrese los Nuevos Datos:</legend>
   
    <p>
    <input type="hidden" name="admin_cedula" Id="admin_cedula" value="<?php echo $admin_cedula?>"/>
      <label>Login:
        <input name="admin_login" type="text" id="admin_login" maxlength="15" />
      </label>
    </p>
    <p>
      <label>Contrasena: </label>
      <input type="password" name="admin_contrasena" id="admin_contrasena"  maxlength="20"/>
    </p>
   
    <p>
      <label>Nombre: </label>
      <input type="text" name="admin_nombre" id="admin_nombre"  maxlength="45"/>
    </p>
    <p>
      <label>Apellido: </label>
      <input type="text" name="admin_apellido" id="admin_apellido"  maxlength="45"/>
    </p>
    
    <p>
      <label>Status: </label>
      <input type="text" name="admin_status" id="admin_status"  maxlength="45"/>
    </p>
    
    <p>
      <center><input name="enviar" type="submit" class="irena" id="enviar" onClick="validaSubmite()" value="Modificar"/>
      <input name="limpiar" type="reset" class="irena" id="limpiar" value=" Limpiar" /></center>
    </p>
    <div align="center">
      </label>
    </div>

  </fieldset>

</form>
<?php endif; ?>
</body>
