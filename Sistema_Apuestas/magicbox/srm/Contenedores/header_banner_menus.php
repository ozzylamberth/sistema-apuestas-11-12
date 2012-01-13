  <div class="header">
    <div class="header_resize">
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          
          </span>
         
        </form>
      </div>
      <div class="logo">
        <h1><a href="index.html">SISTEMA<span> APUESTAS SOGAR </span> <small></small></a></h1> 
     
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
        
			
        
          <li class="active"><a href="?controlador=Home&accion=index"><span>Inicio</span></a></li>
          <li></li>
          <li><a href="javascript:ventanaSecundaria('?controlador=Home&accion=iniciarSesion')"><span>Log In</span></a></li>
          <li><a href="?controlador=Eventos&accion=listar"><span>Ganadores</span></a></li>
		  <li><a href="?controlador=Eventos&accion=proximosEventos"><span>Proximos Eventos</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider_2">  
			<a href="#">
				<?PHP if($action=='ganadores'): ?>
					<img src="Imagenes/ganadores.gif" width="1023" height="100" alt="">
				<?PHP else: ?>
					<img src="Imagenes/proximoseventos.gif" width="1023" height="100" alt="">
				<?PHP endif; ?>
			<span>
			</span>
			</a>
		</div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>