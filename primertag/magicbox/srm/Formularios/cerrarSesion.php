<?php
session_start();
require_once("../Clases/Funciones.php");

session_unregister('cedula');
session_destroy();
//print("<html onload='index.php'><form action='' name='cerrar'></form></html>");
/*print("<script>
alert(top.location);
top.close();
window.open('','_self');
</script>");*/
//print("<script>document.location.href='index.php';</script>");
//header("Location:index.php");

redirect("../Formularios/Index.html",0);
?>
<html>


</html>
